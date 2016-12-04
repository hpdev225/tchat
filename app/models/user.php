<?php

namespace App\Models;

use App\Database; 

/**
 * 
 */
class user {

    private $_db = null;
    
    public function __construct() {
         $this->_db = Database::getInstance();
    }
        
    /**
     * Création d'un tulisateur en fontion du pseudo et du passe word
     * @param string $pseudo
     * @param string $password hach password
     */
    public  function createUser($pseudo, $password) {

        $stmt = $this->_db->prepare('INSERT INTO tchat_user (pseudo,password,connected) VALUES (:pseudo, :password, :connected)');
        $stmt->execute(array(
            ':pseudo' => $pseudo,
            ':password' => $password,
            ':connected' => 1
        ));
    }

    /**
     * Mets à jour l'etat du user
     * @param string $pseudo
     * @param int $connected 
     */
    public function updateUser($pseudo, $connected) {
        $stmt = $this->_db->prepare("UPDATE tchat_user SET connected = :connected WHERE pseudo = :pseudo");
        $stmt->execute(array(
            ':pseudo' => $pseudo,
            ':connected' =>$connected
        ));
    }

    /**
     * Retourne le user en fonction du pseudo et du mot de passe
     * @param type $speudo
     * @return type
     */
    public function getUser($pseudo, $password) {
              
       
        try {
            $stmt = $this->_db->prepare('SELECT * FROM tchat_user WHERE pseudo = :pseudo AND password = :password');
            $stmt->execute(array(':pseudo' => $pseudo,':password' => $password));
            return $stmt->fetch();
        } catch (PDOException $e) {
            
        }
    }
    
    /**
     * Retourne le user en fonction de son pseudo
     * @param type $pseudo
     * @return type
     */
    public function getUserByPseudo($pseudo) {
              
       
        try {
            $stmt = $this->_db->prepare('SELECT * FROM tchat_user WHERE pseudo = :pseudo');
            $stmt->execute(array(':pseudo' => $pseudo));
            return $stmt->fetch();
        } catch (PDOException $e) {
            
        }
    }

    /**
     * 
     * @return type
     */
    public function getAllUsersConnected() {
        try {
            $stmt = $this->_db->prepare('SELECT pseudo FROM tchat_user WHERE connected  = :connected');
            $stmt->execute(array(':connected' => 1));
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            
        }
    }

}
