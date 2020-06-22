<?php

class tSearch
{
  protected static $lastError = null;

  //----------------------------------------------------------------------------
  public static function run(&$query)
  {
    self::$lastError = null; // await no errors

    $requestJsonCountries = tJson::codeQueryCountries();
    $replyJsonCountries = tWeb::request($requestJsonCountries);
    if ($replyJsonCountries == null)
    {
      self::$lastError = "The web request to the REST service failed";
      return null;
    }

    $countries = tJson::decodeResultCountries($replyJsonCountries);
    if ($countries == null)
    {
      self::$lastError = "The web reply JSON decoding failed";
      return null;
    }

    $result = ""; // default value
    foreach ($countries as $countryCode => $countryName)
    {
      $requestJsonOneCountry = tJson::codeQueryOneCountry($query, $countryCode);

      $replyJsonOneCountry = tWeb::request($requestJsonOneCountry);
      if ($replyJsonOneCountry == null)
      {
        self::$lastError = "The web request to the REST service failed";
        return null;
      }

      $result .= tJson::decodeResultOneCountry($replyJsonOneCountry, $countryName);
    }

    return $result;
  }
  //----------------------------------------------------------------------------
  public static function getLastError()
  {
    return self::$lastError;
  }
  //----------------------------------------------------------------------------
}

?>
