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
    <div class="dash-table-column status-column text-center col-1 pr-0">
        @if($record->on_main)
            <span class="dash-status status-active" title="Property will appear on Home page">
                <i class="far fa-check-circle"></i>
            </span>
        @else
            <span class="dash-status status-inactive" title="Property hidden on Home page">
                <i class="far fa-times-circle"></i>
            </span>
        @endif
    </div>
    <div class="dash-table-column title-column col-3 pt-4">
        {{$record->translate($dashLang)->title}}
    </div>
    <div class="dash-table-column direction-column col-2 pt-4">
        @if($record->getDirection())
        {{$record->getDirection()->country($dashLang)}}({{$record->direction($dashLang)}})
        @endif
    </div>
    <div class="dash-table-column for-column text-center col-4">
        <div class="row pt-3">
            <div class="col-3">
                @if($record->for_living)
                <span class="dash-status status-active">
                    <i class="far fa-check-circle"></i>
                </span>
                @else
                <span class="dash-status status-inactive">
                    <i class="far fa-times-circle"></i>
                </span>
                @endif
            </div>
            <div class="col-3">
                @if($record->for_resale)
                <span class="dash-status status-active">
                    <i class="far fa-check-circle"></i>
                </span>
                @else
                <span class="dash-status status-inactive">
                    <i class="far fa-times-circle"></i>
                </span>
                @endif
            </div>
            <div class="col-3">
                @if($record->for_long_rent)
                <span class="dash-status status-active">
                    <i class="far fa-check-circle"></i>
                </span>
                @else
                <span class="dash-status status-inactive">
                    <i class="far fa-times-circle"></i>
                </span>
                @endif
            </div>
            <div class="col-3">
                @if($record->for_daily_rent)
                <span class="dash-status status-active">
                    <i class="far fa-check-circle"></i>
                </span>
                @else
                <span class="dash-status status-inactive">
                    <i class="far fa-times-circle"></i>
                </span>
                @endif
            </div>
        </div>
    </div>

    <div class="dash-table-column options-column col-1 pl-0 pr-0 text-center">
        <a href="/dashboard/properties/edit?id={{$record->id}}" class="dash-table-option-btn dash-btn blue-btn"><i class="fas fa-pencil-alt"></i></a>
        <button class="dash-table-option-btn dash-btn orange-btn dash-control-btn" data-mode="delete"><i class="fas fa-trash-alt"></i></button>
    </div>
</div>
@endforeach
