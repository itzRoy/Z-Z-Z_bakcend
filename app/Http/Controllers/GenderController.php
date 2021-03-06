<?php

namespace App\Http\Controllers;

use App\Models\Gender;
use App\Models\Categorie;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class GenderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $genders = Gender::all();

        return response()->json([
            'status' => 200,
            'error' => false,
            'message' => 'got all genders!',
            'genders' => $genders
        ]);
    
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $gender = Gender::create($request->input());

            //rules for validator
            $rules = array(
                'type' => 'bail | required | max: 255 ',
            );
    
            $validator = Validator::make($request->all(), $rules);
    
            $errorMessage = $validator->errors();

            if ($validator->fails()) {
                return response()->json([
                    'status' => 400,
                    'error' => true,
                    'message' => 'bad request error',
                    'errors' => $errorMessage
    
                ]);
            }
         
    
            return response()->json([
                'status' => 200,
                'error' => false,
                'message' => 'New gender added',
                'type' => $gender
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gender  $gender
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $genders = Gender::find($id);

        
        return response()->json([
            'status' => 200,
            'error' => false,
            'message' => 'got all genders!',
            'gender' => $genders
        ]);
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gender  $gender
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $gender = Gender::find($id);

        if (!$gender) {
            return response()->json([
                'Status' => 404,
                'error' => true,
                'message' => "gender with id:'$id' was not found!"

            ]);
        }

        if ($request->type) $gender->type = $request->type;
        $gender->save();

        return response()->json([
            'Status' => 200,
            'error' => false,
            'message' => "gender with id:'$id' was successfully updated!",
            'updated_gender' => Gender::find($id)
        ]);
    
     

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gender  $gender
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gender = Gender::find($id);
        if (!$gender) {
            return response()->json([
                'Status' => 404,
                'error' => true,
                'message' => "Could not find gender with id: $id!"
            ]);
        }
        $gender->delete();

        return response()->json([
            'Status' => 200,
            'error' => false,
            'message' => "gender: '$gender->type' was successfully deleted!"
        ]);
    }

    //get one gender with its categories and its items
    public function gender_categorie_item($id)
    {
        $genders = Gender::find($id);
        $categories = $genders->categories;

        foreach($categories as $id){
            $categorie = Categorie::find($id->id);
            $id->items = $categorie->items;
        }
foreach($genders->categories as $categorie) {
    foreach($categorie->items as $item_image){
        $item = Item::find($item_image->id);
        $item_image->image_url = $item->image;
    }
    }

        return response()->json([
            'status' => 200,
            'error' => false,
            'message' => 'got all genders!',
            'gender' => $genders
        ]);
    }

    public function gender_categorie($id)
    {
        $genders = Gender::find($id);
        $genders->categories;

        
        return response()->json([
            'status' => 200,
            'error' => false,
            'message' => 'got all genders!',
            'gender' => $genders
        ]);
    }
}
