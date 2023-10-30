<?php

namespace App\Http\Controllers;

use App\Models\Genus;
use Illuminate\Http\Request;

class GenusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $genera= Genus::all();
        return view('genus.index', compact('genera'));

    }


    /**
     * return le formulaire de création d'un genuss
     */
    public function create()
    {

        return view('genus.create');

    }


    /**
     * Enregistre un nouveau genus dans la base de données
     */
    public function store(Request $request)
    {

        $request->validate([
            'nom'=>'required',
            'description'=> 'required'//,
            
        ]);


        $genus = new genus([
            'nom' => $request->get('nom'),
            'description' => $request->get('description'),
            
        ]);


        $genus->save();
        return redirect('/')->with('success', 'genus Ajouté avec succès');

    }


    /**
     * Affiche les détails d'un genus spécifique
     */

    public function show($id)
    {

        $genus = Genus::findOrFail($id);
        return view('genus.show', compact('genus'));

    }


    /**
     * Return le formulaire de modification
     */

    public function edit($id)
    {

        $genus = Genus::findOrFail($id);

        return view('genus.edit', compact('genus'));

    }


    /**
     * Enregistre la modification dans la base de données
     */
    public function update(Request $request, $id)
    {

        $request->validate([

            'nom'=>'required',
            'description'=> 'required'//,
            //'auteur' => 'required'

        ]);




        $genus = genus::findOrFail($id);
       /*$genus->nom = $request->get('nom');
        $genus->description = $request->get('description');*/
        //$genus->user_id = $request->get('auteur');
        $genus->update([
            'nom' => $request->input('nom'),
            'description' => $request->input('description'),
        ]);

        return redirect('/')->with('success', 'genus Modifié avec succès');

    }




    /**
     * Supprime le article dans la base de données
     */
    public function destroy($id)
    {

        $genus = Genus::findOrFail($id);
        $genus->delete();

        return redirect('/')->with('success', 'genus Supprimé avec succès');

    }
}
