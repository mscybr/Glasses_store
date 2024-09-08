<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    
    private function is_api($request){
        return strpos( $request->getRequestUri(), "/api") > 0;
    }
    

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
    
        try {

            $fields = $request->validate([
                'email' => ["required", "email","exists:users,email"],
                'password' => ["required", "min:6"],
            ]);
        } catch (\Illuminate\Validation\ValidationException $th) {
            if( $this->is_api($request) ){
                return response()->json(['error' => 'Bad Request', "error_fields" => $th->validator->errors()], 400);
            }
        }
        
        if( $this->is_api($request) ){
            if( $token = auth("api")->attempt($fields) ){
                return $this->respondWithToken($token);
            }else{
                return response()->json(['error' => 'Unauthorized'], 401);
            }

        }else{

            if(  auth()->attempt($fields) ){
                $request->session()->regenerate();
                return redirect()->route("shop");
            }else{
                return redirect()->back()->withErrors(trans("auth.failed"))->withInput();;
            }
        }
    }

    public function logout(Request $request){


        if( $this->is_api($request) ){
            auth("api")->logout();
            return response()->json(['message' => 'Successfully logged out']);
        }else{
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
            return redirect()->route("shop");
        }
    }


    public function refresh()
    {
        return $this->respondWithToken(auth("api")->refresh());
    }

    public function me()
    {
        return response()->json(auth("api")->user());
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $fields = $request->validate([
                'name' => ["required", "string", "min:3"],
                'email' => ["required", "email", Rule::unique("users", "email")],
                'password' => ["required", "confirmed", "min:6"],
                'countryCode' => ["required", "numeric"],
                'number' => ["required", "numeric"],
            ]);
        } catch (\Illuminate\Validation\ValidationException $th) {
            if( $this->is_api($request) ){
                return response()->json(['error' => 'Bad Request', "error_fields" => $th->validator->errors()], 400);
            }else{
                return redirect()->back()->withErrors( $th->validator->errors())->withInput();
            }
        }
        $fields["number"] = $fields["countryCode"].$fields["number"];
        $fields["role"] = "admin";
        $fields["password"] = bcrypt($fields["password"]);
        unset($fields["countryCode"]);
        // dd($fields);
        $new_user = User::create($fields);
        if( $this->is_api($request) ){
            return $this->respondWithToken(auth("api")->login($new_user));
        }else{
            auth()->login($new_user);
            return redirect()->route('shop');
        }
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth("api")->factory()->getTTL() * 60
        ]);
    }

}
