<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\user;

use App\Mail\Welcome;

class registrationController extends Controller
{
    public function create()
    {
    	return view('registration.create');
    }

    public function store()
    {
    	//validate the form
    	
    	$this->validate(request(), [

    		'name' => 'required',
    		'email' => 'required|email',
    		'password' => 'required|confirmed'

    	]);

    	//create and save the user
    	
    	//$user = User::create(request(['name', 'email', 'password']));
       
        $user = User::create([

            'name' => request('name'),
            'email' => request('email'), 
            'password' => bcrypt(request('password'))
        ]);
    	
    	//sign them in
    	
        auth()->login($user);

        //Send Welcome Email

        \Mail::to($user)->send(new Welcome($user));

        //Flash message

        session()->flash('message', 'Welcome Aboard!');

    	//Redirect to the home page
    	
    	return redirect()->home();
    }
}
