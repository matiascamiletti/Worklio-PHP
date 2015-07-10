<?php

/**
 * Description of Worklio
 *
 * @author matiascamiletti
 */
class Worklio 
{
    static $BASE_URL = 'http://worklio.mobileia.com/';
    
    private $_apiKey = '';
    
    public function __construct($api_key)
    {
        $this->_apiKey = $api_key;
    }
    
    public function render($view)
    {
        $url = self::$BASE_URL . 'api/view/render?api_key=' . $this->_apiKey .'&view=' . $view;
        
        $data = file_get_contents($url);
        $json = json_decode($data, true);
        
        if($json['success'] !== true){
            return '';
        }
        
        return $json['response']['render'];
    }
    
}
