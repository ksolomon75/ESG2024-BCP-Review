{{--
    Title: Content Map Block
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
$cmt = get_field('cmt');
$cso = get_field('cso');
$cs = get_field('cs');
$cm_t = get_field('cm_table');
@endphp

<section @class(['container', 'content-map' , 'w-full' , 'divide-y' , 'rounded' , 'text-sm' ]) id="{{ $cmt }}">
    <details class="py-4 group border-b-2 border-[#ccc] px-2">
        <summary @class(['[&::-webkit-details-marker]:hidden', 'relative' , 'pr-8' , 'list-none' , 'cursor-pointer'
            , 'transition-colors' , 'duration-300' , 'text-3xl' , 'md:text-5xl' , 'lg:text-7xl' , 'font-bold'
            , 'text-[#152346]' ])>
            {{ $cmt }}
            <hr class="border-[#152346] border-4 w-1/4 my-2">
            <svg role="img" aria-describedby="plusIcon-{{ str_replace(' ', '', $cmt) }}"
                xmlns="http://www.w3.org/2000/svg" @class(['absolute', 'right-0' , 'w-10' , 'h-10' , 'lg:mt-4'
                , 'transition' , 'duration-300' , 'top-1' , 'stroke-black' , 'shrink-0' , 'group-open:rotate-45'
                , 'focus:ring-1 ' , 'focus:ring-sky-500' ]) fill="none" viewBox="0 0 24 24" stroke="currentColor"
                stroke-width="1.5">
                <title id="plusIcon-{{ str_replace(' ', '', $cmt) }}">Content Map Expand and Retract Button Icon
                </title>
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
            </svg>
        </summary>
        @if(!empty($cm_t))
        <div class="table-body text-left md:p-2 lg:p-10 overflow-x-auto">
            <table>
                @isset($cm_t['header'])
                <thead class="border-b-2 border-[#ccc]">
                    <tr class="">
                        @foreach($cm_t['header'] as $th)
                        <th class="">{!! $th['c'] !!}</th>
                        @endforeach
                    </tr>
                </thead>
                @endisset
                <tbody>
                    @foreach($cm_t['body'] as $tr)
                    @php
                    $hasContentOnlyInFirstTd = count($tr) > 0 && strlen(trim($tr[0]['c'])) > 0;
                    for ($i = 1; $i < count($tr); $i++) { if (strlen(trim($tr[$i]['c']))> 0) {
                        $hasContentOnlyInFirstTd = false;
                        break;
                        }
                        }
                        @endphp
                        <tr @class(['bg-gray-200'=> $hasContentOnlyInFirstTd])>
                            @foreach($tr as $td)
                            <td class="prose-a:text-[#0c78ae] p-2 border-b-[1px] border-[#ccc]">
                                {!! nl2br($td['c']) !!}
                            </td>
                            @endforeach
                        </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </details>
    @if($cso)
    <div class="prose-a:text-[#0c78ae] prose-a:underline text-sm pt-4 pb-10 px-2" id="abt-cautionary-statements">
        <h2 class="text-3xl md:text-5xl lg:text-7xl font-bold text-[#152346] mb-0">Cautionary Statements</h2>
        <hr class="border-[#152346] border-4 w-1/4 mt-2 mb-10">
        <div class="leading-6">
            {!! $cs !!}
        </div>
    </div>
    @endif
</section>
