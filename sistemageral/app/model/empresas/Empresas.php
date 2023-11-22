<?php
/**
 * Empresas Active Record
 * @author  <your-name-here>
 */
class Empresas extends TRecord
{
    const TABLENAME = 'empresas';
    const PRIMARYKEY= 'id';
    const IDPOLICY =  'serial'; // {max, serial}
    
    
    private $empresas;

    /**
     * Constructor method
     */
    public function __construct($id = NULL, $callObjectLoad = TRUE)
    {
        parent::__construct($id, $callObjectLoad);
        parent::addAttribute('empresa_uuid');
        parent::addAttribute('empresa_matriz');
        parent::addAttribute('empresas_id');
        parent::addAttribute('empresa_ativa');
        parent::addAttribute('empresa_data_inclusao');
        parent::addAttribute('empresa_insc_cnpj_cpf');
        parent::addAttribute('empresa_insc_estadual');
        parent::addAttribute('empresa_insc_municipal');
        parent::addAttribute('empresa_razao_social');
        parent::addAttribute('empresa_endereco');
        parent::addAttribute('empresa_numero');
        parent::addAttribute('empresa_observacao');
    }

    
    /**
     * Method set_empresas
     * Sample of usage: $empresas->empresas = $object;
     * @param $object Instance of Empresas
     */
    public function set_empresas(Empresas $object)
    {
        $this->empresas = $object;
        $this->empresas_id = $object->id;
    }
    
    /**
     * Method get_empresas
     * Sample of usage: $empresas->empresas->attribute;
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
