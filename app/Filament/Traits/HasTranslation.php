<?php

namespace App\Filament\Traits;

trait HasTranslation
{
    public static function getTranslateModelName(): string
    {
        return 'example';
    }

    public static function getTranslatePath(): string
    {
        return 'admin/model/';
    }

    public static function getComponentLabelKey(): string
    {
        return 'common';
    }

    public static function getComponentPlaceholderKey(): string
    {
        return 'placeholder';
    }

    protected static function trans(array $items, bool $transPlaceholder = true, string $additional = ''): array
    {
        $transPath = self::getTranslatePath() . self::getTranslateModelName();
        $labelKey = self::getComponentLabelKey();
        $placeholderKey = self::getComponentPlaceholderKey();

        return collect($items)
            ->each(function ($item) use ($transPath, $labelKey, $placeholderKey) {
                $item->translate($transPath, $labelKey, $placeholderKey);
            })
            ->toArray();
    }

    public static function emptyPlaceholder(?string $placeholder): string
    {
        return $placeholder ?? '-';
    }

    public static function transFor(string $item, array $replace = []): string
    {
        return __(self::getTranslatePath() . static::getTranslateModelName() . '.' . $item, $replace);
    }

    public static function getLabel(): ?string
    {
        return __(self::getTranslatePath() . static::getTranslateModelName() . '.label.main');
    }

    public static function getPluralLabel(): ?string
    {
        return static::getLabel();
    }

    public static function getModelLabel(): string
    {
        return static::getLabel();
    }

    public static function getPluralModelLabel(): string
    {
        return static::getLabel();
    }

    public static function getNavigationLabel(): string
    {
        return static::getLabel();
    }

    public static function getBreadcrumb(): string
    {
        return static::getLabel();
    }
}
