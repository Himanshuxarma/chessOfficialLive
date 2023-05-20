<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
<h2>Hey {{ $user->full_name }}</h2> 

<br>

We received an email regarding a order, our staff will look into it and will get back to you soon.

Until then you can login with the detail already sent you and complete your profile.

Details we received from in the order are as follows : 

<strong>full_name: </strong>{{ $user->full_name }} <br>

<strong>Email: </strong>{{ $user->email }} <br>
<strong>paasdsd: </strong>{{ $user->uncreyptedPass }} <br>

Please do not share this password to anyone, You can login using this password and can change your password.
  
Thank you<br>
<a href="https://www.chessofficial.com/"><img class="img-fluid" src="https://www.chessofficial.com/assets/front/img/email_logo.png"></a    
</body>
</html>