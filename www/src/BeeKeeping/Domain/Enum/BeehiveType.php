<?php

declare(strict_types=1);

namespace HelloBees\BeeKeeping\Domain\Enum;

enum BeehiveType: string
{
    case Dadant = 'dadant';
    case Warre = 'warre';
    case Langstroth = 'langstroth';
    case Voirnot = 'voirnot';
}