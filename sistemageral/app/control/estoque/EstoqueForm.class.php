<?php
/**
 * EstoqueForm Form
 * @author  <your name here>
 */
class EstoqueForm extends TPage
{
    protected $form; // form
    
    /**
     * Form constructor
     * @param $param Request
     */
    public function __construct( $param )
    {
        parent::__construct();
        
        // creates the form
        $this->form = new BootstrapFormBuilder('form_Estoque');
        //$this->form->setFormTitle('Estoque');
        

        // create the form fields
        $id = new TEntry('id');
        $item_empresa = new TDBCombo('item_empresa', 'sistemageral', 'Empresas', 'id', 'empresa_uuid');
        $item_codigo = new TEntry('item_codigo');
        $item_EAN = new TEntry('item_EAN');
        $item_ativo = new TRadioGroup('item_ativo');
        $itemnome = new TEntry('itemnome');
        $item_quantidate_atual = new TEntry('item_quantidate_atual');
        $item_ultima_compra = new TDateTime('item_ultima_compra');
        $item_ultima_venda = new TDateTime('item_ultima_venda');
        $item_fornecedor = new TEntry('item_fornecedor');
        $item_obs = new THtmlEditor('item_obs');
        $item_obs->setSize('100%', 50);


        // add the fields
        $this->form->addFields( [ new TLabel('Id') ], [ $id ] );
        $this->form->addFields( [ new TLabel('Empresa') ], [ $item_empresa ] );
        $this->form->addFields( [ new TLabel('Codigo') ], [ $item_codigo ] );
        $this->form->addFields( [ new TLabel('EAN') ], [ $item_EAN ] );
        $this->form->addFields( [ new TLabel('Ativo?') ], [ $item_ativo ] );
        $this->form->addFields( [ new TLabel('Nome') ], [ $itemnome ] );
        $this->form->addFields( [ new TLabel('Quantidate Atual') ], [ $item_quantidate_atual ] );
        $this->form->addFields( [ new TLabel('Ultima Compra') ], [ $item_ultima_compra ] );
        $this->form->addFields( [ new TLabel('Ultima Venda') ], [ $item_ultima_venda ] );
        $this->form->addFields( [ new TLabel('Fornecedor') ], [ $item_fornecedor ] );
        $this->form->addFields( [ new TLabel('Obs') ], [ $item_obs ] );

        $item_empresa->addValidation('Empresa', new TRequiredValidator);


        // set sizes
        $id->setSize('100%');
        $item_empresa->setSize('100%');
        $item_codigo->setSize('100%');
        $item_EAN->setSize('100%');
        $itemnome->setSize('100%');
        $item_quantidate_atual->setSize('100%');

        $item_ultima_compra->setSize('100%');
        $item_ultima_compra->setMask('dd/mm/yyyy hh:ii');
        $item_ultima_compra->setDatabaseMask('yyyy-mm-dd hh:ii');

        $item_ultima_venda->setSize('100%');
        $item_ultima_venda->setMask('dd/mm/yyyy hh:ii');
        $item_ultima_venda->setDatabaseMask('yyyy-mm-dd hh:ii');

        $item_fornecedor->setSize('100%');
        $item_obs->setSize('100%');
        $item_ativo->setLayout('horizontal');
        $item_ativo->addItems(array('0'=>'Inativo', '1'=>'Ativo'));
        $item_ativo->setUseButton();
        
        
        if (!empty($id))
        {
            $id->setEditable(FALSE);
        }
        
        /** samples
         $fieldX->addValidation( 'Field X', new TRequiredValidator ); // add validation
         $fieldX->setSize( '100%' ); // set size
         **/
         
        // create the form actions
        $btn = $this->form->addAction(_t('Save'), new TAction([$this, 'onSave']), 'fa:floppy-o');
        $btn->class = 'btn btn-sm btn-primary';
        $this->form->addAction(_t('New'),  new TAction([$this, 'onEdit']), 'fa:eraser red');
        
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
    public function onSave( $param )
    {
        try
        {
            TTransaction::open('sistemageral'); // open a transaction
            
            /**
            // Enable Debug logger for SQL operations inside the transaction
            TTransaction::setLogger(new TLoggerSTD); // standard output
            TTransaction::setLogger(new TLoggerTXT('log.txt')); // file
            **/
            
            $this->form->validate(); // validate form data
            $data = $this->form->getData(); // get form data as array
            
            $object = new Estoque;  // create an empty object
            $object->fromArray( (array) $data); // load the object with data
            $object->store(); // save the object
            
            // get the generated id
            $data->id = $object->id;
            
            $this->form->setData($data); // fill form data
            TTransaction::close(); // close the transaction
            
            new TMessage('info', TAdiantiCoreTranslator::translate('Record saved'));
        }
        catch (Exception $e) // in case of exception
        {
            new TMessage('error', $e->getMessage()); // shows the exception error message
            $this->form->setData( $this->form->getData() ); // keep form data
            TTransaction::rollback(); // undo all pending operations
        }
    }
    
    /**
     * Clear form data
     * @param $param Request
     */
    public function onClear( $param )
    {
        $this->form->clear(TRUE);
    }
    
    /**
     * Load object to form data
     * @param $param Request
     */
    public function onEdit( $param )
    {
        try
        {
            if (isset($param['key']))
            {
                $key = $param['key'];  // get the parameter $key
                TTransaction::open('sistemageral'); // open a transaction
                $object = new Estoque($key); // instantiates the Active Record
                $this->form->setData($object); // fill the form
                TTransaction::close(); // close the transaction
            }
            else
            {
                $this->form->clear(TRUE);
            }
        }
        catch (Exception $e) // in case of exception
        {
            new TMessage('error', $e->getMessage()); // shows the exception error message
            TTransaction::rollback(); // undo all pending operations
        }
    }
}
