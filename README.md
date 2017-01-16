# Agile Country - data source, field type and drop-down

**List of countries along with Agile Data model**

This package contains list of countries that you can easily import and use. This also includes Agile Data model definiton and examples on how you can integrate it with your database schema. 

Finally you'll find a easy-to-use country selection drop-down.

## Install from Composer

```
composer require atk4/country
```

Next you need to set up database (MySQL)

``` shell
mysql yourdb < country.sql
```

Alternatively with SQLite

``` shell
sqlite countries.db < country.sql
```

## Integration with your Models

If you are using MySQL and you have a table that contains "country_id", you can define the field like this:

``` php
$model->add(new \atk4\country\Field());
```

This will define 2 new fields: "country_id" and "country", that will automatically resolve to the country name when querying.

## Customising your Model

You can create your own country-table modification. For example, let's add "default_currency_id" field in your table:

``` php
class Country extends \atk4\country\Model {
  
    public $table = 'my_country_table'; // customize country table
  
    function init() {
    	parent::init();
      
      	// Add new fields,
      	$this->hasOne('default_currency_id', new Currency());
      
        $this->getElement('iso3')->destroy(); // remove fields that don't exist,
      
        $this->getElement('name')->actual = null; // or remove mapping to "nicename"
    }
}
```

Now that you have defined 'Country' model in your OWN namespace you'll have to use it with the field like this:

``` php
$model->add(new \atk4\country\Field('model'=>new Country()));
```

## Use with Agile UI

Agile UI framework is recommended by composer. If you are using Agile UI there is a handy Dropdown that comes with country flags:

``` php
$layout->add(new \atk4\country\Dropdown());
```

If you wish to use it with your own model:

``` php
$layout->add(new \atk4\country\Dropdown())
  	->setModel(new Country($db));
```

If you have used 'Field' class, it will automatically use the Dropdown inside the form, but if you wish to manually specify to use country drop-down, use:

``` php
$model->hasMany('country_id', new Country());
$model->getElement('country_id')->ui['form']['field'] = new \atk4\country\FormField\Dropdown();
```