$(document).ready(function () { 
    $("#UserSearch").submit(function (event) {
        event.preventDefault();

        var movie_title = $("#movie_title").val();
        SearchUsers(movie_title);
        var resultSearch = "";
    });

    $("#movieminiSearch").submit(function (event) {
        event.preventDefault();

        var movie_title = $("#movie_minititle").val();

        getFavMovie(movie_title);
        var resultSearch = "";
    });
});

function getAllUser() {
    axios.get("../php/getrecords.php").then((data) => {
        var movies = data.data;
        let result = "";

        if (movies == 0) {
            result = `<h1 style="text-align:center;margin-left: 25%;margin-top: 5%; " >No User Yet , 
                    <a style="color:#2b8440;" href="index.php" >Take Me Home</a></h1>
            `;
            $("#footer").css("display", "none");
        } else {
            $("#home").html(movies);
            console.log(movies);
        }
    });
}
function getAllStatus() {
    axios.get("../php/getrecord.php").then((data) => {
        var movies = data.data;
        let result = "";

        if (movies == 0) {
            result = `<h1 style="text-align:center;margin-left: 25%;margin-top: 5%; " >No User Yet , 
                    <a style="color:#2b8440;" href="index.php" >Take Me Home</a></h1>
            `;
            $("#footer").css("display", "none");
        } else {
            $("#home").html(movies).css("color", "white");
        }
    });
}
function addUsers() {
    axios.get("../php/registration.php").then((data) => {
        var movies = data.data;
        let result = "";

        if (movies == 0) {
            result = `<h1 style="text-align:center;margin-left: 25%;margin-top: 5%; " >No User Yet , 
                    <a style="color:#2b8440;" href="index.php" >Take Me Home</a></h1>
            `;
            $("#footer").css("display", "none");
        } else {
            $("#home").html(movies);
        }
    });
}

function SearchUsers(movie_title) {
    $.ajax({
        method: "post",
        url: "../php/searchUser.php",
        data: {
            movie_title: movie_title,
        },
    }).done(function (data) {
        var result = JSON.parse(data);
        var movies = result;

        let resultSearch = "";

        if (movies.length == 0) {
            resultSearch = `<h2 class="text-align:center" style="color:white;">No such user in database ,<h2> `;

            $("#recordSearch")
                .html(resultSearch)
                .css("display", "block-inline");
        }
        $("#searchResult").css("display", "block");

        $("#recordSearch").html(movies).css("display", "flex");
        console.log(movies);
    });
}

function setFavMovie(movie_title, movie_image, movie_id) {
    var movie_id = $("#movie_id").val();
    var movie_title = $("#movie_title").val();
    var movie_image = $("#movie_image").val();

    $.ajax({
        method: "post",
        url: "saverecords.php",
        data: {
            movie_title: movie_title,
            movie_image: movie_image,
            movie_id: movie_id,
        },
    }).done(function (data) {
        var result = data;
        var str = "";

        if (result == 1) {
            str = "<h4 class='col-md-4'  >Added to Fav Movie.</h4>";
            $("#saveusers").hide(function () {
                $("#deleteFav").css("display", "block");
            });
        } else if (result == 2) {
            str =
                "<h4 class='col-md-4' >User data could not be saved. Please try again</h4>";
        } else if (result == 3) {
            str = "<h4 class='col-md-4' >Movie already Exist</h4>";
            $("#saveusers").hide(function () {
                $("#deleteFav").css("display", "block");
                $("#removefav").replaceAll("#savefav").css("display", "block");
            });
        } else if (result == 5) {
            str =
                "<h4 class='col-md-4' >You Need To Login First.<br><h1><a href='login.php'>Log In Here</a></h1></h4>";
        } else {
            str = "<h4 > error</h4>";
            console.log(str);
        }
        $("#message").html(str);
    });
}

function deleteFavMovie(movie_id) {
    $.ajax({
        method: "post",
        url: "deleterecord.php",
        data: {
            movie_id: movie_id,
        },
        success: function (data) {},
    }).done(function (data) {
        let result = data;
        var str = "";
        if (result == 1) {
            $("#deleteFav").hide(function () {
                $("#saveusers").css("display", "block");
            });

            str = "Movie Deleted successfully.";
        } else if (result == 2) {
            str = "Movie Doesn't Exist";
        } else if (result == 3) {
            str = "Movie Deleted could not be Deleted. Please try again";
        }
        $("#message").html(str).hide(3000);
    });
}

function AddNewUser(){
    
    var firstname = $("#firstname").val();
    var middlename = $("#middlename").val();
    var lastname = $("#lastname").val();
    var username = $("#username").val();
    var password = $("#password").val();
    var woreda = $("#woreda").val();


    $.ajax({
        method: "post",
        url: "saverecords.php",
        data: {
            firstname = firstname ,
            middlename = middlename ,
            lastname = lastname ,
            username = username ,
            password = password ,
            woreda = woreda  
        },
    }).done(function (data) {
        var result = data;
        var str = "";

        if (result == 1) {
            str = "<h4 class='col-md-4'  >Added to Database</h4>"; 
        } else if (result == 2) {
            str = "<h4 class='col-md-4' >User data could not be saved. Please try again</h4>";
        } else if (result == 3) {
            str = "<h4 class='col-md-4' >User already Exist</h4>"; 
        } else if (result == 5) {
            str = "<h4 class='col-md-4' >You Need To Login First.<br><h1><a href='login.php'>Log In Here</a></h1></h4>";
        } else {
            str = "<h4 > error</h4>";
            console.log(str);
        }
        $("#message").html(str);
    });
}

function registration(){
    
    var firstname = $("#firstname").val();
    var middlename = $("#middlename").val();
    var lastname = $("#lastname").val();
    var username = $("#username").val();
    var password = $("#password").val();
    var woreda = $("#woreda").val();


    $.ajax({
        method: "post",
        url: "registration.php",
        data: {
            firstname = firstname ,
            middlename = middlename ,
            lastname = lastname ,
            username = username ,
            password = password ,
            woreda = woreda  
        },
    }).done(function (data) {
        var result = data;
        var str = "";

        if (result == 1) {
            str = "<h4 class='col-md-4'  >Added to Database</h4>"; 
        } else if (result == 2) {
            str = "<h4 class='col-md-4' >User data could not be saved. Please try again</h4>";
        } else if (result == 3) {
            str = "<h4 class='col-md-4' >User Name already Exist</h4>"; 
        } else if (result == 5) {
            str = "<h4 class='col-md-4' >You Need To Login First.<br><h1><a href='login.php'>Log In Here</a></h1></h4>";
        } else {
            str = "<h4 > error</h4>";
            console.log(str);
        }
        $("#message").html(str);
    });
}
