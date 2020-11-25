<?php

namespace App\Markdown\Extensions\Iframe\Contracts;

use App\Markdown\Extensions\Iframe\Embed;

interface Parser 
{
	public function parse(string $url): ?Embed;
}
