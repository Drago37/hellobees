<?php

declare(strict_types=1);

namespace HelloBees\Domain\Trace\UseCase\ShowTraces;

/**
 * Class
 *
 * @class ShowTracesRequest
 * @package HelloBees\Domain\Trace\UseCase\ShowTraces
 */
class ShowTracesRequest
{
    /**
     * ShowTracesRequest constructor
     *
     * @param string $byApiaryId
     * @param string $byBeehiveId
     * @param string $byBeeKeeperId
     */
    public function __construct(
        private string $byApiaryId,
        private string $byBeehiveId,
        private string $byBeeKeeperId
    )
    {
    }

    /**
     * @return string
     */
    public function getByApiaryId(): string
    {
        return $this->byApiaryId;
    }

    /**
     * @param string $byApiaryId
     * @return ShowTracesRequest
     */
    public function setByApiaryId(string $byApiaryId): ShowTracesRequest
    {
        $this->byApiaryId = $byApiaryId;
        return $this;
    }

    /**
     * @return string
     */
    public function getByBeehiveId(): string
    {
        return $this->byBeehiveId;
    }

    /**
     * @param string $byBeehiveId
     * @return ShowTracesRequest
     */
    public function setByBeehiveId(string $byBeehiveId): ShowTracesRequest
    {
        $this->byBeehiveId = $byBeehiveId;
        return $this;
    }

    /**
     * @return string
     */
    public function getByBeeKeeperId(): string
    {
        return $this->byBeeKeeperId;
    }

    /**
     * @param string $byBeeKeeperId
     * @return ShowTracesRequest
     */
    public function setByBeeKeeperId(string $byBeeKeeperId): ShowTracesRequest
    {
        $this->byBeeKeeperId = $byBeeKeeperId;
        return $this;
    }

}