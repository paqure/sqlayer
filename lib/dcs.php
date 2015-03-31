<?php
/**
 * SQLayer DATABASE CONFIGURATION STORAGE
 * @package   sqlayer
 * @version   0.0.1
 * @author    Roderic Linguri
 * @copyright Copyright (c) 2015, Digices
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 */

namespace sqlayer;


class DCS extends Dbs
{

    private static $dbs;

    /**
     * Open New Database Connection
     */
    public function __construct()
    {

        $dsn = 'sqlite:'.SQLAYER_ROOT.'/var/dcs.db';

        $this->pch = new \PDO($dsn);

    }

    /**
     * Database Singleton Getter
     * @return DCS
     */
    public static function dbs() {

        // only open new connection if it does not exist
        if (!self::$dbs) {

            self::$dbs = new self();

        }

        return self::$dbs;

    } // ./dbs()

    /**
     * Prevent duplication
     */
    public function __clone() { }

} // ./DCS