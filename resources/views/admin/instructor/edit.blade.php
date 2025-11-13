@extends('admin.app')
@section('title', 'Instructor Edit')
@section('content')
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <h1>{{ $error }}</h1>
        @endforeach

    @endif

    <form action="{{ route('instructoradmin.update', $instructor->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <!-- Input fitur -->
        <div class="mb-2">
            <label class="form-label">Social Media</label>
            <!-- Tampilkan fitur sebagai teks koma (array → string) untuk tagsinput -->
            <input type="text" class="form-control" data-role="tagsinput"
                value="{{ implode(',', (array) $instructor->socialmedia) }}" name="socialmedia"
                placeholder="Fill in the social media section">

        </div>
        <div class="mb-2">
            <label class="form-label">Social Media Urls</label>
            <!-- Tampilkan fitur sebagai teks koma (array → string) untuk tagsinput -->
            <input type="url" class="form-control" data-role="tagsinput"
                value="{{ implode(',', (array) $instructor->sosmed_urls) }}" name="sosmed_urls"
                placeholder="Fill in the social media section">

        </div>
        <!-- Input judul -->
        <div class="mb-2">
            <label class="form-label">Name</label>
            <!-- Tampilkan judul lama untuk diedit -->
            <input type="text" class="form-control" name="name" value="{{ $instructor->name }}">
        </div>
        <!-- Input gambar -->
        <div class="mb-2">
            <label class="form-label">Image</label>
            <div my-2>
                <!-- Tampilkan gambar lama dari database -->
                <img src="{{ asset('storage/' . $instructor->photo) }}" width="120" alt="">
            </div>
            <!-- Upload gambar baru -->
            <input type="file" class="form-control" name="photo" accept=".jpg,.png,.jpeg">
        </div>



        <!-- Input deskripsi -->
        <div class="mb-2">
            <label class="form-label">Major</label>
            <!-- Tampilkan deskripsi lama untuk diedit -->
            <input type="text" class="form-control" name="major" value="{{ $instructor->major }}">
        </div>

        <!-- Tombol aksi -->
        <!-- Update data -->
        <button type="submit" class="btn btn-info">Update</button>
        <!-- Kembali ke halaman daftar -->
        <a href="{{ url('instructoradmin') }}" class="btn btn-secondary">Back</a>


    </form>


@endsection
