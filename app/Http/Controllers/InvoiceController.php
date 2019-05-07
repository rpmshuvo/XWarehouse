<?php

namespace App\Http\Controllers;


use App\Invoice;
use App\Product;
use App\Customer;
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

        //to find customer is exist in databade or not
        $customer = Customer::where('phoneNumber',$request->input('phoneNumber'))->first();
        
        if (empty($customer)) {
            
            $customer = new Customer;
            $customer->name = $request->input('name');
            $customer->address = $request->input('address');
            $customer->phoneNumber = $request->input('phoneNumber');
            $customer->save();


        } 
         $products = $request->get('products');


         $invoice = new Invoice;
         $invoice->totalAmount = floatval($request->input('totalAmount'));
         $invoice->deliveryCharge = floatval($request->input('deliveryCharge'));
         $invoice->discount = floatval($request->input('discount'));
         $invoice->netAmount = floatval($request->input('netAmount'));
         $invoice->paidAmount = floatval($request->input('paidAmount'));
         $invoice->amountDue = floatval($request->input('amountDue'));
         $invoice->customer_id = $customer->id;
         $invoice->user_id =auth()->user()->id ;
         $invoice->save();
         
        foreach ($products as $key => $product) {

            // data inserting to pivot table 
            $invoice->products()->attach(floatval($product['productId']),['quantity'=>$product['quantity']]);
           
           // after selling deduct the selling quantity from database 
            Product::where('id',$product['productId'])->decrement('quantity', $product['quantity']);

        }
        return response($customer);
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

    public function quantityUpdate( $id, $quantity)
    {
        
        return ;
    }
}
