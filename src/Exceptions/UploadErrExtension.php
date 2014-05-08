<?php

namespace FileMarshal\Exceptions;
/**
 * exception for an upload error
 * @package FileMarshal
 */
class UploadErrExtension extends \Exception {

	/**
	 * the exception coce
	 */
	protected $code = UPLOAD_ERR_EXTENSION;

	/**
	 * the exception message
	 */
	protected $message = "UPLOAD_ERR_EXTENSION: A PHP extension stopped the file upload";

}