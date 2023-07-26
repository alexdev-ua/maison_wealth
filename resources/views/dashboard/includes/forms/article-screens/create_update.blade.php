<form class="dash-form ajax-form" id="{{$model}}Form" method="post" action="/dashboard/{{$model}}/save">
    @csrf

    <div class="form-group">
        <label>Photo</label>
        <div class="photo-container">
            <div class="photo-content">
                @if($record->photo())
                <img src="{{$record->photo()}}" />
                <span class="dash-btn blue-btn select-photo-btn dash-control-btn" data-photo-name="media_id" data-model="media" data-mode="select-photo">Change photo</span>
                @else
                <div class="empty-photo">
                    <i class="fas fa-camera"></i>
                    <span class="dash-btn select-photo-btn dash-control-btn" data-photo-name="media_id" data-model="media" data-mode="select-photo">Add photo</span>
                </div>
                @endif
            </div>
            <input type="hidden" name="media_id" class="active-photo-input form-control" value="{{$record->media_id}}" />
        </div>
    </div>


    <div class="row mt-4">
        <div class="col-6">
            <div class="form-group">
                <label>Image right align</label>
                <div class="dash-checkbox-toggle float-right @if($record->align == 'right'){{'checked'}}@endif">
                    <div class="dash-checkbox-toggle-track">
                        <span class="dash-checkbox-toggle-thumb">||</span>
                    </div>
                    <input type="checkbox" name="align" class="form-control dash-input" value="right" @if($record->align == 'right'){{'checked'}}@endif />
                </div>
            </div>
        </div>
    </div>

    <div class="dash-tabs-panel mt-3" id="featuresTranslatesPanel">
        <div class="dash-tabs-heading pb-4 text-center">
            @foreach($langs as $key=>$lang)
                <span class="dash-tab-btn dash-btn @if($key == 0)active @endif" data-tab="#featureTranslatesTab_{{$lang->code}}" data-panel="#featuresTranslatesPanel">{{$lang->code}}</span>
            @endforeach
        </div>
        @foreach($langs as $key=>$lang)
        <div class="dash-tab @if($key == 0)active-tab @endif" id="featureTranslatesTab_{{$lang->code}}" data-panel="#featuresTranslatesPanel">
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title_{{$lang->id}}" class="form-control dash-input" autocomplete="off" value="@if($record->translate($lang->id)){{$record->translate($lang->id)->title}}@endif" />
            </div>
            <div class="form-group mt-3">
                <label>Heading</label>
                <textarea name="heading_{{$lang->id}}" class="form-control dash-input" autocomplete="off" rows="3">@if($record->translate($lang->id)){{$record->translate($lang->id)->heading}}@endif</textarea>
            </div>
            <div class="form-group mt-3">
                <label>Description</label>
                <textarea name="description_{{$lang->id}}" class="form-control dash-input" autocomplete="off" rows="5">@if($record->translate($lang->id)){{$record->translate($lang->id)->description}}@endif</textarea>
            </div>
        </div>
        @endforeach
    </div>

    <div class="dash-table dash-list-table" data-model="list-items">
        <div class="dash-table-heading">
            <div class="dash-table-controls">
                <span class="dash-table-title">List</span>
                <span class="dash-table-btn dash-btn blue-btn dash-control-btn float-right" data-mode="add" data-parent-id="{{$record->list_id}}">New item</span>
            </div>
        </div>
        <div class="dash-table-body">
            @if($records = $record->list())
                @php
                    $records = $record->list()->items
                @endphp
                @include('dashboard.includes.desktop.list-items.list')
            @endif
        </div>
        <input type="hidden" name="list_id" value="{{$record->list_id}}" />
    </div>

    <input type="hidden" name="blog_article_id" value="{{$record->blog_article_id}}" />

    @if($mode == 'edit')
    <input type="hidden" name="id" value="{{$record->id}}" />
    @endif

    <div class="text-center dash-form-bottom">
        <span class="dash-btn" data-dismiss="modal">Cancel</span>
        <button class="ml-3 dash-btn blue-btn">Save</button>
    </div>
</form>
