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
		$priorite = Input::has('priorite') ? Input::get('priorite') : '%';
		$etat = Input::has('etat') ? Input::get('etat') : '%';
		$query = Input::has('q') ? '%' . Input::get('q') . '%' : '%';

		$tickets = Ticket::where('priorite', 'like', $priorite, 'and')
								->where('etat', 'like', $etat, 'and')
								->where('sujet', 'like', $query)
								->orderBy('created_at', 'desc')
								->get();

		return View::make('tickets.index', compact('tickets'));	
	}

	/**
	 * Show the form for creating a new ticket
	 *
	 * @return Response
	 */
	public function create()
	{
		$produits = Produit::lists('nomProduit', 'nomProduit');
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

		if (Input::has('file')) {
			$fileName = Input::get('fileName');
			foreach (Input::get('file') as $i => $file) {
				$document = new Document;
				$document->nomDocument = $file;
				$document->nomDocumentOrigin = $fileName[$i];
				$ticket->documents()->save($document);
			}
		}
		return Redirect::route('tickets.show', $ticket->id);
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
			if ($notification->reponse) {
				if ($notification->reponse->ticket == $ticket) {
			 		Auth::user()->notifications()->detach($notification);	
				}
			}
			else {
				if ($notification->ticket == $ticket) {
					$notification->delete();
				}
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

	public function close($id) {
		$ticket = Ticket::findOrFail($id);

		$ticket->etat = "Résolu";
		$ticket->save();

		Response::json('success');
	}

	public function reopen($id) {
		$ticket = Ticket::findOrFail($id);

		$ticket->etat = "Ouvert";
		$ticket->save();

		Response::json('success');
	}

	public function sendToPartner($id) {
		$ticket = Ticket::findOrFail($id);

		$ticket->etat = "Soumis au partenaire";
		$ticket->save();

		$notification = new Notification;
		$notification->message = "a ouvert un ticket sur un de vos produits";
		$notification->ticket_id = $ticket->id;

		$ticket->produit->utilisateur->notifications()->save($notification);

		Response::json('success');
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