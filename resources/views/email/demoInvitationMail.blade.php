<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo Invitation</title>
</head>
<body>
<h2>Hey {{ !empty($user->full_name) ? $user->full_name : '' }}</h2> 

<br>

We received an email regarding a demo booking.

Details we received from in the demo booking are as follows : 
<br><br>
<strong>Demo Date: </strong>{{ $demo->date_of_demo }} <br>
<br>
<strong>Demo Time: </strong>{{ $demo->date_of_time }} <br>
<br>
<strong>Course: </strong>{{ $demo->course->title }} <br><br>

Please <a href="{{$demo->invitation_link}}" target="_blank"><strong>click here</strong></a> to join the demo on the above given date and time.
  
Thank you<br>
<a href="https://www.chessofficial.com/"><img class="img-fluid" src="https://www.chessofficial.com/assets/front/img/email_logo.png"></a    
</body>
</html>