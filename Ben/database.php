<?php

//if succeeds returns a user id
function insert_group($name, $description, $email, $password) {
    $dbconn = pg_connect("host=dbhost-pgsql.cs.missouri.edu dbname=cs3380f13grp14 user=cs3380f13grp14 password=IuaciWb3");
    $result = pg_prepare($dbconn, 'insert_g', "INSERT INTO project.groups (name,email,description,date_joined) VALUES ($1,$2,$3,$4) RETURNING group_id");
    $date = new DateTime('NOW');
    $date = $date->format('c');
    $result = pg_execute($dbconn, 'insert_g', array($name, $email, $description, $date));
    $userid = pg_fetch_result($result, 0, 0);
    $result = pg_prepare($dbconn, 'insert_s', "INSERT INTO project.salts (Salt,Group_ID) VALUES ($1,$2)");
    $salt = md5(uniqid('', true)); //not the best but more than enough for our purposes even if this were a business
    $result = pg_execute($dbconn, 'insert_s', array($salt, $userid));
    $hash = crypt($password, $salt);
    $result = pg_prepare($dbconn, 'insert_p', "INSERT INTO project.passwords (Password_Hash,Group_ID) VALUES ($1,$2)");
    $result = pg_execute($dbconn, 'insert_p', array($hash, $userid));
    $dbconn = pg_close($dbconn);
    return $userid;
}

//returns true/false, also populates a few session properties
function check_pass($name, $password) {
    $dbconn = pg_connect("host=dbhost-pgsql.cs.missouri.edu dbname=cs3380f13grp14 user=cs3380f13grp14 password=IuaciWb3");
    $result = pg_prepare($dbconn, 'get_id', "SELECT user_id,s.salt,p.password_hash as hash
        FROM project.groups g
        INNER JOIN project.salts s using(group_id)
        INNER JOIN project.passwords p using(group_id) WHERE g.name = $1");
    $result = pg_execute($dbconn, 'get_id', array($name));
    echo json_encode(array("what" => $result));
    $userid = pg_fetch_result($result, 0, "user_id");
    $salt = pg_fetch_result($result, 0, "salt");
    $hash = pg_fetch_result($result, 0, "hash");
    $dbconn = pg_close($dbconn);
    if (crypt($password, $salt) != $hash) {
        return false;
    } else {
        $_SESSION['user_id'] = $userid;
        $_SESSION['user'] = $name;
        return true;
    }
}

// Returns the id of an event within a certain timeframe
function get_event_id($timeframe) {
	// Connect to the database
	$dbconn = pg_connect("host=dbhost-pgsql.cs.missouri.edu dbname=cs3380f13grp14 user=cs3380f13grp14 password=IuaciWb3");

	// Grab the id of a random event within the given timeframe
	$result = pg_prepare($dbconn, 'get_e_id', "SELECT event_id FROM project.events WHERE (event_date > current_timestamp) AND (date_trunc($1, event_date) = date_trunc($1, CURRENT_TIMESTAMP)) ORDER BY random() LIMIT 1");
	$result = pg_execute($dbconn, 'get_e_id', array($timeframe));
	while($line = pg_fetch_array($result, null, PGSQL_NUM)) {
		$eventid = $line[0];
	}
	return $eventid;

	// Close the database connection
	$dbconn = pg_close($dbconn);
}


// Returns the name of an event given its id
function get_event_name($eventid) {
	// Connect to the database
	$dbconn = pg_connect("host=dbhost-pgsql.cs.missouri.edu dbname=cs3380f13grp14 user=cs3380f13grp14 password=IuaciWb3");

	// Select the name of the event using the id
	$result = pg_prepare($dbconn, 'get_n', "SELECT name FROM project.events WHERE event_id = $1");
	$result = pg_execute($dbconn, 'get_n', array($eventid));
	while($line = pg_fetch_array($result, null, PGSQL_NUM)) {
		$name = $line[0];
	}
	return $name;

	// Close the database connection
	$dbconn = pg_close($dbconn);
}

// Returns the description of an event given its id
function get_event_details($eventid) {
	// Connect to the database
	$dbconn = pg_connect("host=dbhost-pgsql.cs.missouri.edu dbname=cs3380f13grp14 user=cs3380f13grp14 password=IuaciWb3");

	// Select the details of the event using the id
	$result = pg_prepare($dbconn, 'get_d', "SELECT details FROM project.events WHERE event_id = $1");
	$result = pg_execute($dbconn, 'get_d', array($eventid));
	while($line = pg_fetch_array($result, null, PGSQL_NUM)) {
		$details = $line[0];
	}
	return $details;

	// Close the database connection
	$dbconn = pg_close($dbconn);
}

?>
