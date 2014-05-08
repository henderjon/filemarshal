<?php

namespace FileMarshal;
/**
 * class to present each file in a given $_FILES input as an object
 * @package FileMarshal
 */
class UploadedFile implements Interfaces\UploadedFileInterface{

	/**
	 * mixin our error checker
	 */
	use Traits\UploadedFileErrCheckerTrait;

	/**
	 * hold onto our original data
	 */
	protected $file;

	/**
	 * validate and set our file data array
	 * @param array $file The data provided by PHP
	 * @return
	 */
	function __construct(array $file){
		if(!array_key_exists("error", $file)){
			throw new Exceptions\UploadErrUnknown;
		}
		if(!$this->hasError($file["error"])){
			$this->file = $file;
		}
	}

	/**
	 * method to move an uploaded file from the tmp dir to a more permanent home
	 * @param string $dir The destination directory
	 * @param string $name An optional name to call the file
	 * @return bool
	 */
	function saveAs($dir, $name = null){
		if($this->getError() == UPLOAD_ERR_OK){
			if(!is_dir($dir)){
				throw new Exceptions\UploadErrNoDestDir;
			}

			$destination = sprintf("%s/%s", rtimr($dir, "/ "), ($name ?: $this->getName()));
			return move_uploaded_file($this->getTmpName(), $destination);
		}
		return false;
	}

	/**
	 * method to get the provided name of the uploaded file
	 */
	function getName(){
		return $this->file["name"];
	}

	/**
	 * method to get the MIME type provided by the POST request
	 */
	function getType(){
		return $this->file["type"];
	}

	/**
	 * method to get the file size of the uploaded file
	 */
	function getSize(){
		return $this->file["size"];
	}

	/**
	 * method to get the tmp_name of the file as given by PHP
	 */
	function getTmpName(){
		return $this->file["tmp_name"];
	}

	/**
	 * method to get the error code of the uploaded file
	 */
	function getError(){
		return $this->file["error"];
	}
}