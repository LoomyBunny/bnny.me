# AGENTS.md

This file contains guidelines and commands for agentic coding agents working in this PHP/HTML/CSS codebase.

## Project Overview

This is a simple PHP-based photo gallery website with multiple sections:
- Main index page with random background images and horizontal navigation
- Photo albums page with Google Photos links
- Tablet and fluid badge pages with secret content
- Blog section with placeholder landing page
- Projects page showcasing hardware/software projects
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

# Syntax validation before commits
git add .
php -l $(git diff --cached --name-only | xargs -I {} php -l)
```

### CSS Validation
```bash
# No automated CSS validation setup - manually check CSS rules
# Use online validators like https://jigsaw.w3.org/css-validator/
# Check for duplicate selectors and rules using tools like `csslint` if available
```

### Manual Testing
```bash
# No formal test suite - manual testing required
# Test by accessing pages in browser:
# - http://localhost/ (main page)
# - http://localhost/albums/ (photo albums)
# - http://localhost/tablet/ (tablet page)
# - http://localhost/fluid/ (fluid badge page)
# - http://localhost/projects/ (projects page)
# - http://localhost/blog/ (blog page)

# Mobile testing: Check iPhone Dynamic Island compatibility
# Use Safari developer tools or actual device testing

# Cross-browser testing
# - Chrome, Firefox, Safari (mobile/desktop)
# - Test navigation active states and responsive behavior
```

## Code Style Guidelines

### PHP Conventions
- Use `<!DOCTYPE php>` at start of PHP files (existing convention)
- Use `<?php` and `?>` tags appropriately, avoid mixing with HTML
- PHP variables use camelCase: `$imageDir`, `$randomImage`, `$navItems`
- Array variables use plural names: `$images`, `$albumLinks`, `$albumNames`
- Use associative arrays for structured data: `$navItems` with `url` and `text` keys
- File operations use absolute paths: `/var/www/html/img/randomimage.jpg`
- Use `glob()` with `GLOB_BRACE` for file pattern matching
- Use `array_rand()` for random selection from arrays
- Use `copy()` for file operations, check return values
- Use `time()` for cache busting in URLs: `?<?php echo time()?>`
- Use `$_SERVER['REQUEST_URI']` for path detection, sanitize with `strtok()`
- Parse URLs with `parse_url()` for path extraction from external URLs
- Use `htmlspecialchars()` for any user input/output when implemented

### HTML Structure
- Use HTML5 doctype: `<!DOCTYPE html>` or `<!DOCTYPE php>`
- Include proper meta tags: charset, viewport with `viewport-fit=cover` for mobile
  ```html
  <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
  ```
- Link CSS files with cache busting: `<link rel="stylesheet" href="/css/style.css?v=<?php echo time(); ?>">`
- Use semantic HTML5 elements where appropriate (`<header>`, `<nav>`, `<main>`, `<footer>`)
- Forms should use proper action attributes and submit buttons
- Use absolute paths for resources: `/css/style.css`, `/img/randomimage.jpg`
- Include navigation with `<?php include 'includes/navigation.php'; ?>` for consistency

### CSS Architecture
- Use universal selector reset: `*{ margin: 0; padding: 0; box-sizing: border-box; }`
- Font family: `Arial, Helvetica, sans-serif`
- Use kebab-case for class names: `.container`, `.content`, `.nav`, `.fixed-width`
- Mobile-first approach: Design for mobile first, then scale up
- Use flexbox/grid for layout: `display: grid`, `place-items: center`, `display: flex`
- Responsive design with viewport meta tag including `viewport-fit=cover`
- Fixed positioning for navigation: `position: fixed`, `top: 0`, `z-index: 1000`
- Mobile safe area support: `padding-top: calc(8px + env(safe-area-inset-top))`
- Black backgrounds for mobile compatibility: `background: #000`
- Consistent button styling with hover effects and transitions
- Avoid duplicate CSS rules - remove redundancy
- Use CSS inheritance where beneficial to reduce repetition

#### Button Class Hierarchy
```css
.nav button        /* Navigation bar buttons - compact, 80px width, 10px font */
.content-btn      /* Page content buttons - larger text, 12px font, auto-width */
.footer-btn      /* Fixed footer buttons - 80px width, bottom positioning */
```

### JavaScript Conventions
- Use function declarations: `function refresh(){}`
- Use vanilla JavaScript (no frameworks)
- Event handlers in onclick attributes: `onclick="refresh()"`
- Use `window.location.reload(true)` for hard refresh
- Place scripts before closing body tag
- Use semantic event listeners when expanding functionality

### File Organization
- Shared components in `/includes/` directory (navigation.php)
- PHP files in respective directories: `/tablet/index.php`, `/fluid/index.php`, `/blog/index.php`
- Shared CSS in `/css/style.css`
- Images in `/img/` directory
- External images in `/data/pictures/Keepers/compressed/`
- Secret pages in `/secret/` subdirectories
- Use `.gitignore` to exclude generated files (randomimage.jpg)

### Naming Conventions
- Files: kebab-case for directories, `index.php` for main files
- PHP variables: camelCase
- CSS classes: kebab-case with semantic naming
- HTML elements: lowercase tags
- Navigation items: descriptive names in `$navItems` array
- Include paths: use relative paths for internal includes (`../includes/`)
- External URLs: use full absolute URLs with HTTPS

### Error Handling
- Current error handling is minimal - needs improvement
- Add checks for file existence using `file_exists()` before operations
- Add error handling for `glob()` operations: check if array is empty
- Validate external links and array indices before access
- Add try-catch blocks for file operations
- Handle empty image directory gracefully
- Validate user input when forms are added (use `htmlspecialchars()`)

### Security Considerations
- Current code copies files from external directory - validate paths exist
- Sanitize user input if forms are added (use `htmlspecialchars()`, `filter_var()`)
- Use HTTPS for external links (already implemented)
- Consider adding CSP headers for additional security
- Validate file operations don't expose sensitive paths
- Use prepared statements for database if implemented later

### Performance Considerations
- Random image generation on each page load - consider caching
- Multiple CSS files combined into single file for better caching
- Image optimization for mobile (use appropriate formats/sizes)
- Minimize HTTP requests - shared CSS, limited external resources

### Mobile/Responsive Considerations
- Always test on actual mobile devices, especially iPhone
- Use `env(safe-area-inset-*)` for Dynamic Island/notch compatibility
- Black backgrounds instead of transparent for consistency and battery savings
- Fixed navigation positioning to cover viewport edges
- Test button sizing and spacing on touch interfaces (minimum 44px touch targets)
- Viewport meta tag with `viewport-fit=cover` is essential
- Test responsive breakpoints: flexbox handles most cases naturally
- Consider hardware acceleration with CSS transforms

## Development Workflow

### Before Making Changes
1. Run syntax check: `php -l filename.php`
2. Test on development server
3. Check git status: `git status`
4. Create feature branch for significant changes
5. Make incremental changes and test frequently

### Making Changes
1. Update PHP files with `<?php include 'includes/navigation.php'; ?>`
2. Add new CSS classes to `/css/style.css` (not inline styles)
3. Use semantic HTML structure
4. Test on multiple screen sizes
5. Check for broken links with link validation tools

### Testing & Validation
1. Run PHP syntax check: `find . -name "*.php" -exec php -l {} \;`
2. Test in browser by accessing relevant page
3. Test on mobile devices (especially iPhone with Dynamic Island)
4. Check image loading and random image functionality
5. Verify all links work correctly
6. Test navigation responsive behavior
7. Check for CSS duplicate rules with `grep` or developer tools
8. Validate HTML structure
9. Test button hover states and active highlighting

### Commit Process
1. Stage changes: `git add .`
2. Check PHP syntax on staged files: `php -l $(git diff --cached --name-only)`
3. Commit with descriptive message: `git commit -m "description"`
4. Push to remote: `git push origin branch-name`
5. Deploy to production

## Common Issues to Check

### Critical Issues
- Random image generation and copying functionality failing
- Navigation not highlighting current page correctly
- External link accessibility/broken URLs
- CSS specificity conflicts causing style overrides
- PHP syntax errors preventing page load
- Mobile responsive layout breaking on small screens

### Performance Issues
- Multiple CSS files causing additional HTTP requests
- Large images not optimized for mobile
- Inefficient selectors in CSS
- Missing cache headers for static assets

### Code Quality Issues
- Duplicate CSS rules creating maintenance burden
- Inline styles mixing with CSS classes
- PHP warnings/notices on production
- Inconsistent indentation or formatting
- Missing error handling for file operations

### Security Issues
- Unvalidated file paths in copy operations
- Missing input sanitization in forms
- Exposed sensitive information in error messages
- Missing HTTPS on external links
- Directory traversal vulnerabilities in file includes

## Debugging Tools & Commands

### PHP Debugging
```bash
# Enable error reporting for development
error_reporting(E_ALL);
ini_set('display_errors', 1);

# Check for specific syntax errors
php -l index.php 2>&1

# Run with error reporting
php -d display_errors index.php
```

### CSS Debugging
```bash
# Check for CSS validity
curl -s "https://jigsaw.w3.org/css-validator/validator?uri=your-site-url"

# Find duplicate rules
grep -n "rule-name" css/style.css

# Test responsive breakpoints in browser
# Use Chrome DevTools, Firefox Developer Tools
```

### Git Commands
```bash
# Show what will be committed
git diff --cached

# Show commit history
git log --oneline -10

# Check for merge conflicts
git status
```

## Maintenance & Housekeeping

### Regular Tasks
- Remove duplicate CSS rules when found
- Check for broken external links quarterly
- Update dependencies if using package managers
- Clean up unused image files
- Review and update security practices
- Test on new browser versions when released

### Documentation Updates
- Update inline comments when making significant changes
- Keep AGENTS.md current with new patterns
- Document any new configuration requirements
- Update deployment instructions when workflow changes

---

**Remember**: This is a living document. Update it when patterns, tools, or requirements change to keep it relevant for future development.