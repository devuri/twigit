### A Streamlined Templating Approach

Modern development increasingly leans toward mono repo architectures that centralize application code, dependencies, and templates in a unified repository. This approach simplifies collaboration, version control, and deployment—making it ideal for large-scale and maintainable web projects.



### 1. Install Twigit via Composer

In your project root (`mysite`), install Twigit using Composer:

```bash
composer require devuri/twigit
```

This installs Twigit and Twig in the `vendor` directory.

---

### 2. Configure Twigit to Use the `templates` Directory

Twigit can be configured via an mu-plugin or programmatically to locate templates in `mysite/templates`. For example:

```php
// Recommended to define constants upstream for flexibility.
if (\defined('USE_TWIGIT') && true === \constant('USE_TWIGIT')) {
    $twig = Twigit\Twigit::init('path/to/mysite/templates', ['autoescape' => 'html']);

    // Apply a template filter that overrides traditional theme handling.
    $twig->templateFilter();
}
```

> If using Raydium, many configuration steps are already handled. Learn more here: [Raydium GitHub Repository](https://github.com/devuri/raydium).

---

### 3. Organize Your Templates

Create a `templates` directory in your project root:

```
mysite/
└── templates/
    ├── base.twig
    ├── header.twig
    └── footer.twig
```

You can copy and adapt Twigit's base templates from its GitHub repository:  
[Twigit Base Templates](https://github.com/devuri/twigit/tree/main/src/templates)

---

### 4. Example Twig Template

Here’s a simple example of a base Twig template:

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
