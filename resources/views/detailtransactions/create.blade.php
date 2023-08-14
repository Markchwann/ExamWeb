@extends('layouts.app')

@section('content')
    <h2>Tambah Detail Transaksi</h2>

    <form action="{{ route('detailtransactions.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="qty">Qty</label>
            <input type="number" name="qty" class="form-control" placeholder="Masukkan Jumlah Qty">
        </div>
        <div class="form-group">
            <label for="return_date">Tanggal Pengembalian</label>
            <input type="date" name="return_date" class="form-control">
        </div>
        <div class="form-group">
            <label for="transaction_id">ID Transaksi</label>
            <input type="text" name="transaction_id" class="form-control" value="{{ $transactionId }}" readonly>
        </div>
        <div class="form-group">
            <label for="book_id">ID Buku</label>
            <input type="text" name="book_id" class="form-control" placeholder="Masukkan ID Buku">
        </div>
        <div class="form-group">
            <label for="field1">Field 1</label>
            <input type="text" name="field1" class="form-control" placeholder="Masukkan Nilai Field 1">
        </div>
        <div class="form-group">
            <label for="field2">Field 2</label>
            <input type="text" name="field2" class="form-control" placeholder="Masukkan Nilai Field 2">
        </div>
        <!-- Tambahkan elemen formulir lainnya sesuai kebutuhan -->
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
