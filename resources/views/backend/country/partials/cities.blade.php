<div class="row">

    <div class="col">

        <div class="card card-table" style="padding-bottom: 20px;">

            <div class="col-md-12">

                <a href="{{ route('admin.cities.create', $model->slug) }}">

                    <button class="pull-right btn btn-primary" style="margin: 10px 0px;" data-toggle="modal" data-target="#modal-create">Add Item</button>

                </a>

                <div class="dd" id="nestable-cities">
                    
                    <ol class="dd-list">

                        @foreach ($model->cities as $key => $item)

                            @include('backend.includes.sortable.list', [

                                'item' => $item, 

                                'label' => 'title',
                                
                                'edit_route' => route('admin.cities.edit', [$item->slug, $model->slug]),
                                
                                'delete_route' => route('admin.cities.destroy', $item->slug)
                            
                            ])

                        @endforeach

                    </ol>

                </div>

                @if ($model->cities->count())
                    
                    @php

                        $model = class_basename($model->cities[0]);
                    
                    @endphp
                        
                    @include('backend.includes.sortable.form', ['model' => $model, 'id' => 'cities'])

                @endif

            </div>

        </div>

    </div>

</div>

@include('backend.includes.sortable.script', ['depth' => 1, 'id' => 'cities'])

