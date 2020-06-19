<?php

class tSearch
{
  protected static $lastError = null;

  //----------------------------------------------------------------------------
  public static function run($query)
  {
    self::$lastError = null; // await no errors

    $output = tWeb::request($query);
    if ($output == null)
    {
      self::$lastError = "The web request to the REST service failed";
      return null;
    }

    return $output;
  }
  //----------------------------------------------------------------------------
  public static function getLastError()
  {
    return self::$lastError;
  }
  //----------------------------------------------------------------------------
}

?>
