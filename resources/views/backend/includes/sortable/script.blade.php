@push('after-scripts')

    <script src="{{ asset('js/jquery.nestable.js') }}"></script>
    
    <script src="{{ asset('js/jquery.form.min.js') }}"></script>

    <script>

        $(document).ready(function(){

            var commit = false;

            var updateOutput = function(e){

                var list   = e.length ? e : $(e.target),
                output = list.data('output');

                if (window.JSON) {
                    output.val(window.JSON.stringify(list.nestable("serialize")));
                } else {
                    output.val('JSON browser support required for this demo.');
                }

                if (commit) {
                    swalLoader();
                    $("#{{ $id }}-serialize-form").ajaxForm(function () {
                        swal.close();
                    }).submit();
                }

                commit = true;

            };

            $("#nestable-{{ $id }}").nestable({ maxDepth: "{{ $depth }}"}).on('change', updateOutput);
            
            updateOutput($("#nestable-{{ $id }}").data('output', $("#{{ $id }}-serialize")));

        });

    </script>

@endpush