### Twig Recipes

### **Outputting Variables**
```twig
{{ name }}
```
*Print the value of a variable.*


### **Using Filters**
```twig
{{ name|capitalize }}
```
*Apply a filter (e.g., capitalize the first letter).*


### **Conditional Output**
```twig
{% if is_logged_in %}
    Welcome, {{ username }}!
{% else %}
    Please log in.
{% endif %}
```
*Check conditions and display content.*


### **Default Values**
```twig
{{ name|default('Guest') }}
```
*Use a default value if `name` is empty.*


### **Looping Through Items**
```twig
{% for item in items %}
    {{ item }}
{% endfor %}
```
*Iterate over a list of items.*


### **Including Templates**
```twig
{% include 'header.html.twig' %}
```
*Reuse another template's content.*

### **Extending Templates**
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
    <p>Hello from child template!</p>
{% endblock %}
```
*Create reusable layouts with inheritance.*


### **Passing Data to an Included Template**
```twig
{% include 'item.html.twig' with { title: 'My Title', description: 'My Description' } %}
```
*Send variables to an included template.*

### **String Replacement**
```twig
{{ 'Hello, World!'|replace({'World': 'Twig'}) }}
```
*Replace parts of a string.*



### **Merging Arrays**
```twig
{% set combined = array1|merge(array2) %}
```
*Combine two arrays into one.*


### **Formatting Numbers**
```twig
{{ 12345.678|number_format(2, '.', ',') }}
```
*Format a number (e.g., add commas and decimals).*


### **Checking Loop Index**
```twig
{% for item in items %}
    {% if loop.first %}
        First item: {{ item }}
    {% elseif loop.last %}
        Last item: {{ item }}
    {% else %}
        Middle item: {{ item }}
    {% endif %}
{% endfor %}
```
*Use `loop` variables in a loop (e.g., `loop.first`, `loop.last`).*

### **Debugging Variables**
```twig
{{ dump(variable) }}
```
*Output the contents of a variable for debugging.*

### **Generating URLs**
```twig
<a href="{{ path('route_name', { id: 123 }) }}">Link</a>
```
*Create a URL for a route.*

### **Escape HTML**
```twig
{{ '<b>Bold</b>'|escape }}
```
*Escape HTML to prevent rendering.*

### **Working with Dates**
```twig
{{ 'now'|date('Y-m-d') }}
```
*Format dates.*

### **Set Variables**
```twig
{% set total = price * quantity %}
```
*Create and use a new variable.*

### **Conditional Value Assignment**
```twig
{{ is_logged_in ? 'Welcome' : 'Please log in' }}
```
*Use a ternary operator for conditions.*


### **Joining Strings**
```twig
{{ ['one', 'two', 'three']|join(', ') }}
```
*Combine an array into a single string.*

### **Splitting Strings**
```twig
{% set parts = 'a,b,c'|split(',') %}
```
*Split a string into an array.*

### **Using Blocks**
```twig
{% block title %}My Title{% endblock %}
```
*Define replaceable sections in templates.*

### **Raw Output**
```twig
{{ content|raw }}
```
*Output content without escaping.*


### **Switch Cases**
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
*Handle multiple conditions.*


These simple recipes can cover most basic Twig tasks and make development faster.
