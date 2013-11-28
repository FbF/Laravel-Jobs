<html>
    <body>
        <p>Hello {{ Config::get('laravel-jobs::mail.to.name') }}</p>
        <p>We've received a new job application through the website, here are the details:</p>
        <p>Name:   {{ $name }}</p>
        <p>Email:  {{ $email }}</p>
        <p>Covering letter:</p>
        <p>{{ nl2br($letter) }}</p>
    </body>
</html>