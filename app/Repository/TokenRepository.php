<?php
/**
 * Created by PhpStorm.
 * User: barkr
 * Date: 22.07.2018
 * Time: 15:44
 */

namespace App\Repository;


use App\Token;
use Illuminate\Database\Eloquent\Model;

class TokenRepository extends BaseRepository
{
    protected function getModel() : Model
    {
        return new Token();
    }

    public function getByToken(string $token)
    {
       return $this->model->where('content', $token)->first();
    }
}