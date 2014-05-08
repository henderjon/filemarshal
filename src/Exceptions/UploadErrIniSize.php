<?php

namespace FileMarshal\Exceptions;
/**
 * exception for an upload error
 * @package FileMarshal
 */
class UploadErrIniSize extends \Exception {

	/**
	 * the exception coce
	 */
	protected $code = UPLOAD_ERR_INI_SIZE;

	/**
	 * the exception message
	 */
	protected $message = "UPLOAD_ERR_INI_SIZE: The uploaded file exceeds the upload_max_filesize directive in php.ini";

}