{{--
Title: Alamos' President's Message
Description: Displays a message from the President and CEO with photo and signature
Category: widgets
Icon: search
Keywords: section, president, message, CEO
Mode: auto
PostTypes: page page-template
SupportsAlign: true
SupportsAlignText: true
SupportsAlignContent: true
SupportsMode: true
SupportsMultiple: true
SupportsInnerBlocks: true
--}}

@php
    // Get field values with null coalescing for defaults
    $title = get_field('title') ?? 'Message from the President and CEO';
    $prez = get_field('profile_photo') ?? ['url' => '', 'alt' => ''];
    $column_image = get_field('column_image') ?? ['url' => '', 'alt' => ''];
    $president_signature = get_field('president_signature') ?? ['url' => '', 'alt' => ''];
@endphp
<section id="presidents-message" class="president-message">
    <!-- Header section with background image -->
    <div style="background-image: url({{ $prez['url'] }});"
        class="relative px-2 w-full pb-20 pt-72 lg:py-[500px] text-white text-xl bg-[#064F4B] bg-no-repeat bg-top bg-contain lg:bg-center lg:bg-cover mb-0

               after:absolute after:content-[''] after:bottom-0 after:left-0 after:right-0 after:w-full after:bg-gradient-to-t after:from-[#07504C] after:from-40% after:to-transparent after:h-2/4 after:pointer-events-none
               before:absolute before:content-[''] before:top-0 before:left-0 before:bg-gradient-to-r before:from-[#07504C] before:from-10% before:w-3/4 before:h-full before:pointer-events-none">
    </div>
    <!-- Main content section -->
    <div class="bg-[#07504C] px-2 -mt-72 text-white">
        <div class="relative z-40 text-xl">
            <!-- Title and intro message -->
            <div class="container grid grid-cols-1 lg:grid-cols-2">
                <div class="text-xl relative z-30 lg:pt-0 mt-44 md:mt-72 lg:mt-20">
                    <header class="relative z-40">
                        <h2 class="text-3xl lg:text-6xl flex lg:mb-10 font-bold">{!! $title !!}</h2>
                        <hr class="border-[#FFFFFF] border-4 w-1/4 my-5">
                    </header>
                </div>
                <div aria-hidden="true" class="photo-spacer"></div>
            </div>
        </div>
        <div class="container">
            <InnerBlocks />
        </div>
        <!-- Signature section -->
        @if ($president_signature['url'])
            <footer class="container pb-10">
                <div class="mt-10">
                    <img src="{{ $president_signature['url'] }}"
                        alt="{{ $president_signature['alt'] ?? 'President\'s signature' }}" class="flex">
                    <h5 class="text-2xl">JOHN A. McCLUSKEY</h5>
                    <p class="pb-10">President and CEO</p>
                </div>
            </footer>
        @endif
    </div>
</section>
