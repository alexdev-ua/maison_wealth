@foreach($records as $record)
<div class="col-4 p-3 dash-table-row-container">
    <div class="dash-related-item dash-table-row pb-3" data-id="{{$record->id}}">
        @if($record->photo())
        <span class="dash-label">Photo</span>
        <div class="dash-related-item-photo">
            <img src="{{$record->photo()}}" />
        </div>
        @endif

        @if($record->translate($dashLang)->title)
        <span class="dash-label mt-2">Title</span>
        <div class="dash-related-item-title">{{$record->translate($dashLang)->title}}</div>
        @endif

        @if($record->translate($dashLang)->heading)
        <span class="dash-label mt-2">Heading</span>
        <div class="dash-related-item-heading">{{$record->translate($dashLang)->heading}}</div>
        @endif

        @if($record->translate($dashLang)->description)
        <span class="dash-label mt-2">Description</span>
        <div class="dash-related-item-description">{{$record->translate($dashLang)->description}}</div>
        @endif

        @if($record->list())
        <span class="dash-label mt-2">List</span>
        <ul class="dash-list">
            @foreach($record->list()->items as $key=>$listItem)
            <li class="dash-list-item">
                {{$listItem->translate($dashLang)->title}}
            </li>
            @endforeach
        </ul>
        @endif

        <div class="text-right mt-3 border-top pt-4">
            <span class="dash-btn related-item-control-btn dash-control-btn blue-btn" data-mode="edit"><i class="fas fa-pencil-alt"></i></span>
            <span class="dash-btn related-item-control-btn dash-control-btn orange-btn" data-mode="delete"><i class="fas fa-trash-alt"></i></span>
        </div>
    </div>
</div>
@endforeach
