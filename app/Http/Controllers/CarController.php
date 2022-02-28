<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCarRequest;
use App\Http\Requests\UpdateCarRequest;
use App\Models\Car;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::all();
        return view('car/index', [ 'cars' => $cars ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCarRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCarRequest $request)
    {

        $request->validate([
            'mark' => ['required', 'string'],
            'description' => ['required', 'string'],
            'plate_number' => ['required', 'string'],
            'price_per_day' => ['required', 'integer'],
        ]);

        $car = Car::create([
            'mark' => $request->mark,
            'description' => $request->description,
            'plate_number' => $request->plate_number,
            'price_per_day' => $request->price_per_day,
        ]);

        return redirect("cars");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        return view('show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        /*$car = Car::find($car->id);*/
        return view('car.edit', [ 'car'=>$car ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCarRequest  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCarRequest $request, Car $car)
    {

        $request->validate([
            'mark' => ['required', 'string'],
            'description' => ['required', 'string'],
            'plate_number' => ['required', 'string'],
            'price_per_day' => ['required', 'integer'],
        ]);

        Car::find($car->id)->update([
            'mark' => $request->mark,
            'description' => $request->description,
            'plate_number' => $request->plate_number,
            'price_per_day' => $request->price_per_day,
        ]);
        
        return redirect('cars');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        Car::destroy($car->id);
        return redirect('cars');
    }
}
