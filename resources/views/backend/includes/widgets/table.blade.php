<div class="row">
    <div class="col">
        <div class="card card-table" id="{{ $table_name }}">
            <div class="overlay overlay-container">
                @include('includes.partials.loader', ['class' => 'page-loading-absolute page-loading-display'])
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-5">
                        <h4 class="card-title mb-0">
                            {{ $title }}
                            <small class="text-muted">{{ $secondary_title }}</small>
                        </h4>
                    </div>
                    <div class="col-sm-7">
                        <div class="float-right">

                            @switch($title)

                                @case('Inquiry List')
            
                                    <a href="{{ route('admin.inquiries.export') }}" target="_blank">
                                        
                                        <button class="btn btn-primary"><i class="fa fa-download"></i> Export</button>
                                        
                                    </a>

                                    @break

                                @case('Tourist Visa Inquiry List')
            
                                    <a href="{{ route('admin.tourist-visa-inquiries.export') }}" target="_blank">
                                        
                                        <button class="btn btn-primary"><i class="fa fa-download"></i> Export</button>
                                        
                                    </a>

                                    @break

                                @case('Become Our Client Inquiry List')
            
                                    <a href="{{ route('admin.become-our-client-inquiries.export') }}" target="_blank">
                                        
                                        <button class="btn btn-primary"><i class="fa fa-download"></i> Export</button>
                                        
                                    </a>

                                    @break
                            
                                @case('Course Inquiries')
            
                                    <a href="{{ route('admin.subscriptions.export') }}" target="_blank">
                                        
                                        <button class="btn btn-primary"><i class="fa fa-download"></i> Export</button>
                                        
                                    </a>

                                    @break
                            
                                @case('Application List')
            
                                    <a href="{{ route('admin.applications.export') }}" target="_blank">
                                        
                                        <button class="btn btn-primary"><i class="fa fa-download"></i> Export</button>
                                        
                                    </a>

                                    @break
                            
                                @default

                            @endswitch
                            
    

                            <div class="btn-group mr-2">
                                {{ $buttons ?? null }}
                            </div>

                            <div class="btn-group">
                                @if(isset($links) && $links != "")
                                    <a name="btn_refresh" href="#" class="btn btn-primary" data-toggle="tooltip" title="Refresh List"> <i class="fa fa-refresh"></i> </a>
                                    <div class="btn-group" role="group">
                                        <button id="modelAcions" type="button" class="btn btn-secondary dropdown-toggle"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="fa fa-cog" data-toggle="tooltip" data-placement="top"
                                                  title="Settings"></span>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="modelAcions">
                                            {{ $links }}
                                        </div>
                                    </div>
                                @endisset
                            </div>
                        </div>
                    </div>
                </div>
                <hr/>
                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr> {{ $headers ?? null }} </tr>
                            </thead>
                            {{-- <tfoot>
                            <tr> {{ $headers ?? null }} </tr>
                            </tfoot> --}}
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('after-styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/plugins/dataTables.bootstrap.min.css') }}">
@endpush
@push('after-scripts')
    <script type="text/javascript" src="{{ asset('js/plugins/datatable/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/datatable/dataTables.bootstrap4.min.js') }}"></script>
    @if(config('app.dev_env') == 'backend')
        {!! script(mix('js/plugins/datatable/app.js')) !!}
    @else
        {!! script('js/plugins/datatable/app.js') !!}
    @endif
    <script type="text/javascript">
        $(document).ready(function () {
            // $('table').DataTable()
            let columns = {!! $columns !!},
                options = {!! $options !!},
                el = $('#{{ $table_name }}'),
                table = null;

            options.columns = columns;
            options.ajax = {};
            options.ajax.url = '{{ $url }}';
            options.ajax.method = '{{ $method ?? 'POST' }}';
            options.ajax.data = {!! $form_data ?? '{}' !!}

                actions = (el) => {
                let previous = $('[name=status_update]').data('previous', $('[name=status_update]').val());
                el.on('change', '[name=status_update]', (e) => {
                    e.preventDefault();
                    e.stopPropagation();
                    let value = $(e.target).val();
                    markSwal(value, $(e.target).data('link'))
                        .then(response => {
                            toastr.success(response.message);
                            if (response.link != window.location) {
                                pageLoading();
                                window.location.href = response.link
                            }
                        })
                        .catch(response => {
                            $(e.target).val($(e.target).data('previous'));
                            if (response.dismiss) {
                            } else {
                                toastr.error(response.responseJSON.message || response.responseText)
                            }
                        })
                });

                // Action Buttons
                swalButtons(el, {
                    destroy: {
                        success: (response, el) => {
                            table.ajax.reload();
                            toastr.success(response.message)
                        },
                        error: (response, el) => {
                            toastr.error(response.responseTEXT)
                        }
                    },
                })
            };

            let callbacks = {
                processingCallback: () => {
                    el.find('.overlay-container').addClass('overlay').fadeTo(500, 1);
                },
                processedCallback: (response) => {
                    el.find('.overlay-container').fadeTo(500, 0).removeClass('overlay');
                },
                initCallback: (table_el) => {
                    table = table_el;
                    table;
                    actions(el);
                    el.find('.overlay-container').fadeTo(500, 0).removeClass('overlay');
                    el.find('[name=btn_refresh]').click(function () {
                        table.ajax.reload();
                    });
                },
            };
            table = initDataTable(el.find('table'), options, callbacks)
        })
    </script>
@endpush

