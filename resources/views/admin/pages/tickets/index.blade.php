@extends('admin.dashboard')
@section('content')
@section('title', 'Tickets')
@section('title_page', 'All Tickets')
<div class="container">

    <div class="card mt-5">
        <div class="card-header">
            <a href="{{ route('admin.tickets.create') }}" class="btn btn-outline-primary btn-sm float-end">Create
                tickets</a>
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
                        <th scope="col">Subject</th>
                        <th scope="col">Type</th>
                        <th scope="col">Subtype</th>
                        <th scope="col">Start Date</th>
                        <th scope="col">Close Date</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($tickets as $item)
                        <tr>
                            <th scope="row">{{ $loop->index + 1 }}</th>
                            <td>{{ $item->subject }}</td>
                            <td>{{ $item->type }}</td>
                            <td>
                                @if ($item->sub_type == 'Open')
                                    <span class="badge bg-success">Open</span>
                                @elseif ($item->sub_type == 'Closed')
                                    <span class="badge bg-danger">Closed</span>
                                @elseif ($item->sub_type == 'Waiting')
                                    <span class="badge bg-warning">Waiting</span>
                                @endif
                            </td>
                            <td>{{ $item->start_date->format('Y-m-d') }}</td>
                            <td>{{ $item->closed_date->format('Y-m-d') }}</td>
                            <td>
                                <a href="{{ route('admin.tickets.edit', $item->id) }}"
                                    class="btn btn-outline-warning btn-sm">Edit</a>
                                <a data-bs-toggle="modal" data-bs-target="#deleteModal{{ $item->id }}"
                                    class="btn btn-outline-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                        @include('admin.pages.tickets.delete')
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
