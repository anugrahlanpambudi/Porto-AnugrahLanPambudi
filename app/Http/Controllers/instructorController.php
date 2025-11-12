<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use Illuminate\Http\Request;

class instructorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $instructors = Instructor::orderBy('id', 'DESC')->get();
        return view('admin.instructor.index', compact('instructors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.instructor.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Validasi input
            $validasi = $request->validate([
                'socialmedia' => 'required|string',
                'name' => 'required|string',
                'photo' => 'required|image|mimes:png,jpg,jpeg|max:2048',
                'major' => 'required|string',
            ]);

            // Proses upload gambar jika ada
            if ($request->hasFile('photo')) {
                $file = $request->file('photo');
                $filename = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('uploads/instructor', $filename, 'public');
                $validasi['photo'] = $path; // Menambahkan path gambar ke array yang akan disimpan
            }

            // Menangani fitur (jika ada)
            $socialmedia = [];
            if ($request->socialmedia) {
                $socialmedia = array_map('trim', explode(',', $request->socialmedia));
            }
            $validasi['socialmedia'] = $socialmedia; // Menambahkan fitur

            // Menyimpan data instruktur ke dalam database
            Instructor::create($validasi);

            // Redirect ke halaman daftar instruktur
            return redirect()->route('instructoradmin.index')->with('success', 'Instructor added successfully!');
        } catch (\Throwable $th) {
            // Jika terjadi error, kembali ke form dan tampilkan pesan error
            return back()->withErrors(['error' => 'An error occurred: ' . $th->getMessage()]);
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
