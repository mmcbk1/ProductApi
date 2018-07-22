<?php

use Illuminate\Database\Seeder;
use \App\Token;

class TokenSeeder extends Seeder
{

    private function create()
    {
        $token = new Token();
        $token->content = $token->generateToken();
        $token->save();
    }

    public function run()
    {
       $this->create();
    }
}
