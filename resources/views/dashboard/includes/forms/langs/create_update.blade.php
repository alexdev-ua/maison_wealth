<form class="dash-form ajax-form" id="{{$model}}Form" method="post" action="/dashboard/{{$model}}/save">
    @csrf
    <div class="form-group">
        <input type="text" name="code" placeholder="Code(en, ua, etc.)" class="form-control dash-input" autocomplete="off" value="{{$record->code}}" />
    </div>
    <div class="form-group mt-3">
        <input type="text" name="title" placeholder="Title" class="form-control dash-input mt-3" autocomplete="off" value="{{$record->title}}" />
    </div>
    
    <div class="row mt-4">
        <div class="col-4">
            <div class="form-group">
                <label>Active</label>
                <div class="dash-checkbox-toggle float-right @if($record->status){{'checked'}}@endif">
                    <div class="dash-checkbox-toggle-track">
                        <span class="dash-checkbox-toggle-thumb">||</span>
                    </div>
                    <input type="checkbox" name="status" class="form-control dash-input" value="1" @if($record->status){{'checked'}}@endif />
                </div>
            </div>
        </div>
    </div>

    @if($mode == 'edit')
    <input type="hidden" name="id" value="{{$record->id}}" />
    @endif

    <div class="text-center dash-form-bottom">
        <button class="dash-btn blue-btn">Save</button>
    </div>
</form>
