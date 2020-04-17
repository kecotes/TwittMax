<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function show(User $user){
        $entries = \App\Entry::where('user_id',$user->id)->get();
        return view('user.show', compact('user','entries'));
    }
}
