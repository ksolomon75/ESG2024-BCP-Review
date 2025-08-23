# Alamos ESG 2024 Coding Standards Review - Blocks

## Files Reviewed

This folder contains the following files that were reviewed and found to be non-compliant with coding standards:

- `alamos-carousel.blade.php`
- `alamos-chart-block.blade.php`
- `alamos-highlight.blade.php`
- `alamos-lightbox.blade.php`
- `alamos-map.blade.php`
- `alamos-page-directory.blade.php`
- `alamos-pres-msg.blade.php`
- `alamos-section-title.blade.php`
- `alamos-tailings-table.blade.php`
- `bar-chart.blade.php`
- `content-map.blade.php`
- `homepage-report-contents.blade.php`
- `inner-page-nav.blade.php`

## Issue Descriptions

Click on each file name to review the list of issues for each file.

<details name="problems">
<summary>alamos-carousel.blade.php</summary>

- Remote JavaScript packages should be enqueued properly in the theme's `setup.php` file.
  - Location: Lines 71-74
- JavaScript code is embedded in the Blade file. Move to a separate JavaScript file and enqueue properly for maintainability.
  - Location: Lines 76-135
- Remote stylesheets should be enqueued properly in the theme's `setup.php` file.
  - Location: line 70
- Styles are embedded in the Blade file. Move to a separate CSS file or include in the global `vd-blocks.scss` file.
  - Location: Lines 137-320
- Improper code formatting: `foreach` and `if/else` statements are not indented.
  - Location: Lines 34-61, 35-60

</details>

<details name="problems">
<summary>alamos-chart-block.blade.php</summary>

- Improper code formatting: `if` statements and function blocks are not indented.
  - Location: Lines 22-26, 23-25

</details>

<details name="problems">
<summary>alamos-highlight.blade.php</summary>

- Improper code formatting: `if` and `foreach` statements are not indented.
  - Location: Lines 30-32, 39-66, 43-45, 48-63, 52-54, 40-65, 50-61
- `<div>` elements are not properly aligned.
  - Location: Lines 56-57

</details>

<details name="problems">
<summary>alamos-lightbox.blade.php</summary>

- Styles are embedded in the Blade file. Move to a separate CSS file or include in the global `vd-blocks.scss` file.
  - Location: Lines 27-97
- JavaScript code is embedded in the Blade file. Move to a separate JavaScript file and enqueue properly for maintainability.
  - Location: Lines 147-230

</details>

<details name="problems">
<summary>alamos-map.blade.php</summary>

- Remote JavaScript packages should be enqueued properly in the theme's `setup.php` file.
  - Location: Lines 21, 26, 28
- Remote stylesheets should be enqueued properly in the theme's `setup.php` file.
  - Location: Lines 22, 24, 25
- JavaScript code is embedded in the Blade file. Move to a separate JavaScript file and enqueue for maintainability.
  - Location: Lines 44-397

</details>

<details name="problems">
<summary>alamos-page-directory.blade.php</summary>

- `<section>` element attributes not indented properly.
  - Location: Lines 75-77
- `<a>` element attributes not indented properly.
  - Location: Lines 93-94
  - Either indent all attributes or keep all attributes on the same line for better readability.

</details>

<details name="problems">
<summary>alamos-pres-msg.blade.php</summary>

- `<div>` element class attribute contains newline and not indented properly.
  - Location: Lines 26-31
  - Consider creating a specific class for this element and moving the class list to external CSS file for better readability.
- `<img>` element attributes not indented properly.
  - Location: Lines 33-36
  - Either indent all attributes or keep all attributes on the same line for better readability.

</details>

<details name="problems">
<summary>alamos-section-title.blade.php</summary>

- Improper code formatting: `if`, `switch`, and `foreach` statements are not indented.
  - Location: Lines 65-67, 74-81, 82-89, 83-88, 108-121, 126-242, 145-156, 164-229, 176-189, 191-208, 246-256, 259-264
- Unnecessary commented code.
  - Location: Lines 159-163
  - This is also a `<style>` block that should be moved to a separate CSS file.

</details>

<details name="problems">
<summary>alamos-tailings-table.blade.php</summary>

- Overall code structure should be improved for better readability and maintainability.
- Styles are embedded in the Blade file. Move to a separate CSS file or include in the global `vd-blocks.scss` file.
  - Location: Lines 27-31
- Improper code formatting: `if` and `foreach` statements are not indented.
  - Location: Lines 24-198, 32-197, 35-37, 38-46, 47-193, 49-94, 51-92, 52-91, 98-133, 100-131, 101-130, 137-189, 139-190 140-188

</details>

<details name="problems">
<summary>bar-chart.blade.php</summary>

- Remote JavaScript packages should be enqueued properly in the theme's `setup.php` file.
  - Location: Lines 88, 89
- JavaScript code is embedded in the Blade file. Move to a separate JavaScript file and enqueue properly for maintainability.
  - Location: Lines 90-585
- Styles are embedded in the Blade file. Move to a separate CSS file or include in the global `vd-blocks.scss` file.
  - Location: Lines 79-86

<details name="problems">
<summary>content-map.blade.php</summary>

- Improper code formatting: `if`, `foreach`, and `isset` statements are not indented.
  - Location: Lines 43-76, 46-54, 49-51, 56-72, 59-64 (includes the `@endphp` line), 66-70, 78-86

</details>

<details name="problems">
<summary>homepage-report-contents.blade.php</summary>

- Improper code formatting: `if` and `foreach` statements are not indented.
  - Location: Lines 28-51, 29-50, 37-48, 39-46
- JavaScript code is embedded in the Blade file. Move to a separate JavaScript file and enqueue properly for maintainability.
  - Location: Lines 56-66

</details>

<details name="problems">
<summary>inner-page-nav.blade.php</summary>

- JavaScript code is embedded in the Blade file. Move to a separate JavaScript file and enqueue properly for maintainability.
  - Location: Lines 85-177

</details>
