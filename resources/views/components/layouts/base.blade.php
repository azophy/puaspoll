<!doctype html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? "PuasPoll • The most satisfiying polling app you'll ever tried" }}</title>
    <meta name="description" content="Satisfying polling ppp, based on Quadratic Voting method">
    <link rel="shortcut icon" href="https://picocss.com/favicon.ico">
    <link rel="canonical" href="https://picocss.com/examples/classless/">

    <!-- Pico.css (Classless version) -->
    <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@latest/css/pico.classless.min.css">

    <script defer data-domain="puaspoll.com" src="https://plausible.io/js/plausible.js"></script>

    {!! ReCaptcha::htmlScriptTagJsApi() !!}
  </head>

  <body>

    <!-- Header -->
    <header>
      <hgroup>
        <h1><a href="{{url('/')}}">PuasPoll</a></h1>
        <h2>The most satisfiying polling app you'll ever tried</h2>
      </hgroup>
      <nav>
        <ul>
          <li><a href="{{route('polls.index')}}">Public Polls Directory</a></li>
          <li><a href="{{route('polls.create')}}">Create new Poll</a></li>
        </ul>
      </nav>
    </header><!-- ./ Header -->

    <!-- Main -->
    <main>

        {{ $slot }}

    </main><!-- ./ Main -->

    <!-- Footer -->
    <footer>
      <small>Created by <a target="_blank" href="https://abdurrahman.adianto.id">Abdurrahman Shofy Adianto</a> • Built with <a target="_blank" href="https://laravel.com">Laravel</a> and <a target="_blank" href="https://picocss.com">PicoCSS</a>  </small>
    </footer><!-- ./ Footer -->

  </body>

</html>

