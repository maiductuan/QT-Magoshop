<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
use App\Products;



class HomeController extends Controller
{
    public function index()
    {
        $users = Users::count();
        $listusers = Users::orderBy('id')->take(5)->get();
        $products = Products::count();
        $dulieutheothang = Products::whereYear('created_at', date('Y'))->take(6)->get();
        $productsHethang = Products::where('pr_soluong','<','2')->count();
        return view('home.index',compact('users','products','productsHethang','listusers','dulieutheothang'));
    }
}
