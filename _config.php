<?php
/*
NOTE:

You have to add 	webm|ogv|OGV|WEBM| to FilesMatch in assets/.htaccess 
*/

// let us upload webm and ogv files
File::$allowed_extensions = array_merge(File::$allowed_extensions, array('webm', 'ogv'));

// set video/poster dimensions
VideoPage::set_video_width(300);
VideoPage::set_video_height(200);


VideoPage::$video_types = array(
	'ogv' => 'video/ogg'
);

