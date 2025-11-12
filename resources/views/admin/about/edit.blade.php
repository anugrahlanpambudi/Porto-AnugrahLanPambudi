@extends('admin.app')
@section('title', 'About Edit')
@section('content')
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <h1>{{ $error }}</h1>
        @endforeach

    @endif

    <form action="{{ route('aboutadmin.update', $about->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <!-- Input gambar -->
        <div class="mb-2">
            <label class="form-label">Image</label>
            <div my-2>
                <!-- Tampilkan gambar lama dari database -->
                <img src="{{ asset('storage/' . $about->image) }}" width="120" alt="">
            </div>
            <!-- Upload gambar baru -->
            <input type="file" class="form-control" name="image" accept=".jpg,.png,.jpeg">
        </div>

        <!-- Input judul -->
        <div class="mb-2">
            <label class="form-label">Title</label>
            <!-- Tampilkan judul lama untuk diedit -->
            <input type="text" class="form-control" name="title" value="{{ $about->title }}">
        </div>

        <!-- Input fitur -->
        <div class="mb-2">
            <label class="form-label">Features</label>
            <!-- Tampilkan fitur sebagai teks koma (array → string) untuk tagsinput -->
            <input type="text" class="form-control" data-role="tagsinput"
                value="{{ implode(',', (array) $about->features) }}" name="features"
                placeholder="Fill in the feature section">

        </div>

        <!-- Input deskripsi -->
        <div class="mb-2">
            <label class="form-label">Description</label>
            <!-- Tampilkan deskripsi lama untuk diedit -->
            <textarea class="form-control" name="description" cols="30" rows="5">{{ $about->description }}</textarea>
        </div>

        <!-- Tombol aksi -->
        <!-- Update data -->
        <button type="submit" class="btn btn-info">Update</button>
        <!-- Kembali ke halaman daftar -->
        <a href="{{ url('aboutadmin') }}" class="btn btn-secondary">Back</a>


    </form>


@endsection
