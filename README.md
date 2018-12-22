# MicroBlog
Made in the PHP-MYSQL module powered by @nilsine

## Getting started
- Create a database named `microblog`
- Import SQL table `users`

```sql
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(60) NOT NULL,
  `email` varchar(82) NOT NULL,
  `password` text NOT NULL,
  `role` int(1) NOT NULL DEFAULT 0,
  `sid` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
```

- Import SQL table `messages`

```sql
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `created_at` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `last_ip` varchar(30) DEFAULT NULL,
  `likes` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `fk_messages_users` (`user_id`),
  CONSTRAINT `fk_messages_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;
```

- Modify config.php file with your configuration

For example:

```php
return [
    // Database host
    "host" => "127.0.0.1",
    // Database name
    "name" => "microblog",
    // Database username
    "user" => "root",
    // Database password
    "pass" => "root",
    // Debug mode
    // Show errors or not
    "debug" => true
];
```

## Credits
- Copyright 2013-2016 Blackrock Digital LLC. Code released under the [MIT](https://github.com/BlackrockDigital/startbootstrap-freelancer/blob/gh-pages/LICENSE) license.
