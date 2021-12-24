<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Queue\RedisQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    public function insertProduct(Request $request){
        $request->validate([
            'category' => 'required|numeric',
            'title' => 'required|min:5|max:25',
            'description' => 'required|min:10|max:100',
            'price' => 'required|numeric|min:1000|max:10000000',
            'stock' => 'required|numeric|min:1',
            'image' => 'required|mimes:png,jpeg,gif'
        ]);

        $product = new Product();
        $product->type_id = $request->category;
        $product->title = $request->title;
        $product->description = $request->description;
        $product->stock = $request->stock;
        $product->price = $request->price;

        $uploaded_file = $request->file('image');

        $file_name = time() . '_' . $uploaded_file->getClientOriginalName();
        $file_path = Storage::putFileAs('public/', $uploaded_file, $file_name);
        $product->image = $file_name;

        $product->save();

        return redirect('/');
    }

    public function getInsertProductPage(){
        $typeController = new TypeController();
        $types = $typeController->getAllType();
        return view("insertProduct", compact('types'));
    }

    public function updateProduct(Request $request){
        $request->validate([
            'id' => 'required',
            'category' => 'required|numeric',
            'title' => 'required|min:5|max:25',
            'description' => 'required|min:10|max:100',
            'price' => 'required|numeric|min:1000|max:10000000',
            'stock' => 'required|numeric|min:1',
            'image' => 'mimes:png,jpeg,gif'
        ]);

        $product_id = $request->id;

        $product = Product::where("id", "=", $product_id)->first();

        $product->type_id = $request->category;
        $product->title = $request->title;
        $product->description = $request->description;
        $product->stock = $request->stock;
        $product->price = $request->price;

        $uploaded_file = $request->file('image');
        if($uploaded_file != null){
            $file_name = time() . '_' . $uploaded_file->getClientOriginalName();
            $file_path = Storage::putFileAs('public/', $uploaded_file, $file_name);
            $product->image = $file_name;
        }

        $product->save();

        return redirect()->back();
    }

    public function getUpdateProductPage($id){
        $typeController = new TypeController();
        $types = $typeController->getAllType();
        $product = Product::where("id", "=", $id)->first();
        return view("updateProduct", compact('types', 'product'));
    }

    public function getDetailPage($id){
        $product = Product::where("id", "=", $id)->first();
        $user_id = Auth::user() ? Auth::user()->id: null;
        if($user_id == null){
            $cart = null;
        }else{
            $cart = Cart::where("product_id", "=", $id)->where("user_id", "=", $user_id)->first();
        }
        return view('detail',compact('product', 'cart'));
    }

    public function getHomePage(){
        $products = Product::all();
        return view('home', compact('products'));
    }


    public function search(){
        return redirect("/search/All");
    }

    public function getSearchPage(Request $request, $type){
        #paginate 6 product
        #kalau mau simple paginate
        #$products = Product::simplePaginate(6);

        $searchStr = $request->query('search');
        $N_PAGINATE = 6;
        if($type == "All"){
            if($searchStr != null){
                $products = Product::where('title', 'LIKE', "%$searchStr%")->paginate($N_PAGINATE)->appends(['search' => $searchStr]);
            }else{
                $products = Product::paginate($N_PAGINATE);
            }
        }else {
            if ($searchStr != null) {
                $products = DB::table('products')
                    ->join('types', 'products.type_id', 'types.id')
                    ->where('types.name', '=', $type)
                    ->where('products.title', 'LIKE', "%$searchStr%")
                    ->select('products.id', 'products.title', 'products.description', 'products.image', 'products.stock', 'products.price', 'products.type_id')
                    ->paginate($N_PAGINATE)->appends(['search' => $searchStr]);
            } else {
                $products = DB::table('products')
                    ->join('types', 'products.type_id', 'types.id')
                    ->where('types.name', '=', $type)
                    ->select('products.id', 'products.title', 'products.description', 'products.image', 'products.stock', 'products.price', 'products.type_id')
                    ->paginate($N_PAGINATE);
            }
        }

        $selectedType = $type;
        $typeController = new TypeController();
        $types = $typeController->getAllType();
        return view('searchPage', compact('products', 'types', 'selectedType', 'searchStr'));
    }

}
