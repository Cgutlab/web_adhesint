<?php

namespace App\Http\Controllers\adm;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use Carbon\Carbon;
use Redirect;
use Session;
use Request;

class LoginController extends Controller
{
	public function index(){
    	return view('adm.login');
    }

    public function store(LoginRequest $request){

    	if(Auth::attempt(['user'=> $request['user'], 'password'=> $request['password']])){
    		return Redirect::to('adm');
    	}
        else{
            return view('adm.login');
        }
    }

    public function logout(){
    	Auth::logout();
    	return back();
    }
}
