<?php
    session_start();
    session_destroy();
    //header("location:../../WEB/index.html");
    echo '
    <script>
    alert("Sesión finalizada");
    window.location="../../WEB/index.html"
    </script>'
?>