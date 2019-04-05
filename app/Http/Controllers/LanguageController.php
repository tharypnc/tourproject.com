<?php

namespace App\Http\Controllers;
use Validator;
use App\Models\Language;
use Illuminate\Http\Request;
use App\Http\Requests;

class LanguageController extends Controller
{
    public function index()
    {
        return view('languages/index');
    }

    public function create()
    {
        return view('languages/create');
    }

    public function edit($id)
    {
        $language = Language::where('Id', '=', $id)->first();
        return view('languages.edit', ['language' => $language]);
    }

    public function update(Request $request)
    {
    
        $id = $request->Id;
        $language = Language::find($id);

        $language->Lang_prefix = $request->Lang_prefix;
        $language->Lang_fullname = $request->Lang_fullname;
        $language->Lang_description = $request->Lang_description;
        $language->Lang_status = $request->Lang_status;
        $language->DateCreated = date('Y-m-d H:i:s');
        $language->save();

        return response()->json($this->Results);
    }

    public function search()
    {
        $languages = Language::all();
        $this->SetData($languages);

        return response()->json($this->Results);
    }

    public function store(Request $request)
    {   

        $validator = Validator::make($request->all(), Language::rules());
        if($validator->fails())
        {
            $this->Fail();
            $this->SetMessage($validator->messages()->first());
        }else{

            $language = new Language();
            $language->Lang_prefix = $request->Lang_prefix;
            $language->Lang_fullname = $request->Lang_fullname;
            $language->Lang_description = $request->Lang_description;
            $language->Lang_status = $request->Lang_status;
            $language->DateCreated = date('Y-m-d H:i:s');
            $language->save();
            $this->SetData($language);
        }

        return response()->json($this->Results);
    }

    public function destroy($id)
    {
        $rowaffect = Language::find($id)->delete();
        if($rowaffect == 0){
            $this->SetError(true);
            $this->SetMessage('Error on deletd language!');
        }
        return response()->json($this->Results);
    }
}
