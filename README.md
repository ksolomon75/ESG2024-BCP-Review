# Alamos ESG 2024 Coding Standards Review

## Introduction

This document reviews coding practices in the Alamos ESG 2024 project, highlighting areas for improvement and providing recommendations. The aim is to support better maintainability, performance, and collaboration by focusing on code readability, modularity, and adherence to best practices. Files from each folder have been collected and annotated with examples to help guide positive changes.

The output from the `phpcs` linter is also included, showing coding standard violations before and after automated fixes. This helps illustrate the impact of following standards and the improvements that result.

## Project Structure

Each folder containing functional code is represented in this review (including the theme root folder). Each folder contains its own README file, documenting areas for improvement and listing the files reviewed. The root folder provides a summary of the findings and recommendations for each area.

## General Notes

- Consistent code formatting is essential for readability and reducing cognitive load for everyone working on the codebase.
  - Ensure your editor and plugins support the agreed formatting standards. If a tool is causing issues, consider adjusting its settings or replacing it to maintain consistency.  "The plugin I'm using did that" is not a valid excuse for not following the standards.
  - Use the same formatting throughout the project.  Some blocks, for example, have a newline after the block definition and some don't.
- Separation of concerns is important, especially regarding HTML, CSS, and JavaScript:
  - Blade files should primarily contain HTML and Blade syntax, with minimal embedded JavaScript or CSS.
  - Remotely-hosted files should be enqueued properly in the theme's `setup.php` file.
  - JavaScript should be placed in dedicated `.js` files and enqueued properly.
  - CSS should be placed in dedicated `.css` files and enqueued properly.
- Variable names should be descriptive and meaningful. For example, prefer `$block_id`, `$block_instance`, or `$block_info` over ambiguous names like `$bi`.
- Comments should be used to clarify complex logic or decisions, especially where the code may not be self-explanatory.
- Regular code reviews are encouraged to help everyone adhere to standards and best practices.

## Testing Method

The testing method for this project involves a combination of automated and manual testing approaches:

1. **Automated Testing**: Utilize `phpcs` with the Standard and WordPress coding standards packages for testing PHP code (with certain exceptions, as seen in the [.phpcs.xml](.phpcs.xml) file), ensuring adherence to coding standards.
   - See the [phpcs-results.txt](`phpcs-results.txt`) file for the results after running `phpcs`.
2. **Automated Fixes**: Utilize `phpcbf` with the same standards as `phpcs` to automatically fix many of the issues identified by `phpcs`.
   - See the [phpcs-results-fixed.txt](`phpcs-results-fixed.txt`) file for the results after running `phpcbf`.
3. **Manual Code Reviews**: Review each file manually to ensure compliance with coding standards and best practices (`phpcs` doesn't catch everything, and doesn't catch problems in Blade directives). This includes checking for proper formatting, adherence to the separation of concerns, and the use of meaningful variable names.

## Review Summary

The following files were found to have areas that do not meet the coding standards and best practices. Addressing these will help us build a stronger, more maintainable codebase:

- `phpcs` Results - Before automated fixes - [`phpcs-results.txt`](phpcs-results.txt)
- `phpcs` Results - After automated fixes using `phpcbf` - [`phpcs-results-fixed.txt`](phpcs-results-fixed.txt)
- Folder: [`root`](root/README.md) - Theme root files found to have issues
  - `functions.php`
  - `index.php`
- Folder: [`blocks`](blocks/README.md) - Theme block files found to have issues
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
- Folder: [`components`](components/README.md) - Theme component files found to have issues
  - `chevron-l.blade.php`
  - `chevron-r.blade.php`
  - `figure-4-1.blade.php`
  - `figure-4-2.blade.php`
  - `figure-4-4.blade.php`
  - `figure-5-4.blade.php`
  - `figure-6-1.blade.php`
  - `figure-6-5.blade.php`
  - `figure-6-6.blade.php`
  - `figure-6-7.blade.php`
  - `icon-arrow.blade.php`
  - `icon-list.blade.php`
- Folder: [`partials`](partials/README.md) - Theme partial files found to have issues
  - `page-hero-homepage.blade.php`
  - `table.blade.php`
