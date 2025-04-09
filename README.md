# Express Cash - Loan Application System

## Project Overview
Express Cash is a bilingual (English/French) loan application system that allows users to apply for various types of loans. The system includes a multi-step application process, informational pages about different loan types, and comprehensive documentation about loan services.

## Project Structure

### Core Application Files
- `multi-step-application.php` - Main loan application form (English)
- `multi-step-application-fr.php` - Main loan application form (French)
- `process-multi-step-form.php` - Form processing logic (English)
- `process-multi-step-form-fr.php` - Form processing logic (French)
- `thank-you.php` - Success page after form submission (English)
- `merci-fr.php` - Success page after form submission (French)

### Common Components
- `header.php` - Common header component
- `footer-en.php` - Footer component (English)
- `footer-fr.php` - Footer component (French)

### Main Pages
- `index.php` - Homepage (English)
- `home-fr.php` - Homepage (French)
- `contact.php` - Contact page (English)
- `contact-fr.php` - Contact page (French)

### Loan Information Pages
- Various loan amount pages (500-2000):
  - English: `500-loan.php`, `1000-loan.php`, `1500-loan.php`, `2000-loan.php`
  - French: `pret-500.php`, `pret-1000.php`, `pret-1500.php`, `pret-2000.php`

### Legal Pages
- `privacy-policy.php` / `politique-de-confidentialite.php`
- `terms-of-use.php` / `conditions-d-utilisation.php`

### Asset Directories
- `/images/` - Image assets
- `/css/` - Stylesheets
- `/js/` - JavaScript files
- `/splide-4.1.3/` - Splide carousel library

## Technologies Used
- PHP
- MySQL (for form processing)
- Bootstrap 5.3.0
- jQuery 3.5.1
- Font Awesome 6.0.0
- Splide 4.1.3 (for carousels)

## Multi-Step Application Form Features
1. Previous borrowing verification
2. Social connection
3. Personal information collection
4. Address information
5. Financial information
6. Employment information
7. Review and submission

## Form Validation
- Client-side validation using JavaScript
- Server-side validation in process-multi-step-form.php
- Required field checking
- Data type validation
- Custom validation rules for specific fields (e.g., postal code format)

## Maintenance and Updates

### Adding New Loan Types
1. Create new information pages following the existing pattern
2. Update the navigation menus in both languages
3. Add corresponding routes in `.htaccess`

### Modifying the Application Form
1. Edit the form steps in `multi-step-application.php` and `multi-step-application-fr.php`
2. Update the corresponding processing logic in `process-multi-step-form.php` and `process-multi-step-form-fr.php`
3. Test thoroughly in both languages

### Style Updates
1. Main styles are in the `<style>` section of application files
2. Common styles should be moved to `/css/` directory
3. Update Bootstrap classes as needed

## Important Notes
1. The project uses bilingual routing - maintain both language versions when adding new features
2. Form processing includes security measures - maintain these when modifying
3. Webflow.js has been removed from footers to prevent form conflicts
4. All forms should include CSRF protection
5. Maintain responsive design across all pages

## Development Guidelines
1. Always test in both languages
2. Maintain consistent styling across all pages
3. Follow existing naming conventions
4. Keep form validation consistent
5. Update both language versions simultaneously
6. Test across different devices and browsers
7. Maintain security measures in form processing

## Security Considerations
1. Form validation on both client and server side
2. CSRF protection on all forms
3. Secure handling of user data
4. Input sanitization
5. Proper error handling
6. Secure file uploads (if implemented)

## Performance Optimization
1. Optimize images before uploading
2. Minimize CSS and JavaScript
3. Use CDN for libraries where possible
4. Enable caching through .htaccess
5. Keep third-party scripts to minimum

## Backup and Deployment
1. Regular database backups
2. Version control using Git
3. Test all changes in staging environment
4. Document all major changes
5. Maintain change log

## Contact and Support
For technical support or questions about the codebase, contact the development team.

## Version History
Document major updates and changes here.

---
Last Updated: [Current Date] 