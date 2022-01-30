<?php

class bot {
    
    public $bot;
    public $update;
    
    public function __construct($bot, $update) {
        
        $this->bot = $bot;
        $this->update = $update;
    }
    
    public function say() {
        
        $args = func_get_args();
        foreach ($args as $msg) {
            $this->bot->sendMessage([
                'chat_id' => $this->update->message->chat->id,
                'text' => $msg
            ]);
        }
    }
}