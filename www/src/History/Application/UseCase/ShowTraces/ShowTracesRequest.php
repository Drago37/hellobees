<?php

declare(strict_types=1);

namespace HelloBees\History\Application\UseCase\ShowTraces;

class ShowTracesRequest
{
    public function __construct(
        private string $byApiaryId,
        private string $byBeehiveId,
        private string $byBeeKeeperId
    )
    {
    }

    public function getByApiaryId(): string
    {
        return $this->byApiaryId;
    }

    public function setByApiaryId(string $byApiaryId): ShowTracesRequest
    {
        $this->byApiaryId = $byApiaryId;
        return $this;
    }

    public function getByBeehiveId(): string
    {
        return $this->byBeehiveId;
    }

    public function setByBeehiveId(string $byBeehiveId): ShowTracesRequest
    {
        $this->byBeehiveId = $byBeehiveId;
        return $this;
    }

    public function getByBeeKeeperId(): string
    {
        return $this->byBeeKeeperId;
    }

    public function setByBeeKeeperId(string $byBeeKeeperId): ShowTracesRequest
    {
        $this->byBeeKeeperId = $byBeeKeeperId;
        return $this;
    }

}