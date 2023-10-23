<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
      /**
     * Affiche la liste des genres
     */
    public function index()
    {

        $genres = Genre::all();
        return view('genre.index', compact('genres'));

    }


    /**
     * return le formulaire de création d'un genres
     */
    public function create()
    {

        return view('genre.create');

    }


    /**
     * Enregistre un nouveau genre dans la base de données
     */
    public function store(Request $request)
    {

        $request->validate([
           /* 'titre'=>'required',
            'content'=> 'required',
            'auteur' => 'required'*/
        ]);


        $genre = new gente([
          /*  'titre' => $request->get('titre'),
            'content' => $request->get('content'),
            'auteur' => $request->get('auteur')*/
        ]);


        $genre->save();
        return redirect('/')->with('success', 'genre Ajouté avec succès');

    }


    /**
     * Affiche les détails d'un genre spécifique
     */

    public function show($id)
    {

        $genre = Genre::findOrFail($id);
        return view('genre.show', compact('genre'));

    }


    /**
     * Return le formulaire de modification
     */

    public function edit($id)
    {

        $genre = Genre::findOrFail($id);

        return view('genre.edit', compact('genre'));

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




        $genr = genre::findOrFail($id);
       /* $genre->titre = $request->get('titre');
        $genre->content = $request->get('content');
        $genre->auteur = $request->get('auteur');*/
        $genre->update();

        return redirect('/')->with('success', 'genre Modifié avec succès');

    }




    /**
     * Supprime le article dans la base de données
     */
    public function destroy($id)
    {

        $genre = Genre::findOrFail($id);
        $genre->delete();

        return redirect('/')->with('success', 'genre Supprimé avec succès');

    }

}
