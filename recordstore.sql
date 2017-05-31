drop database if exists recordstore;
create database if not exists recordstore;

use recordstore;

DROP TABLE IF EXISTS artist;

CREATE TABLE artist (
  artistID int(10) primary key NOT NULL auto_increment, 
  artistName varchar(100) NOT NULL
  );


DROP TABLE IF EXISTS album;

CREATE TABLE album (
  albumID int(10) primary key NOT NULL auto_increment, 
  artistID int(10) NOT NULL,
  albumName varchar(100) not null,
  is_active tinyint(1) DEFAULT '1',
  cost DECIMAL(5 , 2 ) NOT NULL,
  stock int(10),
  foreign key (artistID) references artist(artistID)
  );

DROP TABLE IF EXISTS users;
  
  CREATE TABLE users (
  user_id int(10) primary key NULL auto_increment,
  user_name varchar(50) CHARACTER SET utf8 NOT NULL,
  pass char(60) NOT NULL,
  join_date datetime NOT NULL,
  last_mod_date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  address varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  city varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  state char(2) DEFAULT NULL,
  zipcode char(5) DEFAULT NULL,
  firstname varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  lastname varchar(50) CHARACTER SET utf8 DEFAULT NULL
  );


DROP TABLE IF EXISTS cart_items;

CREATE TABLE cart_items (
  cart_item_id int(10) primary key NOT NULL auto_increment,
  albumID int(10) unsigned ,
  user_id int(10) NULL,
  quantity int(10) unsigned NULL,
  FOREIGN KEY (user_id) REFERENCES users(user_id)
  );

DROP TABLE IF EXISTS cart;

CREATE TABLE cart (
  cart_id int(10) primary key NOT NULL auto_increment,
  user_id int(10) NOT NULL,
  cart_date datetime NOT NULL,
  cart_subtotal decimal(6,2) NOT NULL,
  cart_tax decimal(6,2) NOT NULL,
  cart_total decimal(6,2) NOT NULL,
  last_mod_date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  cart_status_id int(10) unsigned NOT NULL DEFAULT '1',
  KEY user_id (`user_id`),
  FOREIGN KEY (`user_id`) REFERENCES users(`user_id`)
  );
  


insert into artist (ArtistName) values ('Local Natives');
set @artistID = (select artistID from artist where artistName = 'Local Natives');

insert into album (albumName, artistID, cost, stock) 
values ('Gorilla Manor', @artistID, 10.5, 12), ('Hummingbird', @artistID, 12.5, 5),('Sunlit Youth', @artistID, 19.5, 20);


insert into artist (ArtistName) values ('Metallica');
set @artistID = (select artistID from artist where artistName = 'Metallica');

insert into album (albumName, artistID, cost, stock) 
values ('Load', @artistID, 5.5, 12), ('Reload', @artistID, 5.5, 15),('Black Album', @artistID, 10.5, 10),
('Kill em All', @artistID, 11.5, 8),('Ride The Lightning', @artistID, 8.5, 20),('St. Anger', @artistID, .5, 50);


SELECT * from cart_items;
