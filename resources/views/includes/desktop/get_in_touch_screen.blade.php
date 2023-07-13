<div class="page-screen auto-height" id="getInTouchScreen">
    <div class="pt-4 animated-block slide-from-bottom white-bg">
        <div class="wraper top-padding">
            <div class="get-in-touch-block">
                <div class="row">
                    <div class="col-6">
                        <p class="page-screen-heading">Get In Touch</p>
                    </div>
                    <div class="col-6">
                        <form class="custom-form" method="POST" action="{{route('send-request')}}" id="contactForm">
                            <p class="custom-form-text mb-0">If you have any questions or feedback, feel free to contact us. We are always available to help.</p>

                            <div class="mt-4">
                                <a href="" class="custom-link">Be our <u>client</u> <img src="/images/ic_arrow_right_white.svg" /></a>
                                <a href="" class="custom-link ml-5">Be our <u>partner</u> <img src="/images/ic_arrow_right_white.svg" /></a>
                            </div>

                            <p class="custom-form-text mt-5">We will keep your information confidential and used only by Maison Wealth.</p>

                            <div class="row mt-3">
                                <div class="col-6">
                                    <div class="form-group">
                                        <span class="custom-label">First Name *</span>
                                        <input type="text" name="first_name" class="custom-input form-control" placeholder="First Name" autocomplete="off" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <span class="custom-label">Last Name *</span>
                                        <input type="text" name="last_name" class="custom-input form-control" placeholder="Last Name" autocomplete="off" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
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
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <span class="custom-label">Email *</span>
                                        <input type="email" name="email" class="custom-input form-control" placeholder="Email address" autocomplete="off" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <span class="custom-label">Message</span>
                                        <textarea name="message" class="custom-input mr-2" rows="3" placeholder="Start here..."></textarea>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="type" value="contact" />
                            <div class="row mt-3">
                                <div class="col-3 mt-4 pt-2">
                                    <button class="main-btn red-btn inverted-btn submit-btn">Send <span class="btn-icon"></span></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
