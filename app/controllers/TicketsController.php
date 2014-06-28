<?php

class TicketsController extends \BaseController {

	/**
	 * Display a listing of tickets
	 *
	 * @return Response
	 */
	public function index()
	{
		$tickets = array();

		// $produits = Auth::user()->produits()->has('tickets')->get();

		// if (Auth::user()->role->role == "client")
		// 	foreach ($produits as $produit) {
		// 		foreach ($produit->tickets()->where('utilisateur_id', '=', Auth::user()->id)->get() as $ticket) {
		// 			array_push($tickets, $ticket);
		// 		}
		// 	}
		// elseif (Auth::user()->role->role == "partenaire")
		// 	foreach ($produits as $produit) {
		// 		foreach ($produit->tickets as $ticket) {
		// 			array_push($tickets, $ticket);
		// 		}
		// 	}
		// else
		// 	$tickets = Ticket::all();

		$priorite = Input::get('priorite') ? Input::get('priorite') : '%';
		$etat = Input::get('etat') ? Input::get('etat') : '%';
		$query = Input::get('q') ? '%' . Input::get('q') . '%' : '%';

		$tickets = Ticket::where('priorite', 'like', $priorite, 'and')
								->where('etat', 'like', $etat, 'and')
								->where('sujet', 'like', $query)
								->get()->reverse();

		return View::make('tickets.index', compact('tickets'));	
	}

	/**
	 * Show the form for creating a new ticket
	 *
	 * @return Response
	 */
	public function create()
	{
		$produits = Auth::user()->produits()->lists('nomProduit', 'nomProduit');
		$produits[''] = '';
		return View::make('tickets.create', compact('produits'));
	}

	/**
	 * Store a newly created ticket in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Ticket::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$produit = Produit::where('nomProduit', '=', Input::get('produit'))->first();
		
		$ticket = new Ticket;
		$ticket->fill(Input::except('produit', 'message', 'file'));
		$ticket->etat = 'Ouvert';
		$ticket->message = Markdown::render(Input::get('message'));
		$ticket->utilisateur_id = Auth::user()->id;

		$produit->tickets()->save($ticket);

		foreach (Input::get('file') as $file) {
			$document = new Document;
			$document->nomDocument = $file;
			$ticket->documents()->save($document);
		}

		return Redirect::route('tickets.index');
	}

	/**
	 * Display the specified ticket.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$ticket = Ticket::find($id);

		$notifications = Auth::user()->notifications;

		foreach ($notifications as $notification) {
			if ($notification->reponse->ticket == $ticket) {
		 		Auth::user()->notifications()->detach($notification);	
			}
		}
		
		return View::make('tickets.show', compact('ticket'));
	}

	/**
	 * Show the form for editing the specified ticket.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$ticket = Ticket::find($id);

		return View::make('tickets.edit', compact('ticket'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$ticket = Ticket::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Ticket::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$ticket->update($data);

		return Redirect::route('tickets.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Ticket::destroy($id);

		return Redirect::route('tickets.index');
	}

}