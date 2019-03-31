<?php

namespace App\Http\Controllers;
use Validator;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Requests;
use Intervention\Image\ImageManagerStatic as Image;
use File;

class CountryController extends Controller
{
    public function index()
    {
        return view('countries/index');
    }

    public function create()
    {
        return view('countries/create');
    }

    public function edit($id)
    {
        $country = Country::where('Id', '=', $id)->first();
        return view('countries.edit', ['country' => $country]);
    }

    public function update(Request $request)
    {
    
        $id = $request->Id;
        $country = Country::find($id);

        $country->Country_Name = $request->Country_Name;
        $country->Status = $request->Status;
        $country->DateCreated = date('Y-m-d H:i:s');
        $country->save();

        return response()->json($this->Results);
    }

    public function search()
    {
        $countries = Country::all();
        $this->SetData($countries);

        return response()->json($this->Results);
    }

    public function store(Request $request)
    {   

        $validator = Validator::make($request->all(), Country::rules());
        if($validator->fails())
        {
            $this->Fail();
            $this->SetMessage($validator->messages()->first());
        }else{

            $country = new Country();
            $images = $request->file('files');
            $newFilename ='';
            if ($images) {

                $dir = public_path('/uploads/countries/');
                
                /*Check folder if don't have create new*/
                if(!File::isDirectory($dir)){
                    File::makeDirectory($dir, 0777, true, true);
                }

                $newFilename =$images->getClientOriginalName();
                $i=1;
                while (File::exists($dir.$newFilename)) 
                {
                    //if file exit, add unique name
                    $newFilename = $i.'_'.date('YmdHis') . "_" . $newFilename;
                    $i++;
                }

                $images->move($dir, $newFilename);

                
            }    
            
            if($newFilename ==''){
                $country->Photo = '';

            }else{

                $country->Photo = $newFilename;

            }
           
            $country->Country_Name = $request->Country_Name;
            $country->Status = $request->Status;
            $country->DateCreated = date('Y-m-d H:i:s');
            $country->save();
            $this->SetData($country);
        }

        return view('countries/index');
    }

    public function destroy($id)
    {
        
        $country = Country::where('Id', '=', $id)->first();

        $rowaffect = Country::find($id)->delete();
        $dir = public_path('/uploads/countries/'.$country['Photo'].'');

        if (file_exists($dir)) {
            @unlink($dir);
         }

        if($rowaffect == 0){
            $this->SetError(true);
            $this->SetMessage('Error on deletd country!');
        }
        return response()->json($this->Results);
    }
}
