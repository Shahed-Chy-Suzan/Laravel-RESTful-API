<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Model\S_class;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $class= DB::table('classes')->get();
        return response()->json($class);
        // return S_class::all();
    }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'class_name' =>'required|unique:classes|max:25'
        ]);

       // S_class::create($request->all());

        // $class = New S_class();
        // $class->class_name = $request->class_name;
        // $class->save();

        $data = array();
        $data['class_name'] = $request->class_name;
        DB::table('classes')->insert($data);
        return response('Successfully done');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        //$class = S_class::find($id);
        $class = DB::table('classes')->where('id',$id)->first();
        return response()->json($class);
    }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit($id)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        // $class = S_class::find($id);
        // $class->class_name = $request->class_name;
        // $class->update();

        $data= array();
        $data['class_name'] = $request->class_name;
        DB::table('classes')->where('id',$id)->update($data);

        return response('Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
         DB::table('classes')->where('id',$id)->delete();
        // $class = S_class::find($id);
        // $class->delete();

        return response('Class Deleted');
    }
}
