<div class="typography">
	<% if Menu(2) %>
		<% include SideBar %>
		<div id="Content">
	<% end_if %>

	<% if Level(2) %>
	  	<% include BreadCrumbs %>
	<% end_if %>
	
		<h2>$Title</h2>
		
		$Content
	
		<% control Videos %>
		<div class='video'>
			$VideoTag
		</div>
		<% end_control %>
	
	<% if Menu(2) %>
		</div>
	<% end_if %>
</div>