<?php

namespace backend\classes\helpers;

class Validator
{
    protected static $errors = [];
    protected static $rules_list = ['required', 'min', 'max', 'email', 'match'];
    protected static $messages = [
        'required' => 'The :fieldname: field is required',
        'min' => 'The :fieldname: field must be a minimun :rulevalue: characters',
        'max' => 'The :fieldname: field must be a maximum :rulevalue: characters',
        'email' => 'Not valid email',
        'match' => 'The :fieldname: field must match :rulevalue: field',
    ];

    public static function validate($rules, $data_items = [])
    {
        foreach ($data_items as $fieldname => $value) {
            if (in_array($fieldname, array_keys($rules))) {
                self::check([
                    'fieldname' => $fieldname,
                    'value' => $value,
                    'rules' => $rules[$fieldname],
                ], $data_items);
            }
        }
        return new static;
    }

    protected static function check($field, $data_items)
    {
        foreach ($field['rules'] as $rule => $rule_value) {
            if (in_array($rule, self::$rules_list)) {
                if (!call_user_func_array([self::class, $rule], [$field['value'], $rule_value, $data_items])) {
                    self::addError(
                        $field['fieldname'],
                        str_replace(
                            [':fieldname:', ':rulevalue:'],
                            [$field['fieldname'], $rule_value],
                            self::$messages[$rule]
                        )
                    );
                }
            }
        }
    }

    protected static function addError($fieldname, $error)
    {
        self::$errors[$fieldname][] = $error;
    }

    public function getErrors()
    {
        return self::$errors;
    }

    public function hasErrors(): bool
    {
        return !empty(self::$errors);
    }

    protected static function required($value, $rule_value, $data_items): bool
    {
        return !empty(trim($value));
    }

    protected static function min($value, $rule_value, $data_items): bool
    {
        return mb_strlen($value, 'UTF-8') >= $rule_value;
    }

    protected static function max($value, $rule_value, $data_items): bool
    {
        return mb_strlen($value, 'UTF-8') <= $rule_value;
    }

    protected static function email($value, $rule_value, $data_items)
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }

    protected static function match($value, $rule_value, $data_items): bool
    {
        return $value === $data_items[$rule_value];
    }
}
