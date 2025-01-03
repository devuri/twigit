## Functions

This should cover most of the functions you’ll need when using Twig within a WordPress environment. Comments categorize the functions for easier maintenance and discovery.

## Best Practices

### Theme Hooks & URLs
- **`wp_head`, `wp_footer`, `wp_body_open`**: Ensure that scripts, styles, and hooks are properly inserted into the `<head>` and `<body>` areas of your HTML.  
- **`get_stylesheet_directory_uri`, `get_template_directory_uri`**: Retrieve the correct URI paths to your theme’s asset directories.

### Core Utility Functions
- **`get_the_title`, `the_post_thumbnail`, `get_the_post_thumbnail`**: Standard methods to get or display post data, including featured images.  
- **`get_bloginfo`, `bloginfo`**: Retrieve or echo WordPress site metadata (name, description, etc.).  
- **`_e`**: Echo a translated string for internationalization.

### Loop & Queries
- **`have_posts`, `the_post`**: Typically used in a classic PHP loop. If you prefer a pure Twig loop, you can fetch posts via `get_posts` and pass them into Twig.  
- **`post_query`** (from `Twigit\\Query\\PostQuery`): A custom helper for retrieving posts with advanced arguments.

### Comments, Menus, and Widgets
- **`wp_nav_menu`**: Output or return a custom menu (defined under Appearance → Menus in WP Admin).  
- **`comments_template`**: Integrate the comments area in templates.  
- **`dynamic_sidebar`** & **`is_active_sidebar`**: Manage widget areas in Twig.

### Attachments & Media
- **`wp_get_attachment_image_src`**: Retrieve image details (URL, width, height) for constructing your own `<img>` tags.  
- **`wp_get_attachment_url`**: Get the direct URL to any attachment file (images, PDFs, etc.).

### Conditional Tags
- **`is_singular`, `is_archive`, `is_home`, `is_page`, `is_category`**: Useful for logic branching or adjusting layouts based on context.

### Taxonomies & Terms
- **`get_terms`, `get_term_link`**: Retrieve taxonomy terms and links for categories, tags, or custom taxonomies.  
- **`get_the_category`, `the_category`**: Get or echo categories for the current post.

**ACF (Advanced Custom Fields)**
- **`get_field`, `the_field`, `get_sub_field`, `the_sub_field`**: Core ways to retrieve or display ACF fields.  
- **`have_rows`, `the_row`**: Typically used to loop through ACF “Repeater” or “Flexible Content” fields.  
- **`get_row_layout`**: Identify the current layout block in a flexible content field.  
- **`acf_field`** (Twigit integration): A specialized helper to seamlessly grab ACF data.

**Image Processing (Twigit)**
- **`resize_image`, `convert_to_webp`**: Custom Twigit helpers to manipulate and optimize images before rendering in Twig.

**Debug Functions**
- **`var_dump`, `print_r`, `dump`**: Helps you inspect variables and arrays directly in your Twig templates (useful in development, should be removed or disabled in production).

## Usage Considerations

- **Twig Auto-Escaping**: Be mindful of potential double escaping. If a function already returns safe HTML (e.g., `the_content()`), you may need to mark it as raw or manage escaping carefully in Twig.  
- **Performance**: Some WP functions (like queries or image manipulation) can be more resource-intensive if called repeatedly. If performance is critical, consider gathering needed data in PHP first, then passing a well-structured context array to your Twig templates.  
- **ACF Requirement**: Make sure ACF is installed and active if you use ACF-specific functions.  
- **Conditional Logic**: Often you’ll run conditionals upstream in PHP rather than in Twig. But if you prefer to keep logic in your Twig templates, these functions give you that flexibility.

**With this final list in place**, you should be well-equipped to handle a broad range of WordPress tasks within your Twig environment—**from basic site info and theme hooks, to advanced ACF data retrieval and image processing.**
