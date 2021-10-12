
<html>
  <head>
    <title>reCAPTCHA demo: Simple page</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  </head>
  <body>
        @php
            if (isset($response))
            var_dump($response);
        @endphp
    <form action="/form" method="GET">
      <div class="g-recaptcha" data-sitekey="{{env('RECAPTCHA_SITE')}}"></div>
      <br/>
      <input type="submit" value="Submit">
    </form>
  </body>
</html>
