@foreach($records as $record)
<div class="dash-table-row row" data-id="{{$record->id}}">
    <div class="dash-table-column status-column col-1 pr-0">
        @if($record->status)
        <span class="dash-status status-active">
            <i class="far fa-check-circle"></i>
        </span>
        @else
        <span class="dash-status status-inactive">
            <i class="far fa-times-circle"></i>
        </span>
        @endif
    </div>
    <div class="dash-table-column code-column col-2 pt-4">{{$record->code}}</div>
    <div class="dash-table-column title-column col-7 pt-4">{{$record->title}}</div>
    <div class="dash-table-column options-column col-2">
        <button class="dash-table-option-btn dash-btn blue-btn dash-control-btn" data-mode="edit"><i class="fas fa-pencil-alt"></i></button>
        <button class="dash-table-option-btn dash-btn orange-btn dash-control-btn" data-mode="delete"><i class="fas fa-trash-alt"></i></button>
    </div>
</div>
@endforeach
