<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\DB;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function transaction()
    {
        $transact = Transaction::with('user')->get();

        return view('transaction', compact('transact'));
    }

    public function order()
    {
        // $transact = Transaction::with('user')->get();
        // $transactdetail = TransactionDetail::with('film', 'transaction')->get();
        $ddetail = Film::all();

        return view('Order', [
            // 'transactdetail' => $transactdetail,
            'ddetail' => $ddetail
        ]);
    }

    public function detail()
    {
        $transactdetail = TransactionDetail::with('film', 'transaction')->get();

        return view('transaction-detail', compact('transactdetail'));
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();

        try {

            $invoice = IdGenerator::generate([
                'table' => 'transactions',
                'length' => 10,
                'prefix' => 'INV-',
                'field' => 'invoice'
            ]);

            Transaction::create([
                'id' => Request()->id,
                'invoice' => $invoice,
                'user_id' => Auth()->id(),
                'jumlah_tiket' => Request()->jumlah_tiket
            ]);

            TransactionDetail::create([
                'id' => Request()->id,
                'invoice' => $invoice,
                'film_id' => Request()->film_id
            ]);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terdapat kesalahan, data telah di Rollback!');
        }
        return redirect('/')->with('success', 'Berhasil dipesan');
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
        //
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

    public function orderTiket($id)
    {
        $datafilm = Film::findOrFail($id);

        return view('order-tiket', compact('datafilm'));
    }
}
