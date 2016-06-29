<?php
namespace App\Models;
class Collection extends User
{
    public function newCollection(array $models = ['email'])
    {
        return new CustomCollection($models);
    }
}
