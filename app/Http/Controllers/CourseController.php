<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$courses = Course::paginate(10);
        // return view('course.index');
        $courses = Course::paginate(10);
        foreach($courses as $course){
            $course->setAttribute('path', '/courses/'. $course->slug);
        }

        return $courses;
    }

    public function getCourses(){
        $courses = Course::paginate(10);
        foreach($courses as $course){
            $course->setAttribute('path', '/courses/'. $course->slug);
        }

        return $courses;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('course.create');
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
            'image'=> 'mims:jpg,png|max:4000'
            ]);
        $name = null;

        if($request->hasFile('image')){
            $extension = $request->image->getClientOriginalExtension();
            $name = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('images', $name));
        }

        $course = new Course();
        $course->name = $request->input('name');
        $course->description = $request->input('description');
        $course->slug = Str::slug($request->input('name'));
        $course->category_id = $request->input('category');

        $course->image()->create(['file_name'=>$name]);

        $course->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        if($course->delete()){
            Storage::delete($course->image()->file_name);
        }
    }
}
