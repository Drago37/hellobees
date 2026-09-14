<?php

declare(strict_types=1);

namespace HelloBees\Sales\Application\UseCase\PayCommand;

interface PayCommandPresenter
{
    public function present(PayCommandResponse $response): void;
}