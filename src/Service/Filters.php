<?php

declare(strict_types=1);

namespace App\Service;

class Filters
{
    private string $site;
    private string $tagged;
    private ?string $toDate;
    private ?string $fromDate;

    public function getSite(): string
    {
        return $this->site;
    }


    public function setSite(string $site): void
    {
        $this->site = $site;
    }


    public function getTagged(): string
    {
        return $this->tagged;
    }


    public function setTagged(string $tagged): void
    {
        $this->tagged = $tagged;
    }

    public function getToDate(): ?string
    {
        return $this->toDate;
    }


    public function setToDate(?string $toDate): void
    {
        $this->toDate = $toDate;
    }


    public function getFromDate(): ?string
    {
        return $this->fromDate;
    }


    public function setFromDate(?string $fromDate): void
    {
        $this->fromDate = $fromDate;
    }
}
