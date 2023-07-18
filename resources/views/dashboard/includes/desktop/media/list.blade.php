@foreach($records as $record)
    <div class="dash-table-column dash-media-item col-3" data-id="{{$record->id}}">
        <img src="{{$record->filename()}}" class="dash-media-preview" />

        <button class="dash-table-option-btn dash-btn blue-btn dash-control-btn" data-mode="view"><i class="fas fa-eye"></i></button>
        @if($record->canDelete())
        <button class="dash-table-option-btn dash-btn orange-btn dash-control-btn" data-mode="delete"><i class="fas fa-trash-alt"></i></button>
        @endif
    </div>
@endforeach
