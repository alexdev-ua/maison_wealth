<div class="pop-up" id="notFoundConsultPopup">
    <div class="wraper">
        <div class="pop-up-header">
            <button class="close-pop-up-btn pop-up-btn" data-pop-up="#notFoundConsultPopup"><img src="/images/ic_arrow_right_white.svg"> Back to Another Projects</button>
        </div>
        <div class="pop-up-content">
            <div class="row">
                <div class="col-6 offset-6">
                    <form class="custom-form" method="POST" action="{{route('send-request')}}" id="notFoundConsultationForm">
                        <p class="custom-form-text mb-0">We haven't found the right facility<br>But we certainly have something to offer you</p>
                        <p class="pop-up-heading mb-0 red-text">Let’s get a personal expert consultation</p>
                        <div class="row mt-2 pt-3">
                            <div class="col-6">
                                <div class="form-group">
                                    <span class="custom-label">First Name *</span>
                                    <input type="text" name="first_name" class="custom-input form-control" autocomplete="off" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <span class="custom-label">Last Name *</span>
                                    <input type="text" name="last_name" class="custom-input form-control" autocomplete="off" />
                                </div>
                            </div>
                            <div class="col-6 mt-2">
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
                            <div class="col-12">
                                <div class="form-group">
                                    <input type="checkbox" name="has_whatsapp" value="1" class="custom-input mr-2" /><span class="custom-label">I have a WhatsApp account registered to this phone number</span>
                                </div>
                            </div>
                            <input type="hidden" name="type" value="consultation" />
                            <div class="col-3 mt-2">
                                <button class="main-btn red-btn inverted-btn submit-btn">Send <span class="btn-icon"></span></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
