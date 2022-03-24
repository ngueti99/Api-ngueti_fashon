<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands=Brand::with(['products'])->paginate(10);
        return $brands;
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
            'name'=>'required|string',
            'description'=>'nullable|string',
        ]);
        if( $validator->fails()){
            return response()->json([
                'errors'=>$validator->messages(),
                'status'=>422]);
        }else{
        $brand=new Brand();

        $brand->fill($request->only([
            'name',
            'description'
        ]));
        $brand->save();


        return $brand;
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

            'name'=>'required|string',
            'description'=>'nullable|string',
        ]);
        if( $validator->fails()){
            return response()->json([
                'errors'=>$validator->messages(),
                'status'=>422]);
        }else{
        $brand=Brand::findOrFail($id);
        $brand->fill($request->only([
            'name',
            'description'
        ]));
        $brand->save();
        return $brand;
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
        $brand=Brand::findOrFail($id);
        $brand->delete();
        return $brand;
    }
}
