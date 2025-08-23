# Alamos ESG 2024 Coding Standards Review - Components

## Files Reviewed

This folder contains the following files that were reviewed and found to be non-compliant with coding standards:

- `functions.php`
- `index.php`

## Issue Descriptions

Click on each file name to review the list of issues for each file.

<details name="problems">
<summary>functions.php</summary>

- This file should 100% NEVER be edited.  All functionality should be in the `setup.php` file or other included files.
- Improper code formatting
  - Location: Throughout the file
  - `if` and `function` statements not properly indented.
- Improperly enqueued scripts and styles: Ensure all scripts and styles are enqueued properly in the `setup.php` file.
  - Location: Lines 67-82
  - Done properly, you don't need that echo statement inserting content into the footer.
- Improper filter location
  - Location: Lines 84-117
  - This should be in the `filters.php` file, not in `functions.php`.
  - You also shouldn't embed the CSS in this filter.  Put it in the `common.scss` file or similar.

</details>

<details name="problems">
<summary>index.php</summary>

- Generally, this file should never be edited.  These changes can and should be made elsewhere.
- Remote JavaScript packages should be enqueued properly in the theme's `setup.php` file.
  - Location: Line 7
- Remote stylesheets should be enqueued properly in the theme's `setup.php` file.
  - Location: Line 22
- Google Tag Manager code is embedded in the php file.
  - Location: Lines 10-20. It would, however,  be better in an element with a Custom HTML block in the `Below Footer` position.  This makes it easier to maintain and update.

</details>
