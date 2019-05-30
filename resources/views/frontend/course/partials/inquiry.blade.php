<div class="modal fade" id="myModal">

    <div class="modal-dialog modal-lg">
    
        <div class="modal-content">

            <div class="modal-body p0">
                
                <div class="block">
                    
                    <div class="item">
                        
                        <div class="card text-left">
                            
                            <div class="card-header linear-gradient-teal">
                                
                                <button type="button" class="close pull-right text-white" data-dismiss="modal">&times;</button>
                                
                                <h2 class="card-title fs18 text-white mb0">Got a Question?</h2>
                
                            </div>
                
                            <div class="card-body relative linear-gradient-grey">
            
                                <form action="{{ route('frontend.contact.send') }}" method="post" id="course-inquiry-form" enctype="multipart/form-data">
                
                                    {{ csrf_field() }}
                            
                                    <div class="form">
                            
                                      <div class="row">
                            
                                        <div class="col-sm-6">
                            
                                            <div class="form-group">
                            
                                              <label for="">Full Name</label>
                            
                                              <input type="text" name="full_name" id="course_full_name" class="form-control inquiry-field" placeholder="" />
                            
                                            </div>
                            
                                            <div class="form-group">
                            
                                              <label for="">Profession</label>
                            
                                              <input type="text" name="profession" id="course_profession" class="form-control inquiry-field" placeholder="" />
                            
                                            </div>
                            
                                            <div class="form-group">
                            
                                              <label for="">Email Address</label>
                            
                                              <input type="email" name="email_address" id="course_email_address" class="form-control inquiry-field" placeholder="" />
                            
                                            </div>
                            
                                            <div class="form-group">
                            
                                              <label for="">Mobile Number</label>
                            
                                              <input type="text" name="mobile_number" id="course_mobile_number" class="form-control inquiry-field" placeholder="" />
                            
                                            </div>
                            
                                            <div class="form-group">
                            
                                              <label for="">Location</label>
                            
                                              <input type="text" name="location" id="course_location" class="form-control inquiry-field" placeholder="" />
                            
                                            </div>
                            
                                        </div>
                            
                                        <div class="col-sm-6">
                            
                                          <div class="form-group">
                            
                                            <label for="">Inquiry</label>
                            
                                            <textarea name="inquiry" id="course_inquiry" cols="30" rows="10" class="form-control inquiry-field"></textarea>
                            
                                          </div>
                            
                                          <div class="form-group mb30">
                            
                                            <label for="">Would you like to book for a free consultation?</label><br />
                            
                                            <label class="control control--radio">Yes
                           
                                              <input type="radio" name="consultation" checked value="1" />
                           
                                              <div class="control__indicator"></div>
                           
                                            </label>
                           
                                            <label class="control control--radio">No
                           
                                              <input type="radio" name="consultation" value="0" />
                           
                                              <div class="control__indicator"></div>
                           
                                            </label>
                           
                                          </div>
                           
                                          <div class="form-group">
                           
                                            <label for="">Resume / Curriculum Vitae</label><br />
                           
                                            <input type="file" name="resume" id="course_file" class="inputfile" data-multiple-caption="{count} files selected" multiple />
                           
                                            <label class="btn btnread-more text-uppercase" for="course_file" style="height: auto"><span>Choose file</span></label>
                           
                                          </div>
                           
                                          <div class="form-group">

                                            {{-- {!! Captcha::display() !!} --}}

                                          </div>
                           
                                        </div>
                           
                                      </div>
                           
                                      <div class="text-center mt30">
                          
                                        <button type="button" class="btn btnview-more text-uppercase course-inquiry-submit">Submit</button>
                          
                                      </div>
                          
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

@push('after-scripts')

<script>

    $('.course-inquiry-submit').click(function(){

        $('.inquiry-field').css('border', 'unset');

        let fields = ['course_full_name', 'course_profession', 'course_email_address', 'course_mobile_number', 'course_location', 'course_inquiry'];

        let submit = true;

        $.each(fields, function(k, v){

            el = $('#' + v);

            if (el.val() == null || el.val() == '') {

                el.css('border', '2px solid #d27070');

                submit = false;

            }

            if (v == 'course_email_address') {

                var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

                if (! re.test(String(el.val()).toLowerCase())) {
                    
                    el.css('border', '2px solid #d27070');

                    submit = false;

                }

            }

        });

        if (submit) {

            $('#course-inquiry-form').submit();
            
        }

    });


</script>

@endpush