<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    protected $table = 'tokens';
    private $saveString = 'fsdhlfewb';

    public function generateToken()
    {
        return md5(time().$this->saveString);
    }
}
