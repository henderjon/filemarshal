<?php

namespace FileMarshal\Interfaces;
/**
 * interface for interacting with an uploaded file's information OOP style
 * @package FileMarshal
 */
interface UploadedFileInterface {

	/**
	 * method to get the provided name of the uploaded file
	 */
	public function getName();

	/**
	 * method to get the MIME type provided by the POST request
	 */
	public function getType();

	/**
	 * method to get the file size of the uploaded file
	 */
	public function getSize();

	/**
	 * method to get the tmp_name of the file as given by PHP
	 */
	public function getTmpName();

	/**
	 * method to get the error code of the uploaded file
	 */
	public function getError();
}