<?php

namespace hypeJunction\Snippets;

use Elgg\Di\ServiceFacade;
use Elgg\ViewsService;

class Snippets {

	use ServiceFacade;

	protected $views;

	/**
	 * Returns registered service name
	 * @return string
	 */
	public static function name() {
		return 'snippets';
	}

	public function __construct(ViewsService $views) {
		$this->views = $views;
	}

	/**
	 * Returns a list of all snippets
	 * @return string[]
	 */
	public function all(): array {
		$snippets = [];
		$views = $this->views->listViews();

		$matches = [];
		foreach ($views as $view) {
			if (preg_match('/^snippets\/(.*)\.twig$/i', $view, $matches)) {
				$snippets[$matches[1]] = $view;
			}
		}

		return $snippets;
	}

	/**
	 *
	 * @param $snippet
	 * @param $html
	 */
	public function save($snippet, $html) {
		$view = "$snippet.twig";
		$path = elgg_get_config('dataroot') . 'snippets/';

		$snippetpath = trim(pathinfo($snippet, PATHINFO_DIRNAME), ' .');
		
		if (!is_dir($path . $snippetpath)) {
			mkdir($path . $snippetpath, 0755, true);
		}

		$filename = "{$path}{$view}";

		$fh = fopen($filename, 'w');
		fwrite($fh, $html);
		fclose($fh);
	}
}