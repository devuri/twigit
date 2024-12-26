### Twig Cheat Sheet

#### **Basic Syntax**
- **Variables**: `{{ variable }}`
- **Filters**: `{{ variable|filter }}`
- **Functions**: `{{ function(param) }}`
- **Tags**: `{% tag %}...{% endtag %}`


#### **Variables**
```twig
{{ name }}            {# Outputs the value of 'name' #}
{{ user.email }}      {# Accessing object properties or array keys #}
{{ loop.index }}      {# Accessing loop variables #}
```


#### **Filters**
```twig
{{ "hello"|upper }}       {# HELLO #}
{{ "hello"|capitalize }}  {# Hello #}
{{ 12345|number_format(2, '.', ',') }} {# 12,345.00 #}
{{ text|length }}         {# Returns the length of the string/array #}
{{ text|date("Y-m-d") }}  {# Formats a date string #}
```

#### **Functions**
```twig
{{ dump(variable) }}             {# Debugging variables #}
{{ include('template.html.twig') }} {# Include another template #}
{{ path('route_name', { id: 123 }) }} {# Generate a URL #}
{{ csrf_token('intention') }}    {# Generate a CSRF token #}
```

#### **Control Structures**
1. **If/Else**
```twig
{% if user.is_logged_in %}
    Welcome, {{ user.name }}!
{% else %}
    Please log in.
{% endif %}
```

2. **For Loop**
```twig
{% for item in items %}
    {{ loop.index }}: {{ item.name }}
{% else %}
    No items found.
{% endfor %}
```

3. **Set Variables**
```twig
{% set name = 'John' %}
{{ name }}
```

4. **Include Templates**
```twig
{% include 'header.html.twig' %}
```

5. **Extending Templates**
```twig
{# default.twig #}
<!DOCTYPE html>
<html>
    <body>
        {% block content %}{% endblock %}
    </body>
</html>

{# child.html.twig #}
{% extends 'default.twig' %}
{% block content %}
    <p>Hello World!</p>
{% endblock %}
```

#### **Filters Examples**
| **Filter**       | **Description**                         |
|-------------------|-----------------------------------------|
| `upper`          | Converts to uppercase                  |
| `lower`          | Converts to lowercase                  |
| `capitalize`     | Capitalizes the first character        |
| `escape`         | Escapes HTML                           |
| `raw`            | Outputs raw content (unescaped)        |
| `length`         | Returns the length of an array/string  |
| `merge`          | Merges two arrays                      |
| `default('val')` | Provides a default value if empty/null |


#### **Special Variables**
- `loop.index` - 1-based loop index
- `loop.index0` - 0-based loop index
- `loop.first` - `true` if first iteration
- `loop.last` - `true` if last iteration
- `_self` - Current template name

---

#### **Custom Logic**
- **Conditional Inline Output**
```twig
{{ variable ? 'Yes' : 'No' }}
```

- **Filter Chaining**
```twig
{{ text|lower|capitalize }}
```

- **Custom Blocks**
```twig
{% block sidebar %}
    <h2>Default Sidebar</h2>
{% endblock %}
```
