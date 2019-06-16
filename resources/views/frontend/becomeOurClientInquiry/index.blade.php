@extends('frontend.layouts.app')

@section('page_class', "page page-apply become-our-client")

@push('after-styles')

<style>

.score-div{
    display: none;
}
    
</style>

@endpush

@section('content')

    <div class="banner-block banner relative">

        <div class="container-fluid px180 mb30 pt50">
        
            <h1 class="title title-large text-black text-capitalize text-center">Become Our Client</h1>
        
        </div>
    
    </div>
    
    <div class="block content-block" data-aos="zoom-in">

        <form action="{{ route('frontend.become-our-client-inquiries.inquiry') }}" method="post" id="client-form" enctype="multipart/form-data">

            {{ csrf_field() }}
            
            <div class="container-fluid py80 px180 text-center">

                <div class="item mb30">
                
                    <div class="card text-left">
                
                        <div class="card-header linear-gradient-teal">
                
                            <h2 class="card-title fs18 text-white mb0">Personal Details</h2>
                
                        </div>
                
                        <div class="card-body relative linear-gradient-grey">
                
                            <div class="row">
                
                              <div class="col-sm-12 form-group">
                
                                <label class="title fs14 text-black" for="">First Name <span class="text-danger">*</span></label>
                
                                <input type="text" class="form-control client-field" name="first_name" id="first_name" placeholder="">
                
                              </div>
                
                              <div class="col-sm-12 form-group">
               
                                <label class="title fs14 text-black" for="">Last Name <span class="text-danger">*</span></label>
               
                                <input type="text" class="form-control client-field" name="last_name" id="last_name" placeholder="">
               
                              </div>
               
                              <div class="col-sm-12 form-group">
               
                                <label class="title fs14 text-black" for="">Middle Name <span class="text-danger">*</span></label>
               
                                <input type="text" class="form-control client-field" name="middle_name" id="middle_name" placeholder="">
               
                              </div>
               
                              <div class="col-sm-12 form-group">
               
                                <label class="title fs14 text-black" for="">Date of Birth <span class="text-danger">*</span></label><br />
               
                                <select class="form-control fs14 w-auto mr5 d-inline client-field" id="month" name="month">
               
                                    <option selected disabled>Month</option>
               
                                    @foreach (['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec', ] as $month)
               
                                        <option>{{ $month }}</option>
               
                                    @endforeach
               
                                </select>
               
                                <select class="form-control fs14 w-auto mr5 d-inline client-field" id="day" name="day">
               
                                    <option selected disabled>Day</option>
               
                                    @for ($i = 1; $i <= 31; $i++)
               
                                        <option>{{ $i }}</option>
               
                                    @endfor
               
                                </select>
               
                                <select class="form-control fs14 w-auto mr5 d-inline client-field" id="year" name="year">
               
                                    <option selected disabled>Year</option>
               
                                    @for ($i = now()->format('Y'); $i >= 1960 ; $i--)
               
                                        <option>{{ $i }}</option>
               
                                    @endfor
               
                                </select>
               
                              </div>
               
                              <div class="col-sm-12 form-group">
               
                                <label class="title fs14 text-black" for="">Country of Birth <span class="text-danger">*</span></label>
               
                                <input type="text" class="form-control client-field" name="country_birth" id="country_birth" placeholder="">
               
                              </div>
               
                              <div class="col-sm-12 form-group">
               
                                <label class="title fs14 text-black" for="">Passport Number <span class="text-danger">*</span></label>
               
                                <input type="text" class="form-control client-field" name="passport_number" id="passport_number" placeholder="">
               
                              </div>
               
                              <div class="col-sm-12 form-group">
               
                                    <label class="title fs14 text-black" for="">Citizenship <span class="text-danger">*</span></label>
               
                                    <input type="text" class="form-control client-field" name="citizenship" id="citizenship" placeholder="">
               
                                </div>
               
                              <div class="col-sm-12 form-group">
               
                                <label class="title fs14 text-black" for="">Civil Status <span class="text-danger">*</span></label><br />
               
                                <label class="control control--radio">Single
               
                                    <input type="radio" name="civil_status" value="single" checked />
               
                                    <div class="control__indicator"></div>
               
                                </label><br />
               
                                <label class="control control--radio">Married
               
                                    <input type="radio" name="civil_status" value="married" />
               
                                    <div class="control__indicator"></div>
               
                                </label><br />
               
                                <label class="control control--radio">De Facto
               
                                    <input type="radio" name="civil_status" value="de facto" />
               
                                    <div class="control__indicator"></div>
               
                                </label><br />
               
                                <label class="control control--radio">Widowed
               
                                    <input type="radio" name="civil_status" value="widowed" />
               
                                    <div class="control__indicator"></div>
               
                                </label>
               
                              </div>
               
                              <div class="col-sm-12 form-group">
               
                                <label class="title fs14 text-black" for="">Gender <span class="text-danger">*</span></label><br />
               
                                <label class="control control--radio">Male
               
                                    <input type="radio" name="gender" value="male" checked />
               
                                    <div class="control__indicator"></div>
               
                                </label><br />
               
                                <label class="control control--radio">Female
               
                                    <input type="radio" name="gender" value="female" />
               
                                    <div class="control__indicator"></div>
               
                                </label>
               
                              </div>
               
                              <div class="col-sm-12 form-group">
               
                                <label class="title fs14 text-black" for="">Expiry Date <span class="text-danger">*</span></label><br />
               
                                <select class="form-control fs14 w-auto mr5 d-inline client-field" id="expiry_month" name="expiry_month">
               
                                    <option selected disabled>Month</option>
               
                                    @foreach (['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec', ] as $month)
               
                                        <option>{{ $month }}</option>
               
                                    @endforeach

                                </select>

                                <select class="form-control fs14 w-auto mr5 d-inline client-field" id="expiry_day" name="expiry_day">

                                    <option selected disabled>Day</option>

                                    @for ($i = 1; $i <= 31; $i++)

                                        <option>{{ $i }}</option>

                                    @endfor

                                </select>

                                <select class="form-control fs14 w-auto mr5 d-inline client-field" id="expiry_year" name="expiry_year">

                                    <option selected disabled>Year</option>

                                    @for ($i = now()->format('Y'); $i <= now()->format('Y') + 10; $i++)

                                        <option>{{ $i }}</option>

                                    @endfor

                                </select>

                              </div>
                              
                          </div>

                        </div>

                    </div>

                </div>

                <div class="item mb30">

                    <div class="card text-left">

                        <div class="card-header linear-gradient-teal">

                            <h2 class="card-title fs18 text-white mb0">Contact Details</h2>

                        </div>

                        <div class="card-body relative linear-gradient-grey">

                            <div class="row">

                                <div class="col-sm-12 form-group">

                                    <label class="title fs14 text-black" for="">Street Number <span class="text-danger">*</span></label>

                                    <input type="text" class="form-control client-field" name="street_number" id="street_number" placeholder="">

                                </div>

                                <div class="col-sm-12 form-group">

                                    <label class="title fs14 text-black" for="">Street Name <span class="text-danger">*</span></label>

                                    <input type="text" class="form-control client-field" name="street_name" id="street_name" placeholder="">

                                </div>

                                <div class="col-sm-12 form-group">

                                    <label class="title fs14 text-black" for="">Town/City <span class="text-danger">*</span></label>

                                    <input type="text" class="form-control client-field" name="town" id="town" placeholder="">

                                </div>

                                <div class="col-sm-12 form-group">

                                    <label class="title fs14 text-black" for="">Province <span class="text-danger">*</span></label>

                                    <input type="text" class="form-control client-field" name="province" id="province" placeholder="">

                                </div>

                                <div class="col-sm-12 form-group">

                                    <label class="title fs14 text-black" for="">ZIP Code <span class="text-danger">*</span></label>

                                    <input type="text" class="form-control client-field" name="zip_code" id="zip_code" placeholder="">

                                </div>

                                <div class="col-sm-12 form-group">

                                    <label class="title fs14 text-black" for="">Email <span class="text-danger">*</span></label>

                                    <input type="email" class="form-control client-field" name="email" id="email" placeholder="">

                                </div>

                                <div class="col-sm-12 form-group">

                                    <label class="title fs14 text-black" for="">Mobile Number <span class="text-danger">*</span></label>

                                    <input type="text" class="form-control client-field" name="mobile_number" id="mobile_number" placeholder="">

                                </div>

                                <div class="col-sm-12 form-group">

                                    <label class="title fs14 text-black" for="">Telephone Number <span class="text-danger">*</span></label>

                                    <input type="text" class="form-control client-field" name="telephone_number" id="telephone_number" placeholder="">

                                </div>
                                
                            </div>

                        </div>

                    </div>

                </div>

                <div class="item mb30">

                    <div class="card text-left">

                        <div class="card-header linear-gradient-teal">

                            <h2 class="card-title fs18 text-white mb0">Education Details</h2>

                        </div>

                        <div class="card-body relative linear-gradient-grey">

                            <div class="table-responsive for-desktop">

                                <table class="table table-stipped">

                                    <thead>

                                        <tr>

                                            <th class="title fs14 text-black">Level</th>

                                            <th class="title fs14 text-black">School <span class="text-danger">*</span></th>

                                            <th class="title fs14 text-black">From <span class="text-danger">*</span></th>

                                            <th class="title fs14 text-black">To <span class="text-danger">*</span></th>

                                        </tr>

                                    </thead>

                                    <tbody>

                                        <tr>

                                            <td>Elementary</td>

                                            <td>

                                                <input type="text" class="form-control" name="elementary_school" id="" placeholder="" required>

                                            </td>

                                            <td>

                                                <input type="text" class="form-control" name="elementary_from" id="" placeholder="" required>

                                            </td>

                                            <td>

                                                <input type="text" class="form-control" name="elementary_to" id="" placeholder="" required>

                                            </td>

                                        </tr>

                                        <tr>

                                            <td>High School</td>

                                            <td>

                                                <input type="text" class="form-control" name="high_school_school" id="" placeholder="" required>

                                            </td>

                                            <td>

                                                <input type="text" class="form-control" name="high_school_from" id="" placeholder="" required>

                                            </td>

                                            <td>

                                                <input type="text" class="form-control" name="high_school_to" id="" placeholder="" required>

                                            </td>

                                        </tr>

                                        <tr>

                                            <td>Tertiary</td>

                                            <td>

                                                <input type="text" class="form-control" name="tertiary_school" id="" placeholder="" required>

                                            </td>

                                            <td>

                                                <input type="text" class="form-control" name="tertiary_from" id="" placeholder="" required>

                                            </td>

                                            <td>

                                                <input type="text" class="form-control" name="tertiary_to" id="" placeholder="" required>

                                            </td>

                                        </tr>

                                    </tbody>

                                </table>

                            </div>
                            <div class="for-mobile">

                                <div class="row">
                                    <div class="col-sm-12 form-group">

                                        <label class="title fs14 text-black" for="">Level: Elementary</label>
                                        
                                        <input type="text" class="form-control client-field" name="street_number" id="street_number" placeholder="">
    
                                    </div>

                                    <div class="col-sm-12 form-group">

                                        <label class="title fs14 text-black" for="">School <span class="text-danger">*</span></label>
                                        
                                        <input type="text" class="form-control client-field" name="street_number" id="street_number" placeholder="">
    
                                    </div>

                                    <div class="col-sm-12 form-group">

                                        <label class="title fs14 text-black" for="">From <span class="text-danger">*</span></label>
                                        
                                        <input type="text" class="form-control client-field" name="street_number" id="street_number" placeholder="">
    
                                    </div>

                                    <div class="col-sm-12 form-group">

                                        <label class="title fs14 text-black" for="">To <span class="text-danger">*</span></label>
                                        
                                        <input type="text" class="form-control client-field" name="street_number" id="street_number" placeholder="">
    
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 form-group">

                                        <label class="title fs14 text-black" for="">Level: High School</label>
                                        
                                        <input type="text" class="form-control client-field" name="street_number" id="street_number" placeholder="">
    
                                    </div>

                                    <div class="col-sm-12 form-group">

                                        <label class="title fs14 text-black" for="">School <span class="text-danger">*</span></label>
                                        
                                        <input type="text" class="form-control client-field" name="street_number" id="street_number" placeholder="">
    
                                    </div>

                                    <div class="col-sm-12 form-group">

                                        <label class="title fs14 text-black" for="">From <span class="text-danger">*</span></label>
                                        
                                        <input type="text" class="form-control client-field" name="street_number" id="street_number" placeholder="">
    
                                    </div>

                                    <div class="col-sm-12 form-group">

                                        <label class="title fs14 text-black" for="">To <span class="text-danger">*</span></label>
                                        
                                        <input type="text" class="form-control client-field" name="street_number" id="street_number" placeholder="">
    
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 form-group">

                                        <label class="title fs14 text-black" for="">Level: Tertiary</label>
                                        
                                        <input type="text" class="form-control client-field" name="street_number" id="street_number" placeholder="">
    
                                    </div>

                                    <div class="col-sm-12 form-group">

                                        <label class="title fs14 text-black" for="">School <span class="text-danger">*</span></label>
                                        
                                        <input type="text" class="form-control client-field" name="street_number" id="street_number" placeholder="">
    
                                    </div>

                                    <div class="col-sm-12 form-group">

                                        <label class="title fs14 text-black" for="">From <span class="text-danger">*</span></label>
                                        
                                        <input type="text" class="form-control client-field" name="street_number" id="street_number" placeholder="">
    
                                    </div>

                                    <div class="col-sm-12 form-group">

                                        <label class="title fs14 text-black" for="">To <span class="text-danger">*</span></label>
                                        
                                        <input type="text" class="form-control client-field" name="street_number" id="street_number" placeholder="">
    
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="item mb30">

                    <div class="card text-left">

                        <div class="card-header linear-gradient-teal">

                            <h2 class="card-title fs18 text-white mb0">Employment Status</h2>

                        </div>

                        <div class="card-body relative linear-gradient-grey">

                            <label class="control control--radio">Employed

                                <input type="radio" name="employment_status" value="Employed" checked />

                                <div class="control__indicator"></div>

                            </label><br />

                            <label class="control control--radio">Self Employed

                                <input type="radio" name="employment_status" value="Self Employed" />

                                <div class="control__indicator"></div>

                            </label><br />

                            <label class="control control--radio">Unemployed

                                <input type="radio" name="employment_status" value="Unemployed" />

                                <div class="control__indicator"></div>

                            </label><br />

                            <div class="employment-status-div">
                                <div class="form-group">
                                    <label class="title fs14 text-black" class="employment_name">Employer <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control client-field" name="employment_status_name" id="employment_status_name">
                                </div>
                                <div class="form-group">
                                    <label class="title fs14 text-black">From <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control client-field" name="employment_status_from" id="employment_status_from">
                                </div>
                                <div class="form-group">
                                    <label class="title fs14 text-black">To <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control client-field" name="employment_status_to" id="employment_status_to">
                                </div>
    
                            </div>
                        </div>



                    </div>

                </div>

                <div class="item mb30">

                    <div class="card text-left">

                        <div class="card-header linear-gradient-teal">

                            <h2 class="card-title fs18 text-white mb0">Interview</h2>

                        </div>

                        <div class="card-body relative linear-gradient-grey">

                            <label class="control control--radio">Skype Interview

                                <input type="radio" name="interview" value="Skype Interview" checked />

                                <div class="control__indicator"></div>

                            </label><br />

                            <label class="control control--radio">Face to face

                                <input type="radio" name="interview" value="Face to face" />

                                <div class="control__indicator"></div>

                            </label><br />

                            <label class="control control--radio">Telephone

                                <input type="radio" name="interview" value="Telephone" />

                                <div class="control__indicator"></div>

                            </label><br />

                        </div>

                    </div>

                </div>

                <div class="item mb30">

                    <div class="card text-left">

                        <div class="card-header linear-gradient-teal">

                            <h2 class="card-title fs18 text-white mb0">English Test Result</h2>

                        </div>

                        <div class="card-body relative linear-gradient-grey">

                            <label class="control control--radio">IELTS

                                <input type="radio" name="english_test_result" value="IELTS" />

                                <div class="control__indicator"></div>

                            </label><br />

                            <label class="control control--radio">PEARSON PTE

                                <input type="radio" name="english_test_result" value="PEARSON PTE" />

                                <div class="control__indicator"></div>

                            </label><br />

                            <label class="control control--radio">TOEFL

                                <input type="radio" name="english_test_result" value="TOEFL" />

                                <div class="control__indicator"></div>

                            </label><br />

                            <label class="control control--radio">TOEFL iBT

                                <input type="radio" name="english_test_result" value="TOEFL iBT" />

                                <div class="control__indicator"></div>

                            </label><br />

                            <label class="control control--radio">OET

                                <input type="radio" name="english_test_result" value="OET" />

                                <div class="control__indicator"></div>

                            </label><br />

                            <label class="control control--radio">No English Test Yet

                                <input type="radio" name="english_test_result" value="0" checked />

                                <div class="control__indicator"></div>

                            </label><br />

                            <div class="form-group score-div">

                                <label class="title fs14 text-black" for="">Score <span class="text-danger">*</span></label>

                                <input type="text" class="form-control client-field" name="score" id="score" placeholder="" required>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="item mb30">

                    <div class="card text-left">

                        <div class="card-header linear-gradient-teal">

                            <h2 class="card-title fs18 text-white mb0">Would you like to avail our free English Test Review?</h2>

                        </div>

                        <div class="card-body relative linear-gradient-grey">

                            <label class="control control--radio">Yes

                                <input type="radio" name="avail" value="true" checked />

                                <div class="control__indicator"></div>

                            </label><br />

                            <label class="control control--radio">No

                                <input type="radio" name="avail" value="false" />

                                <div class="control__indicator"></div>

                            </label>

                        </div>

                    </div>

                </div>

                <div class="item mb30">

                    <div class="card text-left">

                        <div class="card-header linear-gradient-teal">

                            <h2 class="card-title fs18 text-white mb0">Declaration</h2>

                        </div>

                        <div class="card-body relative linear-gradient-grey">

                            <label class="control control--checkbox">I declare that all the information and supporting documentations provided above are true and correct

                                <input type="checkbox" value="" name="declaration_1" id="declaration_1" />

                                <div class="control__indicator client-field" id="div_declaration_1"></div>

                            </label><br />

                            <label class="control control--checkbox">I declare that I have received a proper orientation and interview prior to my application

                                <input type="checkbox" value="" name="declaration_2" id="declaration_2" />

                                <div class="control__indicator client-field" id="div_declaration_2"></div>

                            </label><br />

                            <label class="control control--checkbox">I understand that all the fees and charges associated with my application is non-refundable

                                <input type="checkbox" value="" name="declaration_3" id="declaration_3" />

                                <div class="control__indicator client-field" id="div_declaration_3"></div>

                            </label><br />

                            <label class="control control--checkbox">

                                I understand that ENZ Education Consultancy Services does not guarantee any result of this application as my visa 
                                
                                application will be based on my GTE and Financial Capacity in undertaking my course in Australia
                                
                                <input type="checkbox" value="" name="declaration_4" id="declaration_4" />
                                
                                <div class="control__indicator client-field" id="div_declaration_4"></div>

                            </label><br />

                            <label class="control control--checkbox">I understand that ENZ Education Consultancy Services are not an employment agency

                                <input type="checkbox" value="" name="declaration_5" id="declaration_5" />

                                <div class="control__indicator client-field" id="div_declaration_5"></div>

                            </label><br />

                        </div>

                    </div>

                </div>

                <div class="item mb30">

                    <div class="card text-left">

                        <div class="card-header linear-gradient-teal">

                            <h2 class="card-title fs18 text-white mb0">Applicant</h2>

                        </div>

                        <div class="card-body relative linear-gradient-grey">

                            <div class="form-group">

                                <label for="">Applicant Signature <span class="text-danger">*</span></label><br />

                                <input type="file" name="file" id="file" class="inputfile" data-multiple-caption="{count} files selected" style="display: none;" />

                                <label class="btn btnread-more text-uppercase client-field" id="signature" for="file" style="height: auto"><span>Choose file</span></label>

{{--                                 <br>

                                <span style="">Please upload signature</span> --}}

                            </div>

                            {{-- <div class="form-group">

                                <label class="fs14 text-black" for="">Date <span class="text-danger">*</span></label><br />

                                <select class="form-control fs14 w-auto mr5 d-inline" id="">

                                    <option selected disabled>Month</option>

                                    <option>2</option>

                                    <option>3</option>

                                    <option>4</option>

                                </select>

                                <select class="form-control fs14 w-auto mr5 d-inline" id="">

                                    <option selected disabled>Date</option>

                                    <option>2</option>

                                    <option>3</option>

                                    <option>4</option>

                                </select>

                                <select class="form-control fs14 w-auto mr5 d-inline" id="">

                                    <option selected disabled>Year</option>

                                    <option>2</option>

                                    <option>3</option>

                                    <option>4</option>

                                </select>

                            </div> --}}

                        </div>

                    </div>

                </div>

                <div class=" text-center mb30">

                    <a href="javascript:;" class="btn btnread-more text-uppercase btn-apply">Apply</a>

                </div>

            </div>

        </form>

    </div>


@endsection

@push('after-scripts')

<script>
    
    $('input:radio[name="english_test_result"]').change(function(){

        $('.score-div').css('display', this.checked && this.value == '0' ? 'none' : 'block');
    
    });

    $('input:radio[name="employment_status"]').change(function(){

        $('.employment-status-div').css('display', 'block');

        if (this.checked && this.value == 'Unemployed') {

            $('.employment-status-div').css('display', 'none');
            
        }else if(this.checked && this.value == 'Self Employed'){

            $('.employment_name').html('Business Name');

        }else{

            $('.employment_name').html('Employer');
        
        }
    
    });

    $('.btn-apply').click(function(){

        $('.client-field').css('border', '1px solid #ced4da');

        let fields = [
            'first_name', 
            'last_name', 
            'middle_name', 
            'country_birth', 
            'passport_number', 
            'citizenship',
            'month',
            'day',
            'year',
            'expiry_month',
            'expiry_day',
            'expiry_year',
            'street_number',
            'street_name',
            'town',
            'province',
            'zip_code',
            'email',
            'mobile_number',
            'telephone_number',
        ];


        let english_test_result = $('[name="english_test_result"]:checked').val();
        
        let employment_status = $('[name="employment_status"]:checked').val();

        let declaration_1 = $('[name="declaration_1"]').prop('checked');

        let declaration_2 = $('[name="declaration_2"]').prop('checked');
        
        let declaration_3 = $('[name="declaration_3"]').prop('checked');
        
        let declaration_4 = $('[name="declaration_4"]').prop('checked');
        
        let declaration_5 = $('[name="declaration_5"]').prop('checked');

        let file = $('[name="file"]').val();


        if (! declaration_1) { fields.push('declaration_1'); }

        if (! declaration_2) { fields.push('declaration_2'); }
        
        if (! declaration_3) { fields.push('declaration_3'); }
        
        if (! declaration_4) { fields.push('declaration_4'); }
        
        if (! declaration_5) { fields.push('declaration_5'); }

        if (english_test_result != 0) { fields.push('score'); }

        if (file == '') { fields.push('signature'); }
        
        if (employment_status != 'Unemployed') { fields.push('employment_status_name', 'employment_status_from', 'employment_status_to'); }

        let submit = true;

        $.each(fields, function(k, v){

            el = $('#' + v);

            if (el.val() == null || el.val() == '') {

                el.css('border', '2px solid #d27070');

                if (v == 'declaration_1') { $('#div_declaration_1').css('border', '2px solid #d27070'); }

                if (v == 'declaration_2') { $('#div_declaration_2').css('border', '2px solid #d27070'); }
                
                if (v == 'declaration_3') { $('#div_declaration_3').css('border', '2px solid #d27070'); }
                
                if (v == 'declaration_4') { $('#div_declaration_4').css('border', '2px solid #d27070'); }
                
                if (v == 'declaration_5') { $('#div_declaration_5').css('border', '2px solid #d27070'); }

                submit = false;

            }

            if (v == 'email') {

                var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

                if (! re.test(String(el.val()).toLowerCase())) {
                    
                    el.css('border', '2px solid #d27070');

                    submit = false;

                }

            }

        });


        if (submit) {

            $('#client-form').submit();
            
        }

    });


</script>

@endpush