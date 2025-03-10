<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Course;
use App\Models\CourseContent;

class LessonController extends Controller
{
    // public function learningPage($course_slug)
    // {
    //     $course = Course::where('slug', $course_slug)->first();
    //     $lessons = $course->contents;

    //     // Default to first lesson if no lesson is selected
    //     $currentLesson = request()->lesson_id ? 
    //                         CourseContent::find(request()->lesson_id) : 
    //                         $lessons->first();

    //     return view('site.courses.learning', compact('course', 'lessons', 'currentLesson'));
    // }

    public function learningPage($course_slug)
    {
        $course = Course::where('slug', $course_slug)->first();
        $lessons = $course->contents->sortBy('step_number'); // Ensure lessons are ordered by `sl_no`

        // Get the current lesson
        $currentLesson = request()->lesson_id 
                            ? CourseContent::where('id', request()->lesson_id)->first()
                            : $lessons->first();

        // Get previous and next lessons based on `sl_no`
        $prevLesson = CourseContent::where('course_id', $course->id)
                                   ->where('step_number', '<', $currentLesson->step_number)
                                   ->orderBy('step_number', 'desc')
                                   ->first();
        // $prevLesson = [];

        $nextLesson = CourseContent::where('course_id', $course->id)
                                   ->where('step_number', '>', $currentLesson->step_number)
                                   ->orderBy('step_number', 'asc')
                                   ->first();
        // $nextLesson = [];

        return view('site.courses.learning', compact('course', 'lessons', 'currentLesson', 'prevLesson', 'nextLesson'));
    }

}