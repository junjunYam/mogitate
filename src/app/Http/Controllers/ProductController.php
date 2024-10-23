<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Season;

class ProductController extends Controller
{
    // 商品一覧画面
    // 機能；ページネーション
    public function index()
    {
        $products = Product::paginate(6);
        return view('products', compact('products'));
    }

    // 検索機能（商品一覧画面）
    public function search(Request $request)
    {
        $products = Product::KeywordSearch($request->keyword)->paginate(6);
        return view('products', compact('products'));
    }

    // 商品詳細画面
    // 機能；バリデーション
    public function detail($product_id)
    {
        $product = Product::where('id', $product_id)->first();
        $seasons = Season::all();
        // echo('<pre>');
        // var_dump($product);
        // echo('</pre>');
        $productSeasons = $product->seasons;
        // echo('<pre>');
        // var_dump($product->name);
        // echo('</pre>');
        foreach ($productSeasons as $productSeason) {
            echo('<pre>');
            var_dump($productSeason->id);
            echo('</pre>');
        }
        return view('detail', compact('product', 'seasons'));
    }

    // 更新機能（商品詳細画面）
    public function update(Request $request)
    {
        $form = $request->all();
        unset($form['_token']);
        Author::find($request->id)->update($form);
        return redirect('/');
    }

    // 削除機能（商品詳細画面）
    public function delete(Request $request)
    {
        Product::find($request->id)->delete();
        return redirect('products/delete');
    }

    // 商品登録画面
    // 機能；バリデーション
    public function register()
    {
        return view('products/register');
    }
}
