<?php

namespace App\Interfaces;

interface FilterableModel
{
    public function modelFilter(): ?string;
}
