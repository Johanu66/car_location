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
        if(auth()->user()->admin) {
            return view('car.create');
        }
        else{
            abort(403);
        }
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        if(auth()->user()->admin) {
            return view('car.edit', [ 'car'=>$car ]);
        }
        else{
            abort(403);
        }
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
        if(auth()->user()->admin) {
            Car::destroy($car->id);
            return redirect('cars');
        }
        else{
            abort(403);
        }
    }
}
