use meditheque;

INSERT INTO `book` (`id`, `categories_id`, `user_id`, `bookeds_id`, `title`, `image`, `publishdate`, `description`, `author`, `copy`, `isbn`, `bookeddate`, `reserved`, `borrowed`, `genre`) VALUES (NULL, '27', NULL, NULL, 'livre de test', 'image', NULL, NULL, 'author de test', '1', '12345678912345', NULL, NULL, NULL, 'THRILLER');

SELECT * FROM `book` WHERE `title` LIKE 'livre de test' ORDER BY `bookeddate` DESC;

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `is_verified`, `firstname`, `lastname`, `birthdate`, `adress`, `bookborrowed`, `auth_code`) VALUES (NULL, 'HABITANT@davidmarcais.fr', 'ROLE_HABITANT', 'password', '1', 'firstnameH', 'firstnameH', '1970-10-01', 'adress habitant', '0', NULL);

UPDATE book SET bookeddate = '2021/01/01', reserved = 1 WHERE title = 'livre de test';

DELETE FROM book WHERE title = 'livre de test';

DELETE FROM user WHERE email = 'HABITANT@davidmarcais.fr';





