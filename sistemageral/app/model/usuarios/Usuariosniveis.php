<?php

/**
 * Usuariosniveis Active Record
 * @author  <your-name-here>
 */
class Usuariosniveis extends TRecord
{
    const TABLENAME = 'usuariosniveis';
    const PRIMARYKEY = 'id';
    const IDPOLICY = 'serial'; // {max, serial}


    /**
     * Constructor method
     */
    public function __construct($id = null, $callObjectLoad = true)
    {
        parent::__construct($id, $callObjectLoad);
        parent::addAttribute('usuarionivel_chave');
        parent::addAttribute('usuarionivel_nome');
        parent::addAttribute('usuarionivel_obs');
    }


}
