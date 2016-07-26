<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
  
  
  public function pushNotification($tokens, $message)
  {
    $url = 'https://fcm.googleapis.com/fcm/send';
    $fields = [
      'registration_ids' => $tokens,
      'data' => $message
    ];
    
    $headers = [
      'authorization:key = YOUR_KEY',
      'Content-type: application/json'
    ];
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
    
    $result = curl_exec($ch);
    if ($result === false){
      die('Curl failed: '. curl_error($ch));
    }
    
    curl_close($ch);
    return $result;
  }
  
  public static function execNotif()
  {
    $sql = $this->all();
    $tokens = [];
    if(!empty($sql)){
        foreach($sql as $key => $val){
          $tokens[] = $val->token;
        }
    }
    
    $message = ['message' => 'percobaan FCM Notification Message'];
    $message_status = $this->pushNotification($tokens, $message);
    echo $message_status;
  }
}
