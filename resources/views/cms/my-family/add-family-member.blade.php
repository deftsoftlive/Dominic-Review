@extends('inc.homelayout')
@section('title', 'DRH|Register')
@section('content')
@php $country_code = DB::table('country_code')->get(); @endphp
<style>
    #child_section, #medical_info, #child_contacts, #medical_beh, #media_consent, #primary_lang, #beh_info, #med_cond_info, #med_con_button, #pres_med_info, #allergy_button, #allergies_info, #special_needs_info{display: none;}
</style>
<div class="account-menu acc_sub_menu">
    <div class="container">
        <div class="menu-title">
            <span>Account</span> menu
        </div>
        <nav>
            <ul>
                @include('inc.parent-menu')
            </ul>
        </nav>
    </div>
</div>
<section class="register-acc">
    <div class="container">
        <div class="inner-cont">
            <div id="accordion">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                <span>1</span> participant detail
                            </button>
                            <div class="cstm-radio">
                                <input type="radio" name="type" data-type="child" id="tab1">
                                <label for="tab1"></label>
                            </div>
                        </h5>
                    </div>
                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                            <div class="register-sec form-register-sec">
                                <form id="add-family-mem" class="register-form" method="POST">
                                    <input type="hidden" name="_token" value="wosEo6t3pTI8WrAvu1FbKMMbcQOevPC4sUq17DWZ"> <input type="hidden" name="role_id" id="role_id" value="4">
                                    <div class="form-partition">
                                        <div class="row">
                                            <div class="form-radios rgtr-radio" style="margin: 10px 0;">
                                                <div class="col-sm-12">
                                                    <p class="main_head" style="display: inline-block; font-weight: 500; margin-right: 15px;">Is this person an adult or a child?</p>
                                                    <div class="radio-outer-wrap">
                                                        <div class="cstm-radio main-radio">
                                                            <input type="radio" name="type" data-type="child" id="check_child" value="Child">
                                                            <label for="child">Child</label>
                                                        </div>
                                                        <div class="cstm-radio main-radio">
                                                            <input type="radio" name="type" data-type="adult" id="check_adult" value="Adult" checked>
                                                            <label for="adult">Adult</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="child-selection-content" style="display: none;">
                                            <div class="row">
                                                <input type="hidden" class="form_type" id="form_type" name="form_type" value="">
                                                <!-- First Name -->
                                                <div class="form-group row">
                                                    <label for="first_name" class="col-md-12 col-form-label text-md-right">First Name</label>
                                                    <div class="col-md-12">
                                                        <input id="first_name" type="text" class="form-control" name="first_name" value="" required="">
                                                    </div>
                                                </div>
                                                <!-- Last Name -->
                                                <div class="form-group row">
                                                    <label for="last_name" class="col-md-12 col-form-label text-md-right">Last Name</label>
                                                    <div class="col-md-12">
                                                        <input id="last_name" type="text" class="form-control" name="last_name" value="" required="">
                                                    </div>
                                                </div>
                                                <!-- Gender -->
                                                <div class="form-group row gender-opt signup-gender-op">
                                                    <label for="gender" class="col-md-12 col-form-label text-md-right ">Gender</label>
                                                    <div class="col-md-12 ">
                                                        <div class="cstm-radio">
                                                            <input type="radio" name="book_person_type" id="yes">
                                                            <label for="yes">Male</label>
                                                        </div>
                                                        <div class="cstm-radio">
                                                            <input type="radio" name="book_person_type" id="no"> <label for="no">Female</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Date of Birth -->
                                                <div class="form-group row">
                                                    <label for="date_of_birth" class="col-md-12 col-form-label text-md-right">Date Of Birth</label>
                                                    <div class="col-md-12">
                                                        <input id="date_of_birth" type="date" class="form-control" name="date_of_birth" value="" required="" max="2020-07-07">
                                                    </div>
                                                </div>
                                                <!-- Address -->
                                                <div class="form-group row address-detail">
                                                    <label for="address" class="col-md-12 col-form-label text-md-right">Address (Number &amp; Street)</label>
                                                    <div class="col-md-12">
                                                        <input id="address" type="text" class="paste_address form-control" name="address" value="" required="">
                                                        <div class="copy_address">
                                                            <a href="javascript:void(0);">Copy address of account holder</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Town -->
                                                <div class="form-group row">
                                                    <label for="town" class="col-md-12 col-form-label text-md-right">Town</label>
                                                    <div class="col-md-12">
                                                        <input id="town" type="text" class="paste_town form-control" name="town" value="" required="">
                                                    </div>
                                                </div>
                                                <!-- Postcode -->
                                                <div class="form-group row">
                                                    <label for="postcode" class="col-md-12 col-form-label text-md-right">Postcode</label>
                                                    <div class="col-md-12">
                                                        <input id="postcode" type="text" class="paste_postcode form-control" name="postcode" value="" required="">
                                                    </div>
                                                </div>
                                                <!-- County -->
                                                <div class="form-group row">
                                                    <label for="county" class="col-md-12 col-form-label text-md-right">County</label>
                                                    <div class="col-md-12">
                                                        <input id="county" type="text" class="paste_county form-control" name="county" value="" required="">
                                                    </div>
                                                </div>
                                                <!-- Country -->
                                                <div class="form-group row">
                                                    <label for="country" class="col-md-12 col-form-label text-md-right">Country</label>
                                                    <div class="col-md-12">
                                                        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
                                                        <select id="country" name="country" class="paste_country form-control cstm-select-list">
                                                            <option value="Aruba">Aruba</option>
                                                            <option value="Afghanistan">Afghanistan</option>
                                                            <option value="Angola">Angola</option>
                                                            <option value="Anguilla">Anguilla</option>
                                                            <option value="Åland">Åland</option>
                                                            <option value="Albania">Albania</option>
                                                            <option value="Andorra">Andorra</option>
                                                            <option value="United Arab Emirates">United Arab Emirates</option>
                                                            <option value="Argentina">Argentina</option>
                                                            <option value="Armenia">Armenia</option>
                                                            <option value="American Samoa">American Samoa</option>
                                                            <option value="Antarctica">Antarctica</option>
                                                            <option value="French Southern Territories">French Southern Territories</option>
                                                            <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                                            <option value="Australia">Australia</option>
                                                            <option value="Austria">Austria</option>
                                                            <option value="Azerbaijan">Azerbaijan</option>
                                                            <option value="Burundi">Burundi</option>
                                                            <option value="Belgium">Belgium</option>
                                                            <option value="Benin">Benin</option>
                                                            <option value="Bonaire">Bonaire</option>
                                                            <option value="Burkina Faso">Burkina Faso</option>
                                                            <option value="Bangladesh">Bangladesh</option>
                                                            <option value="Bulgaria">Bulgaria</option>
                                                            <option value="Bahrain">Bahrain</option>
                                                            <option value="Bahamas">Bahamas</option>
                                                            <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                                            <option value="Saint Barthélemy">Saint Barthélemy</option>
                                                            <option value="Belarus">Belarus</option>
                                                            <option value="Belize">Belize</option>
                                                            <option value="Bermuda">Bermuda</option>
                                                            <option value="Bolivia">Bolivia</option>
                                                            <option value="Brazil">Brazil</option>
                                                            <option value="Barbados">Barbados</option>
                                                            <option value="Brunei">Brunei</option>
                                                            <option value="Bhutan">Bhutan</option>
                                                            <option value="Bouvet Island">Bouvet Island</option>
                                                            <option value="Botswana">Botswana</option>
                                                            <option value="Central African Republic">Central African Republic</option>
                                                            <option value="Canada">Canada</option>
                                                            <option value="Cocos [Keeling] Islands">Cocos [Keeling] Islands</option>
                                                            <option value="Switzerland">Switzerland</option>
                                                            <option value="Chile">Chile</option>
                                                            <option value="China">China</option>
                                                            <option value="Ivory Coast">Ivory Coast</option>
                                                            <option value="Cameroon">Cameroon</option>
                                                            <option value="Democratic Republic of the Congo">Democratic Republic of the Congo</option>
                                                            <option value="Republic of the Congo">Republic of the Congo</option>
                                                            <option value="Cook Islands">Cook Islands</option>
                                                            <option value="Colombia">Colombia</option>
                                                            <option value="Comoros">Comoros</option>
                                                            <option value="Cape Verde">Cape Verde</option>
                                                            <option value="Costa Rica">Costa Rica</option>
                                                            <option value="Cuba">Cuba</option>
                                                            <option value="Curacao">Curacao</option>
                                                            <option value="Christmas Island">Christmas Island</option>
                                                            <option value="Cayman Islands">Cayman Islands</option>
                                                            <option value="Cyprus">Cyprus</option>
                                                            <option value="Czech Republic">Czech Republic</option>
                                                            <option value="Germany">Germany</option>
                                                            <option value="Djibouti">Djibouti</option>
                                                            <option value="Dominica">Dominica</option>
                                                            <option value="Denmark">Denmark</option>
                                                            <option value="Dominican Republic">Dominican Republic</option>
                                                            <option value="Algeria">Algeria</option>
                                                            <option value="Ecuador">Ecuador</option>
                                                            <option value="Egypt">Egypt</option>
                                                            <option value="Eritrea">Eritrea</option>
                                                            <option value="Western Sahara">Western Sahara</option>
                                                            <option value="Spain">Spain</option>
                                                            <option value="Estonia">Estonia</option>
                                                            <option value="Ethiopia">Ethiopia</option>
                                                            <option value="Finland">Finland</option>
                                                            <option value="Fiji">Fiji</option>
                                                            <option value="Falkland Islands">Falkland Islands</option>
                                                            <option value="France">France</option>
                                                            <option value="Faroe Islands">Faroe Islands</option>
                                                            <option value="Micronesia">Micronesia</option>
                                                            <option value="Gabon">Gabon</option>
                                                            <option value="United Kingdom">United Kingdom</option>
                                                            <option value="Georgia">Georgia</option>
                                                            <option value="Guernsey">Guernsey</option>
                                                            <option value="Ghana">Ghana</option>
                                                            <option value="Gibraltar">Gibraltar</option>
                                                            <option value="Guinea">Guinea</option>
                                                            <option value="Guadeloupe">Guadeloupe</option>
                                                            <option value="Gambia">Gambia</option>
                                                            <option value="Guinea-Bissau">Guinea-Bissau</option>
                                                            <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                            <option value="Greece">Greece</option>
                                                            <option value="Grenada">Grenada</option>
                                                            <option value="Greenland">Greenland</option>
                                                            <option value="Guatemala">Guatemala</option>
                                                            <option value="French Guiana">French Guiana</option>
                                                            <option value="Guam">Guam</option>
                                                            <option value="Guyana">Guyana</option>
                                                            <option value="Hong Kong">Hong Kong</option>
                                                            <option value="Heard Island and McDonald Islands">Heard Island and McDonald Islands</option>
                                                            <option value="Honduras">Honduras</option>
                                                            <option value="Croatia">Croatia</option>
                                                            <option value="Haiti">Haiti</option>
                                                            <option value="Hungary">Hungary</option>
                                                            <option value="Indonesia">Indonesia</option>
                                                            <option value="Isle of Man">Isle of Man</option>
                                                            <option value="India">India</option>
                                                            <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                                            <option value="Ireland">Ireland</option>
                                                            <option value="Iran">Iran</option>
                                                            <option value="Iraq">Iraq</option>
                                                            <option value="Iceland">Iceland</option>
                                                            <option value="Israel">Israel</option>
                                                            <option value="Italy">Italy</option>
                                                            <option value="Jamaica">Jamaica</option>
                                                            <option value="Jersey">Jersey</option>
                                                            <option value="Jordan">Jordan</option>
                                                            <option value="Japan">Japan</option>
                                                            <option value="Kazakhstan">Kazakhstan</option>
                                                            <option value="Kenya">Kenya</option>
                                                            <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                            <option value="Cambodia">Cambodia</option>
                                                            <option value="Kiribati">Kiribati</option>
                                                            <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                                            <option value="South Korea">South Korea</option>
                                                            <option value="Kuwait">Kuwait</option>
                                                            <option value="Laos">Laos</option>
                                                            <option value="Lebanon">Lebanon</option>
                                                            <option value="Liberia">Liberia</option>
                                                            <option value="Libya">Libya</option>
                                                            <option value="Saint Lucia">Saint Lucia</option>
                                                            <option value="Liechtenstein">Liechtenstein</option>
                                                            <option value="Sri Lanka">Sri Lanka</option>
                                                            <option value="Lesotho">Lesotho</option>
                                                            <option value="Lithuania">Lithuania</option>
                                                            <option value="Luxembourg">Luxembourg</option>
                                                            <option value="Latvia">Latvia</option>
                                                            <option value="Macao">Macao</option>
                                                            <option value="Saint Martin">Saint Martin</option>
                                                            <option value="Morocco">Morocco</option>
                                                            <option value="Monaco">Monaco</option>
                                                            <option value="Moldova">Moldova</option>
                                                            <option value="Madagascar">Madagascar</option>
                                                            <option value="Maldives">Maldives</option>
                                                            <option value="Mexico">Mexico</option>
                                                            <option value="Marshall Islands">Marshall Islands</option>
                                                            <option value="Macedonia">Macedonia</option>
                                                            <option value="Mali">Mali</option>
                                                            <option value="Malta">Malta</option>
                                                            <option value="Myanmar [Burma]">Myanmar [Burma]</option>
                                                            <option value="Montenegro">Montenegro</option>
                                                            <option value="Mongolia">Mongolia</option>
                                                            <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                                            <option value="Mozambique">Mozambique</option>
                                                            <option value="Mauritania">Mauritania</option>
                                                            <option value="Montserrat">Montserrat</option>
                                                            <option value="Martinique">Martinique</option>
                                                            <option value="Mauritius">Mauritius</option>
                                                            <option value="Malawi">Malawi</option>
                                                            <option value="Malaysia">Malaysia</option>
                                                            <option value="Mayotte">Mayotte</option>
                                                            <option value="Namibia">Namibia</option>
                                                            <option value="New Caledonia">New Caledonia</option>
                                                            <option value="Niger">Niger</option>
                                                            <option value="Norfolk Island">Norfolk Island</option>
                                                            <option value="Nigeria">Nigeria</option>
                                                            <option value="Nicaragua">Nicaragua</option>
                                                            <option value="Niue">Niue</option>
                                                            <option value="Netherlands">Netherlands</option>
                                                            <option value="Norway">Norway</option>
                                                            <option value="Nepal">Nepal</option>
                                                            <option value="Nauru">Nauru</option>
                                                            <option value="New Zealand">New Zealand</option>
                                                            <option value="Oman">Oman</option>
                                                            <option value="Pakistan">Pakistan</option>
                                                            <option value="Panama">Panama</option>
                                                            <option value="Pitcairn Islands">Pitcairn Islands</option>
                                                            <option value="Peru">Peru</option>
                                                            <option value="Philippines">Philippines</option>
                                                            <option value="Palau">Palau</option>
                                                            <option value="Papua New Guinea">Papua New Guinea</option>
                                                            <option value="Poland">Poland</option>
                                                            <option value="Puerto Rico">Puerto Rico</option>
                                                            <option value="North Korea">North Korea</option>
                                                            <option value="Portugal">Portugal</option>
                                                            <option value="Paraguay">Paraguay</option>
                                                            <option value="Palestine">Palestine</option>
                                                            <option value="French Polynesia">French Polynesia</option>
                                                            <option value="Qatar">Qatar</option>
                                                            <option value="Réunion">Réunion</option>
                                                            <option value="Romania">Romania</option>
                                                            <option value="Russia">Russia</option>
                                                            <option value="Rwanda">Rwanda</option>
                                                            <option value="Saudi Arabia">Saudi Arabia</option>
                                                            <option value="Sudan">Sudan</option>
                                                            <option value="Senegal">Senegal</option>
                                                            <option value="Singapore">Singapore</option>
                                                            <option value="South Georgia and the South Sandwich Islands">South Georgia and the South Sandwich Islands</option>
                                                            <option value="Saint Helena">Saint Helena</option>
                                                            <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                                            <option value="Solomon Islands">Solomon Islands</option>
                                                            <option value="Sierra Leone">Sierra Leone</option>
                                                            <option value="El Salvador">El Salvador</option>
                                                            <option value="San Marino">San Marino</option>
                                                            <option value="Somalia">Somalia</option>
                                                            <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                                            <option value="Serbia">Serbia</option>
                                                            <option value="South Sudan">South Sudan</option>
                                                            <option value="São Tomé and Príncipe">São Tomé and Príncipe</option>
                                                            <option value="Suriname">Suriname</option>
                                                            <option value="Slovakia">Slovakia</option>
                                                            <option value="Slovenia">Slovenia</option>
                                                            <option value="Sweden">Sweden</option>
                                                            <option value="Swaziland">Swaziland</option>
                                                            <option value="Sint Maarten">Sint Maarten</option>
                                                            <option value="Seychelles">Seychelles</option>
                                                            <option value="Syria">Syria</option>
                                                            <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                                            <option value="Chad">Chad</option>
                                                            <option value="Togo">Togo</option>
                                                            <option value="Thailand">Thailand</option>
                                                            <option value="Tajikistan">Tajikistan</option>
                                                            <option value="Tokelau">Tokelau</option>
                                                            <option value="Turkmenistan">Turkmenistan</option>
                                                            <option value="East Timor">East Timor</option>
                                                            <option value="Tonga">Tonga</option>
                                                            <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                                            <option value="Tunisia">Tunisia</option>
                                                            <option value="Turkey">Turkey</option>
                                                            <option value="Tuvalu">Tuvalu</option>
                                                            <option value="Taiwan">Taiwan</option>
                                                            <option value="Tanzania">Tanzania</option>
                                                            <option value="Uganda">Uganda</option>
                                                            <option value="Ukraine">Ukraine</option>
                                                            <option value="U.S. Minor Outlying Islands">U.S. Minor Outlying Islands</option>
                                                            <option value="Uruguay">Uruguay</option>
                                                            <option value="United States">United States</option>
                                                            <option value="Uzbekistan">Uzbekistan</option>
                                                            <option value="Vatican City">Vatican City</option>
                                                            <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                                                            <option value="Venezuela">Venezuela</option>
                                                            <option value="British Virgin Islands">British Virgin Islands</option>
                                                            <option value="U.S. Virgin Islands">U.S. Virgin Islands</option>
                                                            <option value="Vietnam">Vietnam</option>
                                                            <option value="Vanuatu">Vanuatu</option>
                                                            <option value="Wallis and Futuna">Wallis and Futuna</option>
                                                            <option value="Samoa">Samoa</option>
                                                            <option value="Kosovo">Kosovo</option>
                                                            <option value="Yemen">Yemen</option>
                                                            <option value="South Africa">South Africa</option>
                                                            <option value="Zambia">Zambia</option>
                                                            <option value="Zimbabwe">Zimbabwe</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <!-- Relationship -->
                                                <div class="form-group row">
                                                    <label for="relation" class="col-md-12 col-form-label text-md-right">What is the relationship of the account holder to this person?</label>
                                                    <div class="col-md-12">
                                                        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
                                                        <select id="relation" name="relation" class="form-control cstm-select-list">
                                                            <option selected="" disabled="" value="">Please Choose</option>
                                                            <option value="Mother">Mother</option>
                                                            <option value="Father">Father</option>
                                                            <option value="Grandparent">Grandparent</option>
                                                            <option value="Guardian">Guardian</option>
                                                            <option value="Spouse">Spouse/Partner</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <!-- school -->
                                                <!-- <div class="form-group row">
                                                    <label for="tennis_club" class="col-md-12 col-form-label text-md-right">Which school does this person attend</label>
                                                    <div class="col-md-12">
                                                        <input id="tennis_club" type="text" class="paste_county form-control" name="tennis_club" value="" required="">
                                                    </div>
                                                </div> -->
                                                <!-- Profile Picture -->
                                                <!-- <div class="form-group">
                                                      <div class="col-sm-12">
                                                         <label>Profile Picture</label>
                                                         <input type="file" name="profile_image" id="selImage" accept="image/*" onchange="ValidateSingleInput(this, 'image_src')">
                                                                                    </div>
                                                   </div> -->
                                                <!-- Selection Section - Start -->
                                                <div class="col-md-6 option_row">
                                                    <div class="form-group row ">
                                                        <div class="form-radios">
                                                            <p style="display: inline-block; font-weight: 500; margin-right: 15px;">Is Englisg this person's primary language?</p>
                                                        </div>
                                                        <div class="cstm-radio">
                                                            <input type="radio" name="book_person_type" id="book_person_yes">
                                                            <label for="book_person_yes">Yes</label>
                                                        </div>
                                                        <div class="cstm-radio">
                                                            <input type="radio" name="book_person_type" id="book_person_no"> <label for="book_person_no">No</label>
                                                        </div>
                                                        <input type="text" name="book_person" class="paste_county form-control" value="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 option_row coach_option">
                                                    <div class="form-group row ">
                                                        <div class="form-radios">
                                                            <p style="display: inline-block; font-weight: 500; margin-right: 15px;">Will this person be booking onto a DRH coaching courses or holiday camp?</p>
                                                        </div>
                                                        <div class="cstm-radio">
                                                            <input type="radio" name="book_person_type" id="yes11">
                                                            <label for="yes11">Yes</label>
                                                        </div>
                                                        <div class="cstm-radio booking">
                                                            <input type="radio" name="book_person_type" id="no11">
                                                            <label for="no11">No</label>
                                                        </div>
                                                        <input type="hidden" name="book_person" id="book_person" value="">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <button type="button" class="cstm-btn">Save Section</button>
                                                </div>
                                                <!-- Selection Section - End -->
                                            </div>
                                        </div>
                                        <div class="adult-selection-content">
                                            <div class="row">
                                                <input type="hidden" class="form_type" id="form_type" name="form_type" value="">
                                                <!-- First Name -->
                                                <div class="form-group row">
                                                    <label for="first_name" class="col-md-12 col-form-label text-md-right">First Name</label>
                                                    <div class="col-md-12">
                                                        <input id="first_name" type="text" class="form-control" name="first_name" value="" required="">
                                                    </div>
                                                </div>
                                                <!-- Last Name -->
                                                <div class="form-group row">
                                                    <label for="last_name" class="col-md-12 col-form-label text-md-right">Last Name</label>
                                                    <div class="col-md-12">
                                                        <input id="last_name" type="text" class="form-control" name="last_name" value="" required="">
                                                    </div>
                                                </div>
                                                <!-- Gender -->
                                                <div class="form-group row gender-opt signup-gender-op">
                                                    <label for="gender" class="col-md-12 col-form-label text-md-right ">Gender</label>
                                                    <div class="col-md-12 ">
                                                        <div class="cstm-radio">
                                                            <input type="radio" name="book_person_type" id="yesa">
                                                            <label for="yesa">Male</label>
                                                        </div>
                                                        <div class="cstm-radio">
                                                            <input type="radio" name="book_person_type" id="noa">
                                                            <label for="noa">Female</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Date of Birth -->
                                                <div class="form-group row">
                                                    <label for="date_of_birth" class="col-md-12 col-form-label text-md-right">Date Of Birth</label>
                                                    <div class="col-md-12">
                                                        <input id="date_of_birth" type="date" class="form-control" name="date_of_birth" value="" required="" max="2020-07-07">
                                                    </div>
                                                </div>
                                                <!-- Address -->
                                                <div class="form-group row address-detail">
                                                    <label for="address" class="col-md-12 col-form-label text-md-right">Address (Number &amp; Street)</label>
                                                    <div class="col-md-12">
                                                        <input id="address" type="text" class="paste_address form-control" name="address" value="" required="">
                                                        <div class="copy_address">
                                                            <a href="javascript:void(0);">Copy address of account holder</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Town -->
                                                <div class="form-group row">
                                                    <label for="town" class="col-md-12 col-form-label text-md-right">Town</label>
                                                    <div class="col-md-12">
                                                        <input id="town" type="text" class="paste_town form-control" name="town" value="" required="">
                                                    </div>
                                                </div>
                                                <!-- Postcode -->
                                                <div class="form-group row">
                                                    <label for="postcode" class="col-md-12 col-form-label text-md-right">Postcode</label>
                                                    <div class="col-md-12">
                                                        <input id="postcode" type="text" class="paste_postcode form-control" name="postcode" value="" required="">
                                                    </div>
                                                </div>
                                                <!-- County -->
                                                <div class="form-group row">
                                                    <label for="county" class="col-md-12 col-form-label text-md-right">County</label>
                                                    <div class="col-md-12">
                                                        <input id="county" type="text" class="paste_county form-control" name="county" value="" required="">
                                                    </div>
                                                </div>
                                                <!-- Country -->
                                                <div class="form-group row">
                                                    <label for="country" class="col-md-12 col-form-label text-md-right">Country</label>
                                                    <div class="col-md-12">
                                                        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
                                                        <select id="country" name="country" class="paste_country form-control cstm-select-list">
                                                            <option value="Aruba">Aruba</option>
                                                            <option value="Afghanistan">Afghanistan</option>
                                                            <option value="Angola">Angola</option>
                                                            <option value="Anguilla">Anguilla</option>
                                                            <option value="Åland">Åland</option>
                                                            <option value="Albania">Albania</option>
                                                            <option value="Andorra">Andorra</option>
                                                            <option value="United Arab Emirates">United Arab Emirates</option>
                                                            <option value="Argentina">Argentina</option>
                                                            <option value="Armenia">Armenia</option>
                                                            <option value="American Samoa">American Samoa</option>
                                                            <option value="Antarctica">Antarctica</option>
                                                            <option value="French Southern Territories">French Southern Territories</option>
                                                            <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                                            <option value="Australia">Australia</option>
                                                            <option value="Austria">Austria</option>
                                                            <option value="Azerbaijan">Azerbaijan</option>
                                                            <option value="Burundi">Burundi</option>
                                                            <option value="Belgium">Belgium</option>
                                                            <option value="Benin">Benin</option>
                                                            <option value="Bonaire">Bonaire</option>
                                                            <option value="Burkina Faso">Burkina Faso</option>
                                                            <option value="Bangladesh">Bangladesh</option>
                                                            <option value="Bulgaria">Bulgaria</option>
                                                            <option value="Bahrain">Bahrain</option>
                                                            <option value="Bahamas">Bahamas</option>
                                                            <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                                            <option value="Saint Barthélemy">Saint Barthélemy</option>
                                                            <option value="Belarus">Belarus</option>
                                                            <option value="Belize">Belize</option>
                                                            <option value="Bermuda">Bermuda</option>
                                                            <option value="Bolivia">Bolivia</option>
                                                            <option value="Brazil">Brazil</option>
                                                            <option value="Barbados">Barbados</option>
                                                            <option value="Brunei">Brunei</option>
                                                            <option value="Bhutan">Bhutan</option>
                                                            <option value="Bouvet Island">Bouvet Island</option>
                                                            <option value="Botswana">Botswana</option>
                                                            <option value="Central African Republic">Central African Republic</option>
                                                            <option value="Canada">Canada</option>
                                                            <option value="Cocos [Keeling] Islands">Cocos [Keeling] Islands</option>
                                                            <option value="Switzerland">Switzerland</option>
                                                            <option value="Chile">Chile</option>
                                                            <option value="China">China</option>
                                                            <option value="Ivory Coast">Ivory Coast</option>
                                                            <option value="Cameroon">Cameroon</option>
                                                            <option value="Democratic Republic of the Congo">Democratic Republic of the Congo</option>
                                                            <option value="Republic of the Congo">Republic of the Congo</option>
                                                            <option value="Cook Islands">Cook Islands</option>
                                                            <option value="Colombia">Colombia</option>
                                                            <option value="Comoros">Comoros</option>
                                                            <option value="Cape Verde">Cape Verde</option>
                                                            <option value="Costa Rica">Costa Rica</option>
                                                            <option value="Cuba">Cuba</option>
                                                            <option value="Curacao">Curacao</option>
                                                            <option value="Christmas Island">Christmas Island</option>
                                                            <option value="Cayman Islands">Cayman Islands</option>
                                                            <option value="Cyprus">Cyprus</option>
                                                            <option value="Czech Republic">Czech Republic</option>
                                                            <option value="Germany">Germany</option>
                                                            <option value="Djibouti">Djibouti</option>
                                                            <option value="Dominica">Dominica</option>
                                                            <option value="Denmark">Denmark</option>
                                                            <option value="Dominican Republic">Dominican Republic</option>
                                                            <option value="Algeria">Algeria</option>
                                                            <option value="Ecuador">Ecuador</option>
                                                            <option value="Egypt">Egypt</option>
                                                            <option value="Eritrea">Eritrea</option>
                                                            <option value="Western Sahara">Western Sahara</option>
                                                            <option value="Spain">Spain</option>
                                                            <option value="Estonia">Estonia</option>
                                                            <option value="Ethiopia">Ethiopia</option>
                                                            <option value="Finland">Finland</option>
                                                            <option value="Fiji">Fiji</option>
                                                            <option value="Falkland Islands">Falkland Islands</option>
                                                            <option value="France">France</option>
                                                            <option value="Faroe Islands">Faroe Islands</option>
                                                            <option value="Micronesia">Micronesia</option>
                                                            <option value="Gabon">Gabon</option>
                                                            <option value="United Kingdom">United Kingdom</option>
                                                            <option value="Georgia">Georgia</option>
                                                            <option value="Guernsey">Guernsey</option>
                                                            <option value="Ghana">Ghana</option>
                                                            <option value="Gibraltar">Gibraltar</option>
                                                            <option value="Guinea">Guinea</option>
                                                            <option value="Guadeloupe">Guadeloupe</option>
                                                            <option value="Gambia">Gambia</option>
                                                            <option value="Guinea-Bissau">Guinea-Bissau</option>
                                                            <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                            <option value="Greece">Greece</option>
                                                            <option value="Grenada">Grenada</option>
                                                            <option value="Greenland">Greenland</option>
                                                            <option value="Guatemala">Guatemala</option>
                                                            <option value="French Guiana">French Guiana</option>
                                                            <option value="Guam">Guam</option>
                                                            <option value="Guyana">Guyana</option>
                                                            <option value="Hong Kong">Hong Kong</option>
                                                            <option value="Heard Island and McDonald Islands">Heard Island and McDonald Islands</option>
                                                            <option value="Honduras">Honduras</option>
                                                            <option value="Croatia">Croatia</option>
                                                            <option value="Haiti">Haiti</option>
                                                            <option value="Hungary">Hungary</option>
                                                            <option value="Indonesia">Indonesia</option>
                                                            <option value="Isle of Man">Isle of Man</option>
                                                            <option value="India">India</option>
                                                            <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                                            <option value="Ireland">Ireland</option>
                                                            <option value="Iran">Iran</option>
                                                            <option value="Iraq">Iraq</option>
                                                            <option value="Iceland">Iceland</option>
                                                            <option value="Israel">Israel</option>
                                                            <option value="Italy">Italy</option>
                                                            <option value="Jamaica">Jamaica</option>
                                                            <option value="Jersey">Jersey</option>
                                                            <option value="Jordan">Jordan</option>
                                                            <option value="Japan">Japan</option>
                                                            <option value="Kazakhstan">Kazakhstan</option>
                                                            <option value="Kenya">Kenya</option>
                                                            <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                            <option value="Cambodia">Cambodia</option>
                                                            <option value="Kiribati">Kiribati</option>
                                                            <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                                            <option value="South Korea">South Korea</option>
                                                            <option value="Kuwait">Kuwait</option>
                                                            <option value="Laos">Laos</option>
                                                            <option value="Lebanon">Lebanon</option>
                                                            <option value="Liberia">Liberia</option>
                                                            <option value="Libya">Libya</option>
                                                            <option value="Saint Lucia">Saint Lucia</option>
                                                            <option value="Liechtenstein">Liechtenstein</option>
                                                            <option value="Sri Lanka">Sri Lanka</option>
                                                            <option value="Lesotho">Lesotho</option>
                                                            <option value="Lithuania">Lithuania</option>
                                                            <option value="Luxembourg">Luxembourg</option>
                                                            <option value="Latvia">Latvia</option>
                                                            <option value="Macao">Macao</option>
                                                            <option value="Saint Martin">Saint Martin</option>
                                                            <option value="Morocco">Morocco</option>
                                                            <option value="Monaco">Monaco</option>
                                                            <option value="Moldova">Moldova</option>
                                                            <option value="Madagascar">Madagascar</option>
                                                            <option value="Maldives">Maldives</option>
                                                            <option value="Mexico">Mexico</option>
                                                            <option value="Marshall Islands">Marshall Islands</option>
                                                            <option value="Macedonia">Macedonia</option>
                                                            <option value="Mali">Mali</option>
                                                            <option value="Malta">Malta</option>
                                                            <option value="Myanmar [Burma]">Myanmar [Burma]</option>
                                                            <option value="Montenegro">Montenegro</option>
                                                            <option value="Mongolia">Mongolia</option>
                                                            <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                                            <option value="Mozambique">Mozambique</option>
                                                            <option value="Mauritania">Mauritania</option>
                                                            <option value="Montserrat">Montserrat</option>
                                                            <option value="Martinique">Martinique</option>
                                                            <option value="Mauritius">Mauritius</option>
                                                            <option value="Malawi">Malawi</option>
                                                            <option value="Malaysia">Malaysia</option>
                                                            <option value="Mayotte">Mayotte</option>
                                                            <option value="Namibia">Namibia</option>
                                                            <option value="New Caledonia">New Caledonia</option>
                                                            <option value="Niger">Niger</option>
                                                            <option value="Norfolk Island">Norfolk Island</option>
                                                            <option value="Nigeria">Nigeria</option>
                                                            <option value="Nicaragua">Nicaragua</option>
                                                            <option value="Niue">Niue</option>
                                                            <option value="Netherlands">Netherlands</option>
                                                            <option value="Norway">Norway</option>
                                                            <option value="Nepal">Nepal</option>
                                                            <option value="Nauru">Nauru</option>
                                                            <option value="New Zealand">New Zealand</option>
                                                            <option value="Oman">Oman</option>
                                                            <option value="Pakistan">Pakistan</option>
                                                            <option value="Panama">Panama</option>
                                                            <option value="Pitcairn Islands">Pitcairn Islands</option>
                                                            <option value="Peru">Peru</option>
                                                            <option value="Philippines">Philippines</option>
                                                            <option value="Palau">Palau</option>
                                                            <option value="Papua New Guinea">Papua New Guinea</option>
                                                            <option value="Poland">Poland</option>
                                                            <option value="Puerto Rico">Puerto Rico</option>
                                                            <option value="North Korea">North Korea</option>
                                                            <option value="Portugal">Portugal</option>
                                                            <option value="Paraguay">Paraguay</option>
                                                            <option value="Palestine">Palestine</option>
                                                            <option value="French Polynesia">French Polynesia</option>
                                                            <option value="Qatar">Qatar</option>
                                                            <option value="Réunion">Réunion</option>
                                                            <option value="Romania">Romania</option>
                                                            <option value="Russia">Russia</option>
                                                            <option value="Rwanda">Rwanda</option>
                                                            <option value="Saudi Arabia">Saudi Arabia</option>
                                                            <option value="Sudan">Sudan</option>
                                                            <option value="Senegal">Senegal</option>
                                                            <option value="Singapore">Singapore</option>
                                                            <option value="South Georgia and the South Sandwich Islands">South Georgia and the South Sandwich Islands</option>
                                                            <option value="Saint Helena">Saint Helena</option>
                                                            <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                                            <option value="Solomon Islands">Solomon Islands</option>
                                                            <option value="Sierra Leone">Sierra Leone</option>
                                                            <option value="El Salvador">El Salvador</option>
                                                            <option value="San Marino">San Marino</option>
                                                            <option value="Somalia">Somalia</option>
                                                            <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                                            <option value="Serbia">Serbia</option>
                                                            <option value="South Sudan">South Sudan</option>
                                                            <option value="São Tomé and Príncipe">São Tomé and Príncipe</option>
                                                            <option value="Suriname">Suriname</option>
                                                            <option value="Slovakia">Slovakia</option>
                                                            <option value="Slovenia">Slovenia</option>
                                                            <option value="Sweden">Sweden</option>
                                                            <option value="Swaziland">Swaziland</option>
                                                            <option value="Sint Maarten">Sint Maarten</option>
                                                            <option value="Seychelles">Seychelles</option>
                                                            <option value="Syria">Syria</option>
                                                            <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                                            <option value="Chad">Chad</option>
                                                            <option value="Togo">Togo</option>
                                                            <option value="Thailand">Thailand</option>
                                                            <option value="Tajikistan">Tajikistan</option>
                                                            <option value="Tokelau">Tokelau</option>
                                                            <option value="Turkmenistan">Turkmenistan</option>
                                                            <option value="East Timor">East Timor</option>
                                                            <option value="Tonga">Tonga</option>
                                                            <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                                            <option value="Tunisia">Tunisia</option>
                                                            <option value="Turkey">Turkey</option>
                                                            <option value="Tuvalu">Tuvalu</option>
                                                            <option value="Taiwan">Taiwan</option>
                                                            <option value="Tanzania">Tanzania</option>
                                                            <option value="Uganda">Uganda</option>
                                                            <option value="Ukraine">Ukraine</option>
                                                            <option value="U.S. Minor Outlying Islands">U.S. Minor Outlying Islands</option>
                                                            <option value="Uruguay">Uruguay</option>
                                                            <option value="United States">United States</option>
                                                            <option value="Uzbekistan">Uzbekistan</option>
                                                            <option value="Vatican City">Vatican City</option>
                                                            <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                                                            <option value="Venezuela">Venezuela</option>
                                                            <option value="British Virgin Islands">British Virgin Islands</option>
                                                            <option value="U.S. Virgin Islands">U.S. Virgin Islands</option>
                                                            <option value="Vietnam">Vietnam</option>
                                                            <option value="Vanuatu">Vanuatu</option>
                                                            <option value="Wallis and Futuna">Wallis and Futuna</option>
                                                            <option value="Samoa">Samoa</option>
                                                            <option value="Kosovo">Kosovo</option>
                                                            <option value="Yemen">Yemen</option>
                                                            <option value="South Africa">South Africa</option>
                                                            <option value="Zambia">Zambia</option>
                                                            <option value="Zimbabwe">Zimbabwe</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <!-- Relationship -->
                                                <div class="form-group row">
                                                    <label for="relation" class="col-md-12 col-form-label text-md-right">What is the relationship of the account holder to this person?</label>
                                                    <div class="col-md-12">
                                                        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
                                                        <select id="relation" name="relation" class="form-control cstm-select-list">
                                                            <option selected="" disabled="" value="">Please Choose</option>
                                                            <option value="Mother">Mother</option>
                                                            <option value="Father">Father</option>
                                                            <option value="Grandparent">Grandparent</option>
                                                            <option value="Guardian">Guardian</option>
                                                            <option value="Spouse">Spouse/Partner</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <!-- Tennis Club -->
                                                <div class="form-group row">
                                                    <label for="tennis_club" class="col-md-12 col-form-label text-md-right">Tennis Club</label>
                                                    <div class="col-md-12">
                                                        <input id="tennis_club" type="text" class="paste_county form-control" name="tennis_club" value="" required="">
                                                    </div>
                                                </div>
                                                <!-- Profile Picture -->
                                                <!-- <div class="form-group">
                                                      <div class="col-sm-12">
                                                         <label>Profile Picture</label>
                                                         <input type="file" name="profile_image" id="selImage" accept="image/*" onchange="ValidateSingleInput(this, 'image_src')">
                                                                                    </div>
                                                   </div> -->
                                                <!-- Selection Section - Start -->
                                                <div class="col-md-12 option_row">
                                                    <div class="form-group row ">
                                                        <div class="form-radios">
                                                            <p style="display: inline-block; font-weight: 500; margin-right: 15px;">Are you planning to book this person onto a coaching course or holiday camp with DRH Sports?</p>
                                                        </div>
                                                        <div class="cstm-radio">
                                                            <input type="radio" name="book_person_type" id="book_person_yesa">
                                                            <label for="book_person_yesa">Yes</label>
                                                        </div>
                                                        <div class="cstm-radio">
                                                            <input type="radio" name="book_person_type" id="book_person_noa"> <label for="book_person_noa">No</label>
                                                        </div>
                                                        <!-- <input type="text" name="book_person" class="paste_county form-control" value=""> -->
                                                    </div>
                                                </div>
                                                <!-- <div class="col-md-6 option_row coach_option">
                                                    <div class="form-group row ">
                                                        <div class="form-radios">
                                                            <p style="display: inline-block; font-weight: 500; margin-right: 15px;">Will this person be booking onto a DRH coaching courses or holiday camp?</p>
                                                        </div>
                                                        <div class="cstm-radio">
                                                            <input type="radio" name="book_person_type" id="yesa">
                                                            <label for="yesa">Yes</label>
                                                        </div>
                                                        <div class="cstm-radio booking">
                                                            <input type="radio" name="book_person_type" id="noa">
                                                            <label for="noa">No</label>
                                                        </div>
                                                        <input type="hidden" name="book_person" id="book_person" value="">
                                                    </div>
                                                </div> -->
                                                <div class="col-md-12">
                                                    <button type="button" class="cstm-btn">Save Section</button>
                                                </div>
                                                <!-- Selection Section - End -->
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                <span>2</span> contact
                            </button>
                            <div class="cstm-radio">
                                <input type="radio" name="type" data-type="child" id="tab2">
                                <label for="tab2"></label>
                            </div>
                        </h5>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                        <div class="card-body">
                            <div class="card-body">
                                <div class="register-sec form-register-sec">
                                    <div class="form-partition">
                                        <form class="register-form contact_form" method="POST">
                                            <div class="child-selection-content" style="display: none;">
                                                <div class="form-group-wrap">
                                                    <h4>Child Information</h4>
                                                    <div class="form-group row">
                                                       <div class="form-radios" style="margin: 10px 0;">
                                                          <div class="col-sm-12">
                                                             <p style="display: inline-block; font-weight: 500; margin-right: 15px;">Is English your child's primary language?</p>
                                                             <div class="cstm-radio">
                                                                <input type="radio" name="language" id="p-l-english-yes">
                                                                <label for="p-l-english-yes">Yes</label>
                                                             </div>
                                                             <div class="cstm-radio">
                                                                <input type="radio" name="language" id="p-l-english-no">
                                                                <label for="p-l-english-no">No</label>
                                                             </div>
                                                             <input type="hidden" name="core_lang" id="core_lang" value="">
                                                          </div>
                                                       </div>
                                                    </div>
                                                    <div class="form-group row" id="primary_lang">
                                                       <label class="col-md-12 col-form-label text-md-right">What is your child's primary language?</label>
                                                       <div class="col-md-12">
                                                          <input id="child-school" type="text" class="form-control" name="primary_language" value="">
                                                       </div>
                                                    </div>
                                                    <div class="form-group row f-g-full">
                                                       <label class="col-md-12 col-form-label text-md-right">Which school does your child attend?</label>
                                                       <div class="col-md-12">
                                                          <input id="child-school" type="text" class="form-control" name="school" value="">
                                                       </div>
                                                    </div>
                                                    <div class="form-group-wrap">
                                                       <h4>Please tell us about your child's sporting and activity interests.</h4>
                                                       <div class="form-wrap-container">
                                                          <p>Please tick the sports or activities this child likes and dislikes the most</p>
                                                          <table>
                                                             <thead>
                                                                <th></th>
                                                                <th>Like</th>
                                                                <th>Dislike</th>
                                                                <th>Not Sure</th>
                                                             </thead>
                                                             <!-- Football -->
                                                             <tbody>

                                                              @foreach($activities as $ac)
                                                                <tr class="activity" id="{{$ac->ac_title}}">
                                                                   <th scope="row">{{$ac->ac_title}}</th>
                                                                   <td>
                                                                      <div class="cstm-radio">
                                                                         <input type="radio" name="{{$ac->ac_title}}" value="0" id="f-like" />
                                                                         <label for="f-like">&nbsp;</label>
                                                                      </div>
                                                                   <td>
                                                                      <div class="cstm-radio">
                                                                         <input type="radio" name="{{$ac->ac_title}}" value="1" id="f-dislike" />
                                                                         <label for="f-dislike">&nbsp;</label>
                                                                      </div>
                                                                   </td>
                                                                   <td>
                                                                      <div class="cstm-radio">
                                                                         <input type="radio" name="{{$ac->ac_title}}" value="2" id="f-not-sure" />
                                                                         <label for="f-not-sure">&nbsp;</label>
                                                                      </div>
                                                                   </td>
                                                                </tr>
                                                              @endforeach
                                                             </tbody>
                                                          </table>
                                                          <button id="child_info_to_next" class="cstm-btn" style="margin: 10px 0;">Go to next section</button>
                                                       </div>
                                                    </div>
                                                 </div>
                                            </div>
                                            <div class="adult-selection-content">
                                                <div class="form-group-wrap">
                                                <h4>Medical information and emergency contacts</h4>
                                                <div class="form-group row f-g-full">
                                                   <div class="form-radios">
                                                      <div class="col-sm-7">
                                                         <p style="display: inline-block; font-weight: 500; margin-right: 15px;">Do you have any illness, injuries or medical conditions that would be helpful for the coach to be aware of?</p>
                                                      </div>
                                                      <div class="col-sm-5">
                                                         <div class="cstm-radio">
                                                            <input type="radio" name="beh_need_type" id="illness-or-injury-yes">
                                                            <label for="illness-or-injury-yes">Yes</label>
                                                         </div>
                                                         <div class="cstm-radio">
                                                            <input type="radio" name="beh_need_type" id="illness-or-injury-no">
                                                            <label for="illness-or-injury-no">No</label>
                                                         </div>
                                                         <input type="hidden" name="beh_need" id="beh_need" value="">
                                                      </div>
                                                   </div>
                                                </div>
                                                
                                                <div class="form-group col-md-12 f-g-full label-textarea" id="beh_info">
                                                   <label>Please give more detail as to the name, type and nature of the illness or injury so that the coach may better understand your needs.</label>
                                                   <textarea name="beh_info" id="beh_info_data"></textarea>
                                                </div>
                                             
                                                <div class="col-sm-12">
                                                   <p style="font-weight: 500; margin-right: 15px;">Please provide details for the person designated as your emergency contact.</p>
                                                </div>
                                                <div class="form-group row">
                                                   <label class="col-md-12 col-form-label text-md-right">contact 1 - first name:</label>
                                                   <div class="col-md-12">
                                                      <input id="em_first_name" type="text" class="form-control" name="em_first_name" value="">
                                                   </div>
                                                </div>
                                                <div class="form-group row">
                                                   <label class="col-md-12 col-form-label text-md-right">contact 1 - surname:</label>
                                                   <div class="col-md-12">
                                                      <input id="em_last_name" type="text" class="form-control" name="em_last_name" value="">
                                                   </div>
                                                </div>
                                                <div class="form-group row">
                                                   <label class="col-md-12 col-form-label text-md-right">contact 1 - tel number:</label>
                                                   <div class="col-md-12">
                                                      <input id="em_phone" type="tel" class="form-control" name="em_phone" value="">
                                                   </div>
                                                </div>
                                                <div class="form-group row">
                                                   <label class="col-md-12 col-form-label text-md-right">contact 1 - email:</label>
                                                   <div class="col-md-12">
                                                      <input id="em_email" type="email" class="form-control" name="em_email" value="" >
                                                   </div>
                                                </div>
                                                <div class="form-group row f-g-full">
                                                   <div class="form-radios">
                                                      <div class="col-sm-7">
                                                         <p style="display: inline-block; font-weight: 500; margin-right: 15px;">I confirm that the information given above is accurate and correct to the best of my knowledge at the time of registration. I also confirm that if any of the details change, I will amend the form to reflect these changes.</p>
                                                      </div>
                                                      <div class="col-sm-5">
                                                         <div class="cstm-radio"> 
                                                            <input type="radio" name="correct_info_type" id="confirm_accurate_yes"> <label for="confirm_accurate_yes">Yes</label> 
                                                         </div>
                                                         <div class="cstm-radio"> 
                                                            <input type="radio" name="correct_info_type" id="confirm_accurate_no"> <label for="confirm_accurate_no">No</label> 
                                                         </div>
                                                         <input type="hidden" name="correct_info" id="correct_info" value="">
                                                      </div>
                                                   </div>
                                                   <div class="col-sm-12" style="margin-top: 15px;">
                                                      <p><b style="display: block;">Please note:</b>
                                                         You may be asked to confirm the above details are all correct before being able to complete future bookings.
                                                      </p>
                                                      <!-- <a href="javascript:void(0);" id="medical_info_to_next" class="cstm-btn" style="margin: 10px 0;">Complete registration</a> -->

                                                      <button id="medical_info_to_next" class="cstm-btn" style="margin: 10px 0;">Go to next section</button>
                                                   </div>
                                                </div>
                                             </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingThree">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                <span>3</span> Medical and behavioural
                            </button>
                            <div class="cstm-radio">
                                <input type="radio" name="type" data-type="child" id="tab3">
                                <label for="tab3"></label>
                            </div>
                        </h5>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                        <div class="card-body">
                            <div class="register-sec form-register-sec">
                                <div class="form-partition">
                                    <form class="register-form contact_form medicical-form" method="POST">
                                        <div class="child-selection-content" style="display: none;">
                                            <p class="sub_headings">Medical and behavioural</p>
                                            <div class="row">
                                                <div class="col-md-12 option_row consent-option-row">
                                                    <div class="form-group row ">
                                                        <div class="form-radios">
                                                            <p style="display: inline-block; font-weight: 400; margin-right: 15px;">Is
                                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex.</p>
                                                        </div>
                                                        <div class="radio-wrap">
                                                            <div class="cstm-radio">
                                                                <input type="radio" name="book_person_type" id="medical-yes">
                                                                <label for="medical-yes">Yes</label>
                                                            </div>
                                                            <div class="cstm-radio">
                                                                <input type="radio" name="book_person_type" id="medical-no"> <label for="medical-no">No</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row address-detail">
                                                    <label for="address" class="col-md-12 col-form-label text-md-right"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</label>
                                                    <div class="col-md-12">
                                                        <textarea class="form-control" class="form-control" rows="5"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 button-row">
                                                    <button type="button" class="cstm-btn">Save Section</button>
                                                </div>
                                                <div class="col-md-12 option_row consent-option-row">
                                                    <div class="form-group row ">
                                                        <div class="form-radios">
                                                            <p style="display: inline-block; font-weight: 400; margin-right: 15px;">Is
                                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex.</p>
                                                        </div>
                                                        <div class="radio-wrap">
                                                            <div class="cstm-radio">
                                                                <input type="radio" name="book_person_type" id="medical-yes1">
                                                                <label for="medical-yes1">Yes</label>
                                                            </div>
                                                            <div class="cstm-radio">
                                                                <input type="radio" name="book_person_type" id="medical-no1"> <label for="medical-no1">No</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row address-detail">
                                                    <label for="address" class="col-md-12 col-form-label text-md-right"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</label>
                                                    <div class="col-md-12">
                                                        <textarea class="form-control" class="form-control" rows="5"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 option_row consent-option-row">
                                                    <div class="form-group row ">
                                                        <div class="form-radios">
                                                            <p style="display: inline-block; font-weight: 400; margin-right: 15px;">Is
                                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex.</p>
                                                        </div>
                                                        <div class="radio-wrap">
                                                            <div class="cstm-radio">
                                                                <input type="radio" name="book_person_type" id="medical-yes2">
                                                                <label for="medical-yes2">Yes</label>
                                                            </div>
                                                            <div class="cstm-radio">
                                                                <input type="radio" name="book_person_type" id="medical-no2"> <label for="medical-no2">No</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row address-detail">
                                                    <label for="address" class="col-md-12 col-form-label text-md-right"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</label>
                                                    <div class="col-md-12">
                                                        <textarea class="form-control" class="form-control" rows="5"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 option_row consent-option-row">
                                                    <div class="form-group row ">
                                                        <div class="form-radios">
                                                            <p style="display: inline-block; font-weight: 400; margin-right: 15px;">Is
                                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex.</p>
                                                        </div>
                                                        <div class="radio-wrap">
                                                            <div class="cstm-radio">
                                                                <input type="radio" name="book_person_type" id="medical-yes3">
                                                                <label for="medical-yes3">Yes</label>
                                                            </div>
                                                            <div class="cstm-radio">
                                                                <input type="radio" name="book_person_type" id="medical-no3"> <label for="medical-no3">No</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row address-detail">
                                                    <label for="address" class="col-md-12 col-form-label text-md-right"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</label>
                                                    <div class="col-md-12">
                                                        <textarea class="form-control" class="form-control" rows="5"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 option_row consent-option-row">
                                                    <div class="form-group row ">
                                                        <div class="form-radios">
                                                            <p style="display: inline-block; font-weight: 400; margin-right: 15px;">Is
                                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex.</p>
                                                        </div>
                                                        <div class="radio-wrap">
                                                            <div class="cstm-radio">
                                                                <input type="radio" name="book_person_type" id="medical-yes4">
                                                                <label for="medical-yes4">Yes</label>
                                                            </div>
                                                            <div class="cstm-radio">
                                                                <input type="radio" name="book_person_type" id="medical-no4"> <label for="medical-no4">No</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 option_row consent-option-row">
                                                    <div class="form-group row ">
                                                        <div class="form-radios">
                                                            <p class="inner_head"><strong>Is
                                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</strong></p>
                                                            <p style="display: inline-block; font-weight: 400; margin-right: 15px;">Is
                                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex.</p>
                                                        </div>
                                                        <div class="radio-wrap">
                                                            <div class="cstm-radio">
                                                                <input type="radio" name="book_person_type" id="medical-yes">
                                                                <label for="medical-yes">Yes</label>
                                                            </div>
                                                            <div class="cstm-radio">
                                                                <input type="radio" name="book_person_type" id="medical-no"> <label for="medical-no">No</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row address-detail">
                                                    <label for="address" class="col-md-12 col-form-label text-md-right"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</label>
                                                    <div class="col-md-12">
                                                        <textarea class="form-control" class="form-control" rows="5"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="adult-selection-content">
                                            <p class="sub_headings">Medical and behavioural</p>
                                            <div class="row">
                                                <div class="col-md-12 option_row consent-option-row">
                                                    <div class="form-group row ">
                                                        <div class="form-radios">
                                                            <p style="display: inline-block; font-weight: 400; margin-right: 15px;">Is
                                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex.</p>
                                                        </div>
                                                        <div class="radio-wrap">
                                                            <div class="cstm-radio">
                                                                <input type="radio" name="book_person_type" id="medical-yes">
                                                                <label for="medical-yes">Yes</label>
                                                            </div>
                                                            <div class="cstm-radio">
                                                                <input type="radio" name="book_person_type" id="medical-no"> <label for="medical-no">No</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row address-detail">
                                                    <label for="address" class="col-md-12 col-form-label text-md-right"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</label>
                                                    <div class="col-md-12">
                                                        <textarea class="form-control" class="form-control" rows="5"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 button-row">
                                                    <button type="button" class="cstm-btn">Save Section</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingfour">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapsefour" aria-expanded="false" aria-controls="collapsefour">
                                <span>4</span> consents
                            </button>
                            <div class="cstm-radio">
                                <input type="radio" name="type" data-type="child" id="tab4">
                                <label for="tab4"></label>
                            </div>
                        </h5>
                    </div>
                    <div id="collapsefour" class="collapse" aria-labelledby="headingfour" data-parent="#accordion">
                        <div class="card-body">
                            <div class="register-sec form-register-sec">
                                <div class="form-partition">
                                    <form class="register-form contact_form" method="POST">
                                        <div class="col-md-12 option_row consent-option-row">
                                            <div class="form-group row ">
                                                <div class="form-radios">
                                                    <p style="display: inline-block; font-weight: 400; margin-right: 15px;">Is
                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex.</p>
                                                </div>
                                                <div class="radio-wrap">
                                                    <div class="cstm-radio">
                                                        <input type="radio" name="book_person_type" id="book_person_yesc">
                                                        <label for="book_person_yesc">Yes</label>
                                                    </div>
                                                    <div class="cstm-radio">
                                                        <input type="radio" name="book_person_type" id="book_person_noc"> <label for="book_person_noc">No</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 option_row consent-option-row">
                                            <div class="form-group row ">
                                                <div class="form-radios">
                                                    <p style="display: inline-block; font-weight:400; margin-right: 15px;">
                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                                        cillum dolore eu.</p>
                                                </div>
                                                <div class="radio-wrap">
                                                    <div class="cstm-radio">
                                                        <input type="radio" name="book_person_type" id="book_person_yes1">
                                                        <label for="book_person_yes1">Yes</label>
                                                    </div>
                                                    <div class="cstm-radio">
                                                        <input type="radio" name="book_person_type" id="last-tab">
                                                        <label for="last-tab">No</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-10">
                                            <p class="impor-note"><span>lorme lorem </span>didunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,didunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>
                                        </div>
                                        <div class="col-md-12 contact_form_row">
                                            <button type="button" class="cstm-btn">Save Section</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
<!-- Course Dates Management -->
<script type="text/javascript">
function addmedical() {
    var number = parseInt($("#noOfMed").val());
    var newnumber = number + 1;
    $("#noOfMed").val(newnumber);

    var mainHtml = '<div class="form-group col-md-12 f-g-full label-textarea" id="med_cond_info" style="display:block;"><label>Please state the name of the medical condition and describe how it affects this child.</label><textarea spellcheck="false" name="med_cond_info[' + newnumber + ']" id="med_con_data"></textarea></div>';

    $("#sec_med_con").append(mainHtml);
}

function addallergy() {
    var numb = parseInt($("#noOfAllergy").val());
    var newnumb = numb + 1;
    $("#noOfAllergy").val(newnumb);

    var mainHtml = '<div class="form-group col-md-12 f-g-full label-textarea" id="allergies_info"><label>Please state the name of the allergy and describe how it affects this child.</label><textarea spellcheck="false" name="allergies_info[' + newnumb + ']" id="allergies_data"></textarea></div>';

    $("#sec_all").append(mainHtml);
}

function addcontact() {
    var num = parseInt($("#noOfContact").val());
    var newnum = num + 1;
    $("#noOfContact").val(newnum);

    var mainHtml = '<div id="contact_section" class="contact_section[' + newnum + ']"><div class="col-sm-12"><h5 style="width: 100%;">Contact ' + newnum + ':</h5><p>This is the adult we expect to be the main person picking up and dropping off this child from the activity.</p></div><div class="form-group row"><label class="col-md-12 col-form-label text-md-right">contact ' + newnum + ' - first name:</label><div class="col-md-12"><input id="con_first_name" type="text" class="form-control" name="con_first_name[' + newnum + ']" value=""></div></div>';

    mainHtml += '<div class="form-group row"><label class="col-md-12 col-form-label text-md-right">contact ' + newnum + ' - surname:</label><div class="col-md-12"><input id="con_last_name" type="text" class="form-control" name="con_last_name[' + newnum + ']" value=""></div></div>';

    mainHtml += '<div class="form-group row"><label class="col-md-12 col-form-label text-md-right">contact ' + newnum + ' - tel number:</label><div class="col-md-12"><input id="con_phone" type="tel" class="form-control" name="con_phone[' + newnum + ']" value=""></div></div>';

    mainHtml += '<div class="form-group row"><label class="col-md-12 col-form-label text-md-right">contact ' + newnum + ' - email:</label><div class="col-md-12"><input id="con_email" type="email" class="form-control" name="con_email[' + newnum + ']" value="" ></div></div>';

    mainHtml += '<div class="form-group row"><label for="relation" class="col-md-12 col-form-label text-md-right">What is this persons relationship to the child?</label><div class="col-md-12"><link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"><select id="con_relation" name="con_relation[' + newnum + ']" class="form-control cstm-select-list"><option selected="" disabled="" value="">Please Choose</option><option value="Mother">Mother</option><option value="Father">Father</option><option value="Grandparent">Grandparent</option><option value="Guardian">Guardian</option><option value="Spouse">Spouse/Partner</option></select></div></div>';

    mainHtml += '<div class="form-group row"><label class="col-md-12 col-form-label text-md-right">If you choose other who are they?</label><div class="col-md-12"><input id="con_if_other" type="text" class="form-control" name="con_if_other[' + newnum + ']" value="" ></div></div></div>';

    $("#sec_contact").append(mainHtml);

    var contact_count = $("#noOfContact").val();
    if (contact_count >= '4') {
        $('.additional_contact').css('display', 'none');
    }
}
</script>