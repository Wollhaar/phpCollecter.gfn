<?php

include_once 'class/Product.php';

class ProductManager {

    const table = 'products';
    private $dbh = null;
    
    public function __construct() {
        $this->dbh = DBManager::getInstance()->getConnection();
    }

    public function save($data, $file) {      
        if($data['id'] > 0){
            $this->update();
        } else{
            $this->insert();
        }
    }
    
    public function update($data, $file){
        
        $product = new product;
        $product->arrayToObject($data);
        $values = array('title' => $product->getTitle(),
                        'price' => $product->getPrice(),
                        'desc' => $product->getDescription(),
                        'id' => $data['id']);
        
        if($file['error'] == UPLOAD_ERR_OK){
            $values['img'] = $this->fileUpload($file);
            $sql = 'UPDATE '.self::table.' SET title =:title, price =:price, description =:desc, image=:img WHERE id =:id';
            if(file_exists(UPLOAD_PATH.$product->getImage())){
                unlink(UPLOAD_PATH.$product->getImage());
            }
        } else{
            $sql = 'UPDATE '.self::table.' SET title = ?, price = ?, description = ? WHERE id = ?';
        }
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute($values);
        $stmt = null;
    }

        public function insert($data, $file) {
        $imageName = $this->fileUpload($file);
        $data['image'] = $imageName;
        
        
        $product = new Product();
        $product->arrayToObject($data);
        $sql = 'INSERT INTO ' .self::table.
                ' (title, price, description, image) VALUES(?, ?, ?, ?)';
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute(array($product->getTitle(),
                            $product->getPrice(),
                            $product->getDescription(),
                            $product->getImage()));
        $stmt = null;
        //if($this->dbh->lastInsertId() > 0){
            
        //}
    }

    public function find() {
        $sql = 'SELECT * FROM '.self::table;
        $stmt = $this->dbh->query($sql);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Product');
        $products = $stmt->fetchAll();
        return $products;
    }
    
    public function findById($id){
        $sql = 'SELECT * FROM '.self::table.' WHERE id = ?';
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute(array($id));
        $product = $stmt->fetchObject('Product');
        $stmt = null;
        return $product;
    }

    private function fileUpload($file) {
        $destination = uniqid().$file['name'];
        move_uploaded_file($file['tmp_name'], UPLOAD_PATH.$destination);
        
        return $destination;
        
    }
}
