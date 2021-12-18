@props([
    'pollname' => 'poll',
    'form_action' => '#',
    'item',
])

@php
$choices = $item->choice ?? [
    ['Mountain', 0],
    ['Beach', 0],
    ['Farm', 0],
    ['Museum', 0],
];
@endphp

<form method="post" action="{{$form_action}}">
    @csrf
    <div style="background:#ddd; padding:1em">
        <label for="budget">Your Voting Budget (<span id="{{$pollname}}-budget-indicator"></span> point)
          <progress id="{{$pollname}}-budget" value="100" max="100"></progress>
        </label>

        <em>How to use: you could spend your "voting budget" for each choices below. However beware that the cost for each vote increase by the power of 2, so spend it wisely!</em>

        <div id="{{$pollname}}-notif"></div>
    </div>


    @foreach ($choices as $choice)
    <label for="choice-{{$loop->index}}">{{$choice['title']}} (<span id="{{$pollname}}-choice-indicator-{{$loop->index}}"></span> vote)
      <input type="range" min="0" max="10" value="0" id="{{$pollname}}-choice-{{$loop->index}}" name="{{$pollname}}-choice[{{$loop->index}}]" class="{{$pollname}}-item" oninput="updateBudget('{{$pollname}}', {{$loop->index}})">
    </label>
    @endforeach

    <button id="{{$pollname}}-submit" type="submit">Submit</button>
</form>

<script>
function updateBudget(pollname) {
    var total = 0
    document.querySelectorAll('.' + pollname + '-item').forEach(item => {
        total += Number(item.value) * Number(item.value)
        item.previousElementSibling.innerText = item.value
    })
    console.log(total)
    var budgetLeft = 100 - total
    document.getElementById(pollname + '-budget').value = budgetLeft
    document.getElementById(pollname + '-budget-indicator').innerText = budgetLeft

    var notif = document.getElementById(pollname + '-notif')
    var submit = document.getElementById(pollname + '-submit')
    if (total > 100) {
        notif.innerHTML = '<mark>You has exceeded your budget! Adjust you choices so they still within range</mark>'
        submit.disabled = true
    } else {
        notif.innerHTML = null
        submit.disabled = false
    }
}

updateBudget('{{$pollname}}')
</script>

