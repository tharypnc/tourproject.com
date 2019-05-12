<?php

namespace App\Http\Controllers;
use Validator;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Requests;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('customers.index', ['Customers'=>$customers]);
    }
	
	public function search()
    {
        $customers = Customer::all();
        $this->SetData(array('Customers'=> $customers));
        return response()->json($this->Results);
    }

    public function filter($keyword='')
    {
        $key = "%$keyword%";
        $customers = Customer::where('Name', 'Like', $key)
                            ->get();
        $this->SetData($customers);

        return response()->json($this->Results);
    }

    public function edit($id)
    {
        $customer = Customer::find($id);

        return view('customers.edit', ['customer' => $customer]);
    }

    public function update(Request $request)
    {
        $id = $request->Id;
        $customer = Customer::find($id);
        $customer->Name = $request->Name;
        $customer->Email = $request->Email;
        $customer->Phone = $request->Phone;
        $customer->Verify = $request->Verify;
        $customer->Status = $request->Status;
        $customer->LastUpdated = date('Y-m-d H:i:s');
        $customer->save();

        return response()->json($this->Results);
    }

}
