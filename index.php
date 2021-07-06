<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
<?php
       require_once 'connection.php';
        $query = new MongoDB\Driver\Query([]); 
        $rows = $client->executeQuery("images.images", $query);
?>
<table>
    <tr>
        <th>Nume</th>
        <th>Image</th>
        <th colspan="3">Actions</th>
</tr>
<?php foreach($rows as $val):?> 
<?php if((isset($val->title))&&(isset($val->image))&&($val-> title!="")&& ($val->image!="")):?>    
<tr>
    <td><?php echo $val->title;?></td>
    <td><img src="<?php echo $val->image;?>" width="100" height="100"></td>
    <td><?php echo "<a href=\"view.php?id=".$val->_id."\">View</a>";?></td>
    <td><?php echo "<a href=\"edit.php?id=".$val->_id."\">Edit</a>";?></td>
    <td><?php echo "<a href=\"delete.php?id=".$val->_id."\" onclick=\" return confirm('Are you sure you want to delete this document?')\";> Delete</a>";?> </td> 
</tr>
    <?php endif;?>
    <?php endforeach;?>
</table>
        <br><br>
<a href="upload.php">Upload another image</a>
<a href="search_form.php">Search</a>
</body>
</html>