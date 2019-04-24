<footer id="footer" class="footer" data-anchor="footer">
    <section class="questions py80">
	    <div class="container-fluid relative">
        <div class="row">
            <div class="col-sm-3 left-content flags">
                <img class="img-fluid" src="{{asset('svg/flags.svg')}}" alt="">
            </div>
            <div class="col-sm-9 right-content px180">
                <h2 class="title fs40 text-nblue mb30">Got a Question?</h2>
                <div class="form">
                  <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                          <label for="">Full Name</label>
                          <input type="text" name="" id="" class="form-control" placeholder="" required />
                        </div>
                        <div class="form-group">
                          <label for="">Profession</label>
                          <input type="text" name="" id="" class="form-control" placeholder="" required />
                        </div>
                        <div class="form-group">
                          <label for="">Email Address</label>
                          <input type="email" name="" id="" class="form-control" placeholder="" required />
                        </div>
                        <div class="form-group">
                          <label for="">Mobile Number</label>
                          <input type="text" name="" id="" class="form-control" placeholder="" required />
                        </div>
                        <div class="form-group">
                          <label for="">Location</label>
                          <input type="text" name="" id="" class="form-control" placeholder="" required />
                        </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="">Inquiry</label>
                        <textarea name="" id="" cols="30" rows="10" class="form-control"></textarea>
                      </div>
                      <div class="form-group mb30">
                        <label for="">Would you like to book for a free consultation?</label><br />
                        <label class="control control--radio">Yes
                          <input type="radio" name="radio" />
                          <div class="control__indicator"></div>
                        </label>
                        <label class="control control--radio">No
                          <input type="radio" name="radio" />
                          <div class="control__indicator"></div>
                        </label>
                      </div>
                      <div class="form-group">
                        <label for="">Resume / Curriculum Vitae</label><br />
                        <input type="file" name="file" id="file" class="inputfile" data-multiple-caption="{count} files selected" multiple />
                        <label class="btn btnread-more text-uppercase" for="file"><span>Choose file</span></label>
                      </div>
                    </div>
                  </div>
                  <div class="text-center mt30">
                    <button class="btn btnview-more text-uppercase">Submit</button>
                  </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <section class="know-more px180">
      <div class="row justify-content-center mb80">
        <div class="col-sm-4 subscribe text-center">
          <h2 class="title fs40 text-white mb10">Want to know more?</h2>
          <p class="basic text-white">Subscribe to our newsletter and get an up to date information</p>
          <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="Email Address" aria-label="Recipient's username" aria-describedby="basic-addon2">
            <div class="input-group-append">
              <span class="input-group-text" id="basic-addon2">
                  <button class="btn btnread-more">Subscribe</button>
              </span>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-2 text-center">
          <img src="{{asset('img/footer-logo.png')}}" class="img-fluid" alt="">
        </div>
        <div class="col-sm-2 footer-links">
          <ul class="list-unstyled">
            <li><a href="#" class="text-white text-uppercase">Services</a></li>
            <li><a href="#" class="text-white text-uppercase">About</a></li>
            <li><a href="#" class="text-white text-uppercase">Courses</a></li>
            <li><a href="#" class="text-white text-uppercase">Destinations</a></li>
            <li><a href="#" class="text-white text-uppercase">Careers</a></li>
            <li><a href="#" class="text-white text-uppercase">Students</a></li>
          </ul>
        </div>
        <div class="col-sm-2 footer-info">
          <ul class="list-unstyled">
            <li class="text-white loc">2/F Door 2B Natividad Bldg. II Ablan Ave. cor. Primo Lazaro St. Brgy. 4, Laoag City, Ilocos Norte 2900</li>
            <li class="text-white tel">+63 77 600 4200</li>
          </ul>
        </div>
        <div class="col-sm-2 footer-social text-center">
          <h3 class="basic fs18 text-white">Follow Us</h3>
          <ul class="list-inline">
            <li class="list-inline-item">
              <a href="#">
                  <img src="{{asset('svg/facebook.svg')}}" class="img-fluid" alt="">
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                  <img src="{{asset('svg/twitter.svg')}}" class="img-fluid" alt="">
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                  <img src="{{asset('svg/instagram.svg')}}" class="img-fluid" alt="">
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                  <img src="{{asset('svg/skype.svg')}}" class="img-fluid" alt="">
              </a>
            </li>
          </ul>
        </div>
        <div class="col-sm-2 text-center">
          <img src="{{asset('img/ICEF.png')}}" class="img-fluid" alt="">          
        </div>
        <div class="col-sm-2 text-center">
          <img src="{{asset('img/PIER.png')}}" class="img-fluid" alt="">          
        </div>
      </div>
      <div class="copyright text-center">
        <small class="text-white">Copyright &copy; 2019 ENZ Education Consultancy Services</small>
      </div>
    </section>
    {{-- <div class="container credits py24">
        <ul class="list-unstyled list-inline my0">
            <li class="list-inline-item basic text-black m0">&copy; Copyright 2019 Riviera Villas</li>
            <li class="list-inline-item basic m0"><a class="text-green" href="#">Privacy Policy</a></li>
            <li class="list-inline-item basic m0"><a class="text-green" href="#">Terms of use</a></li>
        </ul>
    </div> --}}
</footer>
@push('after-scripts')
<script>
  'use strict';

;( function( $, window, document, undefined )
{
	$( '.inputfile' ).each( function()
	{
		var $input	 = $( this ),
			$label	 = $input.next( 'label' ),
			labelVal = $label.html();

		$input.on( 'change', function( e )
		{
			var fileName = '';

			if( this.files && this.files.length > 1 )
				fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
			else if( e.target.value )
				fileName = e.target.value.split( '\\' ).pop();

			if( fileName )
				$label.find( 'span' ).html( fileName );
			else
				$label.html( labelVal );
		});

		// Firefox bug fix
		$input
		.on( 'focus', function(){ $input.addClass( 'has-focus' ); })
		.on( 'blur', function(){ $input.removeClass( 'has-focus' ); });
	});
})( jQuery, window, document );
</script>
@endpush