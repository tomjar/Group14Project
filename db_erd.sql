-- Created by Aaron Weiss on 10/16/2013
-- db_erd.sql is probably the most boring name, but it's apt.
-- It's also hella vague now that I think about it.
-- Sorry for the overly-heavy commenting.

-- Create Schema
-- Might need to drop schema later to change or add tables. We'll see.
-- DROP SCHEMA IF EXISTS grpproj CASCADE; -- <- This is the command to do that.
CREATE SCHEMA grpproj;

SET search_path = grpproj;

-- Member table
-- Information represents each 'person' in the database
CREATE TABLE member (
memberid SERIAL PRIMARY KEY, -- SERIAL might not be the best data type for this, but it'll work.
fname varchar(20),
lname varchar(20),
-- The field 'contact' was pretty vague, especially considering 'email' is already on here. Omitted since I don't know what to do.
password varchar(32), -- According to Wikipedia, MD5 hashes are 32 digits long. Remember to hash passwords.
username varchar (20),
email varchar (40) -- Email addresses can be pretty long. Adjust as needed.
);

-- Club table
-- Information represents all the available clubs on campus
-- There's a strong deviation from the ERD here. 'Founder' just seems to be miscellaneous information that could be
-- in the club description if so desired. What would make more sense, to me, would be to have a club 'head', which is
-- a many-to-one relationship with 'member'. Requests from people to join a club would be sent to this person, and
-- invitations to join a club would be sent from this person. A single person can 'head' multiple clubs.
-- Also added a 'description' attribute because that seemed to make sense.
CREATE TABLE club (
clubid SERIAL PRIMARY KEY,
name varchar (20), -- No idea how long this ought to be.
category varchar (20),
head integer REFERENCES member (memberid),
contactinfo varchar (40), -- Probably just an email
yearfounded integer,
description varchar (500), -- I feel like there ought to be some special data type for large amounts of text. Look into this.
CHECK (yearfounded >= 1839) -- Mizzou was founded in 1839; clubs couldn't possibly have been founded before that.
);

-- ClubMember table
-- Exists so 'member' and 'club' can have a many-to-many relationship
-- Information represents which people are in which clubs
CREATE TABLE clubmember (
clubid integer REFERENCES club (clubid),
memberid integer REFERENCES member (memberid),
PRIMARY KEY (clubid, memberid)
);

-- Favorites table
-- Information represents which clubs are marked as 'favorite' by which people
CREATE TABLE favorites (
clubid integer REFERENCES club (clubid),
memberid integer REFERENCES member (memberid),
PRIMARY KEY (clubid, memberid)
);

-- Events table
-- Information represents the events held by the different clubs
CREATE TABLE event (
eventid SERIAL PRIMARY KEY,
name varchar (40),
location varchar (60), -- An address, maybe? No idea how long this should be.
datetime timestamp, -- Using a timestamp is actually more efficient than using separate 'time' and 'date' attributes.
description varchar (500), -- Again, see if there's a special data type for large amounts of text.
category varchar (20),
clubid integer REFERENCES club (clubid)
);
