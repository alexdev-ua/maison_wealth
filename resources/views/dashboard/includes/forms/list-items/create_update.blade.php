<form class="dash-form ajax-form" id="{{$model}}Form" method="post" action="/dashboard/{{$model}}/save">
    @csrf

    <div class="dash-tabs-panel" id="listItemsTranslatesPanel">
        <div class="dash-tabs-heading pb-4 text-center">
            @foreach($langs as $key=>$lang)
                <span class="dash-tab-btn dash-btn @if($key == 0)active @endif" data-tab="#listItemTranslatesTab_{{$lang->code}}" data-panel="#listItemsTranslatesPanel">{{$lang->code}}</span>
            @endforeach
        </div>
        @foreach($langs as $key=>$lang)
        <div class="dash-tab @if($key == 0)active-tab @endif" id="listItemTranslatesTab_{{$lang->code}}" data-panel="#listItemsTranslatesPanel">
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title_{{$lang->id}}" class="form-control dash-input" autocomplete="off" value="@if($record->translate($lang->id)){{$record->translate($lang->id)->title}}@endif" />
            </div>
        </div>
        @endforeach
    </div>

    @if($mode == 'edit')
    <input type="hidden" name="id" value="{{$record->id}}" />
    @endif

    <input type="hidden" name="list_id" value="{{$record->list_id}}" />

    <div class="text-center dash-form-bottom">
        <span class="dash-btn" data-dismiss="modal">Cancel</span>
        <button class="ml-3 dash-btn blue-btn">Save</button>
    </div>
</form>
