<div id="tab-action-collapse" role="tablist">
    <div class="card">
        <div class="card-header" role="tab" id="tab-action-head">
            <h5 class="mb-0">
                <a data-toggle="collapse" href="#tab-action-header" aria-expanded="true"
                   aria-controls="tab-action-header"> {{ $name }}  </a>
            </h5>
        </div>
        <div id="tab-action-header" class="collapse show" role="tabpanel" aria-labelledby="tab-action-head"
             data-parent="#tab-action-collapse">
            <div class="row">
                <div class="col-sm-3 padding-right-0 padding-right-sm-15">
                    <div class="nav flex-column nav-pills " id="v-pills-tab" role="tablist">
                        @foreach($links as $l => $link)
                            <a href="#action-tab-{{ str_slug($link['name']) }}"
                               class="nav-link {{ $l == 0 ? 'active' : '' }}"
                               data-toggle="pill" role="tab" aria-controls="action-tab-{{ str_slug($link['name']) }}"
                               aria-expanded="true">{{ $link['name'] }}</a>
                        @endforeach
                    </div>
                </div>
                <div class="col-sm-9  padding-left-0 padding-left-sm-15">
                    <div class="tab-content tab-content-left" id="v-pills-tabContent">
                        @foreach($links as $l => $link)
                            <div class="tab-pane fade {{ $l == 0 ? 'show active' : '' }}"
                                 id="action-tab-{{ str_slug($link['name']) }}" role="tabpanel"
                                 aria-labelledby="action-tab-{{ str_slug($link['name']) }}">
                                @include($link['template'], $link['args'])
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('after-styles')
    <style lang="css">
        #v-pills-tab > a {
            border-radius: 0px !important;
        }
    </style>
@endpush
