import os
import re

def audit_file(file_path):
    with open(file_path, 'r', encoding='utf-8', errors='ignore') as f:
        lines = f.readlines()
    
    stack = []
    errors = []
    
    # Directives that start a block
    openers = ['if', 'unless', 'auth', 'guest', 'foreach', 'forelse', 'while', 'section', 'push', 'prepend', 'can', 'cannot', 'choice', 'component', 'slot', 'env', 'production', 'switch']
    # Directives that end a block
    closers = {
        'endif': ['if', 'hasSection', 'sectionMissing', 'env', 'production'],
        'endunless': ['unless'],
        'endauth': ['auth'],
        'endguest': ['guest'],
        'endforeach': ['foreach'],
        'endforelse': ['forelse'],
        'endwhile': ['while'],
        'endsection': ['section'],
        'stop': ['section'],
        'endpush': ['push'],
        'endprepend': ['prepend'],
        'endcan': ['can'],
        'endcannot': ['cannot'],
        'endchoice': ['choice'],
        'endcomponent': ['component'],
        'endslot': ['slot'],
        'endenv': ['env'],
        'endproduction': ['production'],
        'endswitch': ['switch']
    }
    # Mid-block directives
    middles = ['else', 'elseif', 'empty', 'case', 'default']
    
    # Regex to find @directive
    # We ignore @@ (escaped)
    pattern = re.compile(r'(?<!@)@([a-zA-Z]+)')
    
    for i, line in enumerate(lines):
        line_num = i + 1
        matches = pattern.finditer(line)
        for match in matches:
            name = match.group(1)
            
            # Special case for shorthanded @section('name', 'value')
            if name == 'section':
                if re.search(r"@section\s*\(\s*['\"][^'\"]+['\"]\s*,\s*", line):
                    continue
            
            if name in openers:
                stack.append((name, line_num))
            elif name in closers:
                if not stack:
                    errors.append(f"Orphan @{name} at line {line_num}")
                else:
                    last_open, last_line = stack.pop()
                    if last_open not in closers[name]:
                        errors.append(f"Mismatched @{name} at line {line_num} (opens @{last_open} at line {last_line})")
            elif name in middles:
                if not stack:
                    errors.append(f"Orphan @{name} at line {line_num}")
                else:
                    # Check if middle directive is valid for current block
                    last_open = stack[-1][0]
                    valid = False
                    if name in ['else', 'elseif'] and last_open in ['if', 'unless', 'auth', 'guest', 'can', 'cannot']: valid = True
                    if name == 'empty' and last_open == 'forelse': valid = True
                    if name in ['case', 'default'] and last_open == 'switch': valid = True
                    if not valid:
                        errors.append(f"Invalid @{name} for @{last_open} block at line {line_num}")
                        
    while stack:
        name, line_num = stack.pop()
        errors.append(f"Unclosed @{name} at line {line_num}")
        
    return errors

def scan_views(directory):
    for root, dirs, files in os.walk(directory):
        for file in files:
            if file.endswith('.blade.php'):
                path = os.path.join(root, file)
                errors = audit_file(path)
                if errors:
                    print(f"{path}:")
                    for err in errors:
                        print(f"  - {err}")

if __name__ == "__main__":
    scan_views('c:/laragon/www/activecare/resources/views')
