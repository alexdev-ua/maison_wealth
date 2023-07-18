@foreach($records as $record)
<div class="dash-table-row row" data-id="{{$record->id}}">
    <div class="dash-table-column status-column text-center col-1 pr-0">
        @if($record->isPublished())
            <span class="dash-status status-active">
                <i class="far fa-check-circle"></i>
            </span>
        @elseif($record->isDisabled())
            <span class="dash-status status-inactive">
                <i class="far fa-times-circle"></i>
            </span>
        @elseif($record->isDraft())
        <span class="dash-status">
            <i class="far fa-clock"></i>
        </span>
        @endif
    </div>
    <div class="dash-table-column title-column col-5 pt-4">
        {{$record->translate($dashLang)->title}}
    </div>
    <div class="dash-table-column country-column col-4 pt-4">
        {{$record->country($dashLang)}}
    </div>

    <div class="dash-table-column options-column col-2">
        <a href="/dashboard/directions/edit?id={{$record->id}}" class="dash-table-option-btn dash-btn blue-btn"><i class="fas fa-pencil-alt"></i></a>
        <button class="dash-table-option-btn dash-btn orange-btn dash-control-btn" data-mode="delete"><i class="fas fa-trash-alt"></i></button>
    </div>
</div>
@endforeach
