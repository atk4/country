<?php

namespace atk4\countries;

class Dropdown extends \atk4\ui\Dropdown {

    /**
     * Modifies drop-down to include country flags
     */
    function renderView() {
        $this->t_row = new \atk4\ui\Template('<div class="item" data-value="{$iso}"><i class="{$iso} flag"></i>{$name}</div>\n');

        /*
         * If model for this drop-down is not set, then read the data from bundled CSV file
         */
        if (!$this->model) {
            $data = new \atk4\data\Persistence_CSV(dirname(__FILE__).'../countries.csv');
            $country = new \atk4\data\Model([$data, 'id_field'=>'iso']);
            $country->addField('name');
            $this->setModel($country);
        }

        return parent::renderView();
    }
}
