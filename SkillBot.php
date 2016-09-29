<?php

require_once 'TelegramBot.php';
require_once 'Message.php';
require_once 'User.php';
require_once 'connessione.php';

class SkillBot extends TelegramBot {

    private $userThatTextToMe;
    private $messageThatTextToMe;

    function __construct() {
        parent::__construct();
    }

    /* Legge un messaggio di testo, e salva i parametri interessanti alla propria implementazione.. */
    public function readMessage() {
        $content = file_get_contents("php://input");
        $update = json_decode($content, true);
        if (!$update) {
            exit;
        }
        /* Prelevo i dati dalla chat */
        $message = isset($update['message']) ? $update['message'] : "";
        //$messageId = isset($message['message_id']) ? $message['message_id'] : "";
        $chatId = isset($message['chat']['id']) ? $message['chat']['id'] : "";
        $firstname = isset($message['chat']['first_name']) ? $message['chat']['first_name'] : "";
        $lastname = isset($message['chat']['last_name']) ? $message['chat']['last_name'] : "";
        $username = isset($message['chat']['username']) ? $message['chat']['username'] : "";
        $date = isset($message['date']) ? $message['date'] : "";
        $text = isset($message['text']) ? $message['text'] : "";
        $text = trim($text);
        $text = strtolower($text);
        /* Salviamo i dati dell'utente che mi ha scritto... */
        $this->userThatTextToMe = new User();
        $this->userThatTextToMe->setFirstName($firstname);
        $this->userThatTextToMe->setLastName($lastname);
        $this->userThatTextToMe->setUsername($username);
        /* Salviamo i dati del messaggio... */
        $this->messageThatTextToMe = new Message();
        $this->messageThatTextToMe->setUser($this->userThatTextToMe);
        $this->messageThatTextToMe->setDate($date);
        $this->messageThatTextToMe->setText($text);
        /* Set chatID */
        $this->chatID = $chatId;
    }

    /* Funzionalità di insulto... */
    public function insultaPerona($nomePersona, $cognomePersona) {
        $this->sendMessage($this->chatID, $nomePersona . " " . $cognomePersona . " si un cugghiuni!!!!");
    }

    /*
      Imita un personaggio con una sua frase random...
      Nel caso in cui photo sia true, sceglie una foto a caso e integra il messaggio
      all'interno della foto
     */
    public function imitaFrasePersona($aliasPersona) {
        /* Recupero i dati relativo della persona.. */
        $connessione = connetti();
        if ($connessione) {
            $res = mysqli_query($connessione, "SELECT * FROM persone AS p INNER JOIN frasi AS f ON p.id = f.id_persona WHERE alias = '$aliasPersona'");
            if (mysqli_num_rows($res) > 0) {
                $this->sendMessage($this->chatID, "4");
                //Qui dobbiamo randomizzare la riga da scegliere...
                $riga = mysqli_fetch_array($res);
                if ($riga['id_immmagine'] != 0) {
                    //Invio messaggio e foto...
                } else {
                    //Invio solo un messaggio di testo
                    $this->sendMessage($this->chatID, $riga['testo']);
                }
            }
        }
    }

}
