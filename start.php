<?php

require_once __DIR__ . '/autoloader.php';

/**
 * Render a snippet
 *
 * @param string $snippet Snippet name
 * @param array  $vars    Variables
 *
 * @return string
 */
function elgg_snippet($snippet, array $vars = []) {
	$template = "snippets/$snippet";

	return elgg_twig($template, $vars);
}

\hypeJunction\Snippets\Bootstrap::bind('elgg-snippets');