<div class="row">

    <div class="col">

        <div class="card card-table" style="padding-bottom: 20px;">

            <div class="col-md-12">

                <a href="{{ route('admin.linkages.create', $model->slug) }}">

                    <button class="pull-right btn btn-primary" style="margin: 10px 0px;" data-toggle="modal" data-target="#modal-create">Add Item</button>

                </a>

                <div class="dd" id="nestable3">
                    
                    <ol class="dd-list">

                        @foreach ($model->linkages as $key => $item)

                            @include('backend.includes.sortable.list', [

                                'item' => $item, 

                                'label' => 'title',
                                
                                'edit_route' => route('admin.linkages.edit', [$item->slug, $model->slug]),
                                
                                'delete_route' => route('admin.linkages.destroy', $item->slug)
                            
                            ])

                        @endforeach

                    </ol>

                </div>

                @if ($model->linkages->count())
                    
                    @php

                        $model = class_basename($model->linkages[0]);
                    
                    @endphp
                        
                    @include('backend.includes.sortable.form', ['model' => $model, 'id' => 'linkages'])

                @endif

            </div>

        </div>

    </div>

</div>

@include('backend.includes.sortable.script', ['depth' => 1, 'id' => 'linkages'])

