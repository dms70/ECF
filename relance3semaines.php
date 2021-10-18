<?php

use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\Transport\Smtp\EsmtpTransport;
use Symfony\Component\Mailer\Mailer;



$pdo = new PDO('mysql:host=localhost;dbname=mediatheque', 'root', '');
$statement = $pdo->prepare('SELECT id,title,isbn FROM book WHERE  bookeddate < now()  - INTERVAL 21 day AND borrowed = true');

    if ($statement->execute()) {
        while ($book = $statement->fetch(PDO::FETCH_NUM)) {
            echo '<prebook>'; 
            print_r($book);
            echo '<afterebook>';

            $getuserid = $pdo->prepare("SELECT user_id FROM book where id = $book[0] ");
            $getuserid->execute();
            $userid = $getuserid->fetch(PDO::FETCH_NUM);
            echo '<preuserid>'; 
            print_r($userid);
            echo '<afteruserid>'; 

            $getmail = $pdo->prepare("SELECT email FROM user where id = $userid[0] ");
            $getmail->execute();
            $emailuser = $getmail->fetch(PDO::FETCH_NUM);
            echo '<pregettotalbookuser>';
            print_r($emailuser);
            echo '</pregettotalbookuser>';

            $email = (new Email())
            ->from('david@marcais.online')
            ->to($emailuser)
            ->subject('depassement emprunt 3 semaines livre ISBN',$book[2])
            ->text('depassement emprunt, merci de rapporter le livre' ,$book[1], 'le plus rapidement , Merci');
            
            try {
                $transport = new EsmtpTransport('localhost');
                $mailer = new Mailer($transport);
                $mailer->send($email);
            } catch (TransportExceptionInterface $e) {
                // some error prevented the email sending; display an
                // error message or try to resend the message
            }
        }

    }

