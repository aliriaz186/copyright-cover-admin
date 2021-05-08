@extends('layouts.landing-app')
<!--====== LOGIN PART START ======-->
@section('content')
    <section class="login-area singup-area" style="margin-bottom: 100px">
{{--        <div class="login-bg">--}}
{{--            <div class="login-shape">--}}
{{--                <img src="{{url('')}}/assets/images/shapes/login-shape.png" alt="">--}}
{{--            </div>--}}
{{--        </div>--}}

        <form method="post" action="{{url("/register-user")}}">
            {{csrf_field()}}
            <div class="container">
                <div class="row login-title">
                    <div class="col-lg-6">
                        <div>
                            @if($errors->any())
                                <div class="alert alert-danger">
                                    <h4 style="color: black;font-size: 14px">{{$errors->first()}}</h4>
                                </div>
                            @endif
                            @if(\Illuminate\Support\Facades\Session::has('msg'))
                                <div class="alert alert-success" style="margin-bottom: 0px!important;">
                                    <h4 style="color: black">{{\Illuminate\Support\Facades\Session::get("msg")}}</h4>
                                </div>
                            @endif
                                <h2 style="text-align: center;color: #6b9ce8">OWNER REGISTRATION</h2>
                                <div style="margin: 0 auto;max-width: 100px">
                                    <div style="border-bottom: 3px solid #6b9ce8;width: 100px" >

                                    </div>
                                </div>

                            <p style="color: #6b9ce8;font-weight: bold;font-size: 23px!important;margin-top: 60px">ENTER YOUR
                                DETAILS</p>
                        </div>
                        <div class="login-form">
                            <div class="input-box mt-30">
                                <input type="text" placeholder="First Name*" name="firstName" required>
                            </div>
                            <div class="input-box mt-30">
                                <input type="text" placeholder="Last Name*" name="lastName" required>
                            </div>
                            <div class="input-box mt-30">
                                <input type="email" placeholder="Email Address*" name="emailAddress" required>
                            </div>
                            <div class="input-box mt-30">
                                <input type="text" placeholder="Company Name" name="companyName">
                            </div>
                        </div>
                    </div>
{{--                    <div class="col-lg-6">--}}
{{--                        <div class="login-form">--}}
{{--                            --}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="login-title" style="padding-top: 40px!important;">
                            <p style="color: #6b9ce8;font-weight: bold;font-size: 23px!important;">YOUR LOCATION</p>
                        </div>
                        <div class="login-form">
                            <div class="input-box mt-30">
                                <input type="text" placeholder="Address Line One*" name="addressLineOne" id="addressLineOne" required>
                            </div>
                            <div class="input-box mt-30">
                                <input type="text" placeholder="City*" name="city" id="city" required>
                            </div>
                            <div class="input-box mt-30">
                                <input type="text" placeholder="Postal Code*" id="zipcode" name="postalCode" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="login-form">
                            <div class="input-box mt-100">
                                <input type="text" placeholder="Address Line Two" name="addressLineTwo">
                            </div>
                            <div class="input-box mt-30">
                                <input type="text" placeholder="Country/Province*" name="country" id="state" required>
                            </div>
                            <div class="input-box mt-30">
                                <select id="selectCountry" name="selectCountry"
                                        style="width: 100%;border: solid 2px rgba(102, 102, 102, 0.12);border-radius: 5px;height: 45px;padding-left: 30px;background-color: white;">
                                    <option value="">Choose Country</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="login-title" style="padding-top: 40px!important;">
                            <p style="color: #6b9ce8;font-weight: bold;font-size: 23px!important;">GENERAL INFO</p>
                        </div>
                        <div class="login-form">
                            <div class="input-box mt-30">
                                <input type="text" placeholder="Telephone*" name="telephone" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="login-form">
                            <div class="input-box" style="margin-top: 98px!important;">
                                <select name="profession" required
                                        style="width: 100%;border: solid 2px rgba(102, 102, 102, 0.12);border-radius: 5px;height: 45px;padding-left: 30px;background-color: white;">
                                    <option value="">Please Choose Profession</option>
                                    <option value="Accountancy">Accountancy</option>
                                    <option value="Artist or Painter">Artist or Painter</option>
                                    <option value="Business Owner or Entrepreneur">Business Owner or Entrepreneur
                                    </option>
                                    <option value="Education or Training">Education or Training</option>
                                    <option value="Fashion Design">Fashion Design</option>
                                    <option value="Graphic Design">Graphic Design</option>
                                    <option value="Lawyer">Lawyer</option>
                                    <option value="Marketing or Advertising">Marketing or Advertising</option>
                                    <option value="Music or Songwriter">Music or Songwriter</option>
                                    <option value="Other">Other</option>
                                    <option value="Photography">Photography</option>
                                    <option value="Product Designer">Product Designer</option>
                                    <option value="Sculptor or 3D Design">Sculptor or 3D Design</option>
                                    <option value="Video, Film, or TV">Video, Film, or TV</option>
                                    <option value="Web Design">Web Design</option>
                                    <option value="Writer, Poet, or Author">Writer, Poet, or Author</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container mt-60 mb-60">
                <hr>
            </div>

            <div class="container">
                <div style="font-weight: bolder;font-size: 27px;color: #6b9ce8">ALL NEW ACCOUNTS RECEIVE 5 FREE
                    CERTIFICATE TOKENS
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="login-title" style="padding-top: 40px!important;">
                            <div>To purchase more enter the amount:</div>
                            <div style="font-size: 17px;font-weight: bold">Additional Certificate Tokens - £1
                                each
                            </div>
                        </div>
                        <div class="login-form">
                            <div class="input-box mt-30">
                                <select onchange="calculateCertificateToken(this.value)" name="certificateToken"
                                        style="width: 100%;border: solid 2px rgba(102, 102, 102, 0.12);border-radius: 5px;height: 45px;padding-left: 30px;background-color: white;">
                                    <option value="0">0</option>
                                    <option value="5">5</option>
                                    <option value="10">10</option>
                                    <option value="15">15</option>
                                    <option value="20">20</option>
                                    <option value="25">25</option>
                                    <option value="30">30</option>
                                    <option value="35">35</option>
                                    <option value="40">40</option>
                                    <option value="45">45</option>
                                    <option value="50">50</option>
                                    <option value="55">55</option>
                                    <option value="60">60</option>
                                    <option value="65">65</option>
                                    <option value="70">70</option>
                                    <option value="75">75</option>
                                    <option value="80">80</option>
                                    <option value="85">85</option>
                                    <option value="90">90</option>
                                    <option value="95">95</option>
                                    <option value="100">100</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="mt-60" style="font-weight: bolder;font-size: 27px;color: #6b9ce8">PAYMENT SUMMARY</div>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="login-title" style="padding-top: 40px!important;">
                            <div style="font-size: 15px;font-weight: bold">Subscription Annual Fee (1 year)</div>
                        </div>
                        <div class="login-title" style="padding-top: 40px!important;">
                            <div style="font-size: 15px;font-weight: bold">Extra Certificate Tokens</div>
                        </div>
{{--                        <div class="login-title" style="padding-top: 40px!important;">--}}
{{--                            <div style="font-size: 15px;font-weight: bold">Vat @ 20%</div>--}}
{{--                        </div>--}}
                        <div class="login-title" style="padding-top: 40px!important;">
                            <div style="font-size: 15px;font-weight: bold">Total Payable Now</div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="login-title" style="padding-top: 40px!important;">
                            <div style="font-size: 15px">£ 19.99</div>
                        </div>
                        <div class="login-title" style="padding-top: 40px!important;">
                            <div style="font-size: 15px">£ <span id="extraCertificateTokens">0</span>.00</div>
                        </div>
{{--                        <div class="login-title" style="padding-top: 40px!important;">--}}
{{--                            <div style="font-size: 15px">£ <span id="vat20%"></span></div>--}}
{{--                        </div>--}}
                        <div class="login-title" style="padding-top: 40px!important;">
                            <div style="font-size: 15px">£ <span id="totalPayableNow"></span></div>
                        </div>
                        <input type="hidden" name="totalAmount" id="totalAmount" value="19.99">
                        <input type="hidden" id="paymentMethod" name="paymentMethod" value="stripe">

                    </div>
                </div>
            </div>

            <div class="container" style=";margin-top: 50px;">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="login-title" style="padding-top: 20px!important;">
                            <p style="color: #6b9ce8;font-weight: bold;font-size: 23px!important;">PAYMENT OPTIONS</p>
                        </div>
                    </div>

                </div>
            </div>

            <div class="container" style="border: 5px solid #6b9ce8;margin-top: 5px;padding: 30px">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="login-title" style="padding-top: 20px!important;">
                            <p style="color: #6b9ce8;font-weight: bold;font-size: 23px!important;">1. ENTER YOUR CARD
                                DETAILS <span style="font-size: 12px">(Powered by Stripe)</span></p>
                        </div>
                        <div class="login-form">
                            <div class="input-box mt-30">
                                <input type="text" placeholder="Card Holder Name" name="cardHolderName">
                            </div>
                        </div>
                        <div class="login-form">
                            <div class="input-box mt-30">
                                <input type="text" placeholder="Card Number" name="cardNumber">
                            </div>
                        </div>
                        <div class="login-form">
                            <div class="input-box mt-30">
                                <input type="text" placeholder="CVV" name="cvv">
                            </div>
                        </div>
                        <div class="login-form">
                            <div class="row">
                                <div class="input-box mt-10 col-lg-6">
                                    <div>Expiry Month</div>
                                    <select name="expiryMonth"
                                            style="width: 100%;border: solid 2px rgba(102, 102, 102, 0.12);border-radius: 5px;height: 45px;padding-left: 30px;background-color: white;">
                                        <option value="01">01</option>
                                        <option value="02">02</option>
                                        <option value="03">03</option>
                                        <option value="04">04</option>
                                        <option value="05">05</option>
                                        <option value="06">06</option>
                                        <option value="07">07</option>
                                        <option value="08">08</option>
                                        <option value="09">09</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                    </select>
                                </div>

                                <div class="input-box mt-10 col-lg-6">
                                    <div>Expiry Year</div>
                                    <select name="expiryYear"
                                            style="width: 100%;border: solid 2px rgba(102, 102, 102, 0.12);border-radius: 5px;height: 45px;padding-left: 30px;background-color: white;">
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                        <option value="2024">2024</option>
                                        <option value="2025">2025</option>
                                        <option value="2026">2026</option>
                                        <option value="2027">2027</option>
                                        <option value="2028">2028</option>
                                        <option value="2029">2029</option>
                                        <option value="2030">2030</option>
                                        <option value="2031">2031</option>
                                        <option value="2032">2032</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-6">
                        <div class="login-title" style="padding-top: 20px!important;">
                            <p style="color: #6b9ce8;font-weight: bold;font-size: 23px!important;">2. PAY BY PAYPAL</p>
                        </div>
                        <div style="padding: 50px">

                            <div id="paypal-button-container-P-1AA545389M2405943MCJIQNA" style="width: 300px"></div>
                            <script src="https://www.paypal.com/sdk/js?client-id=AQCrLYki8oc2cTaU4xAlFdz2t_lCoHS8m8cHbdjN-ipLQcXYlLiQ-j325-sdhhGcvYHhZTPyqFAK855p&vault=true&intent=subscription" data-sdk-integration-source="button-factory"></script>
                            <script>
                                paypal.Buttons({
                                    style: {
                                        shape: 'rect',
                                        color: 'gold',
                                        layout: 'vertical',
                                        label: 'subscribe',
                                        width: '300px'
                                    },
                                    createSubscription: function(data, actions) {
                                        return actions.subscription.create({
                                            /* Creates the subscription */
                                            plan_id: 'P-1AA545389M2405943MCJIQNA'
                                        });
                                    },
                                    onApprove: function(data, actions) {
                                        document.getElementById('paymentMethod').value = 'paypal';
                                        document.getElementById('submitbtnmain').click();
                                        // alert(data.subscriptionID);
                                        // You can add optional success message for the subscriber here
                                    }
                                }).render('#paypal-button-container-P-1AA545389M2405943MCJIQNA'); // Renders the PayPal button
                            </script>
                        </div>

                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 mt-30">
                        <button id="submitbtnmain" type="submit"
                                style="background: #6b9ce8;letter-spacing: 3px;border: none;color: #fff;cursor: pointer;padding: 1.0rem 3rem;text-transform: uppercase;width: 100%;border-radius: 5px;line-height: 18px;font-size: 15px !important;">
                            SUBMIT
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </section>
    <script>
        $(document).ready(function () {
            let num;
            let num2;
            num = 19.99;
            // document.getElementById('vat20%').innerText = num.toFixed(2);
            num2 = 19.99;
            document.getElementById('totalPayableNow').innerText = num2.toFixed(2);
        });

        function calculateCertificateToken(value) {
            document.getElementById('extraCertificateTokens').innerText = value;
            let num;
            let num22;
            num = (19.99 + parseInt(value));
            // num = num * 0.2;
            // num22 = 19.99 + num + parseInt(value);
            // alert(parseInt(num))
            document.getElementById('totalPayableNow').innerText = num.toFixed(2);
            // document.getElementById('vat20%').innerText = num.toFixed(2);

            document.getElementById('totalAmount').value = num.toFixed(2);
        }
    </script>
    <script>

        var select = document.getElementById("selectCountry");

        var countries = new Array("Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegovina", "Botswana", "Brazil", "Brunei", "Bulgaria", "Burkina Faso", "Burma", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Central African Republic", "Chad", "Chile", "China", "Colombia", "Comoros", "Congo, Democratic Republic", "Congo, Republic of the", "Costa Rica", "Cote d'Ivoire", "Croatia", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Fiji", "Finland", "France", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Greece", "Greenland", "Grenada", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, North", "Korea, South", "Kuwait", "Kyrgyzstan", "Laos", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libya", "Liechtenstein", "Lithuania", "Luxembourg", "Macedonia", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Mauritania", "Mauritius", "Mexico", "Micronesia", "Moldova", "Mongolia", "Morocco", "Monaco", "Mozambique", "Namibia", "Nauru", "Nepal", "Netherlands", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Norway", "Oman", "Pakistan", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Poland", "Portugal", "Qatar", "Romania", "Russia", "Rwanda", "Samoa", "San Marino", " Sao Tome", "Saudi Arabia", "Senegal", "Serbia and Montenegro", "Seychelles", "Sierra Leone", "Singapore", "Slovakia", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "Spain", "Sri Lanka", "Sudan", "Suriname", "Swaziland", "Sweden", "Switzerland", "Syria", "Taiwan", "Tajikistan", "Tanzania", "Thailand", "Togo", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Yemen", "Zambia", "Zimbabwe");

        //console.log(countries);
        //console.log(select);

        for (var i = 0; i < countries.length; i++) {

            var option = document.createElement("option");
            //for every turn of the loop create an option tag
            //console.log(option);
            var txt = document.createTextNode(countries[i]);
            //for every turn of the loop create the inner text
            //console.log(txt);
            option.appendChild(txt);
            //for every turn of the loop put the words from txt inside the <option> tags
            //console.log(option);
            option.setAttribute("value", countries[i]); //for every turn of the loop set the value attribute to corresponding country name
            //console.log(option);
            select.insertBefore(option, select.lastChild);
            //console.log(select);

        }

        document.addEventListener('DOMContentLoaded', function () {
            //console.log('DOM fully loaded and parsed');
            document.querySelector('select[name="selectCountry"]').onchange = alertCountry;
        }, false);

        function alertCountry(event) {
            //console.log('DOM loaded');
            //use "this" to refer to selected element
            // if (!event.target.value)
            //     alert('Please select a country');
            // else alert('You chose ' + event.target.value + '. Yay, grab a beer!');
        }
    </script>


    <script>
        var placeSearch, autocomplete;
        var componentForm = {
            locality: 'long_name',
            administrative_area_level_1: 'short_name',
            postal_code: 'short_name'
        };
        if (typeof google === 'undefined') {
            jQuery.getScript('https://maps.googleapis.com/maps/api/js?key=AIzaSyC141fW_XoCD_dJHMaTygnLX1kDLeTWcwo&libraries=geometry,places', () => {
                var input = document.getElementById('addressLineOne');
                autocomplete = new google.maps.places.Autocomplete(input, {types: ['geocode']} );
                autocomplete.setFields(['address_component']);
                autocomplete.addListener('place_changed', fillIn);
            });
        }
        else{
            var input = document.getElementById('addressLineOne');
            autocomplete = new google.maps.places.Autocomplete(input, {types: ['geocode']} );
            autocomplete.setFields(['address_component']);
            autocomplete.addListener('place_changed', fillIn);
        }
        function fillIn() {
            var geocoder = new google.maps.Geocoder();
            var address = document.getElementById('addressLineOne').value;

            // geocoder.geocode({
            //     'address': address
            // }, function(results, status) {
            //     if (status === google.maps.GeocoderStatus.OK) {
            //         var latitude = results[0].geometry.location.lat();
            //         var longitude = results[0].geometry.location.lng();
            //         document.getElementById('lat').value = latitude;
            //         document.getElementById('longg').value = longitude;
            //
            //         lati = latitude;
            //         longi = longitude;
            //         initMap();
            //     }
            // });

            var place = autocomplete.getPlace();
            console.log(place.address_components);
            for (var i = 0; i < place.address_components.length; i++) {
                let addressTypes = place.address_components[i].types;
                for (let k=0;k<addressTypes.length;k++){
                    var addressType = place.address_components[i].types[k];

                    if (addressType === 'administrative_area_level_1'){
                        var val = place.address_components[i]['long_name'];
                        // document.getElementById('city').value = val;
                        document.getElementById('state').value = val;
                    }
                    if (addressType === 'locality'){
                        var val = place.address_components[i]['long_name'];
                        document.getElementById('city').value = val;
                        // document.getElementById('estate').value = val;
                    }
                    if (addressType === 'postal_code'){
                        var val = place.address_components[i]['long_name'];
                        document.getElementById('zipcode').value = val;
                        // zipCodeAdded(val);
                    }
                }

            }
        }
    </script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCJqJcwaHOlWKivApYFYSjmVobGeKFqGdE&callback=initMap">
    </script>

@endsection
<!--====== LOGIN PART ENDS ======-->
