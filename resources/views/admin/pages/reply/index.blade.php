@extends('admin.dashboard')
@section('content')
@section('title', 'Reply')
@section('title_page', 'All Reply')
<div class="container">

    <div class="card mt-5">
        <div class="card-header">
            <a href="{{ route('admin.reply.create') }}" class="btn btn-outline-primary btn-sm float-end">Create
                Reply</a>
        </div>

        <div class="card-body">
            @if (session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">message</th>
                        <th scope="col">user</th>
                        <th scope="col">Tickets</th>
                        <th scope="col">Reply Date</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($replys as $item)
                        <tr>
                            <th scope="row">{{ $loop->index + 1 }}</th>
                            <td>{{ $item->message }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>
                                {{$item->ticket->subject}}
                            </td>
                            <td>{{ $item->reply_date->format('Y-m-d') }}</td>
                            <td>
                                <a data-bs-toggle="modal" data-bs-target="#deleteModal{{ $item->id }}"
                                    class="btn btn-outline-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                        @include('admin.pages.reply.delete')
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-danger">No data found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
