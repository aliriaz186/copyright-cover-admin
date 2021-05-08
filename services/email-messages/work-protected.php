<?php

namespace services\email_messages;

class WorkProtected
{
    public function message($user, $certificate,$password)
    {
        $emailBody = '
   <body>
   <div style="margin: 0 auto;max-width: 600px;background: rgba(211,211,211,0.68);padding: 30px">
             <div style="margin-left: 10px;margin-right: 10px;font-size: 17px;padding-top: 2px">Dear '.$user->first_name.' '.$user->last_name.',</div>
             <div style="margin-left: 10px;margin-right: 10px;font-size: 17px;padding-top: 2px">Your work, " '. $certificate->title .'", has been registered and protected.</div>
             <div style="margin-left: 10px;margin-right: 10px;font-size: 17px;padding-top: 10px">The reference number and password to access your copyright proof certificate is:</div>
             <div style="margin-left: 10px;margin-right: 10px;font-size: 17px;padding-top: 2px">Reference Number: '. $certificate->id .'</div>
             <div style="margin-left: 10px;margin-right: 10px;font-size: 17px;padding-top: 2px">Password: '. $password .'</div>
             <div style="padding-top: 30px;padding-bottom: 40px">
 <a href="'. url(''). '/search-work" style=" background-color: #6b9ce8;
  border: none;
  color: white;
  padding: 10px 27px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 18px;
  cursor: pointer;
  border-radius: 3px;margin-left: 5px">VIEW CERTIFICATE</a>
  </div>
</div><br>
 </div>
            </body>
            ';
        return $emailBody;
    }

}
