@props(['item'])

@php
$pollname = $item->slug ?? 'default';
$choices = $item->choice ?? [
    ['Mountain', 0],
    ['Beach', 0],
    ['Farm', 0],
    ['Museum' 0],
];
@endphp

<form>
      <div style="background:#ddd; padding:0 1em">
          <label for="budget">Your Voting Budget
            <progress id="{{$pollname}}-budget" value="100" max="100"></progress>
          </label>

          <div id="{{$pollname}}-notif"></div>
      </div>

      @foreach ($choices as $choice)
      <label for="choice-{{$loop->index}}">{{$choice}}
        <input type="range" min="0" max="10" value="0" id="choice-{{$loop->index}}" name="choice-{{$loop->index}}" class="{{$pollname}}-item" oninput="updateBudget('{{$pollname}}')">
      </label>
      @endforeach

      <button id="{{$pollname}}-submit" type="submit">Submit</button>
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

updateBudget('{{$pollname}}')
</script>

