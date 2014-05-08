<?php

namespace FileMarshal\Exceptions;
/**
 * exception for an upload error
 * @package FileMarshal
 */
class UploadErrUnknown extends \Exception {

	/**
	 * the exception coce
	 */
	protected $code = 999;

	/**
	 * the exception message
	 */
	protected $message = "An unknown error has occured";

}