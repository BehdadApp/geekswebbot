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

$client = new Zelenin\Telegram\Bot\Api('166379091:AAHQBH2ppL_UdJG0s5J30owzcYy-3cl9LfA'); // Set your access token

$update = json_decode(file_get_contents('php://input'));

function limitword($string, $limit){
    $words = explode(" ",$string);
    $output = implode(" ",array_splice($words,0,$limit));
    return $output;
}

$fp = fopen( "userid.htm", "a" );
fputs( $fp,$update->message->from->username ."  " );
fclose( $fp );

//your app
try {
	switch ($update->message->text) {
	    case "/start":
		$response = $client->sendChatAction(['chat_id' => $update->message->chat->id, 'action' => 'typing']);
		$response = $client->sendMessage([
			'chat_id' => $update->message->chat->id,
			'text' => "منو اصلی",
			'reply_markup'=>json_encode([
			'keyboard'=>[
			    [
				['text'=>"💡راهنما "],['text'=>"🔍 کاوش "]

			    ],
			    [
				['text'=>"👬 درباره ما "],['text' =>"💬 افزودن به گروه "]

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

		$Title=limitword($update->message->text,3);
		$Des= $update->message->text;
		if (strpos($update->message->text,"گروه") || strpos($update->message->text,"چت ")  ){	$Type=1;
			$img="group.jpg";	}
		else{	$Type=2;
		     $img="channel.jpg";	}		
	
		$Tlink='https://'.substr($update->message->text,strpos($update->message->text,"telegram.me/joinchat/"),43);
		$post = [
			'idUser' => 5,
			'Type' => $Type,
			'Cat' => 10,
			'Title' => $Title,
			'Des' => $Des,
			'TelegramLink' => $Tlink,
			'Special' => 0 ,
			'Image' => $img,
		];

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,"http://srv.parperook.ir/TeleBazaar/AddFromBot.php");
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post); 
		// receive server response ...
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$server_output = curl_exec ($ch);
		curl_close ($ch);

		$response = $client->sendChatAction(['chat_id' => '-1001077958434', 'action' => 'typing']);
   	 	$response = $client->sendMessage([
    		'chat_id' =>  '-1001077958434',
    		'text' => $Des  //$server_output // ."                     "."http://srv.parperook.ir/TeleBazaar/AddFromBot.php?".$post  // "http://srv.parperook.ir/TeleBazaar/AddFromBot.php?".$mappost   //$update->message->text 
    		]);
		
	}
		
} catch (\Zelenin\Telegram\Bot\NotOkException $e) {

    //echo error message ot log it
    //echo $e->getMessage();

}
