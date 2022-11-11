<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Supplier;
use App\Models\SupplierBillDetail;
use App\Models\SupplierProducts;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isNull;

class SupplierDashController extends Controller
{
    public function index()
    {
        return view('backend.Supplier_area');
    }

    public function supplierDash()
    {
        $allSuppliers = Supplier::all();

        $data = compact('allSuppliers');

        return view('backend.supplier_dash')->with($data);
    }

    public function addSupplier()
    {
        return view('backend.add_supplier');
    }

    public function allSupplier()
    {
        return view('backend.all_supplier');
    }

    public function defectivePiece()
    {
        return view('backend.defective_pieces');
    }

    public function editSupplierPage($id)
    {
        $supplier_id = $id;

        $data = compact('supplier_id');

        return view('backend.edit_supplier')->with($data);
    }

    public function storeSupplier(Request $request)
    {
        $request->validate([
            "supplier_name" => "required"
        ]);

        $supplier = new Supplier;
        $supplier->supplier_name = $request['supplier_name'];
        $supplier->save();

        return redirect()->route('all.supplier');
    }

    public function updateSupplier(Request $request, $id)
    {
        $request->validate([
            "supplier_name" => "required"
        ]);

        $supplier = Supplier::find($id);
        $supplier->supplier_name = $request['supplier_name'];
        $supplier->save();

        return redirect()->route('all.supplier');
    }

    public function destroySupplier($id)
    {
        $supplier = Supplier::find($id);
        $supplier->delete();

        return redirect()->route('all.supplier');
    }

    public function relativeSellerProducts(Request $request)
    {
        $relativeProducts = Products::where("supplier_id", $request->supplier_id)->get();
        return response()->json(["relativeProducts" => $relativeProducts]);
    }

    public function storeSupplierProducts(Request $request)
    {
        $i = 0;
        foreach ($request['product_id'] as $items) {
            $bill_detail = new SupplierBillDetail();

            $product_name = Products::where('id', $items)->first();

            $bill_detail->product_name = $product_name->product_name;
            $bill_detail->pieces = $request['pieces'][$i];
            $bill_detail->cost_price = $request['cp'][$i];
            $bill_detail->relative_total = $request['total'][$i];
            $bill_detail->bill_no = $request['bill_no'];

            $already_stock = SupplierProducts::where('product_id', $items)->first();

            if (empty($already_stock)) {
                $Supplier_product = new SupplierProducts();

                $Supplier_product->product_id = $items;
                $Supplier_product->supplier_id = $request['supplier'];
                $Supplier_product->cost_price = $request['cp'][$i];
                $Supplier_product->sale_price = $request['cp'][$i] + $request['cp'][$i] * ($request['tax'][$i] / 100);
                $Supplier_product->stock = $request['pieces'][$i];
                $Supplier_product->save();
                $bill_detail->save();
            } else {
                $already_stock->stock = $already_stock->stock + $request['pieces'][$i];
                $already_stock->update();
                $bill_detail->save();
            }
            $i++;
        }

        return redirect()->route('admin.all.product');
    }
}
