<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Advertisement;
use App\User;
use App\Category;
use Illuminate\Support\Facades\DB;

class ShowAdController extends Controller
{
    public function __construct()
    {

    }

    public function index($id)
    {
        $advertisementDetails = DB::table('advertisements')
            ->join('products', 'advertisements.product_id', '=', 'products.id')
            ->join('users', 'advertisements.user_id', '=', 'users.id')
            ->select('advertisements.*', 'products.*', 'products.name as product_name', 'users.*', 'users.name as user_name')
            ->where('advertisements.product_id', $id)
            ->get();

        return view('showAd', ['advertisements' => $advertisementDetails, 'categories' => Category::all()]);
    }
}
