@include('backend.includes.sortable.style')

<div class="card card-table" style="padding-bottom: 20px;">

    <div class="col-sm-12">

        <h4 class="card-title mb-0" style="padding-top: 10px;">

            <a href="{{ route('admin.courses.create') }}">

                <button class="pull-right btn btn-primary" data-toggle="modal" data-target="#modal-create">Add Item</button>

            </a>

        </h4>

    </div>

    <hr>

    <div class="col-md-12">

        <div class="dd" id="nestable-institution">
            
            <ol class="dd-list">

                @php

                    $courses = $model->courses;
                
                @endphp

                @foreach ($courses as $key => $item)

                    @php

                        if (! $key) { $model = class_basename($item); }
                    
                    @endphp
                    
                    @include('backend.includes.sortable.list', [

                        'item' => $item, 

                        'label' => 'title',
                        
                        'edit_route' => route('admin.courses.edit', $item->slug),

                        'show_route' => route('admin.courses.show', $item->slug),
                        
                        'delete_route' => route('admin.courses.destroy', $item->slug)
                    
                    ])

                @endforeach

            </ol>

        </div>

        @if ($courses->count())

            @include('backend.includes.sortable.form', ['model' => $model, 'id' => 'institution'])
            
        @endif

    </div>

</div>

@include('backend.includes.sortable.script', ['depth' => 1, 'id' => 'institution'])
