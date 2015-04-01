<?php
/**
 * SQLayer ABSTRACT CLASSES
 * @package   sqlayer
 * @version   0.0.1
 * @author    Roderic Linguri
 * @copyright Copyright (c) 2015, Digices
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 */

namespace sqlayer;

/* ABSTRACT OBJECT */
abstract class Obj
{


} // ./Obj

/* ABSTRACT DATABASE */
abstract class Dbs extends Obj
{

    /* @property PDO Connection Handle */
    protected $pch;


    /**
     * Execute an SQL query
     * @param  string (sql query string)
     * @return int (row count)
     */
    public function exe($arg)
    {

        $sth = $this->pch->prepare($arg);

        $sth->execute();

        return $sth->rowCount();

    } // ./exe()

    public function ins($arg)
    {

        $sth = $this->pch->prepare($arg);

        $sth->execute();

        return $this->pch->lastInsertId();

    } // ./ins()

    /**
     * @param $arg
     * @return string (sql query string)
     */
    public function ftcRec($arg)
    {

        $sth = $this->pch->prepare($arg);

        $sth->execute();

        return $sth->fetch(\PDO::FETCH_ASSOC);

    }

} // ./Dbs

/* ABSTRACT MODEL */
abstract class Mdl
{

    /* @property object (Dbs Singleton) */
    protected $dbs;

    /* @property string (table name) */
    protected $tbl;

    /* @property assoc (column names => def) */
    protected $col;


    /**
     * Create Table
     */
    public function crt()
    {

        $sql = 'CREATE TABLE '.$this->tbl.' (';

        // count columns to omit last comma
        $c = count($this->col)-1;

        // initialize increment so we know when we're at last column
        $i = 0;

        // iterate through columns
        foreach ($this->col as $key=>$val) {

            $sql .= $key.' '.$val;

            if($i<$c) {

                $sql .= ', ';

            } // ./if comma needed

            $i++;

        } // ./foreach

        $sql .= ');';

        // return affected rows
        return $this->dbs->exe($sql);

    } // ./crt()

    /**
     * Insert Record
     */
    public function ins($arg)
    {

        $sql = 'INSERT INTO '.$this->tbl.' (';

        // count columns to omit last comma
        $c = count($this->col)-1;

        // initialize increment so we know when we're at last column
        $i = 0;

        // iterate through columns
        foreach ($this->col as $key=>$val) {

            $sql .= $key;

            if($i<$c) {

                $sql .= ', ';

            } // ./if comma needed

            $i++;

        } // ./foreach key

        $sql .= ') VALUES (NULL';

        foreach ($arg as $key=>$val) {

            $sql .= ', "'.$val.'"';

        } // ./foreach value

        $sql .= ');';

        // return lastInsertId
        return $this->dbs->ins($sql);

    } // ./ins()

    public function objFromId($arg)
    {

        $sql = 'SELECT * FROM '.$this->tbl.' WHERE oid = '.$arg.';';

        $rec = $this->dbs->ftcRec($sql);

        $obj = new TblObj();

        foreach($rec as $key=>$val) {

            $obj->$key = $val;

        }

        return $obj;

    }

} // ./Mdl