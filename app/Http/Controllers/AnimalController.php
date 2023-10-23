<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
      /**
     * Affiche la liste des animaux
     */
    public function index()
    {

        $animaux = Animal::all();
        return view('animal.index', compact('animaux'));

    }


    /**
     * return le formulaire de création d'un animaux
     */
    public function create()
    {

        return view('animal.create');

    }


    /**
     * Enregistre un nouveau animal dans la base de données
     */
    public function store(Request $request)
    {

        $request->validate([
           /* 'titre'=>'required',
            'content'=> 'required',
            'auteur' => 'required'*/
        ]);


        $animal = new gente([
          /*  'titre' => $request->get('titre'),
            'content' => $request->get('content'),
            'auteur' => $request->get('auteur')*/
        ]);


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
/*
            'titre'=>'required',
            'content'=> 'required',
            'auteur' => 'required'
*/
        ]);




        $animal = animal::findOrFail($id);
       /* $animal->titre = $request->get('titre');
        $animal->content = $request->get('content');
        $animal->auteur = $request->get('auteur');*/
        $animal->update();

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
