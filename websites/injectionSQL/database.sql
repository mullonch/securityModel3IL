DROP DATABASE IF EXISTS injectionSQL;
CREATE DATABASE injectionSQL;
USE injectionSQL;

CREATE TABLE item (
    id INT(100) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    label VARCHAR(500) NOT NULL,
    price DOUBLE(50, 2)
);

CREATE TABLE user (
    id INT(100) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name VARCHAR(500) NOT NULL,
    password VARCHAR(500) NOT NULL
);

INSERT INTO item(label, price) VALUES ("Voiture", 9999.99);
INSERT INTO item(label, price) VALUES ("Vélo", 199.99);
INSERT INTO item(label, price) VALUES ("Trotinette", 99.99);
INSERT INTO item(label, price) VALUES ("Rollers", 49.99);

INSERT INTO user(name, password) VALUES ("root", MD5("root"));
INSERT INTO user(name, password) VALUES ("admin", MD5("admin"));
INSERT INTO user(name, password) VALUES ("user", MD5("password"));