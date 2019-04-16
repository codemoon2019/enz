@extends('backend.layouts.app')

@section('content')

@php

    $keys = config('data.information');

@endphp

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
                <div class="row" style="margin: 0px 5px;">
                    <div class="table-responsive">
                        
                        <table class="table table-hovered">
                            <thead>
                                <th>Label</th>
                                <th>Action</th>
                            </thead>
                            <tbody>

                                @foreach (getInformation($keys) as $information)
                                    <tr>
                                        <td>{{ $information->label }}</td>
                                        <td>
                                            <a href="{{ route('admin.information.edit', $information->machine_name) }}">
                                            
                                                <button class="btn btn-primary"><i class="fa fa-pencil"></i></button>

                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


