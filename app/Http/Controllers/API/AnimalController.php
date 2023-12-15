<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\AnimalResourceResource;
use App\Models\Animal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $animals = Animal::all();
        return response()->json($animals);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $user = Auth::user();
        // $request->validate([
        //     'nom' => 'required',
        //     'description' => 'required',
        //     'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        // ]);

        // $animal = Animal::create([
        //     'nom' => $request->get('nom'),
        //     'description' => $request->get('description'),
        //     'genus_id' => $request->input('genus_id'),
        // ]);

        // if ($user) {
        //     $user->genera()->save($animal);
        // } else {
        //     return response()->json(['error' => 'Not Logged in'], 401);
        // }

        // if ($request->hasFile('image')) {
        //     $imagePath = $request->file('image')->storeAs('/', $request->file('image')->getClientOriginalName());
        //     $file = $request->file('image');
        //     $filename = $file->getClientOriginalName();
        //     $file->storeAs('/', $filename, ['disk' => 'images']);
        //     $animal->image = $imagePath;
        // }

        // return response()->json($animal,201);

        $animal = Animal::create($request->all());

        return response()->json([
            'status' => 'success',
            'animal'   => $animal
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function show(Animal $animal)
    {
        return response()->json($animal);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Animal $animal)
    {
        $this->validate($request, [
            'nom' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $animal->update([
            'nom' => $request->input('nom'),
            'description' => $request->input('description'),
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->storeAs('/', $request->file('image')->getClientOriginalName());
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $file->storeAs('/', $filename, ['disk' => 'images']);
            $animal->image = $imagePath;
        }

        return response()->json(['message' => 'Animal updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Animal $animal)
    {
        $animal->delete();

        return response()->json(['message' => 'Animal deleted successfully']);
    }
}