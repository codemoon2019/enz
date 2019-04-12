@slot('buttons')
    <div class="btn-group">
        <a href="{{ route($MODEL::ROUTE_ADMIN_PATH.'.create') }}" class="btn btn-success"><i data-toggle="tooltip"
                                                                                             data-placement="top"
                                                                                             title="Add Category"
                                                                                             class="fa fa-plus"></i></a>
        <a href="#" name="btn_refresh" class="btn btn-primary"><i data-toggle="tooltip" data-placement="top"
                                                                  title="Refresh" class="fa fa-refresh"></i></a>
    </div>
@endslot
@inject('NODE', 'App\Models\Core\Menu\MenuNode')
<div class="dd" id="category-hierarchy"></div>
@push('after-scripts')
    @if(config('app.dev_env') == 'backend')
        {!! script(mix('js/plugins/menu/app.js')) !!}
    @else
        {!! script('js/plugins/menu/app.js') !!}
    @endif
    <script type="text/javascript">
        window.MenuUI = function () {
            "use strict";
            let _SETTINGS = {
                    el: null,
                    depth: 5,
                    loadAjax: {},
                    storeAjax: {},
                    permissions: {}
                },
                _DEFAULT = {
                    data: null,
                    templates: {
                        list: `<ol class="dd-list"></ol>`,
                        item: `<li class="dd-item dd3-item"  data-id="__id__" >
                                __handle__
                                <div class="dd3-content">
                                    <span class="text pull-left">__title__ __type__</span>
                                    <span class="text pull-right">
                                        <div class="btn-group btn-group-sm">
                                            __actions__
                                        </div>
                                    </span>
                                </div>
                                <div class="clearfix"></div>
                            </li>`
                    }
                },
                _RENDER = {
                    structure: function (list) {
                        if (list.length <= 0) {
                            $(_SETTINGS.el).append('<div class="dd-empty"></div>');
                        } else {
                            $(_SETTINGS.el).append(_RENDER.list(list));
                        }
                    },
                    list: function (list, status) {
                        var listGroup = $(_DEFAULT.templates.list);
                        list.forEach(function (node, index) {
                            listGroup.append(_RENDER.node(node, status));
                        });
                        return listGroup;
                    },
                    links: function (data) {
                        if (Array.isArray(data)) {
                            data = data.reduce(function (acc, cur, i) {
                                acc[i] = cur;
                                return acc;
                            }, {});
                        }
                        let buttons = "";
                        for (let key in data) {
                            let link = data[key],
                                button = "";

                            switch (link.type) {
                                case 'show':
                                    button = `<a href="${link.url || '#'}" class="btn btn-sm btn-info"><i class="fa fa-search" data-toggle="tooltip" data-placement="top" title="View"></i></a>`;
                                    break;
                                case 'edit':
                                    button = `<a href="${link.url || '#'}" name="btn_edit" ${link.redirect ? "data-redirect='" + link.redirect + "'" : ''} class="btn btn-sm btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="Edit"></i></a>`;
                                    break;
                                case 'update':
                                    button = `<a href="${link.url || '#'}" name="btn_update" ${link.redirect ? "data-redirect='" + link.redirect + "'" : ''} class="btn btn-sm btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="Update"></i></a>`;
                                    break;
                                case 'destroy':
                                    button = `<a href="${link.url || '#'}" name="btn_destroy" ${link.redirect ? "data-redirect='" + link.redirect + "'" : ''} class="btn btn-sm btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i></a>`;
                                    break;
                                case 'purge':
                                    button = `<a href="${link.url || '#'}" name="btn_purge" ${link.redirect ? "data-redirect='" + link.redirect + "'" : ''} class="btn btn-sm btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i></a>`;
                                    break;
                                case 'restore':
                                    button = `<a href="${link.url || '#'}" name="btn_restore" ${link.redirect ? "data-redirect='" + link.redirect + "'" : ''} class="btn btn-sm btn-info"><i class="fa fa-refresh" data-toggle="tooltip" data-placement="top" title="Restore"></i></a>`;
                                    break;
                                default:
                                    button = `<a href="${link.url || '#'}" name="${link.name || ''}" ${link.redirect ? "data-redirect='" + link.redirect + "'" : ''} class="${link.class || ''}"><i class="${link.icon || ''}" data-toggle="tooltip" data-placement="top" title="${link.label || ''}"></i></a>`;
                                    break;
                            }
                            buttons += button
                        }
                        return buttons
                    },
                    node: function (node, status) {
                        let listItem = _DEFAULT.templates.item,
                            id = node.id || '',
                            title = node.title || '',
                            type = node.type || '',
                            children = node.children || [],
                            actions = node.actions || [];
                        listItem = listItem.replace(/__id__/gi, id);
                        listItem = listItem.replace(/__title__/gi, title);
                        listItem = listItem.replace(/__type__/gi, type ? '(' + type + ')' : '');
                        listItem = listItem.replace(/__actions__/gi, _RENDER.links(actions));
                        listItem = listItem.replace(/__handle__/gi, _SETTINGS.permissions.update == true ? '<div class="dd-handle dd3-handle"></div>' : '');
                        let $listItem = $(listItem);
                        if (typeof children !== 'undefined') {
                            if (children.length > 0) {
                                $listItem.append(_RENDER.list(children, status));
                            }
                        }
                        return $listItem;
                    },
                },
                _ACTIONS = {
                    // Init Nestable with data
                    init: function (settings) {
                        $.extend(_SETTINGS, settings);
                        // Load data
                        _ACTIONS.load();
                        // Init Nestable
                        $(_SETTINGS.el).nestable({
                            group: 1,
                            maxDepth: _SETTINGS.depth,
                        });
                        // Listen on nestable sorting
                        if (_SETTINGS.permissions.update == true) {
                            $(_SETTINGS.el).on('change', function () {
                                let expected = _DEFAULT.data,
                                    actual = $(_SETTINGS.el).nestable('serialize');
                                if (JSON.stringify(expected) != JSON.stringify(actual)) {
                                    _ACTIONS.store()
                                }
                            })
                        }
                    },
                    load: function () {
                        _DEFAULT.data = null;
                        ajaxSwal(_SETTINGS.loadAjax)
                            .then(function (response) {
                                $(_SETTINGS.el).empty();
                                _RENDER.structure(response.hierarchy);
                                _DEFAULT.data = $(_SETTINGS.el).nestable('serialize')
                            }).catch(function (response) {
                            toastr.error(response.responseTEXT || response)
                        })
                    },
                    store: function () {
                        _SETTINGS.storeAjax.data = {
                            hierarchy: $(_SETTINGS.el).nestable('serialize')
                        };
                        ajaxSwal(_SETTINGS.storeAjax)
                            .then(function (response) {
                                $(_SETTINGS.el).empty();
                                _RENDER.structure(response.hierarchy);
                                _DEFAULT.data = $(_SETTINGS.el).nestable('serialize')
                            }).catch(function (response) {
                            toastr.error(response.responseTEXT || response);
                            this.load()
                        })
                    }
                };

            return {
                constuctor: function () {
                    return _ACTIONS
                }
            }
        }();
        $(document).ready(function () {
            var category = new MenuUI.constuctor();
            category.init({
                el: '#category-hierarchy',
                loadAjax: {
                    url: '{{ route($MODEL::ROUTE_ADMIN_PATH . '.hierarchy') }}',
                    type: 'POST',
                },
                storeAjax: {
                    url: '{{ route($MODEL::ROUTE_ADMIN_PATH . '.hierarchy.update') }}',
                    type: 'PATCH'
                },
                permissions: {
                    update: {{ $logged_in_user->can($MODEL->permission('hierarchy-update')) ? 'true' : 'false' }},
                    destroy:  {{ $logged_in_user->can($NODE->permission('destroy')) ? 'true' : 'false' }}
                }
            });
            $('[name=btn_refresh]').click(function () {
                category.load()
            });
            swalButtons($('#menu-hierarchy'), {
                destroy: {
                    success: (response, el) => {
                        toastr.success(response.message);
                        category.load()
                    },
                    error: (response, el) => {
                        toastr.error(response.responseTEXT)
                    }
                },
                restore: {
                    success: (response, el) => {
                        toastr.success(response.messge);
                        category.load()
                    },
                    error: (response, el) => {
                        toastr.error(response.responseTEXT)
                    }
                },
                purge: {
                    success: (response, el) => {
                        toastr.success(response.messge);
                        category.load()
                    },
                    error: (response, el) => {
                        toastr.error(response.responseTEXT)
                    }
                }
            })
        })
    </script>
@endpush