<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Model\Section;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $section = Section::all(); //Elequent
        return response()->json($section);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'class_id' =>'required',
            'section_name'=>'required',
        ]);

        $section= Section::create($request->all());
         //return response()->json($subject);
        return response("Section Inserted Successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $section= Section::findorfail($id);
        return response()->json($section);
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
        // $section = Section::findorfail($id);    //--Eloquent
        // $section->update($request->all());
        // return response("Section Updated");

        $data= array();     //--Query_Builder
        $data['class_id'] = $request->class_id;
        $data['section_name'] = $request->section_name;

        DB::table('sections')->where('id',$id)->update($data);
        return response("Section Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Subject::where('id',$id)->delete();
        $section = Section::findorfail($id)->delete();
        return response("Section Deleted");
    }
}
