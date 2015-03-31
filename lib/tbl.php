<?php
/**
 * SQLayer TABLE CLASS-SET
 * @package   sqlayer
 * @version   0.0.1
 * @author    Roderic Linguri
 * @copyright Copyright (c) 2015, Digices
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 */

namespace sqlayer;

/* TABLE OBJECT */
class TblObj extends Obj
{

    /* @property $oid int (sqlite primary key) */
    public $oid;

    /* @property $nam string (table name) */
    public $nam;

    /* @property $exp string (expanded name) */
    public $exp;

} // ./TblObj

/* TABLE MODEL */
class TblMdl extends Mdl
{

    /**
     * new TblMdl
     */
    public function __construct()
    {

        $this->dbs = DCS::dbs();

        $this->tbl = 'tbl';

        $this->col = ['oid' => 'INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL','nam' => 'TEXT','exp' => 'TEXT'];

    } // ./constructor

} // ./TblMdl