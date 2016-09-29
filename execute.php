<?php
include 'TelegramBot.php';
include 'SkillBot.php';

/*$TGBot = new TelegramBot();
$TGBot->readMessageMain();
$TGBot->sendPhoto($TGBot->chatID, "img/img1.png");
$TGBot->sendAudio($TGBot->chatID, "snd/1.mp3");
$TGBot->sendMessage($TGBot->chatID, "Ciao");
$TGBot->sendPhoto($TGBot->chatID, "img/img1.png", "suca");*/
$Skillbot = new SkillBot();
$Skillbot->readMessage();

