<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use App\Models\Major;
use Illuminate\Http\Request;

class MajorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $data = Major::paginate(5);
            $faculty = Faculty::all();
            $majorCode = Major::createCode();
            return view('page.major.index', compact('majorCode'))->with([
                'data' => $data,
                'faculty' => $faculty,
            ]);
        } catch (\Exception $e) {
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
                'major_code' => $request->input('major_code'),
                'faculty_code' => $request->input('faculty_code'),
                'major' => $request->input('major')
            ];

            Major::create($data);

            return redirect()
                ->route('majors.index')
                ->with('message_add', 'Data Sudah ditambahkan');
        } catch (\Exception $e) {
            // return response()->json([
           //     'error' => 'Failed to delete data.',
           //     'message' => $e->getMessage()
           // ], 500);
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
                'faculty_code' => $request->input('faculty_code'),
                'major' => $request->input('major')
            ];

            $datas = Major::findOrFail($id);
            $datas->update($data);
            return redirect()
                ->route('majors.index')
                ->with('message_update', 'Data Sudah diupdate');
        } catch (\Exception $e) {
             // return response()->json([
            //     'error' => 'Failed to delete data.',
            //     'message' => $e->getMessage()
            // ], 500);
            return redirect()->route('error.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $data = Major::findOrFail($id);
            $data->delete();
            return back()->with('message_delete','Data Sudah dihapus');
        } catch (\Exception $e) {
            // return response()->json([
            //     'error' => 'Failed to delete data.',
            //     'message' => $e->getMessage()
            // ], 500);
            return redirect()->route('error.index');
        }
    }
}
