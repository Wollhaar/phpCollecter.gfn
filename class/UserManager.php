<?php


class UserManager {

    const TABLE = 'users';

    private $dbh = null;
    

    public function __construct() {
        $this->dbh = DBManager::getInstance()->getConnection();
    }

    public function save($data) {

        $user = new User();
        $user->arrayToObject($data);
        $sql = 'INSERT INTO ' .self::TABLE.
                ' (title, firstname, surname, email, password) VALUES(?, ?, ?, ?, ?)';
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute(array($user->getTitle(),
            $user->getFirstname(),
            $user->getSurname(),
            $user->getEmail(),
            $user->getPassword()));
        $stmt = null;
        if($this->dbh->lastInsertId() > 0){
            $user->setId($this->dbh->lastInsertId());
            $_SESSION['user'] = $user;
        }
    }
    
    public function login($data){
        $user = new User();
        $user->arrayToObject($data);
        
        $sql = 'SELECT * FROM '.self::TABLE.' WHERE email = ? AND password = ?';
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute(array($user->getEmail(),
                            $user->getPassword()));
        if($stmt->rowCount() > 0){
            $user = $stmt->fetchObject('User');
            $_SESSION ['user'] = $user;
            return true;
        }  else {
            return false;
        }
        
    }
    
    public function showAll(){
        /*$user = new User();
        $user->arrayToObject($data);*/
        $sql = 'SELECT * FROM '.self::TABLE.' ORDER BY surname';
        $stmt = $this->dbh->query($sql);
        //$users = new User();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
        $users = $stmt->fetchAll();
        $stmt = null;
        return $users;
    }
    
    public function changeStatus($status, $data){
        $sql = 'UPDATE '.self::TABLE.' SET status = ? WHERE id = ? LIMIT 1';
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute(array($status,
                            $data));
        $stmt = null;
    }
    
    public function getUser($id){
        $sql = 'SELECT * FROM '.self::TABLE.' WHERE id = ?';
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute(array($id));
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
        $user = $stmt->fetch();
        
        return $user;
    }
    
    public function userUpdate($data){
        $user = new User();
        $user->arrayToObject($data);
        $sql = 'UPDATE '.self::TABLE.' SET title = ?, firstname = ?, surname = ?, email = ?, status = ? WHERE id = ? LIMIT 1';
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute(array($user->getTitle(),
                            $user->getFirstname(),
                            $user->getSurname(),
                            $user->getEmail(),
                            $user->getStatus(),
                            $user->getId()
                            ));
        $stmt = null;
    }

}
