<?php
/*
http://us1.php.net/manual/en/features.file-upload.errors.php
http://us1.php.net/manual/en/features.file-upload.post-method.php
*/
namespace FileMarshal\Traits;

use \FileMarshal\Exceptions;
/**
 * trait to provide an upload error check mixin
 * @package FileMarshal
 */
trait UploadedFileErrCheckerTrait {

	/**
	 * method to check the provided error code against predefined upload error codes
	 *
	 * @param int $err The error code
	 * @return bool
	 * @throws FileMarshal\Exceptions\*
	 * @link http://us1.php.net/manual/en/features.file-upload.errors.php
	 */
	function hasError($err){
		switch($err){
			case UPLOAD_ERR_OK :
				return false;
				break;
			case UPLOAD_ERR_INI_SIZE :
				throw new Exceptions\UploadErrIniSize;
				break;
			case UPLOAD_ERR_FORM_SIZE :
				throw new Exceptions\UploadErrFormSize;
				break;
			case UPLOAD_ERR_PARTIAL :
				throw new Exceptions\UploadErrPartial;
				break;
			case UPLOAD_ERR_NO_FILE :
				throw new Exceptions\UploadErrNoFile;
				break;
			case UPLOAD_ERR_NO_TMP_DIR :
				throw new Exceptions\UploadErrNoTmpDir;
				break;
			case UPLOAD_ERR_CANT_WRITE :
				throw new Exceptions\UploadErrCantWrite;
				break;
			case UPLOAD_ERR_EXTENSION :
				throw new Exceptions\UploadErrExtension;
				break;
			default :
				throw new Exceptions\UploadErrUnknown;
				break;
		}
	}

}