CREATE DATABASE linkvee;

USE linkvee;

CREATE TABLE user (
	id int NOT NULL auto_increment,
	username varchar(30) NOT NULL,
	password varchar(1000),
	firstname varchar(30) NOT NULL,
	lastname varchar(30) NOT NULL,
	email varchar(30),
	PRIMARY KEY (id)
)

CREATE TABLE userinfo (
	user_id NOT NULL auto_increment,
	twitter varchar(30) NOT NULL,
	facebook varchar(30) NOT NULL,
	youtube varchar(30) NOT NULL,
	yahoo varchar(30) NOT NULL,
	windows varchar(30) NOT NULL,
	aim varchar(30) NOT NULL,
	skype varchar(30) NOT NULL,
	wave varchar(30) NOT NULL,
	phone varchar(30) NOT NULL,
	digg varchar(30) NOT NULL,
	firstname varchar(30),
	lastname varchar(30),
	email varchar(30),
	contact_id int,
	PRIMARY KEY (user_id),
	FOREIGN KEY (contact_id) REFERENCES user(id)
)

CREATE TABLE email_content (
	subject varchar(30)
	message varchar(1000)
)

CREATE TABLE admin_msg (
	motd varchar(300),
	welcome varchar(300),
	id int auto_increment,
	PRIMARY KEY (id)
)

CREATE TABLE profile_picture (
	url varchar(1000),
	picture_id int NOT NULL PRIMARY KEY auto_increment,
	contact_picture int
)