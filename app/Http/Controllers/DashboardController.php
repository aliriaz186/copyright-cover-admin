<?php

namespace App\Http\Controllers;

use App\CancelAutoRenew;
use App\CertificateFiles;
use App\Certificates;
use App\Subscription;
use App\User;
use App\UserCardDetails;
use App\UserTokens;
use App\WebsiteText;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use services\email_messages\ForgotPasswordMessage;
use services\email_messages\JobCreationMessage;
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
            $user->tokens = UserTokens::where('user_id', $user->id)->first();
        }
        return view('dashboard.all-users')->with(['users' => $users]);
    }

    public function uploadUserFilesPage($id){
        $user = User::where('id',  $id)->first();
        return view('dashboard.upload-new-work')->with(['user' => $user]);
    }

    public function postAddTokens(Request $request){
        try {
            if (UserTokens::where('user_id', $request->selectedUserId)->exists()){
                $token = UserTokens::where('user_id', $request->selectedUserId)->first();
                $token->token = (int)$token->token + $request->certificateToken;
                $token->update();

            }else{
                $token = new UserTokens();
                $token->user_id =  $request->selectedUserId;
                $token->token = $request->certificateToken;
                $token->save();
            }
            $userMail = User::where('id', $request->selectedUserId)->first()['email'];
            $subject = new SendEmailService(new EmailSubject("Congratulations! You got free tokens on " . env('APP_NAME')));
            $mailTo = new EmailAddress($userMail);
            $invitationMessage = new JobCreationMessage();
            $emailBody = $invitationMessage->creationMessage($request->certificateToken);
            $body = new EmailBody($emailBody);
            $emailMessage = new EmailMessage($subject->getEmailSubject(), $mailTo, $body);
            $sendEmail = new EmailSender(new PhpMail(new MailConf("smtp.gmail.com", "admin@dispatch.com", "secret-2021")));
            $result = $sendEmail->send($emailMessage);
            session()->flash('msg', 'Token Added Successfully!');
            return redirect()->back();
        }catch (\Exception $exception){
            return redirect()->back()->withErrors([$exception->getMessage()]);

        }

    }

    public function editGuides()
    {
        $data = WebsiteText::where('type', 'guides')->first();
        return view('dashboard.edit-guides')->with(['data' => $data]);
    }

    public function updatetext(Request $request)
    {
        try {
            $websiteText = WebsiteText::where('type', $request->type)->first();
            $websiteText->text =  $request->text;
            $websiteText->update();
            session()->flash('msg', 'Text updated!');
            return redirect()->back();
        }catch (\Exception $exception){
            return redirect()->back()->withErrors([$exception->getMessage()]);
        }

    }

    public function editTips()
    {
        $data = WebsiteText::where('type', 'tips')->first();
        return view('dashboard.edit-tips')->with(['data' => $data]);
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
