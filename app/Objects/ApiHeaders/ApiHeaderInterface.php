<?php

namespace App\Objects\ApiHeaders;

interface ApiHeaderInterface
{
    /**
     * @return array
     */
    public function toArray(): array;
}
