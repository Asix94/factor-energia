<?php

declare(strict_types=1);

namespace App\Controller;

use App\Exception\QuestionNotFoundException;
use App\Service\Questions;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class QuestionController extends AbstractController
{
    public function question(string $tagged, Request $request, Questions $question): Response
    {
        try {
            $question->addFilters(
                $tagged,
                $request->query->get('todate'),
                $request->query->get('fromdate')
            );

            return $this->json(['success' => true, 'data' => $question->requestQuestions()], Response::HTTP_OK);
        } catch (QuestionNotFoundException $e) {
            return $this->json(['fail' => false, 'errors' => $e->getMessage()], Response::HTTP_NOT_FOUND);
        }
    }
}
