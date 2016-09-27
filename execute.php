<?php
include 'TelegramBot.php';

$TGBot = new TelegramBot();
$TGBot->readMessage();
$TGBot->sendPhoto($TGBot->chatID, "img/img1.png");
$TGBot->sendAudio($TGBot->chatID, "snd/1.mp3");
$TGBot->sendMessage($TGBot->chatID, "Ciao");
