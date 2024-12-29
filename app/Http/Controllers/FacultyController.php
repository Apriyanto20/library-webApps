<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use Illuminate\Http\Request;

class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $data = Faculty::paginate(5);
            $facultyCode = Faculty::createCode();
            return view('page.faculty.index', compact('facultyCode'))->with([
                'data' => $data,
        ]);
        }  catch (\Exception $e) {
            return redirect()->route('error.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $data = [
                'faculty_code' => $request->input('faculty_code'),
                'faculty' => $request->input('faculty')
            ];

            Faculty::create($data);

            return redirect()
                ->route('faculty.index')
                ->with('message_add', 'Data Sudah ditambahkan');
        } catch (\Exception $e) {
            return redirect()->route('error.index');
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
        try {
            $data = [
                'faculty' => $request->input('faculty')
            ];

            $datas = Faculty::findOrFail($id);
            $datas->update($data);
            return redirect()
                ->route('faculty.index')
                ->with('message_update', 'Data Sudah diupdate');
        } catch (\Exception $e) {
            return redirect()->route('error.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $data = Faculty::findOrFail($id);
            $data->delete();
        return back()->with('message_delete','Data Sudah dihapus');
        } catch (\Exception $e) {
            return redirect()->route('error.index');
        }
    }
}
