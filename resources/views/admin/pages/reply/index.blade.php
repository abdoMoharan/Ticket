@extends('admin.dashboard')
@section('content')
@section('title', 'Reply')
@section('title_page', 'All Reply')
<div class="container">

    <div class="card mt-5">
        <div class="card-header">
            <a href="{{ route('admin.reply.index') }}" class="btn btn-outline-primary btn-sm float-end">Create
                tickets</a>
        </div>

        <div class="card-body">
            @if (session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

        </div>
    </div>
</div>
@endsection
