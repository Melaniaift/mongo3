<?php
require_once 'connection.php';
$title=$_POST['title'];
$filter = ['title' => $title];
    $query = new MongoDB\Driver\Query($filter);          
    $article = $client->executeQuery("images.images", $query);
     $doc = current($article->toArray());
if($doc){
?>
<ul>
    <li><?php echo $doc->title;?></li>
    <li><img src="<?php echo $doc->image;?>" width="100" height="100"></li>
    
</ul>
<?php
}else
    echo "No results. Please try again!";
?>
<a href="index.php">Back</a>
