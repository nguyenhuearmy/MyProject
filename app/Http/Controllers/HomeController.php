<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    
    public function email(){
        return view('email/add');
    }
    
    public function addEmail(Request $request){
        
        $credentials = $request->only('email', 'name', 'username');
        
        $user = User::create([
    	    'name' => $credentials['name'],
            'username' => $credentials['username'],
            'email' => $credentials['email'],
    	    'password' => bcrypt('12345678'),
    	    'key' => 0,
    	]);
        
        \Mail::send('email.welcome', ['user' => $user, 'generate_password' => '12345678'], function ($message) use ($user){
    		$message->from('nguyenthanhhoan0412@gmail.com', "Employee Directory");
    		$message->subject("Welcome to Employee Directory");
    		$message->to($user->email, $user->name);
    	});
        
        \Session::flash('message', 'New Administrator has been created successfully !');
    	return redirect('/');
    }
}
