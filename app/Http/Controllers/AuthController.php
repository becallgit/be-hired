<?php

namespace App\Http\Controllers;
use Hash;
use Session;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class AuthController extends Controller
{

    //ruta dashboard
    public function dashboard(){
        return view('dashboard');
    }


    public function index(){
        return view('auth.login');
    }

    public function login(Request $request){
  
        $username = $request->input('username'); 
        $password = $request->input('password');

        $client = new Client();

        $apiURL =  'http://europa.appsbecallgroup.com:888/v2/sign-in';

        $data = [
            'username' => $username,
            'password' => $password,
        ];

        $auth = [ENV('USER_API'), ENV('PASS_API')];

        $response = $client->post($apiURL, [
            'json' => $data,
            'auth' => $auth,
            'verify' => false,
            'timeout' => 10, 
        ]);

        $statusCode = $response->getStatusCode();
        $apiResponse = json_decode($response->getBody(), true);
        $ok = $response->getReasonPhrase();

        if ($statusCode == 200 || $ok !== "OK") {
            $user = User::where('username', $username)->first(); 

            if($user){
                $userID = $user->id;
                Auth::loginUsingId($userID);
                return redirect()->route('dashboard')->with('ok', 'conexion');
            }else{
                $groups = $apiResponse['user']['groups'] ?? [];

                if (in_array('Informatica', $groups)) {
                    $usuario = New User();
                    $usuario->username = $username;
                    $usuario->password = Hash::make($password);
                    $usuario->role = "admin";
                    $usuario->save();
                    
                    $userID = $usuario->id;
                    Auth::loginUsingId($userID);
                    return redirect()->route('dashboard')->with('message', 'ok');
                } else {
                    return redirect()->route('login')->with('error', 'no pertenece al');
                }
                
            }
        }



    }


    public function signOut() {
        Session::flush();
        Auth::logout();
        return view("auth.login");
    }
}
