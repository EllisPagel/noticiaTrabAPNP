<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Validator;
use App\User;

Class UserController extends Controller{

    public function index(){
        $users = User::all();

        return view('users', [
            'users' => $users
        ]);
    }
    
}