import os
import re

def count_directives(file_path):
    with open(file_path, 'r', encoding='utf-8', errors='ignore') as f:
        content = f.read()
    
    # Opening directives
    ifs = len(re.findall(r'(?<!@)@if\b', content))
    forelsers = len(re.findall(r'(?<!@)@forelse\b', content))
    foreachs = len(re.findall(r'(?<!@)@foreach\b', content))
    guests = len(re.findall(r'(?<!@)@guest\b', content))
    auths = len(re.findall(r'(?<!@)@auth\b', content))
    sections = len(re.findall(r'(?<!@)@section\((?!\'|")', content)) # Only sections that aren't shorthanded
    # wait, shorthanded sections are @section('name', 'value')
    # non-shorthanded are @section('name') ... @endsection
    sections = len(re.findall(r"(?<!@)@section\('[\w\.]+'\)(?!\s*,)", content)) + len(re.findall(r'(?<!@)@section\("[\w\.]+"\)(?!\s*,)', content))

    # Closing directives
    endifs = len(re.findall(r'(?<!@)@endif\b', content))
    endforelsers = len(re.findall(r'(?<!@)@endforelse\b', content))
    endforeachs = len(re.findall(r'(?<!@)@endforeach\b', content))
    endguests = len(re.findall(r'(?<!@)@endguest\b', content))
    endauths = len(re.findall(r'(?<!@)@endauth\b', content))
    endsections = len(re.findall(r'(?<!@)@endsection\b', content)) + len(re.findall(r'(?<!@)@stop\b', content))

    mismatches = []
    if ifs != endifs: mismatches.append(f"if: {ifs} vs endif: {endifs}")
    if forelsers != endforelsers: mismatches.append(f"forelse: {forelsers} vs endforelse: {endforelsers}")
    if foreachs != endforeachs: mismatches.append(f"foreach: {foreachs} vs endforeach: {endforeachs}")
    if guests != endguests: mismatches.append(f"guest: {guests} vs endguest: {endguests}")
    if auths != endauths: mismatches.append(f"auth: {auths} vs endauths: {endauths}")
    if sections != endsections: mismatches.append(f"section: {sections} vs endsection: {endsections}")
    
    return mismatches

def scan_views(directory):
    for root, dirs, files in os.walk(directory):
        for file in files:
            if file.endswith('.blade.php'):
                path = os.path.join(root, file)
                mismatches = count_directives(path)
                if mismatches:
                    print(f"{path}: {', '.join(mismatches)}")

if __name__ == "__main__":
    scan_views('c:/laragon/www/activecare/resources/views')
