@extends('layouts.app')

@section('content')
    <h2>Detail Buku</h2>

    <table class="table mt-3">
        <tr>
            <th>ID</th>
            <td>{{ $book->id }}</td>
        </tr>
        <tr>
            <th>Judul</th>
            <td>{{ $book->book_name }}</td>
        </tr>
        <tr>
            <th>Jenis</th>
            <td>
                @if($book->bookType)
                    {{ $book->bookType->name }}
                @else
                    Jenis tidak tersedia
                @endif
            </td>
        </tr>
        <tr>
            <th>Penerbit</th>
            <td>{{ $book->publisher }}</td>
        </tr>
        <tr>
            <th>Tahun</th>
            <td>{{ $book->year }}</td>
        </tr>
        <tr>
            <th>Stok</th>
            <td>{{ $book->stock }}</td>
        </tr>
    </table>
@endsection
