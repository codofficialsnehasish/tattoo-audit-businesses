<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class CourseController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:Course Show', only: ['index','show']),
            new Middleware('permission:Course Create', only: ['create','store']),
            new Middleware('permission:Course Edit', only: ['edit','update']),
            new Middleware('permission:Course Delete', only: ['destroy']),
        ];
    }

    public function index()
    {
        $courses = Course::all();
        return view('admin.cource_and_exams.cource.index',compact('courses'));
    }

    public function create()
    {
        return view('admin.cource_and_exams.cource.create');
    }

    public function store(Request $request)
    {
        // return $request->all();
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'description' => 'required',
            'image' => 'nullable|image|max:2048',
            'is_visible' => 'required|in:1,0'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }else{
            $course = new Course();
            $course->title = $request->name;
            $course->slug = createSlug($request->name,Course::class);
            $course->description = $request->description;
            $course->type = $request->type;
            $course->price = $request->price;
            $course->is_visible = $request->is_visible;
            if ($request->hasFile('image')) {
                $course->addMedia($request->file('image'))->toMediaCollection('course-image');
            }

            $res = $course->save();
            if($res){
                return back()->with('success','Cource Created Successfully');
            }else{
                return back()->with('error','Cource Not Created');
            }
        }
    }

    public function show(Course $course)
    {
        //
    }

    public function edit(string $id)
    {
        $item = Course::findOrFail($id);
        return view('admin.cource_and_exams.cource.edit',compact('item'));
    }

    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'description' => 'required',
            'image' => 'nullable|image|max:2048',
            'is_visible' => 'required|in:1,0'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }else{
            $course = Course::findOrFail($id);
            if($course->title != $request->name){
                $course->slug = createSlug($request->name,Course::class);
            }
            $course->title = $request->name;
            $course->description = $request->description;
            $course->type = $request->type;
            $course->price = $request->price;
            $course->is_visible = $request->is_visible;
            if ($request->hasFile('image')) {
                $course->clearMediaCollection('course-image');
                $course->addMedia($request->file('image'))->toMediaCollection('course-image');
            }

            $res = $course->update();
            if($res){
                return back()->with('success','Course Updated Successfully');
            }else{
                return back()->with('error','Course Not Updated');
            }
        }
    }

    public function destroy(string $id)
    {
        $item = Course::findOrFail($id);
        $res = $item->delete();
        if($res){
            return back()->with(['success'=>'Deleted Successfully']);
        }else{
            return back()->with(['error'=>'Not Deleted']);
        }
    }
}
