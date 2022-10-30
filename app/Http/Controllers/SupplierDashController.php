<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
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
        return view('backend.supplier_dash');
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
}
