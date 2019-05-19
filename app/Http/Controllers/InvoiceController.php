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
        $invoices = Invoice::orderby('created_at','desc')->paginate(10);
        return view('invoice.invoices')->with('invoices',$invoices);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all()->where('status',1);
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

        $this->validate($request,[
            'phoneNumber' => 'required',
            'products' => 'required',
            'totalAmount' => 'required',
            'deliveryCharge' =>'required',
            'discount' => 'required',
            'paidAmount' => 'required',

        ]);

        $totalAmount = floatval($request->input('totalAmount'));
        $deliveryCharge = floatval($request->input('deliveryCharge'));
        $discount = floatval($request->input('discount'));
        $paidAmount = floatval($request->input('paidAmount'));

        $netAmount = $totalAmount + $deliveryCharge - $discount;
        $amountDue = $netAmount - $paidAmount;

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
         $invoice->totalAmount = $totalAmount;
         $invoice->deliveryCharge = $deliveryCharge;
         $invoice->discount = $discount;
         $invoice->netAmount = $netAmount;
         $invoice->paidAmount = $paidAmount;
         $invoice->amountDue = $amountDue;
         $invoice->customer_id = $customer->id;
         $invoice->user_id =auth()->user()->id ;
         $invoice->save();
         
        foreach ($products as $key => $product) {

            // data inserting to pivot table 
            $invoice->products()->attach(floatval($product['productId']),['quantity'=>$product['quantity'],'pup'=>$product['price'],'percentage'=>$product['percentage'],'netPrice'=>$product['netPrice']]);
           
           // after selling deduct the selling quantity from database 
            Product::where('id',$product['productId'])->decrement('quantity', $product['quantity']);

        }
        return response($invoice->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $invoice = Invoice::find($id);
        return view('invoice.show',compact('invoice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return redirect('/home');
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
        return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $invoice=Invoice::find($id);

        $invoice->delete();
        return redirect('/invoices')->with('success','invoice deleted');
    }


}
