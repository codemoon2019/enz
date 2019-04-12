 @if ($errors->any())
    @foreach ($errors->all() as $error)
        
        @push('after-scripts')

            <script>
        
                toastr.error("{!! $error !!}")
        
            </script>
        
        @endpush

    @endforeach

@elseif (session()->get('flash_success'))

    @push('after-scripts')

        <script>
    
            toastr.success("{!! session()->get('flash_success') !!}")
    
        </script>
    
    @endpush

@elseif (session()->get('flash_warning'))
    
    @push('after-scripts')

        <script>
    
            toastr.warning("{!! session()->get('flash_warning') !!}")
    
        </script>
    
    @endpush

@elseif (session()->get('flash_info'))
    
    @push('after-scripts')

        <script>
    
            toastr.info("{!! session()->get('flash_info') !!}")
    
        </script>
    
    @endpush

@elseif (session()->get('flash_danger'))
    
    @push('after-scripts')

        <script>
    
            toastr.error("{!! session()->get('flash_danger') !!}")
    
        </script>
    
    @endpush

@elseif (session()->get('flash_message'))
    
    @push('after-scripts')

        <script>
    
            toastr.info("{!! session()->get('flash_message') !!}")
    
        </script>
    
    @endpush

@endif