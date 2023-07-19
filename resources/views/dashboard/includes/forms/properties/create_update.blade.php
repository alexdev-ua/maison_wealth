<form class="dash-form ajax-form p-3" id="{{$model}}Form" method="post" action="/dashboard/{{$model}}/save">
    @csrf

    <div class="dash-tabs-panel" id="mainPanel">
        <div class="dash-tabs-heading pb-4 border-bottom">
            <div class="dash-table-heading">
                <span class="dash-table-title">Property @if($record->id){{'#'.$record->id}}@endif</span>
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
                <div class="col-3 offset-6">
                    <label>Show on main page</label>

                    <div class="dash-checkbox-toggle float-right @if($record->on_main){{'checked'}}@endif">
                        <div class="dash-checkbox-toggle-track">
                            <span class="dash-checkbox-toggle-thumb">||</span>
                        </div>
                        <input type="checkbox" name="on_main" class="form-control dash-input" value="1" @if($record->on_main){{'checked'}}@endif />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-5">
                    <label>Preview photo</label>
                    <div class="photo-container">
                        <div class="photo-content">
                            @if($record->previewImage())
                            <img src="{{$record->previewImage()}}" />
                            <span class="dash-btn blue-btn select-photo-btn dash-control-btn" data-photo-name="preview_image_id" data-model="media" data-mode="select-photo">Change photo</span>
                            @else
                            <div class="empty-photo">
                                <i class="fas fa-camera"></i>
                                <span class="dash-btn select-photo-btn dash-control-btn" data-photo-name="preview_image_id" data-model="media" data-mode="select-photo">Add photo</span>
                            </div>
                            @endif
                        </div>
                        <input type="hidden" name="preview_image_id" class="active-photo-input" value="{{$record->preview_image_id}}" />
                    </div>
                </div>
                <div class="col-7">
                    <div class="form-group">
                        <label>Direction</label>
                        <select name="direction_id" class="form-control dash-input" autocomplete="off">
                            @foreach($directions as $direction)
                            <option value="{{$direction->id}}" @if($record->direction_id == $direction->id) selected @endif>{{$direction->country($dashLang).'('.$direction->translate($dashLang)->title.')'}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-3"><label>URL</label></div>
                    <div class="input-group">
                        <div class="input-group-append">
                            <span class="input-group-text">{{route('home')}}/property/</span>
                        </div>
                        <input type="text" name="url" class="form-control dash-input" autocomplete="off" value="{{$record->url}}" placeholder="Url name like a bentley-residences" />
                    </div>

                    <div class="form-group mt-4">
                        <div class="row">
                            <div class="col-6">
                                <label>For living</label>
                                <div class="dash-checkbox-toggle float-right @if($record->for_living){{'checked'}}@endif">
                                    <div class="dash-checkbox-toggle-track">
                                        <span class="dash-checkbox-toggle-thumb">||</span>
                                    </div>
                                    <input type="checkbox" name="for_living" class="form-control dash-input" value="1" @if($record->for_living){{'checked'}}@endif />
                                </div>
                            </div>
                            <div class="col-6">
                                <label>For resale</label>
                                <div class="dash-checkbox-toggle float-right @if($record->for_resale){{'checked'}}@endif">
                                    <div class="dash-checkbox-toggle-track">
                                        <span class="dash-checkbox-toggle-thumb">||</span>
                                    </div>
                                    <input type="checkbox" name="for_resale" class="form-control dash-input" value="1" @if($record->for_resale){{'checked'}}@endif />
                                </div>
                            </div>
                            <div class="col-6 mt-4">
                                <label>For long term rent</label>
                                <div class="dash-checkbox-toggle float-right @if($record->for_long_rent){{'checked'}}@endif">
                                    <div class="dash-checkbox-toggle-track">
                                        <span class="dash-checkbox-toggle-thumb">||</span>
                                    </div>
                                    <input type="checkbox" name="for_long_rent" class="form-control dash-input" value="1" @if($record->for_long_rent){{'checked'}}@endif />
                                </div>
                            </div>
                            <div class="col-6 mt-4">
                                <label>For daily rent</label>
                                <div class="dash-checkbox-toggle float-right @if($record->for_daily_rent){{'checked'}}@endif">
                                    <div class="dash-checkbox-toggle-track">
                                        <span class="dash-checkbox-toggle-thumb">||</span>
                                    </div>
                                    <input type="checkbox" name="for_daily_rent" class="form-control dash-input" value="1" @if($record->for_daily_rent){{'checked'}}@endif />
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row mt-3">
                <div class="col-4">
                    <div class="form-group">
                        <label>Price</label>
                        <input type="text" name="price" class="form-control dash-input" autocomplete="off" value="{{$record->price}}" />
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label>Square</label>
                        <input type="text" name="square" class="form-control dash-input" autocomplete="off" value="{{$record->square}}" />
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label>Price per square</label>
                        <input type="text" name="price_per_square" class="form-control dash-input" autocomplete="off" value="{{$record->price_per_square}}" />
                    </div>
                </div>
            </div>

            <div class="dash-tabs-panel mt-4 pt-4 border-top" id="generalTranslatesPanel">
                <div class="dash-tabs-heading pb-4 text-center">
                    @foreach($langs as $key=>$lang)
                        <span class="dash-tab-btn dash-btn @if($key == 0)active @endif" data-tab="#generalTranslateTab_{{$lang->code}}" data-panel="#generalTranslatesPanel">{{$lang->code}}</span>
                    @endforeach
                </div>
                @foreach($langs as $key=>$lang)
                <div class="dash-tab @if($key == 0)active-tab @endif" id="generalTranslateTab_{{$lang->code}}" data-panel="#generalTranslatesPanel">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="title_{{$lang->id}}" class="form-control dash-input" autocomplete="off" value="@if($record->translate($lang->id)){{$record->translate($lang->id)->title}}@endif" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Type</label>
                                <input type="text" name="type_{{$lang->id}}" class="form-control dash-input" autocomplete="off" value="@if($record->translate($lang->id)){{$record->translate($lang->id)->type}}@endif" placeholder="Like an Apartment" />
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Location</label>
                                <input type="text" name="location_full_{{$lang->id}}" class="form-control dash-input" autocomplete="off" value="@if($record->translate($lang->id)){{$record->translate($lang->id)->location_full}}@endif" placeholder="Full location like Miami, Sunny Isles Beach" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Payment plan</label>
                                <input type="text" name="payment_plan_{{$lang->id}}" class="form-control dash-input" autocomplete="off" value="@if($record->translate($lang->id)){{$record->translate($lang->id)->payment_plan}}@endif" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Completion date</label>
                                <input type="text" name="completion_date_{{$lang->id}}" class="form-control dash-input" autocomplete="off" value="@if($record->translate($lang->id)){{$record->translate($lang->id)->completion_date}}@endif" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Rent out</label>
                                <input type="text" name="rent_out_{{$lang->id}}" class="form-control dash-input" autocomplete="off" value="@if($record->translate($lang->id)){{$record->translate($lang->id)->rent_out}}@endif" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Buy out</label>
                                <input type="text" name="buy_out_{{$lang->id}}" class="form-control dash-input" autocomplete="off" value="@if($record->translate($lang->id)){{$record->translate($lang->id)->buy_out}}@endif" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Offer</label>
                                <input type="text" name="offer_{{$lang->id}}" class="form-control dash-input" autocomplete="off" value="@if($record->translate($lang->id)){{$record->translate($lang->id)->offer}}@endif" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Payback</label>
                                <input type="text" name="payback_{{$lang->id}}" class="form-control dash-input" autocomplete="off" value="@if($record->translate($lang->id)){{$record->translate($lang->id)->payback}}@endif" />
                            </div>
                        </div>
                    </div>

                </div>
                @endforeach
            </div>
        </div>

        <div class="dash-tab p-2" id="pageTab" data-panel="#mainPanel">
            <div class="row">
                <div class="col-6">
                    <div class="form-group mt-3">
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
                </div>
                <div class="col-6">
                    <div class="dash-tabs-panel mt-3" id="pageTranslatesPanel">
                        <div class="dash-tabs-heading pt-4 pb-3 text-center">
                            @foreach($langs as $key=>$lang)
                                <span class="dash-tab-btn dash-btn @if($key == 0)active @endif" data-tab="#pageTranslateTab_{{$lang->code}}" data-panel="#pageTranslatesPanel">{{$lang->code}}</span>
                            @endforeach
                        </div>
                        @foreach($langs as $key=>$lang)
                        <div class="dash-tab @if($key == 0)active-tab @endif" id="pageTranslateTab_{{$lang->code}}" data-panel="#pageTranslatesPanel">
                            <div class="form-group">
                                <label>Label</label>
                                <input type="text" name="page_label_{{$lang->id}}" class="form-control dash-input" autocomplete="off" value="@if($record->translate($lang->id)){{$record->translate($lang->id)->page_label}}@endif" />
                            </div>
                            <div class="form-group mt-3">
                                <label>Description</label>
                                <input type="text" name="page_description_{{$lang->id}}" class="form-control dash-input" autocomplete="off" value="@if($record->translate($lang->id)){{$record->translate($lang->id)->page_description}}@endif" />
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="dash-table dash-model-related-content" data-model="property-options">
                <div class="dash-related-content-heading">
                    <span class="dash-related-content-title">Options</span>
                    <span class="dash-btn related-item-control-btn float-right dash-control-btn blue-btn" data-parent-id="{{$record->id}}" data-mode="add">Add option</span>
                </div>
                <div class="dash-table-body dash-related-items row">
                    @php
                        $records = $record->options
                    @endphp
                    @include('dashboard.includes.desktop.property-options.list')
                </div>
            </div>

            <div class="dash-table dash-model-related-content" data-model="property-features">
                <div class="dash-related-content-heading">
                    <span class="dash-related-content-title">Features</span>
                    <span class="dash-btn related-item-control-btn float-right dash-control-btn blue-btn" data-parent-id="{{$record->id}}" data-mode="add">Add feature</span>
                </div>
                <div class="dash-table-body dash-related-items row">
                    @php
                        $records = $record->features
                    @endphp
                    @include('dashboard.includes.desktop.property-features.list')
                </div>
            </div>

        </div>

    </div>

    <input type="hidden" name="id" value="{{$record->id}}" />

    <div class="text-center dash-form-bottom mt-4">
        <button class="ml-3 dash-btn blue-btn dash-large-btn">Save changes</button>
    </div>
</form>
