<?php

namespace hypeJunction\Snippets;

class Menus {

	public static function setupPageMenu($hook, $type, $return, $params) {
		$return[] = \ElggMenuItem::factory([
			'name' => 'snippets',
			'parent_name' => 'appearance',
			'section' => 'configure',
			'text' => elgg_echo('admin:snippets'),
			'href' => 'admin/snippets',
			'context' => 'admin',
		]);

		return $return;
	}
}