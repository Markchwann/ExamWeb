<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::all();
        return view('transactions.index', compact('transactions'));
    }

    public function create()
    {
        return view('transactions.create');
    }

    public function store(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'trans_code' => 'required|unique:transactions',
            'trans_date' => 'required|date',
            'fine_total' => 'required|numeric',
        ]);

        // Buat objek Transaction dan isi nilainya
        $transaction = new Transaction;
        $transaction->trans_code = $request->input('trans_code');
        $transaction->trans_date = $request->input('trans_date');
        $transaction->fine_total = $request->input('fine_total');
        $transaction->save();

        return redirect()->route('transactions.index')
            ->with('success', 'Transaksi berhasil ditambahkan.');
    }

    public function show($id)
    {
        $transaction = Transaction::find($id);
        return view('transactions.show', compact('transaction'));
    }

    public function edit($id)
    {
        $transaction = Transaction::find($id);
        return view('transactions.edit', compact('transaction'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            // Aturan validasi sesuai dengan input form
        ]);

        $transaction = Transaction::find($id);
        // Set nilai-nilai lainnya dari $request
        $transaction->save();

        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $transaction = Transaction::find($id);
        $transaction->delete();

        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil dihapus.');
    }
}
