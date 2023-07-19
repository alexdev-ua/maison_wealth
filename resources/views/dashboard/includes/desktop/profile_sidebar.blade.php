<div class="dash-profile-sidebar" id="profileSidebar">
    <p class="dash-sidebar-title">My profile <button class="dash-btn blue-btn profile-sidebar-btn dash-close-sidebar-btn"><i class="fas fa-times"></i></button></p>
    <hr>
    <form method="post" action="{{route('dashboard.profile-save')}}" id="profileForm">
        @csrf
        <div class="dash-profile-photo-container">
            <div class="dash-profile-photo @if(!Auth::guard('admin')->user()->avatar)empty-photo @endif">
                <img src="{{Auth::guard('admin')->user()->avatar()}}" />
                <span class="dash-btn dash-profile-photo-btn mt-4">Change</span>
            </div>

        </div>

        <div class="form-group mt-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control dash-input" autocomplete="off" value="{{Auth::guard('admin')->user()->name}}" />
        </div>

        <div class="form-group mt-3">
            <label>New password</label>
            <input type="text" name="password" class="form-control dash-input" autocomplete="off" value="" placeholder="Type for change" />
        </div>

        <div class="text-center mt-5">
            <button class="dash-btn blue-btn dash-large-btn">Save</button>
        </div>
    </form>

    <input type="file" style="display:none;" accept="image/*" id="profileAvatar" />
    <canvas id="avatarCanvas" style="display:none;"></canvas>
</div>
