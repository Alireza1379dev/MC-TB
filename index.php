<?php

require_once 'core/TelegramBot.php';
require_once 'core/config.php';
require_once 'core/bot.php';
require_once 'core/App.php';

$bot->sendMessage([
    'chat_id' => 528843529,
    'text' => json_encode($bot->getUpdate(), 448)
]);

new App($bot);