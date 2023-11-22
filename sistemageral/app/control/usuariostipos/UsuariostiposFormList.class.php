<?php

/**
 * UsuariostiposFormList Form List
 * @author  <your name here>
 */
class UsuariostiposFormList extends TPage
{
    protected $form; // form
    protected $datagrid; // datagrid
    protected $pageNavigation;
    protected $loaded;

    /**
     * Form constructor
     * @param $param Request
     */
    public function __construct($param)
    {
        parent::__construct();

        $this->form = new BootstrapFormBuilder('form_Usuariostipos');

        // create the form fields
        $id = new TEntry('id');
        $usuariostipo_chave = new TEntry('usuariostipo_chave');
        $usuariostipo_nome = new TEntry('usuariostipo_nome');
        $usuariostipo_obs = new THtmlEditor('usuariostipo_obs');


        // add the fields
        $this->form->addFields(
            [new TLabel('Id')],
            [$id],
            [new TLabel('Chave')],
            [$usuariostipo_chave]
        );
        $this->form->addFields([new TLabel('Nome')], [$usuariostipo_nome]);
        $this->form->addFields([new TLabel('Obs')], [$usuariostipo_obs]);

        $usuariostipo_nome->addValidation('Nome', new TRequiredValidator);

        // set sizes
        $id->setSize('100%');
        $usuariostipo_chave->setSize('100%');
        $usuariostipo_nome->setSize('100%');
        $usuariostipo_obs->setSize('100%', 70);

        if (!empty($id)) {
            $id->setEditable(false);
        }

        /** samples
         $fieldX->addValidation( 'Field X', new TRequiredValidator ); // add validation
         $fieldX->setSize( '100%' ); // set size
         **/
        
        // create the form actions
        $btn = $this->form->addAction(_t('Save'), new TAction([$this, 'onSave']), 'fa:floppy-o');
        $btn->class = 'btn btn-sm btn-primary';
        $this->form->addAction(_t('New'), new TAction([$this, 'onEdit']), 'fa:eraser red');
        
        // creates a Datagrid
        $this->datagrid = new BootstrapDatagridWrapper(new TDataGrid);
        $this->datagrid->style = 'width: 100%';
        $this->datagrid->datatable = 'true';
        // $this->datagrid->enablePopover('Popover', 'Hi <b> {name} </b>');
        

        // creates the datagrid columns
        $column_id = new TDataGridColumn('id', 'Id', 'left');
        $column_usuariostipo_chave = new TDataGridColumn('usuariostipo_chave', 'Chave', 'left');
        $column_usuariostipo_nome = new TDataGridColumn('usuariostipo_nome', 'Nome', 'left');
        $column_usuariostipo_obs = new TDataGridColumn('usuariostipo_obs', 'Observação', 'left');


        // add the columns to the DataGrid
        $this->datagrid->addColumn($column_id);
        $this->datagrid->addColumn($column_usuariostipo_chave);
        $this->datagrid->addColumn($column_usuariostipo_nome);
        $this->datagrid->addColumn($column_usuariostipo_obs);

        
        // creates two datagrid actions
        $action1 = new TDataGridAction([$this, 'onEdit']);
        //$action1->setUseButton(TRUE);
        //$action1->setButtonClass('btn btn-default');
        $action1->setLabel(_t('Edit'));
        $action1->setImage('fa:pencil-square-o blue fa-lg');
        $action1->setField('id');

        $action2 = new TDataGridAction([$this, 'onDelete']);
        //$action2->setUseButton(TRUE);
        //$action2->setButtonClass('btn btn-default');
        $action2->setLabel(_t('Delete'));
        $action2->setImage('fa:trash-o red fa-lg');
        $action2->setField('id');
        
        // add the actions to the datagrid
        $this->datagrid->addAction($action1);
        $this->datagrid->addAction($action2);
        
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
        $container->add(TPanelGroup::pack('', $this->datagrid));
        $container->add($this->pageNavigation);

        parent::add($container);
    }

    /**
     * Load the datagrid with data
     */
    public function onReload($param = null)
    {
        try {
            // open a transaction with database 'sistemageral'
            TTransaction::open('sistemageral');
            
            // creates a repository for Usuariostipos
            $repository = new TRepository('Usuariostipos');
            $limit = 10;
            // creates a criteria
            $criteria = new TCriteria;
            
            // default order
            if (empty($param['order'])) {
                $param['order'] = 'id';
                $param['direction'] = 'asc';
            }
            $criteria->setProperties($param); // order, offset
            $criteria->setProperty('limit', $limit);
            
            // load the objects according to criteria
            $objects = $repository->load($criteria, false);

            $this->datagrid->clear();
            if ($objects) {
                // iterate the collection of active records
                foreach ($objects as $object) {
                    // add the object inside the datagrid
                    $this->datagrid->addItem($object);
                }
            }
            
            // reset the criteria for record count
            $criteria->resetProperties();
            $count = $repository->count($criteria);

            $this->pageNavigation->setCount($count); // count of records
            $this->pageNavigation->setProperties($param); // order, page
            $this->pageNavigation->setLimit($limit); // limit
            
            // close the transaction
            TTransaction::close();
            $this->loaded = true;
        } catch (Exception $e) // in case of exception
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
        $action = new TAction([__class__, 'Delete']);
        $action->setParameters($param); // pass the key parameter ahead
        
        // shows a dialog to the user
        new TQuestion(TAdiantiCoreTranslator::translate('Do you really want to delete ?'), $action);
    }

    /**
     * Delete a record
     */
    public static function Delete($param)
    {
        try {
            $key = $param['key']; // get the parameter $key
            TTransaction::open('sistemageral'); // open a transaction with database
            $object = new Usuariostipos($key, false); // instantiates the Active Record
            $object->delete(); // deletes the object from the database
            TTransaction::close(); // close the transaction

            $pos_action = new TAction([__class__, 'onReload']);
            new TMessage('info', TAdiantiCoreTranslator::translate('Record deleted'), $pos_action); // success message
        } catch (Exception $e) // in case of exception
        {
            new TMessage('error', $e->getMessage()); // shows the exception error message
            TTransaction::rollback(); // undo all pending operations
        }
    }

    /**
     * Save form data
     * @param $param Request
     */
    public function onSave($param)
    {
        try {
            TTransaction::open('sistemageral'); // open a transaction

            /**
            // Enable Debug logger for SQL operations inside the transaction
            TTransaction::setLogger(new TLoggerSTD); // standard output
            TTransaction::setLogger(new TLoggerTXT('log.txt')); // file
             **/

            $this->form->validate(); // validate form data
            $data = $this->form->getData(); // get form data as array

            $object = new Usuariostipos;  // create an empty object
            $object->fromArray((array)$data); // load the object with data
            $object->store(); // save the object
            
            // get the generated id
            $data->id = $object->id;

            $this->form->setData($data); // fill form data
            TTransaction::close(); // close the transaction

            new TMessage('info', TAdiantiCoreTranslator::translate('Record saved')); // success message
            $this->onReload(); // reload the listing
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
                TTransaction::open('sistemageral'); // open a transaction
                $object = new Usuariostipos($key); // instantiates the Active Record
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

    /**
     * method show()
     * Shows the page
     */
    public function show()
    {
        // check if the datagrid is already loaded
        if (!$this->loaded and (!isset($_GET['method']) or $_GET['method'] !== 'onReload')) {
            $this->onReload(func_get_arg(0));
        }
        parent::show();
    }
}
