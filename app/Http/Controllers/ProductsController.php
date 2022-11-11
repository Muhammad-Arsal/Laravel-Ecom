<?php

namespace App\Http\Controllers;

use App\Http\Library\Slim;
use App\Models\Category;
use App\Models\ProductCategory;
use App\Models\ProductImages;
use App\Models\Products;
use App\Models\Supplier;
use App\Models\SupplierProducts;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Foreach_;
use Symfony\Component\HttpKernel\Event\RequestEvent;

class ProductsController extends Controller
{
    public function index()
    {
        return view('backend.product_area');
    }

    public function allCategories()
    {
        $allProductCategories = ProductCategory::all();

        $data = compact('allProductCategories');

        return view('backend.all_product_categories')->with($data);
    }

    public function addCategories()
    {
        $allCat = ProductCategory::all();

        $data = compact('allCat');

        return view('backend.add_product_categories')->with($data);
    }

    public function editCategory($id)
    {
        $category = ProductCategory::find($id);

        $id = $id;

        $allCat = ProductCategory::all();

        $data = compact('category', 'id', 'allCat');

        return view('backend.edit_product_categories')->with($data);
    }

    public function storeProductCategory(Request $request)
    {
        $request->validate([
            "category_name" => "required",
        ]);

        $cat = new ProductCategory();

        $cat->name = $request['category_name'];
        $cat->parent_id = $request['parent_id'] ? $request['parent_id'] : 0;
        $cat->save();

        return redirect()->route('all.product.categories');
    }

    public function updateProductCategory(Request $request, $id)
    {
        $request->validate([
            "category_name" => "required",
        ]);

        $category = ProductCategory::find($id);

        $category->name = $request['category_name'];
        $category->parent_id = $request['parent_id'] ? $request['parent_id'] : 0;

        $category->save();

        return redirect()->route('all.product.categories');
    }

    public function destroyProductCategory($id)
    {
        $relativeCategory = ProductCategory::where('id', $id)->delete();

        return redirect()->route('all.product.categories');
    }

    public function allProduct()
    {
        $products = Products::all();

        $productImages = ProductImages::all();

        $data = compact('products', 'productImages');

        return view('backend.all_products')->with($data);
    }

    public function addProduct()
    {
        $suppliers = Supplier::all();

        $allCat = ProductCategory::all();

        $data = compact('suppliers', 'allCat');

        return view('backend.add_products')->with($data);
    }

    public function editRelativeProduct($id)
    {
        $p_id = $id;

        $productDetails = Products::find($id);

        $suppliers = Supplier::all();

        $allCat = ProductCategory::all();

        $data = compact('productDetails', 'suppliers', 'allCat', 'p_id');

        return view('backend.edit_products')->with($data);
    }


    public function storeProducts(Request $request)
    {
        $request->validate([
            "product_name" => "required",
            "category_id" => "required",
            "supplier_id" => "required",
            "product_description" => "required",
            "product_detail" => "required",
        ]);

        $product = new Products();

        $product->product_name = $request['product_name'];
        $product->description = $request['product_description'];
        $product->detail = $request['product_detail'];
        $product->category_id = $request['category_id'];
        $product->supplier_id = $request['supplier_id'];
        $product->save();

        $productImage = $this->handleCropper('product_images');

        if (!empty($productImage)) {
            if (is_array($productImage)) {
                foreach ($productImage as $img) {
                    $name       = $img['output']['name'];
                    $base64Data = $img['output']['data'];
                    $output     = Slim::saveFile($base64Data, $name);

                    $images = new ProductImages();

                    $images->product_id = $product->id;
                    $images->image_name = $output['name'];
                    $images->save();
                }
            } else {

                $images = new ProductImages();
                $images->product_id = $product->id;
                $images->image_name = $productImage;
                $images->save();
            }
        }

        return redirect()->route('admin.all.product');
    }


    public function updateProduct(Request $request, $id)
    {
        $product = Products::find($id);
        $connectedImages = ProductImages::where('product_id', $id)->get();

        $product->product_name = $request['product_name'];
        $product->description = $request['product_description'];
        $product->detail = $request['product_detail'];
        $product->category_id = $request['category_id'];
        $product->supplier_id = $request['supplier_id'];
        $product->save();

        $relativeImages = \App\Models\ProductImages::where('product_id', $id)->get();

        if ($request['product_images']) {

            $productImage = $this->handleCropper('product_images');

            if (!empty($productImage)) {
                if (is_array($productImage)) {
                    foreach ($productImage as $img) {
                        $name       = $img['output']['name'];
                        $base64Data = $img['output']['data'];
                        $output     = Slim::saveFile($base64Data, $name);

                        $images = new ProductImages();

                        $images->product_id = $product->id;
                        $images->image_name = $output['name'];
                        $images->save();
                    }
                } else {

                    $images = new ProductImages();
                    $images->product_id = $product->id;
                    $images->image_name = $productImage;
                    $images->save();
                }
            }
        }

        return redirect()->route('admin.all.product');
    }

    private function handleCropper($name)
    {
        $cropperImg = Slim::getImages($name);

        if ($cropperImg == false)
            return false;

        if (count($cropperImg) > 1) {
            return $cropperImg;
        } else {
            $singleImgData  = array_shift($cropperImg);
            $name           = $singleImgData['output']['name'];
            $base64Data     = $singleImgData['output']['data'];
            $output         = Slim::saveFile($base64Data, $name);

            return $output['name'];
        }
    }

    public function deleteProductImage($id)
    {
        $prodImage = ProductImages::find($id);

        if (!is_null($prodImage)) {

            unlink(public_path('frontend/prodImages' . '/' . $prodImage->image_name));

            $prodImage->delete();
        }

        return redirect()->route('edit.products', $prodImage->product_id);
    }
}
