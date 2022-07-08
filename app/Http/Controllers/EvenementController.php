<?php

namespace App\Http\Controllers;

use App\Models\evenement;
use Illuminate\Http\Request;

class EvenementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $evenements = evenement::all();
        return view("BackEnd.evenements.show", compact("evenements"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view("BackEnd.evenements.create");
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
            'date'=>"required",
            'photo'=>"required",
            'lieu'=>"required",
            'lien'=>"required",
            'description'=>"required"

        ]);
        evenement::create($request->all());
        return redirect()->route('evenement')->with("seccuess","Evenement Ajouté");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\evenement  $evenement
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(evenement $evenement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\evenement  $evenement
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(evenement $evenement)
    {
        return view("BackEnd.evenements.edit",compact("evenement"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\evenement  $evenement
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, evenement $evenement)
    {
        $request->validate([
            'date'=>"required",
            'photo'=>"required",
            'lieu'=>"required",
            'lien'=>"required",
            'description'=>"required"
        ]);
        $evenement->update($request->all());
        return redirect()->route('evenement')->with("seccuess","Evenement Modifié");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\evenement  $evenement
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(evenement $evenement)
    {
        $evenement->delete();

        return redirect()->route('evenement')
            ->with('success', 'Evenement supprimé');
    }
}
