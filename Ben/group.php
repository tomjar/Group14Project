<?php
include 'common.php';
include 'database.php';
?>


<!doctype html>
<html>

    <head>
        <title>Group</title>
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
		
			
		
        <script type="text/javascript">

        </script>
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
                    <?php if (!$_SESSION['valid']) { ?>
                        <li>
                            <a href="" class="block-default login">Login</a>
                        </li>
                        <li>
                            <a href="" class="block-default register">Register Group</a>
                        </li>
                        <?php
                    } else {
                        ?>

                        <li>
                            <a href="logout.php">logout</a>
                        </li>
                    <?php } ?>
                </ul>
                <h3 id="brand-tag" class="text-muted">EventZou</h3>
            </div>
            <!--group details-->
            <style>
                #group {
                    margin-top: 15px;
                    margin-bottom: 15px;
                    max-width: 700px;
                    min-width: 250px;
                    background-color: rgba(125,125,125,0.1);
                    border-radius: 15px;
                }
                #group-name-div {
                    width: 100%;
                    height: 45px;
                }
                #group-leader-div {
                    max-width: 300px;
                    min-width: 300px;
                    height: 50px;
                }
                #group-email-div {
                    max-width: 300px;
                    min-width: 300px;
                    height: 50px;
                }
                #group-web-div {
                    max-width: 300px;
                    min-width: 300px;
                    height: 50px;
                }
                #group-img-div {
                    width: 200px;
                    height: 200px;
                }
                #description-value {
                    max-width: 300px;
                    min-width: 300px;
                    min-height: 25px;
                    max-height: 300px;
                    border-radius: 5px;
                    border-color: white;
                }
            </style>
            <div id="group" class="container">
                <!--remove image if there isn't one!-->
                <!--<div id="group-img" class="pull-left"><img src="#" alt="WAT"></div>-->
                <!-- -->
                <!--PHP to determine if edit should be here-->
                <?php if ($_SESSION[valid]) { ?><a class="toggle-edit" href="">edit</a> <?php } ?>
                <div id="group-name-div" class="pull-left "><h3><i><span id = "group-name-value " class="editable" >ACM</span></i></h3></div>
                <div id="group-leader-div" class="pull-left"><h4>Led by:     <span id="group-leader-value" class="editable">Ben Sammons</span></h4></div>
                <div id="group-email-div" class="pull-left"><h4>contact us at:   <span id="group-email-value" class="editable"><a href="mailto:bsammnz@gmail.com">bsammnz@gmail.com</a></span></h4></div>
                <div id="group-description-div" class="pull-left"><h4>Description</h4><div id="description-value" class="editable">
                        badassery untold
                    </div></div>
                <div id="group-web-div" class="pull-left"><h4>find us at:   <span id="group-website-value" class="editable"><a href="http://acm.missouri.edu">acm.missouri.edu</a></span></h4></div>
                <div></div>
            </div>
            <!--group events-->
            <style type="text/css">
                #events {
                    margin-top: 15px;
                    margin-bottom: 15px;
                    max-width: 700px;
                    min-width: 250px;
                    border-radius: 15px;
                }
                #events .col-md-3 {
                    margin: 5px;
                    margin-left: 10px;
                    width:31%;
                    height:140px;
                    background: rgba(125,125,125,0.1);
                    border-radius: 15px;
                }
                #events .col-md-3 a {
                    marign-bottom: 15px;
                }
            </style>
			<a href="" class="block-default createE">Create an Event</a>
			
			<?php
				$dbconn = pg_connect("host=dbhost-pgsql.cs.missouri.edu dbname=cs3380f13grp14 user=cs3380f13grp14 password=IuaciWb3");

				// Select the name of the event using the id
				$result = pg_prepare($dbconn, 'get_n', "SELECT event_id, name, details, event_date FROM project.events WHERE group_id = $1");
				echo "Group ID # ".$_SESSION['user_id'];
				$result = pg_execute($dbconn, 'get_n', array($_SESSION['user_id']));
				$cmdtuples = pg_affected_rows($result);
				
				
				
				
				
				echo "<div id=\"events\" class=\"container\">";
               echo "<div class=\"row\">";
				
				$tempeid = 0;
				while($line = pg_fetch_array($result, null, PGSQL_NUM)) {
					echo "<div class=\"col-md-3\">";

					//grab event id
					$tempeid = $line[0];
					
					//display event boxes
					echo "<h3>$line[1]</h3>"; //event name
					echo "<h4>$line[3]</h4>"; //event date
					echo "<h6>$line[2]</h6>"; //event details
					//echo "<h4>$line[4]</h4>";
					
					/*
					foreach($line as $col_value){		 
								echo "<h4>$col_value</h4>";
					}*/
					
					
					echo "<form action=\"event.php\" method=\"get\">";
					//echo "<form action=\"event.php?e-id=\"$values[0]\" method=\"post\">";
					echo "<input type=\"hidden\" value=$tempeid name=\"e-id\" />";
					echo '<button type\"submit\" value="" name="">View</button>';					
					//echo "<a href=\"event.php\">view</a>";
					
					echo "</div>";
					echo "</form>";
				}
				echo "</div></div>";
			
		pg_free_result($result);
		// Close the database connection
		$dbconn = pg_close($dbconn);
		
			?>

            <!-- Site footer -->
            <div class="footer">
                <p>&copy; EventZou 2013</p>
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
		
		<!--MODALS-->
        <div id="createE" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="createELabel" aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="createELabel">Share an event</h3>
            </div>
            <div class="modal-body">
                <form>
				 <section>
                        <div><label for="event-name">Event Name&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label><input type="text" id="event-name" class="e-data" name="event-name" placeholder="event name (required)" /></div>
                        <div><br><label for="event-details">Details</label><input type="text" id="event-details" name="event-details" class="e-data"  placeholder="Enter Details"></div>
						
						<div><label for="event-date">Event Date</label><input type="date" id="event-date" name="event-date" class="e-data" placeholder="Event Date)"/></div> 
						
						<div><label for="e-group-id">Group #</label><input type="number" id="e-group-id" name="e-group-id" class="e-data" value="<?php echo $_SESSION['user_id'];?>" readonly></div>				
                    </section>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                <button class="btn btn-primary submit-createE">Submit</button>
            </div>
			</div>
			</div>

    </body>

</html>