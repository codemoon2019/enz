@push('after-scripts')
    
    <script>

        var elements = $("{{ $element }}");

        var plus_number = parseInt("{{ $plus_number ?? 0 }}");

        function matchHeight(elements, plus_number) {
            
            var heights = [];

            $.each(elements, function(){

                heights.push($(this).height());


            });

            elements.css('height', Math.max(...heights) + plus_number);

        }

        matchHeight(elements, plus_number);

        $(window).resize(function(){ 

            elements.css('height', 'unset');  matchHeight(elements, plus_number); 

        });

    </script>

@endpush