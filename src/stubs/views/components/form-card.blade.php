<?php
/**
 * @var string $formMethod
 * @var string $formAction
 * @var string $formHiddenFields
 * @var string $title
 * @var string $slot
 * @var string $actions
 * @var string $footer
 */
$formMethod = $formMethod ?? 'POST';
$formHiddenFields = $formHiddenFields ?? '';
$footer = $footer ?? '';
?>
<div class="h-full font-sans">
    <div class="container mx-auto h-full flex justify-center">
        <form
            method="{{ $formMethod }}"
            action="{{ $formAction }}"
            class="w-full md:w-1/2 lg:w-1/3 mx-4"
        >
            @csrf
            @if(!in_array($formMethod, ['POST', 'GET']))
                @method($formMethod)
            @endif
            {{ $formHiddenFields }}
            <h1 class="font-thin mb-6 mt-6 text-center">
                {{ $title }}
            </h1>
            <div class="border-teal p-6 sm:p-8 border-t-4 bg-white mb-0 rounded-t shadow-lg">
                {{ $slot }}
            </div>
            <div class="border-teal px-6 py-3 sm:px-8 sm:py-4 bg-grey-lighter mb-6 rounded-b shadow-lg">
                {{ $actions }}
            </div>
            <div class="text-center">
                {{ $footer }}
            </div>
        </form>
    </div>
</div>
