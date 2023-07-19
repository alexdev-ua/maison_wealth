<form class="dash-form ajax-form p-3" id="{{$model}}Form" method="post" action="/dashboard/{{$model}}/save">
    @csrf

    <div class="dash-tabs-panel" id="mainPanel">
        <div class="dash-tabs-heading pb-4 border-bottom">
            <div class="dash-table-heading">
                <span class="dash-table-title">Article @if($record->id){{'#'.$record->id}}@endif</span>
                <div class="float-right">
                    <span class="dash-tab-btn dash-btn active" data-tab="#generalTab" data-panel="#mainPanel"><i class="fas fa-exclamation mr-2"></i> General information</span>
                    <span class="dash-tab-btn dash-btn" data-tab="#pageTab" data-panel="#mainPanel"><i class="far fa-file-alt mr-2"></i> Page settings</span>
                </div>
            </div>
        </div>

        <div class="dash-tab p-2 active-tab" id="generalTab" data-panel="#mainPanel">
            <div class="form-group mt-3 row">
                <div class="col-3">
                    <label>Published</label>

                    <div class="dash-checkbox-toggle float-right @if($record->isPublished()){{'checked'}}@endif">
                        <div class="dash-checkbox-toggle-track">
                            <span class="dash-checkbox-toggle-thumb">||</span>
                        </div>
                        <input type="checkbox" name="status" class="form-control dash-input" value="1" @if($record->isPublished()){{'checked'}}@endif />
                    </div>
                </div>
                <div class="col-1 text-right offset-1 pt-2">
                    <label>URL</label>
                </div>
                <div class="col-7">
                    <div class="input-group">
                        <div class="input-group-append">
                            <span class="input-group-text">{{route('home')}}/blog/</span>
                        </div>
                        <input type="text" name="url" class="form-control dash-input" autocomplete="off" value="{{$record->url}}" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-5">
                    <label>Banner photo</label>
                    <div class="photo-container">
                        <div class="photo-content">
                            @if($record->bannerImage())
                            <img src="{{$record->bannerImage()}}" />
                            <span class="dash-btn blue-btn select-photo-btn dash-control-btn" data-photo-name="page_banner_id" data-model="media" data-mode="select-photo">Change photo</span>
                            @else
                            <div class="empty-photo">
                                <i class="fas fa-camera"></i>
                                <span class="dash-btn select-photo-btn dash-control-btn" data-photo-name="page_banner_id" data-model="media" data-mode="select-photo">Add photo</span>
                            </div>
                            @endif
                        </div>
                        <input type="hidden" name="page_banner_id" class="active-photo-input" value="{{$record->page_banner_id}}" />
                    </div>
                </div>
                <div class="col-7">
                    <div class="dash-tabs-panel mt-4" id="generalTranslatesPanel">
                        <div class="dash-tabs-heading pb-4 text-center">
                            @foreach($langs as $key=>$lang)
                                <span class="dash-tab-btn dash-btn @if($key == 0)active @endif" data-tab="#generalTranslateTab_{{$lang->code}}" data-panel="#generalTranslatesPanel">{{$lang->code}}</span>
                            @endforeach
                        </div>
                        @foreach($langs as $key=>$lang)
                        <div class="dash-tab @if($key == 0)active-tab @endif" id="generalTranslateTab_{{$lang->code}}" data-panel="#generalTranslatesPanel">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="title_{{$lang->id}}" class="form-control dash-input" autocomplete="off" value="@if($record->translate($lang->id)){{$record->translate($lang->id)->title}}@endif" />
                            </div>
                            <div class="form-group mt-3">
                                <label>Description</label>
                                <input type="text" name="description_{{$lang->id}}" class="form-control dash-input" autocomplete="off" value="@if($record->translate($lang->id)){{$record->translate($lang->id)->description}}@endif" />
                            </div>

                        </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>

        <div class="dash-tab p-2" id="pageTab" data-panel="#mainPanel">
            <div class="dash-tabs-panel mt-3" id="pageTranslatesPanel">
                <div class="dash-tabs-heading pt-4 pb-3 text-center">
                    @foreach($langs as $key=>$lang)
                        <span class="dash-tab-btn dash-btn @if($key == 0)active @endif" data-tab="#pageTranslateTab_{{$lang->code}}" data-panel="#pageTranslatesPanel">{{$lang->code}}</span>
                    @endforeach
                </div>
                @foreach($langs as $key=>$lang)
                <div class="dash-tab @if($key == 0)active-tab @endif" id="pageTranslateTab_{{$lang->code}}" data-panel="#pageTranslatesPanel">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="page_title_{{$lang->id}}" class="form-control dash-input" autocomplete="off" value="@if($record->translate($lang->id)){{$record->translate($lang->id)->page_title}}@endif" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Description</label>
                                <input type="text" name="page_description_{{$lang->id}}" class="form-control dash-input" autocomplete="off" value="@if($record->translate($lang->id)){{$record->translate($lang->id)->page_description}}@endif" />
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label>Options title</label>
                                <input type="text" name="page_options_title_{{$lang->id}}" class="form-control dash-input" autocomplete="off" value="@if($record->translate($lang->id)){{$record->translate($lang->id)->page_options_title}}@endif" />
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="dash-table dash-model-related-content" data-model="article-options">
                <div class="dash-related-content-heading">
                    <span class="dash-related-content-title">Options</span>
                    <span class="dash-btn related-item-control-btn float-right dash-control-btn blue-btn" data-parent-id="{{$record->id}}" data-mode="add">Add option</span>
                </div>
                <div class="dash-table-body dash-related-items row">
                    @php
                        $records = $record->options
                    @endphp
                    @include('dashboard.includes.desktop.article-options.list')
                </div>
            </div>

            <div class="dash-table dash-model-related-content" data-model="article-screens">
                <div class="dash-related-content-heading">
                    <span class="dash-related-content-title">Screens</span>
                    <span class="dash-btn related-item-control-btn float-right dash-control-btn blue-btn" data-parent-id="{{$record->id}}" data-mode="add">Add screen</span>
                </div>
                <div class="dash-table-body dash-related-items row">
                    @php
                        $records = $record->screens
                    @endphp
                    @include('dashboard.includes.desktop.article-screens.list')
                </div>
            </div>

        </div>

    </div>

    <input type="hidden" name="id" value="{{$record->id}}" />

    <div class="text-center dash-form-bottom mt-5">
        <button class="ml-3 dash-btn blue-btn dash-large-btn">Save changes</button>
    </div>
</form>
