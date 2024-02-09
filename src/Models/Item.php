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

    public static function find(int $id): ?Item
    {
        $dbCon = "not done yet";
        $db = $dbCon;

        $stmt = $db->prepare("SELECT * FROM items WHERE id = :id");
        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
        $stmt->execute();

        $data = $stmt->fetch(\PDO::FETCH_ASSOC);

        if (!$data) {
            return null;
        }

        $item = new Item();
        $item->name = $data['name'];
        $item->description = $data['description'];
        $item->brand = $data['brand'];
        $item->color = $data['color'];
        $item->checked = $data['checked'];
        $item->price = $data['price'];
        $item->availability = $data['availability'];

        return $item;
    }

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