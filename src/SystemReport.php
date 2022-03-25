<?php

namespace gadixsystem\systeminformation;

class SystemReport
{
    private ?string $free = null;
    private ?string $used = null;
    private ?string $total = null;
    private ?string $freePercentage = null;
    private ?string $usedPercentage = null;
    private ?string $bufferPercentage = null;

    public function __construct(
        ?string $free = null,
        ?string $used = null,
        ?string $total = null,
        ?string $freePercentage = null,
        ?string $usedPercentage = null,
        ?string $bufferPercentage = null
    ) {
        $this->free = $free;
        $this->used = $used;
        $this->total = $total;
        $this->freePercentage = $freePercentage;
        $this->usedPercentage = $usedPercentage;
        $this->bufferPercentage = $bufferPercentage;
    }

    public function getFree(): ?string
    {
        return $this->free;
    }

    public function getUsed(): ?string
    {
        return $this->used;
    }

    public function getTotal(): ?string
    {
        return $this->total;
    }

    public function getFreePercentage(): ?string
    {
        return $this->freePercentage;
    }

    public function getUsedPercentage(): ?string
    {
        return $this->usedPercentage;
    }

    public function getBufferPercentage(): ?string
    {
        return $this->bufferPercentage;
    }
}
