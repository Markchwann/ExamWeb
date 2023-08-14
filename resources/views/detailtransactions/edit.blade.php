@extends('layouts.app')

@section('content')
    <h2>Edit Detail Transaksi</h2>

    <form action="{{ route('detailtransactions.update', $detailTransaction->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="qty">Qty</label>
            <input type="number" name="qty" class="form-control" value="{{ $detailTransaction->qty }}" placeholder="Masukkan Jumlah Qty">
        </div>
        <div class="form-group">
            <label for="return_date">Tanggal Pengembalian</label>
            <input type="date" name="return_date" class="form-control" value="{{ $detailTransaction->return_date }}">
        </div>
        <div class="form-group">
            <label for="transaction_id">ID Transaksi</label>
            <input type="text" name="transaction_id" class="form-control" value="{{ $detailTransaction->transaction_id }}" readonly>
        </div>
        <div class="form-group">
            <label for="book_id">ID Buku</label>
            <input type="text" name="book_id" class="form-control" value="{{ $detailTransaction->book_id }}" readonly>
        </div>
        <div class="form-group">
            <label for="field1">Field 1</label>
            <input type="text" name="field1" class="form-control" value="{{ $detailTransaction->field1 }}" placeholder="Masukkan Nilai Field 1">
        </div>
        <div class="form-group">
            <label for="field2">Field 2</label>
            <input type="text" name="field2" class="form-control" value="{{ $detailTransaction->field2 }}" placeholder="Masukkan Nilai Field 2">
        </div>

        
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
@endsection
