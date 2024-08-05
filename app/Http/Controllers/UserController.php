<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    

    public function login()
    {
        if( Auth::user() == false ){
            return view("en.store.login");
        }else{
            return redirect()->route('shop');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if( Auth::user() == false ){
            return view("en.store.register");
        }else{
            return redirect()->route('shop');
        }
    }

    public function authenticate(Request $request){
        // dd(auth());
        $fields = $request->validate([
            'email' => ["required", "email"],
            'password' => ["required", "min:6"],
        ]);
       
        if( Auth::attempt($fields)){
            $request->session()->regenerate();

            return redirect()->route("shop");
        }else{
            return redirect()->back()->withErrors(trans("auth.failed"))->withInput();;
        }
    }

    public function logout(Request $request){
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route("shop");
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            'name' => ["required", "string", "min:3"],
            'email' => ["required", "email", Rule::unique("users", "email")],
            'password' => ["required", "confirmed", "min:6"],
            'countryCode' => ["required", "numeric"],
            'number' => ["required", "numeric"],
        ]);
        $fields["number"] = $fields["countryCode"].$fields["number"];
        $fields["role"] = "admin";
        $fields["password"] = bcrypt($fields["password"]);
        unset($fields["countryCode"]);
        // dd($fields);
        $new_user = User::create($fields);
        auth()->login($new_user);
        return redirect()->route('shop');
    }

}
