<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-10">
                <h4 class="card-title mb-0">
                    {{ $title ?? '' }} <br/>
                    <small class="text-muted">{{ $secondary_title ?? '' }}</small>
                </h4>
            </div>
            <div class="col-sm-2 text-right">
                @if(isset($actions) && count($actions))
                    <div class="btn-group" role="group" aria-label="User Actions">
                        <div class="btn-group" role="group">
                            {{ $buttons ?? null }}
                            <button id="modelAcions" type="button" class="btn btn-secondary dropdown-toggle"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="fa fa-cog" data-toggle="tooltip" data-placement="top"
                                      title="Settings"></span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="modelAcions">
                                @foreach($actions as $a => $action)
                                    @php
                                        $action = (object) $action;
                                        switch ($a) {
                                            case 'show':
                                                $action->class = $action->class ?? 'text-info';
                                                $action->name = $action->name ?? 'btn_show';
                                                $action->icon = $action->icon ?? 'fa fa-eye';
                                                $action->label = $action->label ?? 'Show';
                                                $action->redirect = $action->redirect ?? null;
                                                break;
                                            case 'edit':
                                                $action->class = $action->class ?? 'text-primary';
                                                $action->name = $action->name ?? 'btn_edit';
                                                $action->icon = $action->icon ?? 'fa fa-pencil';
                                                $action->label = $action->label ?? 'Edit';
                                                $action->redirect = $action->redirect ?? null;
                                                break;
                                            case 'destroy':
                                                $action->class = $action->class ?? 'text-danger';
                                                $action->name = $action->name ?? 'btn_destroy';
                                                $action->icon = $action->icon ?? 'fa fa-trash';
                                                $action->label = $action->label ?? 'Delete';
                                                $action->redirect = $action->redirect ?? null;
                                                break;
                                            case 'restore':
                                                $action->class = $action->class ?? 'text-info';
                                                $action->name = $action->name ?? 'btn_restore';
                                                $action->icon = $action->icon ?? 'fa fa-refresh';
                                                $action->label = $action->label ?? 'Restore';
                                                $action->redirect = $action->redirect ?? null;
                                                break;
                                            case 'purge':
                                                $action->class = $action->class ?? 'text-danger';
                                                $action->name = $action->name ?? 'btn_purge';
                                                $action->icon = $action->icon ?? 'fa fa-trash';
                                                $action->label = $action->label ?? 'Force Delete';
                                                $action->redirect = $action->redirect ?? null;
                                                break;
                                            default:
                                                $action->class = 'text-primary';
                                                $action->name = $action->name ?? "btn_$a";
                                                $action->icon = $action->icon ?? 'fa fa-';
                                                $action->label = $action->label ?? strtoupper($a);
                                                $action->redirect = $action->redirect ?? null;
                                                break;
                                        }
                                    @endphp
                                    <li class="dropdown-item"><a class="{{ $action->class }}" name="{{ $action->name }}"
                                                                 href="{{ $action->url }}"
                                                                 data-redirect="{{ $action->redirect }}">
                                            <i class="{{ $action->icon }}"></i>{{ $action->label }}</a>
                                    </li>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @else
                    {{ $buttons ?? null }}
                @endif
            </div>
        </div>
        <hr/>
        {{ $content }}
    </div>
    <div class="card-footer">
        {{ $footer ?? null }}
    </div>
</div>