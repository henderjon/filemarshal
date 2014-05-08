<?php

namespace FileMarshal\Exceptions;
/**
 * exception for an upload error
 * @package FileMarshal
 */
class UploadErrFormSize extends \Exception {

	/**
	 * the exception coce
	 */
	protected $code = UPLOAD_ERR_FORM_SIZE;

	/**
	 * the exception message
	 */
	protected $message = "UPLOAD_ERR_FORM_SIZE: The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form";

}