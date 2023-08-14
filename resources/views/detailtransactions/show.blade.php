@extends('layouts.app')

@section('content')
    <h2>Detail Transaksi</h2>

    <table class="table mt-3">
        <tr>
            <th>ID</th>
            <td>{{ $detailTransaction->id }}</td>
        </tr>
        <tr>
            <th>ID Transaksi</th>
            <td>{{ $detailTransaction->transaction_id }}</td>
        </tr>
        <tr>
            <th>ID Buku</th>
            <td>{{ $detailTransaction->book_id }}</td>
        </tr>
        <tr>
            <th>Qty</th>
            <td>{{ $detailTransaction->qty }}</td>
        </tr>
        <tr>
            <th>Tanggal Pengembalian</th>
            <td>{{ $detailTransaction->return_date }}</td>
        </tr>
        <tr>
            <th>Field 1</th>
            <td>{{ $detailTransaction->field1 }}</td>
        </tr>
        <tr>
            <th>Field 2</th>
            <td>{{ $detailTransaction->field2 }}</td>
        </tr>
        <!-- Tambahkan kolom-kolom lain sesuai kebutuhan -->
    </table>
    
    @can('isAdmin')
        <!-- Tombol hanya ditampilkan jika pengguna adalah admin -->
        <a href="{{ route('detailtransactions.edit', $detailTransaction->id) }}" class="btn btn-primary">Edit</a>
        <a href="{{ route('detailtransactions.index') }}" class="btn btn-secondary">Kembali</a>
        <form action="{{ route('detailtransactions.destroy', $detailTransaction->id) }}" method="POST" style="display: inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus detail transaksi ini?')">Hapus</button>
        </form>
    @endcan

    @cannot('isAdmin')
        <!-- Tombol hanya ditampilkan jika pengguna bukan admin -->
        <a href="{{ route('detailtransactions.index') }}" class="btn btn-secondary">Kembali</a>
    @endcannot
@endsection
