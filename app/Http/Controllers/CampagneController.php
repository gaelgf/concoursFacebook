<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Campagne;

class CampagneController extends Controller
{
    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$campagnes = Campagne::all();
        return view('campagnes.index', ['campagnes' => $campagnes]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('campagnes.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
            'nom_campagne' => 'required|string',
            'logo_entreprise' => 'required|url',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date',
            'couleur' => 'required|string',
            'url_icone' => 'required|url',
            'text_accueil' => 'required|string',
            'text_felicitations' => 'required|string'
        );
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('campagnes/create')
                ->withErrors($validator);
        }
        // store
        $campagne = new Campagne;
        $campagne->nom_campagne = Input::get('nom_campagne');
        $campagne->logo_entreprise = Input::get('logo_entreprise');
        $campagne->date_debut = Input::get('date_debut');
        $campagne->date_fin = Input::get('date_fin');
        $campagne->couleur = Input::get('couleur');
        $campagne->url_icone = Input::get('url_icone');
        $campagne->text_accueil = Input::get('text_accueil');
        $campagne->text_felicitations = Input::get('text_felicitations');
        $campagne->save();

        // redirect
        Session::flash('message', 'Campagne créée avec succès!');
        return Redirect::to('campagnes');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$campagne = Campagne::find($id);
		$campagne = App\Campagne::find($id);
		return view('campagnes.show', ['campagne' => $campagne]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$campagne = Campagne::find($id);
        $campagne->delete();

        Session::flash('message', 'Campagne supprimée!');
        return Redirect::to('campagnes');
	}
}
