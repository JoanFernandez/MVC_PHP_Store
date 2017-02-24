<?php
    require_once 'Article.php';
    require_once 'ArticleDAO.php';
/**
    @name: ArticleModel.php
    @author: Joan Fernández
    @version: 1.0
    @description: Functions that use Articles
    @date: 09/02/17
 */
class ArticleModel {
    
    /**
     * @description Persistance of items
     * @var type ArticleDAOInterface
     */
    private $articleDAO;
    
    //Constructor
    public function __construct() {
        $this->articleDAO = ArticleDAO::getInstance();
    }
    
    /**
        @name: searchAll()
	@author: Joan Fernández
	@version: 1.0
	@description: Retrieves all data of the data source
	@params: none
        @return: $item[]: The list of all articles or empty list
	@date: 19/01/17
    */
    public function searchAll()
    {
        return $this->articleDAO->findAll();
    }
    
    /**
        @name: searchByCategory()
	@author: Joan Fernández
	@version: 1.0
	@description: Retrieves all data of category of the data source
	@params: none
        @return: $articles[]: The list of all articles or empty list
	@date: 19/01/17
    */
    public function searchByCategory(String $category) {
        return $this->articleDAO->findByCategory($category);
    }
    
    /**
        @name: add()
	@author: Joan Fernández
	@version: 1.0
	@description: Adds an article to data source
	@params: $article Article to add to the data source
        @return: boolean: True if the add was succesfull / false if otherwise
	@date: 16/02/17
    */
    public function add(Article $article)
    {        
        $numAffected = 0;

        $numAffected = $this->articleDAO->insert($article);
           
        return ($numAffected===1)?true:false; //If $numAffected is 1 return true, else false
    }
    /**
        @name: searchByCategory()
	@author: Joan Fernández
	@version: 1.0
	@description: Retrieves all data of category of the data source
	@params: none
        @return: $articles[]: The list of all articles or empty list
	@date: 19/01/17
    */
    public function searchByID(Article $article) {        
        return $this->articleDAO->find($article);        
    }
    
    /**
        @name: remove()
	@author: Joan Fernández
	@version: 1.0
	@description: Removes an article of the data source
	@params: $article Article to remove into the data source
        @return: boolean: True if the remove was succesfull / false if otherwise
	@date: 19/01/17
    */
    public function remove(Article $article)
    {
        $numAffected = 0;

        $numAffected = $this->articleDAO->delete($article);
           
        return ($numAffected===1)?true:false; //If $numAffected is 1 return true, else false
    }
    
    /**
        @name: modify()
	@author: Joan Fernández
	@version: 1.0
	@description: Modifies an article of the data source
	@params: $article Article to modifiy to the data source
        @return: boolean: True if the modify was succesfull / false if otherwise
	@date: 19/01/17
    */
    public function modify(Article $article)
    {
        $numAffected = 0;

        $numAffected = $this->articleDAO->update($article);
           
        return ($numAffected===1)?true:false; //If $numAffected is 1 return true, else false
    }

}
