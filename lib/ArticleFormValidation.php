<?php
    require_once 'model/Article.php';
/**
    @name: ArticleFormValidation.php
    @author: Joan Fernández
    @version: 1.0
    @description: Manages article form data
    @date: 26/01/17
 */
class ArticleFormValidation {
    
    /**
        @name: getArticleData()
	@author: Joan Fernández
	@version: 1.0
	@description: Gets data from an article form and validates them
	@param: none
        @return: $article the article with the data sent by the form
	@date: 02/09/17
    */
    public static function getArticleData() {
        
        $articleObj = null;               

        if(filter_has_var(INPUT_GET, "id") && filter_has_var(INPUT_GET, "name") && filter_has_var(INPUT_GET, "price") && filter_has_var(INPUT_GET, "stock") && filter_has_var(INPUT_GET, "category"))
        {
            if($_GET['id'] != "" && $_GET['name'] != "" && $_GET['price'] != "" && $_GET['stock'] != "" && $_GET['category'] != "")
            {
                $id = filter_input(INPUT_GET, 'id');
                $name = filter_input(INPUT_GET, 'name');
                $price = filter_input(INPUT_GET, 'price');
                $stock = filter_input(INPUT_GET, 'stock');
                $category = filter_input(INPUT_GET, 'category');
                
                if(filter_var($id, FILTER_VALIDATE_INT) && filter_var($price, FILTER_VALIDATE_FLOAT) && filter_var($stock, FILTER_VALIDATE_FLOAT))
                {
                    $articleObj = new Article($id, $name, $price, $stock, $category);                
                }                
            }
        }
        
        return $articleObj;
    }
    
    /**
        @name: getFindData()
	@author: Joan Fernández
	@version: 1.0
	@description: Gets data from an article form and validates them
	@param: none
        @return: $article the article with the data sent by the form
	@date: 02/09/17
    */
    public static function getFindData() {
        
        $articleObj = null;               

        if(filter_has_var(INPUT_GET, "id"))
        {
            if($_GET['id'] != "")
            {
                $id = filter_input(INPUT_GET, 'id');
               
                if(filter_var($id, FILTER_VALIDATE_INT))
                {
                    $articleObj = new Article($id, null, null, null, null);                
                }                
            }
        }
        
        return $articleObj;
    }
    
    /**
        @name: getCategoryData()
	@author: Joan Fernández
	@version: 1.0
	@description: Gets the selected category to find the articles
	@param: none
        @return: $category String with the name of the category
	@date: 09/02/17
    */
    public static function getCategoryData() {
        $category = null;
        
        if(filter_has_var(INPUT_GET, "category"))
        {
            if($_GET['category'] != "")
            {
                $category = $_GET['category'];
            }
        }
        
        return $category;
    }
}