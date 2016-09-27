<?php
include 'TelegramBot.php';

$TGBot = new TelegramBot();
$TGBot->readMessage();
$TGBot->sendPhoto($chatId, "img/img1.png");
$TGBot->sendAudio($chatId, "snd/1.mp3");
$TGBot->sendMessage($chatId, "Ciao");
