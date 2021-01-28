<?php

class tJson
{
  const METHOD_NUMBER = "method_number";
  const QUERY = "query";
  const COUNTRY = "country";

  const ERROR_CODE = "error_code";
  const ERROR_STRING = "error_string";
  const DATA = "data";

  const METHOD_COUNTRIES_NUMBER = 1;
  const METHOD_ONE_COUNTRY_NUMBER = 2;

  //----------------------------------------------------------------------------
  public static function codeQueryCountries()
  {
    $output[self::METHOD_NUMBER] = self::METHOD_COUNTRIES_NUMBER;

    $outputJson = json_encode($output);

    return $outputJson;
  }
  //----------------------------------------------------------------------------
  public static function decodeResultCountries(&$inputJson)
  {
    $input = json_decode($inputJson, true);

    if ((isset($input[self::ERROR_CODE])) and ($input[self::ERROR_CODE] === 0))
      if ((isset($input[self::DATA])) and (is_array($input[self::DATA])))
      {
        return $input[self::DATA];
      }

    return null;
  }
  //----------------------------------------------------------------------------
  public static function codeQueryOneCountry(&$query, &$countryCode)
  {
    $output[self::METHOD_NUMBER] = self::METHOD_ONE_COUNTRY_NUMBER;
    $output[self::QUERY] = $query;
    $output[self::COUNTRY] = $countryCode;

    $outputJson = json_encode($output);

    return $outputJson;
  }
  //----------------------------------------------------------------------------
  public static function decodeResultOneCountry(&$inputJson, &$countryName)
  {
    $retString = $countryName." ... ";

    $input = json_decode($inputJson, true);

    if ((!isset($input[self::ERROR_CODE])) or (!isset($input[self::ERROR_STRING])))
	{
      $retString .= "chyba parsování";
      $retString .= PHP_EOL;
    }
    elseif ($input[self::ERROR_CODE] !== 0)
    {
      $retString .= $input[self::ERROR_STRING];
      $retString .= PHP_EOL;
    }
    elseif ((!isset($input[self::DATA])) or (!is_array($input[self::DATA])))
    {
      $retString .= "data nenalezena";
      $retString .= PHP_EOL;
    }
    else
    {
      $retString .= PHP_EOL;

      foreach ($input[self::DATA] as $dataLine)
      {
        $retString .= "- ";
        $retString .= $dataLine;
        $retString .= PHP_EOL;
      }
    }

    $retString .= PHP_EOL;

    return $retString;
  }
  //----------------------------------------------------------------------------
}

?>
