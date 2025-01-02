## Embrace the **Hybrid CMS**

> Basically what we have our own hybrid front-end layer.

WordPress continues to thrive as a powerful content management system, but the traditional theming layer can feel dated for modern development practices. You don’t need a fully headless setup to gain flexibility, though. Instead, a **hybrid-cms** approach allows you to keep WordPress’ reliability as your back end while **completely bypassing** the default theme system in favor of a templating engine like **Twig**.

[**Twigit**](https://github.com/devuri/twigit) is the key to this hybrid workflow. By installing Twigit and defining a simple Must-Use (MU) plugin snippet, you can load Twig templates directly from a designated folder, sidestepping the traditional theme files altogether.

> Read on to discover the benefits of this approach and how to get started.

## Why Go Hybrid with Twig?

1. **Modern Development Workflow**  
   Twig’s syntax is popular in frameworks like Symfony and Laravel, making it a breeze to adopt for developers who prefer a cleaner, more modular codebase.

2. **Cleaner, Maintainable Code**  
   Separate logic and presentation using Twig’s tags (`{% %}`) and variables (`{{ }}`). This reduces clutter and makes your template code significantly more readable and reusable.

3. **Improved Security**  
   Twig automatically escapes output, guarding your site against cross-site scripting (XSS) attacks. With sites often in the crosshairs, added security is a major plus.

4. **Mono Repo Advantage**  
   Modern approaches increasingly favor **mono repo architectures**, placing back-end code, front-end templates, and even microservices (where applicable) in a single repository. Twigit plays nicely here, centralizing your logic and Twig templates all in one place.

5. **Skip the Theme Layer**  
   Instead of forcing Twig into the normal theme hierarchy, Twigit effectively **overrides** the template loader. That means you can put your `.twig` files wherever you like—in a dedicated `templates` directory, for instance—and still use the admin features, plug-ins, and APIs as normal.

   > popular headless plugins like ACF Pods etc can be leveraging for content management giving all stake holders easy access to update modify and change content as the need to.

6. **Faster Onboarding**  
   Anyone familiar with templating engines like Twig, Jinja2 (Python), or even Liquid (Shopify) will find Twig instantly intuitive. This drastically reduces onboarding time for new developers.

## Getting Started with Twigit: A Four-Step Overview
<details>
  <summary>Click to expand code</summary>

  ### 1. Install Twigit via Composer

Begin by installing Twigit into your project root using Composer:

```bash
composer require devuri/twigit
```

This command adds Twigit and Twig to your project’s `vendor` directory. Composer ensures all dependencies remain version-controlled, making it easy to keep your environment consistent across teams and deployments.

### 2. Configure Twigit in a Must-Use Plugin (MU Plugin)

In WordPress, **Must-Use plugins** load automatically, making them perfect for hooking Twigit into your site early. Create (or edit) an MU plugin in `wp-content/mu-plugins/twigit-loader.php`:

```php
<?php
// Only load Twigit if a specific constant is defined.
if (\defined('USE_TWIGIT') && true === \constant('USE_TWIGIT')) {
    // Initialize Twigit and point it to your main project path.
    $twig = Twigit\Twigit::init('path/to/mysite', ['autoescape' => 'html']);

    // Override the default template loading with Twigit.
    $twig->templateFilter();
}
```

Finally, in your `wp-config.php` (or elsewhere), define the constant to enable Twigit:

```php
define('USE_TWIGIT', true);
```

With `USE_TWIGIT` set to `true`, Twigit becomes the default template engine, handling requests in place of the traditional theme loader.

### 3. Organize Your Templates

Create a **`templates`** folder in your project (e.g., `mysite/templates/`), and place your `.twig` files there. A basic setup might look like this:

```
mysite/
└── templates/
    ├── base.twig
    ├── header.twig
    └── footer.twig
```

You can even copy base templates from [Twigit’s GitHub repository](https://github.com/devuri/twigit/tree/main/src/templates) to jump-start your workflow.

### 4. Build Your Twig Templates

Twig is quite straightforward. Here’s a minimal example of a `base.twig`:

```twig
<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ title }}</title>
</head>
<body>
    {% block content %}
    {% endblock %}
</body>
</html>
```

In your other Twig files, you can extend `base.twig` and override the `content` block with page-specific HTML. For instance:

```twig
{% extends "base.twig" %}

{% block content %}
    <h1>Hello, {{ site_name }}!</h1>
{% endblock %}
```

You can pass variables like `{{ title }}`, `{{ site_name }}`, or even arrays of posts by hooking into WordPress functions in your MU plugin or theme logic, then passing them to Twig accordingly.
</details>

## Impact of a Hybrid CMS Setup

- **Easy Maintenance & Scalability**  
  The decoupled nature of your code (back-end logic vs. front-end templates) makes it simple to scale your team and project. Front-end developers can focus purely on Twig, while backend developers handle plugin configurations, custom post types, and more.

- **Reduced Overhead vs. Full Headless**  
  Unlike a fully decoupled headless build, you don’t need a separate front-end repo and hosting environment. Everything runs within WordPress, so deployment remains straightforward. It’s a more balanced approach to modern templating, yet still integrated seamlessly.

- **Cleaner Git History**  
  With a mono repo structure, your entire team commits to one place. Twigit’s modular setup ensures template changes are neatly contained, so you can roll back or isolate issues easily.

- **Low-Risk Migration**  
  You can adopt Twig gradually. Leave certain parts of your site on the default themes or `.php` templates and move them to Twig incrementally. Toggle `USE_TWIGIT` on or off for testing new sections before going all-in.

A **hybrid-cms** architecture powered by Twig opens a world of possibilities. By integrating **Twigit**, you combine the convenience and familiarity of WordPress with the modern, maintainable, and secure templating approach. Whether you’re revamping an enterprise site or spinning up a brand-new project, you can lean on the robust back-end while leveraging the elegance and clarity of Twig.

**In short:** Twigit turbocharges your WordPress theming with clean code, and improved maintainability—without the complexity and overhead of a fully headless setup.

> If you’re looking to elevate your workflow, this is your ticket to a sleek, future-proof, and developer-friendly environment.
