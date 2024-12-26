### Twig Concepts and Definitions Cheat Sheet

Twig is a robust templating engine with its own set of abstract terms and concepts. This cheat sheet explains these less obvious or abstract terms and how they fit into the Twig ecosystem.

### **1. Template**
- **Definition**: A file containing HTML mixed with Twig syntax.
- **Purpose**: Defines the structure and logic for rendering content.
- **Example**:
    ```twig
    <h1>{{ title }}</h1>
    <p>{{ content }}</p>
    ```

### **2. Variables**
- **Definition**: Data passed into a template for dynamic rendering.
- **Purpose**: To make templates flexible by using dynamic data.
- **Example**:
    ```twig
    {{ username }}  {# Outputs the value of the variable 'username' #}
    ```

### **3. Filters**
- **Definition**: Functions that modify or transform data in templates.
- **Purpose**: To process or format variables directly in the template.
- **Example**:
    ```twig
    {{ price|number_format(2) }}  {# Formats a number to 2 decimal places #}
    ```

### **4. Tags**
- **Definition**: Keywords surrounded by `{% %}` that represent logic or control structures.
- **Purpose**: To add logic, such as loops, conditions, or inheritance, to templates.
- **Examples**:
    - `if`: Conditional statements.
    - `for`: Loops.
    - `block`: Define replaceable template sections.
    ```twig
    {% if is_logged_in %}
        Welcome, {{ user.name }}!
    {% endif %}
    ```

### **5. Blocks**
- **Definition**: Replaceable sections of a template that can be overridden in child templates.
- **Purpose**: To allow customization of specific parts of a template in a layout hierarchy.
- **Example**:
    ```twig
    {% block title %}Default Title{% endblock %}
    ```

### **6. Inheritance**
- **Definition**: A feature that allows one template to extend another template.
- **Purpose**: To create reusable layouts and avoid duplicating code.
- **Key Tags**: `{% extends %}`, `{% block %}`
- **Example**:
    ```twig
    {# default.twig #}
    <html>
        <body>
            {% block content %}{% endblock %}
        </body>
    </html>

    {# child.html.twig #}
    {% extends 'default.twig' %}
    {% block content %}
        <p>Hello, World!</p>
    {% endblock %}
    ```

### **7. Context**
- **Definition**: The collection of variables and data available to a template.
- **Purpose**: To provide templates with the data they need to render content dynamically.
- **Example**:
    ```twig
    {{ _context }}
    ```

### **8. Extensions**
- **Definition**: Add-ons that enhance Twig’s functionality by introducing custom filters, functions, or tags.
- **Purpose**: To adapt Twig for specific use cases.
- **Example**: Symfony’s Twig extensions include filters like `date` and `trans`.

### **9. Macros**
- **Definition**: Reusable pieces of template code, similar to functions.
- **Purpose**: To avoid repetitive code.
- **Example**:
    ```twig
    {% macro input(name, value) %}
        <input type="text" name="{{ name }}" value="{{ value }}">
    {% endmacro %}

    {{ _self.input('username', user.name) }}
    ```

### **10. Includes**
- **Definition**: A mechanism to insert the contents of one template into another.
- **Purpose**: To reuse smaller templates within larger ones.
- **Example**:
    ```twig
    {% include 'header.html.twig' %}
    ```

### **11. Embeds**
- **Definition**: Combines template inheritance and inclusion in one step.
- **Purpose**: To include a template and override its blocks in the same file.
- **Example**:
    ```twig
    {% embed 'default.twig' %}
        {% block title %}Custom Title{% endblock %}
    {% endembed %}
    ```

### **12. Filters**
- **Definition**: Functions that can modify or format variables.
- **Purpose**: To make templates cleaner and separate data formatting logic.
- **Examples**:
    - `|escape`: Escapes HTML content.
    - `|date`: Formats dates.
    ```twig
    {{ content|escape }}
    ```

### **13. Functions**
- **Definition**: Built-in or custom commands that return values for templates.
- **Purpose**: To perform logic or fetch data within templates.
- **Examples**:
    - `path`: Generate URLs.
    - `asset`: Return asset URLs.
    ```twig
    <a href="{{ path('route_name') }}">Link</a>
    ```

### **14. Loops**
- **Definition**: Repeatedly process an array of data.
- **Purpose**: To dynamically generate content for lists or tables.
- **Example**:
    ```twig
    {% for item in items %}
        {{ item }}
    {% endfor %}
    ```

### **15. Autoescape**
- **Definition**: A feature that automatically escapes variables to prevent XSS.
- **Purpose**: To ensure templates output safe HTML by default.
- **Example**:
    ```twig
    {{ content }}  {# Escapes by default if autoescape is on #}
    ```

### **16. Globals**
- **Definition**: Variables that are always available in all templates.
- **Purpose**: To avoid passing common variables explicitly to every template.
- **Example**:
    ```twig
    {{ app.user }}
    ```

### **17. Raw**
- **Definition**: A filter or block that disables escaping.
- **Purpose**: To output unescaped HTML content.
- **Example**:
    ```twig
    {{ content|raw }}
    ```

### **18. Lexer**
- **Definition**: The component that parses Twig syntax into tokens.
- **Purpose**: To process and interpret the syntax of templates.

### **19. Operators**
- **Definition**: Symbols for performing comparisons, math, and logic.
- **Examples**:
    - `==`: Equals.
    - `!=`: Not equals.
    - `>`, `<`, `>=`, `<=`: Comparisons.
    ```twig
    {% if score >= 50 %}
        Pass
    {% endif %}
    ```

### **20. Debugging Tools**
- **dump()**:
    - Outputs the contents of variables.
    ```twig
    {{ dump(variable) }}
    ```

### **21. Template Loaders**
- **Definition**: Mechanisms to locate and load templates.
- **Purpose**: To tell Twig where to find templates (e.g., in files, strings, or a database).
- **Example**:
    - File system loader: Loads templates from a directory.
    - String loader: Allows templates to be created from strings.

### **22. Template Caching**
- **Definition**: Twig compiles templates into PHP code and caches them for performance.
- **Purpose**: To speed up rendering by avoiding re-parsing templates on every request.
- **Key Feature**: Cache is automatically refreshed when a template changes.

### **23. Template Inheritance Hierarchy**
- **Definition**: A structure of templates extending one another.
- **Purpose**: To organize layouts and ensure consistency across pages.
- **Example**:
    - Base template → Section template → Page template.

### **24. Namespaces**
- **Definition**: Logical names for directories containing templates.
- **Purpose**: To organize and locate templates more easily.
- **Example**:
    ```twig
    {% include '@NamespaceName/template.html.twig' %}
    ```

### **25. Conditional Blocks**
- **Definition**: Conditional rendering of template sections.
- **Purpose**: To include or exclude parts of a template based on variables.
- **Example**:
    ```twig
    {% block sidebar %}
        {% if show_sidebar %}
            <div>Sidebar content</div>
        {% endif %}
    {% endblock %}
    ```

### **26. Sandbox Mode**
- **Definition**: A restricted environment to limit available tags, filters, and functions.
- **Purpose**: To allow untrusted users to edit templates safely.
- **Example Use Case**: Content management systems where users can edit templates.

### **27. Escaping Strategies**
- **Definition**: Different ways Twig escapes variables (e.g., HTML, JavaScript, URL).
- **Purpose**: To ensure security by preventing injection attacks.
- **Example**:
    ```twig
    {{ variable|escape('js') }}  {# Escapes content for JavaScript #}
    ```

### **28. Iterables**
- **Definition**: Any variable (e.g., arrays, objects) that can be looped over.
- **Purpose**: To handle lists of data dynamically.
- **Example**:
    ```twig
    {% for key, value in iterable %}
        {{ key }}: {{ value }}
    {% endfor %}
    ```

### **29. Templates as Strings**
- **Definition**: Twig allows templates to be defined directly as strings instead of files.
- **Purpose**: To quickly test or generate templates dynamically.
- **Example**:
    ```php
    $twig->createTemplate('Hello {{ name }}!')->render(['name' => 'World']);
    ```

### **30. Custom Tags**
- **Definition**: User-defined tags to add new logic or syntax.
- **Purpose**: To extend Twig functionality for specific needs.
- **Example**: Adding a custom `{% translate %}` tag for i18n.

### **31. Iteration Helpers**
- **Definition**: Additional properties in `loop` for enhanced control.
- **Purpose**: To manage loops dynamically.
- **Example**:
    - `loop.index`: Current index (1-based).
    - `loop.parent`: Access to the parent loop when nested.

### **32. Strict Variables**
- **Definition**: A Twig configuration that throws errors for undefined variables.
- **Purpose**: To avoid accidental use of undefined variables.
- **Example**:
    ```php
    $twig = new Environment($loader, ['strict_variables' => true]);
    ```

### **33. "Do" Statement**
- **Definition**: A statement to execute code without output.
- **Purpose**: To perform actions (e.g., modifying variables) without rendering.
- **Example**:
    ```twig
    {% do list.append('new_item') %}
    ```

### **34. Whitespace Control**
- **Definition**: Special syntax to trim whitespace around tags.
- **Purpose**: To control spacing in templates.
- **Example**:
    ```twig
    {{- variable -}}  {# No whitespace around the variable #}
    ```

### **35. Auto-reloading**
- **Definition**: Twig can detect when templates change and reload the cache automatically.
- **Purpose**: Useful in development for testing changes without restarting the server.

### **36. Built-in Tests**
- **Definition**: Functions to check conditions like variable type or state.
- **Purpose**: To simplify conditional logic.
- **Examples**:
    - `empty`: Check if a variable is empty.
    - `defined`: Check if a variable is defined.
    - `iterable`: Check if a variable is iterable.
    ```twig
    {% if variable is defined %}
        {{ variable }}
    {% endif %}
    ```

### **37. Environments**
- **Definition**: The Twig core object responsible for managing templates, extensions, and settings.
- **Purpose**: To configure and control the Twig engine.
- **Example**:
    ```php
    $twig = new Environment($loader, ['debug' => true]);
    ```


### **38. Globals**
- **Definition**: Variables that are available in all templates without explicitly passing them.
- **Purpose**: To share common data across templates.
- **Example**:
    ```php
    $twig->addGlobal('site_name', 'My Website');
    ```

### **39. "Spaceless" Tag**
- **Definition**: Removes whitespace between HTML tags for cleaner output.
- **Purpose**: To reduce HTML size and improve performance.
- **Example**:
    ```twig
    {% spaceless %}
        <div>
            <p>Content</p>
        </div>
    {% endspaceless %}
    ```

### **40. Translations**
- **Definition**: Twig supports i18n through the `trans` filter or custom extensions.
- **Purpose**: To render localized text.
- **Example**:
    ```twig
    {{ 'hello_world'|trans }}
    ```

### **41. Asynchronous Extensions**
- **Definition**: Allows integration of asynchronous operations within Twig.
- **Purpose**: Useful for modern PHP frameworks that support async features.
