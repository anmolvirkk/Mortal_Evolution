<html>

<head>
  <link rel="icon" href="favicon.svg" sizes="any" type="image/svg+xml">
  <meta name="viewport" content="width=device-width, user-scalable=no" />
  <meta charset="UTF-8">
  <meta name="google" content="notranslate">
  <meta http-equiv="Content-Language" content="en">
  <link rel="stylesheet" type="text/css" href="about.css">
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@100;300;400;700;900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@100;200;300;400;700&display=swap" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <meta name="google-signin-client_id" content="757381747155-f386c7deglc9pubvbftujagi88f1f2dk.apps.googleusercontent.com">
  <script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-36251023-1']);
    _gaq.push(['_setDomainName', 'jqueryscript.net']);
    _gaq.push(['_trackPageview']);

    (function() {
      var ga = document.createElement('script');
      ga.type = 'text/javascript';
      ga.async = true;
      ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
      var s = document.getElementsByTagName('script')[0];
      s.parentNode.insertBefore(ga, s);
    })();
  </script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.js"></script>
</head>

<body>

<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

  <div id="landscape">
    <lottie-player src="https://assets8.lottiefiles.com/packages/lf20_Yr5Ndi.json"  background="transparent"  speed="1"  style="width: 100px; height: 100px;"  loop  autoplay></lottie-player>
  </div>

  <div id = "mobileDevice">
  <h1>Please switch to a mobile device.</h1>
  <lottie-player src="https://assets8.lottiefiles.com/packages/lf20_eyiSYH.json"  background="transparent" mode="bounce" speed="1"  style="width: 300px; height: 300px;"  loop  autoplay></lottie-player>
  </div>

    <script>
         if ($(window).width() <= 930) {
           $('#mobileDevice').hide();
         }else{
            $('#mobileDevice').show();
         }

         $('#landscape').hide();
         $( window ).on( "orientationchange", function( event ) {
           if(event.target.screen.orientation.type != 'portrait-primary'){
           }else{
             location.reload();
           }
         });
    </script>

    <div id="g_id_onload"
     data-client_id="757381747155-f386c7deglc9pubvbftujagi88f1f2dk.apps.googleusercontent.com"
     data-skip_prompt_cookie="userEmail"
     data-cancel_on_tap_outside="false"
     data-callback="handleCredentialResponse">
</div>

<script>
var userEmail = '';

  function onSignIn(googleUser) {
    var profile = googleUser.getBasicProfile();
    userEmail = profile.getEmail();
    setCookie('userEmail', userEmail, 10950);
    setCookie('welcome', 'true', 10950);
    window.location.replace("index.php");
  }

  function handleCredentialResponse(response) {
    function parseJwt (token) {
    var base64Url = token.split('.')[1];
    var base64 = base64Url.replace(/-/g, '+').replace(/_/g, '/');
    var jsonPayload = decodeURIComponent(atob(base64).split('').map(function(c) {
        return '%' + ('00' + c.charCodeAt(0).toString(16)).slice(-2);
    }).join(''));

    return JSON.parse(jsonPayload);
  }
    userEmail = parseJwt(response.credential).email;
    setCookie('userEmail', userEmail, 10950);
    setCookie('welcome', 'true', 10950);
    window.location.replace("index.php");
  }

    function setCookie(key, value, expiry) {
        var expires = new Date();
        expires.setTime(expires.getTime() + (expiry * 24 * 60 * 60 * 1000));
        document.cookie = key + '=' + value + ';expires=' + expires.toUTCString();
    }

    function getCookie(key) {
        var keyValue = document.cookie.match('(^|;) ?' + key + '=([^;]*)(;|$)');
        return keyValue ? keyValue[2] : null;
    }

    function eraseCookie(key) {
        var keyValue = getCookie(key);
        setCookie(key, keyValue, '-1');
    }
</script>

<header>
<div id="mLogo">
  <h1>Mortal Evolution</h1>
  <h2>Push to your limit and then some</h1>
</div>

<div id="googleBtn" class="g-signin2" data-onsuccess="onSignIn"></div>
</header>

<section id='home'>
<div class = "main">
  <h1>Track your strength</h1>
  <p>
    Track your strength<br>
    Track your strength<br>
    Track your strength<br>
  </p>
  <h2><span>Mortal Evolution</span> helps you track your progress during weight training by keeping a tab on the weights, sets and reps you pump.</h2>
  <div class = 'buttons'>
  <div id="googleBtn" class="start g-signin2" data-onsuccess="onSignIn"></div>
  <button id='learnMore'>Learn More</button>
  </div>
</div>

<img src = 'https://images.unsplash.com/photo-1577221084712-45b0445d2b00?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=643&q=80' id='hero'>
<img src = 'https://i.pinimg.com/originals/8c/bf/a6/8cbfa69c66879e76f66376a863dcbac4.jpg' id='plastic'>
<img src = 'wrapper.png' id='wrapper'>
<div class = 'decor'>
  <h2>It's time for your <span>evolution</span></h2>
</div>

  <hr id='grunge'>
</section>

<aside id='ribbon'>
  <h1>// free to use // free to use // free to use // free to use // free to use // free to use // free to use</h1>
    <h1>// take your body to the next level // take your body to the next level // take your body to the next level //</h1>
      <hr id='grunge'>
</aside>

<section id='motive'>
  <hr id='grunge'>
  <img src = 'https://images.unsplash.com/photo-1580086319619-3ed498161c77?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80'>
  <h1>Helping You Stay Motivated</h1>
  <p>
    Helping You Stay Motivated<br>
    Helping You Stay Motivated<br>
    Helping You Stay Motivated<br>
      Helping You Stay Motivated<br>
      Helping You Stay Motivated<br>
      Helping You Stay Motivated<br>
        Helping You Stay Motivated<br>
  </p>
  <h2>Track how far you have come <br> <span>And how much further you can go</span></h2>
    <img src = 'https://unblast.com/wp-content/uploads/2020/06/Plastic-Wrap-Texture-Mockup-2.jpg' id='plastic2'>
  <img src = 'paper.png' id='paper'>
</section>

<section id='learn'>
  <hr id='grunge'>
<img src = 'paper.png' id='paper2'>
  <h1>How it works</h1>
</section>

<section id='works'>
  <h1>How it works</h1>
  <article>
    <h2><span>1.</span> First things first</h2>
    <ul>
      <li>When you first login to your account you are greeted with the home screen.</li>
        <li>You can select the muscle group on the left hand side menu (in this example we've choosen chest).</li>
    </ul>
  </article>
  <img src = 'demo/home.PNG' class = 'mock lMock'>
  <article>
    <h2><span>2.</span> Adding your first workout!</h2>
    <ul>
      <li>Click on the 'New Entry' button or the '+' icon next to the muscle group tab to open the workout menu.</li>
      <li>Enter in your sets, reps, and weights respectively (choose equal sets if all your sets have the same reps and weights and if not you can select unique sets).</li>
      <li>Click the 'Add' button to add your workout</li>
    </ul>
  </article>
  <img src = 'demo/exEntry.PNG' class = 'mock'>
  <img src = 'demo/newEntry.PNG' class = 'mock lMock'>
  <article>
    <h2><span>3.</span> Let's get tracking! </h2>
    <ul>
      <li>All your workouts will be saved for you</li>
      <li>The data will then be plotted on a graph which will show you your progress over time</li>
      <li>Compare yourself to nobody but the past version of you and push yourself a little further than you did yesterday! <br> Good luck!</li>
    </ul>
  </article>
  <img src = 'demo/graph.PNG' class = 'mock'>
  <img src = 'demo/log.PNG' class = 'mock lMock'>
    <hr id='grunge'>
</section>

<section id='final'>
  <hr id='grunge'>
  <img src = 'wrapper.png' id='wrapper'>
  <h1>What are you waiting for?</h1>
  <img src = 'https://images.unsplash.com/photo-1543975200-8e313fb04fc7?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=634&q=80' id='finalImg'>
    <img src = 'https://unblast.com/wp-content/uploads/2020/06/Plastic-Wrap-Texture-Mockup-2.jpg' id='plastic2'>
  <h2>Sign in to start your journey!</h2>
  <article>
    <p>Let's get pumping</p><br>
      <p>Let's get pumping</p><br>
        <p>Let's get pumping</p><br>
          <p>Let's get pumping</p><br>
            <p>Let's get pumping</p><br>
  </article>
  <div id="googleBtn" class="start2 g-signin2" data-onsuccess="onSignIn"></div>
  <img src = 'paper.png' id='paper3'>
</section>

</body>

<script src="https://apis.google.com/js/platform.js?onload=init" async defer></script>
<script src="https://accounts.google.com/gsi/client" async defer></script>

<script>
$("#learnMore").click(function() {
  var elmnt = document.getElementById("works");
elmnt.scrollIntoView();
});
</script>

</html>
