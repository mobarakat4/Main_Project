<?php

namespace App\Http\Controllers\Web\Admin;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\ProductStoreRequest;
class ProductController extends Controller
{
    public function index(){
        $products = Product::with('category')->get();
        return view('admin.products.index',compact('products'));
    }
    public function create(){
        $cats = Category::select('id','name')->get();
        // dd($cats);
        return view('admin.products.create',compact('cats'));
    }
    public function store(ProductStoreRequest $request){
        // create new product
        $product = new Product();
        // image
        $imageName=time().'.'.$request->image->extension();
        $request->image->move(public_path('assets/img/products'),$imageName);

        $product->name = $request->name;
        $product->category_id = $request->category;
        $product->name_ar = $request->name_ar;
        $product->image_path = $imageName;
        $product->active = $request->status;
        $product->price = $request->price;
        $product->count = $request->count;
        $product->description = $request->description;
        $product->save();

        return redirect()->route('admin.product.index')->with(['success' => 'product added successfully']);

    }
    public function delete($product_id){
        Product::where('id', $product_id)->delete();
        return redirect()->route("admin.product.index")->with(
            [
                "success"=> "One Product deleted successfully"
            ]
        );

    }
}
