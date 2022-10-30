<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

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

    public function storeSupplier(Request $request)
    {
        $request->validate([
            "supplier_name" => "required"
        ]);

        $supplier = new Supplier;
        $supplier->supplier_name = $request['supplier_name'];
        $supplier->save();

        return redirect()->route('add.supplier');
    }
}
