<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use File;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $customers = Customer::when($request->has('searchBy'), function ($customer) use ($request) {
            return $customer->where('first_name', 'LIKE', "%$request->searchBy%")
            ->orWhere('last_name', 'LIKE', "%$request->searchBy%")->orWhere('email', 'LIKE', "%$request->searchBy%")->orWhere('phone', 'LIKE', "%$request->searchBy%")
            ;
        })->orderBy('id',$request->has('orderBy') && $request->orderBy === 'asc' ? 'ASC' : 'DESC')->get(); 

        return view("customer.index", compact('customers'));
    }
    public function trashIndex(Request $request)

    {
        $customers = Customer::when($request->has('searchBy'), function ($customer) use ($request) {
            return $customer->where('first_name', 'LIKE', "%$request->searchBy%")
            ->orWhere('last_name', 'LIKE', "%$request->searchBy%")->orWhere('email', 'LIKE', "%$request->searchBy%")->orWhere('phone', 'LIKE', "%$request->searchBy%")
            ;
        })->orderBy('id',$request->has('orderBy') && $request->orderBy === 'asc' ? 'ASC' : 'DESC')->get(); 

        return view("customer.trash", compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CustomerRequest $request)
    {
         $customer = new Customer();
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = $image->store('', 'public');
            $filePath = '/uploads/'.$fileName;

            $customer->image = $filePath;            
        }
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->bank_account_number = $request->bank_account_number;
        $customer->about = $request->about;
        $customer->save();

        return redirect()->route('customers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $customer = Customer::findOrFail($id);
        return view('customer.details', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $customer = Customer::findOrFail($id);
        return view('customer.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CustomerRequest $request, string $id)
    {
        $customer =  Customer::findOrFail($id);
        if($request->hasFile('image')) {
            File::delete(public_path($customer->image));

            $image = $request->file('image');
            $fileName = $image->store('', 'public');
            $filePath = '/uploads/'.$fileName;

            $customer->image = $filePath;            
        }
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->bank_account_number = $request->bank_account_number;
        $customer->about = $request->about;
        $customer->save();

        return redirect()->route('customers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $customer = Customer::findOrFail($id);
        File::delete(public_path($customer->image));
        $customer->delete();

        return redirect()->route('customers.index');
    }
}
