<?php

namespace FileMarshal\Exceptions;
/**
 * exception for an upload error
 * @package FileMarshal
 */
class UploadErrNoTmpDir extends \Exception {

	/**
	 * the exception coce
	 */
	protected $code = UPLOAD_ERR_NO_TMP_DIR;

	/**
	 * the exception message
	 */
	protected $message = "UPLOAD_ERR_NO_TMP_DIR: Missing a temporary folder";

}