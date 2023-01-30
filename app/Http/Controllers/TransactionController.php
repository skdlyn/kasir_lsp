<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Item;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Builder\Function_;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $items = Item::doesnthave('cart')->where('stock', '>', 0)->get();
        $carts = Item::has('cart')->get()->sortByDesc('cart.created_at');
        return view('transaction', compact('items', 'carts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function checkout(request $request)
    {
        Transaction::create($request->all());
        foreach(Cart::all() as $item){
            TransactionDetail::create([
                'transactions_id' => Transaction::latest()->first()->id,
                'item_id'        => $item->item_id,
                'qty'            => $item->qty,
                'subtotal'       => $item->item->price*$item->qty
            ]);
        }
        Cart::truncate();

        return redirect(route('transaction.show', Transaction::latest()->first()->id));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Cart::create($request->all());

        return redirect()->back()->with('status', 'Item Success to Add');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaction = Transaction::findorfail($id);

        // return $transaction;

        return view('detailtransaction', compact('transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $item = Cart::findorfail($id);
        $item->update($request->all());

        return redirect()->back()->with('status', 'Quantity Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $item = Cart::findorfail($id);
       $item->delete();

       return redirect()->back()->with('status', 'Item removed From Cart');
    }

    public function history()
    {
        $transaksi = Transaction::all();
        return view('history', compact('transaksi'));
    }
}
