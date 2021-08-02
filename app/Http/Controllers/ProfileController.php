<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Auth;

class profileController extends Controller
{
    public function update(Request $request)
    {   
        $data = $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'nullable|min:6|confirmed',
        ]);

        auth()->user()->update($request->only('name', 'email'));

        if ($data['password']) {

            auth()->user()->update([
                'password'=>bcrypt($data['password'])
            ]);
        }

        return redirect()->route('profile')->with('success', 'Profile updated successfully');
    }
} 