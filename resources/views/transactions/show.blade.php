@extends('layouts.app')

@section('content')
    <h2>Detail Transaksi</h2>

    <table class="table mt-3">
        <tr>
            <th>ID</th>
            <td>{{ $transaction->id }}</td>
        </tr>
        <tr>
            <th>Tanggal</th>
            <td>{{ $transaction->transaction_date }}</td>
        </tr>
        <tr>
            <th>Total Harga</th>
            <td>{{ $transaction->total_price }}</td>
        </tr>
        <!-- Tambahkan detail lainnya sesuai kebutuhan -->
    </table>

    <a href="{{ route('transactions.edit', $transaction->id) }}" class="btn btn-primary">Edit</a>
    <a href="{{ route('transactions.index') }}" class="btn btn-secondary">Kembali</a>
@endsection
