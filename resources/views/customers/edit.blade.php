@extends('layouts.app')

@section('title', 'Edit Details for ' . $customer->name)

@section('content')
    
    <div class="row">
        <div class="col-12">
            <h1>Edit Details for {{ $customer->name }}</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <form action="{{ route('customers.update', ['customer' => $customer]) }}" method="post" enctype="multipart/form-data">
                @method('PATCH')
                @include('customers.form')
        
                @csrf
            </form>
        </div>
    </div>
@endsection