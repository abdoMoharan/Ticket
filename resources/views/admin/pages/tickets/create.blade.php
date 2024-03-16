@extends('admin.dashboard')
@section('content')
@section('title', 'Tickets')
@section('title_page', 'Create Tickets')
<div class="container ">

    <div class="card mt-5">
        <div class="card-header">
            <a href="{{ route('admin.tickets.index') }}" class="btn btn-outline-primary btn-sm float-end">Back</a>
        </div>

        <div class="card-body ">
            @if (session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <form id="myForm" method="post" action="{{ route('admin.tickets.store') }}">
                @csrf
                <div class="row">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group mb-2">
                                        <label for="subject">Subject</label>
                                        <input type="text" class="form-control" name="subject" id="subject"
                                            placeholder="Enter subject">
                                        @error('subject')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mb-2">
                                        <label for="message">Message</label>
                                        <textarea name="message" id="message" class="form-control" placeholder="Enter message"></textarea>
                                        @error('message')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group mb-2">
                                        <label for="type">Type</label>
                                        <select name="type" id="type" class=" form-control">
                                            <option value="Normal">Normal</option>
                                            <option value="Transfer">Transfer</option>
                                            <option value="Complain">Complain</option>
                                        </select>
                                        @error('type')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mb-2">
                                        <label for="start_date">Start Date</label>
                                        <input type="date"  id="start_date" name="start_date" class=" form-control">
                                        @error('start_date')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="closed_date">Cloesd Data</label>
                                        <input type="date"  id="closed_date" name="closed_date" class=" form-control">
                                        @error('closed_date')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <button type="submit" class="btn btn-success float-end">Save</button>
        </div>
        </form>
    </div>


</div>

</div>
@endsection
