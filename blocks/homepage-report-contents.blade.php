{{--
    Title: Report Contents Block
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
$report_contents = get_field('report_contents');
@endphp
<div class="bg-[#012742] bg-cover bg-center bg-no-repeat px-2"
    style="background-image: url('/wp-content/uploads/2024/03/report-contents-bg.webp');">
    <div class="container px-2 sm:px-0 pb-44 pt-8 text-white">
        <h2 class="lg:text-7xl text-3xl mb-5 lg:my-10 font-bold tracking-wider">Report Contents</h2>
        <ul class="prose-h2:tracking-widest">
            <ul class="prose-h2:tracking-widest">
                @if(isset($report_contents) && !empty($report_contents))
                @foreach($report_contents as $content)
                <li class="mt-2 list-none">
                    <h2
                        class="font-bold text-xl lg:text-2xl before:opacity-40 before:text-sm before:mr-2">
                        <a class="hover:opacity-20" href="{{ $content['page']['url'] }}">{{ $content['page']['title'] }}
                            <x-chevron-r />
                        </a>
                    </h2>
                    @if(isset($content['links']) && !empty($content['links']))
                    <div class="lg:flex gap-6 border-b-2 border-[#355268] text-[#A1BDD1] pl-2 py-3 mb-8">
                        @foreach($content['links'] as $link)
                        <a href="{{ $link['navigation_links']['url'] }}"
                            class="rc-link font-bold flex justify-between gap-2 text-md lg:text-xl hover:text-white">{{ $link['navigation_links']['title'] }}
                            <i class="border-2 text-xs border-[#A1BDD1] rounded-md p-[4px] my-auto">
                                <x-icon-arrow />
                            </i>
                        </a>
                        @endforeach
                    </div>
                    @endif
                </li>
                @endforeach
                @endif
            </ul>
        </ul>
    </div>
</div>
<script>
// HOME REPORT CONTENTS WHITE BORDER CODE
document.querySelectorAll('.rc-link').forEach(function(rcLink) {
    rcLink.addEventListener('mouseenter', function() {
        this.querySelector('i').classList.toggle('border-white');
    });
    rcLink.addEventListener('mouseleave', function() {
        this.querySelector('i').classList.toggle('border-white');
    });
});
</script>
