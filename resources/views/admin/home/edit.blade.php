@extends('admin.app')
@section('title', 'Home Update')
@section('content')
    @if ($errors->any())
        @foreach ($errors->all() as $error )
            <h1>{{ $error }}</h1>
        @endforeach

    @endif

    <form action="{{ route('homeadmin.update', $home->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-2">
            <label for="" class="form-label">Inage</label>
            <div>
                <img src="{{ asset('storage/' . $home->image) }}" width="120" alt="">
            </div>
            <input type="file" class="form-control" name="image" accept=".jpg,.png,.jpeg">
        </div>
        <div class="mb-2">
            <label for="" class="form-label">Subtitle</label>
            <input type="text" class="form-control" value="{{ $home->subtitle }}" name="subtitle" id="">
        </div>
        <div class="mb-2">
            <label for="" class="form-label">Title</label>
            <input type="text" class="form-control" value="{{ $home->title }}"  name="title" id="">
        </div>
        <div class="mb-2">
            <label for="" class="form-label">Description</label>
            <textarea class="form-control" name="description" cols="30" rows="5" id="">{{ $home->description }}</textarea>
        </div>

        <button type="submit" class="btn btn-info">Update</button>
        <a href="{{ url('homeadmin') }}" class="btn btn-secondary">Back</a>
    </form>
@endsection
