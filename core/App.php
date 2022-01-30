<?php

class App {
    
    public $updates;
    
    public $controller = "bot";
    public $method = "say";
    public $params = ["Hello"];
    
    public function __construct($bot) {
        
        $this->updates = $bot->getUpdate();
        
        $text = $this->updates->message->text;
        $from_id = $this->updates->message->from->id;
        
        if (preg_match('/^\/start\@Alireza1379AdminBot\s(\w+)(\/(\w+))?(\/(.*))?$/', rtrim($text, '/'), $m)) {
        
            if (isset($m[1])) {
                $this->controller = $m[1];
                unset($m[0]);
                unset($m[1]);
            }
            
            if (isset($m[3])) {
                $this->method = $m[3];
                unset($m[2]);
                unset($m[3]);
            }
            
            if (isset($m[5])) {
                $this->params = explode('/', $m[5]);
                unset($m[4]);
                unset($m[5]);
            }
            
            if (file_exists('controllers/'.$this->controller.'.php')) {
                require_once 'controllers/'.$this->controller.'.php';
                $object = new $this->controller($bot, $this->updates);
                if (method_exists($object, $this->method)) {
                    call_user_func_array([$object, $this->method], $this->params);
                }
            }
        }
    }
}