<?php
/**
 * SQLayer LIBRARY INCLUDES
 * @package   sqlayer
 * @version   0.0.1
 * @author    Roderic Linguri
 * @copyright Copyright (c) 2015, Digices
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 */

define('SQLAYER_ROOT',__DIR__);

$fsi = new DirectoryIterator(SQLAYER_ROOT.'/lib');

foreach ($fsi as $fil) {

    if(substr($fil->getFilename(),0,1)!='.') {

        require_once(SQLAYER_ROOT.'/lib/'.$fil);

    }

}

