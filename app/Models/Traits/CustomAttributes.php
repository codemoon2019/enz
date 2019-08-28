<?php

namespace App\Models\Traits;

trait CustomAttributes
{
    public function getStatusActionAttribute()
    {
        $value = '';

        $status = 'disabled';

        if ($this->status == 'enable') {
           
            $value = 'checked';
           
            $status = 'enable';
       
        }

        $model = class_basename($this);

        return '<label class="switch switch-3d switch-primary">

                    <input type="checkbox" class="switch-input btn-action" id="status" '.$value.' 

                    data-action="switch" href="'.route('webapi.admin.status.update', [$model, $this->id]).'" data-status="'.$status.'">
        
                    <span class="switch-slider"></span>
        
                </label>';

    }

    public function getFeaturedActionAttribute()
    {
        $value = '';

        $status = 'disabled';

        if ($this->featured == 'enable') {
           
            $value = 'checked';
           
            $status = 'enable';
       
        }

        $model = class_basename($this);

        return '<label class="switch switch-3d switch-primary">

                    <input type="checkbox" class="switch-input btn-action" id="status" '.$value.' 

                    data-action="switch" href="'.route('webapi.admin.featured.update', [$model, $this->id]).'" data-status="'.$status.'">
        
                    <span class="switch-slider"></span>
        
                </label>';

    }

    public function getMigrationActionAttribute()
    {
        $value = '';

        $status = 'disabled';

        if ($this->migration == 'enable') {
           
            $value = 'checked';
           
            $status = 'enable';
       
        }

        $model = class_basename($this);

        return '<label class="switch switch-3d switch-primary">

                    <input type="checkbox" class="switch-input btn-action" id="status" '.$value.' 

                    data-action="switch" href="'.route('webapi.admin.migration.update', [$model, $this->id]).'" data-status="'.$status.'">
        
                    <span class="switch-slider"></span>
        
                </label>';

    }

}
