<?php
/**
 * SQLayer COLUMN CLASS-SET
 * @package   sqlayer
 * @version   0.0.1
 * @author    Roderic Linguri
 * @copyright Copyright (c) 2015, Digices
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 */

namespace sqlayer;

/* COLUMN OBJECT */
class ColObj extends Obj
{

    /* @property $oid int (sqlite primary key) */
    public $oid;

    /* @property $nam string (table name) */
    public $nam;

    /* @property $exp string (expanded name) */
    public $exp;

    /* @property $dty int (datatype) */
    public $dty;

    /* @property $len int (length) */
    public $len;

} // ./ColObj

/* COLUMN MODEL */
class ColMdl extends Mdl
{

    /**
     * new ColMdl
     */
    public function __construct()
    {

        $this->dbs = DCS::dbs();

        $this->tbl = 'col';

        $this->col = ['oid' => 'INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL','nam' => 'TEXT','exp' => 'TEXT','dty' => 'INTEGER','len' => 'INTEGER'];

    } // ./constructor

} // ./ColMdl