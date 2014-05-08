<?php

require "vendor/autoload.php";

FUnit::test("FileMarshal::marshal() testing iterator via current()", function(){

    $input["fieldname"] = array(
        'name'     => "field",
        'type'     => "plain/text",
        'size'     => "1024",
        'tmp_name' => "asdfqwerty",
        'error'    => "0",
    );


    $file = new \FileMarshal\FileMarshal(new FileMarshal\UploadedFileFactory);
    $file->marshal($input["fieldname"]);
    $output = $file->current();

    $expected = array(
        'name'     => "field",
        'type'     => "plain/text",
        'size'     => "1024",
        'tmp_name' => "asdfqwerty",
        'error'    => "0",
    );

    FUnit::equal($expected, [
        "name"     => $output->getName(),
        "type"     => $output->getType(),
        "size"     => $output->getSize(),
        "tmp_name" => $output->getTmpName(),
        "error"    => $output->getError(),
    ]);

});

FUnit::test("FileMarshal::marshal() testing countable", function(){

    $input = array(
        "fieldname2" => array(
            'name'     => array("field1", "field2"),
            'type'     => array("plain/text", "plain/text"),
            'size'     => array("1024", "1024"),
            'tmp_name' => array("asdfqwerty1", "asdfqwerty2"),
            'error'    => array("0", "0"),
        )
    );

    $files = new \FileMarshal\FileMarshal(new FileMarshal\UploadedFileFactory);
    $files->marshal($input["fieldname2"]);

    Funit::equal(2, count($files));

});

FUnit::test("FileMarshal::marshal() testing iterator via foreach", function(){

    $input = array(
        "fieldname2" => array(
            'name'     => array("field1", "field2"),
            'type'     => array("plain/text", "plain/text"),
            'size'     => array("1024", "1024"),
            'tmp_name' => array("asdfqwerty1", "asdfqwerty2"),
            'error'    => array("0", "0"),
        )
    );

    $files = new \FileMarshal\FileMarshal(new FileMarshal\UploadedFileFactory);
    $files->marshal($input["fieldname2"]);

    foreach($files as $file){
    	FUnit::ok(in_array($file->getName(), $input["fieldname2"]["name"]));
    	FUnit::ok(in_array($file->getType(), $input["fieldname2"]["type"]));
    	FUnit::ok(in_array($file->getTmpName(), $input["fieldname2"]["tmp_name"]));
    	FUnit::ok(in_array($file->getError(), $input["fieldname2"]["error"]));
    	FUnit::ok(in_array($file->getSize(), $input["fieldname2"]["size"]));
    }

});

FUnit::test("UploadedFile::hasError()", function(){

    $input["fieldname"] = array(
        'name'     => "",
        'type'     => "",
        'size'     => "",
        'tmp_name' => "",
        'error'    => UPLOAD_ERR_NO_FILE,
    );


    $file = new \FileMarshal\FileMarshal(new FileMarshal\UploadedFileFactory);

    try{
        $file->marshal($input["fieldname"]);
    }catch( \FileMarshal\Exceptions\UploadErrNoFile $e ){
        FUnit::ok(1);
    }catch(\Exception $e){
        Funit::fail("Wrong exception was thrown");
    }

});