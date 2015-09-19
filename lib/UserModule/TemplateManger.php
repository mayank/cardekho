<?php

class TemplateManager
{
	public function getAllTemplates()
	{
		return DaoFactory::getInstance('TemplateDao')->getAllTemplates();
	}
	
	public function createTemplate( $name, $text )
	{
		return DaoFactory::getInstance('TemplateDao')->createTemplate( $name, $text );
	}
}
