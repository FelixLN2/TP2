<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Animal;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
     /**
     * Affiche la liste des animals
     */
    public function index()
    {

        $animals = Animal::all();
        return view('animal.index', compact('animals'));

    }


    /**
     * return le formulaire de création d'un animals
     */
    public function create(Request $request)
    {   

        // Get the genus ID from the query parameters
    $genus_id = $request->input('genus_id');

    // Use $genusId as needed
    // ...

    return view('animal.create', compact('genus_id'));

    }


    /**
     * Enregistre un nouveau animal dans la base de données
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'nom'=>'required',
            'description'=> 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', 
    
        ]);
        $animal = new animal([
            'nom' => $request->get('nom'),
            'description' => $request->get('description'),
            'genus_id' => $request->input('genus_id'),           
        ]);
        if($user){
            $user->genera()->save($animal);
        }else{
            
            return back()->with('error','Not Logged in');
        }
        // if ($request->hasFile('image')) {
        //     $imagePath = $request->file('image')->store('public/images');
        //     $animal->image = $imagePath;
        // }
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->storeAs('/', $request->file('image')->getClientOriginalName());
            // The above line stores the file in the public/images folder with its original name.
            $file= $request->file('image');
            $filename = $file->getClientOriginalName();
            $file->storeAs('/', $filename, ['disk' => 'images']);
            $animal->image =  $imagePath; 
        }
      

        $animal->save();
        return redirect('/')->with('success', 'animal Ajouté avec succès');

    }


    /**
     * Affiche les détails d'un animal spécifique
     */

    public function show($id)
    {

        $animal = Animal::findOrFail($id);
        return view('animal.show', compact('animal'));

    }


    /**
     * Return le formulaire de modification
     */

    public function edit($id)
    {

        $animal = Animal::findOrFail($id);

        return view('animal.edit', compact('animal'));

    }


    /**
     * Enregistre la modification dans la base de données
     */
    public function update(Request $request, $id)
    {
        $request->validate([

            'nom'=>'required',
            'description'=> 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
        ]);
        $animal = animal::findOrFail($id);

        $animal->nom = $request->input('nom');
        $animal->description = $request->input('description');

        // if ($request->hasFile('image')) {
        //     $imagePath = $request->file('image')->store('public/images');
        //     $animal->image = $imagePath;
        // }
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->storeAs('/', $request->file('image')->getClientOriginalName());
            // The above line stores the file in the public/images folder with its original name.
            $file= $request->file('image');
            $filename = $file->getClientOriginalName();
            $file->storeAs('/', $filename, ['disk' => 'images']);
            $animal->image =  $imagePath; 
            
        }
        

        $animal->save();

        return redirect('/')->with('success', 'animal Modifié avec succès');

    }




    /**
     * Supprime le article dans la base de données
     */
    public function destroy($id)
    {

        $animal = Animal::findOrFail($id);
        $animal->delete();

        return redirect('/')->with('success', 'animal Supprimé avec succès');

    }
}
