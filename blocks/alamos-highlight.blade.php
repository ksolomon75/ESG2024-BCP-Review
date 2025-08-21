{{--
Title: Alamos Home Highlights
Description:
Category: widgets
Icon: search
Keywords: section
Mode: auto
Align:
PostTypes: page page-template
SupportsAlign: true
SupportsAlignText: true
SupportsAlignContent: true
SupportsMode: true
SupportsMultiple: true
EnqueueStyle:
EnqueueScript:
EnqueueAssets:
--}}
@php
$headerLogo = isset(get_field('header', 'option')['header_logo']) ? get_field('header', 'option')['header_logo'] :
['url'=> ''];
$highlight_cards = get_field('highlight_cards');
$bi = get_field('bi');
@endphp

<div id="highlights" style="background-image: url({{ $bi['url'] ?? '' }})"
    class="relative px-4 sm:px-0 bg-[#074350] bg-cover bg-bottom bg-no-repeat text-[#022742] m-0 after:absolute after:bottom-0 after:left-0 after:w-full after:bg-gradient-to-t after:from-[#C1F3ED] after:from-10% after:to-transparent after:h-4/5">
    <div class="container relative z-40">
        <div class="flex items-left pt-20">
            @if(!empty($headerLogo['url']))
            <img src="{{ $headerLogo['url'] }}" alt="Header Logo" class="w-24 h-auto object-contain" />
            @endif
        </div>
        <h2 class="text-left text-black text-8xl font-bold mt-4 mb-8">2024 Highlights</h2>
        <hr class="border-black border-4 w-1/4 my-5">
    </div>
    <div class="relative z-40 container mx-auto py-44">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            @if(!empty($highlight_cards))
            @foreach($highlight_cards as $card)
            <div class="bg-[#EEFCFA]/80 rounded-xl py-10 px-10 shadow-lg p-4 flex flex-col backdrop-blur-md">
                <div class="flex border-2 border-[#8C8C8C] rounded-lg w-auto max-w-fit p-1">
                    @if(!empty($card['group_icon']['url']))
                    <img src="{{ $card['group_icon']['url'] }}" alt="Group Icon" class="w-4 h-4 object-contain" />
                    @endif
                    <p class="text-[11px] uppercase font-bold pl-2 text-[#4C4C4C]">{{ $card['group_name'] ?? '' }}</p>
                </div>
                @if(!empty($card['stats']))
                <div class="w-full flex flex-col gap-4">
                    @foreach($card['stats'] as $stat)
                    <div class="flex items-center gap-4 rounded-lg py-4">
                        @if(!empty($stat['icon']['url']))
                        <img src="{{ $stat['icon']['url'] }}" alt="Stat Icon" class="w-10 h-10 object-contain" />
                        @endif
                        <div class="flex-1 text-left">
                            <div class="text-4xl uppercase font-semibold text-[#022742]">{{ $stat['number'] ?? '' }}
                            </div>
                            <div class="text-xs text-[#022742]/60">{{ $stat['stat'] ?? '' }}</div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
            @endforeach
            @endif
        </div>
    </div>
</div>
