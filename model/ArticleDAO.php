<?php

    require_once 'Article.php';
    require_once 'ArticleDAOInterface.php';
/**
    @name: ArticleDAO.php
    @author: Joan Fernández
    @version: 1.0
    @description: Implements article persistence on an array with singleton pattern
    @date: 09/02/17
 */
class ArticleDAO implements ArticleDAOInterface{
    
    //Attributes
    /**
     * @descriprion Single object instance
     * @var type ArticleDAO
     */
    private static $instance = null;
    private $data;
    
    //Constructor
    private function __construct() {
        $this->data = array();
        array_push($this->data,new Article("1","Article 1","11","1","Book"));
        array_push($this->data,new Article("2","Article 2","12","2","Magazine"));
        array_push($this->data,new Article("3","Article 3","13","3","Unknown"));
        array_push($this->data,new Article("4","Article 4","19","4","Book"));
    }
    
    //Getter for the instance, using singleton pattern
    public static function getInstance() : ArticleDAO {
        
        //Note: self == ArticleDAO
        if(isset($_SESSION['articleDAO']))
        {
            self::$instance = $_SESSION['articleDAO'];
        }
        else
        {
            if(is_null(self::$instance))
            {
                self::$instance = new self();
                $_SESSION['articleDAO'] = self::$instance;
            }
        }                         
        return self::$instance;
    }
    
    public function findAll() : array {
        return $this->data;
    }

    //Interface methods    
    public function delete(Article $article) : int {
        $previousSize = count($this->data);
        $position = 0;
        foreach ($this->data as $i) {
            if ($i->getId() === $article->getId()) {
                unset($this->data[$position]);
                break;
            }
            $position = $position + 1;
        }
        $this->data = array_values($this->data);
        $currentSize = count($this->data);
        return $previousSize - $currentSize;
    }

    public function find(Article $article) : Article {
        $it = new Article(null, null, null, null, null);
        foreach ($this->data as $i) {
            if ($i->getId() === $article->getId()) {
                $it = $i;
            }
        }
        return $it;
    }

    public function insert(Article $article) : int {
        $flag = 0;
        $count = 0;
        foreach ($this->data as $i) {
            if ($i->getId() === $article->getId()) {
                $count = 1;
            }
        }
        if ($count === 0) {
            array_push($this->data, $article);
            $flag = 1;
        }
        return $flag;
    }

    public function update(Article $article) : int {
        $flag = 0;
        
        if(is_null($this->find($article)->getId()) || $article->getId() === $_SESSION['findId'])
        {
            foreach ($this->data as $i) 
            {            
                if ($i->getId() === $_SESSION['findId']) 
                {
                    $i->setId($article->getId());
                    $i->setName($article->getName());
                    $i->setPrice($article->getPrice());
                    $i->setStock($article->getStock());
                    $i->setCategory($article->getCategory());
                    $flag = 1;                
                }
            }
        }
        return $flag;
    }

    public function findByCategory(String $category) : array {
        $newData = array();
        foreach ($this->data as $dataItem)
        {
            if($dataItem->getCategory() == $category)
            {
                array_push($newData,$dataItem);
            }
        }
        return $newData;
    }

}
