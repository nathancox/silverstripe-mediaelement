SilverStripe MediaElement.js video page
===================================

Adds a VideoPage type that supports uploading videos in multiple formats and displaying them using MediaElement.js (http://mediaelementjs.com/)

**NOTE** this is experimental/in progress/for my own testing purposes only and should not be considered complete or useful at this point.


Maintainer Contacts
-------------------
* Nathan Cox (<nathan@flyingmonkey.co.nz>)

Requirements
------------
* SilverStripe 2.4+
* DataObjectManager module
* DataObjectManager tabs module
* Uploadify module

Documentation
-------------
[GitHub Wiki](https://github.com/nathancox/silverstripe-mediaelement)

Installation Instructions
-------------------------

1. Place the files in a directory called mediaelement in the root of your SilverStripe installation
2. Visit yoursite.com/dev/build to rebuild the database
3. Add 	webm|ogv|OGV|WEBM| (or any other formats you want) to FilesMatch in assets/.htaccess 

Usage Overview
--------------




Known Issues
------------
[Issue Tracker](https://github.com/nathancox/silverstripe-mediaelement/issues)