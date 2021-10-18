<?php

$pdo = new PDO('mysql:host=localhost;dbname=mediatheque', 'root', '');

$statement = $pdo->prepare('SELECT image,id FROM book');

if ($statement->execute()) {

    while ($book = $statement->fetch(PDO::FETCH_NUM)) {


        $info = new SplFileInfo($book[0]);
        $filenameimage = $info->getFilename();
        echo '<image>'; 
        print_r($filenameimage);
        print_r($book[1]);
        echo '<image>'; 
    
    
        $image = $pdo->prepare("UPDATE book SET image = '$filenameimage' WHERE id = $book[1] ");
        $image->execute();
      

      
    }

   




}