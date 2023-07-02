<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;
use App\Models\Farm;

class AnimalController extends Controller
{
    public function index(Farm $farm)
    {
        // Authorization check to ensure the user can access the farm's animals
        $this->authorize('view', $farm);

        $animals = $farm->animals()->paginate(10);
        return response()->json($animals);
    }

    public function create(Farm $farm)
    {
        // This method is not required for a resource controller
    }

    public function store(Request $request, Farm $farm)
    {
        // Authorization check to ensure the user can add animals to the farm
        $this->authorize('update', $farm);

        $request->validate([
            'animal_number' => 'required',
            'type_name' => 'required',
            'years' => 'nullable|integer',
        ]);

        $animalCount = $farm->animals()->count();
        if ($animalCount >= 3) {
            return response()->json(['message' => 'Maximum animal limit reached.'], 400);
        }

        $animal = new Animal;
        $animal->animal_number = $request->animal_number;
        $animal->type_name = $request->type_name;
        $animal->years = $request->years;
        $animal->farm_id = $farm->id;
        $animal->save();

        return response()->json($animal, 201);
    }

    public function show(Farm $farm, Animal $animal)
    {
        // Authorization check to ensure the user can access the farm's animals
        $this->authorize('view', $farm);

        return response()->json($animal);
    }

    public function edit(Farm $farm, Animal $animal)
    {
        // This method is not required for a resource controller
    }

    public function update(Request $request, Farm $farm, Animal $animal)
    {
        // Authorization check to ensure the user can update the farm's animals
        $this->authorize('update', $farm);

        $request->validate([
            'animal_number' => 'required',
            'type_name' => 'required',
            'years' => 'nullable|integer',
        ]);

        $animal->animal_number = $request->animal_number;
        $animal->type_name = $request->type_name;
        $animal->years = $request->years;
        $animal->save();

        return response()->json($animal);
    }

    public function destroy(Farm $farm, Animal $animal)
    {
        // Authorization check to ensure the user can delete the farm's animals
        $this->authorize('delete', $farm);

        $animal->delete();

        return response()->json(null, 204);
    }
}
