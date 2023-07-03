<?php

namespace App\Http\Controllers;

use App\Models\Farm;
use App\Models\User;
use Illuminate\Http\Request;
class FarmController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        if ($user) {
            // Doctrine metode (Jau ir iebuveta Laravela)


            // dd ir Laravel Debug sistema, tas nozime Debug,die. Talak kods neizpildisies
            dd($user);

            $farms = Farm::Where('user_id', $user->id);
            return response()->json($farms->paginate(10));
        }
    
    // If the user is not authenticated, return a response indicating the unauthorized access
    return response()->json(['error' => 'Unauthorized'], 401);
    
    // Alternatively, you can redirect the user to a login page
    // return redirect()->route('login');
}

    public function create()
    {
        // This method is not required for a resource controller
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'nullable|email',
            'website' => 'nullable|url',
        ]);

        $farm = new Farm;
        $farm->name = $request->name;
        $farm->email = $request->email;
        $farm->website = $request->website;
        $farm->user_id = auth()->id();
        $farm->save();

        return response()->json($farm, 201);
    }

    public function show(Farm $farm)
    {
        // Authorization check to ensure the user can access the farm
        $this->authorize('view', $farm);

        return response()->json($farm);
    }

    public function edit(Farm $farm)
    {
        // This method is not required for a resource controller
    }

    public function update(Request $request, Farm $farm)
    {
        // Authorization check to ensure the user can update the farm
        $this->authorize('update', $farm);

        $request->validate([
            'name' => 'required',
            'email' => 'nullable|email',
            'website' => 'nullable|url',
        ]);

        $farm->name = $request->name;
        $farm->email = $request->email;
        $farm->website = $request->website;
        $farm->save();

        return response()->json($farm);
    }

    public function destroy(Farm $farm)
    {
        // Authorization check to ensure the user can delete the farm
        $this->authorize('delete', $farm);

        $farm->delete();

        return response()->json(null, 204);
    }
}
