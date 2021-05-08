<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function adminlogin(Request $request){
        try {
            if (Admin::where('username', $request->email)->where('password', $request->password)->exists()) {
                $admin = Admin::where('username', $request->email)->where('password', $request->password)->first();
                Session::put('userId', $admin->id);
                return redirect('dashboard');
            } else {
                return redirect()->back()->withErrors(['Invalid Credentials. Please Try Again!']);
            }
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors([$exception->getMessage()]);

        }
    }
}
