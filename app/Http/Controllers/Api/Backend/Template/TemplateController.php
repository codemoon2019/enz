<?php

namespace App\Http\Controllers\Api\Backend\Template;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Models\Core\Page\Page;

use App\Models\MoreLife\MoreLife;

use App\Models\Content\Content;

use App\Models\News\News;

use App\Models\Event\Event;

use App\Models\Core\Block\Block;

use App\Models\TemplateProperty;

class TemplateController extends Controller
{
    public function add(Request $request)
    {
    	$data = $request->all();

    	switch ($data['model_name']) {

            case 'Page': $model = Page::find($data['model_id']); break;

            case 'MoreLife': $model = MoreLife::find($data['model_id']); break;

            case 'News': $model = News::find($data['model_id']); break;

            case 'Event': $model = Event::find($data['model_id']); break;

            case 'Block': $model = Block::find($data['model_id']); break;

    		default: break;
    	}

        $content = $model->contents()->save(new Content([

            'title' => $data['selected_template'],
            
            'template' => $data['selected_template'],
       
            'order' => 1,
       
        ]));

        if ($data['selected_template'] == 'ILTR' || $data['selected_template'] == 'IRTL') {

            $content->property()->save(new TemplateProperty([

                'image_area' => '6'

            ]));

        }elseif($data['selected_template'] == 'image'){

            $content->property()->save(new TemplateProperty([

                'image_align' => 'center'

            ]));

        }

    }

    public function save(Request $request)
    {
        foreach ($request->all() as $key => $value) {

            if ($key > 0) {

                if (is_array($value)) {

                    $value = json_encode($value);

                }
    
                Content::find($key)->update(['body' => $value]);

            }else if(strpos($key, 'image-area') !== false){
            
                $id = explode('-', $key)[2];

                TemplateProperty::where('content_id', $id)->update(['image_area' => $value]);

            }else if(strpos($key, 'image-align') !== false){
            
                $id = explode('-', $key)[2];

                TemplateProperty::where('content_id', $id)->update(['image_align' => $value]);

            }


        }

        return redirect()->back()->withFlashSuccess('Updated');
    }

    public function sort(Request $request)
    {
        foreach ($request['data'] as $value) {

            $content = Content::find($value[0]);

            if ($content) {
            
                $content->update(['order' => $value[1]]);
            
            }
        }
    }

    public function delete(Request $request)
    {
        $model = Content::find($request['id']);

        foreach ($model->getUploaderImages('images') as $value) {

            $filePath = storage_path('app/public/images/') . explode('/', $value->source)[3];

            if (is_dir($filePath)) {

                $this->findDir($filePath);

            }

        }

        $model->media()->delete();

        $model->delete();

        app('query.cache')->flush();

    }


    public function findDir($filePath)
    {
        $files = scandir($filePath);

        foreach (array_slice($files, 2) as $key => $value) {

            $filePathInner = $filePath . '/' . $value;

            if (is_dir($filePathInner)) {

                $this->findDir($filePathInner);

            }else{

                unlink($filePathInner);

            }

        }
        
        rmdir($filePath);

    }

    public function deleteColumn($model, $column)
    {
        $model = Content::find($model);

        $body = json_decode($model->body);

        array_splice($body, $column, 1);
    
        $model->update(['body' => json_encode($body)]);
    
    }

}
