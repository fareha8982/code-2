@extends('admin.layout')

@section('content')
<div class="container mt-5">
        <h2 class="mb-4">Competition Submissions</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Essay ID</th>
                    <th> Essay_Title</th>
                    <th>Topic</th>
                    <th>Content</th>
                    <th>Submitted At</th>
                </tr>
            </thead>
            <tbody>
                @foreach($essays as $essay)
                <tr>
                    <td>{{ $essay->id }}</td>
                    <td>{{ $essay->title }}</td>
                    <td>{{ $essay->topic }}</td>
                    <td>{{ Str::limit($essay->content, 100) }}</td>
                    <td>{{ $essay->created_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
