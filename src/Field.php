<?php
namespace atk4\countries;

/**
 * Implements field for your own models that reference
 * country.
 *
 * $user->add(new \atk4\countries\Field());
 */
class Field extends \atk4\data\Relation_SQL_One {

    public $link = 'country_id';
    public $model = 'atk4/countries/Model';

    function init() {
        parent::init();
        $this->addField('country', 'name');
    }
}
