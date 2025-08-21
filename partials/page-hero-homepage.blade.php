@php
$bi = get_field('bi');
$heading = get_field('heading');
$page_id = get_queried_object_id();
$postContent = get_field('pl', $page_id);
$fields = get_fields();

if (!$heading) {
$heading = $pageTitle ?? '';
}
@endphp
<div style="background-image: url({{ $bi['url'] ?? '' }}); background-color: #012742;"
    aria-label="{{ $bi['alt'] ?? 'Default background description' }}"
    class="bg-black relative bg-center md:bg-left-bottom bg-cover bg-no-repeat overflow-hidden h-screen mb-0 before:absolute before:left-0 before:top-0 before:w-full before:bg-gradient-to-b before:from-black from-10% to-transparent before:overflow-auto before:h-full before:opacity-75 after:absolute after:left-0 after:bottom-0 after:w-full after:bg-gradient-to-t after:from-[#012742] from-10% to-transparent after:overflow-auto after:h-1/2">
    <div id="main-content" data-aos="fade-zoom-in" data-aos-duration="2000" class="container content-wrapper">
        <div class="px-4 sm:px-0">
            <div
                class="absolute z-40 marker:top-[77%] max-w-6xl landscape-home portrait-home inline no-wrap text-white px-2 pt-10">
                <p class="uppercase text-[32px] font-dm_sans text-white font-medium pb-6 sm:pb-8 md:pb-10 lg:pb-0">
                    Alamos Gold Inc.</p>
                <h1 class="sm:text-[60px] lg:text-[100px] text-white font-bold mb-4 pl-0 -ml-1"
                    aria-level="1">
                    {!! $heading !!}
                </h1>
                <div class="relative z-50">
                    <hr class="w-1/6 border-4 border-white my-4 md:my-10">
                    <h2 class="text-white font-dm_sans font-normal text-[30px] md:text-[100px] md:mt-10 md:pb-10"
                        aria-level="2">2024</h2>
                </div>
            </div>
        </div>
    </div>
</div>
