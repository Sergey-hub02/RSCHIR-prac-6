CREATE DATABASE IF NOT EXISTS lombard;
CREATE USER IF NOT EXISTS 'admin'@'%' IDENTIFIED WITH mysql_native_password BY 'admin';
GRANT SELECT,UPDATE,INSERT,DELETE ON lombard.* TO 'admin'@'%';
FLUSH PRIVILEGES;

USE lombard;
CREATE TABLE IF NOT EXISTS `User` (
    `user_id` INT PRIMARY KEY AUTO_INCREMENT,
    `username` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS `Goods`(
    `goods_id` INT PRIMARY KEY AUTO_INCREMENT,
    `title` VARCHAR(255) NOT NULL,
    `description` TEXT NOT NULL
);

CREATE TABLE IF NOT EXISTS `File`(
    `file_id` INT PRIMARY KEY AUTO_INCREMENT,
    `path` TEXT NOT NULL,
    `user_id` INT NOT NULL
);

INSERT INTO `User` (
    `username`,
    `email`,
    `password`
)
VALUES
    ('ezh1k', 's.park190802@gmail.com', '$2y$10$8tMdwAC2xM9PSLqev5gBGODjQEnHduLh0mXhp2OYOWjdPTa4OPTwi');

INSERT INTO `Goods`(`title`, `description`)
VALUES
    ('Title #1', 'Description number 1'),
    ('Title #2', 'Description number 2'),
    ('Title #3', 'Description number 3'),
    ('Title #4', 'Description number 4'),
    ('Title #5', 'Description number 5');
