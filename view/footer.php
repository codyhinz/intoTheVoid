<?php if($page != "home") {
    echo "<style>
             .cookiespopup{
                 display: none;
             }
         </style>";
}
?>
<div class="container cookiespopup" id="cookies">
    <div class="row col-10">
        <p class="text-center">This website uses cookies to enhance your viewing and surfing experience. 
        This is your obligatory notice that we use cookies on this website.🍪</p>
    </div>
    <div class="col-1 float-right" id="xicon"><button class="btn btn-lg" onclick="closeCookies()">❌</button></div>
</div>
<footer>
    <div class="container text-center font-weight-light">&#169;IntotheVoid 2021</div>
</footer>
</body>
</html>