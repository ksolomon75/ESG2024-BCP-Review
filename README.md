# Alamos ESG 2024 Coding Standards Review

## Introduction

This document reviews coding practices in the Alamos ESG 2024 project, highlighting areas for improvement and providing recommendations. The aim is to support better maintainability, performance, and collaboration by focusing on code readability, modularity, and adherence to best practices. Files from each folder have been collected and annotated with examples to help guide positive changes.

The output from the `phpcs` linter is also included, showing coding standard violations before and after automated fixes. This helps illustrate the impact of following standards and the improvements that result.

## Project Structure

Each folder containing functional code is represented in this review (including the root folder). Each folder (except for the root) contains its own README file, documenting areas for improvement and listing the files reviewed. The root folder provides a summary of the findings and recommendations for each area.

## General Notes

- Consistent code formatting is essential for readability and reducing cognitive load for everyone working on the codebase.
  - Please ensure your editor and plugins support the agreed formatting standards. If a tool is causing issues, consider adjusting or replacing it to maintain consistency.
- Separation of concerns is important, especially regarding HTML, CSS, and JavaScript:
  - Blade files should primarily contain HTML and Blade syntax, with minimal embedded JavaScript or CSS.
  - JavaScript should be placed in dedicated `.js` files and enqueued properly.
  - CSS should be placed in dedicated `.css` files and enqueued properly.
- Variable names should be descriptive and meaningful. For example, prefer `$block_id`, `$block_instance`, or `$block_info` over ambiguous names like `$bi`.
- Comments should be used to clarify complex logic or decisions, especially where the code may not be self-explanatory.
- Regular code reviews are encouraged to help everyone adhere to standards and best practices.

## Review Summary

The following files were found to have areas that do not meet the coding standards and best practices. Addressing these will help us build a stronger, more maintainable codebase:

- Folder: `blocks`
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
- Folder: `components`
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
- Folder: `partials`
  - `page-hero-homepage.blade.php`
  - `table.blade.php`
- `functions.php`
- `index.php`
