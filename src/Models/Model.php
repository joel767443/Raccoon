<?php

namespace WebApp\Models;

abstract class Model
{
    public array $errors = [];
    public const RULE_REQUIRED = 'required';
    public const IS_INT = 'is int';
    public const IS_FLOAT = 'is float';
    public const IS_STRING = 'is string';

    public function loadData($data)
    {
        foreach ($data as $property => $value) {
            if (property_exists($this, $property)) {
                $this->{$property} = $value;
            }
        }
    }

    abstract public function rules(): array;

    public function validate(): bool
    {
        foreach ($this->rules() as $attribute => $rules) {

            $value = $this->$attribute;

            foreach ($rules as $rule) {

                $ruleName = $rule;

                if (!is_string($ruleName)) {
                    $ruleName = $rule[0];
                }

                if ($ruleName === self::RULE_REQUIRED && !$value) {
                    $this->addError($attribute, self::RULE_REQUIRED);
                }

                if ($ruleName === self::IS_INT && !is_int($value)) {
                    $this->addError($attribute, self::IS_INT);
                }
                if ($ruleName === self::IS_FLOAT && !is_float($value)) {
                    $this->addError($attribute, self::IS_FLOAT);
                }
                if ($ruleName === self::IS_STRING && !is_string($value)) {
                    $this->addError($attribute, self::IS_STRING);
                }
            }
        }

        return empty($this->errors);
    }

    public function create()
    {

    }

    private function addError(string $attribute, string $rule)
    {
        $message = $this->errorMessages()[$rule] ?? '';

        $this->errors[$attribute][] = $message;
    }

    public function errorMessages(): array
    {
        return [
            self::RULE_REQUIRED => 'This field is required.',
            self::IS_INT => 'This field must be an integer.',
            self::IS_FLOAT => 'This field must be a float.',
            self::IS_STRING => 'This field must be a string.',
        ];
    }
}