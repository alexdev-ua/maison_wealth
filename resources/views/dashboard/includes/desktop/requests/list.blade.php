@if(count($records))
    @foreach($records as $record)
    <div class="dash-table-row row" data-id="{{$record->id}}">
        <div class="dash-table-column id-column col-1 pt-4">
            {{$record->id}}
        </div>
        <div class="dash-table-column date-column col-2 pt-4">
            {{$record->date()}}
        </div>
        <div class="dash-table-column name-column col-2 pt-4">
            {{$record->fullName()}}
        </div>
        <div class="dash-table-column email-column col-3 pt-4">
            {{$record->email}}
        </div>
        <div class="dash-table-column phone-column col-2 pt-4">
            {{$record->phone}}
        </div>
        <div class="dash-table-column phone-column text-center col-1">
            @if($record->has_whatsapp)
            <span title="Client has WhtatsApp on this phone number" class="dash-status status-active"><i class="far fa-check-circle"></i></span>
            @endif
        </div>

        <div class="dash-table-column options-column col-1">
            <button class="dash-table-option-btn dash-btn blue-btn dash-control-btn" data-mode="view"><i class="fas fa-eye"></i></button>
        </div>
    </div>
    @endforeach
@else
<div class="dash-empty-block">
    We don't receive any request yet
</div>
@endif
