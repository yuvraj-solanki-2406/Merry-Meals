<?php

namespace App\Http\Controllers;

use App\Models\MemberOrder;
use App\Models\Riderdelivery;
use Illuminate\Http\Request;

class RiderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $member_order = MemberOrder::get();

        return view('Users.Riders.RiderIndex')->with(['member_order'=>$member_order]);
    }

    public function riderDelivery($id){

        $memberorder = MemberOrder::find($id);
        return view('Users.Riders.RiderDelivery')->with(['memberorder'=>$memberorder]);
    }

    public function confirmDelivery(Request $request){
        $riderdelivery = new Riderdelivery();

        $riderdelivery->rider_name = $request->input('rider_name');
        $riderdelivery->member_name = $request->input('member_name');
        $riderdelivery->member_address = $request->input('member_address');
        $riderdelivery->member_email= $request->input('rider_name');
        $riderdelivery->organization_name = $request->input('organization_name');
        $riderdelivery->organization_address = $request->input('organization_address');
        $riderdelivery->distance = $request->input('distance');
        $riderdelivery->user_id = Auth()->user()->id;

        $riderdelivery->save();

        return redirect('/rider/confirmed');
    }

    public function confirmPage(){
        return view('Users.Riders.RiderConfirm')->with('success','Deliver confirmation done');
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
