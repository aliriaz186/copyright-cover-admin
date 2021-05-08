<?php

namespace App\Http\Controllers;

use App\CancelAutoRenew;
use App\CertificateFiles;
use App\Certificates;
use App\Subscription;
use App\User;
use App\UserCardDetails;
use App\UserTokens;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use services\email_messages\ForgotPasswordMessage;
use services\email_messages\ResetPassword;
use services\email_messages\WorkProtected;
use services\email_services\EmailAddress;
use services\email_services\EmailBody;
use services\email_services\EmailMessage;
use services\email_services\EmailSender;
use services\email_services\EmailSubject;
use services\email_services\MailConf;
use services\email_services\PhpMail;
use services\email_services\SendEmailService;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $userId = Session::get('userId');
        $usersTotal = User::all()->count();
        $certificatesTotal = Certificates::all()->count();
        $certificatesFilesTotal = CertificateFiles::all()->count();
        return view('dashboard.home')->with(['usersTotal' => $usersTotal,'certificatesTotal' => $certificatesTotal,'certificatesFilesTotal' => $certificatesFilesTotal]);
    }

    public function allusers()
    {
        $users = User::all();
        foreach ($users as $user){
            $user->subscription = Subscription::where('user_id', $user->id)->first();
        }
        return view('dashboard.all-users')->with(['users' => $users]);
    }

    public function block($id)
    {
        $user = User::where('id', $id)->first();
        $user->active = 0;
        $user->update();
        session()->flash('msg', 'User Blocked!');
        return redirect()->back();
    }

    public function unblock($id)
    {
        $user = User::where('id', $id)->first();
        $user->active = 1;
        $user->update();
        session()->flash('msg', 'User UnBlocked!');
        return redirect()->back();
    }
}
