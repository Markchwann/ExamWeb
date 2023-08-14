@extends('layouts.app')

@section('content')
    <h2>Edit Jenis Buku</h2>

    <form action="{{ route('booktypes.update', $bookType->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nama Jenis Buku</label>
            <input type="text" name="name" class="form-control" value="{{ $bookType->name }}" required>
        </div>
        <!-- Tambahkan input lainnya sesuai kebutuhan -->

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
@endsection
