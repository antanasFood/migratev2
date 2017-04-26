<?php

class ModelMychef extends Model
{
    public function initialize()
    {
        $this->setConnectionService('dbMychef');
    }
}
