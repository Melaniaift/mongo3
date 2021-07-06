<?php
require_once 'connection_1.php';
$id=new MongoDB\BSON\ObjectId($_GET['id']);
$filter = ['_id'=>$id];
$query=new MongoDB\Driver\Query($filter);
$article =$client->executeQuery("carti.books",$query);
$doc = current($article->toArray());
?>
<ul>
    <li><?php echo $doc->title;?></li>
    <td><?php echo $val->autor;?></td>
    <td><?php echo $val->marime;?></td>
    <td><?php echo $val->pret;?></td>
    <td><?php echo $val->cantitate;?></td>
    <li><img src="<?php echo $doc->image;?>" width="100" height="100"></li>
   
</ul>
<a href="index.php">Back</a>
