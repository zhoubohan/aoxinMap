<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;

class SessionsController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }

    public function store(Request $request)
    {
        $credentials = $this->validate($request, [
            'email' => 'required|email|max:255',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            return redirect()->route('lists.show', [Auth::user()]);
        }else {
            session()->flash('danger', '很抱歉，您邮箱密码不匹配');
            return redirect()->back();
        }

        return;
    }

    public function destroy()
    {

    }
}
