<?php

namespace App\Http\Controllers;

use App\Models\MemberOrder;
use App\Models\Rider;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class MemberOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $member_details = MemberOrder::all();
        

        return view('Users.Member.MealUpdates',['member_details'=>$member_details]);
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
    public function orderFood(Request $request)
    {
        // Adding the food ordering details in member_orders table
        $member_order = new MemberOrder();

        $file_name='';

        if ($request->hasfile('meal_image')) {

            $imageFile = $request->file('meal_image');
            $imageName = uniqid() . '_' . $imageFile->getClientOriginalName();
            $imageFile->move(public_path() . './uploads/meal', $imageName);

            $member_order->meal_image = $imageName;
            $file_name == $imageName;
        }

        $member_order->member_name = $request->input('member_name');
        $member_order->member_address = $request->input('member_address');
        $member_order->member_phone = $request->input('member_email');
        $member_order->member_latitude = $request->input('member_latitude');
        $member_order->member_longitude = $request->input('member_longitude');
        $member_order->meal_name = $request->input('meal_name');
        $member_order->meal_type = $request->input('meal_type');
        $member_order->meal_image = $file_name;
        $member_order->partner_organizations = $request->input('partner_organization');
        $member_order->partner_address = $request->input('partner_address');
        $member_order->partner_latitude = $request->input('partner_latitude');
        $member_order->partner_longitude = $request->input('partner_longitude');
        $member_order->rider = $request->input('rider_name');

        $member_order->save();
        
        $lat1 = $request->input('member_latitude');
        $longi1 = $request->input('member_longitude');
        $lat2 = $request->input('partner_latitude');
        $longi2 = $request->input('partner_longitude');

        return redirect('/member/mealupdates')->with('success','Order Placed successfully')
                                              ->with('lat1',$lat1)
                                              ->with('longi1',$longi1)
                                              ->with('lat2',$lat2)
                                              ->with('longi2',$longi2);
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
