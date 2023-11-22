<?php

use Adianti\Widget\Util\TImage;
use Adianti\Widget\Form\TFile;

/**
 * AnimaisForm Form
 * @author  <your name here>
 */
class AnimaisForm extends TPage
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
        $this->form = new BootstrapFormBuilder('form_Animais');
        //$this->form->setFormTitle('Animais');


        // create the form fields
        $id = new TEntry('id');
        $animal_especial = new TRadioGroup('animal_especial');
        $animal_nome = new TEntry('animal_nome');
        $animais_tipo = new TDBCombo('animais_tipo', 'sistemageral', 'Animaistipos', 'id', 'animaistipos_nome');
        $animais_raca = new TDBCombo('animais_raca', 'sistemageral', 'Animaisracas', 'id', 'animaisraca_nome');
        $animal_foto = new TFile('animal_foto');
        $animal_obs = new THtmlEditor('animal_obs');

        $animal_foto->setAllowedExtensions(['gif', 'png', 'jpg', 'jpeg']);
        $animal_foto->enableFileHandling();

        // add the fields
        $this->form->addFields( [new TLabel('Id')], [$id],
                                [new TLabel('Especial')],[$animal_especial]);
        $this->form->addFields( [new TLabel('Nome')], [$animal_nome]);
        $this->form->addFields( [new TLabel('Tipo')], [$animais_tipo],
                                [new TLabel('Raca')], [$animais_raca]);
        $this->form->addFields( [new TLabel('Obs')], [$animal_obs]);

        $this->form->addContent([new TFormSeparator('Arquivos')]);
        $this->form->addFields( [new TImage('Foto')], [$animal_foto]);

        // set sizes
        $id->setSize('100%');
        $animal_nome->setSize('100%');
        $animais_tipo->setSize('100%');
        $animais_raca->setSize('100%');
        $animal_foto->setSize('100%');
        $animal_obs->setSize('100%', 50);
        $animal_especial->addItems(array('0' => 'Não', '1' => 'Sim'));
        $animal_especial->setLayout('horizontal');
        $animal_especial->setUseButton();
        $animal_especial->setSize('100%');


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

            $object = new Animais;  // create an empty object
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
                TTransaction::open('sistemageral'); // open a transaction
                $object = new Animais($key); // instantiates the Active Record
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
