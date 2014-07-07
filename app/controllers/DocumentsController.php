<?php

class DocumentsController extends \BaseController {

	public function upload() {
		$file = Input::file('file');
		$destination = public_path() . '/uploads/documents/';
		$fileName = str_random(40) . '.' . $file->getClientOriginalExtension();
		$file->move($destination, $fileName);
		$response['originalName'] = $file->getClientOriginalName();
		$response['newName'] = $fileName;
		return $response;
	}

	public function uploadTicketImage() {
		$file = Input::file('file');
		$destination = public_path() . '/uploads/pictures/';
		$fileName = str_random(40) . '.' . $file->getClientOriginalExtension();
		$file->move($destination, $fileName);
		$response = url('/uploads/pictures/' . $fileName);
		return $response;
	}
}