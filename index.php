<html>
<head>
    <link rel="icon" href="https://discordapp.com/assets/07dca80a102d4149e9736d4b162cff6f.ico" />
    <title>Discord Account Generator</title>

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script>
        var processResponse = function (response) {
            var xmlHttp = new XMLHttpRequest();
            xmlHttp.open( "GET", "api.php?token=" + response, true );
            xmlHttp.send( null );
            grecaptcha.reset();
        }
    </script>
        
        <style>
        body{
            background-color: #2f3542;
        }
    </style>
</head>
<body>
<div id="top"></div>
<div class="g-recaptcha" data-sitekey="your_site_key" data-callback="processResponse" data-theme="dark"></div>
</div>
      <!-- credits -->
<footer
<p class="footer__text">
© 2020 | <a href="https://github.com/LeoGHz" target="_blank">LeoGHz</a>
</a>
</p>
</div>
</footer>
 </body>
</html>