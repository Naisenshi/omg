<?php

namespace App\Http\Controllers;

use App\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Auth::user()->cars;
        return response()->json([
            'cars' => $cars
        ], 200);
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
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'model' => 'required',
            'brand' => 'required',
            'template' => 'required',
            'weight' => 'required'


        ]);
        $car = $request->user()->cars()->create([
            'name' => $request->name,
            'address' => $request->address,
            'model' => $request->model,
            'brand' => $request->brand,
            'template' => $request->template,
            'weight' => $request->weight
        ]);
        return response()->json([
            'car' => $car,
            'message' => 'Car Registration has been Created'
        ]);

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
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'model' => 'required',
            'brand' => 'required',
            'template' => 'required',
            'weight' => 'required'


        ]);
        $car = $request->user()->cars()->whereId($id)->update($request->all());

        return response()->json([
            'car' => $car,
            'message' => 'Car Registration has been Updated'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        $car->delete();
        return response()->json([
            'car' => $car,
            'message' => 'Car Registration has been Deleted'
        ]);
    }
}
