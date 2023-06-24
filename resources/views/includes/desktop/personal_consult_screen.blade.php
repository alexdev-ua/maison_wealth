<div class="page-screen gray-bg personal-consultation-screen" id="personalConsultScreen">
    <div class="row">
        <div class="col-6 animated-block slide-from-bottom">
            <div class="page-block-content gray-bg top-padding">
                <p class="page-screen-heading mb-2"><span class="gray-text">Start investing</span> correctly, without unnecessary risks and with the greatest benefit, <span class="gray-text">think it over and we will be there for you.</span></p>
            </div>
        </div>
        <div class="col-6 pl-0 animated-block slide-from-top white-bg">
            <div class="form-container">
                <div class="form-heading black-heading top-padding">Get a personal expert<br>consultation</div>
                <div class="form-content">
                    <form class="custom-form" method="POST" action="{{route('send-request')}}" id="consultationForm">
                        <div class="row">
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
                            <div class="col-6 mt-3">
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
                            <div class="col-3 mt-4 pt-2">
                                <button class="main-btn black-btn inverted-btn submit-btn">Send <span class="btn-icon"></span></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
