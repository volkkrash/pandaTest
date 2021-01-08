<?php

class View {
	
	function generate($content_view, $template_view, $data = []) {
		
		include 'app/views/'.$template_view;
	}
}