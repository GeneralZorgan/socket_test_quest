<div class="tab-content border-t-0" id="myTabContent">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        @include('front.auth.parts.login')
    </div>
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        @include('front.auth.parts.register')
    </div>
</div>
