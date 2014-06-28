<?php

class DocumentsController extends \BaseController {

	public function upload() {
		$file = Input::file('file');
		$destination = 'public/uploads/documents/';
		$fileName = str_random(40) . '.' . $file->getClientOriginalExtension();
		$file->move($destination, $fileName);
		return $fileName;
	}
}