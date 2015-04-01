<?php
/**
 * SQLayer HTML TABLE ELEMENT CLASSES
 * @package   sqlayer
 * @version   0.0.1
 * @author    Roderic Linguri
 * @copyright Copyright (c) 2015, Digices
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 */

namespace sqlayer;

/* HTML TABLE VIEW */
class TabVue extends Vue
{

    public function __construct()
    {

        $this->opn = '<table>';

        $this->cls = '</table>';

    }

}

/* HTML THEAD VIEW */
class ThdVue extends Vue
{

    public function __construct()
    {

        $this->opn = '<thead>';

        $this->cls = '</thead>';

    }

}

/* HTML TBODY VIEW */
class TbdVue extends Vue
{

    public function __construct()
    {

        $this->opn = '<tbody>';

        $this->cls = '</tbody>';

    }

}


/* HTML TR VIEW */
class TrwVue extends Vue
{

    public function __construct()
    {

        $this->opn = '<tr>';

        $this->cls = '</tr>';

    }

}

/* HTML TD VIEW */
class TdtVue extends Vue
{

    public function __construct($arg)
    {

        $this->opn = '<td>';

        $this->cnt = $arg;

        $this->cls = '</td>';

    }

}
