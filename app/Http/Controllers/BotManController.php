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

            if ($message == 'hi'|| $message =='hello'|| $message =='salam'|| $message =='as'|| $message =='assalam o alaikum') {
                $this->askName($botman);

            }else{
                $botman->reply("please say 'hi', or 'assalam o alaikum' for start chat ");
            }

        });

        $botman->listen();
    }

    public function askName($botman)
    {
        $botman->ask("Great! What is Your Name?",function(Answer $answer){
            $name = $answer->getText();
            $this->say('Nice to meet you '.$name);
        });
    }
}
