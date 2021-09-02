<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function editProfile()
    {
        $auth = null;
        if (auth('admin')->check()) {
            $auth = auth('admin')->user();
        }
        if (auth('participant')->check()) {
            $auth = auth('participant')->user();
        }
        if (auth()->check()) {
            $auth = auth()->user();
        }
        return view('auth.edit-profile', compact('auth'));
    }

    public function updateProfile(Request $request)
    {
        $dataValidated = $this->validate($request, [
            'nama' => 'required|string',
            'email' => 'required|email',
            'old_password' => 'required',
            'password' => 'required|confirmed|min:5',
        ]);
        $dataValidated['password'] = bcrypt($request->password);
        $data = array_except($dataValidated, ['old_password']);

        if (auth('admin')->check()) {
            if (password_verify($request->old_password, auth('admin')->user()->password)) {
                auth('admin')->user()->update($data);
                return redirect(action("DashboardController@index"))->with('update', '"Profile" Berhasil Diperbarui');
            } else {
                return back()->with('old_password', 'Password Lama Salah');
            }
        }
        if (auth('participant')->check()) {
            if (password_verify($request->old_password, auth('participant')->user()->password)) {
                auth('participant')->user()->update($data);
                return redirect(action("DashboardController@index"))->with('update', '"Profile" Berhasil Diperbarui');
            } else {
                return back()->with('old_password', 'Password Lama Salah');
            }
        }
        if (auth()->check()) {
            if (password_verify($request->old_password, auth()->user()->password)) {
                auth()->user()->update($data);
                return redirect(action("DashboardController@index"))->with('update', '"Profile" Berhasil Diperbarui');
            } else {
                return back()->with('old_password', 'Password Lama Salah');
            }
        }
        return back();
    }
}
