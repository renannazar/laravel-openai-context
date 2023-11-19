<?php

namespace Renannazar\LaravelOpenaiContext\Services;

class Scraper
{
    public function get(string $url): array
    {
        $html = file_get_contents($url);

        preg_match('/<body[^>]*>(.*?)<\/body>/is', $html, $match);
        preg_match('/<title>(.*?)<\/title>/s', $html, $title);

        $content = $this->cleanHtml($match[1]);

        return [
            'title' => $title[1],
            'body' => $content,
        ];
    }

    public function cleanHtml(string $content): string
    {
        $content = preg_replace('/<script(.*?)>(.*?)<\/script>/is', '', $content);
        $content = preg_replace('/<style(.*?)>(.*?)<\/style>/is', '', $content);
        $content = preg_replace('/<form(.*?)>(.*?)<\/form>/is', '', $content);
        $content = preg_replace('/<footer(.*?)>(.*?)<\/footer>/is', '', $content);
        $content = preg_replace('/<header(.*?)>(.*?)<\/header>/is', '', $content);
        $content = preg_replace('/<nav(.*?)>(.*?)<\/nav>/is', '', $content);
        $content = preg_replace('/<span(.*?)>(.*?)<\/span>/is', '', $content);
        $content = preg_replace('/<noscript(.*?)>(.*?)<\/noscript>/is', '', $content);
        $content = preg_replace('/<link(.*?)>/is', '', $content);
        $content = preg_replace('/<img(.*?)>/is', '', $content);
        $content = preg_replace('/<!--(.*?)-->/is', '', $content);
        $content = preg_replace('/<center(.*?)>(.*?)<\/center>/is', '', $content);
        $content = preg_replace('/<ul(.*?)>(.*?)<\/ul>/is', '', $content);
        $content = str_replace(["\r", "\n", "\t"], ' ', $content);
        $content = strip_tags($content);

        $content = collect(explode(' ', $content))->filter()->values()->implode(' ');

        return $content;
    }
}