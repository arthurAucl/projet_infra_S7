drop database if exists css_test;
create database css_test;

use css_test;
CREATE TABLE IF NOT EXISTS entries (
    id INT NOT NULL AUTO_INCREMENT, 
    entry varchar(255) NOT NULL,
    PRIMARY KEY (id)
);
INSERT INTO entries(entry) VALUES  ("entry 1"), ("entry 2"); 
