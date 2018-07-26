<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\RoleFormRequest;
use App\Http\Controllers\Controller;
use spatie\Permission\Models\Role;
use spatie\Permission\Models\Permission;

class RolesController extends Controller
{
    public function create()
    {
    	return view('backend.roles.create');
    }
    public function store(RoleFormRequest $Request)
    {
    	Role::create(['name'=>$Request->get('name')]);
    	return redirect('/admin/roles/create')->with('status','A new role has been created!');  

     }
    
    public function index()
    {
    	$roles=Role::all();
    	return view('backend.roles.index',compact('roles'));
    }
}
