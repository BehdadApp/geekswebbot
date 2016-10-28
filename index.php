<?php

/*
* This file is part of GeeksWeb Bot (GWB).
*
* GeeksWeb Bot (GWB) is free software; you can redistribute it and/or modify
* it under the terms of the GNU General Public License version 3
* as published by the Free Software Foundation.
* 
* GeeksWeb Bot (GWB) is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU General Public License for more details.  <http://www.gnu.org/licenses/>
*
* Author(s):
*
* © 2017 Mohammad Behdad <m.behdad7@gmail.com>
*
*/
require 'vendor/autoload.php';

$client = new Zelenin\Telegram\Bot\Api('282292401:AAE2ns2v0dHgEopS58BhllzKh1694mDGavs'); // Set your access token
$url = 'http://linkdoni.soft98.ir/rss.xml'; // URL RSS feed
$update = json_decode(file_get_contents('php://input'));

//your app
try {
	switch ($update->message->text) {
	    case "/start":
		$response = $client->sendChatAction(['chat_id' => $update->message->chat->id, 'action' => 'typing']);
		$response = $client->sendMessage([
			'chat_id' => $update->message->chat->id,
			'text' => "انتخاب دسته",
			'reply_markup'=>json_encode([
			'keyboard'=>[
			    [
				['text'=>"Answer"],['text'=>"2.پاسخگو میشوم"]

			    ],
			    [
				['text'=>"3.درباره ما"],['text'=>"4.ارتباط با ما"]

			    ]
			],
			'resize_keyboard'=>true,
			'one_time_keyboard'=>false
		      ])	
		]);
	       break;
		
		case "Answer";
		$response = $client->sendChatAction(['chat_id' => $update->message->chat->id, 'action' => 'typing']);
		$response = $client->sendMessage([
			'chat_id' => $update->message->chat->id,
			'text' => "گروه مشاوره را انتخاب کنید",
			'reply_markup'=>json_encode([
            'reply_markup'=>[
                'inline_keyboard'=>[
                    [
                        ['text'=>"🍀   مفاهیم مهندسی وایرلس",'url'=>'https://telegram.me/joinchat/BZSb2Tuv7Kxk21OYT4TLKw']
                    ],
                    [
                        ['text'=>"🍀   صفر تا صد برنامه نویسی ربات تلگرام",'url'=>'https://telegram.me/joinchat/BdES-zwJKKGeFT8434LVsQ']
                    ],
                    [
                        ['text'=>"🍀   شبکه , دوربین مداربسته",'url'=>'https://telegram.me/joinchat/BWhxGTugMMW3D5hnTdSXrA']
                    ],
                    [
                        ['text'=>"🍀   بروزترین و جامع ترین کانال خبری در حوزه ی IT",'url'=>'https://telegram.me/joinchat/BGE6STwf65Fm0Nimh6MZog']
                    ],

                    [
                        ['text'=>"🍀   آموزش matlab و simulink برای مهندسین برق",'url'=>'https://telegram.me/joinchat/B9zA5TyYiqLCFmt4GmMLPQ']
                    ],
                    [
                        ['text'=>"🍀   آموزش کامپیوتر،طراحی سایت،فتوشاپ",'url'=>'https://telegram.me/joinchat/Brvu3T0m-L1qXH3bJSWj4g']
                    ],


                    [
                        ['text'=>"🍀   مطالب روز امنیت IT",'url'=>'https://telegram.me/joinchat/BNK8jDwJqIbRBqFRTEcdrg']
                    ],
                    [
                        ['text'=>"🍀   دانستنی های موبایل و کامپیوتر",'url'=>'https://telegram.me/joinchat/BMjEvjwbPt_SVBGbXwB2tw']
                    ],

                    [
                        ['text'=>"🍀   آموزش 0 تا 100 طراحی وب سایت",'url'=>'https://telegram.me/joinchat/BZSb2TvbdqSvAgZBimlAhg']
                    ],
                    [
                        ['text'=>"🍀   بزرگترین جامعه مخابرات ایران",'url'=>'https://telegram.me/joinchat/A8RDtDwwxyTVaj9K0xLG6w']
                    ],
                    [
                        ['text'=>"🍀   الکترونیک را کاربردی بیاموزید",'url'=>'https://telegram.me/joinchat/BVnd0zvBMpqC72NYTJ8SKg']
                    ],


                ]
		]);
		break;


	    default:
		$response = $client->sendChatAction(['chat_id' => $update->message->chat->id, 'action' => 'typing']);
   	 	$response = $client->sendMessage([
    		'chat_id' => $update->message->chat->id,
    		'text' => "لطفاً یک گزینه را انتخاب کنید.."
    		]);
	}		
		
		
} catch (\Zelenin\Telegram\Bot\NotOkException $e) {

    //echo error message ot log it
    //echo $e->getMessage();

}
