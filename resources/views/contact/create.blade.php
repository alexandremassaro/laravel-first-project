@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')

<div class="row justify-content-center">
    <div class="col-6"><h1>Contact us</h1></div>
</div>

@if (session('message'))
<div class="row justify-content-center">
    <div class="col-6">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> {{ session('message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
</div>
@endif

<form action="{{ route('contact.store') }}" method="POST">
    <div class="form-group">
        <div class="row justify-content-center">
            <div class="col-6"><label for="name">Name</label></div>
        </div>
        <div class="row justify-content-center">
            <div class="col-6"><input type="text" name="name" value="{{ old('name') }}" class="form-control"></div>
        </div>
        <div class="row justify-content-center">
            <div class="col-6">{{ $errors->first('name') }}</div>
        </div>
    </div>
    <div class="form-group">
        <div class="row justify-content-center">
            <div class="col-6"><label for="email">Email</label></div>
        </div>
        <div class="row justify-content-center">
            <div class="col-6"><input type="text" name="email" value="{{ old('email') }}" class="form-control"></div>
        </div>
        <div class="row justify-content-center">
            <div class="col-6">{{ $errors->first('email') }}</div>
        </div>
    </div>
    <div class="form-group">
        <div class="row justify-content-center">
            <div class="col-6"><label for="message">Message</label></div>
        </div>
        <div class="row justify-content-center">
            <div class="col-6"><textarea name="message" id="message" cols="30" rows="10" value="{{ old('email') }}" class="form-control"></textarea></div>
        </div>
        <div class="row justify-content-center">
            <div class="col-6">{{ $errors->first('message') }}</div>
        </div>
    </div>

        @csrf
        
        <div class="row justify-content-end">
            <div class="col-5">
                <button type="submit" class="btn btn-primary">Send Message</button>
            </div>
        </div>

    </form>
@endsection