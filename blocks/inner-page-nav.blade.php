{{--
Title: Inner Page Navigation Block
Description:
Category: widgets
Icon: screenoptions
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
$pl = get_field('pl');
@endphp
@if(!empty($pl))
    <div class="w-full container">
        <div id="static-section"
            class="ml-0 max-w-fit list-anim absolute z-40 left-0 top-[85vh] hidden xl:block bg-[#282828] border border-[#757575] p-4 rounded-lg shadow-lg"
            role="region" aria-labelledby="static-section-title">
            <div class="mx-auto flex items-center gap-1 mb-2 text-[#A9A9A9]">
                <x-icon-list />
                <h2 id="static-section-title" class="uppercase text-[#A9A9A9] text-lg font-normal tracking-wide mb-0">
                    In this section:
                </h2>
            </div>
            <ul class="mx-auto flex" role="list">
                @foreach ($pl as $item)
                    <li role="listitem">
                        <a href="{{ $item['link']['url'] ?? '#' }}"
                            class="flex items-center text-left text-white text-sm lg:text-lg px-4 mr-4 my-2 w-fit hover:opacity-60 focus:outline-none focus:ring-2 focus:ring-[#A9A9A9] rounded"
                            @if(isset($item['link']['title'])) aria-label="{{ strip_tags($item['link']['title']) }}" @endif>
                            {!! $item['link']['title'] ?? '' !!}
                            <span class="icons border text-xs border-white rounded-sm p-[4px] my-auto ml-2" aria-hidden="true">
                                <x-icon-arrow />
                            </span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endif

<div class="w-full container">
    <nav id="inner-page-nav" data-aos="fade-up" class="inner-page-nav" aria-label="Page navigation">
        <ul id="nav-list" class="hidden mt-4 ml-2 lg:ml-4" aria-labelledby="icon">
            @if(!empty($pl))
                @foreach ($pl as $item)
                    <li>
                        <a class="ipn-link" href="{{ $item['link']['url'] ?? '' }}">
                            <div
                                class="flex items-center bg-[#1E1E1E] hover:opacity-90 hover:bg-[#131313] text-white text-left rounded-lg mr-2 p-2 mb-2 w-fit">
                                {!! $item['link']['title'] ?? '' !!}
                                <span class="icons ml-2 text-[12px] border-2 border-white px-1 rounded flex p-[4px]">
                                    <x-icon-arrow />
                                </span>
                            </div>
                        </a>
                    </li>
                @endforeach
            @endif
            <li>
                <button id="collapse-btn" class="flex my-auto text-white text-md">▼ Collapse</button>
            </li>
        </ul>
        <div class="inner-page-nav-styling grid grid-cols-1 mt-2 text-sm md:text-lg active:border-gray-400 active:border-10"
            id="innerpageNav">
            <button id="icon" class="px-6 rounded-xl" aria-expanded="false" aria-controls="nav-list"
                aria-label="Toggle navigation menu">
                <span class="flex items-center gap-1">
                    <x-icon-list /> Page Contents
                </span>
            </button>
        </div>
    </nav>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const topElement = document.querySelector('#top');
        const navListElement = document.querySelector('#nav-list');
        const staticSection = document.getElementById('static-section');
        const innerPageNavLinks = document.querySelectorAll('.ipn-link');
        const menuButton = document.querySelector('#icon');
        const collapseButton = document.querySelector('#collapse-btn');
        function toggleNavMenu() {
            const isExpanded = menuButton.getAttribute('aria-expanded') === 'true';
            menuButton.setAttribute('aria-expanded', !isExpanded);
            topElement.classList.toggle('body-overlay');
            navListElement.classList.toggle('inline-block');
            navListElement.classList.toggle('hidden');
            navListElement.classList.toggle('fadeIn');
            if (!isExpanded) {
                setTimeout(() => {
                    const firstItem = navListElement.querySelector('a');
                    if (firstItem) firstItem.focus();
                }, 100);
            }
        }
        function hideNavMenu() {
            menuButton.setAttribute('aria-expanded', 'false');
            topElement.classList.remove('body-overlay');
            navListElement.classList.remove('inline-block', 'fadeIn');
            navListElement.classList.add('hidden');
        }
        menuButton.addEventListener('click', toggleNavMenu);
        collapseButton.addEventListener('click', toggleNavMenu);
        document.addEventListener('click', function (event) {
            if (!event.target.closest('.inner-page-nav')) hideNavMenu();
        });
        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape') {
                hideNavMenu();
                menuButton.focus();
            }
            if (menuButton.getAttribute('aria-expanded') === 'true' && event.key === 'Tab') {
                const focusable = navListElement.querySelectorAll('a, button');
                const first = focusable[0], last = focusable[focusable.length - 1];
                if (event.shiftKey && document.activeElement === first) {
                    event.preventDefault(); last.focus();
                } else if (!event.shiftKey && document.activeElement === last) {
                    event.preventDefault(); first.focus();
                }
            }
        });
        innerPageNavLinks.forEach(function (link) {
            const icon = link.querySelector('span.icons');
            link.addEventListener('mouseenter', () => icon && icon.classList.toggle('border-black'));
            link.addEventListener('mouseleave', () => icon && icon.classList.toggle('border-black'));
            link.addEventListener('click', toggleNavMenu);
        });
        let scrollTimeout;
        window.addEventListener('scroll', function () {
            if (scrollTimeout) window.cancelAnimationFrame(scrollTimeout);
            scrollTimeout = window.requestAnimationFrame(function () {
                if (window.scrollY <= 48) hideNavMenu();
            });
        });
        function checkViewportDimensions() {
            if (staticSection) {
                staticSection.style.display = (window.innerHeight <= 900 || window.innerWidth <= 1280) ? 'none' : 'block';
            }
        }
        checkViewportDimensions();
        window.addEventListener('resize', checkViewportDimensions);
        document.querySelectorAll('a:not([href="#app"])').forEach(function (anchor) {
            if (!anchor.closest('.footnote-ref')) {
                anchor.addEventListener('click', function (e) {
                    const hash = this.hash;
                    if (hash) {
                        const target = document.querySelector(hash);
                        if (target) {
                            e.preventDefault();
                            const topOffset = target.getBoundingClientRect().top + window.scrollY - 80;
                            window.scrollTo({
                                top: topOffset,
                                behavior: 'smooth'
                            });
                            if (menuButton.getAttribute('aria-expanded') === 'true') {
                                hideNavMenu();
                            }
                            // window.scrollTo({ top: target.offsetTop, behavior: 'smooth' });
                            // setTimeout(() => { window.location.hash = hash; }, 1000);
                        }
                    }
                });
            }
        });
    });
</script>
