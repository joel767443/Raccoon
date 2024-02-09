<?php

namespace WebApp\Models;
class Item extends Model
{
    public $name;
    public $description;
    public $brand;
    public $color;
    public $checked;
    public $price;
    public $availability;

    public function rules(): array
    {
        return [
            'name' => [self::RULE_REQUIRED, self::IS_INT],
            'description' => [self::RULE_REQUIRED, self::IS_STRING],
            'brand' => [self::RULE_REQUIRED],
            'price' => [self::RULE_REQUIRED],
            'availability' => [self::RULE_REQUIRED, self::IS_INT],
        ];
    }
}