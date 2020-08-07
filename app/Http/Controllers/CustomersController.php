<?php

namespace App\Http\Controllers;

use App\Company;
use App\Customer;
use App\Events\NewCustomerHasRegisteredEvent;
use Intervention\Image\Facades\Image;
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
        //$customers = Customer::all();
        $customers = Customer::with('company')->paginate(15);

        
        //return view('customers.index', compact('activeCustomers', 'inactiveCustomers'));
        return view('customers.index', compact('customers'));
    }
    
    public function create()
    {
        $this->authorize('create', Customer::class);
        $companies = Company::all()->sortBy('name');
        $customer = new Customer();
        return view('customers.create', compact('companies', 'customer'));
    }

    public function store() {

        $this->authorize('create', Customer::class);

        $customer = Customer::create($this->validateRequest());

        $this->storeImage($customer);

        event(new NewCustomerHasRegisteredEvent($customer));

        return redirect('customers');
    }

    public function show(Customer $customer)
    {
        //$customer = Customer::Where('id', $customer)->firstOrFail();

        $this->authorize('view', $customer);

        return view('customers.show', compact('customer'));
    }

    public function edit(Customer $customer)
    {
        //$customer = Customer::Where('id', $customer)->firstOrFail();

        //$company = Company::where('id', $customer->company_id)->firstOrFail;

        $this->authorize('update', $customer);

        $companies = Company::all();
        
        return view('customers.edit', compact('customer', 'companies'));
    }

    public function update(Customer $customer) {

        $this->authorize('update', $customer);
        
        $customer->update($this->validateRequest());

        $this->storeImage($customer);

        return redirect('customers/' . $customer->id);
    }

    public function destroy(Customer $customer) {

        $this->authorize('delete', $customer);

        $customer->delete();

        return redirect('customers');
    }

    public function validateRequest() {

        return request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'active' => 'required',
            'company_id' => 'required',
            'image' => 'sometimes|file|image|max:5000'
        ]);
    }

    private function storeImage($customer) {
        if (request()->has('image')) {
            $customer->update([
                'image' => request()->image->store('uploads', 'public'),
            ]);

            $image = Image::make(public_path('storage/' . $customer->image))->resize(100, 100, function($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });

            $image->save();
        }
    }
}
