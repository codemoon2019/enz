@extends('backend.layouts.app')

@push('after-styles')

    <link rel="stylesheet" href="{{ asset('css/ckeditor-hide-toolbars.css') }}">

@endpush

@section('content')

<div class="row">
    <div class="col">
        <div class="card card-table">
            <div class="overlay overlay-container">
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-5">
                        <h4 class="card-title mb-0">
                            Website Information
                        </h4>
                    </div>
                    <div class="col-sm-7">
                        <div class="float-right">

                            </div>
                        </div>
                    </div>
                </div>
                <hr/>
                <div class="row" style="margin: 0px 25px;">


                    <form action="{{ route('admin.information.update', $model->machine_name) }}" method="post" style="width: 100%;">

                        {{ csrf_field() }}
                            
                          <div class="row mt-4 mb-4">

                                <div class="col">
                                
                                    <div class="form-group row">
                                
                                        <label class="col-md-2 form-control-label">Title <i class="text-danger">*</i></label>
                                
                                        <div class="col-md-10">
                                
                                            <input type="text" disabled class="form-control" value="{{ $model->label }}">
                                
                                        </div>
                                
                                    </div>

                                    <div class="form-group row">
                                
                                        <label class="col-md-2 form-control-label">Value</label>
                                
                                        <div class="col-md-10">
                                            
                                            @if ($model->input_type == 'textarea')
                                                
                                                <textarea name="value" id="value" class="form-control">{{ $model->value }}</textarea>
                                            
                                            @else
            
                                                <input type="text" class="form-control" value="{{ $model->value }}" name="value">

                                            @endif

                                
                                        </div>
                                
                                    </div>
                         
                                </div>

                            </div>

                            <button class="btn btn-primary pull-right">save</button>
                            
                            <br><br>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('after-scripts')

    @include('backend.includes.ckeditor')

    @if ($model->input_type == 'textarea')
        <script>

            CKEDITOR.replace('value', options);
            
        </script>
    @endif


@endpush