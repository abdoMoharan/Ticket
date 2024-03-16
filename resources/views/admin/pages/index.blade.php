@extends('admin.dashboard')
@section('content')
@section('title','Dashboard')
@section('title_page','Dashboard')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <i class='bx bx-photo-album'></i>
                            <span class="ms-2 me-4">Albums</span>
                        </div>
                        <div>
                            <a href="" class=" text-decoration-none"><h4 class="mb-0">count</h4></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
