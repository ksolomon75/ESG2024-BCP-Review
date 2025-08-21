{{--
  Title: Alamos Page Directory Block
  Description: Page directory block with navigation between sections
  Category: vdi-blocks
  Icon: align-wide
  Keywords: section content navigation directory
  Mode: preview
  PostTypes: page block-pattern
  SupportsAlign: false
  SupportsAlignText: false
  SupportsAlignContent: false
  SupportsMode: true
  SupportsMultiple: true
  SupportsInnerBlocks: true
  FullWith: true
  EnqueueStyle:
  EnqueueScript:
  EnqueueAssets:
--}}

@php
$links = get_field('links') ?: [];
$links_length = count($links);
$references_title = get_field('references_title');
$bi = get_field('bi');

// Page-specific styling configurations
$pageConfig = [
    '/' => [
        'directoryClasses' => 'before:from-black before:from-100% before:h-full before:opacity-60',
        'highlightText' => '',
        'marginTop' => '',
    ],
    'environment' => [
        'directoryClasses' => 'before:from-white before:from-10% before:h-1/2 border-b-0',
        'highlightText' => '',
        'marginTop' => '-mt-20',
    ],
    'tailings' => [
        'directoryClasses' => 'before:from-white before:from-10% before:h-1/2',
        'highlightText' => '',
        'marginTop' => '-mt-4',
    ],
    'governance' => [
        'directoryClasses' => 'before:bg-gradient-to-b before:from-white from-50% to-transparent before:h-full before:xl:h-1/2',
        'highlightText' => 'prose-a:text-[#0c78ae] prose-a:underline',
        'marginTop' => '',
    ],
];

// Determine current page path
$currentPath = request()->path();
$currentPage = $currentPath === '/' ? '/' : explode('/', $currentPath)[0];
$isSpanish = str_contains($currentPath, 'es/');

// Apply page-specific configuration
$directoryClasses = '';
$highlightText = '';
$marginTop = '';

foreach ($pageConfig as $page => $config) {
    if ($currentPage === $page || ($isSpanish && str_contains($currentPath, "es/$page"))) {
        $directoryClasses = $config['directoryClasses'];
        $highlightText = $config['highlightText'];
        $marginTop = $config['marginTop'];
        break;
    }
}
$bgPositionClass = ($currentPage === 'our-people' || ($isSpanish && str_contains($currentPath, 'es/our-people'))) ?
'bg-bottom' : 'bg-center';
@endphp

<section 
    style="background-image: url({{ $bi['url'] ?? '' }})"
class="relative h-[60vh] w-full my-0 py-0 {{ $bgPositionClass }} bg-cover bg-no-repeat {{ $marginTop }}
           before:absolute before:top-0 before:left-0 before:w-full before:bg-gradient-to-b {!! $directoryClasses !!} 
           after:absolute after:bottom-0 after:left-0 after:w-full after:bg-gradient-to-t after:from-[#07504C] after:from-10% after:to-transparent after:h-2/4">
    
    <div class="relative z-40 container pt-10 {{ $highlightText }} px-2 sm:px-0">
        @if(!is_admin() && request()->is('/'))
            <x-homepage-directory-content />
        @endif
        <InnerBlocks />
    </div>
    
    @if(!empty($links))
        <nav class="px-10 lg:px-44 w-full absolute bottom-0 z-40" aria-label="Page Navigation">
            <div class="grid grid-cols-1 lg:grid-cols-{{ min($links_length, 2) }} gap-4 pt-4 pb-10 mb-0">
                @php $isHomepage = request()->is('/'); @endphp
                
                @foreach($links as $index => $link)
                    @if(($index === 0 && !$isHomepage) || ($index === 0 && $isHomepage) || $index === 1)
                        <a href="{{ $link['url']['url'] ?? '#' }}" class="transition-opacity hover:opacity-80 focus:opacity-80" 
                           aria-label="{{ ($index === 0 && !$isHomepage) ? 'Previous' : 'Next' }} page: {{ $link['url']['title'] ?? '' }}">
                            <div class="text-white text-center">
                                @if($index === 0 && !$isHomepage)
                                    <span class="text-sm md:text-base">Previous Page:</span><br />
                                    <div class="text-md md:text-3xl lg:text-4xl xl:text-5xl font-bold whitespace-nowrap pb-4">
                                        <span><x-chevron-l /> {{ $link['url']['title'] ?? '' }}</span>
                                    </div>
                                @else
                                    <span class="text-sm md:text-base">Next Page:</span><br />
                                    <div class="text-md md:text-3xl lg:text-4xl xl:text-5xl font-bold whitespace-nowrap">
                                        <span>{{ $link['url']['title'] ?? '' }} <x-chevron-r /></span>
                                    </div>
                                @endif
                            </div>
                        </a>
                    @endif
                @endforeach
            </div>
        </nav>
    @endif
</section>
