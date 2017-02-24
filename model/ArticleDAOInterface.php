<?php

    require_once 'Article.php';
/**
    @name: ArticleDAOInterface.php
    @author: Joan Fernández
    @version: 1.0
    @description: Interface for the article persistence
    @date: 09/02/17
 */
interface ArticleDAOInterface {
    
    /**
        @name: instert()
	@author: Joan Fernández
	@version: 1.0
	@description: Inserts an article into a data source
        @params: $article Article to insert into the data source
	@return: int The number of entries affected
	@date: 09/02/17
    */
    public function insert(Article $article) : int;
    
    /**
        @name: update()
	@author: Joan Fernández
	@version: 1.0
	@description: Updates an article into a data source
        @params: $article Article to update into the data source
	@return: int The number of entries affected
	@date: 09/02/17
    */
    public function update(Article $article) : int;
    
    /**
        @name: delete()
	@author: Joan Fernández
	@version: 1.0
	@description: Deletes an article into a data source
        @params: $article Article to delete into the data source
	@return: int The number of entries affected
	@date: 09/02/17
    */
    public function delete(Article $article) : int;
    
    /**
        @name: findAll()
	@author: Joan Fernández
	@version: 1.0
	@description: Find all articles in a data source
        @params: none
	@return: articles[] The list of articles in data source or empty list if failed
	@date: 09/02/17
    */
    public function findAll() : array;
    
    /**
        @name: find()
	@author: Joan Fernández
	@version: 1.0
	@description: Find an article in a data source
        @params: $article Article to find into the data source
	@return: $article The article that was searched or null if failed
	@date: 09/02/17
    */
    public function find(Article $article) : Article;
    
    /**
        @name: findByCategory()
	@author: Joan Fernández
	@version: 1.0
	@description: Find articles in a data source by category
        @params: $category Category to find the articles
	@return: $articles[] The list of articles in data source or empty list if failed
	@date: 09/02/17
    */
    public function findByCategory(String $category) : array;
}
