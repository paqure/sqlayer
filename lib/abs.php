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

} // ./Dbs

abstract class Mdl
{

    protected $dbs;
    protected $tbl;
    protected $col;


    /**
     * Create Table
     */
    public function crt()
    {

        $sql = 'CREATE TABLE '.$this->tbl.' (';

        $c = count($this->col)-1;

        $i = 0;

        foreach ($this->col as $key=>$val) {

            $sql .= $key.' '.$val;

            if($i<$c) {

                $sql .= ', ';

            }

            $i++;

        }

        $sql .= ');';

        return $this->dbs->exe($sql);

    }

    /**
     * Create Table
     */
    public function ins($arg)
    {

        $sql = 'INSERT INTO '.$this->tbl.' (';

        $c = count($this->col)-1;

        $i = 0;

        foreach ($this->col as $key=>$val) {

            $sql .= $key;

            if($i<$c) {

                $sql .= ', ';

            }

            $i++;

        }

        $sql .= ') VALUES (NULL';

        foreach ($arg as $key=>$val) {

            $sql .= ', "'.$val.'"';

        }

        $sql .= ');';

        return $this->dbs->ins($sql);

    }

}