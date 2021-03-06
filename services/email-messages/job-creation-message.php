<?php

namespace services\email_messages;

class JobCreationMessage
{
    public function creationMessage($tokens)
    {
        $emailBody = '
   <body>
   <div style="margin: 0 auto;max-width: 600px;background: rgba(211,211,211,0.68);padding: 30px">
             <div style="margin-left: 10px;margin-right: 10px;font-size: 17px;padding-top: 2px">Congratulations!</div>
             <div style="margin-left: 10px;margin-right: 10px;font-size: 17px;padding-top: 2px">You got : '. $tokens .' free token.</div>
             <div style="margin-left: 10px;margin-right: 10px;font-size: 17px;padding-top: 2px">Login now and use these tokens to register your work on '.env('APP_NAME').'</div>
             <div style="padding-top: 30px;padding-bottom: 40px">
 <a href="https://www.copyrightcover.com/login" style=" background-color: #6b9ce8;
  border: none;
  color: white;
  padding: 10px 27px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 18px;
  cursor: pointer;
  border-radius: 3px;margin-left: 5px">Login</a>
  </div>
</div><br>
 </div>
            </body>
            ';
        return $emailBody;
    }

}
