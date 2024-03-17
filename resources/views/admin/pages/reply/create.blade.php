@extends('admin.dashboard')
@section('content')
@section('title', 'reply')
@section('title_page', 'Create reply')
<div class="container ">

    <div class="card mt-5">
        <div class="card-header">
            <a href="{{ route('admin.reply.index') }}" class="btn btn-outline-primary btn-sm float-end">Back</a>
        </div>

        <div class="card-body ">
            @if (session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <form id="myForm" method="post" action="{{route('admin.reply.store')}}">
                @csrf
                <div class="row">
                    <div class="col-md-6">
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
                    <div class="col-md-6">
                        <div class="col-md-12">
                            <div class="form-group mb-2">
                                <label for="ticket_id">Tickets</label>
                                <select name="ticket_id" id="ticket_id" class="form-control">
                                    <option value="" disabled selected>Select ticket</option>
                                    @foreach (@$tickets as $ticket)
                                    <option value="{{ @$ticket->id }}">{{ @$ticket->subject }}</option>
                                    @endforeach
                                </select>
                                @error('ticket_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
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
