<form class="dash-form ajax-form" id="{{$model}}DeleteForm" method="post" action="/dashboard/{{$model}}/delete">
    @csrf
    <div class="text-center pt-4">
        <p>{{$form['text']}}</p>
    </div>

    <input type="hidden" name="id" value="{{$record->id}}" />

    <div class="text-center dash-form-bottom">
        <button class="dash-btn orange-btn">Delete</button>
    </div>
</form>
