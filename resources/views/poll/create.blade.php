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
    <input type="text" name="title" value="{{ old('title') }}">

    <label for="description">Description</label>
    <textarea id="description" name="description" cols="30" rows="5">{{ old('description') }}</textarea>

    <label for="title">Url</label>
    {{url('/-')}}/<input type="text" name="slug" value="" placeholder="url-to-your-new-poll" value="{{ old('slug') }}">

    <label for="is_public">
      <input type="checkbox" id="is_public" name="is_public" role="switch" checked>
      Make this Poll public
    </label>
    <small>By default, only people with the link to this poll could open it. By making it public, it would be featured in PuasPoll's <a href="{{ route('polls.index') }}" target="_blank">Public Poll list</a></small>

    <h3>Choices</h3>
    <ul id="choices">
    </ul>

    <button type="button" style="width:200px" onclick="addChoice()">Add Choice</button>

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

