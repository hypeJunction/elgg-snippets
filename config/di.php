<?php

return [
	'snippets' => \DI\create(\hypeJunction\Snippets\Snippets::class)
		->constructor(\DI\get('views')),
];