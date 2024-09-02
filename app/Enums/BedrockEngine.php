<?php

declare(strict_types=1);

namespace App\Enums;

use App\Enums\Traits\EnumTo;
use App\Enums\Traits\StringBackedEnumTrait;

enum BedrockEngine: string implements Contracts\WithStringBackedEnum
{
    use EnumTo;
    use StringBackedEnumTrait;

    case BEDROCK = 'aws_bedrock';
    case CLAUDE_21 = 'anthropic.claude-v2:1';
    case CLAUDE_2 = 'anthropic.claude-v2';
    case CLAUDE_1 = 'anthropic.claude-instant-v1';

    case STABLE_DIFFUSION_1 = 'stability.stable-diffusion-xl-v1';

    public function label(): string
    {
        return match ($this) {
            self::BEDROCK             => __('AWS Bedrock'),
            self::CLAUDE_21           => __('Claude 2.1'),
            self::CLAUDE_2            => __('Claude 2'),
            self::CLAUDE_1            => __('Claude 1'),
            self::STABLE_DIFFUSION_1  => __('SDXL 1.0'),
        };
    }
}
