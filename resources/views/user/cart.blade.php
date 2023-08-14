@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Cart</h2>
        @if ($carts->isEmpty())
            <p>Cart Anda kosong.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Buku</th>
                        <th>Judul</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>Subtotal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($carts as $cart)
                        <tr>
                            <td><img src="{{ asset('storage/'.$cart->book->cover_image) }}" alt="Cover Buku" width="50"></td>
                            <td>{{ $cart->book->title }}</td>
                            <td>{{ $cart->qty }}</td>
                            <td>Rp {{ number_format($cart->book->price, 0, ',', '.') }}</td>
                            <td>Rp {{ number_format($cart->book->price * $cart->qty, 0, ',', '.') }}</td>
                            <td>
                                <form action="{{ route('user.cart.remove', $cart->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus buku dari cart?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="total-price">
                <p>Total Harga: Rp {{ number_format($totalPrice, 0, ',', '.') }}</p>
            </div>
            <div class="checkout-btn">
                <a href="{{ route('user.cart.checkout') }}" class="btn btn-primary">Checkout</a>
            </div>
        @endif
    </div>
@endsection
