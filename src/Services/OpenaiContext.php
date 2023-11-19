<?php

namespace Renannazar\LaravelOpenaiContext\Services;

class OpenaiContext
{
    protected Scraper $scraper;
    protected Ai $ai;

    public function __construct(Scraper $scraper,  Ai $ai) {
        $this->scraper = $scraper;
        $this->ai = $ai;
    }

    public function askContextByUrl($url, $question) {
        $scraper = $this->scraper->get($url);
        $word = $scraper['body'];
        $ai = $this->ai->askQuestionByContext($word, $question);
        
        $array = array(
            'title' => $scraper['title'],
            'body' => $word,
            'content' => $ai,
            'question' => $question
        );

        return $array;
    }

    public function askContextByText($text, $question) {
        $ai = $this->ai->askQuestionByContext($text, $question);

        $array = array(
            'title' => '',
            'body' => $text,
            'content' => $ai,
            'question' => $question
        );

        return $array;
    }
}