<?php

namespace App;

use PDO;

/**
 * Class de connexion à la base
 */
class Database {

   
    private $_connection;
    private static $_instance;
	
        
    /** @var array config */
    private static $DATA = null;

    /**
     * @return array
     * @throws Exception
     */
    public static function getConfig($section = null) 
    {
        if ($section === null) {
            return self::getData();
        }
        $data = self::getData();
        if (!array_key_exists($section, $data)) {
            throw new Exception('Unknown config section: ' . $section);
        }
        return $data[$section];
    }

    /**
     * @return array
     */
    private static function getData() {
        if (self::$DATA !== null) {
            return self::$DATA;
        }
        self::$DATA = parse_ini_file(__DIR__ . '/config.ini', true);
        return self::$DATA;
    }
        
    public static function getInstance() {
	if(!self::$_instance) { 
	    self::$_instance = new self();
	}
	return self::$_instance;
    }
	
    private function __construct() {
        
        $config = self::getConfig('db');
        try {
            $this->_connection = new PDO('mysql:host='.$config['host'].';dbname='.$config['dbname'], $config['username'], $config['password']);
            $this->_connection->exec("SET CHARACTER SET utf8");
        }catch (Exception $ex) {
            throw new Exception('DB connection error: ' . $ex->getMessage());
        }
		
    }
        
    private function __clone() { }
	
    public function getConnection() {
         return $this->_connection;
    }
        
    public function prepare($sql)
    {
        return $this->_connection->prepare($sql);
    }
}
