<?php

namespace FileMarshal\Exceptions;
/**
 * exception for an upload error
 * @package FileMarshal
 */
class UploadErrPartial extends \Exception {

	/**
	 * the exception coce
	 */
	protected $code = UPLOAD_ERR_PARTIAL;

	/**
	 * the exception message
	 */
	protected $message = "UPLOAD_ERR_PARTIAL: The uploaded file was only partially uploaded";

}