<h4 class="form-group"> Menu Link </h4>
<hr/>
<div class="row mt-4 mb-4">
    <div class="col">
        <div class="form-group row">
            <label class="col-md-2 form-control-label">Name </label>
            <div class="col-md-10">
                {!! html()->text('menuable[name]', old('menuable.name') ?? ($menuable ? $menuable->name : ''))
                    ->class( 'form-control ' . ($errors->has('menuable.name') ? 'is-invalid' : '' ))
                    ->placeholder('Enter link name')
                    ->autofocus(true) !!}
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2 form-control-label">Menu </label>
            <div class="col-md-10">
                {!! 
                    html()->select(
                        'menuable[menu_id]',
                        app('menu')->pluckData('name', 'id'),
                        old('menuable.menu_id') ?? ($menuable ? $menuable->menu_id : '')
                    )
                    ->class('form-control ' . ($errors->has('menuable.menu_id') ? 'is-invalid' : '' ))
                    ->placeholder('Enter link menu')
                !!}
            </div>
        </div>

    </div>
</div>