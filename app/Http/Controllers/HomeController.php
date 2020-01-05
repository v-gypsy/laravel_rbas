<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Warehouse;
use App\Products;
use App\Stock;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $role = Role::find(1);
        // $permission = Permission::create(['name' => 'see warehouses']);

        // $role->givePermissionTo($permission);
        // $permission->assignRole($role);
        
        // Auth()->user()->givePermissionTo($permission);
        // Auth()->user()->assignRole('admin');

        // return Auth()->user()->permissions;
        $products = Products::all();
        return view('home', ['products'=> $products]);
    }

    public function createpo(Request $req){
        $products = Products::all();
        $warehouses = Warehouse::all();
        return view('createpo', ['warehouses'=>$warehouses, 'products'=>$products]);
    }

    public function warehouselist(Request $req) {
        $warehouses = Warehouse::all();
        return view('warehouses', ['warehouses'=>$warehouses]);
    }

    public function purchaseorder(Request $req) {
        $warehouse = $req->get("warehouse");
        $batchid = $req->get("batchid");
        $productname = $req->get("product");
        $productid = $req->get("productid");
        $quantity = $req->get("quantity");
        $cost = $req->get("totalcost");
        $expiry = $req->get("expiry");

        if(!$productid){
            return back()->with('success','Please select product to create P.O!');
        }

        if(!$quantity){
            return back()->with('success','Please enter quantity!');
        }

        $productObj = Products::find($productid);
        $prodctstock = Stock::where('product_id','=', $productObj->id)->get();
        $prodctstock[0]->quantity += $quantity;
        $prodctstock[0]->save();

        return redirect()->route('home');
        
    }

    public function search(Request $req){
        $search = $req->get('term');
      
        $result = Products::where('name', 'LIKE', '%'. $search. '%')->select('id as product_id', 'name as value')->get();

        return response($result->toArray());
    }

    public function search2(Request $req) {
        $search = $req->get('term');
      
        $result = Warehouse::where('name', 'LIKE', '%'. $search. '%')->select('id as warehouse_id', 'name as value')->get();

        return response($result->toArray());
    }
}
