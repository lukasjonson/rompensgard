<!DOCTYPE html>
<html lang="sv">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kontaktmail</title>
</head>

<body>
        <div style="font-family: 'Kosugi Maru', sans-serif;text-align: center;width: 100%;" class="acceptance_mail_container">
                <h3 style="padding-bottom: 5px;" id="mail_heading" style="color:blue">Tack, <?= $name ?>!</h3>
                <div id="mail_information">
                    <p>Vi återkommer så snart vi kan.</p>
                    <p><em>Med vänliga hälsningar,</em></p>
                    <p><em>Rompens Gård</em></p>
                </div>
                <div>
                    <img style="width:220px;height: 220px;" id="mail_logo" src="http://rompensgard.se/logo.png" alt="">
                </div>
            </div>
</body>

</html>