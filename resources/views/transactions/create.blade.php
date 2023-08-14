@extends('layouts.app')

@section('content')
    <h2>Tambah Transaksi</h2>

    <form action="{{ route('transactions.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="transaction_date">Tanggal</label>
            <input type="date" name="transaction_date" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="total_price">Total Harga</label>
            <input type="number" name="total_price" class="form-control" required>
        </div>
        <!-- Tambahkan input lainnya sesuai kebutuhan -->

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
