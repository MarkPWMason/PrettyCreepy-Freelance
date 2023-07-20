<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function admin()
    {
        return view('admin');
    }
    public function adminLogin(Request $request)
    {
        $incomingFields = $request->validate([
            'loginusername' => 'required',
            'loginpassword' => 'required'
        ]);

        if(auth()->attempt(['username' => $incomingFields['loginusername'], 'password' => $incomingFields['loginpassword']])){
            $request->session()->regenerate();
            return redirect('/create-item');
        } else {
            return redirect('/admin');
        }
        
    }

    public function adminLogout(){
        auth()->logout();
        return redirect('/');
    }
}
