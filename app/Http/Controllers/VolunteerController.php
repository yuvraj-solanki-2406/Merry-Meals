<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Manpower;
use App\Models\Resource;
use App\Models\Volunteer;
use Illuminate\Http\Request;

class VolunteerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Users.Volunteer.volunteerindex');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    //Creating a blog 
    public function createBlog(){
        $vol = Volunteer::get();
        return view('Users.Volunteer.volunteerblog')->with(['vol' => $vol]);
    }

    //Submitting Blog Page
    public function submitBlog(Request $request){
        $blog = new Blog();
        $blog->writer_name = $request->writer_name;
        $blog->blog_title = $request->blog_title;
        $blog->blog_desc = $request->blog_desc;
        $blog->user_id = Auth()->User()->id;
        $blog->save();

        return redirect()->route('volunteer#index')->with('success', 'Blog added successfully');
    }

    public function getBlog(){
        $blogDetails = Blog::get();
        return view('blog')->with(['blogDetails'=>$blogDetails]);
    }

    public function VolunteerManpower(Request $request){
        $manpower = new Manpower();
        $manpower->volnteer_manpower_name = $request->input('vol_manpower_name');
        $manpower->volnteer_manpower_email = $request->input('vol_manpower_email');
        $manpower->volnteer_manpower_phone = $request->input('vol_manpower_phone');
        $manpower->volnteer_manpower_days = $request->input('vol_manpower_days');
        $manpower->volnteer_manpower_hours = $request->input('vol_manpower_hours');
        $manpower->user_id = Auth()->user()->id;

        $manpower->save();

        return redirect()->route('volunteer#index')->with('manpower_success','Your info is submitted');
    }

    public function VolunteerResources(Request $request){
        $resources = new Resource();

        $resources->vol_resource_name = $request->input('vol_resource_name');
        $resources->vol_resource_email = $request->input('vol_resource_email');
        $resources->vol_resource_phone = $request->input('vol_resource_phone');
        $resources->vol_resources = $request->input('vol_resources');
        $resources->user_id = Auth()->user()->id;

        $resources->save();

        return redirect()->route('volunteer#index')->with('manpower_success','Your info is submitted');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
