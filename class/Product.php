<?php

class product {

    private $id = 0;
    private $title;
    private $price;
    private $description;
    private $image;

    public function arrayToObject($data) {
        $this->setTitle($data['title']);
        $this->setPrice($data['price']);
        $this->setDescription($data['description']);
        $this->setImage($data['image']);
    }

    function getId() {
        return $this->id;
    }

    function getTitle() {
        return $this->title;
    }

    function getPrice($type = 'f') {
        switch ($type) {
            case 'n':
                return $this->price;
                break;

            case 'f':
                if (is_numeric($this->price)) {
                    return number_format($this->price, 2, ',', '.');
                }
                break;
        }
    }

    function getDescription() {
        return $this->description;
    }

    function getImage() {
        return $this->image;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setTitle($title) {
        $this->title = trim(strip_tags($title));
    }

    function setPrice($price) {
        if (strpos($price, ',')) {
            $price = str_replace(',', '.', $price);
        }
        if (is_numeric($price)) {
            $this->price = (double) trim(strip_tags($price));
        } else {
            $this->price = 'Ausverkauft';
        }
    }

    function setDescription($description) {
        $this->description = htmlspecialchars($description);
    }

    function setImage($image) {
        $this->image = $image;
    }

}
