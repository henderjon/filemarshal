<?php

namespace FileMarshal;
/**
 * class to marshal a given $_FILES input into an OO interface. allows iteration
 * and counting to support mulitple files per input
 * @package FileMarshal
 */
class FileMarshal implements \Iterator, \Countable {

	/**
	 * hold the objects that represent the current $_FILES input files
	 */
	protected $files = array();

	/**
	 * hold our UploadedFile factory
	 */
	protected $factory;

	/**
	 * iteration needs an internal position pointer
	 */
	protected $position = 0;

	/**
	 * method to set our factory
	 * @param UploadedFileFactory $factory The Factory
	 * @return
	 */
	function __construct(UploadedFileFactory $factory){
		$this->factory = $factory;
	}

	/**
	 * method to set/parse/marshal the $_FILES input that we want to interact with
	 * @param array $array An array of file info as provided by PHP
	 * @return
	 */
	function marshal(array $array){
		if(!$array) return;

		$files = array();

		foreach($array as $label => $value){
			// force single fields to be multiple to unify processing
			if(!is_array($value)){
				$value = (array)$value;
			}

			foreach($value as $num => $val){
				$files[$num][$label] = $val;
			}
		}

		foreach($files as $file){
			$this->files[] = $this->factory->make($file);
		}
	}

	/**
	 * method to save all the marshaled files to a directory
	 * @param string $dir The directory to which the files will be saved
	 * @return
	 */
	function saveAll($dir){
		foreach($this->files as $file){
			$file->save($dir);
		}
	}

	/**
	 * method to save all the marshaled files using the provided callback
	 *
	 * @todo maybe pass the full marshaler instead of looping over each file, allowing the dev to loop in the callback
	 * @param callable $callback The callback to use
	 * @return
	 */
	function saveAllAs(callable $callback){
		foreach($this->files as $file){
			$file->saveAs($callback);
		}
	}

	/**
	 * method to implement the Countable interface
	 * @return int
	 */
	function count(){
		return count($this->files);
	}

	/**
	 * method to get the current object in our array
	 * @return FileMarshal\UploadedFile
	 */
	function current(){
		return $this->files[$this->position];
	}

	/**
	 * method to get the current position
	 * @return int
	 */
	function key(){
		return $this->position;
	}

	/**
	 * method to advance the internal position
	 * @return
	 */
	function next(){
		$this->position += 1;
	}

	/**
	 * method to resset the internal position
	 * @return
	 */
	function rewind(){
		$this->position = 0;
	}

	/**
	 * method to see if the current position isset
	 * @return bool
	 */
	function valid(){
		return isset($this->files[$this->position]);
	}

}