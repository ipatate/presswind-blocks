<?php

namespace GMTheme\Inc;

function get_xpath($string)
{
  if (! $string || $string === '') {
    return $string;
  }
  $document = new \DOMDocument();
  // hide error syntax warning
  libxml_use_internal_errors(true);
  $clean = htmlspecialchars_decode(iconv(
    'UTF-8',
    'ISO-8859-1',
    htmlentities($string, ENT_COMPAT, 'UTF-8')
  ), ENT_QUOTES);

  if ($clean == '') {
    return $string;
  }

  $document->loadHTML($clean);

  $xpath = new \DOMXpath($document);

  return [$xpath, $document];
}
