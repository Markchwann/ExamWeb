@extends('layouts.app')

@section('content')
    <h2>Daftar Detail Transaksi</h2>

    <a href="{{ route('detailtransactions.create', ['transaction_id' => $transactionId]) }}">Tambah Detail Transaksi</a>
    @can('edit', $detailTransaction)
    <!-- Tampilkan bagian ini hanya jika pengguna memiliki izin untuk edit -->
    <button class="btn btn-primary">Edit</button>
    @endcan
    @can('delete-detail-transaction', $detailTransaction)
    <!-- Tampilkan tombol Hapus hanya jika pengguna memiliki izin -->
    <button class="btn btn-danger">Hapus</button>
@endcan
    @if (auth()->check())
    @admin
        <!-- Tampilkan bagian ini hanya untuk admin -->
        <button class="btn btn-danger">Hapus</button>
    @else
        <!-- Tampilkan bagian ini untuk pengguna biasa -->
        <button class="btn btn-primary">Edit</button>
    @endadmin
    @else
        <!-- Tampilkan bagian ini untuk pengunjung yang belum login -->
        <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
    @endif

    @can('isAdmin')
        <!-- Tampilkan tombol tambah hanya untuk admin -->
        <a href="{{ route('detailtransactions.create', ['transaction_id' => $transactionId]) }}" class="btn btn-primary">Tambah Detail Transaksi</a>
    @endcan
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <!-- Tambahkan kolom-kolom lain sesuai kebutuhan -->
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($detailTransactions as $detailTransaction)
                <tr>
                    <td>{{ $detailTransaction->id }}</td>
                    <!-- Tambahkan kolom-kolom lain sesuai kebutuhan -->
                    <td>
                        <a href="{{ route('detailtransactions.show', $detailTransaction->id) }}" class="btn btn-info">Detail</a>
                        <a href="{{ route('detailtransactions.edit', $detailTransaction->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('detailtransactions.destroy', $detailTransaction->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus detail transaksi ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
