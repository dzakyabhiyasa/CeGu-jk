<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Utilities\Helpers;
use App\Http\Requests\Index\UpdateProfileRequest;
use App\Http\Requests\Index\UpdatePasswordRequest;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{

    public function landing(){
        return view('index.home');
    }

    public function index()
    {
        return view('index.index');
    }

    public function detail()
    {
        return view('index.detail');
    }

    public function profile()
    {
        return view('index.profile');
    }

    public function profilePost(UpdateProfileRequest $request)
    {
        Auth::user()->update([
            'name' => $request['name'],
            'phone_number' => $request['phone_number'],
            'address' => $request['address']
        ]);
        return Helpers::successRedirect('profile', 'Berhasil merubah profil !');
    }

    public function profilePassword(UpdatePasswordRequest $request)
    {
        Auth::user()->update([
            'password' => Hash::make($request['password'])
        ]);
        return Helpers::successRedirect('profile', 'Berhasil merubah password !');
    }

    public function booking()
    {
        return view('index.booking');
    }

}
