@if (count($children->nodes))

    <ol class="dd-list">

        @foreach ($children->nodes as $children)

            <li class="dd-item dd3-item" data-id="{{ $children->id }}">

                <div class="dd-handle dd3-handle">Drag</div><div class="dd3-content">{{ $children->{$label} }}

                    <div class="input-group-btn project-actions">
                        <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-custom" data-toggle="dropdown" aria-expanded="false">
                            <span class="fa fa-cogs"></span>
                            <span class="caret"></span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" 
                             x-placement="bottom-end" 
                             style="position: absolute; transform: translate3d(79px, 35px, 0px); top: 0px; left: 0px; will-change: transform;">
                            <a class="dropdown-item dropdown-item-custom edit-trigger" href=""
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