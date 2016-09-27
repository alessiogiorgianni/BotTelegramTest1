<?php

function sendPhoto($chat_id,$image_path) {
    $BOT_TOKEN = $GLOBALS['BOT_TOKEN'];
    $bot_url = "https://api.telegram.org/bot" . $BOT_TOKEN . "/";
    $url = $bot_url . "sendPhoto?chat_id=" . $chat_id;
    $post_fields = array('chat_id' => $chat_id,
        //'photo' => new CURLFile(realpath("img/img1.png"))
        'photo' => new CURLFile(realpath($image_path))
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

function sendAudio($chat_id,$audio_path) {
    $BOT_TOKEN = $GLOBALS['BOT_TOKEN'];
    $bot_url = "https://api.telegram.org/bot" . $BOT_TOKEN . "/";
    $url = $bot_url . "sendPhoto?chat_id=" . $chat_id;
    $post_fields = array('chat_id' => $chat_id,
        //'photo' => new CURLFile(realpath("img/img1.png"))
        'audio' => new CURLFile(realpath($audio_path))
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
