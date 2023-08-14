@extends('layouts.app')

@section('content')
    <h2>Edit Buku</h2>

    <form action="{{ route('books.update', $book->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="book_name">Judul</label>
            <input type="text" name="book_name" class="form-control" value="{{ $book->book_name }}" required>
        </div>
        <div class="form-group">
            <label for="book_type_id">Jenis</label>
            <select name="book_type_id" class="form-control" required>
                <option value="" selected disabled>Pilih Jenis Buku</option>
                @foreach($bookTypes as $bookType)
                    <option value="{{ $bookType->id }}" {{ $bookType->id == $book->book_type_id ? 'selected' : '' }}>
                        {{ $bookType->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="publisher">Penerbit</label>
            <input type="text" name="publisher" class="form-control" value="{{ $book->publisher }}" required>
        </div>
        <div class="form-group">
            <label for="year">Tahun</label>
            <input type="text" name="year" class="form-control" value="{{ $book->year }}" required>
        </div>
        <div class="form-group">
            <label for="stock">Stok</label>
            <input type="number" name="stock" class="form-control" value="{{ $book->stock }}" required>
        </div>
        <!-- Tambahkan input lainnya sesuai kebutuhan -->

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
@endsection
