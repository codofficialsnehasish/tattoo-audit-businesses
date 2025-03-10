<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\CourseContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class CourseContentController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {       
        return [
            new Middleware('permission:Course Content Show', only: ['index','show']),
            new Middleware('permission:Course Content Create', only: ['create','store']),
            new Middleware('permission:Course Content Edit', only: ['edit','update']),
            new Middleware('permission:Course Content Delete', only: ['destroy']),
        ];
    }

    public function index(string $cource_id)
    {
        $contents = CourseContent::where('course_id',$cource_id)->get();
        return view('admin.cource_and_exams.cource-content.index',compact('contents'));
    }

    public function create(string $cource_id)
    {
        return view('admin.cource_and_exams.cource-content.create');
    }

    public function store(Request $request)
    {
        // return $request->all();
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'content' => 'required',
            // 'is_visible' => 'required|in:1,0'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }else{
            $content = new CourseContent();
            $content->course_id = $request->course_id;
            $content->title = $request->title;
            $content->content = $request->content;
            $content->step_number = 1;
            // if ($request->hasFile('image')) {
            //     $course->addMedia($request->file('image'))->toMediaCollection('course-image');
            // }

            $res = $content->save();
            if($res){
                return back()->with('success','Cource Content Saved Successfully');
            }else{
                return back()->with('error','Cource Content Not Saved');
            }
        }
    }

    public function show(Course $course)
    {
        //
    }

    public function edit(string $id, string $cource_id)
    {
        $item = CourseContent::findOrFail($id);
        return view('admin.cource_and_exams.cource-content.edit',compact('item'));
    }

    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'content' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }else{
            $content = CourseContent::findOrFail($id);
            // $content->course_id = $request->course_id;
            $content->title = $request->title;
            $content->content = $request->content;
            $content->step_number = 1;

            // if ($request->hasFile('image')) {
            //     $course->clearMediaCollection('course-image');
            //     $course->addMedia($request->file('image'))->toMediaCollection('course-image');
            // }

            $res = $content->update();
            if($res){
                return back()->with('success','Cource Content Updated Successfully');
            }else{
                return back()->with('error','Cource Content Not Updated');
            }
        }
    }

    public function destroy(string $id)
    {
        $item = CourseContent::findOrFail($id);
        $res = $item->delete();
        if($res){
            return back()->with(['success'=>'Deleted Successfully']);
        }else{
            return back()->with(['error'=>'Not Deleted']);
        }
    }

    public function sort(Request $request, $courseId)
    {
        foreach ($request->order as $item) {
            CourseContent::where('id', $item['id'])
                ->update(['step_number' => $item['position']]);
        }

        return response()->json(['success' => true]);
    }

}