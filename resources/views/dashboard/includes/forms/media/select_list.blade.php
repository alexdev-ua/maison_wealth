<div class="dash-select-photos-container row">
@foreach($records as $record)
    <div class="dash-table-column dash-media-item col-3" data-id="{{$record->id}}">
        <span class="dash-selected-label"><i class="fas fa-check"></i></span>
        <img src="{{$record->filename()}}" class="dash-media-preview" />
    </div>
@endforeach
</div>
<div class="dash-select-buttons">
    <input type="hidden" value="" id="selectedPhotoId" />
    <button class="dash-btn blue-btn dash-select-btn">Select photo</button>
</div>
