<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin|moderator')->except('index','show','findPrice');
    }
    
    public function findPrice(Request $request){
           $id = $request->input('id');
            $p = Product::select('quantity','sellPrice')->where('id',$id)->first();
            return response($p);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::orderby('created_at','desc')->paginate(10);
        return view('product.products')->with('products',$products); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        return view('product.add')->with('categories',$categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'productName'=>'required',
            'quantity'=>'required',
            'category_id'=>'required',
            'buyPrice'=>'required',
            'sellPrice'=>'required',
            'productImage'=>'image|nullable|max:1999',
            'details'=>'required',
        ]);

        //handald file upload
        if($request->hasFile('productImage')){
            // Get filename with the extension
            $filenameWithExt = $request->file('productImage')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('productImage')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('productImage')->storeAs('public/productImage', $fileNameToStore);
        } else {
            $fileNameToStore = 'noImage.jpg';
        }
        //addtodatabase
        $product=new product;
        $product->productName=$request->input('productName');
        $product->quantity=$request->input('quantity');
        $product->category_id=$request->input('category_id');
        $product->buyPrice=$request->input('buyPrice');
        $product->sellPrice=$request->input('sellPrice');
        $product->productImage=$fileNameToStore;
        $product->details=$request->input('details');
        $product->save();
        $save=$request->input('save');
        if ($save==0) {
            return redirect('/products')->with('success','product added');
        } else {
            return redirect('/products/create')->with('success','product added');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product=Product::find($id);
        return view('product.show')->with('product',$product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product=Product::find($id);
        $categories = Category::all();
        return view('product.edit')->with('product',$product)
                                    ->with('categories',$categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'productName'=>'required',
            'quantity'=>'required',
            'category_id'=>'required',
            'buyPrice'=>'required',
            'sellPrice'=>'required',
            'productImage'=>'image|nullable|max:1999',
            'details'=>'required',
        ]);

        //handald file upload
        if($request->hasFile('productImage')){
            // Get filename with the extension
            $filenameWithExt = $request->file('productImage')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('productImage')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('productImage')->storeAs('public/productImage', $fileNameToStore);
        } else {
            $fileNameToStore = 'noImage.jpg';
        }
        //update in database
        $product=Product::find($id);
        $product->productName=$request->input('productName');
        $product->quantity=$request->input('quantity');
        $product->category_id=$request->input('category_id');
        $product->buyPrice=$request->input('buyPrice');
        $product->sellPrice=$request->input('sellPrice');
        if($request->hasFile('productImage')){
            $product->productImage=$fileNameToStore;
        }
        $product->details=$request->input('details');
        $product->save();
        return redirect('/products')->with('success','Product has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $product=Product::find($id);
        if($product->productImage!='noImage.jpg'){
            Storage:delete('public/productImage/'.$product->productImage);
        }
        $product->delete();
        return redirect('/products')->with('success','product deleted');
    }
}
