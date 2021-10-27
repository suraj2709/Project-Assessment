<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('user')->get();
        return view('product-list', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add-product');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'price' => ['required','numeric'],
            'code' => ['required'],
            'description' => ['required']
        ]);
        
        if($request->hasfile('image')){        
            $fileNameExt = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($fileNameExt, PATHINFO_FILENAME);
            $fileExt = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$fileExt;
            $storage_img = 'storage/images/'.$fileNameToStore;
            $pathToStore = $request->file('image')->storeAs('public/images',$fileNameToStore);
        }

        $product = new Product();
        $product->user_id = Auth::user()->id;
        $product->name = $request->name;
        $product->code = $request->code;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->image = $storage_img ?? null;
        $product->save();

        Session::flash('message', 'Product added successfully'); 
        Session::flash('alert-class', 'alert-success'); 
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('product-edit', compact('product'));        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $storage_img = NULL;

        if($request->hasfile('image')){        
            $fileNameExt = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($fileNameExt, PATHINFO_FILENAME);
            $fileExt = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$fileExt;
            $storage_img = 'storage/images/'.$fileNameToStore;
            $pathToStore = $request->file('image')->storeAs('public/images',$fileNameToStore);
        }

        $product = Product::where(['id' => $id, "user_id" => auth()->id()])->first();
        if(is_null($product)){
            return redirect()->back()->with('message', 'Invalid Product.');
        }
        $product->name = $request->name;
        $product->code = $request->code;
        $product->price = $request->price;
        $product->description = $request->description; 

        if($request->hasfile('image')){        
            $product->image = $storage_img ?? null;
        }

        $product->save();

        Session::flash('message', 'Product updated'); 
        Session::flash('alert-class', 'alert-success'); 
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::where(['id' => $id, "user_id" => auth()->id()])->first();
        $product->delete();

        Session::flash('message', 'Product deleted successfully'); 
        Session::flash('alert-class', 'alert-success'); 
        return redirect()->route('products.index');
    }
}
