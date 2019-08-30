@if (! $item->parent_id)

    <li class="dd-item dd3-item" data-id="{{ $item->id }}">

        <div class="dd-handle dd3-handle"></div><div class="dd3-content" data-id="{{ $item->id }}">{{ $item->{$label} }}
    
            @if ($item->status)

                <div class="status-div">

                    {!! $item->status_action !!}
                
                </div>
            
            @endif
        
            @isset ($other_status)
            
                <div class="other-status-div">

                    {!! $item->migration_action !!}
                
                </div>
                
            @endisset
        
            <div class="input-group-btn project-actions">
        
                <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-custom" data-toggle="dropdown" aria-expanded="false">
        
                    <span class="fa fa-cogs"></span>
        
                    <span class="caret"></span>
        
                </button>
        
                <div class="dropdown-menu dropdown-menu-right" 
                     x-placement="bottom-end" 
                     style="position: absolute; transform: translate3d(79px, 35px, 0px); top: 0px; left: 0px; will-change: transform;">
        
                    <a class="dropdown-item dropdown-item-custom edit-trigger" href="{{ $edit_route }}"> 
        
                        <i class="fa fa-pencil"></i> Edit
        
                    </a>

                    @isset ($show_route)
                        <a class="dropdown-item dropdown-item-custom" href="{{ $show_route }}"> 
                            <i class="fa fa-search"></i> Show
                        </a>
                    @endisset

                    <a class="dropdown-item dropdown-item-custom btn-action" 
                       data-slug="{{ $item->slug }}" 
                       name="btn-delete" 
                       data-action="delete" 
                       href="{{ $delete_route }}"> 
                        <i class="fa fa-trash"></i> Delete
                    </a>
        
                </div>
        
            </div>
        
        </div>

        @if ($item->nodes)

            <ol class="dd-list">

                @foreach ($item->nodes as $children)

                    <li class="dd-item dd3-item" data-id="{{ $children->id }}">

                        <div class="dd-handle dd3-handle"></div><div class="dd3-content" data-id="{{ $children->id }}">{{ $children->{$label} }}
                        
                            <div class="input-group-btn project-actions">
                        
                                <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-custom" data-toggle="dropdown" aria-expanded="false">
                        
                                    <span class="fa fa-cogs"></span>
                        
                                    <span class="caret"></span>
                        
                                </button>
                        
                                <div class="dropdown-menu dropdown-menu-right" 
                                     x-placement="bottom-end" 
                                     style="position: absolute; transform: translate3d(79px, 35px, 0px); top: 0px; left: 0px; will-change: transform;">
                        
                                    <a class="dropdown-item dropdown-item-custom edit-trigger" href=""> 
                        
                                        <i class="fa fa-pencil"></i> Edit
                        
                                    </a>
                        
                                    <a class="dropdown-item dropdown-item-custom btn-action" 
                                       data-slug="{{ $children->slug }}" 
                                       name="btn-delete" 
                                       data-action="delete" 
                                       href=""> 
                                        <i class="fa fa-trash"></i> Delete
                                    </a>
                        
                                </div>
                        
                            </div>
                        
                        </div>

                        @include('backend.includes.sortable.nestable')
                    
                    </li>

                @endforeach
            
            </ol>

        @endif

    </li>

@endif