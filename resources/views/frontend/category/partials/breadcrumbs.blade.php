<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('/') }}" class="{{ active_class(Active::checkUriPattern('/')) }}">Home</a>
    </li>
    @if($page->parent)
        @php
            $getRoots = function($model, &$list, $include_model = true) use(&$getRoots)
            {
                if (!$list instanceof Illuminate\Database\Eloquent\Collection) {
                    $list = collect($list);
                }
                if ($include_model) {
                    $list->prepend($model);
                }
                if ($model->parent_id != null) {
                    $getRoots($model->parent, $list);
                }
                return $list;
            };

            $list = [];
            $links = $getRoots($page->parent, $list);
        @endphp
        @foreach($links as $l => $link)
            <li class="breadcrumb-item">
                <a href="{{ $link->actions('frontend', 'show', true) }}">{{ $link->title }}</a>
            </li>
        @endforeach
    @endif

    <li class="breadcrumb-item">
        <a href="{{ $page->actions('frontend', 'show', true) }}">{{ $page->title }}</a>
    </li>
</ol>
