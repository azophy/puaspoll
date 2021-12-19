@props([
    'pollname' => 'poll',
    'form_action' => '#',
    'item',
])

@php
$choices = $item->choice ?? [
    ['title' => 'Mountain'],
    ['title' => 'Beach'],
    ['title' => 'Farm'],
    ['title' => 'Museum'],
];
use App\Models\Poll;
@endphp

<form method="post" action="{{$form_action}}" id="{{getFormId()}}">
    @csrf
    <div class="polling_budget_box">
        <label for="budget">Your Voting Budget (<span id="{{$pollname}}-budget-indicator"></span> point)
          <progress id="{{$pollname}}-budget" value="{{ Poll::VOTE_BUDGET }}" max="{{ Poll::VOTE_BUDGET }}"></progress>
        </label>

        <em>How to use: you could spend your "voting budget" for each choices below. However beware that the cost for each vote increase by the power of 2, so spend it wisely!</em>

        <div id="{{$pollname}}-notif"></div>
    </div>


    @foreach ($choices as $choice)
    <label for="choice-{{$loop->index}}">{{$choice['title']}} (<span id="{{$pollname}}-choice-indicator-{{$loop->index}}"></span> vote)
      <input type="range" min="0" max="10" value="0" id="{{$pollname}}-choice-{{$loop->index}}" name="{{$pollname}}-choice[{{$loop->index}}]" class="{{$pollname}}-item" oninput="updateBudget('{{$pollname}}', {{$loop->index}})">
    </label>
    @endforeach

    {{--
    <button id="{{$pollname}}-submit" type="submit">Submit</button>
    --}}
    {!! htmlFormButton('Submit', [
        'id' => "{$pollname}-submit",
    ]) !!}
</form>

<style>
.polling_budget_box {
    background:#ddd;
    padding:1em;
}
@media (prefers-color-scheme: dark) {
    .polling_budget_box {
        background:#333;
    }
}
</style>

<script>
function updateBudget(pollname) {
    var total = 0
    document.querySelectorAll('.' + pollname + '-item').forEach(item => {
        total += Number(item.value) * Number(item.value)
        item.previousElementSibling.innerText = item.value
    })
    console.log(total)
    var budgetLeft = {{ Poll::VOTE_BUDGET }} - total
    document.getElementById(pollname + '-budget').value = budgetLeft
    document.getElementById(pollname + '-budget-indicator').innerText = budgetLeft

    var notif = document.getElementById(pollname + '-notif')
    var submit = document.getElementById(pollname + '-submit')
    if (total > {{ Poll::VOTE_BUDGET }}) {
        notif.innerHTML = '<mark>You has exceeded your budget! Adjust you choices so they still within range</mark>'
        submit.disabled = true
    } else {
        notif.innerHTML = null
        submit.disabled = false
    }
}

updateBudget('{{$pollname}}')
</script>

