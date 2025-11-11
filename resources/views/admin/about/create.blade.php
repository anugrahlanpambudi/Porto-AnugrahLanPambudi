@extends('admin.app')
@section('title', 'About Create')
@section('content')
    @if ($errors->any())
        @foreach ($errors->all() as $error )
            <h1>{{ $error }}</h1>
        @endforeach

    @endif

    <form action="{{ route('homeadmin.store') }}" method="post" enctype="multipart/form-data">
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
            <div id="featurewrap">
                <div class="feature-item d-flex w-50">
                    <input type="text" class="form-control feature" name="feature" placeholder="Fill in the feature section" id="">
                    <button type="button" class="removeFeature btn btn-danger">Remove</button>
                </div>
            </div>
            <button type="button" class="btn btn-primary" id="addFeature">Add</button>
        </div>


        <button type="submit" class="btn btn-info">Add</button>
        <a href="{{ url('homeadmin') }}" class="btn btn-secondary">Back</a>
    </form>

    <script>
        const wrapper = document.querySelector('#featurewrap');
        const addBtn  = document.querySelector('#addFeature');

        addBtn.addEventListener('click', function(){
            const newInpt = document.createElement('div');
            newInpt.classList.add('feature-item');
            newInpt.innerHTML = `
             <input type="text" class="form-control feature" placeholder="Fill in the feature section" >
             <button type="button" class="removeFeature btn btn-danger">Remove</button>
            `;
            wrapper.appendChild(newInpt);
        });
    </script>
@endsection
