# Alamos ESG 2024 Coding Standards Review - Root

## Files Reviewed

This folder contains the following files that were reviewed and found to have significant coding standard violations that must be addressed to ensure the reliability, security, and maintainability of the project:

- `functions.php`
- `index.php`

## Issue Descriptions

Click on each file name to review the list of issues for each file.

<details name="problems">
<summary>functions.php</summary>

- This file should never be edited directly. All functionality must be placed in the `setup.php` file or other included files to avoid introducing instability and maintenance risks.
- Code formatting issues are present throughout the file, including improper indentation of `if` and `function` statements. Consistent formatting is essential for code clarity and team collaboration.
- Scripts and styles are not properly enqueued. All scripts and styles must be enqueued in the `setup.php` file to ensure proper loading and security. Directly echoing content into the footer is not acceptable and can lead to unpredictable behavior.
- Filters are placed incorrectly. Filters should be located in the `filters.php` file, not in `functions.php`. Embedding CSS in filters is discouraged; styles should be placed in the appropriate SCSS file for maintainability.

</details>

<details name="problems">
<summary>index.php</summary>

- This file should not be edited directly. Any changes should be made in the appropriate theme files to prevent future conflicts and ensure maintainability.
- Remote JavaScript packages are not properly enqueued. All scripts must be enqueued in the theme's `setup.php` file to comply with WordPress standards and avoid security vulnerabilities.
- Remote stylesheets are not properly enqueued. All styles must be enqueued in the theme's `setup.php` file for consistency and reliability.
- Google Tag Manager code is embedded directly in the PHP file. This practice can introduce maintenance issues. It is strongly recommended to place such code in an Element using a Custom HTML block in the `Below Footer` position for easier management and updates.

</details>
