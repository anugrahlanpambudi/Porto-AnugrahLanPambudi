<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
                'sosmed_urls' => 'required|string',
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

            $sosmed_urls = [];
            if ($request->sosmed_urls) {
                $sosmed_urls = array_map('trim', explode(',', $request->sosmed_urls));
            }
            $validasi['sosmed_urls'] = $sosmed_urls;

            // Menambahkan fitur

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
        $instructor = Instructor::find($id);
        return view('admin.instructor.edit', compact('instructor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $instructor = Instructor::findOrFail($id);

            // ✅ Ubah 'required' jadi 'nullable'
            $validasi = $request->validate([
                'socialmedia' => 'nullable|string',
                'sosmed_urls' => 'nullable|string',
                'name' => 'required|string',
                'photo' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
                'major' => 'required|string',
            ]);

            // ✅ Jika ada file foto baru, hapus yang lama & simpan yang baru
            if ($request->hasFile('photo')) {
                if ($instructor->photo && Storage::disk('public')->exists($instructor->photo)) {
                    Storage::disk('public')->delete($instructor->photo);
                }

                $file = $request->file('photo');
                $filename = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('uploads/instructor', $filename, 'public');
                $validasi['photo'] = $path;
            } else {
                // ✅ Jika tidak ada file baru, pertahankan foto lama
                $validasi['photo'] = $instructor->photo;
            }

            // ✅ Ubah string socialmedia menjadi array (kalau diinginkan)
            $socialmedia = [];
            if ($request->socialmedia) {
                $socialmedia = array_map('trim', explode(',', $request->socialmedia));
            }
            $validasi['socialmedia'] = $socialmedia;

            $sosmed_urls = [];
            if ($request->sosmed_urls) {
                $sosmed_urls = array_map('trim', explode(',', $request->sosmed_urls));
            }
            $validasi['sosmed_urls'] = $sosmed_urls;

            // ✅ Update data ke database
            $instructor->update($validasi);

            return redirect()->route('instructoradmin.index')->with('success', 'Data instruktur berhasil diperbarui!');
        } catch (\Throwable $th) {
            return back()->withErrors(['error' => 'Terjadi kesalahan: ' . $th->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $instructor = Instructor::findOrFail($id);

        // Hapus gambar lama kalau ada
        if ($instructor->photo && Storage::disk('public')->exists($instructor->photo)) {
            Storage::disk('public')->delete($instructor->photo);
        }

        $instructor->delete();

        return redirect()->route('instructoradmin.index')->with('success', 'Data berhasil dihapus!');
    }
}
