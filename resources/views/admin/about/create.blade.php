@extends('admin.app')
@section('title', 'About Create')
@section('content')
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <h1>{{ $error }}</h1>
        @endforeach

    @endif

    <form action="{{ route('aboutadmin.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-2">
            <label for="" class="form-label">Image</label>
            <input type="file" class="form-control" name="image" accept=".jpg,.png,.jpeg">
        </div>
        <div class="mb-2">
            <label for="" class="form-label">Title</label>
            <input type="text" class="form-control" name="title" id="">
        </div>
        <div class="mb-2">
            <label for="" class="form-label">Features</label>
            <input type="text" class="form-control" data-role="tagsinput" name="features" placeholder="Fill in the feature section" >
        </div>
        <div class="mb-2">
            <label for="" class="form-label">Description</label>
            <input type="text" class="form-control" name="description" id="">
        </div>

        <button type="submit" class="btn btn-info">Add</button>
        <a href="{{ url('aboutadmin') }}" class="btn btn-secondary">Back</a>
    </form>


@endsection
