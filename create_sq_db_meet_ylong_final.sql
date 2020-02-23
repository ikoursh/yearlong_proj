CREATE DATABASE meet_proj_yearlong_final;
USE meet_proj_yearlong_final;

CREATE TABLE sid
(
    id          INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    poster_name VARCHAR(255),
    message     VARCHAR(255)
);

CREATE TABLE forums
(
    id          VARCHAR(10) primary key unique NOT NULL,
    title       VARCHAR(255)                   NOT NULL,
    description VARCHAR(255)                   NOT NULL,
    imdb        VARCHAR(255),
    stars       VARCHAR(255),
    tag         VARCHAR(255)                   NOT NULL
);


CREATE USER 'meet'@'localhost' IDENTIFIED WITH mysql_native_password BY '=vh2MfzK+G@@t8h!';
GRANT ALL PRIVILEGES ON *.* TO 'meet'@'localhost';
FLUSH PRIVILEGES;
