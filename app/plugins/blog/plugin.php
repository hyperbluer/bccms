<?php
function plugin_blog($lang, $site_id)
{

	return 'Hello, this is blog! Language:'.$lang.', Site id:'.$site_id;
}

BC_Hook::instance()->addAction('app_plugin_blog', 'plugin_blog');