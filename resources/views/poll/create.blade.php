<x-layouts.base>

<h1>Create new Poll</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="post" action="{{route('polls.store')}}" id="{{getFormId()}}">
    @csrf

    <blockquote>
    Disclaimer: currently, polls is limited so it would expire after a week. In the future, I may revise this decision. However in the meantime I hope you would understand that this projects is still in its early phase and the resource I could allocate for this website is limited. Thank you

    <footer><cite>this site's maker</cite></footer>
    </blockquote>

    <label for="title">Poll's Title</label>
    <input type="text" name="title" value="">

    <label for="title">Description</label>
    <textarea id="description" name="description" cols="30" rows="5"></textarea>

    <label for="title">Url</label>
    {{url('/-')}}/<input type="text" name="slug" value="" placeholder="url-to-your-new-poll">

    <h3>Choices</h3>
    <ul id="choices">
    </ul>

    <button type="button" style="width:200px;background:#444" onclick="addChoice()">Add Choice</button>

    {!! htmlFormButton('Submit') !!}
</form>

<script>
function addChoice() {
    document.getElementById('choices').innerHTML += `
    <li>
        <label for="title">Choice's Title</label>
        <input type="text" name="choice_title[]">
        <button style="width:100px;background:#c42929" type="button" onclick="removeChoice(this)">delete</button>
    </li>
    `
}

function removeChoice(el) {
    console.log(el)
    el.parentNode.parentNode.removeChild(el.parentNode);
}
</script>
</x-layouts.base>

