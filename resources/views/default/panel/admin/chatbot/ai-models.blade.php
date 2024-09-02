@php
    $filters = ['All', \App\Enums\AITokenType::WORD->value];
@endphp

@extends('panel.layout.settings')
@section('title', __('AI Chat Models'))
@section('titlebar_actions', '')
@section('settings')
    <div x-data="{ 'activeFilter': 'All' }">
        <form
            class="flex flex-col gap-5"
            id="cost_form"
            action="{{ route('dashboard.admin.ai-chat-model.update') }}"
            method="POST"
            enctype="multipart/form-data"
        >
            @csrf
            <h4 class="mb-0">
                {{ __('Editing: AI Chat Models') }}
            </h4>
            <label>
                {{ __('Manage available AI models visible to users within AI chat: Control the selection and presentation of AI models accessible to users during chat interactions. Manage the availability of models across different pricing plans.') }}
            </label>

            <x-alert class="rounde">
                {{ __('Only activated AI models are displayed here. Make sure to add your API Keys to use all AI Models (OpenAI, Gemini or Anthropic).') }}
                <x-tabler-arrow-up-right class="size-4 inline align-text-bottom" />
            </x-alert>
{{--            <ul class="flex w-full justify-between gap-3 rounded-full bg-foreground/10 p-1 text-xs font-medium">--}}
{{--                @foreach ($filters as $filter)--}}
{{--                    <li>--}}
{{--                        <button--}}
{{--                            @class([--}}
{{--                                'px-6 py-3 leading-tight rounded-full transition-all hover:bg-background/80 [&.lqd-is-active]:bg-background [&.lqd-is-active]:shadow-[0_2px_12px_hsl(0_0%_0%/10%)]',--}}
{{--                                'lqd-is-active' => $loop->first,--}}
{{--                            ])--}}
{{--                            @click="activeFilter = '{{ $filter }}'"--}}
{{--                            :class="{ 'lqd-is-active': activeFilter == '{{ $filter }}' }"--}}
{{--                            type="button"--}}
{{--                        >--}}
{{--                            {{ ucfirst($filter) }}--}}
{{--                        </button>--}}
{{--                    </li>--}}
{{--                @endforeach--}}
{{--            </ul>--}}

            @php
                $index = 0;
            @endphp
            @foreach ($groupedAiModels as $category => $groupedAiModel)
                @php
                    $formattedCategory = ucwords(str_replace('_', ' ', $category));
                    $index++;
                @endphp
                <x-form-step
                        class="mt-4"
                    step="{{ $index }}"
                    label="{{ str_replace('ai', 'AI', ucfirst($formattedCategory)) }}"
                />

                @foreach ($groupedAiModel as $aiModel)
                    @foreach ($aiModel->tokens as $aiToken)
                        <x-card
                            data-cat="{{ $aiToken->type }}"
                            size="none"
                            variant="shadow"
                            class="p-2"
{{--                            ::class="{ 'hidden': !$el.getAttribute('data-cat')?.includes(activeFilter) && activeFilter !== 'All' }"--}}
                        >
                            <x-forms.input
                                type="text"
                                name="selected_title[{{ $aiToken->ai_model_id }}]"
                                value="{{ $aiModel->selected_title }}"
                                label="{{ __($aiModel->key) }}"
                                tooltip="{{ __($aiModel->title) }}"
                                labelExtra=""
                                switcher
                            >

                                <x-dropdown.dropdown
                                        class="header-user-dropdown"
                                        offsetY="5px"
                                >
                                    <x-slot:trigger
                                            class=" "
                                    >
                                        <small>View Included Pricing Plans</small> <x-tabler-arrow-down style="width: 13px" />
                                    </x-slot:trigger>

                                    <x-slot:dropdown
                                            class="min-w-52"
                                    >
                                        <div class="text-2xs p-2">
                                            @foreach($plans as $plan)
                                                @php
                                                $checked = $aiModel->aiFinance?->pluck('plan_id')?->toArray() ?: [];
                                                @endphp
                                                <x-forms.input
                                                        class:container="h-full bg-input-background mt-2"
                                                        class:label="w-full border h-full rounded px-3 py-4 hover:bg-foreground/5 transition-colors"
                                                        id="ai_model_{{ $aiModel->key.'_'.$plan->id }}"
{{--                                                        data-filter="{{ $model }}"--}}
                                                        :checked="in_array($plan->id, $checked)"
                                                        type="checkbox"
                                                        name="selected_plans[{{$aiModel->id}}][{{$plan->id}}]"
                                                        value="{{ $plan->id }}"
                                                        label="{{ $plan->name }}"
                                                        custom
                                                />
                                            @endforeach

                                                <x-forms.input
                                                        class:container="h-full bg-input-background mt-2"
                                                        class:label="w-full border h-full rounded px-3 py-4 hover:bg-foreground/5 transition-colors"
                                                        id="ai_model_{{ $aiModel->key.'_no_plan_users' }}"
                                                        :checked="$aiModel->is_selected"
                                                        type="checkbox"
                                                        name="no_plan_users[{{  $aiModel->id }}]"
                                                        value="{{ $aiModel->id }}"
                                                        label="{{ trans('No Plan Users') }}"
                                                        custom
                                                />

                                        </div>

                                    </x-slot:dropdown>
                                </x-dropdown.dropdown>
{{--                                <x-forms.input--}}
{{--                                        class:container="mb-2 mt-2"--}}
{{--                                        id="is_selected_{{ $aiToken->ai_model_id }}"--}}
{{--                                        type="checkbox"--}}
{{--                                        name="is_selected[{{ $aiToken->ai_model_id }}]"--}}
{{--                                        :checked="$aiModel?->is_selected == 1"--}}
{{--                                        label="{{ __('Enable for Users') }}"--}}
{{--                                        switcher--}}
{{--                                />--}}
                            </x-forms.input>
                        </x-card>
                    @endforeach
                @endforeach
            @endforeach

            @if ($app_is_demo)
                <x-button
                    type="button"
                    onclick="return toastr.info('This feature is disabled in Demo version.');"
                >
                    {{ __('Save') }}
                </x-button>
            @else
                <x-button
                    id="cost_button"
                    type="submit"
                    form="cost_form"
                >
                    {{ __('Save') }}
                </x-button>
            @endif
        </form>
    </div>
@endsection
