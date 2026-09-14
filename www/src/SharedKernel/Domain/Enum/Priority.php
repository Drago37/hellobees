<?php

namespace HelloBees\SharedKernel\Domain\Enum;

enum Priority: int
{
    case High = 0;
    case Medium = 1;
    case Low = 2;
}
