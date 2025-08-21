@php
$n = 0;
$m = 0;
$table_caption = $table['caption'];
@endphp
<style>
    .table-footnotes .easy-footnote a {
        color: black;
        text-decoration: underline;
    }
</style>
<div @class([
    'table-footnotes bg-[#FFBE5B] container overflow-x-auto lg:[overflow-x:initial_!important] prose-a:text-[#015C79] prose-a:underline prose-a:underline-offset-2 hover:prose-a:decoration-2 p-10'
    ,
    $classes,
    'relative before:box-content before:absolute before:w-screen before:h-full before:bg-[#FFBE5B] before:[translate:-50%_50%] before:top-[-50%] before:left-[50%] before:-z-10' =>
        $full_width ?? false,
])>
    @if((isset($table['caption']) && (trim(strip_tags($table['caption'])) === 'Table 3.1' || trim(strip_tags($table['caption'])) === 'Table 3.9')))
        <style scoped>
            .custom-table-3s {
                border-collapse: separate;
                border-spacing: 0 8px;
            }

            .custom-table-3s th,
            .custom-table-3s td {
                width: 80px;
                padding: 10px 12px;
                vertical-align: middle;
                font-family: inherit;
                box-sizing: border-box;
                /* Remove double border if present */
                border-collapse: collapse;
            }

            .custom-table-3s th {
                letter-spacing: 0.02em;
            }

            .custom-table-3s tr {
                /* Ensure row height is consistent */
                height: 48px;
            }
        </style>
    @endif
    @if((isset($table['caption']) && (trim(strip_tags($table['caption'])) === 'Table 7.6' || trim(strip_tags($table['caption'])) === 'Table 7.7')))
        <style scoped>
            /* Create a specific class for Table 7.6 */
            .table-7-6 th,
            .table-7-6 td,
            .table-7-7 th,
            .table-7-7 td {
                width: auto;
                max-width: 120px
            }

            /* Center align text in the last 3 rows */
            .table-7-6 td:nth-last-child(-n+3),
            .table-7-7 td:nth-last-child(-n+3) {
                text-align: center;
            }

            /* Center align text in header cells */
            .table-7-6 th:nth-last-child(-n+3),
            .table-7-7 th:nth-last-child(-n+3) {
                text-align: center;
            }
        </style>
    @endif
    @if((isset($table['caption']) && (trim(strip_tags($table['caption'])) === 'Table 5.1' || trim(strip_tags($table['caption'])) === 'Table 5.2' || trim(strip_tags($table['caption'])) === 'Table 5.12' || trim(strip_tags($table['caption'])) === 'Table 5.13' || trim(strip_tags($table['caption'])) === 'Table 5.15' || trim(strip_tags($table['caption'])) === 'Table 5.16' || trim(strip_tags($table['caption'])) === 'Table 5.18')))
        <style scoped>
            /* Equal-width columns for Tables 5.1, 5.2, 5.12, 5.13, 5.15, 5.16, and 5.18 */
            .table-5-1 th,
            .table-5-1 td,
            .table-5-2 th,
            .table-5-2 td,
            .table-5-13 th,
            .table-5-13 td,
            .table-5-15 th,
            .table-5-15 td,
            .table-5-16 th,
            .table-5-16 td,
            .table-5-18 th,
            .table-5-18 td {
                width: calc(100% / var(--column-count));
                text-align: left;
            }

            .table-5-2,
            .table-5-12,
            .table-5-15,
            .table-5-16,
            .table-5-18 {
                table-layout: fixed;
            }

            .table-5-2 th:nth-last-child(-n+3),
            .table-5-2 td:nth-last-child(-n+3),
            .table-5-15 td:nth-last-child(-n+3),
            .table-5-15 th:nth-last-child(-n+3),
            .table-5-13 td:nth-last-child(-n+3),
            .table-5-13 th:nth-last-child(-n+3) {
                text-align: center;
            }

            .table-5-12 th {
                text-align: center !important;
            }

            /* Set column count variable based on table */
            .table-5-1 {
                --column-count: 6;
            }

            .table-5-2 {
                --column-count: 8;
            }

            .table-5-12 {
                --column-count: 8;
            }

            .table-5-13 {
                --column-count: 8;
            }

            .table-5-15 {
                --column-count: 5;
            }

            .table-5-16 {
                --column-count: 5;
            }

            .table-5-18 {
                --column-count: 3;
            }
        </style>
    @endif
    <section @class(['flex justify-between items-center prose-h2:my-0 prose-h4:my-0 pb-4' => isset($content)])>
        {!!$content ?? ''!!}
        <p @class(['text-right m-0 p-0 font-bold'])>{!! $table['caption'] ?: $caption ?? '' !!}</p>
    </section>
    @if((isset($table['caption']) && trim(strip_tags($table['caption'])) === 'Table 4.1'))
        <div class="flex items-center gap-4 mt-2" aria-label="Legend">
            <span class="flex items-center gap-1">
                <span class="flex justify-center items-center" style="width:1.5em;" aria-hidden="true">
                    <i class="fas fa-circle" style="font-size:1.1em;"></i>
                </span>
                <span class="text-sm">Full Completion</span>
            </span>
            <span class="flex items-center gap-1">
                <span class="flex justify-center items-center" style="width:1.5em;" aria-hidden="true">
                    <i class="fas fa-adjust" style="font-size:1.1em;"></i>
                </span>
                <span class="text-sm">In Progress</span>
            </span>
            <span class="flex items-center gap-1">
                <span class="flex justify-center items-center" style="width:1.5em;" aria-hidden="true">
                    <i class="far fa-circle" style="font-size:1.1em;"></i>
                </span>
                <span class="text-sm">Non-Completion</span>
            </span>
        </div>
    @endif
    <table
        class="w-full @if(isset($table['caption']) && (trim(strip_tags($table['caption'])) === 'Table 3.1' || trim(strip_tags($table['caption'])) === 'Table 3.9')) custom-table-3s @endif @if(isset($table['caption']) && (trim(strip_tags($table['caption'])) === 'Table 7.6' || trim(strip_tags($table['caption'])) === 'Table 7.7')) table-7-6 @endif @if(isset($table['caption']) && trim(strip_tags($table['caption'])) === 'Table 5.13') table-5-13 @endif @if(isset($table['caption']) && trim(strip_tags($table['caption'])) === 'Table 5.15') table-5-15 @endif @if(isset($table['caption']) && trim(strip_tags($table['caption'])) === 'Table 5.16') table-5-16 @endif @if(isset($table['caption']) && trim(strip_tags($table['caption'])) === 'Table 5.18') table-5-18 @endif">
        @if(isset($table['header']) && !empty($table['header']))
                    <thead class="border-none">
                        @php $id = rand(0, 10000) @endphp
                        @if(isset($group_headings) && is_array($group_headings))
                            @php $span = 0; @endphp
                            <style scoped>
                              td:first-child {
                            text-align: left;
                            padding-left: 0px;
                        }

                        thead th:first-child {
                            text-align: left;
                            padding-left: 0px;
                            max-width: 220px;
                            width: 220px;
                        }

                        tbody td:first-child {
                            max-width: 220px;
                            width: 220px;
                        }


                                @foreach($group_headings as $heading)
                                    .has-border-{{$id}}:nth-child({{$span = intval($heading['span'] ?? 0) + $span}}) {
                                        box-shadow: 5px -3px 1px -4px currentColor;
                                    }

                                @endforeach .has-border-{{$id}}:last-child,
                                    th[colspan]:last-child {
                                        border: none;
                                    }
                                </style>
                                <tr class="group-heading">
                                    @foreach($group_headings as $heading)
                                        <th colspan="{{ $heading['span'] ?? 1 }}" class="tracking-wider prose-h4:my-0 prose-h3:my-0 text-left px-2 py-4">
                                            {!! $heading['title'] ?? '' !!}
                                        </th>
                                    @endforeach
                                </tr>
                        @endif
                            <tr>
                                @php $count = count($table['header']); @endphp
                                @foreach($table['header'] as $th)
                                                    <th id="{{ $table_id ?? str_replace(' ', '_', $table_caption) }}-{{ $n }}" scope="col" @class([
            "has-border-{$id} px-2 py-4" => isset($group_headings),
            'tracking-wider prose-h4:my-0 prose-h3:my-0 text-left',
            'align-top' => true
        ])>{!! $th['c'] !!}</th>
                                                    @php
        if ($n > $count) {
            $n = $count;
        } else {
            $n++;
        }
                                                    @endphp
                                @endforeach
                        </tr>
                    </thead>
        @endif
        @isset($table['body'])
            <tbody class="prose-ul:list-disc prose-ul:text-left prose-td:p-2">
                @php $n--; @endphp
                @foreach($table['body'] as $tr)
                    @php $m = 0; @endphp
                    <tr class="border-black">
                        @foreach($tr as $td)
                            <td headers="{{ $table_id ?? str_replace(' ', '_', $table_caption) }}-{{ $m }}"
                                class="prose-h4:mt-0 py-2 border-b-[1px] border-[#878787] @if(($m !== 0) && (isset($table['caption']) && trim(strip_tags($table['caption'])) === 'Table 7.9')) align-top @endif">
                                {!! nl2br($td['c']) !!}
                            </td>
                            @php $m++; @endphp
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        @endisset
    </table>
</div>
