<div class="sidebar @if($showSidebar)opened @endif" id="menuSidebar">
    <div class="links-list">
        <a href="{{route('dashboard')}}" class="link-item @if($data['page'] == 'home')active-link @endif">
            <span class="link-icon"><i class="fas fa-tachometer-alt"></i></span>
            <span class="link-title">Dashboard</span>
        </a>
        <a href="{{route('dashboard')}}/properties" class="link-item @if($data['page'] == 'properties')active-link @endif">
            <span class="link-icon"><i class="fas fa-city"></i></span>
            <span class="link-title">Properties</span>
        </a>
        <a href="{{route('dashboard')}}/directions" class="link-item @if($data['page'] == 'directions')active-link @endif">
            <span class="link-icon"><i class="fas fa-map-marked-alt"></i></span>
            <span class="link-title">Directions</span>
        </a>
        <a href="{{route('dashboard')}}/countries" class="link-item @if($data['page'] == 'countries')active-link @endif">
            <span class="link-icon"><i class="fas fa-globe-europe"></i></span>
            <span class="link-title">Countries</span>
        </a>
        <a href="{{route('dashboard')}}/articles" class="link-item @if($data['page'] == 'articles')active-link @endif">
            <span class="link-icon"><i class="fas fa-pager"></i></span>
            <span class="link-title">Articles</span>
        </a>
        <a href="{{route('dashboard')}}/media" class="link-item @if($data['page'] == 'media')active-link @endif">
            <span class="link-icon"><i class="fas fa-images"></i></span>
            <span class="link-title">Gallery</span>
        </a>
        <a href="{{route('dashboard')}}/langs" class="link-item @if($data['page'] == 'langs')active-link @endif">
            <span class="link-icon"><i class="fas fa-language"></i></span>
            <span class="link-title">Languages</span>
        </a>

        <a href="{{route('dashboard')}}/requests" class="link-item @if($data['page'] == 'requests')active-link @endif">
            <span class="link-icon"><i class="fas fa-envelope-open-text"></i></span>
            <span class="link-title">Requests</span>
        </a>
        <a href="{{route('dashboard')}}/testimonials" class="link-item @if($data['page'] == 'testimonials')active-link @endif">
            <span class="link-icon"><i class="far fa-comments"></i></span>
            <span class="link-title">Testimonials</span>
        </a>
        <!--<a class="link-item">
            <span class="link-icon"><i class="fas fa-file-invoice"></i></span>
            <span class="link-title">Pages&SEO</span>
        </a>
        <a class="link-item">
            <span class="link-icon"><i class="fas fa-user-shield"></i></span>
            <span class="link-title">Managers</span>
        </a>-->
    </div>

    <button class="dash-btn dash-toggle-sidebar-btn"><i class="fas fa-indent"></i></button>
</div>
