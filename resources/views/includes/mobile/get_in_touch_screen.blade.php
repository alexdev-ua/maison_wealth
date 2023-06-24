<div class="page-screen auto-height">
    <div class="animated-block slide-from-bottom white-bg top-padding">
        <div class="wraper">
            <div class="get-in-touch-block">
                <p class="page-screen-heading text-center mb-4">Get In Touch</p>
                <form class="custom-form mt-5" method="POST" action="{{route('send-request')}}" id="contactForm">
                    <p class="custom-form-text mb-0">Have any question or feedback, feel free to reach out to us. We are always available to help.</p>

                    <div class="mt-5 row">
                        <div class="col-6 pr-0">
                            <a href="" class="custom-link">Be our <u>client</u> <img src="/images/ic_arrow_right_white.svg" /></a>
                        </div>
                        <div class="col-6 pl-0 text-right">
                            <a href="" class="custom-link">Be our <u>partner</u> <img src="/images/ic_arrow_right_white.svg" /></a>
                        </div>
                    </div>

                    <p class="custom-form-text mt-5">Your information will be kept private and confidential and will be used by Maison Wealth only. Fields marked * must be completed before submitting.</p>

                    <div class="mt-5">
                        <div class="form-group">
                            <span class="custom-label">First Name *</span>
                            <input type="text" name="first_name" class="custom-input form-control" placeholder="First Name" autocomplete="off" />
                        </div>
                        <div class="form-group mt-4">
                            <span class="custom-label">Last Name *</span>
                            <input type="text" name="last_name" class="custom-input form-control" placeholder="Last Name" autocomplete="off" />
                        </div>
                        <div class="form-group mt-4">
                            <span class="custom-label">Phone Number *</span>
                            <div class="phone-block">
                                <div>
                                    <select name="phone_code" class="selectpicker form-control phone-code-select" data-none-selected-text=" " data-live-search="true">
                                        @foreach($countries as $country)
                                        <option value="+{{$country['phone_code']}}" data-content='<img src="/images/flags/{{$country["code"]}}.png" height="25" style="margin-right: 10px;" /> <span class="country-label">{!!$country["name"]!!}</span> <span class="phone-code-label"><span>(</span>+{{$country['phone_code']}}<span>)</span></span>' @if($country['phone_code'] == '1'){{'selected'}}@endif></option>
                                        @endforeach
                                    </select>
                                </div>
                                <div style="flex: auto;">
                                    <input name="phone" type="number" inputmode="numeric" pattern="\d*" value="" class="form-control custom-input text-left" autocomplete="off" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-4">
                            <span class="custom-label">Email *</span>
                            <input type="email" name="email" class="custom-input form-control" placeholder="Email address" autocomplete="off" />
                        </div>
                        <div class="form-group mt-4">
                            <span class="custom-label">Message</span>
                            <textarea name="message" class="custom-input mr-2" rows="3" placeholder="Start here..."></textarea>
                        </div>
                    </div>
                    <input type="hidden" name="type" value="contact" />
                    <div class="row mt-5">
                        <div class="col-6 offset-3 mt-4">
                            <button class="main-btn red-btn inverted-btn submit-btn">Send <span class="btn-icon"></span></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
