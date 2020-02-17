CREATE DATABASE meet_proj_yearlong_final;
USE meet_proj_yearlong_final;

CREATE TABLE messages (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
poster_name VARCHAR(255) ,
message VARCHAR(255)
);

CREATE TABLE forums (
id VARCHAR(10) NOT NULL,
title VARCHAR(255) ,
description VARCHAR(255),
imdb VARCHAR(255),
stars VARCHAR(255),
tag VARCHAR(255)
);

INSERT INTO `messages`(poster_name, message) VALUES ("me","test");

select * FROM messages;
CREATE USER 'meet'@'localhost' IDENTIFIED  WITH mysql_native_password BY '=vh2MfzK+G@@t8h!';
GRANT ALL PRIVILEGES ON * . * TO 'meet'@'localhost';
FLUSH PRIVILEGES;
drop table messages;
