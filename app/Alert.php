<?php
namespace App;
/**
 *
 */
class Alert
{


  public static function alertMe($message, $alertType)
  {
    return array(
                    'message' => $message,
                    'alert-type' => $alertType
                  );
  }
}

/**
 *
 */
