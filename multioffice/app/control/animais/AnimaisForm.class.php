<?php
/**
 * AnimaisForm Registration
 * @author  <your name here>
 */
class AnimaisForm extends TPage
{
    protected $form; // form
    
    use Adianti\Base\AdiantiStandardFormTrait; // Standard form methods
    
    /**
     * Class constructor
     * Creates the page and the registration form
     */
    function __construct()
    {
        parent::__construct();
        
        $this->setDatabase('multioffice');              // defines the database
        $this->setActiveRecord('Animais');     // defines the active record
        
        // creates the form
        $this->form = new BootstrapFormBuilder('form_Animais');
        //$this->form->setFormTitle('Animais');
        

        // create the form fields
        $id = new TEntry('id');
        $animal_nome = new TEntry('animal_nome');
        $animais_tipo = new TDBCombo('animais_tipo', 'multioffice', 'Animaistipos', 'id', 'animaistipos_nome');
        $animais_raca = new TDBCombo('animais_raca', 'multioffice', 'Animaisracas', 'id', 'raca_nome');
        $animal_foto = new TEntry('animal_foto');
        $animal_especial = new TRadioGroup('animal_especial');
        $animal_obs = new THtmlEditor('animal_obs');


        // add the fields
        $this->form->addFields( [ new TLabel('Id') ], [ $id ] );
        $this->form->addFields( [ new TLabel('Animal Nome') ], [ $animal_nome ] );
        $this->form->addFields( [ new TLabel('Animais Tipo') ], [ $animais_tipo ] );
        $this->form->addFields( [ new TLabel('Animais Raca') ], [ $animais_raca ] );
        $this->form->addFields( [ new TLabel('Animal Foto') ], [ $animal_foto ] );
        $this->form->addFields( [ new TLabel('Animal Especial') ], [ $animal_especial ] );
        $this->form->addFields( [ new TLabel('Animal Obs') ], [ $animal_obs ] );

        $animal_nome->addValidation('Animal Nome', new TRequiredValidator);
        $animais_tipo->addValidation('Animais Tipo', new TRequiredValidator);
        $animais_raca->addValidation('Animais Raca', new TRequiredValidator);


        // set sizes
        $id->setSize('100%');
        $animal_nome->setSize('100%');
        $animais_tipo->setSize('100%');
        $animais_raca->setSize('100%');
        $animal_foto->setSize('100%');
        $animal_especial->setSize('100%');
        $animal_obs->setSize('100%');


        
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
}
