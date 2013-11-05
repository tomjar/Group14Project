DROP SCHEMA IF EXISTS project CASCADE;
CREATE SCHEMA project;
SET Search_Path = project;
---bsammnz@gmail.com
---314 853 7371

--NOTE postgres that we have does not
--have any of the crypt or uuid (universally unique id) modules
--so we will have to have php handle our encryption to do security
--for group ids we will use large unique serials instead of
--uuid's
--unless someone has a better way

--real password hashing in php
--http://stackoverflow.com/questions/4795385/how-do-you-use-bcrypt-for-hashing-passwords-in-php

--------------------------
--Groups contains:
---- Group_ID
---- Name
---- Description
---- Image
---- Date_Joined
---- Date_Last_Visit
---- Picture_ID
CREATE TABLE Groups (
Group_ID SERIAL UNIQUE ,
Name CHARACTER VARYING(255) NULL,
Description text NULL,
Date_Joined timestamp NULL,
Date_Last_Visit timestamp NULL
);
--To maximize security store salts in a separate table
--justification is that if someone had acces to our db via same 
--malicious form it is simply annoying for them that they don't get the
--salts by scraping everything out of the Groups table
--could also consider making the name of the Groups and salts tables
--something non-intuitive, but honestly its overkill for this

--salts to groups is 1-1
--Salt_ID
--Group_ID
--Salt -- set to length 6 but we can change that
CREATE TABLE Salts (
Salt_ID SERIAL UNIQUE NOT NULL,
Group_ID INTEGER NULL,
Salt CHARACTER VARYING(255) NULL
);

--passwords to groups is 1-1
--Password_ID
--Group_ID
--Password_Hash
CREATE TABLE Passwords (
 Password_ID SERIAL UNIQUE NOT NULL,
 Group_ID INTEGER NULL,
 Password_Hash text NULL
);

--------------------------

--------------------------
--groups to emails is 1-many
----Email_ID
----Group_ID
----Email
----Is_Primary
CREATE TABLE Emails (
	Email_ID INTEGER NOT NULL,
	Group_ID INTEGER NULL,
	Email text NULL,
	Is_Primary BIT NULL
);
--------------------------

--------------------------
--groups to events is 1-many
----Event_ID
----Group_ID
----Name
----Details
----Date_Created
----Event_Date
----Picture_ID
CREATE TABLE Events (
	Event_ID SERIAL UNIQUE NOT NULL,
	Group_ID INTEGER NULL,
	Name text NULL,
	Details text NULL,
	Date_Created timestamp NULL,
	Event_Date timestamp NULL,
	Picture_ID INTEGER NULL
);

--------------------------
--pictures could be used by events, groups or both
--1 picture to many others
----Picture_ID
----Picture
CREATE TABLE Pictures (
	Picture_ID SERIAL UNIQUE NOT NULL,
	Picure bytea NULL
);
--------------------------
 --
 --Functions or prepared statements????
 --