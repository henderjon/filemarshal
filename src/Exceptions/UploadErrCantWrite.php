<?php

namespace FileMarshal\Exceptions;
/**
 * exception for an upload error
 * @package FileMarshal
 */
class UploadErrCantWrite extends \Exception {

	/**
	 * the exception coce
	 */
	protected $code = UPLOAD_ERR_CANT_WRITE;

	/**
	 * the exception message
	 */
	protected $message = "UPLOAD_ERR_CANT_WRITE: Failed to write file to disk";

}