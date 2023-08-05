<form class="dash-form ajax-form" id="{{$model}}Form" method="post" action="/dashboard/{{$model}}/save">
    @csrf
    <p><b>{{'@'.$record->key}}</b> ({{$availablePages[$record->key]}})</p>
    <div class="dash-tabs-panel" id="metaTranslatesPanel">
        <div class="dash-tabs-heading pb-4 text-center">
            @foreach($langs as $key=>$lang)
                <span class="dash-tab-btn dash-btn @if($key == 0)active @endif" data-tab="#metaTranslatesTab_{{$lang->code}}" data-panel="#metaTranslatesPanel">{{$lang->code}}</span>
            @endforeach
        </div>
        @foreach($langs as $key=>$lang)
        <div class="dash-tab @if($key == 0)active-tab @endif" id="metaTranslatesTab_{{$lang->code}}" data-panel="#metaTranslatesPanel">
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title_{{$lang->id}}" class="form-control dash-input" autocomplete="off" value="@if($record->meta($lang->id)){{$record->meta($lang->id)->title}}@endif" />
            </div>
            <p class="mt-3 text-center"><b>Meta Tags</b></p>
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="meta_title_{{$lang->id}}" class="form-control dash-input" autocomplete="off" value="@if($record->meta($lang->id)){{$record->meta($lang->id)->meta_title}}@endif" />
            </div>
            <div class="form-group mt-3">
                <label>Description</label>
                <input type="text" name="meta_description_{{$lang->id}}" class="form-control dash-input" autocomplete="off" value="@if($record->meta($lang->id)){{$record->meta($lang->id)->meta_description}}@endif" />
            </div>
            <div class="form-group mt-3">
                <label>Keywords</label>
                <input type="text" name="meta_keywords_{{$lang->id}}" class="form-control dash-input" autocomplete="off" value="@if($record->meta($lang->id)){{$record->meta($lang->id)->meta_keywords}}@endif" />
            </div>
        </div>
        @endforeach
    </div>

    @if($mode == 'edit')
    <input type="hidden" name="id" value="{{$record->id}}" />
    @endif

    <div class="text-center dash-form-bottom">
        <span class="dash-btn" data-dismiss="modal">Cancel</span>
        <button class="ml-3 dash-btn blue-btn">Save</button>
    </div>
</form>
