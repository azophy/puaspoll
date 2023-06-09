<x-layouts.main>

<!-- about -->
<section id="about">
  <h2>What is PuasPoll?</h2>
  <p>This is simply a site where you could create, fill, and share an online poll. The unique part is, instead of using common 'one-person-one-vote' polling, this site is using <u>Quadratic Voting</u> system. </p>
</section><!-- ./ about -->

<!-- example-->
<section id="example">
  <h2>Example Poll</h2>
    <iframe src="{{route('polls.embed', ['slug'=>config('params.example_poll_slug'), 'untrack' => true])}}" frameborder="1" style="width:100%;height:70vh;border-style:dashed"></iframe>

</section><!-- ./ example -->

<!-- why -->
<section id="why">
  <h2>Why PuasPoll?</h2>
  <ul>
      <li>
        <strong>Fairer vote, more satisfying result.</strong>
        PuasPoll is based on the idea of <u>Quadratic Voting</u>. It should results in a better, more optimal, overall satisfying result, especialy compared to common 'one-man-one-vote' polling. Read more about Quadratic Voting here:
            <ul>
                <li><a target="_blank" href="https://en.wikipedia.org/wiki/Quadratic_voting">Good ol' Wikipedia Article</a></li>
                <li><a target="_blank" href="https://archive.ph/YZp">Article by Economist.com</a></li>
                <li><a target="_blank" href="https://www.radicalxchange.org/concepts/quadratic-voting/">Brief explaination with links to various resources</a></li>
                <li><a target="_blank" href="https://ncase.me/ballot/">A very nice article about various voting mechanism, INCLUDING INTERACTIVE VISUALIZATION!</a></li>
            </ul>
      </li>
      <li>
        <strong>Intuitive interface.</strong>
        Instead of using 'plus-minus' button that I found in other existing QV websites/apps, I decided to use native <a href="https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input/range" target="_blank">HTML5 Range Slide Input Element</a> which I think more intuitive and easier to use.
      </li>
  </ul>

</section><!-- ./ why -->

<!-- about-->
<section id="about">
  <h2>About PuasPoll</h2>

  <p>
      This site is inpired by <a target="_blank" href="https://news.ycombinator.com/item?id=29586658">This HackerNews Thread</a>. I created this website as a weekend project, so feel free to use and insult it.
  </p>

  <blockquote>Trivia: "Puas" is means "satisfying" in Indonesian. "PuasPoll" is also a word play on popular Javanese slank which roughly translated to "Very Satisfying".</blockquote>
</section><!-- ./ about -->

<!-- cta-->
<section id="cta">
  <h2>Create you own poll for free!</h2>
  <a href="{{route('polls.create')}}" role="button">Create Now</a>
  <a href="{{route('polls.index')}}" role="button">Explore Public Polls</a>
</section><!-- ./ cta -->

</x-layouts.main>

