<?php
/**
    @name: listArticles.php
    @author: Joan Fernández
    @version: 1.0
    @description: Lists all the articles in a table
    @date: 09/02/17
 */
?>
<table class="articleTable">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Category</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ($articleList as $ar)
            {
echo <<<EOT
                <tr>
                    <td>{$ar->getId()}</td>
                    <td>{$ar->getName()}</td>
                    <td>{$ar->getPrice()}</td>
                    <td>{$ar->getStock()}</td>
                    <td>{$ar->getCategory()}</td>
                </tr>            
EOT;
            }
        ?>
    </tbody>
</table>