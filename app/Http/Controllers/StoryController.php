<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\StoryResource;
use App\Models\Story;

class StoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return Story::all();
         return StoryResource::collection(Story::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=> required,
            'description'=> required,
        ]);

        $story = new Story([
            'title'=>$request->title,
            'description'=>$request->description,
        ]);

        $story->save();
        return response()->json([
            'data'=> 'Story created successfully'
        ]);
    }

    public function edit($id)
    {
        return new PostResource(Post::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=> required,
            'description'=> required,
        ]);

        $story = Story::findOrFail($id);
        $story->title =$request->title;
        $story->description =$request->description;
        $story->save();
        return response()->json([
            'data'=> 'Story updated successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $story = Story::findOrFail($id);
        $story->delete();

        return response()->json([
            'data'=> 'Story deleted successfully'
        ]);
    }
}
