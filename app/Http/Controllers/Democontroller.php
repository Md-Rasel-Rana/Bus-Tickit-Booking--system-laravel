<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use App\Models\User;
use App\Models\Location;
use App\Models\SeatAllocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class Democontroller extends Controller
{
public function index(){
    return view('Home');
}
public function signIn(){
    return view('pages.signin');
}
public function User_signinStore(Request $request){


              // Validate incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|string|min:8',
            // Add other fields if needed
        ]);

        // Store validated data in the database using the User model
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' =>$validatedData['password'],
            // Add other fields if needed
        ]);

        // Optionally, you can perform additional actions here

        // Redirect somewhere after successful submission
        return redirect('/login/purchase')->with('success', 'User Sign in successfully!');
    }


    public function tripStore(Request $request){
        if (!Auth::check()) {
            // Redirect the user to the login page
            return redirect('/login')->with('error', 'Please log in to create a trip.');
        }
     // Validate the form data
     $validatedData = $request->validate([
        'trip_date' => 'required|date',
        'from_location' => 'required',
        'to_location' => 'required',
       
    ]);

    // Fetch location IDs based on the location names
    $fromLocation = Location::where('name', $validatedData['from_location'])->first();
    $toLocation = Location::where('name', $validatedData['to_location'])->first();

    // Create a new trip using the Trip model and save it to the database
    $trip = new Trip();
    $trip->trip_date = $validatedData['trip_date'];
    $trip->from_location_id = $fromLocation->id; // Assign the location ID
    $trip->to_location_id = $toLocation->id; // Assign the location ID
    // Add other trip properties as needed
    $trip->save();

    // Redirect or return a response
    return redirect()->with('success', 'Trip created successfully!');
    }

    public function trippurchaseview(){
        $userid=User::all();
        $Triplocations=Trip::all();
       return view('pages.Tickitpurchase', compact('userid','Triplocations'));
       
    }
    public function trippurchasesell(Request $request){
        //dd($request);
        $seat = new SeatAllocation();
        $seat->Bus_name  = $request->input('Bus_name');
        $seat->user_id = $request->input('user_id');
        $seat->trip_id = $request->input('trip_id');
        $seat->Form_location  = $request->input('from_location');
        $seat ->To_location = $request->input('to_location');
        $seat ->seat_number = $request->input('seat_number');
        $seat->save();
        return redirect('/')->with('success', 'Seat allocated successfully!');
    }


    public function tickitshow(){
        $allseats= SeatAllocation::with();
        return view('pages.tickitshow',compact('allseats'));
    }










    }


 













