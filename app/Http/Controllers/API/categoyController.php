<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class categoyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::with('collect')->paginate(10);
        return $categories;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),[


          'collect_id'=>'required|numeric',
          'name'=>'required|string',
          'description'=>'nullable|string',
          'slug'=>'required|string',
          'status'=>'required|numeric',
      ]);
      if( $validator->fails()){
        return response()->json([
            'errors'=>$validator->messages(),
            'status'=>422]);
            }else{
            $category=new Category();
            $category->fill($request->only([
                'collect_id',
                'name',
                'description',
                'slug',
                'status',
            ]));
            $category->save();
            return $category;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $validator=Validator::make($request->all(),[


            'collect_id'=>'required|numeric',
            'name'=>'required|string',
            'description'=>'nullable|string',
            'slug'=>'required|string',
            'status'=>'required|numeric',
        ]);
        if( $validator->fails()){
            return response()->json([
                'errors'=>$validator->messages(),
                'status'=>422]);
        }else{
                $category=Category::findOrFail();
                $category->fill($request->only([
                    'collect_id',
                    'name',
                    'description',
                    'slug',
                    'status',
                ]));
                $category->save();
                return $category;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category=Category::findOrFail();
        $category->delete();
        return $category;
    }
}
