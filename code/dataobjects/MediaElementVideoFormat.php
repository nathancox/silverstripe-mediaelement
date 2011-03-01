<?php

class MediaElementVideoFormat extends DataObject {
	


	static $has_one = array(
		'MediaElementVideo' => 'MediaElementVideo',
		'Attachment' => 'File'
	);
	
	function getCMSFields_forPopup() {
		$fields = new FieldSet();
		
		$fields->push(new FileUploadField('Attachment'));
		
		return $fields;
	}
	
	
	function Filename() {
		return $this->Attachment()->getFilename();
	}
	
	function Extension() {
		return $this->Attachment()->getExtension();
	}
	
	function Type() {
		$extension = $this->Extension();
		$types = VideoPage::$video_types;
		
		if (isset($types[$extension])) {
			return $types[$extension];
		} else {
			return 'video/'.$extension;
		}
		
		
	}
	
	function Link() {
		return $this->Attachment()->Link();
	}
	
	function LinkifiedLink() {
		return '<a href="'.$this->Attachment()->Link().'">'.$this->Attachment()->Link().'</a>';
	}
	
}