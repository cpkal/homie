<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $id = Auth::id();
        $data['user'] = User::find($id);
        
        return view('users.profile', $data);
    }

    public function update(Request $request)
    {
        $id = Auth::id();
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->gender = $request->gender;
        $user->save();

        return redirect()->route('profile')->with('success', 'Profile berhasil diupdate');
    }
}
