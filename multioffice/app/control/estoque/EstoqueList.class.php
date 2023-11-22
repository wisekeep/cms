<?php
/**
 * EstoqueList Listing
 * @author  <your name here>
 */
class EstoqueList extends TPage
{
    private $form; // form
    private $datagrid; // listing
    private $pageNavigation;
    private $formgrid;
    private $loaded;
    private $deleteButton;
    
    /**
     * Class constructor
     * Creates the page, the form and the listing
     */
    public function __construct()
    {
        parent::__construct();
        
        // creates the form
        $this->form = new BootstrapFormBuilder('form_Estoque');
        //$this->form->setFormTitle('Estoque');
        

        // create the form fields
        $item_codigo = new TEntry('item_codigo');
        $item_EAN = new TEntry('item_EAN');
        $item_ativo = new TEntry('item_ativo');
        $itemnome = new TEntry('itemnome');


        // add the fields
        $this->form->addFields( [ new TLabel('Item Codigo') ], [ $item_codigo ] );
        $this->form->addFields( [ new TLabel('Item Ean') ], [ $item_EAN ] );
        $this->form->addFields( [ new TLabel('Item Ativo') ], [ $item_ativo ] );
        $this->form->addFields( [ new TLabel('Itemnome') ], [ $itemnome ] );


        // set sizes
        $item_codigo->setSize('100%');
        $item_EAN->setSize('100%');
        $item_ativo->setSize('100%');
        $itemnome->setSize('100%');

        
        // keep the form filled during navigation with session data
        $this->form->setData( TSession::getValue('Estoque_filter_data') );
        
        // add the search form actions
        $btn = $this->form->addAction(_t('Find'), new TAction([$this, 'onSearch']), 'fa:search');
        $btn->class = 'btn btn-sm btn-primary';
        $this->form->addActionLink(_t('New'), new TAction(['EstoqueForm', 'onEdit']), 'fa:plus green');
        
        // creates a Datagrid
        $this->datagrid = new BootstrapDatagridWrapper(new TDataGrid);
        $this->datagrid->style = 'width: 100%';
        $this->datagrid->datatable = 'true';
        // $this->datagrid->enablePopover('Popover', 'Hi <b> {name} </b>');
        

        // creates the datagrid columns
        $column_id = new TDataGridColumn('id', 'Id', 'right');
        $column_item_empresa = new TDataGridColumn('item_empresa', 'Empresa', 'right');
        $column_item_codigo = new TDataGridColumn('item_codigo', 'Codigo', 'left');
        $column_item_EAN = new TDataGridColumn('item_EAN', 'EAN', 'left');
        $column_item_ativo = new TDataGridColumn('item_ativo', 'Ativo?', 'right');
        $column_itemnome = new TDataGridColumn('itemnome', 'Nome', 'left');
        $column_item_quantidate_atual = new TDataGridColumn('item_quantidate_atual', 'Quantidate Atual', 'right');
        $column_item_ultima_compra = new TDataGridColumn('item_ultima_compra', 'Ultima Compra', 'left');
        $column_item_ultima_venda = new TDataGridColumn('item_ultima_venda', 'Ultima Venda', 'left');
        $column_item_fornecedor = new TDataGridColumn('item_fornecedor', 'Fornecedor', 'right');
        $column_item_obs = new TDataGridColumn('item_obs', 'Obs', 'left');


        // add the columns to the DataGrid
        $this->datagrid->addColumn($column_id);
        $this->datagrid->addColumn($column_item_empresa);
        $this->datagrid->addColumn($column_item_codigo);
        $this->datagrid->addColumn($column_item_EAN);
        $this->datagrid->addColumn($column_item_ativo);
        $this->datagrid->addColumn($column_itemnome);
        $this->datagrid->addColumn($column_item_quantidate_atual);
        $this->datagrid->addColumn($column_item_ultima_compra);
        $this->datagrid->addColumn($column_item_ultima_venda);
        $this->datagrid->addColumn($column_item_fornecedor);
        $this->datagrid->addColumn($column_item_obs);

        
        // create EDIT action
        $action_edit = new TDataGridAction(['EstoqueForm', 'onEdit']);
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
        
        // creates the page navigation
        $this->pageNavigation = new TPageNavigation;
        $this->pageNavigation->setAction(new TAction([$this, 'onReload']));
        $this->pageNavigation->setWidth($this->datagrid->getWidth());
        


        // vertical box container
        $container = new TVBox;
        $container->style = 'width: 90%';
        $container->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $container->add($this->form);
        $container->add(TPanelGroup::pack('', $this->datagrid, $this->pageNavigation));
        
        parent::add($container);
    }
    
    /**
     * Inline record editing
     * @param $param Array containing:
     *              key: object ID value
     *              field name: object attribute to be updated
     *              value: new attribute content 
     */
    public function onInlineEdit($param)
    {
        try
        {
            // get the parameter $key
            $field = $param['field'];
            $key   = $param['key'];
            $value = $param['value'];
            
            TTransaction::open('multioffice'); // open a transaction with database
            $object = new Estoque($key); // instantiates the Active Record
            $object->{$field} = $value;
            $object->store(); // update the object in the database
            TTransaction::close(); // close the transaction
            
            $this->onReload($param); // reload the listing
            new TMessage('info', "Record Updated");
        }
        catch (Exception $e) // in case of exception
        {
            new TMessage('error', $e->getMessage()); // shows the exception error message
            TTransaction::rollback(); // undo all pending operations
        }
    }
    
    /**
     * Register the filter in the session
     */
    public function onSearch()
    {
        // get the search form data
        $data = $this->form->getData();
        
        // clear session filters
        TSession::setValue('EstoqueList_filter_item_codigo',   NULL);
        TSession::setValue('EstoqueList_filter_item_EAN',   NULL);
        TSession::setValue('EstoqueList_filter_item_ativo',   NULL);
        TSession::setValue('EstoqueList_filter_itemnome',   NULL);

        if (isset($data->item_codigo) AND ($data->item_codigo)) {
            $filter = new TFilter('item_codigo', 'like', "%{$data->item_codigo}%"); // create the filter
            TSession::setValue('EstoqueList_filter_item_codigo',   $filter); // stores the filter in the session
        }


        if (isset($data->item_EAN) AND ($data->item_EAN)) {
            $filter = new TFilter('item_EAN', 'like', "%{$data->item_EAN}%"); // create the filter
            TSession::setValue('EstoqueList_filter_item_EAN',   $filter); // stores the filter in the session
        }


        if (isset($data->item_ativo) AND ($data->item_ativo)) {
            $filter = new TFilter('item_ativo', 'like', "%{$data->item_ativo}%"); // create the filter
            TSession::setValue('EstoqueList_filter_item_ativo',   $filter); // stores the filter in the session
        }


        if (isset($data->itemnome) AND ($data->itemnome)) {
            $filter = new TFilter('itemnome', 'like', "%{$data->itemnome}%"); // create the filter
            TSession::setValue('EstoqueList_filter_itemnome',   $filter); // stores the filter in the session
        }

        
        // fill the form with data again
        $this->form->setData($data);
        
        // keep the search data in the session
        TSession::setValue('Estoque_filter_data', $data);
        
        $param = array();
        $param['offset']    =0;
        $param['first_page']=1;
        $this->onReload($param);
    }
    
    /**
     * Load the datagrid with data
     */
    public function onReload($param = NULL)
    {
        try
        {
            // open a transaction with database 'multioffice'
            TTransaction::open('multioffice');
            
            // creates a repository for Estoque
            $repository = new TRepository('Estoque');
            $limit = 10;
            // creates a criteria
            $criteria = new TCriteria;
            
            // default order
            if (empty($param['order']))
            {
                $param['order'] = 'id';
                $param['direction'] = 'asc';
            }
            $criteria->setProperties($param); // order, offset
            $criteria->setProperty('limit', $limit);
            

            if (TSession::getValue('EstoqueList_filter_item_codigo')) {
                $criteria->add(TSession::getValue('EstoqueList_filter_item_codigo')); // add the session filter
            }


            if (TSession::getValue('EstoqueList_filter_item_EAN')) {
                $criteria->add(TSession::getValue('EstoqueList_filter_item_EAN')); // add the session filter
            }


            if (TSession::getValue('EstoqueList_filter_item_ativo')) {
                $criteria->add(TSession::getValue('EstoqueList_filter_item_ativo')); // add the session filter
            }


            if (TSession::getValue('EstoqueList_filter_itemnome')) {
                $criteria->add(TSession::getValue('EstoqueList_filter_itemnome')); // add the session filter
            }

            
            // load the objects according to criteria
            $objects = $repository->load($criteria, FALSE);
            
            if (is_callable($this->transformCallback))
            {
                call_user_func($this->transformCallback, $objects, $param);
            }
            
            $this->datagrid->clear();
            if ($objects)
            {
                // iterate the collection of active records
                foreach ($objects as $object)
                {
                    // add the object inside the datagrid
                    $this->datagrid->addItem($object);
                }
            }
            
            // reset the criteria for record count
            $criteria->resetProperties();
            $count= $repository->count($criteria);
            
            $this->pageNavigation->setCount($count); // count of records
            $this->pageNavigation->setProperties($param); // order, page
            $this->pageNavigation->setLimit($limit); // limit
            
            // close the transaction
            TTransaction::close();
            $this->loaded = true;
        }
        catch (Exception $e) // in case of exception
        {
            // shows the exception error message
            new TMessage('error', $e->getMessage());
            // undo all pending operations
            TTransaction::rollback();
        }
    }
    
    /**
     * Ask before deletion
     */
    public static function onDelete($param)
    {
        // define the delete action
        $action = new TAction([__CLASS__, 'Delete']);
        $action->setParameters($param); // pass the key parameter ahead
        
        // shows a dialog to the user
        new TQuestion(TAdiantiCoreTranslator::translate('Do you really want to delete ?'), $action);
    }
    
    /**
     * Delete a record
     */
    public static function Delete($param)
    {
        try
        {
            $key=$param['key']; // get the parameter $key
            TTransaction::open('multioffice'); // open a transaction with database
            $object = new Estoque($key, FALSE); // instantiates the Active Record
            $object->delete(); // deletes the object from the database
            TTransaction::close(); // close the transaction
            
            $pos_action = new TAction([__CLASS__, 'onReload']);
            new TMessage('info', TAdiantiCoreTranslator::translate('Record deleted'), $pos_action); // success message
        }
        catch (Exception $e) // in case of exception
        {
            new TMessage('error', $e->getMessage()); // shows the exception error message
            TTransaction::rollback(); // undo all pending operations
        }
    }
    



    
    /**
     * method show()
     * Shows the page
     */
    public function show()
    {
        // check if the datagrid is already loaded
        if (!$this->loaded AND (!isset($_GET['method']) OR !(in_array($_GET['method'],  array('onReload', 'onSearch')))) )
        {
            if (func_num_args() > 0)
            {
                $this->onReload( func_get_arg(0) );
            }
            else
            {
                $this->onReload();
            }
        }
        parent::show();
    }
}
