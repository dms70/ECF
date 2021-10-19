<?php


try {
    $pdo = new PDO('mysql:host=localhost;dbname=mediatheque', 'root', '');

    foreach ($pdo->query('SELECT id FROM book where bookeddate < now()  - INTERVAL 3 day AND reserved = true' , PDO::FETCH_ASSOC) as $book) {
        //echo $book['id'].'<br>';
    }

    $statement = $pdo->prepare('SELECT id FROM book WHERE  bookeddate < now()  - INTERVAL 3 day AND reserved = true');

    if ($statement->execute()) {
  
        while ($book = $statement->fetch(PDO::FETCH_NUM)) {
            echo '<prebook>'; 
            print_r($book);
            echo '<afterebook>'; 

            $reserved = $pdo->prepare("UPDATE  book SET reserved = false WHERE id = $book[0] ");
            $reserved->execute();

            $Bookeddate = $pdo->prepare("UPDATE  book SET Bookeddate = NULL WHERE id = $book[0] ");
            $Bookeddate->execute();

            $getuserid = $pdo->prepare("SELECT user_id FROM book where id = $book[0] ");
            $getuserid->execute();
            $userid = $getuserid->fetch(PDO::FETCH_NUM);
            echo '<preuserid>'; 
            print_r($userid);
            echo '<afteruserid>'; 

            $gettotalbookuser = $pdo->prepare("SELECT bookborrowed FROM user where id = $userid[0] ");
            $gettotalbookuser->execute();
            $booknumber = $gettotalbookuser->fetch(PDO::FETCH_NUM);
            echo '<pregettotalbookuser>';
            print_r($booknumber);
            echo '</pregettotalbookuser>';


            $booknumberuser = $booknumber[0] -1;
            $totalbookuser = $pdo->prepare("UPDATE  user SET bookborrowed = $booknumberuser WHERE id = $userid[0] ");
            $totalbookuser->execute();
            echo '<pretotalbookuser>';
            print_r($booknumber);
            echo '</pretotalbookuser>';

            $user = $pdo->prepare("UPDATE  book SET user_id = NULL WHERE id = $book[0] ");
            $user->execute();
            echo '<preuser>';
            print_r($user);
            echo '</postuser>';


          
        }
    }





} catch (PDOException $e) {
  




}



