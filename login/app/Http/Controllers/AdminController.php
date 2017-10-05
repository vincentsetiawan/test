<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    //Coba doang ya
    public function index()
    {
        $user = Auth::user();
    if($user->IsAdmin()){
    	echo "this user is an administrator";
 	   }
	}
}
