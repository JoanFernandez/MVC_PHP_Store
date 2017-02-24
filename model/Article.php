<?php


/** 
  @name: Article.php
  @author: Joan Fernández
  @version: 1.0
  @description: Article class that will work with the articles we will manage
  @Attributes:
    *id: ID of the article
    *name: Name of the article
    *price: Price of the article
    *stock: Stock of the article
    *category: Article category
  @methods:
    *Constructor
    *Getters & Setters
  @date: 19/01/17
*/
class Article {
    
    //Attributes
    private $id;
    private $name;
    private $price;
    private $stock;
    private $category;
    
    //Constructor
    public function __construct($id, $name, $price, $stock, $category) {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->stock = $stock;
        $this->category = $category;
    }
        
    //Getters & Setters
    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

    function getPrice() {
        return $this->price;
    }

    function getStock() {
        return $this->stock;
    }

    function getCategory() {
        return $this->category;
    }
    
    function setId($id) {
        $this->id = $id;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setPrice($price) {
        $this->price = $price;
    }

    function setStock($stock) {
        $this->stock = $stock;
    }

    function setCategory($category) {
        $this->category = $category;
    }
}
