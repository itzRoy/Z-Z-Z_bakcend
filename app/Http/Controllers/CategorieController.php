<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categorie::all();

        foreach ($categories as $categorie) {
            $categorie->item;
        }

        return response()->json([
            'status' => 200,
            'error' => false,
            'message' => 'got all categories successfully!',
            'Data' => $categories,
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
        //rules for validator
        $rules = array(
            'name' => 'bail | required | max: 255',
            'gender_id' => 'bail | required | numeric',
        );

        $validator = Validator::make($request->all(), $rules);

        $errorMessage = $validator->errors();

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'error' => true,
                'message' => 'bad request error',
                'errors' => $errorMessage,

            ]);
        }

        $categorie = Categorie::create($request->input());
        return response()->json([
            'status' => 200,
            'error' => false,
            'message' => 'New categorie added',
            'sub-gategory' => $categorie,
        ]);
    }

    /**
     * Display a categorie with their items.
     *
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $categorie = Categorie::find($id);

        return response()->json([
            'status' => 200,
            'error' => false,
            'sub-categorie' => $categorie,
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $categorie = Categorie::find($id);

        if (!$categorie) {
            return response()->json([
                'Status' => 404,
                'error' => true,
                'message' => "sub-categorie with id:'$id' was not found!",

            ]);
        }

        if ($request->name) {
            $categorie->name = $request->name;
        }

        if ($request->gender_id) {
            $categorie->gender_id = $request->gender_id;
        }

        $categorie->save();

        return response()->json([
            'Status' => 200,
            'error' => false,
            'message' => "sub-categire with id:'$id' was successfully updated!",
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categorie = Categorie::find($id);
        if (!$categorie) {
            return response()->json([
                'Status' => 404,
                'error' => true,
                'message' => "Could not find categorie with id: '$id'!",
            ]);
        }
        $categorie->delete();

        return response()->json([
            'Status' => 200,
            'error' => false,
            'message' => "categorie: '$categorie->name' was successfully deleted!",
        ]);
    }

    public function categorie_items($id)
    {

        $categorie = Categorie::find($id);
        $categorie->items;
        foreach($categorie->items as $item_image){
            $item = Item::find($item_image->id);
            $item_image->image_url = $item->image;
        }
        return response()->json([
            'status' => 200,
            'error' => false,
            'sub-categorie' => $categorie,
        ]);

    }

}
