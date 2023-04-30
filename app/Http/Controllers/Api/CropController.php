<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CropUpdateRequest;
use App\Models\Crop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CropController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $crops = Crop::all();
        return $crops;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'min:3', 'max:255'],
            // 'image' => ['image', 'required'],
            'duration' => ['required', 'numeric'],
            'acrerange' => ['required', 'numeric'],
            'note' => ['required', 'min:5'],
        ]);

        // $image_path = $request->file('image')->store('crops');

        // $crop = Crop::create([
        //     // 'user_id'=>Auth::user()->id,
        //     'user_id'=>1,
        //     'name'=>$request->name,
        //     'duration'=>$request->duration,
        //     'acrerange'=>$request->acrerange,
        //     'note'=>$request->note,
        //     'image'=>$image_path
        // ]);
        $crop = new Crop();
            $crop->user_id = 3;
            $crop->name = $request->name;
            $crop->duration = $request->duration;
            $crop->acrerange = $request->acrerange;
            $crop->note = $request->note;
            // $crop->image = $image_path;

            $crop->save();

        return response()->json([
            'crop'=> $crop,
            'message'=> 'Crop created successfully'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $crop = Crop::findOrFail($id);
        return $crop;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // if($request->hasFile('image')){
        //     Storage::delete($crop->image);
        //     $crop->image = $request->file('image')->store('crops');
        // }
        // $crop = $crop->update($request->validated() + [
        //     'image' => $crop->image
        // ]);
        // return "Crop updated successfully";

        $crop = Crop::findOrFail($id);

        // if($request->hasFile('image')){
        //     Storage::delete($crop->image);
        //     $crop->image = $request->file('image')->store('crops');
        // }

        $request->validate([
            'name' => ['required', 'min:3', 'max:255'],
            'duration' => ['required', 'numeric'],
            'acrerange' => ['required', 'numeric'],
            'note' => ['required', 'min:5'],
        ]);
            $crop->name = $request->name;
            $crop->duration = $request->duration;
            $crop->acrerange = $request->acrerange;
            $crop->note = $request->note;
            // $crop->image = $crop->image;

            $crop = $crop->update();

        return "Crop updated successfully";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $crop = Crop::FindOrFail($id);
        if($crop){
            $crop->delete();
            return response()->json([
                'status' => 200,
                'message' => "Crop deleted successfully",
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => "No crop found!"
            ], 404);
        }

    }
}
