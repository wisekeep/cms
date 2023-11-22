<?php

/**
 * UsuariosList Listing
 * @author  <your name here>
 */
class UsuariosList extends TPage
{
    protected $form;     // registration form
    protected $datagrid; // listing
    protected $pageNavigation;
    protected $formgrid;
    protected $deleteButton;

    use Adianti\base\AdiantiStandardListTrait;

    /**
     * Page constructor
     */
    public function __construct()
    {
        parent::__construct();

        $this->setDatabase('sistemageral');            // defines the database
        $this->setActiveRecord('Usuarios');   // defines the active record
        $this->setDefaultOrder('id', 'asc');         // defines the default order
        // $this->setCriteria($criteria) // define a standard filter

        $this->addFilterField('usuario_cpf', 'like', 'usuario_cpf'); // filterField, operator, formField
        $this->addFilterField('usuario_rg', 'like', 'usuario_rg'); // filterField, operator, formField
        $this->addFilterField('usuario_nome', 'like', 'usuario_nome'); // filterField, operator, formField
        
        // creates the form
        $this->form = new BootstrapFormBuilder('form_Usuarios');
        
        // create the form fields
        $usuario_cpf = new TEntry('usuario_cpf');
        $usuario_rg = new TEntry('usuario_rg');
        $usuario_nome = new TEntry('usuario_nome');
        
        // $usuario_cpf    = new TDBUniqueSearch('usuario_cpf', 'sistemageral', 'Usuarios', 'id', 'usuario_cpf');
        // $usuario_rg     = new TDBUniqueSearch('usuario_rg' ,'sistemageral', 'Usuarios', 'id','usuario_rg');
        // $usuario_nome   = new TDBUniqueSearch('usuario_nome','sistemageral', 'Usuarios', 'id','usuario_nome');

        // add the fields
        $this->form->addFields([new TLabel('Cpf')], [$usuario_cpf]);
        $this->form->addFields([new TLabel('Rg')], [$usuario_rg]);
        $this->form->addFields([new TLabel('Nome')], [$usuario_nome]);


        // set sizes
        $usuario_cpf->setSize('100%');
        $usuario_rg->setSize('100%');
        $usuario_nome->setSize('100%');

        
        // keep the form filled during navigation with session data
        $this->form->setData(TSession::getValue('Usuarios_filter_data'));
        
        // add the search form actions
        $btn = $this->form->addAction(_t('Find'), new TAction([$this, 'onSearch']), 'fa:search');
        $btn->class = 'btn btn-sm btn-primary';
        $this->form->addActionLink(_t('New'), new TAction(['UsuariosForm', 'onEdit']), 'fa:plus green');

        // creates a DataGrid
        $this->datagrid = new BootstrapDatagridWrapper(new TDataGrid);
        $this->datagrid->style = 'width: 100%';
        $this->datagrid->datatable = 'true';
        $this->datagrid->setHeight(320);
        // $this->datagrid->enablePopover('Popover', 'Hi <b> {name} </b>');
        

        // creates the datagrid columns
        $column_id = new TDataGridColumn('id', 'Id', 'right');
        $column_empresas_id = new TDataGridColumn('empresas->empresa_razao_social', 'Empresas Id', 'right');
        $column_usuariosniveis_id = new TDataGridColumn('usuariosniveis->usuarionivel_nome', 'Usuariosniveis Id', 'right');
        $column_usuariossituacoes_id = new TDataGridColumn('usuariossituacoes->usuariossituacao_nome', 'Usuariossituacoes Id', 'right');
        $column_usuariostipos_id = new TDataGridColumn('usuariostipos->usuariostipo_nome', 'Usuariostipos Id', 'right');
        $column_usuario_uuid = new TDataGridColumn('usuario_uuid', 'Usuario Uuid', 'left');
        $column_usuario_email = new TDataGridColumn('usuario_email', 'Usuario Email', 'left');
        $column_usuario_senha = new TDataGridColumn('usuario_senha', 'Usuario Senha', 'left');
        $column_usuario_adicionado_data = new TDataGridColumn('usuario_adicionado_data', 'Usuario Adicionado Data', 'left');
        $column_usuario_cpf = new TDataGridColumn('usuario_cpf', 'Usuario Cpf', 'left');
        $column_usuario_rg = new TDataGridColumn('usuario_rg', 'Usuario Rg', 'left');
        $column_usuario_nome = new TDataGridColumn('usuario_nome', 'Usuario Nome', 'left');
        $column_usuario_endereco = new TDataGridColumn('usuario_endereco', 'Usuario Endereco', 'left');
        $column_usuario_numero = new TDataGridColumn('usuario_numero', 'Usuario Numero', 'left');
        $column_usuario_bairro = new TDataGridColumn('usuario_bairro', 'Usuario Bairro', 'left');
        $column_usuario_cidade = new TDataGridColumn('usuario_cidade', 'Usuario Cidade', 'left');
        $column_usuario_estado = new TDataGridColumn('usuario_estado', 'Usuario Estado', 'left');
        $column_usuario_pais = new TDataGridColumn('usuario_pais', 'Usuario Pais', 'left');
        $column_usuario_cep = new TDataGridColumn('usuario_cep', 'Usuario Cep', 'left');
        $column_usuario_fone1 = new TDataGridColumn('usuario_fone1', 'Usuario Fone1', 'left');
        $column_usuario_fone2 = new TDataGridColumn('usuario_fone2', 'Usuario Fone2', 'left');
        $column_usuario_fone3 = new TDataGridColumn('usuario_fone3', 'Usuario Fone3', 'left');
        $column_usuario_fone4 = new TDataGridColumn('usuario_fone4', 'Usuario Fone4', 'left');
        $column_usuario_obs = new TDataGridColumn('usuario_obs', 'Usuario Obs', 'left');


        // add the columns to the DataGrid
        $this->datagrid->addColumn($column_id);
        $this->datagrid->addColumn($column_empresas_id);
        $this->datagrid->addColumn($column_usuariosniveis_id);
        $this->datagrid->addColumn($column_usuariossituacoes_id);
        $this->datagrid->addColumn($column_usuariostipos_id);
        $this->datagrid->addColumn($column_usuario_uuid);
        $this->datagrid->addColumn($column_usuario_email);
        $this->datagrid->addColumn($column_usuario_senha);
        $this->datagrid->addColumn($column_usuario_adicionado_data);
        $this->datagrid->addColumn($column_usuario_cpf);
        $this->datagrid->addColumn($column_usuario_rg);
        $this->datagrid->addColumn($column_usuario_nome);
        $this->datagrid->addColumn($column_usuario_endereco);
        $this->datagrid->addColumn($column_usuario_numero);
        $this->datagrid->addColumn($column_usuario_bairro);
        $this->datagrid->addColumn($column_usuario_cidade);
        $this->datagrid->addColumn($column_usuario_estado);
        $this->datagrid->addColumn($column_usuario_pais);
        $this->datagrid->addColumn($column_usuario_cep);
        $this->datagrid->addColumn($column_usuario_fone1);
        $this->datagrid->addColumn($column_usuario_fone2);
        $this->datagrid->addColumn($column_usuario_fone3);
        $this->datagrid->addColumn($column_usuario_fone4);
        $this->datagrid->addColumn($column_usuario_obs);

        // define the transformer method over image
        $column_usuario_adicionado_data->setTransformer(function ($value, $object, $row) {
            if ($value) {
                try {
                    $date = new DateTime($value);
                    return $date->format('d/m/Y');
                } catch (Exception $e) {
                    return $value;
                }
            }
            return $value;
        });


        
        // create EDIT action
        $action_edit = new TDataGridAction(['UsuariosForm', 'onEdit']);
        //$action_edit->setUseButton(TRUE);
        //$action_edit->setButtonClass('btn btn-default');
        $action_edit->setLabel(_t('Edit'));
        $action_edit->setImage('fa:pencil-square-o blue fa-lg');
        $action_edit->setField('id');
        $this->datagrid->addAction($action_edit);
        
        // create DELETE action
        $action_del = new TDataGridAction(array($this, 'onDelete'));
        //$action_del->setUseButton(TRUE);
        //$action_del->setButtonClass('btn btn-default');
        $action_del->setLabel(_t('Delete'));
        $action_del->setImage('fa:trash-o red fa-lg');
        $action_del->setField('id');
        $this->datagrid->addAction($action_del);
        
        // create the datagrid model
        $this->datagrid->createModel();
        
        // create the page navigation
        $this->pageNavigation = new TPageNavigation;
        $this->pageNavigation->setAction(new TAction([$this, 'onReload']));
        $this->pageNavigation->setWidth($this->datagrid->getWidth());

        // vertical box container
        $container = new TVBox;
        // $container->class = 'table-responsive';
        $container->style = 'width: 90%';
        $container->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $container->add($this->form);
        $container->add(TPanelGroup::pack('', $this->datagrid, $this->pageNavigation));

        parent::add($container);
    }


}
