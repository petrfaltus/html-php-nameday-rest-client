<?php

class tSearch
{
  protected static $lastError = null;

  //----------------------------------------------------------------------------
  public static function run($query)
  {
    self::$lastError = null; // await no errors

    $result = $query;

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
