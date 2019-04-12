<form method="post" action="{{ route('frontend.contact.send') }}" id="contact-form">

	{{ csrf_field() }}

    <div class="row">

        <div class="col-sm-6">

            <div class="form-group">

                <label class="text-orange text-uppercase" for="">Full name:</label>

                <input type="text" class="basic form-control text-capitalize" id="full_name" name="full_name" placeholder="">

            </div>

        </div>

        <div class="col-sm-6">

            <div class="form-group">

                <label class="text-orange text-uppercase" for="">Email address:</label>

                <input type="email" class="basic form-control text-capitalize" id="email" name="email" placeholder="">

            </div>

        </div>

        <div class="col-sm-6 col-6">

            <div class="form-group">

                <label class="text-orange text-uppercase" for="">Phone number:</label>

                <input type="text" class="basic form-control text-capitalize" id="contact" name="contact" placeholder="">

            </div>

        </div>

        <div class="col-sm-6 col-6">

            <div class="form-group">

                <label class="text-orange text-uppercase" for="">Postcode:</label>

                <input type="text" class="basic form-control text-capitalize" id="postcode" name="postcode" placeholder="">

            </div>

        </div>

        <div class="col-sm-12">

            <div class="form-group">

                <label class="text-orange text-uppercase" for="">Message:</label>

                <textarea name="message" id="message" cols="30" rows="10" class="basic form-control" placeholder=""></textarea>

                <div class="custom-cb">

                    <label class="control control--checkbox"><span class="muted">

                            I have read and agree to the <a href="#" class="">Privacy Policy and Terms of use *</a>

                        </span>

                            <input type="checkbox" id="terms">

                            <div class="control__indicator"></div>

                    </label>

                </div>

            </div>

        </div>

        <div class="col-sm-12">

            <button type="button" class="btn btngreen-action text-uppercase inquiry-submit">Submit</button>

        </div>

    </div>

</form>


@push('after-scripts')

<script>
    
$('.inquiry-submit').click(function(){

    var fields = ['full_name', 'email', 'postcode', 'contact'];

    var submit = true;

    $('.form-control').css('border-bottom', '1px solid #ccc');

    $('.control__indicator').css('border', '1px solid #ccc');

    $('#message').css('border', '1px solid #ccc');

    $.each(fields, function(k, v){

        var el = $('#'+v);

        if(el.val() == null || el.val() == ''){

            submit = false;

            el.css('border-bottom', '1px solid #c55016');

        }

    });

    if (! $('#terms').prop('checked')) {
    
        submit = false;

        $('.control__indicator').css('border', '1px solid #c55016');
    
    }

    if ($('#message').val() == null || $('#message').val() == '') {
    
        submit = false;

        $('#message').css('border', '1px solid #c55016');
    
    }

    if (submit) {

        $('#contact-form').submit();

    }

});

</script>

@endpush