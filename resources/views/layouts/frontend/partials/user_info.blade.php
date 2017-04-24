<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title>Login PHP</title>
    <link rel="stylesheet" href="style.css" />
    <link href='http://fonts.googleapis.com/css?family=Oleo+Script' rel='stylesheet' type='text/css'>
    <style>
        body{
    background-image:url(bg.png);
    font-family: 'Oleo Script', cursive;
}

.lg-container{
    width:275px;
    margin:100px auto;
    padding:20px 40px;
    border:1px solid #f4f4f4;
    background:rgba(255,255,255,.5);
    -webkit-border-radius:10px;
    -moz-border-radius:10px;
    border-radius:10px;
    
    -webkit-box-shadow: 0 0 2px #aaa;
    -moz-box-shadow: 0 0 2px #aaa;
    box-shadow: 0 0 2px #aaa;
}
.lg-container h1{
    font-size:40px;
    text-align:center;
}
#lg-form > div {
    margin:10px 5px;
    padding:5px 0;
}
#lg-form label{
    display: none;
    font-size: 20px;
    line-height: 25px;
}
#lg-form input[type="text"],
#lg-form input[type="password"]{
    border:1px solid rgba(51,51,51,.5);
    -webkit-border-radius:10px;
    -moz-border-radius:10px;
    border-radius:10px;
    padding: 5px;
    font-size: 16px;
    line-height: 20px;
    width: 100%;
    font-family: 'Oleo Script', cursive;
    text-align:center;
}
#lg-form input[class="forms"]{
    border:1px solid rgba(51,51,51,.5);
    -webkit-border-radius:10px;
    -moz-border-radius:10px;
    border-radius:10px;
    padding: 5px;
    font-size: 16px;
    line-height: 20px;
    width: 100%;
    font-family: 'Oleo Script', cursive;
    text-align:center;
}
#lg-form div:nth-child(3) {
    text-align:center;
}
#lg-form button{
    font-family: 'Oleo Script', cursive;
    font-size: 18px;
    border:1px solid #000;
    padding:5px 10px;
    border:1px solid rgba(51,51,51,.5);
    -webkit-border-radius:10px;
    -moz-border-radius:10px;
    border-radius:10px;
    
    -webkit-box-shadow: 2px 1px 1px #aaa;
    -moz-box-shadow: 2px 1px 1px #aaa;
    box-shadow: 2px 1px 1px #aaa;
    cursor:pointer;
}
#lg-form button:active{
    -webkit-box-shadow: 0px 0px 1px #aaa;
    -moz-box-shadow: 0px 0px 1px #aaa;
    box-shadow: 0px 0px 1px #aaa;
}
#lg-form button:hover{
    background:#f4f4f4;
}
#message{width:100%;text-align:center}
.success {
    color: green;
}
.error {
    color: red;
}
    </style>
    <script type="text/javascript" src="jquery-1.7.min.js"></script>
    <script type="text/javascript">

    $(document).ready(function(){
        $("#login").click(function(){
            
            var action = $("#lg-form").attr('action');
            var form_data = {
                username: $("#username").val(),
                password: $("#password").val(),
                is_ajax: 1
            };
            
            $.ajax({
                type: "POST",
                url: action,
                data: form_data,
                success: function(response)
                {
                    if(response == "success")
                        $("#lg-form").slideUp('slow', function(){
                            $("#message").html('<p class="success">You have logged in successfully!</p><p>Redirecting....</p>');
                        });
                    else
                        $("#message").html('<p class="error">ERROR: Invalid username and/or password.</p>');
                }   
            });
            return false;
        });
    });
    </script>
</head>
<body>
    <div class="lg-container">
        <h1>Account info</h1>
        <form action="waka-login.php" id="lg-form" name="lg-form" method="post">
            
            <div>
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" placeholder="username" value="{{$user->username}}" />
            </div>
            
            <div>
                <label for="email">Email:</label>
                <input class="forms" type="email" name="email" id="email" placeholder="email" readonly value="{{$user->email}}" />
            </div>
            <div>
                <label for="newpassword">Password:</label>
                <input class="forms" type="newpassword" name="newpassword" id="newpassword" placeholder="new password" disabled />
            </div>
            <div>
                <label for="confpassword">Confirm Password :</label>
                <input class="forms" type="confpassword" name="confpassword" id="confpassword" placeholder="confirm password" disabled />
            </div>
            
            <div>               
                <button type="submit" id="login">Update</button>
            </div>
            
        </form>
        <div id="message"></div>
    </div>
    <script>
        $(document).ready(function(){
          $("#changePassword").change(function(){
             if($(this).is(":checked"))
             {
                $(".password").rmoveAtrr('disabled');
             }
          });
        });
    </script>
</body>
</html>