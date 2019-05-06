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
        $customer->CustomerName = $request->CustomerName;
        $customer->Sex = $request->Sex;
        $customer->PhoneNumber = $request->PhoneNumber;
        $customer->Address = $request->Address;
        $customer->TypeId = $request->TypeId;
        $customer->LastUpdated = date('Y-m-d H:i:s');
        $customer->save();

        return response()->json($this->Results);
    }

    public function destroy($id)
    {
        $rowaffect = Customer::find($id)->delete();
        if($rowaffect == 0){
            $this->SetError(true);
            $this->SetMessage('Error on delete customer!');
        }
        return response()->json($this->Results);
      }
}
