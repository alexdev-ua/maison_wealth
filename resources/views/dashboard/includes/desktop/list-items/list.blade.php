@foreach($records as $record)
<div class="dash-table-row row" data-id="{{$record->id}}">
    <div class="dash-table-column title-column col-10 pt-4">{{$record->translate($dashLang)->title}}</div>
    <div class="dash-table-column options-column col-2">
        <span class="dash-table-option-btn dash-btn blue-btn dash-control-btn" data-mode="edit"><i class="fas fa-pencil-alt"></i></span>
        <span class="dash-table-option-btn dash-btn orange-btn dash-control-btn" data-mode="delete"><i class="fas fa-trash-alt"></i></span>
    </div>
</div>
@endforeach
