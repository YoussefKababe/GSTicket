<?php

class ProduitsController extends \BaseController {

	/**
	 * Display a listing of produits
	 *
	 * @return Response
	 */
	public function index()
	{
		$produits = Produit::where(function($qry) {
									$query = Input::has('q') ? '%' . Input::get('q') . '%' : '%';
									$qry->where('nomProduit', 'like', $query)
											->orWhere('description', 'like', $query);
								});

		$produits = $produits->get();

		return View::make('produits.index', compact('produits'));
	}

	/**
	 * Show the form for creating a new produit
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('produits.create');
	}

	/**
	 * Store a newly created produit in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Produit::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Produit::create($data);

		return Redirect::route('produits.index');
	}

	/**
	 * Display the specified produit.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$produit = Produit::findOrFail($id);

		return View::make('produits.show', compact('produit'));
	}

	/**
	 * Show the form for editing the specified produit.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$produit = Produit::find($id);

		return View::make('produits.edit', compact('produit'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$produit = Produit::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Produit::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$produit->update($data);

		return Redirect::route('produits.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Produit::destroy($id);

		return Redirect::route('produits.index');
	}

}