<?php
class CNavigation {
	public static function GenerateMenu($menu, $class) {
		if(isset($menu['callback'])) {
		  $items = call_user_func($menu['callback'], $menu['items']);
		}
		$html = "<div id='$class'><ul>";
		foreach($items as $item) {
		  $html .= "<li><a href='{$item['url']}' class='{$item['class']}'>{$item['text']}</a></li>";
		}
		$html .= "</ul></div>";
		return $html;
	  }

	public static function modifyNavbar($items) {
	  $ref = isset($_GET['p']) && isset($items[$_GET['p']]) ? $_GET['p'] : null;
	  if($ref) {
		$items[$ref]['class'] .= 'selected'; 
	  }
	  return $items;
	}
};