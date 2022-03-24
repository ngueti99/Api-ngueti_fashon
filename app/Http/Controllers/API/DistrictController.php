<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\District;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $districts=District::with(['city'])->paginate(10);
        return $districts;
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
            'city_id'=>'required|numeric',
            'name'=>'required|string',
            'description'=>'nullable|string',
        ]);
        if( $validator->fails()){
            return response()->json([
                'errors'=>$validator->messages(),
                'status'=>422]);
        }else{
        $district=new District();
        $district->fill($request->only([
            'city_id',
            'name',
            'description'
        ]));
        $district->save();
        return $district;
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
            'city_id'=>'required|numeric',
            'name'=>'required|string',
            'description'=>'nullable|string',
        ]);
        if( $validator->fails()){
            return response()->json([
                'errors'=>$validator->messages(),
                'status'=>422]);
        }else{
       $district=District::findOrFail($id);
       $district->fill($request->only([
        'city_id',
        'name',
        'description'
    ]));
    $district->save();
    return $district;
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
        $district=District::findOrFail($id);
        $district->delete();
            return $district;
    }
}
