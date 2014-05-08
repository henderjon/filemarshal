<?php

namespace FileMarshal;
/**
 * class to allow our FileMarshal to create UploadedFile objects
 * @package FileMarshal
 */
class UploadedFileFactory {

	/**
	 * method to make new UploadedFile objects
	 * @param array $file The array of file data as provided by PHP
	 * @return FileMarshal\UploadedFile
	 */
	function make(array $file){
		return new UploadedFile($file);
	}

}