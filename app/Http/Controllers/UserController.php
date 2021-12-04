<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        $users = User::where('status','!=',2)->get();
        return view('pages.dashboard.users',compact('users'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {

    }



    public function edit($id)
    {
        //
    }


    public function update(User $user)
    {

    }

    public function setStatus(User $user,int $status)
    {
        $user->update([
            'status' => $status,
        ]);
        return back();
    }

}
