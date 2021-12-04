<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index(Request $request)
    {
        $users = User::where('status','!=',2);

        if ($request->search)
            $users->where('nati_code','LIKE',"%{$request->search}%");

        if ($request->role)
            $users->where('role','LIKE',"%{$request->role}%");

        if ($request->status)
            $users->where('status','LIKE',"%{$request->status}%");

        $users = $users->get();

        return view('pages.dashboard.user.index',compact('users'));
    }


    public function create()
    {
        return view('pages.dashboard.user.create');
    }


    public function store(RegisterRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        User::create($data);
        return back();
    }



    public function edit(User $user)
    {
        return view('pages.dashboard.user.edit',compact('user'));
    }


    public function update(UpdateUserRequest $request,User $user)
    {
        !$request->password
            ? $data = $request->except('password')
            : $data = $request->all();

        isset($data['password']) ? $data['password'] = Hash::make($data['password']) : true;

        $user->update($data);

        return redirect()->route('users.index');
    }

    public function setStatus(User $user,string $status)
    {
        $user->update([
            'status' => $status,
        ]);
        return back();
    }

}
