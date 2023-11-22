<?php
/**
 * Estoque Active Record
 * @author  <your-name-here>
 */
class Estoque extends TRecord
{
    const TABLENAME = 'estoque';
    const PRIMARYKEY= 'id';
    const IDPOLICY =  'serial'; // {max, serial}
    
    
    private $empresas;

    /**
     * Constructor method
     */
    public function __construct($id = NULL, $callObjectLoad = TRUE)
    {
        parent::__construct($id, $callObjectLoad);
        parent::addAttribute('item_empresa');
        parent::addAttribute('item_codigo');
        parent::addAttribute('item_EAN');
        parent::addAttribute('item_ativo');
        parent::addAttribute('itemnome');
        parent::addAttribute('item_quantidate_atual');
        parent::addAttribute('item_ultima_compra');
        parent::addAttribute('item_ultima_venda');
        parent::addAttribute('item_fornecedor');
        parent::addAttribute('item_obs');
    }

    
    /**
     * Method set_empresas
     * Sample of usage: $estoque->empresas = $object;
     * @param $object Instance of Empresas
     */
    public function set_empresas(Empresas $object)
    {
        $this->empresas = $object;
        $this->empresas_id = $object->id;
    }
    
    /**
     * Method get_empresas
     * Sample of usage: $estoque->empresas->attribute;
     * @returns Empresas instance
     */
    public function get_empresas()
    {
        // loads the associated object
        if (empty($this->empresas))
            $this->empresas = new Empresas($this->empresas_id);
    
        // returns the associated object
        return $this->empresas;
    }
    


}
