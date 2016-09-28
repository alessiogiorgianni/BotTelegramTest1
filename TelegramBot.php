<?php

include 'globals.php';

class TelegramBot {
    public $chatID;

    function __construct() {
        
    }

    public function readMessage() {
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
        /*Set chatID*/
        $this->chatID = $chatId;
    }

    public function sendMessage($chatID, $textMessage) {
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

    public function sendPhoto($chatID, $imagePath, $msg = "") {
        $BOT_TOKEN = $GLOBALS['BOT_TOKEN'];
        $bot_url = "https://api.telegram.org/bot" . $BOT_TOKEN . "/";
        $url = $bot_url . "sendPhoto?chat_id=" . $chatID;
        $post_fields = array('chat_id' => $chatID,
            'photo' => new CURLFile(realpath($imagePath)),
            'caption' => $msg
        );
        return $this->attachFileCurl($url, $post_fields);
    }

    public function sendAudio($chatID, $audioPath) {
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
