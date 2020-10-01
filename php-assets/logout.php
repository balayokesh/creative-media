<?php 
    session_start();
    session_unset();
    session_destroy();
    header("location: ../index.php")
?>
<html>
    <head>
        <meta name="google-signin-client_id" content="732279262537-gnfe3jf4ba77unsbpupsp893v425m2rk.apps.googleusercontent.com">
    </head>
    <body>
        <script src="https://apis.google.com/js/platform.js?onload=onLoadCallback" async defer></script>
        <script>
            window.onLoadCallback = function(){
                gapi.load('auth2', function() {
                    gapi.auth2.init().then(function(){
                        var auth2 = gapi.auth2.getAuthInstance();
                        auth2.signOut().then(function () {
                            document.location.href = '../index.php';
                        });
                    });
                });
            };
        </script>
    </body>
</html>