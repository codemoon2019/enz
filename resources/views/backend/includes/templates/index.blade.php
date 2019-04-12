@include('backend.includes.templates.style')

@push('before-scripts')

    @include('backend.includes.ckeditor')

@endpush

 <div id="section-" class="sections">

    <div style="display: flex; padding: 5px 5px 15px;">
    
        @php

            $templates = Config::get('data.templates');


            foreach (Block() as $key => $block) {

                $templates[$block->slug] = ['title' => $block->title, 'disabled' => false];

            }

        @endphp

        <select class="form-control" id="selected-template" style="height: 37px; border-radius:0px; ">

            @foreach ($templates as $key => $template)

                <option value="{{ $key }}" {{ $template['disabled'] ? 'disabled' : '' }}>{{ $template['title'] }}</option>

            @endforeach
        
        </select>
        
        
        <div data-type="add-template" class="add-btn btn-action" data-id=""><i class="fa fa-plus"></i></div>
    
    </div>

    <form action="{{ route('webapi.admin.template.save') }}" method="post" id="template-form">

        {{ csrf_field() }}

        <ul id="content-list" data-id="" data-title="" class="block__list block__list_words content">
                
            @foreach ($model->contents as $content)
                
                @switch($content->title)

                    @case('text')  @include('backend.includes.templates.fields.' . $content->title) @break
            
                    @case('ILTR')  @include('backend.includes.templates.fields.' . $content->title) @break

                    @case('IRTL')  @include('backend.includes.templates.fields.' . $content->title) @break
                    
                    @case('embed')  @include('backend.includes.templates.fields.' . $content->title) @break
                    
                    @case('image')  @include('backend.includes.templates.fields.' . $content->title) @break

                    @case('text_by_culumn')  @include('backend.includes.templates.fields.' . $content->title) @break
                    
                    @case('more_life')  

                        @include('backend.includes.templates.fields.list') @break
                
                    @default

                        @include('backend.includes.templates.fields.block') @break

                @endswitch

            @endforeach

        </ul>
        
    </form>

        <div class="form-group">

            <div class="btn btn-primary pull-right btn-action " data-type="section-content" style="width: 150px; margin-right: 5px;">
            
                Save
            
            </div>
        
        </div>

        <br><br>

    <hr>

</div>


@push('after-scripts')

<script src="//cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>

@include('backend.includes.templates.script', ['model' => $model])

@endpush
