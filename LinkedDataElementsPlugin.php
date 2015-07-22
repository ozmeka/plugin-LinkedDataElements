<?php

//  use our classes instead of the core ones where needed.
//  Note that this is likely to tie the plugin to a specific version
//  of Omeka core, requiring manual updating.
require_once('models/ElementText.php');
require_once('models/Mixin/ElementText.php');
require_once('views/helpers/ElementInput.php');
require_once('views/helpers/ElementForm.php');
require_once('views/helpers/Metadata.php');
require_once('libraries/Omeka/Record/Api/AbstractRecordAdapter.php');

class LinkedDataElementsPlugin extends Omeka_Plugin_AbstractPlugin
{
    protected $_hooks = array('install', 'uninstall');

//    protected $_filters = array('strainUriField' => array('ElementForm', 'Item', 'Dublin Core', 'Subject'));

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