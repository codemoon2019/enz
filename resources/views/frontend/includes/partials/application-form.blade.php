<div class="modal fade" id="myModal">

    <div class="modal-dialog modal-lg">
    
        <div class="modal-content">

            <div class="modal-body p0">
                
                <div class="block">
                    
                    <div class="item">
                        
                        <div class="card text-left">
                            
                            <div class="card-header linear-gradient-teal">
                                
                                <button type="button" class="close pull-right text-white" data-dismiss="modal">&times;</button>
                                
                                <h2 class="card-title fs18 text-white mb0">Application Form</h2>
                
                            </div>
                
                            <div class="card-body relative linear-gradient-grey">
            
                                <form action="{{ route('frontend.applications.inquiry') }}" method="post" id="application-inquiry-form" enctype="multipart/form-data">
                
                                    {{ csrf_field() }}
                            
                                    <div class="form">
                            
                                      <div class="row">
                            
                                        <div class="col-sm-6">
                            
                                            <div class="form-group">
                            
                                              <label for="">Full Name</label>
                            
                                              <input type="text" name="full_name" id="application_full_name" class="form-control application-inquiry-field" placeholder="" />
                            
                                            </div>
                            
                                            <div class="form-group">
                            
                                              <label for="">Email Address</label>
                            
                                              <input type="email" name="email_address" id="application_email_address" class="form-control application-inquiry-field" placeholder="" />
                            
                                            </div>
                            
                                            <div class="form-group">
                            
                                              <label for="">Mobile Number</label>
                            
                                              <input type="text" name="mobile_number" id="application_mobile_number" class="form-control application-inquiry-field" placeholder="" />
                            
                                            </div>
                            
                                            <div class="form-group">
                            
                                              <label for="">Address</label>
                            
                                              <input type="text" name="address" id="application_address" class="form-control application-inquiry-field" placeholder="" />
                            
                                            </div>
                            
                                            <div class="form-group">
                            
                                              <label for="">Employment Status</label>
                            
                                              <input type="text" name="employment_status" id="application_employment_status" class="form-control application-inquiry-field" placeholder="" />
                            
                                            </div>
                            
                                        </div>
                            
                                        <div class="col-sm-6">
                            
                                          <div class="form-group">
                            
                                            <label for="">Message</label>
                            
                                            <textarea name="message" id="application_message" cols="30" rows="10" class="form-control application-inquiry-field"></textarea>
                            
                                          </div>
                           
                                          <div class="form-group">
                           
                                            <label for="">Resume / Curriculum Vitae</label><br />
                           
                                            <input type="file" name="resume" id="resume" class="inputfile" data-multiple-caption="{count} files selected" multiple />
                           
                                            <label class="btn btnread-more text-uppercase application-inquiry-field" id="application_resume" for="resume" style="height: auto"><span>Choose file</span></label>

                                            <span class="application-resume fs12" style="color: red;"></span>

                                          </div>
        
                                            <div class="form-group text-center">

                                                <div style="width: max-content;" class="application-inquiry-field" id="application_g-recaptcha-response">

                                                    {!! Captcha::display() !!}

                                                </div>
                
                                            </div>
                           
                                          <div class="form-group" style="display: none;">
                                    
                                            <input type="text" name="career_id" id="career">

                                          </div>
                           
                                        </div>
                           
                                      </div>
                           
                                      <div class="text-center mt30">
                          
                                        <button type="button" class="btn btnview-more text-uppercase application-inquiry-submit">Submit</button>
                          
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

    $('.application-btn').click(function(){

        $('#career').val($(this).attr('data-id'));

    });


    $('.application-inquiry-submit').click(function(){

        el = $(this);

        el.attr('disabled', true).html('Please wait..');

        $('.application-resume').html('');

        $('.application-inquiry-field').css('border', 'unset');

        $('#application-inquiry-form').ajaxForm({

            success: function(){

                location.reload();

            }, error: function(data){

                grecaptcha.reset();
                
                el.attr('disabled', false).html('Submit');

                $.each(data.responseJSON['errors'], function(k, v){

                    if(k == 'resume'){

                      $('.application-resume').html(v[0]);

                    }

                    $('#application_' + k).css('border', '2px solid #d27070');

                });


            }

        }).submit();

        // $('.inquiry-field').css('border', 'unset');

        // let fields = ['application_full_name', 'application_employment_status', 'application_email_address', 'application_mobile_number', 'application_address', 'application_message'];

        // let submit = true;

        // $.each(fields, function(k, v){

        //     el = $('#' + v);

        //     if (el.val() == null || el.val() == '') {

        //         el.css('border', '2px solid #d27070');

        //         submit = false;

        //     }

        //     if (v == 'application_email_address') {

        //         var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

        //         if (! re.test(String(el.val()).toLowerCase())) {
                    
        //             el.css('border', '2px solid #d27070');

        //             submit = false;

        //         }

        //     }

        // });

        // if (submit) {

        //     $('#course-inquiry-form').submit();
            
        // }

    });


</script>

@endpush