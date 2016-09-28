<?php

require_once 'globals.php';

class TelegramBot {
    protected $chatID;

    function __construct() {
        
    }

    protected function sendMessage($chatID, $textMessage) {
        $BOT_TOKEN = $GLOBALS['BOT_TOKEN'];
        $bot_url = "https://api.telegram.org/bot" . $BOT_TOKEN . "/";
        $url = $bot_url . "sendMessage?chat_id=" . $chatID;
        $post_fields = array('chat_id' => $chatID,
            'text' => $textMessage
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Content-Type:application/json"
        ));
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post_fields));
        curl_exec($ch);
    }

    protected function sendPhoto($chatID, $imagePath, $msg = "") {
        $BOT_TOKEN = $GLOBALS['BOT_TOKEN'];
        $bot_url = "https://api.telegram.org/bot" . $BOT_TOKEN . "/";
        $url = $bot_url . "sendPhoto?chat_id=" . $chatID;
        $post_fields = array('chat_id' => $chatID,
            'photo' => new CURLFile(realpath($imagePath)),
            'caption' => $caption
        );
        return $this->attachFileCurl($url, $post_fields);
    }

    protected function sendAudio($chatID, $audioPath) {
        $BOT_TOKEN = $GLOBALS['BOT_TOKEN'];
        $bot_url = "https://api.telegram.org/bot" . $BOT_TOKEN . "/";
        $url = $bot_url . "sendAudio?chat_id=" . $chatID;
        $post_fields = array('chat_id' => $chatID,
            'audio' => new CURLFile(realpath($audioPath))
        );
        return $this->attachFileCurl($url, $post_fields);
    }

    private function attachFileCurl($url, $post_fields) {
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

}
