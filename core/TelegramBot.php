<?php

class TelegramBot {
    
    private $token;
    
    public $update;
    
    public function __construct($token, array $options) {
        $this->token = $token;
        if ($options["update"]) {
            $this->update = json_decode(file_get_contents("php://input"));
        }
    }
    
    public function getUpdate() {
        return $this->update;
    }
    
    public function sendMessage(array $content) {
        return $this->request(__FUNCTION__, $content);
    }
    
    public function deleteMessage(array $content) {
        return $this->request(__FUNCTION__, $content);
    }
    
    public function sendPhoto(array $content) {
        return $this->request(__FUNCTION__, $content);
    }
    
    public function editMessageText(array $content) {
        return $this->request(__FUNCTION__, $content);
    }
    
    public function editMessageReplyMarkup(array $content) {
        return $this->request(__FUNCTION__, $content);
    }
    
    public function answerCallbackQuery(array $content) {
        return $this->request(__FUNCTION__, $content);
    }
    
    public function answerInlineQuery(array $content) {
        return $this->request(__FUNCTION__, $content);
    }
    
    public function banChatSenderChat(array $content) {
        return $this->request(__FUNCTION__, $content);
    }
    
    public function unbanChatSenderChat(array $content) {
        return $this->request(__FUNCTION__, $content);
    }
    
    public function banChatMember(array $content) {
        return $this->request(__FUNCTION__, $content);
    }
    
    public function unbanChatMember(array $content) {
        return $this->request(__FUNCTION__, $content);
    }
    
    public function restrictChatMember(array $content) {
        return $this->request(__FUNCTION__, $content);
    }
    
    public function request($method, $params = []) {
        $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_URL => "https://api.telegram.org/bot".$this->token."/".$method,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $params,
            CURLOPT_RETURNTRANSFER => true
        ]);
        $result = curl_exec($ch);
        curl_close($ch);
        return json_decode($result);
    }
}