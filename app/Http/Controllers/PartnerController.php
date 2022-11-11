<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use App\Models\User;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class PartnerController extends Controller
{
    //
    public function index()
    {
        $mealData = Meal::paginate(6);
        return view('Users.Partner.partnerIndex')->with(['mealData' => $mealData]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    //partner add meal
    public function addMeal()
    {
        $partner_data = Partner::get();
        $user_data = User::get();
        return view('Users.Partner.addMeal')->with(['partnerData' => $partner_data, 'userData' => $user_data]);
    }

    public function createMeal(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'meal_name' => 'required',
            'meal_type' => 'required',
            'meal_image' => 'required',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        
        $meal = new Meal();

        if ($request->hasfile('meal_image')) {

            $imageFile = $request->file('meal_image');
            $imageName = uniqid() . '_' . $imageFile->getClientOriginalName();
            $imageFile->move(public_path() . './uploads/meal', $imageName);

            $meal->meal_image = $imageName;
        }

        $meal->meal_name = $request->input('meal_name');
        $meal->meal_type = $request->input('meal_type');
        $meal->partner_id = $request->input('partner');
        $meal->user_id = $request->input('user');
        $meal->partner_organization = $request->input('partner_organization');
        $meal->partner_address = $request->input('partner_address');
        $meal->partner_latitude = $request->input('partner_latitude');
        $meal->partner_longitude = $request->input('partner_longitude');
        $meal->save();
         
        return redirect()->route('partner#index')->with(['mealCreated', 'Meal Created Sucessfully']);
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
    public function editMeal($id)
    {
        $partner_data =  Partner::get();
        $user_data = User::get();
        $editMeal = Meal::where('id', $id)
            ->first();
        return view('Users.Partner.updateMeal')->with(['editMeal' => $editMeal, 'userData' => $user_data, 'partnerData' => $partner_data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateMeal(Request $request, $id)
    {
        $updateData = $this->requestUpdateMealData($request);

        //get old image
        $updateImgData = Meal::select('meal_image')->where('id', $id)->first();
        $updateImage = $updateImgData['meal_image'];

        //delete old image
        if (File::exists(public_path() . '/uploads/meal/' . $updateImage)) {
            File::delete(public_path() . '/uploads/meal/' . $updateImage);
        }

        //get new image
        $newImageFile = $request->file('meal_image');
        $newImageName = uniqid() . '_' . $newImageFile->getClientOriginalName();
        $newImageFile->move(public_path() . './uploads/meal/', $newImageName);

        $updateData['meal_image'] = $newImageName;


        //update database image
        Meal::where('id', $id)->update($updateData);
        return redirect()->route('partner#index')->with(['updateData' => 'Meal updated Sucessfully']);
    }

    // partner delete meal
    public function deleteMeal($id)
    {
        $deleteData = Meal::select('meal_image')->where('id', $id)->first();
        $deleteImage = $deleteData['meal_image'];

        Meal::where('id', $id)->delete(); //db data delete

        //project image folder delete
        if (File::exists(public_path() . '/uploads/meal/' . $deleteImage)) {
            File::delete(public_path() . '/uploads/meal/' . $deleteImage);
        }

        return back()->with(['mealDeleted' => "Meal Delete Successfully"]);
    }

    //update partner
    public function updatePartner()
    {
        return view('Users.Partner.updatePartner');
    }

    //request update category data
    private function requestUpdateMealData($request)
    {
        $arr = [
            'meal_name' => $request->meal_name,
            'meal_type' => $request->meal_type,
            'partner_id' => $request->partner,
            'user_id' => $request->user,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];

        if (isset($request->meal_image)) {
            $arr['meal_image'] = $request->meal_image;
        }

        return $arr;
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
