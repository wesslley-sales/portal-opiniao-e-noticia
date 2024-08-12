<?php

namespace App\Enums;

enum FeaturedPositionPostEnum: string
{

    case NO = 'Não';
    case HEADLINE = 'Manchete';
    case SLIDESHOW = 'Destaque Slideshow';

    public static function getDescriptions(): array
    {
        return [
            ['value' => self::NO->name, 'description' => self::NO->value],
            ['value' => self::HEADLINE->name, 'description' => self::HEADLINE->value],
            ['value' => self::SLIDESHOW->name, 'description' => self::SLIDESHOW->value],
        ];
    }

    public static function fromName(string $name): string
    {
        foreach (self::cases() as $item) {
            if ($name === $item->name) {
                return $item->value;
            }
        }

        return false;
    }

}


