# Filters

Filters in ORM work much like they used to when they were part of the Validate class in 3.0.x however they have been modified to match the flexible syntax of [Validation] rules in 3.1.x. Filters run as soon as the field is set in your model and should be used to format the data before it is inserted into the Database.

Define your filters the same way you define rules, as an array returned by the `ORM::filters()` method like the following:

	public function filters()
	{
		return array(
			'username' => array(
				array('trim'),
			),
			'password' => array(
				array(array($this, 'hash_password')),
			),
			'created_on' => array(
				array('Format::date', array(':value', 'Y-m-d H:i:s')),
			),
		);
	}

[!!] When defining filters, you may use the parameters `:value`, `:field`, and `:model` to refer to the field value, field name, and the model instance respectively.
