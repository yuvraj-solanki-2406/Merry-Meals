<?php

namespace App\Http\Controllers;

use Error;
use App\Models\User;
use Dotenv\Validator;
use App\Models\Donate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Console\View\Components\Alert;
use PHPUnit\TextUI\XmlConfiguration\CodeCoverage\Report\Php;

class DonorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_data = User::get();
        if (Auth()->check() == true) {
            return view('Users.Donor.DonorIndex')->with(['user_data'=>$user_data]);
        }else
            return redirect('/login')->with('alert','Please Login First!!');
    }
    
    public function updateDonor()
    {
        return "This will be update page";
    }

    public function addDonation(){
        // $donor_data = User::get();
        // return view('Users.Donor.addDonation')->with([$donor_data]);
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

        $this->validate($request,[
            'donor_name'=>'required',
            'donor_phone'=>'required',
            'donation_amount'=>'required'
        ]);

        $donor = new Donate();

        $donor->donor_name = $request->donor_name;
        $donor->donor_phone = $request->donor_phone;
        $donor->donation_amount = $request->donation_amount;
        $donor->user_id = Auth()->user()->id;

        $donor->save();

        Session::put('donation_amount');

        return redirect()->route('donor#index')->with('addDonation', 'Donation added Sucessfully');
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
