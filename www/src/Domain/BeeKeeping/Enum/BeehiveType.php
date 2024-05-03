<?php

declare(strict_types=1);

namespace HelloBees\Domain\BeeKeeping\Enum;

/**
 * Class
 * @class BeehiveType
 * @package HelloBees\Domain\BeeKeeping\Enum
 */
enum BeehiveType: string
{
    case Dadant = 'dadant';
    case Warre = 'warre';
    case Langstroth = 'langstroth';
    case Voirnot = 'voirnot';
}