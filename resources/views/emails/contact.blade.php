<!DOCTYPE html>
<html lang="sv">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kontaktmail</title>
    <style>
        #from-field {
            font-family: 'roboto';
            margin: 0;
            padding: 0;
            font-size: 1.5rem;
            line-height: 10px;
            background-color: orange;
            padding: 2rem;
            color: whitesmoke;
        }

        #message-field {
            font-family: 'roboto';
        }

        #from-field span {
            font-weight: lighter;
        }
    </style>
</head>

<body>
    <div id="from-field">
        <p>Email: <span>{{$email}}</span></p>
        <p>Namn: <span>{{$name}}</span></p>
        <p>Ämne: <span>{{$subject}}</span></p>
    </div>

    <div id="message-field">
        <p>{{$bodyMessage}}</p>
    </div>

</body>

</html>