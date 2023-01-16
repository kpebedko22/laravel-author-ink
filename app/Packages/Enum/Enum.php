<?php

namespace App\Packages\Enum;

use App\Packages\Enum\Casts\EnumCast;
use App\Packages\Enum\Concerns\HasAttributes;
use App\Packages\Enum\Concerns\HasLanguage;
use App\Packages\Enum\Concerns\Selectable;
use App\Packages\Enum\Exceptions\EnumNotFound;
use Illuminate\Contracts\Database\Eloquent\Castable;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Collection;

abstract class Enum implements Arrayable, Castable
{
    use HasAttributes,
        HasLanguage,
        Selectable;

    protected string $primaryKey = 'id';

    protected array $fillable = [];

    protected abstract static function getEnumDefinition(): array;

    protected function __construct(array $data = [])
    {
        $this->fill($data);
    }

    public function getFillable(): array
    {
        return $this->fillable;
    }

    protected function isFillable(string $key): bool
    {
        if (in_array($key, $this->getFillable())) {
            return true;
        }

        return false;
    }

    public static function all(): Collection
    {
        $definition = static::getEnumDefinition();

        $collection = collect();

        foreach ($definition as $item) {
            $collection->add(
                (new static($item))
            );
        }

        return $collection;
    }

    public static function find(mixed $id)
    {
        $definition = static::getEnumDefinition();
        $primaryKey = (new static)->getKeyName();

        $items = array_filter(
            $definition,
            fn(array $item) => $item[$primaryKey] == $id
        );

        if (count($items)) {
            $data = array_shift($items);

            return new static($data);
        }

        return null;
    }

    public static function findOrFail(mixed $id)
    {
        $item = static::find($id);

        if (!$item) {
            throw new EnumNotFound(sprintf(
                "Enum item not found for [%s = %s] in [%s]",
                (new static)->primaryKey, $id, static::class,
            ));
        }

        return $item;
    }

    public function fill(array $attributes)
    {
        foreach ($attributes as $key => $value) {
            if ($this->isFillable($key)) {
                $this->setAttribute($key, $value);
            }
        }
    }

    public function toArray(): array
    {
        return $this->attributesToArray();
    }

    public function getKeyName(): string
    {
        return $this->primaryKey;
    }

    public function getKey()
    {
        return $this->getAttribute($this->getKeyName());
    }

    public function __get(string $key)
    {
        return $this->getAttribute($key);
    }

    public function __set(string $key, mixed $value)
    {
        $this->setAttribute($key, $value);
    }

    public static function isPrimaryKeyAvailable(mixed $id): bool
    {
        $keys = static::availablePrimaryKeys();

        return in_array($id, $keys, true);
    }

    public static function availablePrimaryKeys(): array
    {
        $definition = static::getEnumDefinition();
        $primaryKey = (new static)->getKeyName();

        return array_map(
            fn(array $item) => array_column($item, $primaryKey),
            $definition
        );
    }

    public static function parseDatabase(mixed $value): mixed
    {
        return $value;
    }

    public static function serializeDatabase(mixed $value): mixed
    {
        if ($value instanceof self) {
            return $value->getKey();
        }

        return $value;
    }

    public static function castUsing(array $arguments): EnumCast
    {
        return new EnumCast(static::class);
    }
}
