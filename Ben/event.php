<?php
include 'common.php';
?>
<!doctype html>
<html>

    <head>
        <title>Justified Nav</title>
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
        <script type="text/javascript" src="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="modal.css">
        <script type="text/javascript" src="common.js"></script>
        <style type="text/css">
            /* Space out content a bit */
            body {
                padding-top: 20px;
                padding-bottom: 20px;
            }
            /* Everything but the jumbotron gets side spacing for mobile first views */
            .header, .marketing, .footer {
                padding-left: 15px;
                padding-right: 15px;
            }
            /* Custom page header */
            .header {
                border-bottom: 1px solid #e5e5e5;
            }
            /* Make the masthead heading the same height as the navigation */
            .header h3 {
                margin-top: 0;
                margin-bottom: 0;
                line-height: 40px;
                padding-bottom: 19px;
            }
            /* Custom page footer */
            .footer {
                padding-top: 19px;
                color: #777;
                border-top: 1px solid #e5e5e5;
            }
            /* Customize container */
            @media(min-width: 768px) {
                .container {
                    max-width: 730px;
                }
            }
            .container-narrow > hr {
                margin: 30px 0;
            }
            /* Main marketing message and sign up button */
            .jumbotron {
                text-align: center;
                border-bottom: 1px solid #e5e5e5;
            }
            .jumbotron .btn {
                font-size: 21px;
                padding: 14px 24px;
            }
            /* Supporting marketing content */
            .marketing {
                margin: 40px 0;
            }
            .marketing p + h4 {
                margin-top: 28px;
            }
            /* Responsive: Portrait tablets and up */
            @media screen and(min-width: 768px) {
                /* Remove the padding we set earlier */
                .header, .marketing, .footer {
                    padding-left: 0;
                    padding-right: 0;
                }
                /* Space out the masthead */
                .header {
                    margin-bottom: 30px;
                }
                /* Remove the bottom border on the jumbotron for visual effect */
                .jumbotron {
                    border-bottom: 0;
                }
            }
        </style>
        <style>
            #content {
                margin-top:25px;
            }
        </style>
    </head>

    <body>
        <div class="container">
            <div class="header">
                <ul class="nav nav-pills pull-right">
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="listing.php">Listing</a>
                    </li>
                    <!-- <li>            <a href="#">About</a>          </li>          <li>            <a href="#">Contact</a>          </li> -->
                    <!--PHP PHP-->
                    <li>
                        <a href="group.php">My Group</a>
                    </li>
                    <li>
                        <a href="" class="login block-default">Login</a>
                    </li>
                    <li>
                        <a href="" class="register block-default">Register Group</a>
                    </li>
                </ul>
                <h3 id="brand-tag" class="text-muted">EventZou</h3>
            </div>
            <!--event details-->
            <style>
                #event {
                    width: 700px;
                    height: 500px;
                }
                #event-name {
                    width: 250px;
                    height: 50px;
                }
                #event-date {
                    width: 250px;
                    height: 50px;
                }
                #event-host {
                    width: 250px;
                    height: 30px;
                }
                #event-description {
                    width: 500px;
                    height: 90%;
                }
                #event hr {
                    height: 1px;
                    width: 500px;
                    background-color:lightgray;
                }
                #event-description-value {
                    padding: 10px;
                }
                #event-contact {
                    width: 250px;
                }
            </style>
			
	<?php		
	
			$eid = htmlspecialchars($_GET["e-id"]);
			$dbconn = pg_connect("host=dbhost-pgsql.cs.missouri.edu dbname=cs3380f13grp14 user=cs3380f13grp14 password=IuaciWb3");

				// Select the name of the event using the id
				$result = pg_prepare($dbconn, 'get_n', "SELECT name, details, event_date FROM project.events WHERE event_id = $1");
				
				/*
				//still need to SQL select group email and group name
				
				SELECT events.name, events.details, events.event_date, groups.name FROM project.events INNER JOIN project.groups ON groups.group_id=events.group_id;

				
				
				
				*/
				
				

				//echo "Group ID # ".$_SESSION['user_id'];
				$result = pg_execute($dbconn, 'get_n', array($eid));
				$cmdtuples = pg_affected_rows($result);
				
		
				while($line = pg_fetch_array($result, null, PGSQL_NUM)) {
					
					//display event boxes
				//	echo "<h3>$line[1]</h3>"; //event name
				//	echo "<h4>$line[3]</h4>"; //event date
				//	echo "<h6>$line[2]</h6>"; //event details
					//echo "<h4>$line[4]</h4>";
				
		
			
			
			
			
            echo "<div id=\"event\">";
             /*   <!-- <img src width="200px" height="200px" alt="image problems" class="pull-left img-rounded"> -->*/
                echo "<div class=\"pull-left\" id=\"event-name\">";
                    echo "<h4 class=\"pull-left\" id=\"event-name-value\">Event Name:<strong> $line[0]</strong></h4>";
                echo "</div>";
                echo "<div class=\"pull-left\" id=\"event-date\">";
                    echo "<h4>Event Date: <strong id=\"event-date-value\"> $line[2]</strong></h4>";
                echo "</div>";
                echo "<div class=\"pull-left\" id=\"event-host\">";
                    echo "<h4>Hosted by:           <a href id=\"event-host-value\">ACM</a></h4>";
               echo "</div>";
                echo "<div class=\"pull-left\" id=\"event-contact\">";
                    echo "<h4>Contact:           <a href=\"mailto:ACM\" id=\"event-contact-value\">bds8c7@mail.missouri.edu</a></h4>";
                echo "</div>";
                echo "<hr class=\"pull-left\">";
                echo "<div class=\"pull-left\" id=\"event-description\">";
                   echo "<h4>Description</h4>";
                    echo "<p id=\"event-description-value\"> $line[1]</p>";
               echo "</div>";
            echo "</div>";
			
			}

			
		pg_free_result($result);
		// Close the database connection
		$dbconn = pg_close($dbconn);
		
			?>
            <!-- Site footer -->
            <div class="footer">
                <p>&copy; Company 2013</p>
            </div>
        </div>
        <!--MODALS-->
        <div id="register" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="registerLabel" aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="registerLabel">Your group is growing as you type...</h3>
            </div>
            <div class="modal-body">
                <form>
                    <section>
                        <div><label for="group-name">Group name&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label><input type="text" id="group-name" name="group-name" placeholder="name (required)" /></div>
                        <div><label for="group-email">Group's public email</label><input id="group-email" name="group-email" type="email" placeholder="contact email (required)"/></div>
                        <div><label for="leader-name">Group leader&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label><input id="leader-name" name="leader-name"type="text" placeholder="leader name (optional)"/></div>
                        <div><label for="password">password&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label><input id="password" name="password"type="password" placeholder="password"/></div>
                        <div><br><label for="group-description">Description</label><textarea id="group-description" name="group-description"  placeholder="Tell us about your group; what makes you awesome? Why will people become awesome when they join you? Anything's fair game, just be nice..."></textarea></div>
                    </section>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                <button class="btn btn-primary submit-register" >Submit</button>
            </div>
        </div>
        <!--MODALS-->
        <div id="login" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="loginLabel" aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="loginLabel">Welcome Back!</h3>
            </div>
            <div class="modal-body">
                <form>
                    <section>
                        <div><label for="group-email">Group's public email</label><input id="group-email" name="group-email" type="email" placeholder="contact email (required)"/></div>
                        <div><label for="password">password&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label><input id="password" name="password"type="password" placeholder="password"/></div>
                        <div><br></div>
                    </section>
                </form>
            </div>
            <div class="modal-footer">

            </div>
            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
            <button class="btn btn-primary submit-login">Submit</button>

        </div>

    </body>

</html>