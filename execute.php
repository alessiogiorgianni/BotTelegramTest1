<?php
require_once 'TelegramBot.php';
require_once 'Skillbot.php';

/*$TGBot = new TelegramBot();
$TGBot->readMessage();
$TGBot->sendAudio($TGBot->chatID, "snd/1.mp3");
$TGBot->sendMessage($TGBot->chatID, "Ciao");
$TGBot->sendPhoto($TGBot->chatID, "img/img1.png");
$TGBot->sendPhoto($TGBot->chatID, "img/img1.png","Che gnocca");*/
/*Skillbot*/
$SkillBot = new SkillBot();
$SkillBot->readMessage();