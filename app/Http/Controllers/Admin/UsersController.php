<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Http\Requests;

class UsersController extends Controller
{
    public function index()
    {
    	$users=User::all();
    	return view('backend.users.index',compact('users'));
    }
}
