<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Collect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CollectController extends Controller
{
    public function index()
    {
        // return 1;
        $collects=Collect::with('categories')->paginate(10);
        return $collects;
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
            'name'=>'required|string',
            'description'=>'nullable|string',
        ]);

        $collect=new Collect();

        $collect->fill($request->only([
            'name',
            'description'
        ]));
        $collect->save();


        return $collect;
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
        $collect=Collect::findOrFail($id);
        $collect->fill($request->only([
            'name',
            'description'
        ]));
        $collect->save();
        return $collect;
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
        $collect=Collect::findOrFail($id);
        $collect->delete();
        return $collect;
    }
}
