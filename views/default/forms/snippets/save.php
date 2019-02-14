<?php

$snippets = \hypeJunction\Snippets\Snippets::instance()->all();

foreach ($snippets as $snippet => $view) {
	$label = elgg_language_key_exists("snippet:$snippet") ? elgg_echo("snippet:$snippet") : $snippet;
	$help = elgg_language_key_exists("snippet:$snippet:help") ? elgg_echo("snippet:$snippet:help") : null;

	echo elgg_view_field([
		'#type' => elgg_is_active_plugin('elgg-codemirror') ? 'codemirror' : 'plaintext',
		'#label' => $label,
		'name' => "snippets[$snippet]",
		'value' => elgg_view($view),
	]);
}

$footer = elgg_view_field([
	'#type' => 'submit',
	'value' => elgg_echo('save'),
]);

elgg_set_form_footer($footer);