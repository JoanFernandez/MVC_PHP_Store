<?php
/**
    @name: addArticleForm.php
    @author: Joan Fernández
    @version: 1.0
    @description: Form to introduce the data for an article
    @date: 16/02/17
 */
?>
<script type="text/javascript">
    function submitForm(buttonId)
    {
        var myForm = document.getElementById("article-form");
        myForm.action.value = buttonId;
        myForm.submit();
        return false;
    }
</script>

<form id="article-form" method="get" action="index.php">
    <div class="formDiv">
        <label for="id">ID:</label>
        <input type="text" id="id" name="id" <?php if(isset($result)){?> value="<?php echo  $result->getId();?>" <?php }?>/>       
    </div>

    <div class="formDiv">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" <?php if(isset($result)){?> value="<?php echo  $result->getName();?>" <?php }?>/>       
    </div>
    <div class="formDiv">
        <label for="price">Price:</label>
        <input type="text" id="price" name="price" <?php if(isset($result)){?> value="<?php echo  $result->getPrice();?>" <?php }?>/>       
    </div>
    <div class="formDiv">
        <label for="stock">Stock:</label>
        <input type="text" id="stock" name="stock" <?php if(isset($result)){?> value="<?php echo  $result->getStock();?>" <?php }?>/>       
    </div>
    <div class="formDiv">
        <label for="category">Category:</label>
        <input type="text" id="category" name="category" <?php if(isset($result)){?> value="<?php echo  $result->getCategory();?>" <?php }?>/>       
    </div>
    <div class="formDiv">
        <button <?php if(isset($result)){echo "disabled";}?> type="button" class="buttonAdd" id="addArticle" onclick="return submitForm(this.id);">Add</button>
        <button <?php if(isset($result)){echo "disabled";}?> type="button" class="buttonFind" id="findArticle" onclick="return submitForm(this.id);">Find</button>
        <button <?php if(!isset($result)){echo "disabled";}?> type="button" class="buttonModify" id="modifyArticle" onclick="return submitForm(this.id);">Modify</button>
        <button <?php if(!isset($result)){echo "disabled";}?> type="button" class="buttonDelete" id="removeArticle" onclick="return submitForm(this.id);">Remove</button>
        <button <?php if(!isset($result)){echo "disabled";}?> type="button" class="buttonBack" id="removeArticle" onclick="location.href='index.php?action=articleForm'">Back</button>
    <input name="action" id="action" hidden="hidden" value="add"/>
    </div>
</form>