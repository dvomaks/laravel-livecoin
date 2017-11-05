<?php
namespace Dvomaks\Livecoin;

interface ClientContract
{
    public function exchangeTicker($params = []);
}