@extends('admin.app')
@section('title', 'Home Menu')
@section('content')
    <div class="table-responsive">
        <div class="d-flex justify-content-end">
            <a href="{{ route('aboutadmin.create') }}" class="btn btn-info my-2">Add</a>
        </div>
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Features</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>

                    <tr>
                        <td></td>
                        <td><img src="" alt="" width="100"></td>
                        <td></td>
                        <td></td>
                        <td>
                            <a href="" class="btn btn-success">
                                <i class="bi bi-pencil"></i> Edit
                            </a>

                            <form class="d-inline" action="" method="post"
                                onsubmit="return confirm('Are you sure want delete this??')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class="bi bi-trash"></i> Delete
                                </button>
                            </form>

                        </td>
                    </tr>

            </tbody>
        </table>

    </div>
@endsection
