<!doctype html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? "PuasPoll • The most satisfiying polling app you'll ever tried" }}</title>
    <meta name="description" content="Satisfying polling ppp for every need, based on Quadratic Voting method">
    <link rel="shortcut icon" href="https://picocss.com/favicon.ico">
    <link rel="canonical" href="https://puaspoll.com">

    <!-- meta tags reference: https://css-tricks.com/essential-meta-tags-social-media/ -->
    <!--  Essential META Tags -->
    <meta property="og:title" content="{{ $title ?? 'PuasPoll • The most satisfiying polling app you\'ll ever tried' }}" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="{{url('/og-screenshot.jpg')}}" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta name="twitter:card" content="summary_large_image" />

    <!--  Non-Essential, But Recommended -->
    <meta property="og:description" content="Satisfying polling ppp for every need, based on Quadratic Voting method" />
    <meta property="og:site_name" content="PuasPoll.com" />
    <meta name="twitter:image:alt" content="Alt text for image" />

    <!--  Non-Essential, But Required for Analytics -->
    <!-- <meta property="fb:app_id" content="your_app_id" /> -->
    <meta name="twitter:site" content="@azophy" />

    <!-- Pico.css (Classless version) -->
    <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@latest/css/pico.classless.min.css">

    <script defer data-domain="puaspoll.com" src="https://plausible.io/js/plausible.js"></script>

    {!! ReCaptcha::htmlScriptTagJsApi() !!}

    <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=61bf84fb9ebb4b00195d65ea&product=inline-share-buttons" async="async"></script>
  </head>

  <body>

  {{ $slot }}

  </body>

</html>

