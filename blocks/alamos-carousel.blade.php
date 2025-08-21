{{--
Title: Alamos Main Carousel Block
Description:
Category: vdi-blocks
Icon: align-wide
Keywords: section content
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
$ci = get_field('ci');
$carousel_id = 'carousel-' . uniqid();
@endphp

@if (is_array($ci) || is_object($ci))
{{-- 1x --}}
<div class="carousel-wrapper">
    <a href="#after-{{ $carousel_id }}"
        class="sr-only focus:not-sr-only focus:absolute focus:p-2 focus:bg-white focus:text-black focus:border focus:border-black focus:z-50">
        Skip carousel
    </a>
    <div class="container slider flex h-full my-10" role="region" aria-roledescription="carousel"
        aria-label="Image carousel" id="{{ $carousel_id }}">
        @foreach ($ci as $key => $item)
        @if ($item['img'] == false)
        <div class="mr-2 bg-gray-500 flex items-center justify-center slide-container" role="group"
            aria-label="Empty slide">
            <p class="text-center text-white lg:text-xl px-4 py-section">
                There is an empty row in this carousel meaning there is no image to
                display here. <br />
                <span class="underline">
                    Please add an image or remove the empty row to remove this placeholder.
                </span>
            </p>
        </div>
        @else
        <div role="group" aria-label="Slide {{ $key + 1 }} of {{ count($ci) }}" aria-roledescription="slide"
            class="flex flex-col items-center justify-center slide-container">
            <div class="slide-content flex flex-col items-center justify-center w-full">
                <div class="caption-container text-sm xl:text-lg text-black opacity-100 text-center w-full mb-3">
                    {{ $item['img']['caption'] }}
                </div>
                <div class="img-container flex items-center justify-center">
                    <img src="{{ $item['img']['url'] }}"
                        alt="{{ $item['img']['alt'] ? $item['img']['alt'] : 'Carousel image ' . ($key + 1) }}"
                        class="carousel-image object-contain">
                </div>
            </div>
        </div>
        @endif
        @endforeach
    </div>
</div>

<div id="after-{{ $carousel_id }}"
    class="container px-2 prose-a:text-[#3164A3] prose-ul:list-disc prose-ul:pl-10 prose-ol:list-decimal prose-ol:pl-10">
    <InnerBlocks />
</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/@accessible360/accessible-slick@1.0.1/slick/slick.min.js">
</script>

<script type="text/javascript">
    $(document).ready(function() {
            var slider = $('.slider').not('.slick-initialized').slick({
                centerMode: true,
                centerPadding: '40px',
                infinite: true,
                dots: true,
                speed: 500,
                slidesToShow: 1,
                slidesToScroll: 1,
                adaptiveHeight: false,
                autoplay: false,
                nextArrow: '<button type="button" class="slick-next" aria-label="Next slide"><i class="fa fa-arrow-right text-black cursor-pointer my-auto mx-3"></i></button>',
                prevArrow: '<button type="button" class="slick-prev" aria-label="Previous slide"><i class="fa fa-arrow-left text-black cursor-pointer my-auto mx-3"></i></button>',
            });
            
            $('#carousel-toggle').on('click', function() {
                if ($(this).text() === 'Pause') {
                    $('.slider').slick('slickPause');
                    $(this).text('Play');
                    $(this).attr('aria-label', 'Play carousel');
                } else {
                    $('.slider').slick('slickPlay');
                    $(this).text('Pause');
                    $(this).attr('aria-label', 'Pause carousel');
                }
            });
            
            $(document).keydown(function(e) {
                if ($('.slider').is(':focus') || $('.slider .slick-slide').is(':focus') || $('.slick-arrow').is(':focus')) {
                    if (e.keyCode === 37) {
                        $('.slider').slick('slickPrev');
                        return false;
                    }
                    if (e.keyCode === 39) {
                        $('.slider').slick('slickNext');
                        return false;
                    }
                    if (e.keyCode === 32) {
                        $('#carousel-toggle').click();
                        return false;
                    }
                }
            });
            
            $('.slider').on('beforeChange', function(event, slick, currentSlide, nextSlide) {
                $(this).attr('aria-live', 'polite');
            });
            
            $('.slider').on('afterChange', function(event, slick, currentSlide) {
                $(this).removeAttr('aria-live');
                var totalSlides = slick.slideCount;
                $(this).attr('aria-label', 'Image carousel, slide ' + (currentSlide + 1) + ' of ' + totalSlides);
            });
            
            $('.slick-dots li button').each(function(index) {
                $(this).attr('aria-label', 'Go to slide ' + (index + 1));
            });
        });
</script>

<style>
    .carousel-toggle {
        background-color: #f5f5f5;
        border: 1px solid #ccc;
        border-radius: 4px;
        padding: 8px 16px;
        margin-bottom: 10px;
        cursor: pointer;
    }

    .carousel-toggle:hover,
    .carousel-toggle:focus {
        background-color: #e0e0e0;
        outline: 2px solid #3164A3;
    }

    .sr-only {
        position: absolute;
        width: 1px;
        height: 1px;
        padding: 0;
        margin: -1px;
        overflow: hidden;
        clip: rect(0, 0, 0, 0);
        white-space: nowrap;
        border-width: 0;
    }

    .slick-slide:focus,
    .slick-slide a:focus,
    .slick-slide button:focus,
    .slick-arrow:focus,
    .slick-dots li button:focus {
        outline: 2px solid #3164A3;
    }

    .slick-dots li button {
        width: 20px;
        height: 20px;
        margin-top: 25px;
    }

    .slick-arrow {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        z-index: 1;
        width: 40px;
        height: 40px;
        background-color: rgba(255, 255, 255, 0.7);
        border-radius: 50%;
        border: 1px solid #ddd;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .slick-prev {
        left: -60px;
    }

    .slick-next {
        right: -60px;
    }

    .carousel-wrapper {
        position: relative;
        padding: 0 70px;
    }

    .slider {
        overflow: visible !important;
    }

    .slide-container {
        height: 650px;
        width: 100%;
    }

    .slide-content {
        height: 100%;
        padding: 20px 0;
    }

    .img-container {
        height: 100%;
        width: 100%;
        max-height: 550px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .carousel-image {
        max-height: 100%;
        max-width: 100%;
        width: auto;
        height: auto;
        object-fit: contain;
    }

    .slick-slide {
        opacity: 0.7;
        transition: transform 0.3s ease;
        transform: scale(0.85);
    }

    .slick-current {
        opacity: 1;
        transform: scale(1);
    }

    .caption-container {
        min-height: 30px;
    }

    @media (max-width: 768px) {
        .carousel-wrapper {
            padding: 0 40px;
        }

        .slick-prev {
            left: -30px;
        }

        .slick-next {
            right: -30px;
        }
    }

    .slick-arrow i {
        font-size: 20px;
    }

    .slick-arrow:hover,
    .slick-arrow:focus {
        background-color: rgba(255, 255, 255, 0.9);
    }

    .slick-dots {
        display: flex;
        justify-content: center;
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        margin-left: auto;
        margin-right: auto;
        font-size: 0px;
        text-align: center;
        color: transparent;
        width: 100%;
    }

    .slick-dots li {
        display: inline-block;
    }

    .slick-dots button {
        height: 1rem;
        width: 1rem;
        background-color: white;
        cursor: pointer;
        border-width: 2px;
        border-style: solid;
        border-color: var(--color-primary, #3164A3);
        border-radius: 9999px;
        margin-left: 1rem;
        margin-right: 1rem;
        outline: none;
        padding: 0;
    }

    .slick-active {
        color: transparent;
    }

    .slick-active button {
        border-width: 2px;
        border-style: solid;
        border-color: white;
        background-color: #293344;
    }
</style>
@endif
