<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookType;

class BookTypeController extends Controller
{
    public function index()
    {
        $bookTypes = BookType::all();
        return view('booktypes.index', compact('bookTypes'));
    }

    public function create()
    {
        return view('booktypes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:book_types',
            // Aturan validasi lainnya
        ]);

        BookType::create([
            'name' => $request->input('name'),
            // Data jenis buku dari input form
        ]);

        return redirect()->route('booktypes.index')->with('success', 'Jenis Buku berhasil ditambahkan.');
    }

    public function show($id)
    {
        $bookType = BookType::findOrFail($id);
        return view('booktypes.show', compact('bookType'));
    }

    public function edit($id)
    {
        $bookType = BookType::find($id);
        return view('booktypes.edit', compact('bookType'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:book_types,name,' . $id,
            // Aturan validasi lainnya
        ]);

        $bookType = BookType::find($id);
        $bookType->update([
            'name' => $request->input('name'),
            // Data jenis buku dari input form
        ]);

        return redirect()->route('booktypes.index')->with('success', 'Jenis Buku berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $bookType = BookType::find($id);
        $bookType->delete();

        return redirect()->route('booktypes.index')->with('success', 'Jenis Buku berhasil dihapus.');
    }
}
