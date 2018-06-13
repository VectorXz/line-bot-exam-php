<?php // callback.php

require "vendor/autoload.php";
require_once('vendor/linecorp/line-bot-sdk/line-bot-sdk-tiny/LINEBotTiny.php');

$access_token = 'A8rUpOdcYR+8dQgYxw/Tr1gEl5K67wo5fgOW10jJqLE8sxI4Q6NKdFFLW5JQdKhOKqg5xh1WgTTMQGPJXoMsYE6ozdco1PcxH99irZMXqjRaptKyh8aSnw6imwU0jdkJEEfHCpJp126ZIVg67wwcpAdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			$message = $event['message']['text'];
			if($message == "!welcome") {
				// Get text sent
				//$text = $event['source']['userId'];
				$imgurl = "https://i.pinimg.com/originals/cc/22/d1/cc22d10d9096e70fe3dbe3be2630182b.jpg";
				// Get replyToken
				$replyToken = $event['replyToken'];
				
				// Make a POST Request to Messaging API to reply to sender
				$url = 'https://api.line.me/v2/bot/message/reply';
				$data = [
					'replyToken' => $replyToken,
				];
				$data['messages'][0]['type'] = "image";
				$data['messages'][0]['originalContentUrl'] = "https://www.vectorx2263.com/linebot/welcome_card.jpg";
				$data['messages'][0]['previewImageUrl'] = "https://www.vectorx2263.com/linebot/welcome_card.jpg";
				$data['messages'][1]['type'] = "image";
				$data['messages'][1]['originalContentUrl'] = "https://www.vectorx2263.com/linebot/introduce.jpg";
				$data['messages'][1]['previewImageUrl'] = "https://www.vectorx2263.com/linebot/introduce.jpg";
				$data['messages'][2]['type'] = "image";
				$data['messages'][2]['originalContentUrl'] = "https://www.vectorx2263.com/linebot/rules.jpg";
				$data['messages'][2]['previewImageUrl'] = "https://www.vectorx2263.com/linebot/rules.jpg";
				$data['messages'][3]['type'] = "image";
				$data['messages'][3]['originalContentUrl'] = "https://www.vectorx2263.com/linebot/followus.jpg";
				$data['messages'][3]['previewImageUrl'] = "https://www.vectorx2263.com/linebot/followus.jpg";
				$data['messages'][4]['type'] = "text";
				$data['messages'][4]['text'] = "อันนี้จะเป็นเทรดโซนจ้าา ใช้ขายของเท่านั้นนะครับ http://line.me/ti/g/7gkktMkUd6";
				$post = json_encode($data);
				$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

				$ch = curl_init($url);
				curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
				curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
				curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
				$result = curl_exec($ch);
				curl_close($ch);

				echo $result . "\r\n";
			} else if ($message == "!pun") {
				$replyToken = $event['replyToken'];

				// Make a POST Request to Messaging API to reply to sender
				$url = 'https://api.line.me/v2/bot/message/reply';
				$data = [
					'replyToken' => $replyToken,
				];
				$data['messages'][0]['type'] = "image";
				$ranimg = "https://www.vectorx2263.com/linebot/randomimg/index.php";
				$data['messages'][0]['originalContentUrl'] = $ranimg;
				$data['messages'][0]['previewImageUrl'] = $ranimg;
				$post = json_encode($data);
				$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

				$ch = curl_init($url);
				curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
				curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
				curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
				$result = curl_exec($ch);
				curl_close($ch);

				echo $result . "\r\n";
			} else {
				/*
				// Get text sent
				//$text = $event['source']['userId'];
				$text = "Command not found : received ".$message;
				// Get replyToken
				$replyToken = $event['replyToken'];

				// Build message to reply back
				$messages = [
					'type' => 'text',
					'text' => $text
				];

				// Make a POST Request to Messaging API to reply to sender
				$url = 'https://api.line.me/v2/bot/message/reply';
				$data = [
					'replyToken' => $replyToken,
					'messages' => [$messages],
				];
				$post = json_encode($data);
				$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

				$ch = curl_init($url);
				curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
				curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
				curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
				$result = curl_exec($ch);
				curl_close($ch);

				echo $result . "\r\n";
				*/
			}
		}
	}
}
echo "OK!";
