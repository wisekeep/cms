<?php
/**
 * Animaistipos Active Record
 * @author  <your-name-here>
 */
class Animaistipos extends TRecord
{
    const TABLENAME = 'animaistipos';
    const PRIMARYKEY= 'id';
    const IDPOLICY =  'serial'; // {max, serial}
    
    
    /**
     * Constructor method
     */
    public function __construct($id = NULL, $callObjectLoad = TRUE)
    {
        parent::__construct($id, $callObjectLoad);
        parent::addAttribute('animaistipos_nome');
        parent::addAttribute('animaistipos_chave');
        parent::addAttribute('animaistipos_obs');
    }


}
