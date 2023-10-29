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
           /* 'titre'=>'required',
            'content'=> 'required',
            'auteur' => 'required'*/
        ]);


        $genus = new genus([
          /*  'titre' => $request->get('titre'),
            'content' => $request->get('content'),
            'auteur' => $request->get('auteur')*/
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
/*
            'titre'=>'required',
            'content'=> 'required',
            'auteur' => 'required'
*/
        ]);




        $genus = genus::findOrFail($id);
       /* $genus->titre = $request->get('titre');
        $genus->content = $request->get('content');
        $genus->auteur = $request->get('auteur');*/
        $genus->update();

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
