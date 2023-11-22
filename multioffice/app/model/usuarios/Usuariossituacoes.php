<?php

/**
 * Usuariossituacoes Active Record
 * @author  <your-name-here>
 */
class Usuariossituacoes extends TRecord
{
    const TABLENAME = 'usuariossituacoes';
    const PRIMARYKEY = 'id';
    const IDPOLICY = 'serial'; // {max, serial}


    /**
     * Constructor method
     */
    public function __construct($id = null, $callObjectLoad = true)
    {
        parent::__construct($id, $callObjectLoad);
        parent::addAttribute('usuariossituacao_chave');
        parent::addAttribute('usuariossituacao_nome');
        parent::addAttribute('usuariossituacao_obs');
    }


}
