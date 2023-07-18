@foreach($records as $record)
<div class="col-4 p-3 dash-table-row-container">
    <div class="dash-related-item dash-table-row pb-3" data-id="{{$record->id}}">
        <span class="dash-label">Title</span>
        <div class="dash-related-item-title">{{$record->translate($dashLang)->title}}</div>
        <span class="dash-label mt-2">Description</span>
        <div class="dash-related-item-description">{{$record->translate($dashLang)->description}}</div>
        <div class="mt-3 text-right pt-4 border-top">
            <span class="dash-btn related-item-control-btn dash-control-btn blue-btn" data-mode="edit"><i class="fas fa-pencil-alt"></i></span>
            <span class="dash-btn related-item-control-btn dash-control-btn orange-btn" data-mode="delete"><i class="fas fa-trash-alt"></i></span>
        </div>
    </div>
</div>
@endforeach
