<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use App\Models\Rider;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Member\MemberUpdateDetails;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mealData = Meal::paginate(6);
        return view('Users.Member.MemberIndex')->with(['mealData'=>$mealData]);
    }

    public function updateMember(){
//      Calling the member update view page
        $member = Member::get(Auth()->user()->id); 
        return view('Users.Member.UpdateMember')->with(['member'=>$member]);
    }
 
    public function updateMemberDetails(MemberUpdateDetails $request){
     
//     Getting the information which is needed to be changed 
        $member = new Member;   
     
        $member->member_name = $request->member_name;
        $member->member_phone = $request->member_phone;
        $member->member_address = $request->member_address;
    
//      Success message
        session()->flash('success','Record updated Successfully');

        return redirect(view('Users.Member.UpdateMember'));
    }

    public function orderMeal($id){

//      Retriving the information of the meal with id
        $mealData = Meal::find($id);
        $rider = Rider::get();

        // $userID = auth()->user()->id; 
        // var_dump($userID);
        // $member  = Member::find($userID);

        return view('Users.Member.BuyMeal')->with(['mealData'=>$mealData])
                                           ->with(['rider'=>$rider]);
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
