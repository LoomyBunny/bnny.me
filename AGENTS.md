# AGENTS.md

This file contains guidelines and commands for agentic coding agents working in this PHP/HTML/CSS codebase.

## Project Overview

This is a simple PHP-based photo gallery website with multiple sections:
- Main index page with random background images and horizontal navigation
- Photo albums page with Google Photos links
- Tablet and fluid badge pages with secret content
- Blog section with placeholder landing page
- Shared CSS styling across all pages with mobile-first responsive design

## Build/Lint/Test Commands

### PHP Syntax Checking
```bash
# Check syntax of all PHP files
find . -name "*.php" -exec php -l {} \;

# Check syntax of single file
php -l path/to/file.php

# Example: check main page
php -l index.php
```

### CSS Validation
```bash
# No automated CSS validation setup - manually check CSS rules
# Use online validators like https://jigsaw.w3.org/css-validator/
# Check for duplicate selectors and conflicts
```

### Testing
```bash
# No formal test suite - manual testing required
# Test by accessing pages in browser:
# - http://localhost/ (main page)
# - http://localhost/albums/ (photo albums)
# - http://localhost/tablet/ (tablet page)
# - http://localhost/fluid/ (fluid badge page)
# - http://localhost/blog/ (blog page)

# Mobile testing: Check iPhone Dynamic Island compatibility
# Use Safari developer tools or actual device testing
```

## Code Style Guidelines

### PHP Conventions
- Use `<!DOCTYPE php>` at start of PHP files (existing convention)
- Use `<?php` and `?>` tags appropriately
- PHP variables use camelCase: `$imageDir`, `$randomImage`, `$navItems`
- Array variables use plural names: `$images`, `$navItems`
- Use associative arrays for structured data: `$navItems` with `url` and `text` keys
- File operations use absolute paths: `/var/www/html/img/randomimage.jpg`
- Use `glob()` with `GLOB_BRACE` for file pattern matching
- Use `array_rand()` for random selection from arrays
- Use `copy()` for file operations
- Use `time()` for cache busting in URLs: `?<?php echo time()?>`
- Cache busting for CSS: `?v=<?php echo time();?>`

### HTML Structure
- Use HTML5 doctype: `<!DOCTYPE html>` or `<!DOCTYPE php>`
- Include proper meta tags: charset, viewport with `viewport-fit=cover` for mobile
  ```html
  <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
  ```
- Link CSS files with cache busting: `<link rel="stylesheet" href="/css/style.css?v=<?php echo time(); ?>">`
- Use semantic HTML5 elements where appropriate
- Forms should use proper action attributes and submit buttons
- Use absolute paths for resources: `/css/style.css`, `/img/randomimage.jpg`

### CSS Conventions
- Use universal selector reset: `*{ margin: 0; padding: 0; box-sizing: border-box; }`
- Font family: `Arial, Helvetica, sans-serif`
- Use kebab-case for class names: `.container`, `.content`, `.nav`, `.fixed-width`
- Use flexbox/grid for layout: `display: grid`, `place-items: center`, `display: flex`
- Responsive design with viewport meta tag including `viewport-fit=cover`
- Fixed positioning for navigation: `position: fixed`, `top: 0`, `z-index: 1000`
- Mobile safe area support: `padding-top: calc(8px + env(safe-area-inset-top))`
- Black backgrounds for mobile compatibility: `background: #000`
- Consistent button styling with hover effects and transitions
- Avoid duplicate CSS rules - remove redundancy

### JavaScript Conventions
- Use function declarations: `function refresh(){}`
- Use vanilla JavaScript (no frameworks)
- Event handlers in onclick attributes: `onclick="refresh()"`
- Use `window.location.reload(true)` for hard refresh
- Place scripts before closing body tag

### Mobile/Responsive Considerations
- Always test on actual mobile devices, especially iPhone
- Use `env(safe-area-inset-*)` for Dynamic Island/notch compatibility
- Black backgrounds instead of transparent for consistency
- Fixed navigation positioning to cover viewport edges
- Test button sizing and spacing on touch interfaces

### File Organization
- PHP files in respective directories: `/tablet/index.php`, `/fluid/index.php`, `/blog/index.php`
- Shared CSS in `/css/style.css`
- Images in `/img/` directory
- Secret pages in `/secret/` subdirectories

### Error Handling
- No formal error handling in current codebase
- Recommended: Add checks for file existence using `file_exists()`
- Recommended: Add error handling for image operations
- Recommended: Validate external links and array indices
- Consider empty array handling for `glob()` operations

### Security Considerations
- Current code copies files from external directory - validate paths
- Sanitize user input if added later
- Use HTTPS for external links (already implemented)
- Consider adding CSP headers for additional security

### Naming Conventions
- Files: kebab-case for directories, `index.php` for main files
- PHP variables: camelCase
- CSS classes: kebab-case
- HTML elements: lowercase tags
- Navigation items: descriptive names in `$navItems` array

### DRY Principles
- Avoid duplicate CSS rules (found in previous versions)
- Use PHP arrays and loops for repetitive HTML structures
- Consolidate similar button styles into shared classes
- Remove inline styles when possible

### Comments and Documentation
- Minimal comments in current codebase
- Recommended: Add PHPDoc blocks for functions
- Recommended: Add comments for complex logic like safe-area handling
- Recommended: Document array structures and external dependencies

## Development Workflow

1. Make changes to PHP/CSS/HTML files
2. Run PHP syntax check: `php -l filename.php`
3. Test in browser by accessing relevant page
4. Test on mobile devices (especially iPhone)
5. Check image loading and random image functionality
6. Verify all links work correctly
7. Test navigation responsive behavior
8. Check for CSS duplicate rules

## Common Issues to Check

- Random image generation and copying functionality
- External link accessibility
- CSS styling consistency across pages
- Proper path resolution for resources
- Mobile responsive layout behavior
- JavaScript functionality (refresh button)
- Safe area handling on mobile devices
- Duplicate CSS rules causing conflicts
- Cache busting effectiveness

## CSS Caching Strategy

Always use cache busting for CSS files during development:
```html
<link rel="stylesheet" href="/css/style.css?v=<?php echo time(); ?>">
```

## Mobile Testing Priority

- iPhone Dynamic Island compatibility is critical
- Test navigation bar extends to top edge
- Verify black background covers safe areas
- Check button sizing and touch targets