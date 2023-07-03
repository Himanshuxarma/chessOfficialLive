<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>W3esolutions</title>
</head>
<body>
<h2>Hey, It's me {{ $contacts->full_name }}</h2> 

<br>

    

<strong>User Emails: </strong><br>

<strong>full_name: </strong>{{ $contacts->full_name }} <br>

<strong>Email: </strong>{{ $contacts->email }} <br>

<strong>Phone: </strong>{{ $contacts->phone }} <br>

<strong>Subject: </strong>{{ $contacts->subject }} <br>

<strong>Message: </strong>{{ $contacts->message }} <br><br>

  

Thank you</br></br></br>
<a href="https://www.chessofficial.com/"><img class="img-fluid" src="https://www.chessofficial.com/assets/front/images/logo.png"></a>
</body>
</html>