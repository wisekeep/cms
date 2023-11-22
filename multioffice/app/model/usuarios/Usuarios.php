<?php

/**
 * Usuarios Active Record
 * @author  <your-name-here>
 */
class Usuarios extends TRecord
{
    const TABLENAME = 'usuarios';
    const PRIMARYKEY = 'id';
    const IDPOLICY = 'serial'; // {max, serial}


    private $empresas;
    private $usuariosniveis;
    private $usuariossituacoes;
    private $usuariostipos;
    private $system_user;
    private $system_user_group;
    private $system_user_program;
    private $system_user_unit;
    private $system_access_log;
    private $system_document_user;

    /**
     * Constructor method
     */
    public function __construct($id = null, $callObjectLoad = true)
    {
        parent::__construct($id, $callObjectLoad);
        parent::addAttribute('empresas_id');
        parent::addAttribute('usuariosniveis_id');
        parent::addAttribute('usuariossituacoes_id');
        parent::addAttribute('usuariostipos_id');
        parent::addAttribute('usuario_uuid');
        parent::addAttribute('usuario_email');
        parent::addAttribute('usuario_senha');
        parent::addAttribute('usuario_adicionado_data');
        parent::addAttribute('usuario_cpf');
        parent::addAttribute('usuario_rg');
        parent::addAttribute('usuario_nome');
        parent::addAttribute('usuario_endereco');
        parent::addAttribute('usuario_numero');
        parent::addAttribute('usuario_bairro');
        parent::addAttribute('usuario_cidade');
        parent::addAttribute('usuario_estado');
        parent::addAttribute('usuario_pais');
        parent::addAttribute('usuario_cep');
        parent::addAttribute('usuario_fone1');
        parent::addAttribute('usuario_fone2');
        parent::addAttribute('usuario_fone3');
        parent::addAttribute('usuario_fone4');
        parent::addAttribute('usuario_obs');
    }


    /**
     * Method set_empresas
     * Sample of usage: $usuarios->empresas = $object;
     * @param $object Instance of Empresas
     */
    public function set_empresas(Empresas $object)
    {
        $this->empresas = $object;
        $this->empresas_id = $object->id;
    }

    /**
     * Method get_empresas
     * Sample of usage: $usuarios->empresas->attribute;
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


    /**
     * Method set_usuariosniveis
     * Sample of usage: $usuarios->usuariosniveis = $object;
     * @param $object Instance of Usuariosniveis
     */
    public function set_usuariosniveis(Usuariosniveis $object)
    {
        $this->usuariosniveis = $object;
        $this->usuariosniveis_id = $object->id;
    }

    /**
     * Method get_usuariosniveis
     * Sample of usage: $usuarios->usuariosniveis->attribute;
     * @returns Usuariosniveis instance
     */
    public function get_usuariosniveis()
    {
        // loads the associated object
        if (empty($this->usuariosniveis))
            $this->usuariosniveis = new Usuariosniveis($this->usuariosniveis_id);
    
        // returns the associated object
        return $this->usuariosniveis;
    }


    /**
     * Method set_usuariossituacoes
     * Sample of usage: $usuarios->usuariossituacoes = $object;
     * @param $object Instance of Usuariossituacoes
     */
    public function set_usuariossituacoes(Usuariossituacoes $object)
    {
        $this->usuariossituacoes = $object;
        $this->usuariossituacoes_id = $object->id;
    }

    /**
     * Method get_usuariossituacoes
     * Sample of usage: $usuarios->usuariossituacoes->attribute;
     * @returns Usuariossituacoes instance
     */
    public function get_usuariossituacoes()
    {
        // loads the associated object
        if (empty($this->usuariossituacoes))
            $this->usuariossituacoes = new Usuariossituacoes($this->usuariossituacoes_id);
    
        // returns the associated object
        return $this->usuariossituacoes;
    }


    /**
     * Method set_usuariostipos
     * Sample of usage: $usuarios->usuariostipos = $object;
     * @param $object Instance of Usuariostipos
     */
    public function set_usuariostipos(Usuariostipos $object)
    {
        $this->usuariostipos = $object;
        $this->usuariostipos_id = $object->id;
    }

    /**
     * Method get_usuariostipos
     * Sample of usage: $usuarios->usuariostipos->attribute;
     * @returns Usuariostipos instance
     */
    public function get_usuariostipos()
    {
        // loads the associated object
        if (empty($this->usuariostipos))
            $this->usuariostipos = new Usuariostipos($this->usuariostipos_id);
    
        // returns the associated object
        return $this->usuariostipos;
    }


    /**
     * Method set_system_user
     * Sample of usage: $usuarios->system_user = $object;
     * @param $object Instance of SystemUser
     */
    public function set_system_user(SystemUser $object)
    {
        $this->system_user = $object;
        $this->system_user_id = $object->id;
    }

    /**
     * Method get_system_user
     * Sample of usage: $usuarios->system_user->attribute;
     * @returns SystemUser instance
     */
    public function get_system_user()
    {
        // loads the associated object
        if (empty($this->system_user))
            $this->system_user = new SystemUser($this->system_user_id);
    
        // returns the associated object
        return $this->system_user;
    }


    /**
     * Method set_system_user_group
     * Sample of usage: $usuarios->system_user_group = $object;
     * @param $object Instance of SystemUserGroup
     */
    public function set_system_user_group(SystemUserGroup $object)
    {
        $this->system_user_group = $object;
        $this->system_user_group_id = $object->id;
    }

    /**
     * Method get_system_user_group
     * Sample of usage: $usuarios->system_user_group->attribute;
     * @returns SystemUserGroup instance
     */
    public function get_system_user_group()
    {
        // loads the associated object
        if (empty($this->system_user_group))
            $this->system_user_group = new SystemUserGroup($this->system_user_group_id);
    
        // returns the associated object
        return $this->system_user_group;
    }


    /**
     * Method set_system_user_program
     * Sample of usage: $usuarios->system_user_program = $object;
     * @param $object Instance of SystemUserProgram
     */
    public function set_system_user_program(SystemUserProgram $object)
    {
        $this->system_user_program = $object;
        $this->system_user_program_id = $object->id;
    }

    /**
     * Method get_system_user_program
     * Sample of usage: $usuarios->system_user_program->attribute;
     * @returns SystemUserProgram instance
     */
    public function get_system_user_program()
    {
        // loads the associated object
        if (empty($this->system_user_program))
            $this->system_user_program = new SystemUserProgram($this->system_user_program_id);
    
        // returns the associated object
        return $this->system_user_program;
    }


    /**
     * Method set_system_user_unit
     * Sample of usage: $usuarios->system_user_unit = $object;
     * @param $object Instance of SystemUserUnit
     */
    public function set_system_user_unit(SystemUserUnit $object)
    {
        $this->system_user_unit = $object;
        $this->system_user_unit_id = $object->id;
    }

    /**
     * Method get_system_user_unit
     * Sample of usage: $usuarios->system_user_unit->attribute;
     * @returns SystemUserUnit instance
     */
    public function get_system_user_unit()
    {
        // loads the associated object
        if (empty($this->system_user_unit))
            $this->system_user_unit = new SystemUserUnit($this->system_user_unit_id);
    
        // returns the associated object
        return $this->system_user_unit;
    }


    /**
     * Method set_system_access_log
     * Sample of usage: $usuarios->system_access_log = $object;
     * @param $object Instance of SystemAccessLog
     */
    public function set_system_access_log(SystemAccessLog $object)
    {
        $this->system_access_log = $object;
        $this->system_access_log_id = $object->id;
    }

    /**
     * Method get_system_access_log
     * Sample of usage: $usuarios->system_access_log->attribute;
     * @returns SystemAccessLog instance
     */
    public function get_system_access_log()
    {
        // loads the associated object
        if (empty($this->system_access_log))
            $this->system_access_log = new SystemAccessLog($this->system_access_log_id);
    
        // returns the associated object
        return $this->system_access_log;
    }


    /**
     * Method set_system_document_user
     * Sample of usage: $usuarios->system_document_user = $object;
     * @param $object Instance of SystemDocumentUser
     */
    public function set_system_document_user(SystemDocumentUser $object)
    {
        $this->system_document_user = $object;
        $this->system_document_user_id = $object->id;
    }

    /**
     * Method get_system_document_user
     * Sample of usage: $usuarios->system_document_user->attribute;
     * @returns SystemDocumentUser instance
     */
    public function get_system_document_user()
    {
        // loads the associated object
        if (empty($this->system_document_user))
            $this->system_document_user = new SystemDocumentUser($this->system_document_user_id);
    
        // returns the associated object
        return $this->system_document_user;
    }



}
