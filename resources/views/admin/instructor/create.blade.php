@extends('admin.app')
@section('title', 'Instructor Create')
@section('content')
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <h1>{{ $error }}</h1>
        @endforeach

    @endif

    <form action="{{ route('instructoradmin.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-2">
            <label for="" class="form-label">Social Media</label>
            <input type="text" class="form-control" data-role="tagsinput" name="socialmedia" placeholder="Fill in the feature section" >
        </div>
        <div class="mb-2">
            <label for="" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="">
        </div>
        <div class="mb-2">
            <label for="" class="form-label">Image</label>
            <input type="file" class="form-control" name="image" accept=".jpg,.png,.jpeg">
        </div>
        <div class="mb-2">
            <label for="" class="form-label">Major</label>
            <input type="text" class="form-control" name="major" id="">
        </div>


        <button type="submit" class="btn btn-info">Add</button>
        <a href="" class="btn btn-secondary">Back</a>
    </form>


@endsection
