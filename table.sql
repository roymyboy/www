--This table keeps track of the username and password
CREATE TABLE user (
	email VARCHAR(256) NOT NULL PRIMARY KEY,
	password VARCHAR(64) NOT NULL,
	access INTEGER(1)
);

--This table keeps track of picture uploaded
CREATE TABLE picture (
	imageid int NOT NULL AUTO_INCREMENT,
	description VARCHAR(40),
	image BLOB,
	PRIMARY KEY (imageid)
);

--This table keeps track of individual 
CREATE TABLE individual (
	personID int,
	lastName VARCHAR(255),
	firstName VARCHAR(255),
	address VARCHAR(255),
	city VARCHAR(255),
	state VARCHAR(50),
	zip_code int(50)
);

CREATE TABLE uploaders (
	uploaders_id int NOT NULL,
	uploaders_name VARCHAR(255) NOT NULL,
	upploaders_address VARCHAR(255) NOT NULL,
);
