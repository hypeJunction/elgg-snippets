<?php

namespace hypeJunction\Snippets;

use Elgg\PluginBootstrap;

class Bootstrap extends PluginBootstrap {

	/**
	 * {@inheritdoc}
	 */
	public function boot() {
		// Using views.php doesn't seem to achieve the desired result
		_elgg_services()->views->mergeViewsSpec([
			'default' => [
				'snippets/' => elgg_get_config('dataroot') . 'snippets/',
			]
		]);
	}

	/**
	 * {@inheritdoc}
	 */
	public function init() {
		elgg_register_action('snippets/save', $this->plugin->getPath() . 'actions/snippets/save.php');

		elgg_register_plugin_hook_handler('register', 'menu:page', [Menus::class, 'setupPageMenu']);
	}

	/**
	 * {@inheritdoc}
	 */
	public function ready() {

	}

	/**
	 * {@inheritdoc}
	 */
	public function shutdown() {

	}

	/**
	 * {@inheritdoc}
	 */
	public function upgrade() {

	}

}