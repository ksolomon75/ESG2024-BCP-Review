# Alamos ESG 2024 Bad Coding Practices Review

## Introduction

This document serves as a review of the bad coding practices identified in the Alamos ESG 2024 project. The goal is to highlight these practices and provide recommendations for improvement.  I have identified several areas where coding standards were not followed, leading to potential issues in maintainability and performance, with a focus on code readability, modularity, and adherence to best practices.  I have collected files from each folder and will annotate them with specific examples of the identified issues.

Also included is the output from the `phpcs` linter, which has been run on the codebase to identify coding standard violations. The output is included at the end of this document, with results from both before and after fixing the problems found that could be handled automatically.

## Project Structure

Each folder that contains functional code is represented in this review (including the root folder).  Each folder (except for the root) contains it's own readme file, which documents the deficiencies found in that folder, along with the files that were reviewed.  The root folder contains a summary of the issues found in each folder, along with the files that were reviewed.

## General Notes

- Consistent code formatting is crucial for maintaining readability and reducing cognitive load for developers working on the codebase.
  - "My editor did it for me" is not a valid excuse for poor code formatting.  If a formatting plugin you're using is breaking things, it needs to be removed from your editor.
- Proper separation of concerns should be enforced, particularly with respect to HTML, CSS, and JavaScript. This means:
  - Blade files should primarily contain HTML and Blade syntax, with no (or VERY minimal) embedded JavaScript or CSS.
  - JavaScript should be placed in dedicated `.js` files and enqueued properly.
  - CSS should be placed in dedicated `.css` files and enqueued properly.
- Comments should be used liberally to explain complex logic or decisions, particularly in areas where the code may not be self-explanatory.
- Regular code reviews should be conducted to ensure adherence to coding standards and best practices.

## Review Summary

The following files were found to have issues that violate the coding standards and best practices:

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
