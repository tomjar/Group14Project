<!doctype html>

<html>
  
  <head>
    <title>Club/Group/Event Creation</title>
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
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
  </head>
  
  <body>
    <div class="container">
      <div class="header">
        <ul class="nav nav-pills pull-right">
          <li class="active">
            <a href="#">Home</a>
          </li>
          <li>
            <a href="#">About</a>
          </li>
          <li>
            <a href="#">Contact</a>
          </li>
        </ul>
        <h3 class="text-muted">EventZou</h3>
      </div>
      <div class="jumbotron">
        <h1>Create It...They Will Join!!</h1>
        <span class="help-block pull-left">Choose a type below:</span>
        <select class="form-control" name="typeEvent">
          <option>Club</option>
          <option>Group</option>
        </select>
        <div class="form-group">
          <div class="controls">
            <input type="text" class="form-control input-sm" placeholder="Club/Group Name" name="groupName">
          </div>
        </div>
        <div class="form-group">
          <div class="controls">
            <span class="help-block pull-left">Leader / Coordinator Information</span><input type="text" class="form-control input-sm" placeholder="First Name" name="fname" maxlength="20">
          </div>
          <div class="form-group">
            <div class="controls"></div>
          </div>
          <input type="text" class="form-control input-sm" placeholder="Last Name" name="lname" maxlength="30">
        </div>
        <input type="text" class="form-control input-sm" placeholder="Position held" name="position">
        <div class="form-group">
          <div class="controls"></div>
        </div>
        <input type="email" class="form-control input-sm" placeholder="Email Address" name="email">
        <div class="form-group">
          <div class="controls"></div>
        </div>
        <textarea class="form-control" placeholder="Tell Us about your Club/Group, how does one participate or join, what does your do / represent, what are the advantages of being a member, are there dues associated" style="margin: 0px -3px 0px 0px; height: 247px; width: 584px;" name="description"></textarea>
        <p class="lead"></p>
        <div class="form-group">
          <div class="controls">
            <input type="url" class="form-control input-sm" placeholder="Club/Group Website" name="groupWebsite" maxlength="50">
          </div>
        </div>
        <div class="checkbox" name="authoritah">
          <label>
            <input type="checkbox" value="true">I have full rights and authority to register the above club/group and take responsibility for my actions when submitting this registration.</label>
        </div>
        <p><a class="btn btn-lg btn-success" href="#">Register</a></p>
      </div>
      <div class="row marketing"></div>
      <div class="footer">
        <p>&copy; EventZou 2013</p>
      </div>
    </div>
    <!-- /container -->
  </body>

</html>