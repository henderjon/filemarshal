<?php

namespace FileMarshal\Exceptions;
/**
 * exception for an upload error
 * @package FileMarshal
 */
class UploadErrNoFile extends \Exception {

	/**
	 * the exception coce
	 */
	protected $code = UPLOAD_ERR_NO_FILE;

	/**
	 * the exception message
	 */
	protected $message = "UPLOAD_ERR_NO_FILE: No file was uploaded";

}