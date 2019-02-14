<?php

$path = elgg_get_config('dataroot') . 'snippets/';

if (!is_dir($path)) {
	mkdir($path, '0755');
}