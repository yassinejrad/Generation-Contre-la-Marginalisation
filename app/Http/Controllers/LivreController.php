<?php

namespace App\Http\Controllers;

use App\Models\livre;
use Illuminate\Http\Request;

class LivreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $livres = livre::all();
        return view("BackEnd.livres.show", compact("livres"));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view("BackEnd.livres.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom'=>"required",
            'auteur'=>"required",
            'photo'=>"required",
            'quantite'=>"required"

        ]);
        livre::create($request->all());
        return redirect()->route('livre')->with("seccuess","Livre Ajouté");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\livre  $livre
     * @return \Illuminate\Http\Response
     */
    public function show(livre $livre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\livre  $livre
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(livre $livre)
    {
        return view("BackEnd.livres.edit",compact("livre"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\livre  $livre
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, livre $livre): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'nom'=>"required",
            'auteur'=>"required",
            'photo'=>"required",
            'quantite'=>"required"
        ]);
        $livre->update($request->all());
        return redirect()->route('livre')->with("seccuess","Livre Modifié");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\livre  $livre
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(livre $livre)
    {
        $livre->delete();

        return redirect()->route('livre')
            ->with('success', 'Livre supprimé');

    }
}
