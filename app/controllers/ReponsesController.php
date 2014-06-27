<?php

class ReponsesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /reponses
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /reponses/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /reponses
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Reponse::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$ticket = Ticket::findOrFail(Input::get('id'));

		$reponse = new Reponse;
		$reponse->message = Input::get('message');
		$reponse->utilisateur_id = Auth::user()->id;

		$ticket->reponses()->save($reponse);

		if ($reponse->utilisateur != $ticket->utilisateur) {
			$notification = new Notification;
			$notification->message = "a répondu à votre discussion";
			$notification->reponse_id = $reponse->id;

			$ticket->utilisateur->notifications()->save($notification);
		}

		$notification = new Notification;

		if ($reponse->utilisateur == $ticket->utilisateur)
			$notification->message = "a répondu à sa discussion";
		else
			$notification->message = "a répondu à une discussion dont vous etes abonné";
		$notification->reponse_id = $reponse->id;
		$notification->save();

		foreach ($ticket->reponses()->distinct()->get(['utilisateur_id']) as $otherReponse) {
			if (($otherReponse->utilisateur != $reponse->utilisateur) && ($otherReponse->utilisateur != $ticket->utilisateur)) {
				$otherReponse->utilisateur->notifications()->attach($notification);
			}
		}

		return Redirect::back()->withMessage('Réponse ajoutée avec succes');
	}

	/**
	 * Display the specified resource.
	 * GET /reponses/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /reponses/{id}/edit
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
	 * PUT /reponses/{id}
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
	 * DELETE /reponses/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}