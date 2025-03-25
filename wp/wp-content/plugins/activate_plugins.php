<?
require_once ABSPATH . 'wp-admin/includes/plugin.php'; 

// setting permalink 
function setting_permalink() {
    global $wp_rewrite;
    $wp_rewrite->set_permalink_structure('/%postname%/');
    $wp_rewrite->flush_rules();
}
add_action( 'after_setup_theme', 'setting_permalink' );

// activate plugins
$activate_plugins = array(
    "ninjafirewall/ninjafirewall.php",
    "login-lockdown/loginlockdown.php",
    "two-factor/two-factor.php",
    "disable-xml-rpc-api/disable-xml-rpc-api.php",
    "wp-super-cache/wp-cache.php"
); 
for($i = 0; $i < count($activate_plugins); $i++){
    $pluginfile = $activate_plugins[$i];
    activate_plugin($pluginfile);
}

// unlink file
define('ACTIVEPF', WP_PLUGIN_DIR.'/activate_plugins.php');
if (file_exists(ACTIVEPF)) { unlink(ACTIVEPF); }
?>
