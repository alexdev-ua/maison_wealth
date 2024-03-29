<header @if($activePage == 'properties' || $activePage == 'article-view'){{'class=red-header'}}@endif>
    <div class="wraper">
        <div class="row m-0">
            <div class="col-6 pl-0">
                <div class="border-top">
                    <a href="{{route('home')}}" class="main-logo">
                        @if($activePage == 'properties' || $activePage == 'article-view')
                        <img src="/images/ic_logo_red.svg" />
                        @else
                        <img src="/images/ic_logo_light.svg" />
                        @endif
                    </a>
                </div>
            </div>
            <div class="col-6 pr-0">
                <div class="main-menu border-top">
                    <a href="{{route('properties')}}/all" class="main-menu-link">Properties</a>
                    <a href="{{route('countries')}}" class="main-menu-link">Countries</a>
                    <a href="{{route('about')}}" class="main-menu-link">About us</a>
                    <a href="{{route('blog')}}" class="main-menu-link">Blog</a>
                </div>
            </div>
        </div>
    </div>
</header>
