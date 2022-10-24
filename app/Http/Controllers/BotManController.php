<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use BotMan\BotMan\BotMan;
use BotMan\BotMan\Messages\Incoming\Answer;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Chat;

class BotManController extends Controller
{

    public function handle()
    {
        $botman = app('botman');

        $botman->hears('{message}',function($botman,$message){
            $message = strtolower($message);
            if ($message == 'hi'|| $message == 'hy'|| $message =='hello'|| $message =='salam'|| $message =='as'|| $message =='assalam o alaikum') {
                $this->askName($botman);
            }
            else{
                $botman->reply("please say 'hi', or 'assalam o alaikum' for start chat ");
            }
        });

        $botman->listen();
    }

    public function askName($botman)
    {
        $botman->ask("Great! What is Your Name?",function(Answer $answer,$botman){
            $name = $answer->getText();
            $this->say('Nice to meet you '.$name);
            $botman->ask("Please Enter your email address", function (Answer $answer, $botman) {
                $mail = $answer->getText();
                function checkEmail($mail) {
                    $find1 = strpos($mail, '@');
                    $find2 = strpos($mail, '.');
                    return ($find1 !== false && $find2 !== false && $find2 > $find1);
                 }
                if ( checkEmail($mail) ) {
                    $this->say('thanks! we will connect you soon to email '.$mail);
                    $botman->ask("What is the issue you want to discuss us please share the details", function (Answer $answer){
                        // this $msg need to save into database
                        $msg = $answer->getText();
                        $this->say('thanks! we will connect you soon');
                        $this->say('you can also used contact us page for any further query'); 
                        // $chat = new Chat();
                        // if(Auth::guard('user')->check()){
                        //     $chat->user_id = Auth::guard('user')->id();
                        // }
                        // $chat->email = $mail;
                        // $chat->message = $msg;
                        // $chat->save();
                    });
                } 
            });
        });
    }

}
