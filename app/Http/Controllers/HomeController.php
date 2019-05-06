<?php

namespace App\Http\Controllers;
use App\Models\Language;
use App\User;
use App\Models\Customer;
use App\Models\Country;
use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function notificationCount()
    {

        $Language = Language::where('Lang_status', '=', 1)->count();
        $uActive  = User::where('Status', '=', 1)->count();
        $uInactive = User::where('Status', '=', 0)->count();
        $Country  = Country::where('Status', '=', 1)->count();
        $InCustomer = Customer::where('Status', '=', 0)->count();
        $trailCustomer = Customer::where('Status', '=', 1)
                                ->where('Verify', '=', 0)
                                ->count();
        $verifyCustomer = Customer::where('Status', '=', 1)
                                ->where('Verify', '=', 1)
                                ->count();

        $response = array(
            'language'  => $Language,
            'uActive'   => $uActive,
            'uInactive'  => $uInactive,
            'Country'  => $Country,
            'InCustomer'  => $InCustomer,
            'TrailCustomer'  => $trailCustomer,
            'verifyCustomer'  => $verifyCustomer

        );

        $this->SetData($response);

        return response()->json($this->Results);
    }

    // public function notification()
    // {
    //     $customerask  = CustomerAsk::where('StatusId', '=', CustomerAsk::WAITING)->count();
    //     $timetransfer = Sale::where('IsOrder', '=', 1)
    //                 ->where('TransferDate', '<=', date('Y-m-d H:i:s'))
    //                 ->count();
    //     $transfer = Sale::where('IsOrder', '=', 1)->count();
    //     $item = Item::all()->count();

    //     $response = array(
    //         'timetransfer'  => $timetransfer,
    //         'customerask'   => $customerask,
    //         'transfer'      => $transfer,
    //         'item'          => $item
    //     );
    //     $this->SetData($response);

    //     return response()->json($this->Results);
    // }

    // public function car(Request $request)
    // {
    //     $car = new CarNumber();
    //     $car->CarNo = $request->CarNo;
    //     $car->Description = $request->Description;
    //     $car->save();
    //     $this->Results['Id'] = $car->Id;
    //     $this->Results['saveOrupdate'] = 'save';
    //     return response()->json($this->Results);
    // }

    // public function update(Request $request)
    // {
    //     $id = $request->CarId;
    //     $car = CarNumber::find($id);
    //     $car->Description = $request->Description;
    //     $this->Results['saveOrupdate'] = 'update';
    //     $car->save();
    //     $this->Results['Id'] = $id;
    //     return response()->json($this->Results);
    // }

    // public function destroy($id)
    // {
    //     $rowaffect = CarNumber::find($id)->delete();
    //     if($rowaffect == 0){
    //         $this->SetError(true);
    //         $this->SetMessage('ការលុប​ទិន្នន័យមានបញ្ហាសូមព្យា​យាម​ម្តងទៀត');
    //     }
    //     return response()->json($this->Results);
    // }
}
