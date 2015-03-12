<?php

//  use our classes instead of the core ones where needed
require_once('models/ElementText.php');
require_once('models/Mixin/ElementText.php');
require_once('views/helpers/ElementInput.php');
require_once('views/helpers/ElementForm.php');

class LinkedDataElementsPlugin extends Omeka_Plugin_AbstractPlugin
{
    protected $_hooks = array('install', 'uninstall');

    public function hookInstall()
    {
        $db = get_db();
        $sql = "ALTER TABLE {$this->_db->ElementText} ADD uri MEDIUMTEXT COLLATE utf8_unicode_ci AFTER text";
        $db->query($sql);
    }

    public function hookUninstall()
    {
        $db = get_db();
        $sql = "ALTER TABLE {$this->_db->ElementText} DROP COLUMN uri";
        $db->query($sql);
    }
}