# Alamos ESG 2024 Coding Standards Review - Components

## Files Reviewed

This folder contains the following files that were reviewed and found to have significant coding standard violations that must be addressed to ensure the reliability, security, and maintainability of the project:

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

## Issue Descriptions

Click on each file name to review the list of issues for each file. These issues are not minor and must be resolved to prevent future problems and technical debt.

<details name="problems">
<summary>chevron-l.blade.php & chevron-r.blade.php</summary>

- Not following theme standards.
  - Move these to `icons` directory and use them properly.
- `<svg>` elements improperly formatted.
  - Ensure proper indentation and line breaks for readability.

</details>

<details name="problems">
<summary>figure-*.blade.php</summary>

- Do you really need all these empty files?
  - Not every figure has a corresponding Blade file, consider removing these to reduce clutter and confusion.

</details>

<details name="problems">
<summary>icon-arrow.blade.php & icon-list.blade.php</summary>

- Not following theme standards.
  - Move these to `icons` directory and use them properly.
- `<svg>` elements improperly formatted.
  - Ensure proper indentation and line breaks for readability.

</details>
