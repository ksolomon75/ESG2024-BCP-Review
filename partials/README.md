# Alamos ESG 2024 Coding Standards Review - Partials

## Files Reviewed

This folder contains the following files that were reviewed and found to have significant coding standard violations that must be addressed to ensure the reliability, security, and maintainability of the project:

- `page-hero-homepage.blade.php`
- `table.blade.php`

## Issue Descriptions

Click on each file name to review the list of issues for each file. These issues are not minor and must be resolved to prevent future problems and technical debt.

<details name="problems">
<summary>page-hero-homepage.blade.php</summary>

- Improper code formatting: `if` statements are not indented.
  - Location: Lines 8-10
- General code formatting issues: inconsistent attribute indentation and spacing.
  - Location: Throughout the file
  - Use a consistent style for attributes, either one attribute per line or all attributes on the same line.

</details>

<details name="problems">
<summary>table.blade.php</summary>

- Note: There are multiple issues here that I'm not going to call out.
  - Compare this file to the one in the live repo to see how I cleaned it up.
- Styles are embedded in the Blade file. Move to a separate CSS file or include in the global `vd-blocks.scss` file.
  - Location: Lines 6-11, 20-45, 48-69, 72-139, 174-202 (also has inconsistent indentation).
  - Also has non-functional `scoped` attribute on `<style>` tag.

</details>
