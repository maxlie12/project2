<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use TypeError;

class AuthenticateController extends Controller
{
    public function login()
    {
        return view('login');
    }
    public function loginProcess(Request $request)
    {
        $email = $request->get('email');
        $password = $request->get('password');
        try {
            $admin = Admin::where('email', $email)->where('password', $password)
                ->firstOrFail();
            $request->session()->put('admin', $admin->idAdmin);
            return Redirect::route('dashboard');
        } catch (Exception $e) {
            //throw $th;
            return Redirect::route('login')->with('error', 'sai tai khoan hoac mat khau');
        }
    }
    public function logout(Request $request)
    {
        $request->session()->forget('idAdmin');
        return Redirect::route('login');
    }
}
