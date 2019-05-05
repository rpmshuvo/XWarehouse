<?php

namespace App\Http\Controllers;


use App\Invoice;
use App\Product;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    
  
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = Invoice::all();
        return view('invoice.invoices')->with('invoices',$invoices);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        return view('invoice.newInvoice')->with('products',$products);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $totalAmount = $request->input('totalAmount');
        // $deliveryCharge = $request->input('deliveryCharge');
        // $discount = $request->input('discount');
        // $netAmount = $request->input('netAmount');
        // $paidAmount = $request->input('paidAmount');
        // $customer_id = "1";
        // $user_id = Auth::user()->id;

         $products = $request->get('products');


         $invoice = new Invoice;
         $invoice->totalAmount = floatval($request->input('totalAmount'));
         $invoice->deliveryCharge = floatval($request->input('deliveryCharge'));
         $invoice->discount = floatval($request->input('discount'));
         $invoice->netAmount = floatval($request->input('netAmount'));
         $invoice->paidAmount = floatval($request->input('paidAmount'));
         $invoice->amountDue = floatval($request->input('amountDue'));

         $invoice->customer_id = 1;
         $invoice->user_id =auth()->user()->id ;
         $invoice->save();
         
         foreach ($products as $key => $product) {
             $invoice->products()->attach(floatval($product['productId']),['quantity'=>$product['quantity']]);
         }
         return response($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        //
    }
}
