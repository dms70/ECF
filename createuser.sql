use mediatheque

INSERT INTO `user` (`id`, `email`, `auth_code`, `roles`, `password`, `is_verified`, `firstname`, `lastname`, `birthdate`, `adress`, `bookborrowed`) VALUES (NULL, 'superadmin@myorganisation.fr', NULL, '["ROLE_ADMIN"]', 'Mypassword', '1', 'superadmin', 'myorganisation', '1970-01-01', 'myadress', NULL);
