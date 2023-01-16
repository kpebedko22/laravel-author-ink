<?php

namespace App\Packages\Enum\Examples;

use App\Packages\Enum\Enum;
use Illuminate\Support\Collection;

/**
 * @property int $id
 * @property string $name
 *
 * @method static UserTypeEnum[]|Collection all()
 * @method static UserTypeEnum find(mixed $id)
 * @method static UserTypeEnum findOrFail(mixed $id)
 */
class UserTypeEnum extends Enum
{
    const ADMIN = 1;
    const USUAL_USER = 2;
    const MANAGER = 3;

    protected ?string $optionLabel = 'name';

    protected array $fillable = [
        'id',
        'name',
    ];

    protected static function getEnumDefinition(): array
    {
        return [
            [
                'id' => self::ADMIN,
                'name' => 'admin',
            ],
            [
                'id' => self::USUAL_USER,
                'name' => 'usual',
            ],
            [
                'id' => self::MANAGER,
                'name' => 'manager',
            ],
        ];
    }

    public function getNameAttribute(string $value): string
    {
        return __($value, [], $this->language);
    }

    public function setNameAttribute(string $value)
    {
        $this->attributes['name'] = 'enum/user_type.' . $value;
    }
}
