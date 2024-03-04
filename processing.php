<?php
require_once __DIR__ . '/vendor/autoload.php';

use Phpml\FeatureExtraction\TokenCountVectorizer;
use Phpml\Tokenization\WhitespaceTokenizer;

$stopWordRemoverFactory = new \Sastrawi\StopWordRemover\StopWordRemoverFactory();
$stopwords_indonesia = $stopWordRemoverFactory->createStopWordRemover();
$vectorizer = new TokenCountVectorizer(new WhitespaceTokenizer());

function processingText($text)
{
}

function weightedText($text)
{
}
