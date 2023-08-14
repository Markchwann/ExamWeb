@extends('layouts.app')

@section('content')
    <h2>Tambah Buku</h2>

    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="book_name">Judul</label>
            <input type="text" name="book_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="book_type_id">Jenis</label>
            <select name="book_type_id" class="form-control" required>
                <option value="" selected disabled>Pilih Jenis Buku</option>
                @foreach($bookTypes as $bookType)
                    <option value="{{ $bookType->id }}">{{ $bookType->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="publisher">Penerbit</label>
            <input type="text" name="publisher" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="year">Tahun</label>
            <input type="text" name="year" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="stock">Stok</label>
            <input type="number" name="stock" class="form-control" required>
        </div>
        <!-- Tambahkan input lainnya sesuai kebutuhan -->

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
