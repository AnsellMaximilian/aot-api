<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Attack on Titan API</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Nova+Square&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/7b34ca6c35.js" crossorigin="anonymous"></script>
        
        <link rel="icon" href="/images/sc-logo.png">

        <link rel="stylesheet" href="/css/app.css">
    </head>
    <body class="antialiased">
        <div class="container">
            <div class="hero">
                <div class="hero__image">
                    <img src="/images/sc-logo.png" alt="Survey Corps Logo" />
                </div>
                <h1>Attack on Titan API</h1>
                <p>This website hosts an Attack on Titan API that you can use by hitting the current URL prepended with <code>/api</code>.</p>
            </div>
            <div class="links-container">
                <p>Made by <a href="https://ansellmaximilian.github.io">Ansell Maximilian</a></p>
                <div class="link-list">
                    <a class="link-item" href="https://github.com/AnsellMaximilian/aot-client">
                        <div class="link-item__icon"><i class="fab fa-github"></i></div>
                        <div class="link-item__label"><span>Check the Repo</span></div>
                    </a>
                    <a class="link-item link-item--blue" href="https://attackontitanclient.netlify.app/">
                        <div class="link-item__icon"><i class="fas fa-book"></i></div>
                        <div class="link-item__label"><span>Visit the Docs</span></div>
                    </a>
                </div>
            </div>
        </div>
    </body>
</html>
