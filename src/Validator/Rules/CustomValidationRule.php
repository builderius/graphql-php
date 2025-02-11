<?php

declare(strict_types=1);

namespace GraphQL\Validator\Rules;

use GraphQL\Language\AST\Node;
use GraphQL\Language\VisitorOperation;
use GraphQL\Validator\ValidationContext;

/**
 * @phpstan-type VisitorFn callable(ValidationContext): (array<string, callable(Node): VisitorOperation|mixed|null>|array<string, array<string, callable(Node): VisitorOperation|mixed|null>>)
 */
class CustomValidationRule extends ValidationRule
{
    /**
     * @var callable
     * @phpstan-var VisitorFn
     */
    protected $visitorFn;

    /**
     * @phpstan-param VisitorFn $visitorFn
     */
    public function __construct(string $name, callable $visitorFn)
    {
        $this->name      = $name;
        $this->visitorFn = $visitorFn;
    }

    public function getVisitor(ValidationContext $context): array
    {
        return ($this->visitorFn)($context);
    }
}
