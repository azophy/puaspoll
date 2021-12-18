<!doctype html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PuasPoll • The most satisfiying polling app you'll ever tried</title>
    <meta name="description" content="Satisfying polling ppp, based on Quadratic Voting method">
    <link rel="shortcut icon" href="https://picocss.com/favicon.ico">
    <link rel="canonical" href="https://picocss.com/examples/classless/">

    <!-- Pico.css (Classless version) -->
    <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@latest/css/pico.classless.min.css">
  </head>

  <body>

    <!-- Header -->
    <header>
      <hgroup>
        <h1>PuasPoll</h1>
        <h2>The most satisfiying polling app you'll ever tried</h2>
      </hgroup>
    </header><!-- ./ Header -->

    <!-- Main -->
    <main>

      <!-- why -->
      <section id="why">
        <h2>Why PuasPoll</h2>
        <p>No Tyranny of Majority, you could choose more then 1 choice, while still giving preference for any of them</p>

      </section><!-- ./ why -->

      <!-- example-->
      <section id="example">
        <h2>Example: where should we go for this holliday?</h2>
        <p>Sed ultricies dolor non ante vulputate hendrerit. Vivamus sit amet suscipit sapien. Nulla iaculis eros a elit pharetra egestas.</p>
        <form>
          <div style="background:#ddd; padding:0 1em">
              <label for="budget">Your Voting Budget
                <progress id="myvote-budget" value="100" max="100"></progress>
              </label>

              <div id="myvote-notif"></div>
          </div>

          @foreach (['Mountain', 'Beach', 'Farm', 'Museum'] as $item)
          <label for="choice-{{$loop->index}}">{{$item}}
            <input type="range" min="0" max="10" value="0" id="choice-{{$loop->index}}" name="choice-{{$loop->index}}" class="myvote-item" oninput="updateBudget('myvote')">
          </label>
          @endforeach

          <button id="myvote-submit" type="submit">Submit</button>
        </form>

        <script>
        function updateBudget(classname) {
            var total = 0
            document.querySelectorAll('.' + classname + '-item').forEach(i => total += Number(i.value) * Number(i.value) )
            console.log(total)
            document.getElementById(classname + '-budget').value = 100 - total

            var notif = document.getElementById(classname + '-notif')
            var submit = document.getElementById(classname + '-submit')
            if (total > 100) {
                notif.innerText = 'You has exceeded your budget! Adjust you choices so they still within range'
                submit.disabled = true
            } else {
                notif.innerText = ''
                submit.disabled = false
            }
        }

        updateBudget('myvote')
        </script>

    </main><!-- ./ Main -->

    <!-- Footer -->
    <footer>
      <small>Created by <a href="https://abdurrahman.adianto.id">Abdurrahman Shofy Adianto</a> • Built with <a href="laravel.com">Laravel</a> and <a href="https://picocss.com">PicoCSS</a>  </small>
    </footer><!-- ./ Footer -->

  </body>

</html>

