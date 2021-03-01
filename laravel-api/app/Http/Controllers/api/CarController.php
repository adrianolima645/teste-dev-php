<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;
use App\Http\Requests\StoreCarRequest;

class CarController extends Controller
{
    //retorna lista de carros cadastrados
    public function index()
    {
        return Car::all();
    }


    public function create()
    {
        //
    }

    //armazena novo carro no banco de dados
    public function store(StoreCarRequest $request)
    {
        $result = Car::create($request->all());
        return $result;
    }

    //retorna um carro do $id específico
    public function show($id)
    {
        return Car::findOrFail($id);
    }


    public function edit($id)
    {
       //
    }

    //altera dados do carro específico no banco de dados
    public function update(StoreCarRequest $request, $id)
    {
        $car = Car::findOrFail($id);
        $car->update($request->all());
        return $car;
    }
    
    //remove dados do carro específico no banco de dados
    public function destroy($id)
    {
        $car = Car::findOrFail($id);
        $car->delete();
        return $car;
    }
}
