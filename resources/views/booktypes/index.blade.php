@extends('layouts.app')

@section('content')
    <h2>Daftar Jenis Buku</h2>
    
    <a href="{{ route('booktypes.create') }}" class="btn btn-primary">Tambah Jenis Buku</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Jenis Buku</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        @if($bookTypes->isEmpty())
            <tr>
                <td colspan="3">Tidak ada jenis buku yang tersedia.</td>
            </tr>
        @else
            @foreach($bookTypes as $bookType)
                <tr>
                    <td>{{ $bookType->id }}</td>
                    <td>{{ $bookType->name }}</td>
                    <td>
                        <a href="{{ route('booktypes.show', $bookType->id) }}" class="btn btn-info">Detail</a>
                        <a href="{{ route('booktypes.edit', $bookType->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('booktypes.destroy', $bookType->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus jenis buku ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
@endsection
