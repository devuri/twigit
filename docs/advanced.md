### Advanced Twig Cheat Sheet

---

### **Basic Syntax**
- **Variables**: `{{ variable }}`
- **Filters**: `{{ variable|filter }}`
- **Functions**: `{{ function(param) }}`
- **Tags**: `{% tag %}...{% endtag %}`

---

### **Variables**
```twig
{{ variable }}             {# Outputs the value of a variable #}
{{ object.property }}      {# Access object properties #}
{{ array['key'] }}         {# Access associative array keys #}
{{ array[0] }}             {# Access array values by index #}
{{ loop.index }}           {# Loop variable (1-based index) #}
{{ constant('CLASS::CONST') }} {# Access a PHP constant #}
```

---

### **Filters**
| **Filter**         | **Description**                                 | **Example**                                           |
|---------------------|-------------------------------------------------|-------------------------------------------------------|
| `capitalize`        | Capitalizes the first character of a string    | `{{ 'hello'|capitalize }}` -> `Hello`                |
| `upper`             | Converts string to uppercase                   | `{{ 'hello'|upper }}` -> `HELLO`                     |
| `lower`             | Converts string to lowercase                   | `{{ 'HELLO'|lower }}` -> `hello`                     |
| `escape`            | Escapes HTML special characters                | `{{ '<b>text</b>'|escape }}` -> `&lt;b&gt;text&lt;/b&gt;` |
| `raw`               | Outputs content without escaping               | `{{ '<b>text</b>'|raw }}` -> `<b>text</b>`           |
| `length`            | Gets the length of a string or array           | `{{ [1, 2, 3]|length }}` -> `3`                      |
| `merge`             | Merges two arrays                              | `{{ [1, 2]|merge([3, 4]) }}` -> `[1, 2, 3, 4]`       |
| `default`           | Sets a default value if variable is empty/null | `{{ name|default('Guest') }}`                       |
| `date`              | Formats a date                                 | `{{ date_var|date('Y-m-d') }}` -> `2024-12-24`       |
| `replace`           | Replaces substrings                            | `{{ 'hello'|replace({'l': 'x'}) }}` -> `hexxo`       |
| `join`              | Joins array elements with a separator          | `{{ ['a', 'b']|join(', ') }}` -> `a, b`              |
| `split`             | Splits a string into an array                  | `{{ 'a,b,c'|split(',') }}` -> `['a', 'b', 'c']`      |
| `number_format`     | Formats a number                               | `{{ 12345.678|number_format(2, '.', ',') }}` -> `12,345.68` |

---

### **Functions**
| **Function**         | **Description**                                      | **Example**                                           |
|-----------------------|------------------------------------------------------|-------------------------------------------------------|
| `dump(variable)`      | Dumps variable contents for debugging               | `{{ dump(variable) }}`                                |
| `include(template)`   | Includes another Twig template                      | `{{ include('header.html.twig') }}`                  |
| `source(template)`    | Outputs raw source of a template                    | `{{ source('header.html.twig') }}`                   |
| `parent()`            | Access parent block content                         | `{% block title %}{{ parent() }} - Site{% endblock %}`|
| `path(route, params)` | Generates a URL for a route                         | `{{ path('home', { id: 123 }) }}`                    |
| `asset(path)`         | Returns the URL for a static asset                  | `{{ asset('css/style.css') }}`                       |
| `csrf_token(int)`     | Generates a CSRF token                              | `{{ csrf_token('form') }}`                           |
| `constant(name)`      | Returns the value of a PHP constant                 | `{{ constant('MyClass::MY_CONSTANT') }}`             |

---

### **Control Structures**

#### **Conditionals**
```twig
{% if condition %}
    Code if condition is true
{% elseif other_condition %}
    Code if the other condition is true
{% else %}
    Code if all conditions are false
{% endif %}
```

#### **Loops**
```twig
{% for item in items %}
    {{ loop.index }}: {{ item }}
{% else %}
    No items found.
{% endfor %}
```

#### **Loop Variables**
| **Variable**       | **Description**                       |
|---------------------|---------------------------------------|
| `loop.index`        | Current iteration (1-based)          |
| `loop.index0`       | Current iteration (0-based)          |
| `loop.revindex`     | Remaining iterations (1-based)       |
| `loop.revindex0`    | Remaining iterations (0-based)       |
| `loop.first`        | `true` if first iteration            |
| `loop.last`         | `true` if last iteration             |
| `loop.length`       | Total number of iterations           |

---

### **Template Inclusion**

#### **Including Other Templates**
```twig
{% include 'header.html.twig' %}
```

#### **Embedding Templates**
```twig
{% embed 'template.html.twig' %}
    {% block block_name %}
        Custom content here
    {% endblock %}
{% endembed %}
```

#### **Inheriting Templates**
**Base Template:**
```twig
{# base.html.twig #}
<!DOCTYPE html>
<html>
    <body>
        {% block content %}{% endblock %}
    </body>
</html>
```

**Child Template:**
```twig
{% extends 'base.html.twig' %}
{% block content %}
    <p>Child content</p>
{% endblock %}
```

---

### **Set Variables**
```twig
{% set variable = value %}
{% set array = [1, 2, 3] %}
{% set object = { key: 'value', another_key: 123 } %}
```

---

### **Special Variables**
| **Variable**         | **Description**                     |
|-----------------------|-------------------------------------|
| `_self`              | Current template name              |
| `_parent`            | Parent context                     |
| `_context`           | All available variables            |
| `_template`          | Current template reference         |

---

### **Custom Logic**

#### **Ternary Operator**
```twig
{{ condition ? 'True value' : 'False value' }}
```

#### **Filter Chaining**
```twig
{{ text|lower|capitalize }}
```

#### **String Interpolation**
```twig
{{ "Hello #{name}" }}
```

---

### **Advanced Control Structures**

#### **Custom Blocks**
```twig
{% block sidebar %}
    <h2>Default Sidebar</h2>
{% endblock %}
```

#### **Do Statements**
```twig
{% do variable.append('value') %}
```

#### **Switch/Case**
```twig
{% set value = 'B' %}
{% if value == 'A' %}
    Option A
{% elseif value == 'B' %}
    Option B
{% else %}
    Default
{% endif %}
```

---

### **Common Examples**

#### **Loop Through Associative Arrays**
```twig
{% for key, value in dictionary %}
    {{ key }}: {{ value }}
{% endfor %}
```

#### **Generate Links**
```twig
<a href="{{ path('route_name', { id: 123 }) }}">Link</a>
```

#### **Escaping Output**
```twig
{{ '<b>Bold</b>'|escape('html') }}
```

This cheat sheet covers most of Twig's capabilities and syntax to serve as a advanced reference.
