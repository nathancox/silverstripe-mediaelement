<?php

class VideoPage extends Page {
	static $video_width = 300;
	static $video_height = 200;
	static $video_types;
	
	static $has_many = array(
		'Videos' => 'MediaElementVideo'
	);
	
	function getCMSFields() {
		$fields = parent::getCMSFields();
		
		/*
			This is a hack because for some reason the DOM wasn't loading this by itself
			@TODO: figure out why
		*/
		Requirements::javascript(THIRDPARTY_DIR.'/jquery-livequery/jquery.livequery.js');
		
		$videoManager = new DataobjectManager(
			$this, // Controller
			'Videos', // Source name
			'MediaElementVideo', // Source class
			array(
				'Title' => 'Title', 
				'FormatExtensionsString' => 'Formats'
			), // Headings 
			'getCMSFields_forPopup' // Detail fields (function name or FieldSet object)
			// Filter clause
			// Sort clause
			// Join clause
		);
		$videoManager->setPluralTitle('Videos');
		$videoManager->setAddTitle('Video');
	//	$videoManager->setWideMode(true);
		$videoManager->setPopupWidth(850);
		$fields->addFieldToTab('Root.Content.Videos', $videoManager);
		
		return $fields;
	}
	
	static function set_video_width($width) {
		self::$video_width = $width;
	}
	static function set_video_height($height) {
		self::$video_height = $height;
	}
	
	function getWidth($withPx = false) {
		return VideoPage::$video_width . ($withPx ? 'px' : '');
	}
	
	function getHeight($withPx = false) {
		return VideoPage::$video_height . ($withPx ? 'px' : '');
	}
	
	
}
class VideoPage_Controller extends Page_Controller {
	function init() {
		parent::init();
		
	//	Requirements::customScript
	}
}