# Alamos ESG 2024 Bad Coding Practices Review - Blocks

## Files Reviewed

This folder contains the following files that were reviewed for bad coding practices:

- alamos-carousel.blade.php
- alamos-chart-block.blade.php
- alamos-highlight.blade.php
- alamos-lightbox.blade.php
- alamos-map.blade.php
- alamos-page-directory.blade.php
- alamos-pres-msg.blade.php
- alamos-section-title.blade.php
- alamos-tailings-table.blade.php
- bar-chart.blade.php
- content-map.blade.php
- homepage-report-contents.blade.php
- inner-page-nav.blade.php

### alamos-carousel.blade.php

- Remote javascript packages should be enqueued properly in the theme's `setup.php` file.
  - Location: Lines 71-74
- Javascript code embedded in the blade file, which should be moved to a separate JavaScript file and enqueued properly for better maintainability.
  - Location: Lines 76-135
  - Put this into a specialized JavaScript file, and enqueue it in the theme's `app.js` file (properly commented).
- Remote stylesheets should be enqueued properly in the theme's `setup.php` file.
  - Location: line 70
- Styles should not be embedded in blade files. Move to separate file and enqueue properly.
  - Location: Lines 137-320
  - Put this into a specialized css file, or include it in the global `vd-blocks.scss` file (properly commented).
- Improper code formatting
  - `foreach` not indented
    - Location: Lines 34-61
    - `foreach` loop content should be indented to improve readability and maintainability.
  - `if/else` statements not indented
    - Location: Lines 35-60
    - `if/else` statement content should be indented to improve readability and maintainability.
