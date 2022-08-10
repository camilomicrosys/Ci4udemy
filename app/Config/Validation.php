<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation
{
    //--------------------------------------------------------------------
    // Setup
    //--------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    //--------------------------------------------------------------------
    // Rules
    //--------------------------------------------------------------------
 // entonces le estoy haciendo validacion en l ruta new/create  a los campos que le mando
    public $crearNews=[
            'title'=>'required|min_length[3]|max_length[8]',
            'description'=>'required|min_length[3]|max_length[8]',
            'id_categoria'=>'required',

        ];
         public $crearNews_errors = [
        'title' => [
            'required'    => 'Debes diligenciar el titulo para poder continuar.',
            'min_length'=>'Debes diligenciar al menos 3 caracteres para continuar',
            'max_length'=>'No puedes superar los 8 caracteres'
        ],
        'description'    => [
            'required'    => 'Debes diligenciar el titulo para poder continuar.',
            'min_length'=>'Debes diligenciar al menos 3 caracteres para continuar',
            'max_length'=>'No puedes superar los 8 caracteres'
        ],
    ];
}
