<?php

namespace App\Http\Controllers;
use Validator;
use App\Http\Requests;
use Illuminate\Http\Request;
use Auth;
use Redirect;
use App\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', ['users'=>$users]);
    }

    public function search()
    {
        $users = User::all();
        $userId = Auth::id();
        $this->SetData(array('Users'=> $users, 'UserId' => $userId));
        return response()->json($this->Results);
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), User::rules());
        if ($validator->fails())
        {
            $this->Fail();
            $this->SetMessage($validator->messages()->first());
        }else{
            $user = new User();
            $user->Name = $request->Name;
            $user->Email = $request->Email;
            $user->Status = $request->Status;
            $user->isAdmin = $request->IsAdmin;
            $user->Password = bcrypt($request->Password);
            $user->DateCreated = date('Y-m-d H:i:s');
            $user->save();
        }

        return response()->json($this->Results);
    }

    public function edit($id)
    {
        $user = User::where('Id', '=', $id)->first();
        return view('users.edit', ['user' => $user]);
    }

    public function update(Request $request)
    {
    
        $id = $request->Id;
        $user = User::find($id);
        
        if( $request->Password !=''){
            $user->Password = bcrypt($request->Password);
        }
        if( $request->Status !='' && $request->IsAdmin !=''){
            $user->Status = $request->Status;
            $user->isAdmin = $request->IsAdmin;
        }
        
        $user->DateCreated = date('Y-m-d H:i:s');
        $user->save();

        return response()->json($this->Results);

    }

    public function destroy($id)
    {
        $rowaffect = User::find($id)->delete();
        if($rowaffect == 0){
            $this->SetError(true);
            $this->Results['Message'] = 'Error on user,Pls try agian!';
        }
        return response()->json($this->Results);
    }

    public function login()
    {
        return view('auth.login')->with('login_errors', 0);
    }

    public function dologin(Request $request)
    {   
        $data = $request->all();
        if (Auth::attempt(['Name' => $data['name'] , 'password' => $data['password'],'Status' =>1])) {
            Auth::login(Auth::user(), true);
            return Redirect::intended('/');
        } else {
            return View('auth.login')->with('login_errors', true);
        }
    }

    public function logout()
    {
        Auth::logout();
        return Redirect::intended('/login');
    }
}
