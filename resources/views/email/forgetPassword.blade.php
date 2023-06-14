<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
</head>
<body>
<h2>Hey {{ $user->full_name }}</h2> <br><br>

<p>We got a reset password request from you</p>

<p> To reset your password please <a href="{{url($user->resetLink)}}"><strong> click here </strong></a></p>

<br><br>  

Thank you <br>
<a href="https://www.chessofficial.com/"><img class="img-fluid" src="https://www.chessofficial.com/assets/front/img/email_logo.png"></a> 
</body>
</html>