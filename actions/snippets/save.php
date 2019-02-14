<?php

$snippets = get_input('snippets', [], false);

foreach ($snippets as $snippet => $html) {
	\hypeJunction\Snippets\Snippets::instance()->save($snippet, $html);
}

elgg_flush_caches();

return elgg_ok_response('', elgg_echo('admin:snippets:save:success'));