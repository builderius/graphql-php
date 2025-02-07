<?php

declare(strict_types=1);

namespace GraphQL\Language\AST;

class ListTypeNode extends Node implements TypeNode
{
    public string $kind = NodeKind::LIST_TYPE;

    /** @var NamedTypeNode|ListTypeNode|NonNullTypeNode */
    public $type;
}
