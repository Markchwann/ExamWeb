@extends('layouts.app')

@section('content')
    <h2>Daftar Transaksi</h2>

    <a href="{{ route('transactions.create') }}" class="btn btn-primary">Tambah Transaksi</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tanggal</th>
                <th>Total Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->id }}</td>
                    <td>{{ $transaction->transaction_date }}</td>
                    <td>{{ $transaction->total_price }}</td>
                    <td>
                        <a href="{{ route('transactions.show', $transaction->id) }}" class="btn btn-info">Detail</a>
                        <a href="{{ route('transactions.edit', $transaction->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus transaksi ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

