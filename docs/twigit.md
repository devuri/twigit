# Building Modern Projects with Twigit

### A Streamlined Templating Approach

Modern development increasingly leans toward **mono repo architectures** that centralize application code, dependencies, and templates in a unified repository. This approach simplifies collaboration, version control, and deployment—making it ideal for large-scale and maintainable web projects.

Traditional setups often rely on complex workflows and structures that hinder seamless integration of templating systems and modern tools. Twigit, a Composer package, offers a powerful solution by decoupling templating from rigid setups and enabling a modern, structured workflow.

We’ll explore how Twigit empowers developers to manage templates efficiently by leveraging a **public directory** for accessibility and a **dedicated templates directory** for secure, version-controlled development.

---

## **Understanding the Mono Repo Structure**

Consider a project architecture where you centralize everything except public-facing files:

```
mysite/
├── public/          # Publicly accessible directory (contains index.php and web assets)
│   ├── index.php
│   ├── wp-config.php
│   └── wp-content/
├── templates/       # Twig templates (secure and not publicly accessible)
├── vendor/          # Composer dependencies
└── composer.json    # Composer configuration
```

This structure mirrors modern frameworks like Laravel, which separate public-facing files from backend logic and templates.

### Key Benefits of This Structure
- **Security**: Sensitive files remain hidden from the public, reducing risk.
- **Version Control**: Templates and logic are stored together, avoiding `.gitignore` headaches.
- **Flexibility**: Decoupling logic from public assets enables clean, maintainable workflows.

---

## **How Twigit Fits In**

Twigit is purpose-built for modern setups like this. Instead of storing templates in default locations like `themes` or `wp-content`, Twigit searches for them in a custom directory—such as `mysite/templates`. This change simplifies version control and aligns with modern development methodologies.

### Key Features of Twigit:
1. **Custom Template Directory**  
   Templates are stored in `mysite/templates`, completely separate from public-facing files, ensuring they are secure and version-controlled.

2. **Public Directory Isolation**  
   The `public` directory remains the only accessible folder, keeping backend files hidden.

3. **Decoupled Templating**  
   Twigit bypasses traditional constraints, allowing templates to exist alongside core logic and dependencies.

4. **Composer Integration**  
   Dependencies are managed in `composer.json`, ensuring consistent and easy updates.

---

## **Benefits of Twigit for Mono Repo Projects**

1. **Simplified Version Control**  
   Templates and assets exist in a shared repository, avoiding the need to micromanage `.gitignore` for ignored or tracked directories.

2. **Modern Tool Compatibility**  
   Twigit integrates seamlessly with Composer and Twig, aligning your development process with modern PHP practices.

3. **Streamlined Deployment**  
   Deployment is straightforward since templates and code exist together, ensuring consistency across environments.

4. **Improved Security**  
   Storing templates in `mysite/templates` ensures they are never publicly exposed.

5. **Reusable Templates**  
   Using Twig's powerful features—like inheritance and macros—you can create clean, reusable templates.

---

## **Setting Up Twigit for Your Project**

Twigit is easy to set up in a mono repo environment. Below is a step-by-step guide:

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
    $twig = Twigit\Twigit::init('path/to/mysite/', ['autoescape' => 'html']);

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

---

### 5. Deploying Your Project

Follow these best practices to deploy your project securely:

1. **Expose Only the `public` Directory**  
   Configure your server to serve files exclusively from `mysite/public`.

2. **Keep Sensitive Files Hidden**  
   Ensure other directories (`templates`, `vendor`, etc.) are inaccessible.

3. **Leverage Automation**  
   Use build tools or deployment pipelines to automate this process and ensure consistency.

---

## **Why Choose Twigit?**

Twigit simplifies the templating process for projects using modern architecture. By moving templates out of traditional constraints and into a controlled mono repo environment, Twigit empowers developers with:

- **Efficient Workflows**: Streamlined templating that integrates seamlessly with Composer and Twig.
- **Flexibility**: Decoupled logic that works well with modern PHP frameworks and tools.
- **Security and Maintainability**: Clean separation of public assets and backend logic for safer, easier-to-maintain projects.

---

Whether you’re managing a complex application or simply looking for a cleaner templating solution, Twigit offers the flexibility and power needed to modernize your development workflow.

Get started today and transform the way you build and manage templates!

Twigit brings a modern, decoupled approach to your development by aligning it with the workflows of modern frameworks like Laravel or Symfony. With support for mono repo structures, Composer-managed dependencies, and Twig templates outside `wp-content`, Twigit simplifies version control, improves security, and streamlines development.

By organizing your project with a `mysite/public` structure and using Twigit to manage templates in `mysite/templates`, you can achieve a cleaner, more maintainable architecture for your projects.

If you’re looking to modernize your workflow, Twigit is the perfect solution.
