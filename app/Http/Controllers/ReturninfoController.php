<?php

namespace App\Http\Controllers;

use App\Returninfo;
use App\Invoice;
use App\Customer;
use App\Product;
use Illuminate\Http\Request;

class ReturninfoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function invoiceInformation(Request $request){
        $id = $request->input('id');
        $invoiceInfo = Invoice::findorFail($id);
        

        // if(!empty($invoiceInfo)){
        //     return response($customer);
        // }else
        // {
           
        //     return response($request);
        // }
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('returninfo.returninfos');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        return view('returninfo.returnForm')->with('products',$products);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $productId = $request->input('productId');
        $quantity = $request->input('quantity');
        $damage = $request->input('damage');
        $invoiceId = $request->input('invoiceId');

        $invoice = Invoice::findorFail($invoiceId);

        //to check how mutch quantity customer buy
        $product = $invoice->products->where('id',$productId)->first();
        $aqureQuantity = $product->pivot['quantity'];

        $pup = $product->pivot['pup'];
        $percentage = $product->pivot['percentage'];
        $total = $quantity * $pup;
        $returnAmount = ceil($total - ($total * $percentage) / 100);

            if($quantity <= $aqureQuantity){
                    $returninfo = new Returninfo;
                    $returninfo->product_id = $productId;
                    $returninfo->returnQuantity = $quantity;
                    $returninfo->damage = $damage;
                    $returninfo->returnAmount = $returnAmount;
                    $returninfo->invoice_id = $invoiceId;
                    $returninfo->save();
                    $product->quantity = $product->quantity + ( $quantity - $damage );
                    $product->save();
                    // $product->pivot->quantity = $aqureQuantity - $quantity;
                    // $product->pivot->save();


                    return redirect('/returninfos/'.$returninfo->id)->with('success','done');


            }
            else{

                return 'not good';
            }



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Returninfo  $returninfo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $returninfo = Returninfo::find($id);
        return view('returninfo.show')->with('returninfo',$returninfo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Returninfo  $returninfo
     * @return \Illuminate\Http\Response
     */
    public function edit(Returninfo $returninfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Returninfo  $returninfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Returninfo $returninfo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Returninfo  $returninfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Returninfo $returninfo)
    {
        //
    }
}
