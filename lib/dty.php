<?php
/**
 * SQLayer DATATYPE CLASS-SET
 * @package   sqlayer
 * @version   0.0.1
 * @author    Roderic Linguri
 * @copyright Copyright (c) 2015, Digices
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 */

namespace sqlayer;

/* DATATYPE OBJECT */
class DtyObj extends Obj
{

    /* @property $oid int (sqlite primary key) */
    public $oid;

    /* @property $nam string (table name) */
    public $nam;

    /* @property $sdt string (sqlite data type) */
    public $sdt;

    /* @property $dty string (function) */
    public $fnc;

} // ./DtyObj

/* DATATYPE MODEL */
class DtyMdl extends Mdl
{

    /**
     * new DtyMdl
     */
    public function __construct()
    {

        $this->dbs = DCS::dbs();

        $this->tbl = 'dty';

        $this->col = ['oid' => 'INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL','nam' => 'TEXT','sdt' => 'TEXT','fnc' => 'TEXT'];

    } // ./constructor

} // ./DtyMdl