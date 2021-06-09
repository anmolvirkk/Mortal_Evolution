<html>

<head>
  <link rel="icon" href="favicon.svg" sizes="any" type="image/svg+xml">
  <!-- <meta name="viewport" content="width=device-width, user-scalable=no" /> -->
  <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1, maximum-scale=1">
  <meta charset="UTF-8">
  <meta name="google" content="notranslate">
  <meta http-equiv="Content-Language" content="en">
  <link rel="stylesheet" type="text/css" href="main.css">
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
  <script src = 'jquery.knob.js'></script>
  <script src = 'excanvas.js'></script>
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css">
  <script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
  <script src="alloy_finger.js"></script>
  <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
</head>

<body>
<div id="landscape">
  <lottie-player src="https://assets8.lottiefiles.com/packages/lf20_Yr5Ndi.json"  background="transparent"  speed="1"  style="width: 100px; height: 100px;"  loop  autoplay></lottie-player>
</div>

<div id = "mobileDevice">
<h1>Please switch to a mobile device.</h1>
<lottie-player src="https://assets8.lottiefiles.com/packages/lf20_eyiSYH.json"  background="transparent" mode="bounce" speed="1"  style="width: 300px; height: 300px;"  loop  autoplay></lottie-player>
</div>

<div id="loading">
  <img src = 'favicon.svg'>
  <lottie-player src="https://assets7.lottiefiles.com/packages/lf20_HYwuZB.json"  background="transparent"  speed="1"  style="width: 200px; height: 200px;"  loop  autoplay></lottie-player>
</div>

  <div class = "signInScreen">
    <img src = "http://pngimg.com/uploads/muscle/muscle_PNG50.png">
    <h1>Be <span>stronger</span> than your excuses
    <div id="googleBtn" class="g-signin2" data-onsuccess="onSignIn"></div></h1>
    <h2>sign in to continue</h2>
  </div>

  <header class="mainTitle">
    <a href="index.php" id="mLogo">
      <h1>Mortal Evolution</h1>
      <h2>Push to your limit and then some</h1>
    </a>
    <div id="googleBtn" class="g-signin2" data-onsuccess="onSignIn"></div>

    <div id="helpBtn">
      <img src = "https://www.flaticon.com/svg/static/icons/svg/1828/1828940.svg">
      <h4 id="msg">Message sent successfully!</h4>
      <section class="helpMenu">
        <ul id="helpOptions">
          <li data-helpType='Enter your general query here' data-typeActive='true'>General help</li>
          <li data-helpType='What kind of bug did you come across?' data-typeActive='false'>Report a bug</li>
          <li data-helpType='What is your amazing suggestion?' data-typeActive='false'>Got a suggestion?</li>
        </ul>
        <form id="helpForm">
        <textarea placeholder="Enter your general query here"></textarea>
        <button type = "submit">Submit</button>
        </form>
      </section>
    </div>

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
    if(getCookie('userEmail') == null || getCookie('userEmail')!=userEmail){
      setCookie('userEmail', userEmail, 10950);
      setExercises('chest');
      $('.signInScreen').removeClass('signInOn');
      if(mobile){
        $('#sideBar').removeClass('sideOpen');
          $('#menuToggle').removeClass('change');
      }
    }
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
    if(getCookie('userEmail') == null || getCookie('userEmail')!=userEmail){
    setCookie('userEmail', userEmail, 10950);
    setExercises('chest');
    $('.signInScreen').removeClass('signInOn');
    if(mobile){
      $('#sideBar').removeClass('sideOpen');
        $('#menuToggle').removeClass('change');
    }
    }
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
  </header>

  <div class = 'blank'></div>
  <div class="main">

    <section class="msclSwiper" id='swiperToOpen'>
      <!-- Additional required wrapper -->
      <section class="swiper-wrapper">
          <!-- Slides -->
          <section class="swiper-slide">
            <img src="https://img.icons8.com/ios-filled/50/000000/chest.png" />
            <h3>Chest</h3>
          </section>
          <section class="swiper-slide">
            <img src="https://img.icons8.com/ios-filled/50/000000/back-muscles.png" />
            <h3>Back</h3>
          </section>
          <section class="swiper-slide">
            <img src="https://img.icons8.com/ios-filled/50/000000/shoulders.png" />
            <h3>Shoulders</h3>
          </section>
          <section class="swiper-slide">
            <img src="https://img.icons8.com/ios-filled/50/000000/biceps.png" />
            <h3>Biceps</h3>
          </section>
          <section class="swiper-slide">
            <img src="https://img.icons8.com/ios-filled/50/000000/triceps.png" />
            <h3>Triceps</h3>
          </section>
          <section class="swiper-slide">
            <img src="https://img.icons8.com/ios-filled/50/000000/hamstrings.png" />
            <h3>Legs</h3>
          </section>

      </section>

    </section>

    <div class="newEntry">

      <div class="exName">
        <h1>Bench Press</h1>
        <div id='closeEntry'>X</div>
      </div>


          <form class = "exForm">
            <div class = 'exLabels'>
                <h1>Weight</h1>
                <h1>Reps</h1>
            </div>
            <aside class='dataDials'>
              <div class = 'swiper-wrapper'>
                <div class = 'swiper-slide'>
                  <input type="text" value="0" class="dial weight">
                </div>
                  <div class = 'swiper-slide'>
                    <input type="text" value="0" class="dial2 reps">
                  </div>
              </div>
            </aside>
              <div class="diff">
                <h2>Difficulty :</h2>
                <div id="diffRange">
                  <p id="easy">Easy</p>
                  <p id="hard">Challenging</p>
                  <input type="range" min="1" max="100" value="0" id="exRange" class="range blue">
                </div>
              </div>
          </form>
      <button id="addHistory">Add</button>
    </div>

    <script>

    $(`.exForm .exLabels h1`).removeClass('exLabelOn');
    $(`.exForm .exLabels`).find(">:first-child").addClass('exLabelOn');

    $(document).on('click', '.exForm .exLabels h1', function(){
          $(`.exForm .exLabels h1`).removeClass('exLabelOn');
          $(this).addClass('exLabelOn');
          if($(this).index() == 0){
            dialSwiper.slidePrev();
          }else if($(this).index() == 1){
            dialSwiper.slideNext();
          }
    });

    var setDialSwipe = setInterval(function(){
      if(!$('.dataDials .swiper-slide canvas').hasClass('swiper-no-swiping')){
                $('.dataDials .swiper-slide canvas').addClass('swiper-no-swiping');
                clearInterval(setDialSwipe);
      }
    }, 100);

    var dialSwiper = new Swiper('.dataDials', {
    on: {
      init: function () {
              $(".dial").knob({
              'min':0,
              'max':600,
              'fgColor': '#B8F808',
              'bgColor': '#151515',
              'fontWeight': '100',
              'inputColor': '#dcdcdc',
              'width': '270',
              'height': '270'
          });
          $(".dial2").knob({
          'min':0,
          'max':100,
          'fgColor': '#07f911',
          'bgColor': '#151515',
          'fontWeight': '100',
          'inputColor': '#dcdcdc',
          'width': '270',
          'height': '270'
      });

    }, slideNextTransitionStart: function(){
          $(`.exForm .exLabels h1`).removeClass('exLabelOn');
          $(`.exForm .exLabels`).find(">:last-child").addClass('exLabelOn');
    }, slidePrevTransitionStart: function(){
          $(`.exForm .exLabels h1`).removeClass('exLabelOn');
          $(`.exForm .exLabels`).find(">:first-child").addClass('exLabelOn');
    }
    }
  });
    $('.dial').on('input', function() {
  $(this)
      .val($(this).val())
      .trigger('change');
    });
    </script>

      <section class="exSwiper">
          <!-- Additional required wrapper -->
          <section class="swiper-wrapper">
              <!-- Slides -->
              <section class="swiper-slide">
                  Bench Press
              </section>

          </section>

      </section>

        <button id="addNew">+</button>

        <section class="infoSwiper" id='infoSlider'>
              <section class="info">
                <img src = 'exImgs/benchpress.jpeg' id='exImg'>
                <div class="exProgress">
                  <div class="placeholderProgress exPlaceholder">
                    <h1>Let's pump some iron</h1>
                    <h2>The data you track will be visually representation here</h2>
                  </div>
                    <div class="exChart">
                      <canvas id="exChart"></canvas>
                    </div>
                  <div class="exLegend">
                    <ul>
                      <li>
                        <hr>
                        <h2>Weight</h2>
                      </li>
                      <li>
                        <hr>
                        <h2>Reps</h2>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="exHistory"></div>
              </section>
        </section>

        <section id='editWindow'>
          <form>
            <button id='removeButton'>Remove</button>
            <div class = 'setEdit'>
              <h2>Set 3</h2>
            </div>
            <h1>Weight:</h1>
            <div class = 'weightEditSelect'>
              <div class = 'swiper-wrapper'>
              </div>
            </div>

              <h1>Reps:</h1>
              <div class = 'repEditSelect'>
                <div class = 'swiper-wrapper'>
                </div>
              </div>

              <button id='editButton'>Edit</button>
          </form>
        </section>
        <script>

        $('#editWindow').addClass('invisible');
        var editId;

        $(document).on('click', '.timeLog', function(){
          $('#editWindow').removeClass('invisible');
          setTimeout(function(){
            $('#editWindow form').addClass('editFormOn');
          }, 200);
            $('#editWindow .setEdit h2').html($(this).children()[1].innerText);
            weightEditSelect.slideTo(parseInt($(this).children()[2].innerText) - 1);
            repEditSelect.slideTo(parseInt($(this).children()[3].innerText) - 1);
            editId = this.id;
        });

        $(document).on('click', '#editWindow', function(e){
          if(e.target.id == 'editWindow' && !weightEditSelect.animating && !repEditSelect.animating){
            $('#editWindow form').removeClass('editFormOn');
              setTimeout(function(){
                    $('#editWindow').addClass('invisible');
              }, 300);
          }
        });

        $(document).on('click', '#editButton', function(e){
          e.preventDefault();
                  $(".blank").load("updateData.php", {
                  table: userEmail.split('@')[0] + $(`.exName h1`).text().split(" ").join(""), id: editId, weight: weightEditSelect.activeIndex+1, reps: repEditSelect.activeIndex+1
                  });

                    $('#editWindow form').removeClass('editFormOn');
                      setTimeout(function(){
                            $('#editWindow').addClass('invisible');
                      }, 300);
        });

                $(document).on('click', '#removeButton', function(e){
                  e.preventDefault();
                          $(".blank").load("removeData.php", {
                          table: userEmail.split('@')[0] + $(`.exName h1`).text().split(" ").join(""), id: editId
                          });

                            $('#editWindow form').removeClass('editFormOn');
                              setTimeout(function(){
                                    $('#editWindow').addClass('invisible');
                              }, 300);
                });

        var weightEditSelect = new Swiper('.weightEditSelect', {
          direction: 'vertical',
          freeMode: true,
          freeModeSticky: true
        });
                for(var s = 1; s<=600; s++){
                  $('#editWindow .weightEditSelect .swiper-wrapper').append(`<div class = 'swiper-slide'>${s}</div>`);
                }
                weightEditSelect.update();

                var repEditSelect = new Swiper('.repEditSelect', {
                  direction: 'vertical',
                  freeMode: true,
                  freeModeSticky: true
                });

                        for(var k = 1; k<=100; k++){
                          $('#editWindow .repEditSelect .swiper-wrapper').append(`<div class = 'swiper-slide'>${k}</div>`);
                        }
                        repEditSelect.update();


        </script>

    <section class="humanBody">
      <div class="human-body">
        <svg data-position="head" class="head" xmlns="http://www.w3.org/2000/svg" width="56.594" height="95.031" viewBox="0 0 56.594 95.031">
          <path
            d="M15.92 68.5l8.8 12.546 3.97 13.984-9.254-7.38-4.622-15.848zm27.1 0l-8.8 12.546-3.976 13.988 9.254-7.38 4.622-15.848zm6.11-27.775l.108-11.775-21.16-14.742L8.123 26.133 8.09 40.19l-3.24.215 1.462 9.732 5.208 1.81 2.36 11.63 9.72 11.018 10.856-.324 9.56-10.37 1.918-11.952 5.207-1.81 1.342-9.517zm-43.085-1.84l-.257-13.82L28.226 11.9l23.618 15.755-.216 10.37 4.976-17.085L42.556 2.376 25.49 0 10.803 3.673.002 24.415z" />
        </svg>
        <svg data-position="shoulder" class="shoulder" xmlns="http://www.w3.org/2000/svg" width="109.532" height="46.594" viewBox="0 0 109.532 46.594">
          <path
            d="M38.244-.004l1.98 9.232-11.653 2.857-7.474-2.637zm33.032 0l-1.98 9.232 11.653 2.857 7.474-2.637zm21.238 10.54l4.044-2.187 12.656 14 .07 5.33S92.76 10.66 92.515 10.535zm-1.285.58c-.008.28 17.762 18.922 17.762 18.922l.537 16.557-6.157-10.55L91.5 30.988 83.148 15.6zm-74.224-.58L12.962 8.35l-12.656 14-.062 5.325s16.52-17.015 16.764-17.14zm1.285.58C18.3 11.396.528 30.038.528 30.038L-.01 46.595l6.157-10.55 11.87-5.056L26.374 15.6z" />
        </svg>
        <svg data-position="arm" class="arm" xmlns="http://www.w3.org/2000/svg" width="156.344" height="119.25" viewBox="0 0 156.344 119.25">
          <path
            d="M21.12 56.5a1.678 1.678 0 0 1-.427.33l.935 8.224 12.977-13.89 1.2-8.958A168.2 168.2 0 0 0 21.12 56.5zm1.387 12.522l-18.07 48.91 5.757 1.333 19.125-39.44 3.518-22.047zm-5.278-18.96l2.638 18.74-17.2 46.023L.01 113.05l6.644-35.518zm118.015 6.44a1.678 1.678 0 0 0 .426.33l-.934 8.222-12.977-13.89-1.2-8.958A168.2 168.2 0 0 1 135.24 56.5zm-1.39 12.52l18.073 48.91-5.758 1.333-19.132-39.44-3.52-22.05zm5.28-18.96l-2.64 18.74 17.2 46.023 2.658-1.775-6.643-35.518zm-103.1-12.323a1.78 1.78 0 0 1 .407-.24l3.666-27.345L33.07.015l-7.258 10.58-6.16 37.04.566 4.973a151.447 151.447 0 0 1 15.808-14.87zm84.3 0a1.824 1.824 0 0 0-.407-.24l-3.666-27.345L123.3.015l7.258 10.58 6.16 37.04-.566 4.973a151.447 151.447 0 0 0-15.822-14.87zM22.288 8.832l-3.3 35.276-2.2-26.238zm111.79 0l3.3 35.276 2.2-26.238z" />
        </svg>
        <svg data-position="cheast" class="cheast" xmlns="http://www.w3.org/2000/svg" width="86.594" height="45.063" viewBox="0 0 86.594 45.063">
          <path d="M19.32 0l-9.225 16.488-10.1 5.056 6.15 4.836 4.832 14.07 11.2 4.616 17.85-8.828-4.452-34.7zm47.934 0l9.225 16.488 10.1 5.056-6.15 4.836-4.833 14.07-11.2 4.616-17.844-8.828 4.45-34.7z" /></svg>
        <svg data-position="stomach" class="stomach" xmlns="http://www.w3.org/2000/svg" width="75.25" height="107.594" viewBox="0 0 75.25 107.594">
          <path
            d="M19.25 7.49l16.6-7.5-.5 12.16-14.943 7.662zm-10.322 8.9l6.9 3.848-.8-9.116zm5.617-8.732L1.32 2.15 6.3 15.6zm-8.17 9.267l9.015 5.514 1.54 11.028-8.795-5.735zm15.53 5.89l.332 8.662 12.286-2.665.664-11.826zm14.61 84.783L33.28 76.062l-.08-20.53-11.654-5.736-1.32 37.5zM22.735 35.64L22.57 46.3l11.787 3.166.166-16.657zm-14.16-5.255L16.49 35.9l1.1 11.25-8.8-7.06zm8.79 22.74l-9.673-7.28-.84 9.78L-.006 68.29l10.564 14.594 5.5.883 1.98-20.735zM56 7.488l-16.6-7.5.5 12.16 14.942 7.66zm10.32 8.9l-6.9 3.847.8-9.116zm-5.617-8.733L73.93 2.148l-4.98 13.447zm8.17 9.267l-9.015 5.514-1.54 11.03 8.8-5.736zm-15.53 5.89l-.332 8.662-12.285-2.665-.664-11.827zm-14.61 84.783l3.234-31.536.082-20.532 11.65-5.735 1.32 37.5zm13.78-71.957l.166 10.66-11.786 3.168-.166-16.657zm14.16-5.256l-7.915 5.514-1.1 11.25 8.794-7.06zm-8.79 22.743l9.673-7.28.84 9.78 6.862 12.66-10.564 14.597-5.5.883-1.975-20.74z" />
        </svg>
        <svg data-position="legs" class="legs" xmlns="http://www.w3.org/2000/svg" width="93.626" height="286.625" viewBox="0 0 93.626 286.625">
          <path
            d="M17.143 138.643l-.664 5.99 4.647 5.77 1.55 9.1 3.1 1.33 2.655-13.755 1.77-4.88-1.55-3.107zm20.582.444l-3.32 9.318-7.082 13.755 1.77 12.647 5.09-14.2 4.205-7.982zm-26.557-12.645l5.09 27.29-3.32-1.777-2.656 8.875zm22.795 42.374l-1.55 4.88-3.32 20.634-.442 27.51 4.65 26.847-.223-34.39 4.87-13.754.663-15.087zM23.34 181.24l1.106 41.267 8.853 33.28-9.628-4.55-16.045-57.8 5.533-36.384zm15.934 80.536l-.664 18.415-1.55 6.435h-4.647l-1.327-4.437-1.55-.222.332 4.437-5.864-1.778-1.55-.887-6.64-1.442-.22-5.214 6.418-10.87 4.426-5.548 10.844-4.437zM13.63 3.076v22.476l15.71 31.073 9.923 30.85L38.23 66.1zm25.49 30.248l.118-.148-.793-2.024L21.9 12.992l-1.242-.44L31.642 40.93zM32.865 44.09l6.812 17.6 2.274-21.596-1.344-3.43zM6.395 61.91l.827 25.34 12.816 35.257-3.928 10.136L3.5 88.133zM30.96 74.69l.345.826 6.47 15.48-4.177 38.342-6.594-3.526 5.715-35.7zm45.5 63.953l.663 5.99-4.647 5.77-1.55 9.1-3.1 1.33-2.655-13.755-1.77-4.88 1.55-3.107zm-20.582.444l3.32 9.318 7.08 13.755-1.77 12.647-5.09-14.2-4.2-7.987zm3.762 29.73l1.55 4.88 3.32 20.633.442 27.51-4.648 26.847.22-34.39-4.867-13.754-.67-15.087zm10.623 12.424l-1.107 41.267-8.852 33.28 9.627-4.55 16.046-57.8-5.533-36.384zM54.33 261.777l.663 18.415 1.546 6.435h4.648l1.328-4.437 1.55-.222-.333 4.437 5.863-1.778 1.55-.887 6.638-1.442.222-5.214-6.418-10.868-4.426-5.547-10.844-4.437zm25.643-258.7v22.476L64.26 56.625l-9.923 30.85L55.37 66.1zM54.48 33.326l-.118-.15.793-2.023L71.7 12.993l1.24-.44L61.96 40.93zm6.255 10.764l-6.812 17.6-2.274-21.595 1.344-3.43zm26.47 17.82l-.827 25.342-12.816 35.256 3.927 10.136 12.61-44.51zM62.64 74.693l-.346.825-6.47 15.48 4.178 38.342 6.594-3.527-5.715-35.7zm19.792 51.75l-5.09 27.29 3.32-1.776 2.655 8.875zM9.495-.007l.827 21.373-7.028 42.308-3.306-34.155zm2.068 27.323L26.24 59.707l3.307 26-6.2 36.58L9.91 85.046l-.827-38.342zM84.103-.01l-.826 21.375 7.03 42.308 3.306-34.155zm-2.066 27.325L67.36 59.707l-3.308 26 6.2 36.58 13.436-37.24.827-38.34z" />
        </svg>
        <svg data-position="hands" class="hands" xmlns="http://www.w3.org/2000/svg" width="205" height="38.938" viewBox="0 0 205 38.938">
          <path
            d="M21.255-.002l2.88 6.9 8.412 1.335.664 12.458-4.427 17.8-2.878-.22 2.8-11.847-2.99-.084-4.676 12.6-3.544-.446 4.4-12.736-3.072-.584-5.978 13.543-4.428-.445 6.088-14.1-2.1-1.25-7.528 12.012-3.764-.445L12.4 12.9l-1.107-1.78L.665 15.57 0 13.124l8.635-7.786zm162.49 0l-2.88 6.9-8.412 1.335-.664 12.458 4.427 17.8 2.878-.22-2.8-11.847 2.99-.084 4.676 12.6 3.544-.446-4.4-12.736 3.072-.584 5.978 13.543 4.428-.445-6.088-14.1 2.1-1.25 7.528 12.012 3.764-.445L192.6 12.9l1.107-1.78 10.628 4.45.665-2.447-8.635-7.786z" />
        </svg>
      </div>
    </section>

</body>
<script src="https://apis.google.com/js/platform.js?onload=init" async defer></script>
<script src="https://accounts.google.com/gsi/client" async defer></script>



<script>

$(window).resize(function(){

         $(".setMenu ol hr").css("width", `${50}%`);
         $(".setMenu ol li:nth-child(2)").addClass('SetLinkOn');

         for(var x = 0; x<=6; x++){
           if($(`.msclSwiper .swiper-slide:nth-child(${x})`).hasClass('msclSwiperOn')){
             setExercises($(`.msclSwiper .swiper-slide:nth-child(${x})`).children('h3').text().toLowerCase());
           }
         }

});

$('#menuToggle').click(function(){
   openTab = 'side';
  if($('.sideBar').hasClass('sideOpen')){
      $('.sideBar').removeClass('sideOpen');
      $('#menuToggle').removeClass('change');
  }else{
      $('.sideBar').addClass('sideOpen');
      $('#menuToggle').addClass('change');
  }
});

</script>

<script>

$(document).ready(function(){

  var arrayOfImages = [];
  for(var img = 0; img<exercises.length; img++){
    arrayOfImages.push(`exImgs/${exercises[img].name.split(" ").join("")}.jpg`);
  }
  preload(arrayOfImages);
  function preload(arrayOfImages) {
    $(arrayOfImages).each(function () {
        $('<img />').attr('src',this).appendTo('body').css('display','none');
    });
  }

  $('.msclSwiper .swiper-slide:nth-child(1)').addClass('msclSwiperOn');

  checkInfo = true;

  $(".setMenu ol li").removeClass('SetLinkOn');
  $('.setMenu ol li:nth-child(2)').addClass('SetLinkOn');

  if(getCookie('welcome') == null){
      window.location.replace("about.php");
  }
      if (getCookie('userEmail') != null){
        userEmail = getCookie('userEmail');
        $('.signInScreen').removeClass('signInOn');
        $('#menuToggle').removeClass('hide');
        $('#mLogo').removeClass('titleLeft');
        $('.mainTitle').removeClass('maxZ');
        setHistory();
      }else{
        $('.signInScreen').addClass('signInOn');
        $('#menuToggle').addClass('hide');
        $('#mLogo').addClass('titleLeft');
        $('.mainTitle').addClass('maxZ');
      }

      var mobile = false;

           if ($(window).width() <= 930) {
             mobile = true;
             $('#mobileDevice').hide();
           }else{
              mobile = false;
              $('#mobileDevice').show();
           }

             $(".setMenu ol hr").css("width", `${50}%`);

             $(".sideMenu ol hr").css("width", `${50}%`);

    $('input[type="number"]').on('keyup',function(){
        v = parseInt($(this).val());
        min = parseInt($(this).attr('min'));
        max = parseInt($(this).attr('max'));

        if (v < min){
            $(this).val(min);
        } else if (v > max){
            $(this).val(max);
        }
    })
})

var exercises = [{
    category: 'chest',
    name: 'bench press'
  },
  {
    category: 'chest',
    name: 'chest flyes'
  },
  {
    category: 'chest',
    name: 'chest press'
  },
  {
    category: 'chest',
    name: 'cable crossover'
  },
  {
    category: 'chest',
    name: 'pec deck'
  },
  {
    category: 'back',
    name: 'deadlifts'
  },
  {
    category: 'back',
    name: 'barbell rows'
  },
  {
    category: 'back',
    name: 't bar rows'
  },
  {
    category: 'back',
    name: 'cable rows'
  },
  {
    category: 'back',
    name: 'lat pull downs'
  },
  {
    category: 'shoulders',
    name: 'overhead press'
  },
  {
    category: 'shoulders',
    name: 'lateral raises'
  },
  {
    category: 'shoulders',
    name: 'front raises'
  },
  {
    category: 'shoulders',
    name: 'reverse pec deck'
  },
  {
    category: 'shoulders',
    name: 'reverse fly'
  },
  {
    category: 'biceps',
    name: 'barbell curls'
  },
  {
    category: 'biceps',
    name: 'dumbbell curls'
  },
  {
    category: 'biceps',
    name: 'concentration curls'
  },
  {
    category: 'biceps',
    name: 'hammer curls'
  },
  {
    category: 'triceps',
    name: 'cable press down'
  },
  {
    category: 'triceps',
    name: 'lying triceps extension'
  },
  {
    category: 'triceps',
    name: 'close grip bench press'
  },
  {
    category: 'legs',
    name: 'squats'
  },
  {
    category: 'legs',
    name: 'lunges'
  },
  {
    category: 'legs',
    name: 'leg press'
  },
  {
    category: 'legs',
    name: 'leg extensions'
  },
  {
    category: 'legs',
    name: 'leg curls'
  }
];

var infoSwipedManual = false;
var lastClickedIndex = 0;
var infoManualDirection = 'right';

var touchEnd = true;

var exSwiper = new Swiper('.exSwiper', {
  slidesPerView: 3,
  slideToClickedSlide: true,
  on: {
    click: function(){
      if(lastClickedIndex < this.clickedIndex){
        infoManualDirection = 'right';
      }else if((lastClickedIndex > this.clickedIndex)){
        infoManualDirection = 'left';
      }else{
        infoManualDirection = 'same';
      }
      lastClickedIndex = this.clickedIndex;
    }
      }
});


$(document).on('click', '.exSwiper .swiper-slide', function(){
  infoSwipedManual = true;
  switch (infoManualDirection) {
    case 'right':

      $('#infoSlider').css('transition', `all 0.2s ease`);
      $('#infoSlider').css('transform', `translateX(-100%)`);
      setTimeout(function(){
          $('#infoSlider').removeAttr('style');
          $('#infoSlider').css('transform', `translateX(100%)`);
      }, 200);
      setTimeout(function(){
        $('#infoSlider').css('transition', `all 0.2s ease`);
        $('#infoSlider').css('transform', ``);
      }, 250);
      for(var i=0; i<=$('.exSwiper .swiper-slide').length; i++){
        if($(`.exSwiper .swiper-slide:nth-child(${i})`).hasClass('exSwiperOn')){
            $(`.exSwiper .swiper-slide`).removeClass('exSwiperOn');
          $(`.exSwiper .swiper-slide:nth-child(${i+1})`).addClass('exSwiperOn');
          $('.exName h1').html($(`.exSwiper .swiper-slide:nth-child(${i+1})`).text());
          setHistory();
          if(i+1 > exSwiper.params.slidesPerView && i+1 <= $('.exSwiper .swiper-slide').length){
                exSwiper.slideTo(i+1);
          }else if(i+1 > $('.exSwiper .swiper-slide').length){
              exSwiper.slideTo(0);
                $(`.exSwiper .swiper-slide`).removeClass('exSwiperOn');
              $(`.exSwiper .swiper-slide:nth-child(1)`).addClass('exSwiperOn');
              $('.exName h1').html($(`.exSwiper .swiper-slide:nth-child(1)`).text());
              setHistory();
          }
          break;
        }
      }

      break;
        case 'left':

          $('#infoSlider').css('transition', `all 0.2s ease`);
          $('#infoSlider').css('transform', `translateX(100%)`);
          setTimeout(function(){
              $('#infoSlider').removeAttr('style');
              $('#infoSlider').css('transform', `translateX(-100%)`);
          }, 200);
          setTimeout(function(){
            $('#infoSlider').css('transition', `all 0.2s ease`);
            $('#infoSlider').css('transform', ``);
          }, 250);
          for(var i=0; i<=$('.exSwiper .swiper-slide').length; i++){
            if($(`.exSwiper .swiper-slide:nth-child(${i})`).hasClass('exSwiperOn')){
                $(`.exSwiper .swiper-slide`).removeClass('exSwiperOn');
              $(`.exSwiper .swiper-slide:nth-child(${i-1})`).addClass('exSwiperOn');
              $('.exName h1').html($(`.exSwiper .swiper-slide:nth-child(${i-1})`).text());
              setHistory();
              if(i-1 > 0){
                    exSwiper.slideTo(i-2);
              }else if(i-1 <= 0){
                  exSwiper.slideTo($('.exSwiper .swiper-slide').length - 1);
                    $(`.exSwiper .swiper-slide`).removeClass('exSwiperOn');
                  $(`.exSwiper .swiper-slide:last-child`).addClass('exSwiperOn');
                  $('.exName h1').html($(`.exSwiper .swiper-slide:last-child`).text());
                  setHistory();
              }
              break;
            }
          }

          break;
            case 'same':

              break;
  }
});

$(document).on('click', '.msclSwiper .swiper-slide', function(){
  infoSwipedManual = true;
  switch (infoManualDirection) {
    case 'right':

    $('#infoSlider').css('transition', `all 0.2s ease`);
    $('#infoSlider').css('transform', `translateX(100%)`);
    setTimeout(function(){
        $('#infoSlider').removeAttr('style');
        $('#infoSlider').css('transform', `translateX(-100%)`);
    }, 200);
    setTimeout(function(){
      $('#infoSlider').css('transition', `all 0.2s ease`);
      $('#infoSlider').css('transform', ``);
    }, 250);

      break;
        case 'left':

        $('#infoSlider').css('transition', `all 0.2s ease`);
        $('#infoSlider').css('transform', `translateX(-100%)`);
        setTimeout(function(){
            $('#infoSlider').removeAttr('style');
            $('#infoSlider').css('transform', `translateX(100%)`);
        }, 200);
        setTimeout(function(){
          $('#infoSlider').css('transition', `all 0.2s ease`);
          $('#infoSlider').css('transform', ``);
        }, 250);

          break;
            case 'same':

              break;
  }
});

var msclSwiper = new Swiper('.msclSwiper', {
  slidesPerView: 4,
  slidesPerGroup: 4,
  breakpoints: {
    // when window width is >= 320px
    320: {
      slidesPerView: 5,
      slidesPerGroup: 5,
      spaceBetween: 0
    },
    // when window width is >= 480px
    480: {
      slidesPerView: 5,
      slidesPerGroup: 5,
      spaceBetween: 10
    },
    // when window width is >= 640px
    640: {
      slidesPerView: 6,
      slidesPerGroup: 6,
      spaceBetween: 40
    }
  }
});

$(document).on('click', '.exSwiper .swiper-slide', function(){
  $(`.exSwiper .swiper-slide`).removeClass('exSwiperOn');
  $(this).addClass('exSwiperOn');
  $('.exName h1').html($(this).text());
  setHistory();
});

$(document).on('click', '.msclSwiper .swiper-slide', function(){
  $(`.msclSwiper .swiper-slide`).removeClass('msclSwiperOn');
  $(this).addClass('msclSwiperOn');
  setExercises($(this).children('h3').text().toLowerCase());
  $(`.human-body svg path`).css("stroke", "#303030");
  switch ($(this).children('h3').text().toLowerCase()) {
    case 'chest':
      $(`.cheast path`).css("stroke", "var(--main)");
      break;
    case 'back':
      $(`.stomach path`).css("stroke", "var(--main)");
      break;
    case 'biceps':
      $(`.arm path`).css("stroke", "var(--main)");
      break;
    case 'triceps':
      $(`.arm path`).css("stroke", "var(--main)");
      break;
    case 'shoulders':
      $(`.shoulder path`).css("stroke", "var(--main)");
      break;
    case 'legs':
      $(`.legs path`).css("stroke", "var(--main)");
      break;
    default:
  }
});

function setExercises(ex) {
  exSwiper.removeAllSlides();
  var maxLen = 0;
  var totalLen = 0;

  for (key in exercises) {
    if (exercises[key].category == ex) {
      if(maxLen < exercises[key].name.length){
        maxLen = exercises[key].name.length;
      }
    }
  }
    exSwiper.params.slidesPerView = Math.round($('.exSwiper').width()/(maxLen*10));

  for (key in exercises) {
    if (exercises[key].category == ex) {
      exSwiper.addSlide($('.exSwiper .swiper-wrapper').children().length, `<section class="swiper-slide"> ${exercises[key].name} </section>`);
    }
  }

  $('.exName h1').html($(`.exSwiper .swiper-slide`).first().text());
  setHistory();

  $(`.exSwiper .swiper-slide`).first().addClass('exSwiperOn');

}

setExercises('chest');
$(`.cheast path`).css("stroke", "var(--main)");

$(document).on('input', '.range', function(){
  if (this.value > 20) {
    $(this).addClass('ltpurple');
  }
  if (this.value > 40) {
    $(this).addClass('purple');
  }
  if (this.value > 60) {
    $(this).addClass('pink');
  }

  //Change slide thumb color on way down
  if (this.value < 20) {
    $(this).removeClass('ltpurple');
  }
  if (this.value < 40) {
    $(this).removeClass('purple');
  }
  if (this.value < 60) {
    $(this).removeClass('pink');
  }
});

$(document).on('click', '.openExMenu', function(){
    $(".newEntry").addClass("newEntryOpen");
});
$(document).on('click', '.placeholderHistory', function(){
    $(".newEntry").addClass("newEntryOpen");
});
$(document).on('click', '#addNew', function(){
    $(".newEntry").addClass("newEntryOpen");
});
$(document).on('click', '#closeEntry', function(){
    $('.newEntry').removeAttr('style');
    $('.newEntry').removeClass('newEntryOpen');
});

$(document).click(function(e) {
  if ($(e.target).closest('input').length === 0) {
    $('input').blur();
  }
    if ($(e.target).closest('textarea').length === 0) {
      $('textarea').blur();
      $('textarea').val('');
    }
    if ($(e.target).closest('#helpBtn').length === 0) {
      $(".helpMenu").removeClass("helpOn");
      $('#helpBtn img').css('filter', 'invert(70%)');
  }
    if ($(e.target).closest('.newEntry').length === 0 && $(e.target).closest('#addNew').length === 0 && $(e.target).closest('.msclSwiper').length === 0) {
      $('.newEntry').removeClass('newEntryOpen');
    }
  });

var d = new Date();
var year = d.getFullYear();
var day = d.getDate();
var months = ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"];
var month = months[d.getMonth()];

function formatAMPM(date) {
  var hours = date.getHours();
  var minutes = date.getMinutes();
  var ampm = hours >= 12 ? 'pm' : 'am';
  hours = hours % 12;
  hours = hours ? hours : 12; // the hour '0' should be '12'
  minutes = minutes < 10 ? '0' + minutes : minutes;
  var strTime = hours + ':' + minutes + ' ' + ampm;
  return strTime;
}

$("#addHistory").click(function(e) {
  e.preventDefault();
        if($(`.exForm .dataDials .swiper-slide:nth-child(1) input`).val() == 0 || $(`.exForm .dataDials .swiper-slide:nth-child(2) input`).val() == 0 || $(`.exForm .dataDials .swiper-slide:nth-child(1) input`).val() == undefined || $(`.exForm .dataDials .swiper-slide:nth-child(2) input`).val() == undefined){
          if($(`.exForm .dataDials .swiper-slide:nth-child(1) input`).val() == 0 || $(`.exForm .dataDials .swiper-slide:nth-child(1) input`).val() == undefined){

                $(`.exForm .exLabels h1`).removeClass('exLabelOn');
                $(`.exForm .exLabels`).find(">:first-child").addClass('exLabelOn');
                dialSwiper.slidePrev();

          }else if($(`.exForm .dataDials .swiper-slide:nth-child(2) input`).val() == 0 || $(`.exForm .dataDials .swiper-slide:nth-child(2) input`).val() == undefined){

                $(`.exForm .exLabels h1`).removeClass('exLabelOn');
                $(`.exForm .exLabels`).find(">:last-child").addClass('exLabelOn');
                dialSwiper.slideNext();

          }

          $(`.exForm`).addClass('infoEmpty');
          setTimeout(function(){$(`.exForm`).removeClass('infoEmpty');},800);
        }else{
          sets = {};
            sets.dateId = new Date();
            sets.date = sets.dateId.getDate() + '/' + months[sets.dateId.getMonth()] + '/' + sets.dateId.getFullYear();
            sets.time = formatAMPM(sets.dateId);
            sets.weight = $(`.exForm .dataDials .swiper-slide:nth-child(1) input`).val();
            sets.reps = $(`.exForm .dataDials .swiper-slide:nth-child(2) input`).val();
            sets.diff = $(`.exForm .range`).attr('class').split(' ').pop();
            setData(userEmail.split('@')[0] + $(`.exName h1`).text().split(" ").join(""), sets.dateId, sets.date, sets.time, sets.weight, sets.reps, sets.diff);
            $('.newEntry').removeAttr('style');
            $('.newEntry').removeClass('newEntryOpen');
          }
});

function setData(table, dateId, logDate, logTime, weight, reps, diff){
                          $(".blank").load("setData.php", {
                          table: table, dateId: dateId, logDate: logDate, logTime: logTime, weight: weight, reps: reps, diff: diff
                          });
}


$('#loading').hide();
function setHistory() {
$('#loading').show();
$('#exImg').attr('src', `exImgs/${$(`.exName h1`).text().split(" ").join("")}.jpg`);
      $(".blank").load("getData.php", {
      table: userEmail.split('@')[0] + $(`.exName h1`).text().split(" ").join("")
    }, function(){
    $('#loading').hide();
    });
}
$('#landscape').hide();
$( window ).on( "orientationchange", function( event ) {
  if(event.target.screen.orientation.type != 'portrait-primary'){
    $('#landscape').show();
  }else{
    location.reload();
  }
});

function setCombinedGraph(chartId, chartDate, chartTime, chartWeight, chartReps) {
  var curDate = day+'/'+month+'/'+year;
  var chartLabels = [];
  for(var c = 0; c<chartDate.length; c++){
    if(chartDate[c] == curDate){
      chartLabels.push(chartTime[c]);
    }else{
      chartLabels.push(chartDate[c].split('/')[0] + ' ' + chartDate[c].split('/')[1]);
    }
  }
  $('.exPlaceholder').addClass('hide');
  $('.exChart').removeClass('hide');
  $('.exLegend').removeClass('hide');
  var ctx = document.getElementById('exChart').getContext('2d');
  var exChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: chartLabels,
      datasets: [{
          label: 'Weight',
          data: chartWeight,
          backgroundColor: [
            'rgba(184, 249, 7, 0.2)'
          ],
          borderColor: [
            'rgba(184, 249, 7, 1)'
          ],
          borderWidth: 1
        },
        {
          label: 'Reps',
          data: chartReps,
          backgroundColor: [
            'rgba(7, 249, 17, 0.2)'
          ],
          borderColor: [
            'rgba(7, 249, 17, 1)'
          ],
          borderWidth: 1
        }
      ]
    },
    options: {
      legend: {
        display: false
      },
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: true
          }
        }]
      }
    }
  });
}

function resetAll(){
    for (key in exercises) {
      if (exercises[key].name == $(`.exSwiper .swiper-slide`).first().text()) {
        exercises[key].data = [];
        $.ajax({
                url: "removeTable.php",
                method: "POST",
                data: { table: userEmail.replace("@gmail.com", "") + $(`.exSwiper .swiper-slide`).first().text().split(" ").join("")},
                success: function() { }
            });
        setHistory();
      }
    }
}


</script>



<script>


  $('#helpBtn').hover(function(){
    if(!mobile){
    $('.helpMenu').addClass('helpOn');
    }
  }, function(){
    if(!mobile){
      $('.helpMenu').removeClass('helpOn');
      $('#helpBtn img').css('filter', 'invert(70%)');
    }
  });

    $('#helpBtn img').click(function(){
      if(mobile){
        if($('.helpMenu').hasClass('helpOn')){
        $('.helpMenu').removeClass('helpOn');
        $('#helpBtn img').css('filter', 'invert(70%)');
        }else{
        $('.helpMenu').addClass('helpOn');
        $('#helpBtn img').css('filter', 'invert(30%)');
        }
      }
    });


  $('#helpOptions li:first-child').addClass('helpActive');
  $('#helpOptions li').click(function(){
    $('#helpOptions li').removeClass('helpActive');
      $('#helpOptions li').attr('data-typeActive', 'false');
    $(this).addClass('helpActive');
      $(this).attr('data-typeActive', 'true');
    $('#helpForm textarea').attr("placeholder", $(this).attr('data-helpType'));
  });

  $('#helpForm button').click(function(e){
    e.preventDefault();
    $.ajax({
            url: "sendMail.php",
            method: "POST",
            data: { email: userEmail, subject: $('#helpOptions li[data-typeActive="true"]').text(), message: $('#helpForm textarea').val() },
            success: function() { }
        });

        $('#msg').addClass('msgOpen');
        $('.sideBar #msg').addClass('msgOpen');
        $('.helpMenu').removeClass('helpOn');
        $('#helpBtn img').css('filter', 'invert(70%)');
        $('#helpBtn').css('pointer-events', 'none');
        setTimeout(function(){
          $('#msg').removeClass('msgOpen');
          $('.sideBar #msg').removeClass('msgOpen');
          $('#helpBtn').css('pointer-events', 'all');
        }, 3000);
  });

</script>

<script>

new AlloyFinger(document, {
    swipe:function(evt){
          $(".helpMenu").removeClass("helpOn");
          $('#helpBtn img').css('filter', 'invert(70%)');
    }
});

new AlloyFinger(document.getElementById('swiperToOpen'), {
    swipe:function(evt){
        if(evt.direction==="Right"){
              $('.newEntry').addClass('newEntryOpen');
        }
    }
});

new AlloyFinger(document.getElementById('addHistory'), {
    swipe:function(evt){
        if(evt.direction==="Left"){
           $('.newEntry').removeClass('newEntryOpen');
        }
    }
});

new AlloyFinger(document.getElementById('infoSlider'), {
    swipe:function(evt){
        if(evt.direction==="Left"){
          $('#infoSlider').css('transition', `all 0.2s ease`);
          $('#infoSlider').css('transform', `translateX(-100%)`);
          setTimeout(function(){
              $('#infoSlider').removeAttr('style');
              $('#infoSlider').css('transform', `translateX(100%)`);
          }, 200);
          setTimeout(function(){
            $('#infoSlider').css('transition', `all 0.2s ease`);
            $('#infoSlider').css('transform', ``);
          }, 250);
          for(var i=0; i<=$('.exSwiper .swiper-slide').length; i++){
            if($(`.exSwiper .swiper-slide:nth-child(${i})`).hasClass('exSwiperOn')){
                $(`.exSwiper .swiper-slide`).removeClass('exSwiperOn');
              $(`.exSwiper .swiper-slide:nth-child(${i+1})`).addClass('exSwiperOn');
              $('.exName h1').html($(`.exSwiper .swiper-slide:nth-child(${i+1})`).text());
              if(i+1 > exSwiper.params.slidesPerView && i+1 <= $('.exSwiper .swiper-slide').length){
                    exSwiper.slideTo(i+1);
              }else if(i+1 > $('.exSwiper .swiper-slide').length){
                  exSwiper.slideTo(0);
                    $(`.exSwiper .swiper-slide`).removeClass('exSwiperOn');
                  $(`.exSwiper .swiper-slide:nth-child(1)`).addClass('exSwiperOn');
                  $('.exName h1').html($(`.exSwiper .swiper-slide:nth-child(1)`).text());
              }
              setHistory();
              break;
            }
          }

        }else if(evt.direction==="Right"){
          $('#infoSlider').css('transition', `all 0.2s ease`);
          $('#infoSlider').css('transform', `translateX(100%)`);
          setTimeout(function(){
              $('#infoSlider').removeAttr('style');
              $('#infoSlider').css('transform', `translateX(-100%)`);
          }, 200);
          setTimeout(function(){
            $('#infoSlider').css('transition', `all 0.2s ease`);
            $('#infoSlider').css('transform', ``);
          }, 250);
          for(var i=0; i<=$('.exSwiper .swiper-slide').length; i++){
            if($(`.exSwiper .swiper-slide:nth-child(${i})`).hasClass('exSwiperOn')){
                $(`.exSwiper .swiper-slide`).removeClass('exSwiperOn');
              $(`.exSwiper .swiper-slide:nth-child(${i-1})`).addClass('exSwiperOn');
              $('.exName h1').html($(`.exSwiper .swiper-slide:nth-child(${i-1})`).text());
              if(i-1 > 0){
                    exSwiper.slideTo(i-2);
              }else if(i-1 <= 0){
                  exSwiper.slideTo($('.exSwiper .swiper-slide').length - 1);
                    $(`.exSwiper .swiper-slide`).removeClass('exSwiperOn');
                  $(`.exSwiper .swiper-slide:last-child`).addClass('exSwiperOn');
                  $('.exName h1').html($(`.exSwiper .swiper-slide:last-child`).text());
              }
              setHistory();
              break;
            }
          }
        }
    }
});

</script>
</html>
