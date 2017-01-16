<?php
namespace atk4\countries;

/**
 * Implements a model that you can use in your application. Can be associated with SQL or NoSQL
 * persistences.
 */
class Model extends \atk4\data\Model {
    public $table = 'country';

    function init()
    {
        parent::init();

        $this->addField('name', ['actual'=>'nicename']);

        /**
         * You can use id_field = 'iso' if you do not wish to use numeric ID field.
         */
        if (!$this->hasElement('iso')) {
            $this->addField('iso', ['caption'=>'ISO']);
        }

        $this->addField('iso3', ['caption'=>'ISO3']);
        $this->addField('numcode', ['caption'=>'ISO Numeric Code']);
        $this->addField('phonecode', ['caption'=>'Phone Prefix']);
    }
}
