@extends('layouts.app')

@section('content')
    <h2>Edit Transaksi</h2>

    <form action="{{ route('transactions.update', $transaction->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="transaction_date">Tanggal</label>
            <input type="date" name="transaction_date" class="form-control" value="{{ $transaction->transaction_date }}" required>
        </div>
        <div class="form-group">
            <label for="total_price">Total Harga</label>
            <input type="number" name="total_price" class="form-control" value="{{ $transaction->total_price }}" required>
        </div>
        <!-- Tambahkan input lainnya sesuai kebutuhan -->

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
@endsection
