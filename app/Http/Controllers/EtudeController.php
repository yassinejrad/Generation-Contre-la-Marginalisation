<?php

namespace App\Http\Controllers;

use App\Models\etude;
use Illuminate\Http\Request;

class EtudeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $etudes = etude::all();
        return view("BackEnd.etudes.show", compact("etudes"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view("BackEnd.etudes.create");
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
            'titre'=>"required",
            'lien'=>"required",
            'categorie'=>"required",
            'photo'=>"required",
            'description'=>"required"

        ]);
        etude::create($request->all());
        return redirect()->route('etude')->with("seccuess","Etude Ajouté");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\etude  $etude
     * @return \Illuminate\Http\Response
     */
    public function show(etude $etude)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\etude  $etude
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(etude $etude)
    {
        return view("BackEnd.etudes.edit",compact("etude"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\etude  $etude
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, etude $etude)
    {
        $request->validate([
            'titre'=>"required",
            'lien'=>"required",
            'categorie'=>"required",
            'photo'=>"required",
            'description'=>"required"

        ]);
        $etude->update($request->all());
        return redirect()->route('etude')->with("seccuess","Etude Modifié");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\etude  $etude
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(etude $etude)
    {
        $etude->delete();

        return redirect()->route('etude')
            ->with('success', 'Etude supprimé');
    }
}
