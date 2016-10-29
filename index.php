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
	    case "/start2":
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


	//    default:
	//	$response = $client->sendChatAction(['chat_id' => '-121921633', 'action' => 'typing']);
   	// 	$response = $client->sendMessage([
    	//	'chat_id' =>  '-121921633',
    	//	'text' => "".$update->message->text .  $update->message->chat->id
    	//	]);
	}		
	
	if (strpos($update->message->text,"telegram.me/joinchat/")){
		
		
		$Title=substr($update->message->text,1,10);
		$Des=substr($update->message->text,1,strpos($update->message->text,"https://telegram.me/joinchat/"));
		if (strpos($update->message->text,"گروه")){	$Type=1;	}
		else{	$Type=2;	}		
		
		
		$Tlink=substr($update->message->text,strpos($update->message->text,"https://telegram.me/joinchat/"),51);
		$mappost="idUser=5" . "&Type=" . $Type . "&Cat=10" . "&Title=" .$Title. "&Des=" .$Des. "&TelegramLink=" .$Tlink. "&Special=0" . "&Image=f3edc3964a03a5bc0086c1238afa9dc6.jpg" ;
	
		$lines = file("http://srv.parperook.ir/TeleBazaar/AddFromBot.php?".$mappost);	
		
		//curl_setopt_array(
		  //  $ch, array( 
		  //  CURLOPT_URL => 'http://www.bbc.co.uk/',
		  //  CURLOPT_RETURNTRANSFER => true
	//	));

	//	$output = curl_exec($ch);

		
		
		$response = $client->sendChatAction(['chat_id' => '-121921633', 'action' => 'typing']);
   	 	$response = $client->sendMessage([
    		'chat_id' =>  '-121921633',
    		'text' =>  "Location: http://srv.parperook.ir/TeleBazaar/AddFromBot.php?".$mappost   //$update->message->text 
    		]);
		
	}
		
} catch (\Zelenin\Telegram\Bot\NotOkException $e) {

    //echo error message ot log it
    //echo $e->getMessage();

}
