<?php

$code = $_GET["message"];

// Used to display a message to the user whenever it is necessary, displays it to the top of the page
function getMessage($message) {
    switch ($message) {
        case "connexionSuccess":
            $message = "Connexion has been established with success";
            $messageType = "success";
            return [ "message" => $message, "messageType" => $messageType];
    }
}

if (isset($message)) {
    $messageData = getMessage($message);
    ?>
    <div class=<?=$messageData["message"];?>>
        <span><?=$messageData["messageType"];?></span>
    </div>
    <?php
}