<?php

namespace App\Http\Controllers;

use App\Company;
use App\Customer;
use App\Events\NewCustomerHasRegisteredEvent;
use Illuminate\Http\Request;

class CustomersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index() {

        // $activeCustomers = Customer::active()->get();
        // $inactiveCustomers = Customer::inactive()->get();
        $customers = Customer::all();

        
        //return view('customers.index', compact('activeCustomers', 'inactiveCustomers'));
        return view('customers.index', compact('customers'));
    }
    
    public function create()
    {
        $companies = Company::all()->sortBy('name');
        $customer = new Customer();
        return view('customers.create', compact('companies', 'customer'));
    }

    public function store() {

        $customer = Customer::create($this->validateRequest());

        event(new NewCustomerHasRegisteredEvent($customer));

        return redirect('customers');
    }

    public function show(Customer $customer)
    {
        //$customer = Customer::Where('id', $customer)->firstOrFail();

        return view('customers.show', compact('customer'));
    }

    public function edit(Customer $customer)
    {
        //$customer = Customer::Where('id', $customer)->firstOrFail();

        //$company = Company::where('id', $customer->company_id)->firstOrFail;
        $companies = Company::all();
        
        return view('customers.edit', compact('customer', 'companies'));
    }

    public function update(Customer $customer) {

        $customer->update($this->validateRequest());

        return redirect('customers/' . $customer->id);
    }

    public function destroy(Customer $customer) {

        $customer->delete();

        return redirect('customers');
    }

    public function validateRequest()
    {
        return request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'active' => 'required',
            'company_id' => 'required'
        ]);
    }
}
