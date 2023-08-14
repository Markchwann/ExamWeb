@extends('layouts.app')

@section('content')
    <h2>Tambah Jenis Buku</h2>

    <form action="{{ route('booktypes.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nama Jenis Buku</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <!-- Tambahkan input lainnya sesuai kebutuhan -->

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
