{{--
Title: Alamos Section Title Block
Description: Displays section titles with customizable backgrounds, colors, and optional content sections
Category: vdi-blocks
Icon: align-wide
Keywords: section content title heading
Mode: auto
PostTypes: page block-pattern
SupportsAlign: false
SupportsAlignText: false
SupportsAlignContent: false
SupportsMode: true
SupportsMultiple: true
SupportsInnerBlocks: true
FullWith: true
--}}
@php
// Core section identifiers
$section_id = get_field('section_id') ?: '';
$text = get_field('text') ?: '';
$section_text = get_field('section_text');

// Visual appearance settings
$halo = get_field('halo');
$nh = get_field('nh');
$bg_color = get_field('background_color') ?: '';
$main_color = get_field('main_color') ?: '';
$heading_color = get_field('heading_color') ?: '';
$text_color = get_field('text_color') ?: '';

// Background imagery configuration
$img = get_field('image');
$background_image = get_field('background_image');
$gradient_overlay = get_field('gradient_overlay') ?: '';
$background_position = get_field('background_position_selector');

// Content elements
$body_text = get_field('body_text');
$quote = get_field('quote');

// Spotlight configuration
$main_spotlight = get_field('main_spotlight');
$spotlight_video = get_field('spotlight_video');
$spotlight_image = get_field('spotlight_image');
$spotlight_dropdown = get_field('spotlight_dropdown');
$dropdown_text = get_field('dropdown_text');

// Table configuration
$table_id = get_field('table_id') ?: 'table-' . uniqid();
$table_margins = get_field('table_margins');
$table_title = get_field('table_title');
$group_headings = get_field('group_headings');
$table = get_field('table');

// Status flags for conditional rendering
$has_header_image = !empty($img['url']);
$has_body_image = !empty($background_image['url']);

// Generate dynamic classes
$halo_classes = $halo ? 'before:absolute before:left-0 before:top-0 before:w-full before:bg-gradient-to-b
before:from-white before:from-10% before:to-transparent before:overflow-auto before:h-1/4 -mt-4' : '';

// Table-specific classes
$special_table_classes = '';
if ($table_id == 'tcfd-index-table') {
$special_table_classes = 'prose-td:text-left prose-a:text-[#005c79]';
}

// Background position handling
$bg_position_class = in_array($section_id, ['com-rights-of-ind']) ? 'bg-bottom' : 'bg-center';
$custom_bg_position = '';

// Custom background positioning for specific sections
switch ($section_id) {
case 'op-dei':
$custom_bg_position = 'background-position: 50% 40%;';
break;
case 'nature':
$custom_bg_position = 'background-position: 50% 70%;';
break;
}
if(request()->is('targets')) {
if ($section_id == 'targets-strategy') {
$strategy_padding = 'pt-0';
}
else {
$strategy_padding = 'pt-10';
}
}
@endphp

<div class="alamos-section-title"
    style="--overlay-color: {{ $gradient_overlay }}; --background-color: {{ $bg_color }}; --text-color: {{ $text_color }}; --main-color: {{ $main_color }}; --heading-color: {{ $heading_color }};">

    {{-- Header/Banner section with image background --}}
    <div @if($has_header_image) style="background-image: url('{{ esc_url($img['url']) }}'); {{ $custom_bg_position }}"
        aria-label="{{ esc_attr($img['alt'] ?? 'Section header image') }}" @endif class="section-title-class relative bg-[--main-color] {{ $halo_classes }} mb-0
            @if($has_header_image)
                {{ $background_position }} bg-cover bg-no-repeat overflow-hidden h-[60vh]
                after:absolute after:left-0 after:bottom-0 after:w-full after:bg-gradient-to-t
                after:from-[--overlay-color] after:from-5% after:to-transparent after:overflow-auto after:h-1/2 
            @endif" aria-labelledby="section-heading-{{ $section_id }}">
    </div>

    {{-- Section heading area --}}
    <div id="{{ $section_id }}" class="w-full bg-[--main-color] relative z-10 flex h-full px-2">
        <div class="container mx-auto">
            @if($nh)
            @if(!empty($text))
            <h3 id="section-heading-{{ $section_id }}"
                class="text-[--text-color] uppercase font-bold text-3xl @if(!$has_header_image) pt-10 @endif">
                {{ $text }}
            </h3>
            @endif
            @elseif($text)
            <h2 id="section-heading-{{ $section_id }}"
                class="{{ $strategy_padding }} text-5xl lg:text-7xl text-[--heading-color] mb-0 font-extrabold">
                {{ $text }}
            </h2>
            <hr class="border-[--heading-color] border-4 w-1/6 my-5" aria-hidden="true">
            @endif
        </div>
    </div>

    {{-- Body content section with conditional background image --}}
    @if($body_text)
    <div @if($has_body_image) style="background-image: url('{{ esc_url($background_image['url']) }}');"
        aria-label="{{ esc_attr($background_image['alt'] ?? 'Section background image') }}" @endif class="relative my-0 bg-[--main-color] 
            @if(!empty($table)) 
                pb-16 
            @elseif($section_text) 
                pb-0 
            @else 
                pb-10 
            @endif 
            @if($has_body_image) 
                bg-center bg-no-repeat bg-cover 
                before:absolute before:left-0 before:top-0 before:w-full before:bg-gradient-to-b 
                before:from-[--main-color] before:from-10% before:to-transparent before:overflow-auto before:h-1/4 
                after:absolute after:left-0 after:bottom-0 after:w-full after:bg-gradient-to-t
                after:from-[--main-color] after:from-100% after:to-transparent after:overflow-auto after:h-full after:opacity-75 
            @endif">

        {{-- Health and Safety Video - Special case --}}
        @if($section_id == 'op-health-and-safety')
        <div class="container mx-auto px-2 pt-4 pb-8">
            <div class="embed-container relative pb-[56.25%] h-0 overflow-hidden max-w-full">
                <iframe
                    src="https://player.vimeo.com/video/882630467?badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479"
                    class="absolute top-0 left-0 w-full h-full" width="640" height="360" frameborder="0"
                    allow="autoplay; fullscreen; picture-in-picture" allowfullscreen title="Health and Safety Video"
                    loading="lazy">
                </iframe>
            </div>
        </div>
        @endif

        <div class="relative z-40 px-2 sm:px-0">
            {{-- <style>
                #ref1 {
                    color: white !important;
                }
            </style> --}}
            @if($quote)
            <div
                class="my-0 container mx-auto flex @if($main_spotlight) flex-col @else flex-col-reverse @endif lg:grid lg:grid-cols-3 gap-6">
                <div class="my-0 container prose-a:underline col-span-2 px-2">
                    <div
                        class="text-[--text-color] pr-4 prose-a:text-[#3164A3] prose-ul:list-disc prose-ul:pl-10 prose-ol:list-decimal prose-ol:pl-10 white-footnote">
                        {!! $body_text !!}
                    </div>
                </div>

                @if($main_spotlight)
                <div class="my-0 container prose-a:underline mt-2 lg:mt-0 px-2">
                    @if(!empty($spotlight_image))
                    <figure class="m-0">
                        <img src="{{ esc_url($spotlight_image['url']) }}"
                            srcset="{{ esc_url($spotlight_image['url']) }} 1x, {{ esc_url($spotlight_image['sizes']['large'] ?? $spotlight_image['url']) }} 2x"
                            alt="{{ esc_attr($spotlight_image['alt'] ?? 'Spotlight image for ' . $text) }}"
                            width="{{ $spotlight_image['width'] ?? 'auto' }}"
                            height="{{ $spotlight_image['height'] ?? 'auto' }}" class="w-full h-auto" loading="lazy"
                            decoding="async">
                    </figure>
                    @elseif($spotlight_video)
                    <div class="embed-container relative pb-[56.25%] h-0 overflow-hidden max-w-full">
                        {!! $spotlight_video !!}
                    </div>
                    @endif
                    <div class="bg-[#DCDCDC] p-4 text-[0.68rem]">
                        @if($spotlight_dropdown)
                        <div class="quote-content">
                            {!! $quote !!}
                        </div>
                        <details class="py-2">
                            <summary
                                class="cursor-pointer text-sm font-medium hover:text-[#3164A3] focus:outline-1 focus:outline-[#3164A3]">
                                Read More
                            </summary>
                            <div class="pt-2 prose-ul:list-disc prose-ul:pl-10 prose-ol:list-decimal prose-ol:pl-10">
                                {!! $dropdown_text !!}
                            </div>
                        </details>
                        @else
                        <div class="quote-content">
                            {!! $quote !!}
                        </div>
                        @endif
                    </div>
                </div>
                @else
                <div class="col-span-1">
                    <blockquote class="text-[--text-color] sm:pl-6 lg:ml-6 my-4 lg:my-10 font-bold text-2xl">
                        <span class="flex pl-4 border-l-4 border-[--text-color]">
                            {!! $quote !!}
                        </span>
                        @if($section_id == 'op-workforce')
                        <figure class="m-0">
                            <img src="{{ get_theme_file_uri('/resources/images/who-we-are.webp') }}" srcset="{{ get_theme_file_uri('/resources/images/who-we-are.webp') }} 1x, 
                                        {{ get_theme_file_uri('/resources/images/who-we-are@2x.webp') }} 2x"
                                alt="Our workforce team members" width="800" height="450" class="mt-10 w-full"
                                loading="lazy" decoding="async">
                        </figure>
                        @endif
                    </blockquote>
                </div>
                @endif
            </div>
            @else
            <div class="my-0 container mx-auto prose-a:underline px-2 sm:px-0">
                <div
                    class="text-[--text-color] prose-a:text-[#3164A3] prose-ul:list-disc prose-ul:pl-10 prose-ol:list-decimal prose-ol:pl-10 px-2">
                    {!! $body_text !!}
                    <div class="text-black" aria-live="polite">
                        <InnerBlocks />
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
    @endif
</div>

{{-- Table section with improved accessibility --}}
@if(!empty($table))
<div class="@if($table_margins) mb-4 @endif {{ $special_table_classes }}" id="{{ $table_id }}"
    aria-labelledby="table-heading-{{ $table_id }}">
    @include('partials.table', [
    'table' => $table,
    'content' => "<h4 id='table-heading-{$table_id}' class='text-2xl font-bold'>{$table_title}</h4>",
    'classes' => '-mt-10 relative z-40',
    'group_headings' => $group_headings,
    ])
</div>
@endif

{{-- Additional section text with better styling --}}
@if($section_text)
<div
    class="container px-4 pb-10 sm:px-0 prose-a:underline prose-ul:list-disc prose-ul:pl-10 prose-ol:list-decimal prose-ol:pl-10">
    {!! $section_text !!}
</div>
@endif
