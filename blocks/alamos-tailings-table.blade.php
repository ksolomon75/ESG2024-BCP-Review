{{--
  Title: Alamos Tailings Table Block
  Description: 
  Category: design
  Icon: align-wide
  Keywords: section content
  Mode: auto
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
$table = get_field('tailings_table');
$id = get_field('table_id');
@endphp
@if ($id == 0 || empty($id) || $id == null || $id == '' || $id == false || $id == 'false' || $id == '0' || $id > 3)
<h2 class="text-center my-10">Table ID is does not match an existing Tailings table</h2>
@else
<style>
.tailings-table td:first-child {
    text-align: center;
}
</style>
@if (!empty($table))
<div class="overflow-x-auto">
    <table class="tailings-table bg-[#ffbe5b] px-10 container text-center h-4/5 my-0">
        @if (!empty($table['caption']))
        <caption class="text-right pb-2 pr-2">{!! $table['caption'] !!}</caption>
        @endif
        @if (!empty($table['header']))
        <thead class="bg-[#fea83e]">
            <tr>
                @foreach ($table['header'] as $th)
                <th class="p-2 font-normal align-middle">{!! $th['c'] !!}</th>
                @endforeach
            </tr>
        </thead>
        @endif
        @if($id == 1)
        <tbody class="text-center prose-td:first:text-center">
            @foreach ($table['body'] as $rowIndex => $tr)
            <tr class="py-2" @if($rowIndex==4) style="background-color: #fea83e;" @endif>
                @foreach ($tr as $cellIndex => $td)
                @if($rowIndex == 0 && $cellIndex == 0)
                <td class="p-2 align-middle" rowspan="9">{!! $td['c'] !!}</td>
                @elseif($rowIndex < 9 && $cellIndex==0) <!-- Skip rendering the first cell for the next 8 rows -->
                    @continue
                    @elseif($rowIndex == 0 && ($cellIndex == 1 || $cellIndex == 2 || $cellIndex == 3 || $cellIndex ==
                    9))
                    <td class="p-2 align-middle" rowspan="4">{!! $td['c'] !!}</td>
                    @elseif($rowIndex > 0 && $rowIndex < 4 && ($cellIndex==1 || $cellIndex==2 || $cellIndex==3 ||
                        $cellIndex==9)) @continue @elseif($rowIndex==5 && ($cellIndex==3 || $cellIndex==9)) <td
                        class="p-2 align-middle" rowspan="4">{!! $td['c'] !!}</td>
                        @elseif($rowIndex > 5 && $rowIndex < 9 && ($cellIndex==3 || $cellIndex==9)) @continue <!--
                            COLOUR -->
                            @elseif($rowIndex==6 && $cellIndex !=3 && $cellIndex !=9) <td class="p-2 align-middle"
                                style="background-color: #ffb44d;">{!! $td['c'] !!}
                            </td>
                            @elseif($rowIndex == 7 && $cellIndex != 3 && $cellIndex != 9)
                            <td class="p-2 align-middle" style="background-color: #fea83e;">{!! $td['c'] !!}
                            </td>
                            @elseif($rowIndex == 8 && $cellIndex != 3 && $cellIndex != 9)
                            <td class="p-2 align-middle" style="background-color: #f89d3a;">{!! $td['c'] !!}
                            </td>
                            @elseif($rowIndex == 1 && ($cellIndex == 4 || $cellIndex == 5 || $cellIndex == 6 ||
                            $cellIndex
                            == 7 || $cellIndex == 8))
                            <td class="p-2 align-middle" style="background-color: #ffb44d;">{!! $td['c'] !!}
                            </td>
                            @elseif($rowIndex == 2 && ($cellIndex == 4 || $cellIndex == 5 || $cellIndex == 6 ||
                            $cellIndex
                            == 7 || $cellIndex == 8))
                            <td class="p-2 align-middle" style="background-color: #fea83e;">{!! $td['c'] !!}
                            </td>
                            @elseif($rowIndex == 3 && ($cellIndex == 4 || $cellIndex == 5 || $cellIndex == 6 ||
                            $cellIndex
                            == 7 || $cellIndex == 8))
                            <td class="p-2 align-middle" style="background-color: #f89d3a;">{!! $td['c'] !!}
                            </td>
                            <!-- END COLOUR -->
                            @else
                            <td class="p-2 align-middle">{!! $td['c'] !!}</td>
                            @endif
                            @endforeach
            </tr>
            @endforeach
        </tbody>
        @elseif($id == 2)
        <tbody class="text-center">
            @foreach ($table['body'] as $rowIndex => $tr)
            <tr class="py-2" @if($rowIndex==3) style="background-color: #fea83e;" @endif>
                @foreach ($tr as $cellIndex => $td)
                @if($rowIndex == 0 && $cellIndex == 0)
                <td class="p-2 align-middle" rowspan="7">{!! $td['c'] !!}</td>
                @elseif($rowIndex < 7 && $cellIndex==0) @continue @elseif($rowIndex==0 && ($cellIndex==1 ||
                    $cellIndex==2 || $cellIndex==3 || $cellIndex==9)) <td class="p-2 align-middle" rowspan="3">
                    {!! $td['c'] !!}</td>
                    @elseif($rowIndex > 0 && $rowIndex < 3 && ($cellIndex==1 || $cellIndex==2 || $cellIndex==3 ||
                        $cellIndex==9)) @continue @elseif($rowIndex==4 && ($cellIndex==3 || $cellIndex==9)) <td
                        class="p-2 align-middle" rowspan="3">{!! $td['c'] !!}</td>
                        @elseif($rowIndex > 4 && $rowIndex < 7 && ($cellIndex==3 || $cellIndex==9)) @continue <!--
                            COLOUR -->
                            @elseif($rowIndex== 5 && $cellIndex !=3 && $cellIndex !=9) <td class="p-2 align-middle"
                                style="background-color: #ffb44d;">{!! $td['c'] !!}
                            </td>
                            @elseif($rowIndex == 6 && $cellIndex != 3 && $cellIndex != 9)
                            <td class="p-2 align-middle" style="background-color: #fea83e;">{!! $td['c'] !!}
                            </td>
                            @elseif($rowIndex == 1 && ($cellIndex == 4 || $cellIndex == 5 || $cellIndex == 6 ||
                            $cellIndex
                            == 7 || $cellIndex == 8))
                            <td class="p-2 align-middle" style="background-color: #ffb44d;">{!! $td['c'] !!}
                            </td>
                            @elseif($rowIndex == 2 && ($cellIndex == 4 || $cellIndex == 5 || $cellIndex == 6 ||
                            $cellIndex
                            == 7 || $cellIndex == 8))
                            <td class="p-2 align-middle" style="background-color: #fea83e;">{!! $td['c'] !!}
                            </td>
                            <!-- END COLOUR -->
                            @else
                            <td class="p-2 align-middle">{!! $td['c'] !!}</td>
                            @endif
                            @endforeach
            </tr>
            @endforeach
        </tbody>
        @elseif($id == 3)
        <tbody class="text-center">
            @foreach ($table['body'] as $rowIndex => $tr)
            <tr class="py-2" @if($rowIndex==5) style="background-color: #fea83e;" @endif>
                @foreach ($tr as $cellIndex => $td)
                @if($rowIndex == 0 && $cellIndex == 0)
                <td class="p-2 align-middle" rowspan="11">{!! $td['c'] !!}</td>
                @elseif($rowIndex < 11 && $cellIndex==0) @continue @elseif($rowIndex==0 && ($cellIndex==1 ||
                    $cellIndex==2 || $cellIndex==3 || $cellIndex==9)) <td class="p-2 align-middle" rowspan="5">
                    {!! $td['c'] !!}
                    </td>
                    @elseif($rowIndex > 0 && $rowIndex < 5 && ($cellIndex==1 || $cellIndex==2 || $cellIndex==3 ||
                        $cellIndex==9)) @continue @elseif($rowIndex==6 && ($cellIndex==3 || $cellIndex==9)) <td
                        class="p-2 align-middle" rowspan="5">{!! $td['c'] !!}</td>
                        @elseif($rowIndex > 6 && $rowIndex < 11 && ($cellIndex==3 || $cellIndex==9)) @continue <!--
                            COLOUR -->
                            <!-- ROWS 1 THROUGH 4 -->
                            @elseif($rowIndex == 1 && ($cellIndex == 4 || $cellIndex == 5 || $cellIndex == 6 ||
                            $cellIndex
                            == 7 || $cellIndex == 8))
                            <td class="p-2 align-middle" style="background-color: #ffb44d;">{!! $td['c'] !!}
                            </td>
                            @elseif($rowIndex == 2 && ($cellIndex == 4 || $cellIndex == 5 || $cellIndex == 6 ||
                            $cellIndex
                            == 7 || $cellIndex == 8))
                            <td class="p-2 align-middle" style="background-color: #fea83e;">{!! $td['c'] !!}
                            </td>
                            @elseif($rowIndex == 3 && ($cellIndex == 4 || $cellIndex == 5 || $cellIndex == 6 ||
                            $cellIndex
                            == 7 || $cellIndex == 8))
                            <td class="p-2 align-middle" style="background-color: #f89d3a;">{!! $td['c'] !!}
                            </td>
                            @elseif($rowIndex == 4 && ($cellIndex == 4 || $cellIndex == 5 || $cellIndex == 6 ||
                            $cellIndex
                            == 7 || $cellIndex == 8))
                            <td class="p-2 align-middle" style="background-color: #ed9739;">{!! $td['c'] !!}
                            </td>
                            <!-- ROWS 7 THROUGH 10 -->
                            @elseif($rowIndex==7 && $cellIndex !=3 && $cellIndex !=9) <td class="p-2 align-middle"
                                style="background-color: #ffb44d;">{!! $td['c'] !!}
                            </td>
                            @elseif($rowIndex == 8 && $cellIndex != 3 && $cellIndex != 9)
                            <td class="p-2 align-middle" style="background-color: #fea83e;">{!! $td['c'] !!}
                            </td>
                            @elseif($rowIndex == 9 && $cellIndex != 3 && $cellIndex != 9)
                            <td class="p-2 align-middle" style="background-color: #f89d3a;">{!! $td['c'] !!}
                            </td>
                            @elseif($rowIndex == 10 && $cellIndex != 3 && $cellIndex != 9)
                            <td class="p-2 align-middle" style="background-color: #ed9739;">{!! $td['c'] !!}
                            </td>
                            <!-- END COLOUR -->
                            @else
                            <td class="p-2 align-middle">{!! $td['c'] !!}</td>
                            @endif
                            @endforeach
            </tr>
            @endforeach
        </tbody>
        @endif
    </table>
</div>
@endif
@endif
