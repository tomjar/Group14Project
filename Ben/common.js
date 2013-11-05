$(document).ready(function() {
//typical functions or events for every page



    $(".block-default").click(function(e) {
        //stops page refresh for elements that have this class
        return false;
    });
    var b = true;
    $(".toggle-edit").click(function(e) {
        b = !b;
        //trigger editability of fields on page
        //note that this means that when the server recieves a request
        //the validity of the session MUST be checked
        if (!b) {
            $(".toggle-edit").text("save");
            $(".editable").attr("contenteditable", "true");
        } else {
            $(".toggle-edit").text("edit");
            //scrape data and ajax it off
            $(".editable").attr("contenteditable", "false");
        }
        return false;
    });
    $(".login").click(function(e) {
        //trigger login modal
        $("#login").modal('toggle');
    });
    $(".submit-login").click(function(e) {
        //check if valid inputs (later)
        console.log("login submit")
        //send object of login data via ajax
        //to window.location.origin.replace("http","https").replace("httpss","https")+"/login.php"
        jQuery.ajax(
                {type: "POST",
                    contentType: "application/json",
                    url: "login.php",
                    data: JSON.stringify({value: "hello there"}),
                    success: function(data) {
                        console.log(data);
                    },
                    failure: function() {
                        console.log("something went wrong");
                    }
                });
        //if success dismiss modal, and redirect
        $("#login").modal('toggle');
    });

    $(".register").click(function(e) {
        //trigger register modal
        $("#register").modal('toggle');
    });
    $(".submit-register").click(function(e) {
        //check if valid inputs (later)

        //send object of register data via ajax
        //to /register.php

        //if success dismiss modal, and redirect
        $("#register").modal('toggle');
    });
    $(".search").keypress(function(event) {
        //should be used to capture enter key for searchbars
        if (event.which == "13") {
            window.location.href = window.location.origin + "/listing.html?search=" + $(this).val();
        }
        console.log(event.which);
    });

});