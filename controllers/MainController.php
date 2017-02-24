<?php
    //Showing errors
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    //Requirements
    require_once 'model/ArticleModel.php';
    require_once 'lib/ArticleFormValidation.php';
    
/**
    @name: MainController.php
    @author: Joan Fernández
    @version: 1.0
    @description: Main controller of item application
    @date: 09/02/17
 */
class MainController {
    
    /**
     * @description: The model that gives data services
     * @var ArticleModel 
     */
    private $model;
    
    //Constructor
    public function __construct() {
        $this->model = new ArticleModel();
    }
    
    /**
        @name: processRequest()
	@author: Joan Fernández
	@version: 1.0
	@description: Retrieve action from a user
	@params: none
        @return: none
	@date: 19/01/17
    */
    public function processRequest()
    {
        $action = "";
        
        if(filter_has_var(INPUT_GET, "action")) //If the input was send
        {
            $action = filter_input(INPUT_GET, "action"); //Save var action
        }
        
        switch ($action)
        {
            case "listAll": $this->listAll();
            break;
            
            case "categoryForm": $this->showCategoryForm();
            break;
        
            case "listCategory": $this->listByCategory();
            break;
        
            case "addArticle": $this->addArticle();
            break;
        
            case "articleForm": $this->showFindForm();
            break;
        
            case "findArticle": $this->findArticle();
            break;
        
            case "removeArticle": $this->removeArticle();
            break;
        
            case "modifyArticle": $this->modifyArticle();
            break;
        
            default:
            break;        
        }
    }
    
    /**
        @name: listAll()
	@author: Joan Fernández
	@version: 1.0
	@description: Lists all articles
        @params: none
	@return: none
	@date: 19/01/17
    */
    public function listAll() {
        $articleList = $this->model->searchAll();
        include "views/listArticles.php"; //It means that this file is now here, and can use the vars
    }
    
    /**
        @name: showCategoryForm()
	@author: Joan Fernández
	@version: 1.0
	@description: Instances the form for the category
        @params: none
	@return: none
	@date: 19/01/17
    */
    public function showCategoryForm() {
        
        include "views/categoryForm.php";        
    }
    
    /**
        @name: listByCategory()
	@author: Joan Fernández
	@version: 1.0
	@description: Lists all the articles finded in a category
        @params: none
	@return: none
	@date: 19/01/17
    */
    public function listByCategory() {
        
        $category = ArticleFormValidation::getCategoryData();
        
        //Order insertion to model
        if(!is_null($category))
        {
            $articleList = $this->model->searchByCategory($category);
            if(!empty($articleList))
            {
                include "views/listArticles.php";
            }
            else
            {                
                echo "<div class='alert alert-danger'><strong>Error!</strong> Articles not founded in the selected category.</div>";
                include "views/categoryForm.php";
            }            
        }
        else
        {            
            echo "<div class='alert alert-danger'><strong>Error!</strong> Category can't be empty.</div>";
            include "views/categoryForm.php";
        }
    }
       
    /**
        @name: addArticle()
	@author: Joan Fernández
	@version: 1.0
	@description: Adds an article into the DB
        @params: none
	@return: none
	@date: 16/02/17
    */
    public function addArticle() {
        
        $article = ArticleFormValidation::getArticleData();               
        
        //Order insertion to model
        if(!is_null($article))
        {            
            $result = $this->model->add($article);
            if($result)
            {
                $result = null;
                echo "<div class='alert alert-success'><strong>Success!</strong> Article added correctly.</div>";
                include "views/findArticleForm.php";
                
            }
            else
            {
                $result = null;
                echo "<div class='alert alert-danger'><strong>Error!</strong> Article already added.</div>";
                include "views/findArticleForm.php";
            }
        }
        else
        {            
            echo "<div class='alert alert-danger'><strong>Error!</strong> Wrong data while adding article.</div>";
            include "views/findArticleForm.php";
        }
    }
    
    /**
        @name: showFindForm()
	@author: Joan Fernández
	@version: 1.0
	@description: Instances the form for the article find
        @params: none
	@return: none
	@date: 16/02/17
    */
    public function showFindForm() {        
        include "views/findArticleForm.php";
    }
    
    /**
        @name: findArticle()
	@author: Joan Fernández
	@version: 1.0
	@description: Finds an article into de DB
        @params: none
	@return: none
	@date: 16/02/17
    */
    public function findArticle() {
        //Retrieve data from form
        $article = ArticleFormValidation::getFindData();               
        //Order insertion to model
        if(!is_null($article))
        {
            $result = $this->model->searchByID($article);
            if($result->getId()!=null)
            {
                $_SESSION['findId'] = $result->getId();
                include "views/findArticleForm.php";
            }
            else
            {                
                $result = null;
                echo "<div class='alert alert-danger'><strong>Error!</strong> Article not found.</div>";
                include "views/findArticleForm.php";
            }
        }
        else
        {
            echo "<div class='alert alert-danger'><strong>Error!</strong> Found data not correct.</div>";
            include "views/findArticleForm.php";
        }               
    }
    
    /**
        @name: removeArticle()
	@author: Joan Fernández
	@version: 1.0
	@description: Removes an article from the DB
        @params: none
	@return: none
	@date: 16/02/17
    */
    public function removeArticle() {
        //Retrieve data from form
        $article = ArticleFormValidation::getFindData();               
        //Order insertion to model
        if(!is_null($article))
        {
            $result = $this->model->remove($article);
            if($result)
            {
                echo "<div class='alert alert-success'><strong>Success!</strong> Article removed correctly.</div>";
                $result = null;
                include "views/findArticleForm.php";
            }
            else
            {
                $result = null;
                echo "<div class='alert alert-danger'><strong>Error!</strong> Article not found.</div>";
                include "views/findArticleForm.php";
            }
        }
        else
        {
            echo "<div class='alert alert-danger'><strong>Error!</strong> Delete data not correct.</div>";
            include "views/findArticleForm.php";
        }
    }
    
    /**
        @name: modifyArticle()
	@author: Joan Fernández
	@version: 1.0
	@description: Modifies the article sent by article form to data source
        @params: none
	@return: none
	@date: 16/02/17
    */
    public function modifyArticle() 
    {
        //Retrieve data from form
        $article = ArticleFormValidation::getArticleData(); 
        //Order insertion to model
        if(!is_null($article))
        {
            $result = $this->model->modify($article);
            if($result)
            {
                echo "<div class='alert alert-success'><strong>Success!</strong> Article modified correctly.</div>";
                $result = null;
                include "views/findArticleForm.php";
            }
            else
            {
                $result = null;
                echo "<div class='alert alert-danger'><strong>Error!</strong> Article ID already exists.</div>";
                include "views/findArticleForm.php";
            }
        }
        else
        {
            echo "<div class='alert alert-danger'><strong>Error!</strong> Delete data not correct.</div>";
            include "views/findArticleForm.php";
        }               
    }
        
}
