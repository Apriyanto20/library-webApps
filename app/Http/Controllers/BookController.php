<?php

namespace App\Http\Controllers;

use App\Models\book;
use App\Models\Faculty;
use App\Models\Genre;
use App\Models\Sources;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // try {
        //     $data = book::paginate(5);
        //     return view('page.book.index')->with([
        //         'data' => $data,
        //     ]);
        // } catch (\Exception $e) {
        //    return redirect()->route('error.index');
        $data = book::paginate(5);
        return view('page.book.index')->with([
            'data'=> $data,
        ]);
    //    }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = book::paginate(5);
        $bookCode = book::createCode();
        $faculty = Faculty::all();
        $genre = Genre::all();
        $source = Sources::all();
        return view('page.book.create', compact('bookCode'))->with([
            'data'=> $data,
            'faculty' => $faculty,
            'genre' => $genre,
            'source'=> $source
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'book_code' => 'required|string',
        'titleBook' => 'required|string',
        'author' => 'required|string',
        'publisher' => 'required|string',
        'place_of_publication' => 'required|string',
        'publication_year' => 'required|integer',
        'faculty_code' => 'nullable|string',
        'genre_code' => 'nullable|string',
        'source_code' => 'nullable|string',
        'bookshelf' => 'required|string',
        'synopsis' => 'required|string',
        'ebook-file' => 'nullable|file|mimes:pdf,epub|max:5120', // Max 5MB
        'profile-picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // Max 2MB
    ]);

    try {
        $data = $request->only([
            'book_code',
            'titleBook',
            'author',
            'publisher',
            'place_of_publication',
            'publication_year',
            'faculty_code',
            'genre_code',
            'source_code',
            'bookshelf',
            'synopsis',
        ]);

        // Upload eBook file
        if ($request->hasFile('ebook-file')) {
            $ebookPath = $request->file('ebook-file')->store('public/ebook');
            $data['ebook'] = $ebookPath;
        }

        // Upload cover file
        if ($request->hasFile('profile-picture')) {
            $coverPath = $request->file('profile-picture')->store('public/cover');
            $data['cover'] = $coverPath;
        }

        // Tambahkan status buku
        $data['book_status'] = 'AVAILABLE';

        // Buat entri buku
        book::create($data);

        return redirect()
            ->route('book.index')
            ->with('message_add', 'Data berhasil ditambahkan.');
    } catch (\Exception $e) {
        // return redirect()
        //     ->route('error.index')
        //     ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        return redirect()
        ->route('book.index') // Atau halaman yang ingin Anda arahkan
        ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
    }
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
