<?php
include 'common.php';
?>
<!doctype html>
<html>

    <head>
        <title>Justified Nav</title>
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
        <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
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
                    <li>
                        <a href="group">My Group</a>
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
                <!--PHP to determine if edit should be here--><a class="toggle-edit" href="">edit</a>
                <div id="group-name-div" class="pull-left "><h3><i><span id = "group-name-value " class="editable" >ACM</span></i></h3></div>
                <div id="group-leader-div" class="pull-left"><h4>Led by:     <span id="group-leader-value" class="editable">Ben Sammons</span></h4></div>
                <div id="group-email-div" class="pull-left"><h4>contact us at:   <span id="group-email-value" class="editable"><a href="mailto:bsammnz@gmail.com">bsammnz@gmail.com</a></span></h4></div>
                <div id="group-description-div" class="pull-left"><h4>Description</h4><div id="description-value" class="editable">
                        badassery untold
                    </div></div>
                <div id="group-web-div" class="pull-left"><h4>find us at:   <span id="group-website-value" class="editable"><a href="acm.missouri.edu">acm.missouri.edu</a></span></h4></div>
                <div></div>
            </div>
            <!--group events-->
            <style type="text/css">
                #events {
                    margin-top: 15px;
                    margin-bottom: 15px;
                    max-width: 700px;
                    min-width: 250px;
                    background: rgba(0,125,0,0.4);
                    border-radius: 15px;
                }
                #events .col-md-3 {
                    margin: 5px;
                    margin-left: 10px;
                    width:31%;
                    height:100px;
                    background: rgba(0,125,0,0.2);
                }
                #events .col-md-3 a {
                    marign-bottom: 15px;
                }
            </style>
            <div id="events" class="container">
                <div class="row">
                    <div class="col-md-3"><h4>Title:HackMizzou</h4><h4>Date:10/27/2014</h4><a href="event.php">view</a></div>
                    <div class="col-md-3"><h4>Title:HackMizzou</h4><h4>Date:10/27/2014</h4><a href="event.php">view</a></div>
                    <div class="col-md-3"><h4>Title:HackMizzou</h4><h4>Date:10/27/2014</h4><a href="event.php">view</a></div>
                </div>
                <div class="row">
                    <div class="col-md-3"><h4>Title:HackMizzou</h4><h4>Date:10/27/2014</h4><a href="event.php">view</a></div>
                    <div class="col-md-3"><h4>Title:HackMizzou</h4><h4>Date:10/27/2014</h4><a href="event.php">view</a></div>
                    <div class="col-md-3"><h4>Title:HackMizzou</h4><h4>Date:10/27/2014</h4><a href="event.php">view</a></div>
                </div>
            </div>
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