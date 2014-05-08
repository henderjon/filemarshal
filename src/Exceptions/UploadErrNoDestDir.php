<?php

namespace FileMarshal\Exceptions;
/**
 * exception for an upload error
 * @package FileMarshal
 */
class UploadErrNoDestDir extends \Exception {

	/**
	 * the exception coce
	 */
	protected $code = 999;

	/**
	 * the exception message
	 */
	protected $message = "Missing a destination folder";

}