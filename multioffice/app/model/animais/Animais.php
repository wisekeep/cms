<?php
/**
 * Animais Active Record
 * @author  <your-name-here>
 */
class Animais extends TRecord
{
    const TABLENAME = 'animais';
    const PRIMARYKEY= 'id';
    const IDPOLICY =  'serial'; // {max, serial}
    
    
    private $animaistipos;
    private $animaisracas;

    /**
     * Constructor method
     */
    public function __construct($id = NULL, $callObjectLoad = TRUE)
    {
        parent::__construct($id, $callObjectLoad);
        parent::addAttribute('animal_nome');
        parent::addAttribute('animais_tipo');
        parent::addAttribute('animais_raca');
        parent::addAttribute('animal_obs');
        parent::addAttribute('animal_foto');
        parent::addAttribute('animal_especial');
    }

    
    /**
     * Method set_animaistipos
     * Sample of usage: $animais->animaistipos = $object;
     * @param $object Instance of Animaistipos
     */
    public function set_animaistipos(Animaistipos $object)
    {
        $this->animaistipos = $object;
        $this->animaistipos_id = $object->id;
    }
    
    /**
     * Method get_animaistipos
     * Sample of usage: $animais->animaistipos->attribute;
     * @returns Animaistipos instance
     */
    public function get_animaistipos()
    {
        // loads the associated object
        if (empty($this->animaistipos))
            $this->animaistipos = new Animaistipos($this->animaistipos_id);
    
        // returns the associated object
        return $this->animaistipos;
    }
    
    
    /**
     * Method set_animaisracas
     * Sample of usage: $animais->animaisracas = $object;
     * @param $object Instance of Animaisracas
     */
    public function set_animaisracas(Animaisracas $object)
    {
        $this->animaisracas = $object;
        $this->animaisracas_id = $object->id;
    }
    
    /**
     * Method get_animaisracas
     * Sample of usage: $animais->animaisracas->attribute;
     * @returns Animaisracas instance
     */
    public function get_animaisracas()
    {
        // loads the associated object
        if (empty($this->animaisracas))
            $this->animaisracas = new Animaisracas($this->animaisracas_id);
    
        // returns the associated object
        return $this->animaisracas;
    }
    


}
