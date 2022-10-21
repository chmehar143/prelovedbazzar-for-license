<?php

namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;
use BotMan\BotMan\Messages\Incoming\Answer;
use Illuminate\Http\Request;

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
            $botman->ask("what the issue you want to discuss with us please share details", function (Answer $answer) {
                // this $msg need to save into database
                $msg = $answer->getText();
                $this->say('thanks! we will connect you soon');
                $this->say('you can also used contact us page for any further query');
            });
        });
    }

}
