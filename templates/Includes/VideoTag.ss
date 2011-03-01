<video width="$VideoPage.Width" height="$VideoPage.Height" id="player$ID" <% if PosterID != 0 %>poster='$Poster.Link'<% end_if %> controls="controls" preload="none">

	<% control Formats %>
	<source type="$Type" src="$Link" />
	<% end_control %>
	
	
	<!-- Fallback flash player for no-HTML5 browsers with JavaScript turned off -->
	<object width="$VideoPage.Width" height="$VideoPage.Height" type="application/x-shockwave-flash" data="mediaelement/thirdparty/flashmediaelement.swf"> 		
		<param name="movie" value="mediaelement/thirdparty/flashmediaelement.swf" /> 
		<param name="flashvars" value="controls=true<% if PosterID != 0 %>&poster=$Poster.Link<% end_if %>&file=$Formats.First.Link" /> 		
		
		<!-- Image fall back for non-HTML5 browser with JavaScript turned off and no Flash player installed -->
		<% if PosterID != 0 %>
		<img src="$Poster.Link" width="$VideoPage.Width" height="$VideoPage.Height" alt="$Title" title="No video playback capabilities" />
		<% end_if %>
	</object>
</video>
<% require javascript(mediaelement/thirdparty/mediaelement-and-player.min.js) %>
<% require css(mediaelement/thirdparty/mediaelementplayer.css) %>