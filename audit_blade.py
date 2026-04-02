import re
import sys

def audit_blade(file_path):
    with open(file_path, 'r', encoding='utf-8') as f:
        content = f.read()

    directives = {
        'if': 'endif',
        'unless': 'endunless',
        'auth': 'endauth',
        'guest': 'endguest',
        'foreach': 'endforeach',
        'forelse': 'endforelse',
        'while': 'endwhile',
        'section': 'endsection',
        'push': 'endpush',
        'prepend': 'endprepend',
        'can': 'endcan',
        'cannot': 'endcannot',
        'choice': 'endchoice',
        'component': 'endcomponent',
        'slot': 'endslot',
        'env': 'endenv',
        'production': 'endproduction',
        'switch': 'endswitch',
        'hasSection': 'endif',
        'sectionMissing': 'endif'
    }

    stack = []
    lines = content.split('\n')
    
    # Simple regex to find @directive
    # We ignore @@ (escaped)
    directive_pattern = re.compile(r'(?<!@)@([a-zA-Z]+)')

    for i, line in enumerate(lines):
        line_num = i + 1
        matches = directive_pattern.finditer(line)
        for match in matches:
            name = match.group(1)
            
            # Check if it's an opening directive
            if name in directives:
                stack.append((name, line_num))
            # Check if it's a closing directive
            elif name.startswith('end'):
                found_match = False
                # Try to find matching opening directive
                # Some end directives share names (e.g. endif for if, hasSection, sectionMissing)
                for open_name, close_name in directives.items():
                    if name == close_name:
                        # Find the last matching opening directive in stack
                        for j in range(len(stack)-1, -1, -1):
                            if stack[j][0] == open_name:
                                stack.pop(j)
                                found_match = True
                                break
                        if found_match:
                            break
                if not found_match:
                    print(f"Error: Unexpected closure @{name} on line {line_num}")
            elif name == 'else' or name == 'elseif' or name == 'empty' or name == 'case' or name == 'default':
                # These are middle directives, skip for now or check if stack is empty
                pass

    for name, line_num in stack:
        print(f"Error: Unclosed @{name} on line {line_num}")

if __name__ == "__main__":
    if len(sys.argv) < 2:
        print("Usage: python audit_blade.py <file_path>")
    else:
        audit_blade(sys.argv[1])
