<?php

namespace App\Enums;

enum FeaturedPositionPostEnum: string
{

    case NO = 'Não';
    case HEADLINE = 'Manchete';
    case SLIDESHOW = 'Destaque Slideshow';
    case FEATURED_PHOTO = 'Destaque foto';
    case HIGHLIGHTED = 'Em Destaque';

    public static function getDescriptions(): array
    {
        return [
            ['value' => self::NO->name, 'description' => self::NO->value],
            ['value' => self::HEADLINE->name, 'description' => self::HEADLINE->value],
            ['value' => self::SLIDESHOW->name, 'description' => self::SLIDESHOW->value],
            ['value' => self::HIGHLIGHTED->name, 'description' => self::HIGHLIGHTED->value],
//            ['value' => self::FEATURED_PHOTO->name, 'description' => self::FEATURED_PHOTO->value],
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


