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
		
		break;


	    default:
		$response = $client->sendChatAction(['chat_id' => $update->message->chat->id, 'action' => 'typing']);
   	 	$response = $client->sendMessage([
    		'chat_id' => $update->message->chat->id,
    		'text' => "لطفاً یک گزینه را انتخاب کنید..".$update
    		]);
	}		
		
		
} catch (\Zelenin\Telegram\Bot\NotOkException $e) {

    //echo error message ot log it
    //echo $e->getMessage();

}
