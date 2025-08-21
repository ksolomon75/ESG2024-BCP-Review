{{--
Title: Alamos Chart Block
Description:
Category: vdi-blocks
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
$id = get_field('chart_id');
if (!function_exists('build_component_name')) {
function build_component_name ($identifier) {
return "figure-{$identifier}";
}
}
@endphp
<x-dynamic-component :component="build_component_name($id)" />
