<?php
include 'common.php';
?>
<!doctype html>
<html>

    <head>
        <title>Event Listing</title>
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
            .jumbotron {
            }
            #brand-tag {
                margin-left: 60px;
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
                    <li class="active">
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
                            <a href="group.php">My Group</a>
                        </li>
                        <li>
                            <a href="logout.php">logout</a>
                        </li>
                    <?php } ?>
                </ul>
                <h3 id="brand-tag" class="text-muted">EventZou</h3>
            </div>
            <!-- Jumbotron -->
            <div class="jumbotron">
                <p></p>
                <input type="text" class="form-control search" placeholder="Search here">
                <div class="container">
					<?php
					//grab the url param from url
					$searchInput = $_GET["query"];
					//does it exist?
					if($searchInput != NULL){
						//TODO: clean up the text input with regex 
						generateSearchResults($searchInput);
					}
						/*This function recieves */
	function printResultingTable($result)
	{
		$rowsReturned = pg_num_rows($result);
		$columnsReturned = pg_num_fields($result);
		
		// Printing results in HTML
		if($rowsReturned > 0)
		{
			echo "<i style=\"color:green;\">The query returned $rowsReturned rows.</i>\n<table border=\"1px\">\n";
		}else
		{
			echo "<i style=\"color:orange;\">The query returned 0 rows.</i>\n<table border=\"1px\">\n";
		}
		//start row for table headers
		echo "<tr>";
		for($i = 0; $i < $columnsReturned; $i++)
		{
			$fieldname = pg_field_name($result, $i);
			echo "\t\n<th>$fieldname</th>";
		}
		//end table header row
		echo "</tr>";
		while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) 
		{
			echo "\t<tr>\n";
			foreach ($line as $col_value)
			{
				echo "\t\t<td>$col_value</td>\n";
			}
			echo "\t</tr>\n";
		}
		echo "</table>\n";
		//free result
		if($result != null)
		{
			pg_free_result($result);
		}
	}/*END FUNCTION*/
					
						//This function will output the formatted query results if any results are available.
						function generateSearchResults($input){
							//So i divided into two separate querys to help with the logic and to display them under
							//separate headers. make sense?
							$queryEvents = "SELECT events.name, events.details, events.event_date
									FROM project.events
									WHERE events.name ILIKE $1 
									OR events.name ILIKE $2
									ORDER BY events.event_date ASC;";
							$queryGroups ="SELECT groups.name, groups.description
									FROM project.groups
									WHERE groups.name ILIKE $1 
									OR groups.description ILIKE $2
									ORDER BY groups.name ASC;";
							
							$dbconn = pg_connect("host=dbhost-pgsql.cs.missouri.edu dbname=cs3380f13grp14 user=cs3380f13grp14 password=IuaciWb3");
							$statement = pg_prepare($dbconn, 'get_events', $queryEvents;
							$result = pg_execute($dbconn, 'get_events', array($input, $input));
							$rowsReturnedEvents = pg_num_rows($result);
							if($rowsReturnedEvents > 0)
							{
								//print the results events
								printResultingTable($result);
							}
							
							$statement = pg_prepare($dbconn, 'get_groups', $queryGroups;
							$result = pg_execute($dbconn, 'get_groups', array($input, $input));
							$rowsReturnedGroups = pg_num_rows($result);
							if($rowsReturnedGroups > 0)
							{
								//print the results of groups
								printResultingTable($result);
							}
							pg_free_result($result);
							pg_close($dbconn);
						}
					
					?>
                    <div class="row">
                        <div class="col-md-3">ROw 1 Column 0 </div>
                        <div class="col-md-3">ROw 1 Column 1 </div>
                        <div class="col-md-3">ROw 1 Column 2 </div>
                        <div class="col-md-3">ROw 1 Column 3 </div>
                    </div>
                </div>
            </div>
            <!-- Example row of columns -->
            <!-- Site footer -->
            <div class="footer">
                <p>&copy; EventZou Group 2013</p>
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