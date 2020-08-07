@extends('layouts.app')

@section('title', 'Add new Customer')

@section('content')
    
    <div class="row">
        <div class="col-12">
            <h1>Add New Customers</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <form action=" {{ route('customers.store') }} " method="post" enctype="multipart/form-data">
        
                @include('customers.form')
        
                @csrf
            </form>
        </div>
    </div>
@endsection