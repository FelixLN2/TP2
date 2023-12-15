<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Genus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 

class GenusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $genera = Genus::all();
        
        return response()->json($genera); 
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
        //     'nom'=>'required',
        //     'description'=> 'required',
            
        // ]);

        // $genus = Genus::create([
        //     'nom' => $request->nom,
        //     'description' => $request->description,
        //     'user_id' => $request->user_id,
        // ]);

        $request->validate([
            'nom'         => 'required',
            'description' => 'required',
            'user_id'    => 'required',
        ]);

        $genus = new Genus();

        $genus->nom = $request->nom;
        $genus->description = $request->description;
        $genus->user_id = $request->user_id;

        $genus->save();

        return response()->json($genus, 201);

       
        // if($user){
        //     $user->genera()->save($genus);
        // }else{
            
        //     return back()->with('error','Not Logged in');
        // }
        //return response()->json($genus, 201);

        //$genus = Genus::create($request->all());

        // return response()->json([
        //     'status' => 'success',
        //     'genus'   => $genus
        // ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Genus  $genus
     * @return \Illuminate\Http\Response
     */
    public function show(Genus $genus)
    {
        return response()->json($genus); 
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Genus  $genus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Genus $genus)
    {
        $this->validate($request, [
            'nom'=>'required',
            'description'=> 'required'
        ]);
    
        // On modifie les informations de l'utilisateur
        $genus->update([
            'nom' => $request->input('nom'),
            'description' => $request->input('description'),
        ]);
    
        // On retourne la réponse JSON
        return response()->json();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Genus  $genus
     * @return \Illuminate\Http\Response
     */
    public function destroy(Genus $genus)
    {
        $genus->delete();

   
        return response()->json();
    }
}
