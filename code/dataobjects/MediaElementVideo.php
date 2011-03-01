<?php

class MediaElementVideo extends DataObject {
	
	static $db = array(
		'Title' => 'Varchar(80)',
		'Blurb' => 'HTMLText'
	);
	
	static $has_one = array(
		'VideoPage' => 'VideoPage',
		'Poster' => 'Image'
	);
	
	static $has_many = array(
		'VideoFormats' => 'MediaElementVideoFormat'
	);
	
	function getCMSFields_forPopup() {
		$fields = new FieldSet();
		
		$tabset = new HorizontalTabSet('Root');
		$tabset->push(new Tab('Main'));
		$tabset->push(new Tab('Formats'));
		$fields->push($tabset);
		
		$fields->addFieldToTab('Root.Main', new TextField('Title', 'Video Title'));
		
		
		$config = HtmlEditorConfig::get_active();
		$contentCSS = $config->getOption('content_css');
		// hack!
		$contentCSS = '/'.str_replace(', ', ', /', $contentCSS);
		
		$fields->addFieldToTab('Root.Main', $blurbField = new SimpleTinyMCEField('Blurb'));
		$blurbField->setContentCSS($contentCSS);
		$blurbField->setExtraOptions("body_class : 'typography'");
		
		$fields->addFieldToTab('Root.Main', new ImageField('Poster', 'Poster Image'));
		
		
		$videoManager = new FileDataobjectManager(
			$this, // Controller
			'VideoFormats', // Source name
			'MediaElementVideoFormat', // Source class
			'Attachment',
			array(
				'Type' => 'Type',
				'LinkifiedLink' => 'Link'
			), // Headings 
			'getCMSFields_forPopup' // Detail fields (function name or FieldSet object)
			// Filter clause
			// Sort clause
			// Join clause
		);
		$videoManager->setPluralTitle('Formats');
		$videoManager->setAddTitle('Format');
	//	$videoManager->setWideMode(true);
		$videoManager->setPopupWidth(600);
		$videoManager->setDefaultView('list');
		$fields->addFieldToTab('Root.Formats', $videoManager);
//		$fields->push($videoManager);
		
		return $fields;
	}
	
	function Formats() {
		$formats = $this->VideoFormats();
		$output = new DataObjectSet();
		
		foreach ($formats as $format) {
			if ($format->Extension() == 'mp4') {
				$output->unshift($format);
			} else {
				$output->push($format);
			}
		}
		
		return $output;
	}
	
	function FormatExtensions() {
		$formats = $this->Formats();
		$output = array();

		foreach ($formats as $format) {
			array_push($output, $format->Extension());
		}
		
		return $output;
	}
	
	function FormatExtensionsString() {
		$extensions = $this->FormatExtensions();
		
		if (count($extensions) == 0) {
			return '(no videos uploaded)';
		} else {
			return implode(', ', $extensions);
		}
	}
	
}