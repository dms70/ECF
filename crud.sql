NSERT INTO `book` (`id`, `categories_id`, `user_id`, `bookeds_id`, `title`, `image`, `publishdate`, `description`, `author`, `copy`, `isbn`, `bookeddate`, `reserved`, `borrowed`, `genre`) VALUES (NULL, '27', '124', NULL, 'livre de test', 'image', NULL, NULL, 'author de test', '1', '12345678912345', NULL, NULL, NULL, 'THRILLER');

SELECT * FROM `book` WHERE `title` LIKE 'livre de test' ORDER BY `bookeddate` DESC

UPDATE book SET bookeddate = now(), reserved = 1 WHERE title = 'livre de test'

DELETE FROM book WHERE title = 'livre de test'