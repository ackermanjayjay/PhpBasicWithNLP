<?php
require_once __DIR__ . '/vendor/autoload.php';

use Phpml\FeatureExtraction\TokenCountVectorizer;
use Phpml\Tokenization\WhitespaceTokenizer;
use Sastrawi\StopWordRemover\StopWordRemoverFactory;
use Sastrawi\Stemmer\StemmerFactory;

// Preprocessing text 
// Stemming
$stemmerFactory =  new StemmerFactory();
$stemmer = $stemmerFactory->createStemmer();

// Stopwords removal
$stopWordRemoverFactory = new StopWordRemoverFactory();
$stopword = $stopWordRemoverFactory->createStopWordRemover();


// Weight Word
$vectorizer = new TokenCountVectorizer(new WhitespaceTokenizer());

function processingText($text)
{
    global $stemmer, $stopword;
    $text = strtolower($text);
    $text = $stemmer->stem($text);
    $text = $stopword->remove($text);
    return $text;
}
/*
function weightedText($text)
{

}
*/
