<?php

/**
    @name: item-form.php
    @author: Joan Fernández
    @version: 1.0
    @description: Form to introduce the data
    @date: 19/01/17
 */
?>
<script type="text/javascript">
    function submitForm(buttonId)
    {
        var myForm = document.getElementById("categoryForm");
        myForm.action.value = buttonId;
        myForm.submit();
        return false;
    }
</script>

<form id="categoryForm" method="get" action="index.php">
    <div class="formDiv">
        <label for="id">Write the category where you want to find the articles:</label>
        <input type="text" id="category" name="category"/>       
    </div>
    <button <?php if(isset($result)){echo "disabled";}?> type="button" class="buttonFind" id="listCategory" onclick="return submitForm(this.id);">Find</button>    
    <input name="action" id="action" hidden="hidden" value="add"/>
</form>