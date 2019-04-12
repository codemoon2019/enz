<?php

namespace App\Http\Controllers\Api\Backend\BlockContent;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Backend\BlockContent\BlockContentRequest;
use App\Models\Core\Block\Block;
use App\Models\Content\Content as Content;
use Illuminate\Http\Request;

class BlockContentController extends Controller
{
    public function reorder(Request $request)
    {
        $blockId = $request->eventId;
        $moved = $request->moved;

        $movedContent = Content::where('id', $moved['element']['id'])->first();         
        $movedContent->update([
            'order' => $moved['newIndex']
        ]);
        
        $startIndex = $moved['newIndex'] < $moved['oldIndex'] ? $moved['newIndex'] : $moved['oldIndex'];
        
        $contents = Block::findOrFail($blockId)->contents()->where('order', '>=', $startIndex)->orderBy('order')->get();
        
        if ($moved['newIndex'] < $moved['oldIndex']) $startIndex++;

        foreach ($contents as $content) {
            if($moved['newIndex'] == $startIndex) $startIndex++;
            
            if ($content->id != (int) $moved['element']['id']) {
                $content->update([
                    'order' => $startIndex
                ]);
                $startIndex++;
            }
        }

        return response()->json(['status' => 'success'], 200);
    }

    /**
     * It is required to return the created/latest form
     * @return void
     */
    public function create(BlockContentRequest $request)
    {
        $block = Block::where('id', $request->eventId)->firstOrFail();
        
        $contentCount = count($block->contents);
        
        $block->contents()->create([
            'title' =>  $request->fields['title'],
            'body' =>  $request->fields['body'],
            'order' => $contentCount
        ]);

        if($request->has('image') && $request->file('fields.image')){
            $block->addMedia($request->file('fields.image'))->toMediaCollection($block->template);
        }

        $form = $block->draggable_forms->last();

        return response()->json(['status' => 'success', 'form' => $form], 200);
    }

    public function update(BlockContentRequest $request)
    {
        $content = Content::where('id', $request->id)->firstOrFail();
        
        $content->update([
            'title' =>  $request->fields['title'],
            'body' =>  $request->fields['body']
        ]);

        if($request->hasFile('fields.image')){
            $content->addMedia($request->file('fields.image'))->toMediaCollection($content->contentable->template);

        }

        return response()->json(['status' => 'success'], 200);
    }

    public function remove(Request $request)
    {
        $movedSection = Content::findOrFail($request->id);
        $movedSection->delete();

        return response()->json(['status' => 'success'], 200);
    }
}