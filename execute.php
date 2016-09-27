<?php

$content = file_get_contents("php://input");
$update = json_decode($content, true);

if (!$update) {
    exit;
}

$message = isset($update['message']) ? $update['message'] : "";
$messageId = isset($message['message_id']) ? $message['message_id'] : "";
$chatId = isset($message['chat']['id']) ? $message['chat']['id'] : "";
$firstname = isset($message['chat']['first_name']) ? $message['chat']['first_name'] : "";
$lastname = isset($message['chat']['last_name']) ? $message['chat']['last_name'] : "";
$username = isset($message['chat']['username']) ? $message['chat']['username'] : "";
$date = isset($message['date']) ? $message['date'] : "";
$text = isset($message['text']) ? $message['text'] : "";

$text = trim($text);
$text = strtolower($text);

header("Content-Type: application/json");
$parameters = array('chat_id' => $chatId, "text" => $text);
$parameters["method"] = "sendMessage";
//echo json_encode($parameters);
$x = 1;
while ($x < 10) {
    sendPhoto($chatId);
    $x = $x + 1;
}

function sendPhoto($chat_id) {
    $BOT_TOKEN = '286603310:AAEX7TXhFriW_-70_JcPegFthZ6yO2_PT7s';
    $bot_url = "https://api.telegram.org/bot" . $BOT_TOKEN . "/";
    $url = $bot_url . "sendPhoto?chat_id=" . $chat_id;
    $post_fields = array('chat_id' => $chat_id,
        'photo' => new CURLFile(realpath("img/img1.png"))
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Content-Type:multipart/form-data"
    ));
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields);
    $output = curl_exec($ch);
    return $output;
}
