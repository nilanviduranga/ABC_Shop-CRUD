<?php

namespace App\Http\Controllers;

use App\Models\login;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $task;

    public function __construct()
    {
        $this->task = new login();
    }

    public function login()
    {
        return view('pages.home.index');
    }

    public function register()
    {
        return view('pages.home.register');
    }

    public function storeRegister(Request $request)
    {
        try {
            $this->task->create($request->all());
            return redirect()->route('login')->with('success', 'Registration successful. You can now log in.');
        } catch (\Exception $e) {
            return redirect()->route('register')->with('error', 'Something went wrong. Please try again later.');
        }
    }

    public function checkUser(Request $request)
    {
        $un = $request->input('user_name');
        $pw = $request->input('password');
       // dd($pw);

        $response = $this->task->all();
        foreach ($response as $data) {
            if($data->user_name==$un && $data->password==$pw ){
                return redirect()->route('adminDashboard');
            }
        }
        return redirect()->route('login')->with('error', 'Username or password is incorrect.');

    }

}
