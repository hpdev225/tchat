<?php

namespace App\Models;

use App\Database; 

/**
 * 
 */
class tchat {
     private $_db = null;
    
    public function __construct() {
         $this->_db = Database::getInstance();
    }
    
    /**
     * Enregistrement des messages
     * @param string $message message entrée
     * @param int $userId identifiant de l'utilisateur
     */
    public function addMessage($message, $userId) {
        
        $stmt = $this->_db->prepare('INSERT INTO tchat_message (tchat_user_id,message,date) VALUES (:userId, :message, now())');
        $stmt->execute(array(
            ':userId' => $userId,
            ':message' => $message,
        ));
    }
    
    /**
     * Recupère tous les messages
     * @return array
     */
    public function getAllMessage() {
        $stmt = $this->_db->prepare('SELECT DATE_FORMAT(tm.date,"%d-%m-%Y %H:%i:%s") as dateMessage, tm.message, tu.pseudo FROM tchat_message tm INNER JOIN tchat_user tu ON tu.id = tm.tchat_user_id ORDER BY date DESC');
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}
