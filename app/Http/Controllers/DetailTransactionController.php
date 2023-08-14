<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Models\DetailTransaction;
use App\Models\Transaction; // Tambahkan ini untuk memanggil model Transaction
use Illuminate\Support\Facades\Gate;
class DetailTransactionController extends Controller
{
    public function index()
    {
        $transactionId = 12; // Set the transaction ID here
        $detailTransactions = DetailTransaction::all();
        return view('detailtransactions.index', compact('transactionId', 'detailTransactions'));
    }
    

    public function create()
    {
        // Ambil nilai transaction_id dari input form (misalnya jika ada parameter dalam URL)
        $transactionId = request('transaction_id');

        // Ambil daftar buku dari model Book
        $books = \App\Models\Book::all();
        return view('detailtransactions.create', compact('transactionId', 'books'));
    }

    public function store(Request $request)
    {
        $request->validate([
            // Definisikan aturan validasi sesuai kebutuhan
        ]);

        $detailTransaction = new DetailTransaction;
        $detailTransaction->transaction_id = $request->input('transaction_id');
        $detailTransaction->book_id = $request->input('book_id'); // Ambil nilai book_id dari input form
        $detailTransaction->qty = $request->input('qty'); // Ambil nilai qty dari input form
        $detailTransaction->return_date = $request->input('return_date');
        $detailTransaction->field1 = $request->input('field1');
        $detailTransaction->field2 = $request->input('field2');
        // Set nilai-nilai lainnya sesuai kebutuhan
        $detailTransaction->save();

        return redirect()->route('detailtransactions.index')->with('success', 'Detail transaksi berhasil ditambahkan.');
    }

    // ...

    public function update(Request $request, $id)
    {
        $request->validate([
            // Definisikan aturan validasi sesuai kebutuhan
        ]);

        $detailTransaction = DetailTransaction::find($id);

        if (!$detailTransaction) {
            return redirect()->route('detailtransactions.index')->with('error', 'Detail transaksi tidak ditemukan.');
        }

        $detailTransaction->qty = $request->input('qty');
        $detailTransaction->return_date = $request->input('return_date');
        $detailTransaction->field1 = $request->input('field1');
        $detailTransaction->field2 = $request->input('field2');

        // Simpan perubahan
        $detailTransaction->save();

        return redirect()->route('detailtransactions.show', $detailTransaction->id)->with('success', 'Detail transaksi berhasil diperbarui.');
    }

    // ...

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }

    public function show($id)
    {
        $detailTransaction = DetailTransaction::findOrFail($id);
        return view('detailtransactions.show', compact('detailTransaction'));
    }

    public function edit($id)
    {
        $detailTransaction = DetailTransaction::find($id);
        $book = Book::find($detailTransaction->book_id);
        return view('detailtransactions.edit', compact('detailTransaction', 'book'));
    }

    public function destroy($id)
{
    $detailTransaction = DetailTransaction::findOrFail($id);

    if (Gate::allows('delete-detail-transaction', $detailTransaction)) {
        // Izin diizinkan, lakukan tindakan penghapusan
        $detailTransaction->delete();
        return redirect()->route('detailtransactions.index')->with('success', 'Detail transaksi berhasil dihapus.');
    } else {
        return redirect()->route('detailtransactions.index')->with('error', 'Anda tidak memiliki izin untuk menghapus detail transaksi.');
    }
}
}
