<?php
include 'TelegramBot.php';

$TGBot = new TelegramBot();
$TGBot->readMessage();
$TGBot->sendPhoto($TGBot->chatID, "img/img1.png","Che gnocca");
$TGBot->sendAudio($TGBot->chatID, "snd/1.mp3");
$TGBot->sendMessage($TGBot->chatID, "Ciao");
$TGBot->sendPhoto($TGBot->chatID, "img/img1.png");
