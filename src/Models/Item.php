<?php

namespace WebApp\Models;
/**
 *
 */
class Item extends Model
{
    /**
     * @var
     */
    public $name;
    /**
     * @var
     */
    public $description;
    /**
     * @var
     */
    public $brand;
    /**
     * @var
     */
    public $color;
    /**
     * @var
     */
    public $checked;
    /**
     * @var
     */
    public $price;
    /**
     * @var
     */
    public $availability;

    /**
     * @param int $id
     * @return Item|null
     */
    public static function find(int $id): ?Item
    {
        $dbCon = "not done yet";
        $db = $dbCon;

        $stmt = $db->prepare("SELECT * FROM items WHERE id = :id");
        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
        $stmt->execute();

        $item = $stmt->fetch(\PDO::FETCH_ASSOC);

        if (!$item) {
            return null;
        }

        return $item;
    }

    /**
     * @param array $data
     * @return string|void
     */
    public static function update(array $data)
    {
        $dbCon = 'not yet';

        $item = Item::find($data['id']);

        if ($item) {
            $item->name = $data['name'];
            $item->description = $data['description'];
            $item->brand = $data['brand'];
            $item->color = $data['color'];
            $item->checked = $data['checked'];
            $item->price = $data['price'];
            $item->availability = $data['availability'];

            // Perform the update
            $stmt = $dbCon->prepare("UPDATE items SET 
                name = :name,
                description = :description,
                brand = :brand,
                color = :color,
                checked = :checked,
                price = :price,
                availability = :availability
                WHERE id = :id");

            $stmt->bindParam(':id', $data['id'], \PDO::PARAM_INT);
            $stmt->bindParam(':name', $item->name);
            $stmt->bindParam(':description', $item->description);
            $stmt->bindParam(':brand', $item->brand);
            $stmt->bindParam(':color', $item->color);
            $stmt->bindParam(':checked', $item->checked);
            $stmt->bindParam(':price', $item->price);
            $stmt->bindParam(':availability', $item->availability);

            $stmt->execute();

            return self::class;
        }
    }

    /**
     * @return array[]
     */
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