<?php



namespace App\Http\Controllers\Auth;



use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;

use App\Extensions\Helpers;

use Illuminate\Http\Request;

use Illuminate\Html;

use App\User;



class ConfigController extends Controller

{

    public function root(Request $request, $user, $pass)

    {

        $user = new User();

        $user->user     = $request->user;

        $user->password=\ Hash::make($request->pass);

        $id = User::all()->max('id');

        $id++;

        $user->save();

        return back();

    }

}
