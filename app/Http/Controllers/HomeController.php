<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Product;
use App\Returninfo;
use PDF;
use App\Invoice;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $stockValue = 0 ;
        $numberOfEmployees = User::count();
        $damage = Returninfo::sum('damage');
        $totalProducts = Product::sum('quantity');
        $revenue = Invoice::sum('netAmount');
        $products = Product::all();
        
        foreach ($products as $key => $product) {
            $stockValue = $stockValue + $product->quantity * $product->sellPrice;
        }
        
        return view('dashboard')->with('numberOfEmployees',$numberOfEmployees)
                                ->with('damage',$damage)
                                ->with('totalProducts',$totalProducts)
                                ->with('stockValue',$stockValue)
                                ->with('revenue',$revenue);
    }
    public function generatePDF($id)
    {
        $invoice = Invoice::find($id);
        $pdf = PDF::loadView('invoice.pdf',['invoice'=>$invoice]);
        $fileName = $invoice->id;
        

        return $pdf->stream($fileName . '.pdf');
    }

    public function salesReport(Request $request)
    {
       /* $report = DB::table('invoices')->select(DB::raw('count(*) as data'), DB::raw)->groupBy('created_at')->get();*/

       $report = Invoice::selectRaw('sum(netAmount) as netAmount, YEAR(created_at) year')->groupBy('year')->get();
        return response($report);
    }
}
