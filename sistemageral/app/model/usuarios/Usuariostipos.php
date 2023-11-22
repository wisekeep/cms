<?php

/**
 * Usuariostipos Active Record
 * @author  <your-name-here>
 */
class Usuariostipos extends TRecord
{
    const TABLENAME = 'usuariostipos';
    const PRIMARYKEY = 'id';
    const IDPOLICY = 'serial'; // {max, serial}


    /**
     * Constructor method
     */
    public function __construct($id = null, $callObjectLoad = true)
    {
        parent::__construct($id, $callObjectLoad);
        parent::addAttribute('usuariostipo_chave');
        parent::addAttribute('usuariostipo_nome');
        parent::addAttribute('usuariostipo_obs');
    }


}
