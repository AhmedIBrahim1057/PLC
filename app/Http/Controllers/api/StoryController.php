<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Model\Story;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class StoryController extends Controller
{

    public function index(Request $request)
    {

        $query = Story::select('*');
        $stories = $query->get()->transform(function ($story){
            return [
                'name' => $story->name,
                'story_number' => $story->story_number,
                'phrase' => $story->phrase,
                'right_keywords' =>  json_decode($story->right_keywords),
                'wrong_keywords' => json_decode($story->wrong_keywords) ,
                'icon' => $story->icon,
                'end' => $story->end,
                'images' => json_decode($story->images) ,
            ];
        })->toArray();

        return response()->json(['stories' => $stories], 200);
    }

    public function save(Request $request)
    {
        $story = new Story();
        $story->fill($request->except('images', 'right_keywords', 'wrong_keywords'));
        $images = [];
        foreach ($request->images as $index => $image) {
            $images = ['ImageURl' => $image, 'ID' => $index];
        }
        $story->images = json_encode($images);
        $story->right_keywords = json_encode($request->right_keywords);
        $story->wrong_keywords = json_encode($request->wrong_keywords);

        $story->save();
        return response(['story' => $story], 200);
    }
}
