<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Warehouse;
use App\Products;

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
        $warehouseid = $req->get('warehouseid');
    }
}
