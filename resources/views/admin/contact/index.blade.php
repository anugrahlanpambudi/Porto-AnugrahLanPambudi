@extends('admin.app')
@section('title', 'Contact Menu')
@section('content')
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Reply</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contacts as $index => $contact)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{  $contact->name }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->subject }}</td>
                        <td>{{ $contact->message }}</td>
                        <td>{{ $contact->reply ?? '-' }}</td>
                        <td>
                            <form action="{{ route('contactadmin.reply', $contact->id) }}" method="post">
                                @csrf
                                <textarea class="form-control" name="reply" cols="30" rows="5" required></textarea>
                                <button class="btn btn-info btn-sm mt-2">Send a reply</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
