<?php

declare(strict_types=1);

use Illuminate\Testing\Constraints\SeeInOrder;
use PHPUnit\Framework\Assert as PHPUnit;

function assertSeeHtml($actual, $values): void
{
    if ($actual instanceof \Illuminate\View\View) {
        $actual = $actual->toHtml();
    }
    $actual = preg_replace('/\s+/', ' ', (string) $actual);
    foreach (Arr::wrap($values) as $value) {
        $value = preg_replace('/\s+/', ' ', $value);
        PHPUnit::assertStringContainsString(
            $value,
            $actual
        );
    }
}
function assertDontSeeHtml($actual, $values): void
{
    if ($actual instanceof \Illuminate\Support\HtmlString) {
        $actual = $actual->toHtml();
    }
    foreach (Arr::wrap($values) as $value) {
        PHPUnit::assertStringNotContainsString(
            $value,
            (string) $actual
        );
    }
}

function assertSeeHtmlInOrder($actual, array $values): void
{
    if ($actual instanceof \Illuminate\Support\HtmlString) {
        $actual = $actual->toHtml();
    }
    PHPUnit::assertThat(
        $values,
        new SeeInOrder((string) $actual)
    );
}
