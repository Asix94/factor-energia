<?php

declare(strict_types=1);

namespace App\Service;

use App\Exception\QuestionNotFoundException;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class Questions
{
    private string $uri;
    private string $site;
    protected HttpClientInterface $httpClient;
    protected Filters $filters;

    public function __construct(string $uri, string $site, HttpClientInterface $httpClient, Filters $filters)
    {
        $this->uri = $uri;
        $this->site = $site;
        $this->httpClient = $httpClient;
        $this->filters = $filters;
    }

    public function requestQuestions(): array
    {
        $response = $this->httpClient->request('GET', $this->uri, [
            'query' => $this->getParams()
        ]);

        if (200 !== $response->getStatusCode()) {
            throw QuestionNotFoundException::errorCode();
        }

        return $response->toArray();
    }

    public function getParams(): array
    {
        return [
            'site' => $this->filters->getSite(),
            'tagged' => $this->filters->getTagged(),
            'todate' => $this->filters->getToDate(),
            'fromdate' => $this->filters->getFromDate()
        ];
    }


    public function addFilters(string $tagged, ?string $toDate, ?string $fromDate,): void
    {
        $this->filters->setSite($this->site);
        $this->filters->setTagged($tagged);
        $this->filters->setToDate($toDate);
        $this->filters->setFromDate($fromDate);
    }
}
