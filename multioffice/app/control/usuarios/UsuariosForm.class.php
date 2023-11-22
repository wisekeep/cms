<?php

/**
 * UsuariosForm Form
 * @author  <your name here>
 */
class UsuariosForm extends TPage
{
    protected $form; // form

    /**
     * Form constructor
     * @param $param Request
     */
    public function __construct($param)
    {
        parent::__construct();
        
        // creates the form
        $this->form = new BootstrapFormBuilder('form_Usuarios');
        

        // create the form fields
        $id = new TEntry('id');
        $empresas_id = new TDBUniqueSearch('empresas_id', 'multioffice', 'Empresas', 'id', 'empresa_razao_social');
        $empresas_id->setMinLength(0);
        $usuariosniveis_id = new TDBUniqueSearch('usuariosniveis_id', 'multioffice', 'Usuariosniveis', 'id', 'usuarionivel_nome');
        $usuariosniveis_id->setMinLength(0);
        $usuariossituacoes_id = new TDBUniqueSearch('usuariossituacoes_id', 'multioffice', 'Usuariossituacoes', 'id', 'usuariossituacao_nome');
        $usuariossituacoes_id->setMinLength(0);
        $usuariostipos_id = new TDBUniqueSearch('usuariostipos_id', 'multioffice', 'Usuariostipos', 'id', 'usuariostipo_nome');
        $usuariostipos_id->setMinLength(0);
        $usuario_uuid = new TEntry('usuario_uuid');
        $usuario_uuid->placeholder = 'gerado automaticamente...';

        $usuario_email = new TEntry('usuario_email');
        $usuario_senha = new TPassword('usuario_senha');
        //configura máscara data      
        $usuario_adicionado_data = new TDateTime('usuario_adicionado_data');
        $usuario_adicionado_data->setMask('dd/mm/yyyy hh:ii');
        $usuario_adicionado_data->setDatabaseMask('yyyy-mm-dd hh:ii');
        
        //configura máscara CPF/RG
        $usuario_cpf = new TEntry('usuario_cpf');
        // $usuario_cpf->setMask('###.###.###-##');
        $usuario_rg = new TEntry('usuario_rg');

        $usuario_nome = new TEntry('usuario_nome');
        $usuario_nome->forceUpperCase();
        $usuario_endereco = new TEntry('usuario_endereco');
        $usuario_numero = new TEntry('usuario_numero');
        $usuario_bairro = new TEntry('usuario_bairro');
        $usuario_cidade = new TEntry('usuario_cidade');
        $usuario_estado = new TEntry('usuario_estado');
        $usuario_pais = new TEntry('usuario_pais');

        //Configura Mascara CEP
        $usuario_cep = new TEntry('usuario_cep');
        $usuario_cep->setMask('#####-###');

        $usuario_fone1 = new TEntry('usuario_fone1');
        $usuario_fone2 = new TEntry('usuario_fone2');
        $usuario_fone3 = new TEntry('usuario_fone3');
        $usuario_fone4 = new TEntry('usuario_fone4');
        // configura tamanho HTMLeditor
        $usuario_obs = new THtmlEditor('usuario_obs');
        $usuario_obs->setTip("Observações gerais sobre o cliente.");
        $usuario_obs->setSize('100%', 200);

        // add the fields
        $this->form->appendPage('Dados Principais');
        $this->form->addContent([new TFormSeparator('Dados da Empresa')]);

        $this->form->addFields([new TLabel('Id'), $id], [new TLabel('Empresas Id'), $empresas_id]);
        $this->form->addContent([new TFormSeparator('')]);
        $this->form->addFields(
            [new TLabel('Nível'), $usuariosniveis_id],
            [new TLabel('Situação'), $usuariossituacoes_id],
            [new TLabel('Tipo'), $usuariostipos_id]
        );

        $this->form->addFields([new TLabel('Usuario Uuid'), $usuario_uuid]);

        $this->form->addContent([new TFormSeparator('Dados de Login')]);
        $this->form->addFields([new TLabel('Usuario Email'), $usuario_email]);
        $this->form->addFields([new TLabel('Usuario Senha'), $usuario_senha]);
        $this->form->addFields([new TLabel('Usuario Adicionado Data'), $usuario_adicionado_data]);
        $this->form->addFields(
            [new TLabel('Usuario Cpf'), $usuario_cpf],
            [new TLabel('Usuario Rg'), $usuario_rg]
        );

        $this->form->addFields([new TLabel('Usuario Nome'), $usuario_nome]);

        $this->form->appendPage('Endereço');

        $this->form->addFields([new TLabel('Usuario Endereco'), $usuario_endereco]);
        $this->form->addFields([new TLabel('Usuario Numero'), $usuario_numero]);
        $this->form->addFields([new TLabel('Usuario Bairro'), $usuario_bairro]);
        $this->form->addFields([new TLabel('Usuario Cidade'), $usuario_cidade]);
        $this->form->addFields([new TLabel('Usuario Estado'), $usuario_estado]);
        $this->form->addFields([new TLabel('Usuario Pais'), $usuario_pais]);
        $this->form->addFields([new TLabel('Usuario Cep'), $usuario_cep]);

        $this->form->appendPage('Contatos');

        $this->form->addFields(
            [new TLabel('Fone Residencia'), $usuario_fone1],
            [new TLabel('Celular'), $usuario_fone2]
        );

        $this->form->addFields(
            [new TLabel('Contato 1'), $usuario_fone3],
            [new TLabel('Contato 2'), $usuario_fone4]
        );

        $this->form->addFields([new TLabel('Usuario Obs'), $usuario_obs]);

        // set sizes
        $id->setSize('100%');
        $empresas_id->setSize('100%');
        $usuariosniveis_id->setSize('100%');
        $usuariossituacoes_id->setSize('100%');
        $usuariostipos_id->setSize('100%');
        $usuario_uuid->setSize('100%');
        $usuario_email->setSize('100%');
        $usuario_senha->setSize('100%');
        $usuario_adicionado_data->setSize('100%');
        $usuario_cpf->setSize('100%');
        $usuario_rg->setSize('100%');
        $usuario_nome->setSize('100%');
        $usuario_endereco->setSize('100%');
        $usuario_numero->setSize('100%');
        $usuario_bairro->setSize('100%');
        $usuario_cidade->setSize('100%');
        $usuario_estado->setSize('100%');
        $usuario_pais->setSize('100%');
        $usuario_cep->setSize('100%');
        $usuario_fone1->setSize('100%');
        $usuario_fone2->setSize('100%');
        $usuario_fone3->setSize('100%');
        $usuario_fone4->setSize('100%');
        $usuario_obs->setSize('100%');

        if (!empty($id)) {
            $id->setEditable(false);
            $usuario_adicionado_data->setEditable(false);
        }

        
        //Gera UUID
        if (is_null($usuario_uuid)) {
            $usuario_uuid->setEditable(false);

        } else {

            function generate_uid()
            {
                return sha1(uniqid(time(), true));
            }
            $usuario_adicionado_data->setValue(date('d/m/Y H:i'));
            $usuario_uuid->setEditable(false);
            $usuario_uuid->setValue(generate_uid());
        }


        /** samples
         $fieldX->addValidation( 'Field X', new TRequiredValidator ); // add validation
         $fieldX->setSize( '100%' ); // set size
         **/
         
        // create the form actions
        $btn = $this->form->addAction(_t('Save'), new TAction([$this, 'onSave']), 'fa:floppy-o');
        $btn->class = 'btn btn-sm btn-primary';
        $this->form->addAction(_t('New'), new TAction([$this, 'onEdit']), 'fa:eraser red');
        $this->form->addAction('Limpar', new TAction(array($this, 'onClear')), 'fa:eraser red');
        // vertical box container
        $container = new TVBox;
        $container->style = 'width: 90%';
        $container->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $container->add($this->form);

        parent::add($container);
    }

    /**
     * Save form data
     * @param $param Request
     */
    public function onSave($param)
    {
        try {
            TTransaction::open('multioffice'); // open a transaction

            /**
            // Enable Debug logger for SQL operations inside the transaction
            TTransaction::setLogger(new TLoggerSTD); // standard output
            TTransaction::setLogger(new TLoggerTXT('log.txt')); // file
             **/

            $this->form->validate(); // validate form data
            $data = $this->form->getData(); // get form data as array

            $object = new Usuarios;  // create an empty object
            $object->fromArray((array)$data); // load the object with data
            $object->store(); // save the object
            
            // get the generated id
            $data->id = $object->id;

            $this->form->setData($data); // fill form data
            TTransaction::close(); // close the transaction

            new TMessage('info', TAdiantiCoreTranslator::translate('Record saved'));
        } catch (Exception $e) // in case of exception
        {
            new TMessage('error', $e->getMessage()); // shows the exception error message
            $this->form->setData($this->form->getData()); // keep form data
            TTransaction::rollback(); // undo all pending operations
        }
    }

    /**
     * Clear form data
     * @param $param Request
     */
    public function onClear($param)
    {
        $this->form->clear(true);
    }

    /**
     * Load object to form data
     * @param $param Request
     */
    public function onEdit($param)
    {
        try {
            if (isset($param['key'])) {
                $key = $param['key'];  // get the parameter $key
                TTransaction::open('multioffice'); // open a transaction
                $object = new Usuarios($key); // instantiates the Active Record
                $this->form->setData($object); // fill the form
                TTransaction::close(); // close the transaction
            } else {
                $this->form->clear(true);
            }
        } catch (Exception $e) // in case of exception
        {
            new TMessage('error', $e->getMessage()); // shows the exception error message
            TTransaction::rollback(); // undo all pending operations
        }
    }
}
