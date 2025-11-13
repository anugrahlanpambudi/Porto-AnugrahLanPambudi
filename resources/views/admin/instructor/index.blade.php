@extends('admin.app')
@section('title', 'Instructur Menu')
@section('content')
    <div class="table-responsive">
        <div class="d-flex justify-content-end">
            <a href="{{ route('instructoradmin.create') }}" class="btn btn-info my-2">Add</a>
        </div>
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Social Media</th>
                    <th>Social Media URL</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Major</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($instructors as $index => $ints)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>
                            <ul>
                                @if ($ints->socialmedia)
                                    @foreach ($ints->socialmedia as $i)
                                        <li>{{ $i }}</li>
                                    @endforeach
                                @endif
                            </ul>
                        </td>
                        <td>
                            <ul>
                                @if ($ints->sosmed_urls)
                                    @foreach ($ints->sosmed_urls as $a)
                                        <li>{{ $a }}</li>
                                    @endforeach
                                @endif
                            </ul>
                        </td>

                        <td>{{ $ints->name }}</td>
                        <td><img src="{{ asset('storage/' . $ints->photo) }}" alt="" width="100" alt=""></td>
                        <td>{{ $ints->major }}</td>
                        <td>
                            <a href="{{ route('instructoradmin.edit', $ints->id) }}" class="btn btn-success">
                                <i class="bi bi-pencil"></i> Edit
                            </a>

                            <form class="d-inline" action="{{ route('instructoradmin.destroy', $ints->id) }}" method="POST"
                                onsubmit="return confirm('Are you sure want to delete this?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class="bi bi-trash"></i> Delete
                                </button>
                            </form>

                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>

    </div>
@endsection
