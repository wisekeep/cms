<?php
/**
 * AnimaisList Listing
 * @author  <your name here>
 */
class AnimaisList extends TPage
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
        $this->form = new BootstrapFormBuilder('form_Animais');
        //$this->form->setFormTitle('Animais');
        

        // create the form fields
        $animal_nome = new TSeekButton('animal_nome', 'sistemageral', 'Animais', 'id', 'animal_especial');
        $animais_tipo = new TCombo('animais_tipo', 'sistemageral', 'Animaistipos', 'id', 'animaistipos_nome');
        $animais_raca = new TCombo('animais_raca', 'sistemageral', 'Animaisracas', 'id', 'animaisraca_nome');


        // add the fields
        $this->form->addFields( [ new TLabel('Animal Nome') ], [ $animal_nome ] );
        $this->form->addFields( [ new TLabel('Animais Tipo') ], [ $animais_tipo ] );
        $this->form->addFields( [ new TLabel('Animais Raca') ], [ $animais_raca ] );


        // set sizes
        $animal_nome->setSize('100%');
        $animais_tipo->setSize('100%');
        $animais_raca->setSize('100%');

        
        // keep the form filled during navigation with session data
        $this->form->setData( TSession::getValue('Animais_filter_data') );
        
        // add the search form actions
        $btn = $this->form->addAction(_t('Find'), new TAction([$this, 'onSearch']), 'fa:search');
        $btn->class = 'btn btn-sm btn-primary';
        $this->form->addActionLink(_t('New'), new TAction(['AnimaisForm', 'onEdit']), 'fa:plus green');
        
        // creates a Datagrid
        $this->datagrid = new BootstrapDatagridWrapper(new TDataGrid);
        $this->datagrid->style = 'width: 100%';
        $this->datagrid->datatable = 'true';
        // $this->datagrid->enablePopover('Popover', 'Hi <b> {name} </b>');
        

        // creates the datagrid columns
        $column_id = new TDataGridColumn('id', 'Id', 'right');
        $column_animal_especial = new TDataGridColumn('animal_especial', 'Animal Especial', 'right');
        $column_animal_nome = new TDataGridColumn('animal_nome', 'Animal Nome', 'left');
        $column_animais_tipo = new TDataGridColumn('animais_tipo', 'Animais Tipo', 'right');
        $column_animais_raca = new TDataGridColumn('animais_raca', 'Animais Raca', 'right');


        // add the columns to the DataGrid
        $this->datagrid->addColumn($column_id);
        $this->datagrid->addColumn($column_animal_especial);
        $this->datagrid->addColumn($column_animal_nome);
        $this->datagrid->addColumn($column_animais_tipo);
        $this->datagrid->addColumn($column_animais_raca);


        // creates the datagrid column actions
        $column_animais_tipo->setAction(new TAction([$this, 'onReload']), ['order' => 'animais_tipo']);
        $column_animais_raca->setAction(new TAction([$this, 'onReload']), ['order' => 'animais_raca']);

        
        // create EDIT action
        $action_edit = new TDataGridAction(['AnimaisForm', 'onEdit']);
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
        // $container->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
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
            
            TTransaction::open('sistemageral'); // open a transaction with database
            $object = new Animais($key); // instantiates the Active Record
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
        TSession::setValue('AnimaisList_filter_animal_nome',   NULL);
        TSession::setValue('AnimaisList_filter_animais_tipo',   NULL);
        TSession::setValue('AnimaisList_filter_animais_raca',   NULL);

        if (isset($data->animal_nome) AND ($data->animal_nome)) {
            $filter = new TFilter('animal_nome', 'like', "%{$data->animal_nome}%"); // create the filter
            TSession::setValue('AnimaisList_filter_animal_nome',   $filter); // stores the filter in the session
        }


        if (isset($data->animais_tipo) AND ($data->animais_tipo)) {
            $filter = new TFilter('animais_tipo', '=', "$data->animais_tipo"); // create the filter
            TSession::setValue('AnimaisList_filter_animais_tipo',   $filter); // stores the filter in the session
        }


        if (isset($data->animais_raca) AND ($data->animais_raca)) {
            $filter = new TFilter('animais_raca', '=', "$data->animais_raca"); // create the filter
            TSession::setValue('AnimaisList_filter_animais_raca',   $filter); // stores the filter in the session
        }

        
        // fill the form with data again
        $this->form->setData($data);
        
        // keep the search data in the session
        TSession::setValue('Animais_filter_data', $data);
        
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
            // open a transaction with database 'sistemageral'
            TTransaction::open('sistemageral');
            
            // creates a repository for Animais
            $repository = new TRepository('Animais');
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
            

            if (TSession::getValue('AnimaisList_filter_animal_nome')) {
                $criteria->add(TSession::getValue('AnimaisList_filter_animal_nome')); // add the session filter
            }


            if (TSession::getValue('AnimaisList_filter_animais_tipo')) {
                $criteria->add(TSession::getValue('AnimaisList_filter_animais_tipo')); // add the session filter
            }


            if (TSession::getValue('AnimaisList_filter_animais_raca')) {
                $criteria->add(TSession::getValue('AnimaisList_filter_animais_raca')); // add the session filter
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
            TTransaction::open('sistemageral'); // open a transaction with database
            $object = new Animais($key, FALSE); // instantiates the Active Record
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
