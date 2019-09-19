@extends('backend.layouts.app')

@include('backend.includes.sortable.style')

@section('content')

<div id="app" class="to-load" style="opacity: 1; display: block;">

    <div class="row">
    
        <div class="col">
    
            <div class="card card-table" style="padding-bottom: 20px;">
    
                <div class="col-sm-12">
    
                    <h4 class="card-title mb-0" style="padding-top: 10px;">
    
                        Student Guide
    
                    </h4>
    
                </div>

                <hr>

                <div class="col-md-12">

                    <form action="{{ route('admin.student-guide.store') }}" method="post" enctype="multipart/form-data">

                        {{ csrf_field() }}
                        
                        <input type="file" name="guide">

                        @if (Storage::exists('public/user_guide/Student-Guide.pdf'))

                            <p style="margin-top: 15px;">
                            
                                <a href="{{ route('admin.student-guide.show', 'Student-Guide.pdf') }}" target="_blank">Student-Guide.pdf</a> 

                                <a data-slug="data" 
                                   name="btn-delete" 
                                   data-action="delete" 
                                   href="{{ route('admin.student-guide.destroy', 'Student-Guide.pdf') }}" class="dropdown-item dropdown-item-custom btn-action">
                                    <i class="fa fa-trash"></i> Delete
                                </a>

                            </p>

                        @endif
                        
                        <hr>

                        <button class="btn btn-primary pull-right">Save</button>
                    
                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection