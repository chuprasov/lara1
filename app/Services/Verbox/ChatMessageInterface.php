<?php

namespace App\Services\Verbox;

interface ChatMessageInterface
{
    public function getList(array $dateRange);
}
