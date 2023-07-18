<div class="dash-view-container">
    <span class="dash-label">{{$record->date()}}</span>

    <p class="dash-title-field">Request from {{$record->type}} form #{{$record->id}}</p>
    <hr>

    <span class="dash-label">Full name</span>
    <p class="dash-field">{{$record->fullName()}}</p>

    @if($record->email)
    <span class="dash-label">Email</span>
    <p class="dash-field">{{$record->email}}</p>
    @endif

    <span class="dash-label">Phone</span>
    <p class="dash-field">{{$record->phone}}
        @if($record->has_whatsapp)
            <span title="Client has WhtatsApp on this phone number" class="dash-status status-active ml-3"><i class="far fa-check-circle"></i></span>
        @endif
    </p>

    @if($record->message)
    <span class="dash-label">Message</span>
    <p class="dash-field">{{$record->message}}</p>
    @endif
</div>
