<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionRequest;
use App\Http\Requests\TransaksiRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaction = Transaction::with(['product', 'user'])
            ->where('user_id', Auth::user()->id)->paginate(10);
        return view('transaksi.index', [
            'transaction' => $transaction
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        $user = Auth::user();
        $transaction = Transaction::all();
        return view('transaksi.create', ['products' => $products, 'user' => $user, 'transactions' => $transaction]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TransaksiRequest $request)
    {
        $data = $request->all();

        Transaction::create($data);

        return redirect()->route('transaksi.index');
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
    public function edit(Transaction $transaksi)
    {
        // $transaction = Transaction::with(['product', 'user'])
        //     ->where('user_id', Auth::user()->id)->paginate(null);
        return view('transaksi.edit', [
            'item' => $transaksi
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TransaksiRequest $request, Transaction $transaksi)
    {
        $data = $request->all();

        if ($request->file('picturePayment')) {
            $data['picturePayment'] = $request->file('picturePayment')->store('assets/user/payment', 'public');
        }
        $transaction = $transaksi;
        $transaction->update($data);

        return redirect()->route('transaksi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
