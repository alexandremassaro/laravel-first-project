@extends('layouts.app')

@section('title', 'Customer List')

@section('content')
    
    <div class="row justify-content-center">
        <div class="col-9">
            <h1>Customers</h1>
        </div>
    </div>

    @can('create', App\Customer::class)
        <div class="row justify-content-center">
            <div class="col-9">
                <a href="{{ route('customers.create') }}">Add New Customer</a>
            </div>
        </div>        
    @endcan



    @foreach ($customers as $customer)
        <div class="row justify-content-center">
            <div class="col-1">
                {{ $customer->id }}
            </div>
            <div class="col-2">
                @can('view', $customer)
                    <a href="{{ route('customers.show', ['customer' => $customer]) }}">{{ $customer->name }}</a>
                @endcan

                @cannot('view', $customer)
                    {{ $customer->name }}
                @endcannot
            </div>
            <div class="col-2">
                {{ $customer->company->name }}
            </div>
            <div class="col-2">
                {{ $customer->email }}
            </div>
            <div class="col-2">
                {{ $customer->active }}
            </div>
        </div>
    @endforeach

    <div class="row pt-5">
        <div class="col-12 d-flex justify-content-center">
            {{ $customers->links()  }}
        </div>
    </div>

@endsection