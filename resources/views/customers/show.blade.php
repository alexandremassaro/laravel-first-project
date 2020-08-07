@extends('layouts.app')

@section('title', 'Details for ' . $customer->name )

@section('content')
    

    <div class="row pb-5 align-items-end justify-content-center">
        @if ($customer->image)
            <div class="col-1 pr-5"><img src="{{ asset('storage/' . $customer->image) }}" alt="Profile image" class="thumbnail"></div>
        @endif
        <div class="col-3 pl-5">
            <h1>{{ $customer->name }}</h1>
        </div>
    </div>

    
    <div class="row justify-content-center">
        <div class="col-4">
            <p><strong>Name: </strong>{{ $customer->name }}</p>
            <p><strong>Company: </strong>{{ $customer->company->name }}</p>
            <p><strong>Email: </strong>{{ $customer->email }}</p>
            <p><strong>Status: </strong>{{ $customer->active }}</p>        
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-2">
            <div class="btn btn-warning">
                <a href="{{ route('customers.edit', ['customer' => $customer]) }}">Edit details</a>
            </div>
        </div>
        <div class="col-2">
            <form action="{{ route('customers.destroy', ['customer' => $customer]) }}" method="post">
                @method('delete')
                @csrf
        
                <button type="submit" class="btn btn-danger">Delete customer</button>
            </form>
        </div>
    </div>

    

@endsection