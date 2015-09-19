<?php

class CSVUploader
{
	public function saveCSVFile( $filename, $tmpfilepath )
	{
		$filedata = file_get_contents($tmpfilepath);
		$fileId = md5( time() );
		move_uploaded_file( $tmpfilepath, "/tmp/$fileId" );
		DaoFactory::getInstance('CSVDao')->saveCSV( $filename, $fileId );
		return $fileId;	
	}
	
	public function getCSVList()
	{
		return DaoFactory::getInstance('CSVDao')->getCSVList();
	}
	
	public function readDataById( $fileId )
	{
		$fileData = trim(file_get_contents("/tmp/$fileId"));
		$data =array();
		$linesData = explode("\n", $fileData);
		
		foreach($linesData as $line){
			$data[] = explode(",", $line);
		}
		return $data;
	}
}