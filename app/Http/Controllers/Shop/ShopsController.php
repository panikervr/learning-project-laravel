<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Shop;
use App\Models\ShopCategory;
use function Laravel\Prompts\select;

class ShopsController extends Controller
{
    public function index()
    {
        $shop = ShopCategory::query()->get();
        return view('pages.shop.index', ['shops' => $shop]);
    }
    public function show(ShopCategory $shop)
    {
        $shop = ShopCategory::where('category_id', $shop->id)
            ->join('shop', 'shop.category_id', '=', 'shop_category.id')
            ->select('shop_category.id', 'shop.*' )
            ->get();
        return view('pages.shop.show', ['shops' => $shop]);
    }
}
