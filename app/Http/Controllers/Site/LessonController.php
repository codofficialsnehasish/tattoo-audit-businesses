<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Course;
use App\Models\CourseContent;

class LessonController extends Controller
{
    public function learningPage($course_slug)
    {
        $course = Course::where('slug',$course_slug)->first();
        $lessons = $course->contents;

        // Default to first lesson if no lesson is selected
        $currentLesson = request()->lesson_id ? 
                            CourseContent::find(request()->lesson_id) : 
                            $lessons->first();

        return view('site.courses.learning', compact('course', 'lessons', 'currentLesson'));
    }

}