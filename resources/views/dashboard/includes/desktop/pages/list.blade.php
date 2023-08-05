@foreach($data['availablePages'] as $key=>$description)
<div class="dash-table-row row" data-id="{{$key}}">
    <div class="dash-table-column key-column col-3 pt-4">{{$key}}</div>
    <div class="dash-table-column description-column col-6 pt-4">{{$description}}</div>
    <div class="dash-table-column meta-column text-center col-1 pt-4">
        @php
            $metaCheck = false
        @endphp

        @foreach($records as $record)
            @if($record->key == $key)
                @if($record->meta()->count())
                    @php
                        $metaCheck = true
                    @endphp
                @endif
            @php
                continue
            @endphp
            @endif
        @endforeach

        @if($metaCheck)
        <span class="dash-status status-active">
            <i class="far fa-check-circle"></i>
        </span>
        @else
        <span class="dash-status status-inactive">
            <i class="far fa-times-circle"></i>
        </span>
        @endif
    </div>
    <div class="dash-table-column options-column col-2">
        <button class="dash-table-option-btn dash-btn blue-btn dash-control-btn" data-mode="edit"><i class="fas fa-pencil-alt"></i></button>
    </div>
</div>
@endforeach
