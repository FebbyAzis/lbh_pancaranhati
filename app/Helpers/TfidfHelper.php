<?php

namespace App\Helpers;

class TfidfHelper
{
    // Tokenisasi sederhana
    public static function tokenize($text)
    {
        $text = strtolower(strip_tags($text));
        $text = preg_replace('/[^a-z0-9\s]/', '', $text);
        return array_filter(explode(' ', $text));
    }

    // Hitung Term Frequency
    public static function termFrequency($tokens)
    {
        $tf = [];
        $total = count($tokens);
        foreach ($tokens as $word) {
            $tf[$word] = ($tf[$word] ?? 0) + 1;
        }
        foreach ($tf as $word => $count) {
            $tf[$word] = $count / $total;
        }
        return $tf;
    }

    // Hitung IDF dari semua dokumen
    public static function inverseDocumentFrequency($documents)
    {
        $idf = [];
        $N = count($documents);
        foreach ($documents as $tokens) {
            $unique = array_unique($tokens);
            foreach ($unique as $word) {
                $idf[$word] = ($idf[$word] ?? 0) + 1;
            }
        }
        foreach ($idf as $word => $df) {
            $idf[$word] = log($N / ($df));
        }
        return $idf;
    }

    // Hitung TF-IDF vektor
    public static function tfidfVector($tf, $idf)
    {
        $vec = [];
        foreach ($idf as $word => $idfVal) {
            $vec[$word] = ($tf[$word] ?? 0) * $idfVal;
        }
        return $vec;
    }

    // Cosine Similarity
    public static function cosineSimilarity($vec1, $vec2)
    {
        $dot = 0;
        $mag1 = 0;
        $mag2 = 0;
        $all_keys = array_unique(array_merge(array_keys($vec1), array_keys($vec2)));
        foreach ($all_keys as $key) {
            $v1 = $vec1[$key] ?? 0;
            $v2 = $vec2[$key] ?? 0;
            $dot += $v1 * $v2;
            $mag1 += $v1 ** 2;
            $mag2 += $v2 ** 2;
        }
        return ($mag1 && $mag2) ? $dot / (sqrt($mag1) * sqrt($mag2)) : 0;
    }
}
