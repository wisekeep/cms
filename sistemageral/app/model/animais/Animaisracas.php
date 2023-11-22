<?php
/**
 * Animaisracas Active Record
 * @author  <your-name-here>
 */
class Animaisracas extends TRecord
{
    const TABLENAME = 'animaisracas';
    const PRIMARYKEY= 'id';
    const IDPOLICY =  'serial'; // {max, serial}
    
    
    /**
     * Constructor method
     */
    public function __construct($id = NULL, $callObjectLoad = TRUE)
    {
        parent::__construct($id, $callObjectLoad);
        parent::addAttribute('animaisraca_nome');
        parent::addAttribute('animaisracas_chave');
        parent::addAttribute('animaisracas_obs');
    }


}
