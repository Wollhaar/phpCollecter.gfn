<?php

class DBManager {

    private static $instance = null;
    private $connection;
    
    public function __construct() {
        $this->init();
        
    }

    private function init() {
        $dsn = 'mysql:host=localhost; dbname=phpCollecter;';
        $username = 'root';
        $passwd = '';
        $options = array(
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION //Umstellen auf ERRMODE_SILENT 
                );
        
        try {
            $this->connection = new PDO($dsn, $username, $passwd, $options);
        } catch (Exception $ex) {
                 
            die('Kein Zugriff auf Datenbank möglich!');
        }
    }
    
    public static function getInstance(){
        if(self::$instance === null){
            self::$instance = new self;
        }
        return self::$instance;
    }
    
    public function getConnection() {
        return $this->connection;
    }

}
