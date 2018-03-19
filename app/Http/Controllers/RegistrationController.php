<?php

namespace App\Http\Controllers;

use App\User;

class RegistrationController extends Controller
{
    public function create()
    {
    	return view('sessions.create');
    }

    public function store()
    {
    	$this->validate(request(), [
    		'name' => 'required',
    		'email' => 'required|email',
    		'password' => 'required'
    	]);


    	$user = User::create(request(['name', 'email', 'password']));

    	auth()->login($user);

    	return redirect()->home();


    }
}