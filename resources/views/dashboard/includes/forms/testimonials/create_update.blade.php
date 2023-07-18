<form class="dash-form ajax-form" id="{{$model}}Form" method="post" action="/dashboard/{{$model}}/save">
    @csrf

    <div class="dash-tabs-panel" id="testimonialTranslatesPanel">
        <div class="dash-tabs-heading pb-4 text-center">
            @foreach($langs as $key=>$lang)
                <span class="dash-tab-btn dash-btn @if($key == 0)active @endif" data-tab="#testimonialTranslatesTab_{{$lang->code}}" data-panel="#testimonialTranslatesPanel">{{$lang->code}}</span>
            @endforeach
        </div>
        @foreach($langs as $key=>$lang)
        <div class="dash-tab @if($key == 0)active-tab @endif" id="testimonialTranslatesTab_{{$lang->code}}" data-panel="#testimonialTranslatesPanel">
            <div class="form-group">
                <label>Author</label>
                <input type="text" name="author_{{$lang->id}}" class="form-control dash-input" autocomplete="off" value="@if($record->translate($lang->id)){{$record->translate($lang->id)->author}}@endif" />
            </div>
            <div class="form-group mt-3">
                <label>Text</label>
                <textarea name="text_{{$lang->id}}" class="form-control dash-input" autocomplete="off" rows="5">@if($record->translate($lang->id)){{$record->translate($lang->id)->text}}@endif</textarea>
            </div>
        </div>
        @endforeach
    </div>

    <div class="row mt-4">
        <div class="col-4">
            <div class="form-group">
                <label>Active</label>
                <div class="dash-checkbox-toggle float-right @if($record->status){{'checked'}}@endif">
                    <div class="dash-checkbox-toggle-track">
                        <span class="dash-checkbox-toggle-thumb">||</span>
                    </div>
                    <input type="checkbox" name="status" class="form-control dash-input" value="1" @if($record->status){{'checked'}}@endif />
                </div>
            </div>
        </div>
    </div>

    @if($mode == 'edit')
    <input type="hidden" name="id" value="{{$record->id}}" />
    @endif

    <div class="text-center dash-form-bottom">
        <span class="dash-btn" data-dismiss="modal">Cancel</span>
        <button class="ml-3 dash-btn blue-btn">Save</button>
    </div>
</form>
