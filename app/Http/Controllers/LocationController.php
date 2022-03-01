<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLocationRequest;
use App\Http\Requests\UpdateLocationRequest;
use App\Models\Location;
use App\Models\Car;
use App\Models\User;
use DateTime;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->admin) {
            $locations = Location::all();
            return view('location.index', [ 'locations'=>$locations ]);
        }
        else{
            abort(403);
        }
    }


    public function my_locations()
    {
        $locations = auth()->user()->locations;
        return view('location.my_locations', [ 'locations'=>$locations ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function create(Car $car)
    {
        return view('location.create', [ 'car'=>$car ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLocationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLocationRequest $request)
    {

        $request->validate([
            'start_at' => ['required', 'date'],
            'end_at' => ['required', 'date'],
            'car_id' => ['required', 'integer'],
        ]);

        $start_at = $request->start_at;
        $end_at = $request->end_at;
        $datetime1 = new DateTime($start_at);
        $datetime2 = new DateTime($end_at);
        $interval = $datetime1->diff($datetime2);
        $days = $interval->format('%a');

        $location = Location::create([
            'start_at' => $request->start_at,
            'end_at' => $request->end_at,
            'total_price' => Car::find($request->car_id)->price_per_day*$days,
            'car_id' => $request->car_id,
            'user_id' => auth()->user()->id,
        ]);

        return redirect("cars");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function show(Location $location)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function edit(Location $location)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLocationRequest  $request
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLocationRequest $request, Location $location)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function destroy(Location $location)
    {
        if(auth()->user()->admin or $location->user==auth()->user()) {
            Location::destroy($location->id);
            return redirect()->back();
        }
        else{
            abort(403);
        }
    }
}
