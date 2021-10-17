<?php

use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mailer\Transport\SendmailTransport;

require_once 'vendor/autoload.php';


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

            $transport = new SendmailTransport();
            print_r($transport);
            $mailer = new Mailer($transport);
            print_r($mailer);

            $email = (new Email())
            ->from('dmarcais@yahoo.com')
            ->to('david@marcais.online')
            ->subject('depassement emprunt 3 semaines livre ISBN')
            ->text('depassement emprunt, merci de rapporter le livrele plus rapidement , Merci');

     
            try {

                $mailer->send($email);

            } catch (TransportExceptionInterface $e) {
                echo '<error>';
            }
        }

    }

