<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Phymath Education - Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="https://cdn.ckeditor.com/4.22.1/full-all/ckeditor.js"></script>
    <!-- Ensure MathJax plugin is available -->
    <script>
        // Preload MathJax before CKEditor initialization
        if (!window.MathJax) {
            window.MathJax = {
                skipStartupTypeset: true,
                tex: {
                    inlineMath: [['$', '$'], ['\\(', '\\)']],
                    displayMath: [['$$', '$$'], ['\\[', '\\]']]
                }
            };
        }
    </script>

    @vite('resources/css/app.css')
</head>

<body>
    @include('admin.components.navbar')
    @include('admin.components.sidebar')
    @if (session('success') || session('error'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 5000)" x-show="show" x-transition
        class="fixed top-6 right-6 z-50 max-w-sm w-full shadow-lg rounded-lg p-4 text-sm
            {{ session('success') ? 'bg-green-100 text-green-800 border border-green-300' : 'bg-red-100 text-red-800 border border-red-300' }}">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-2">
                <i class="ri-information-line text-lg"></i>
                <span>
                    {{ session('success') ?? session('error') }}
                </span>
            </div>
            <button @click="show = false" class="text-xl leading-none hover:text-gray-600">
                &times;
            </button>
        </div>
    </div>
    @endif


    <div class="p-6 md:p-12 sm:ml-64 mt-16 md:mt-10">
        @yield('content')
    </div>

    {{-- jquery --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const mathJaxSrc = @json(config('services.ckeditor.mathjax_src'));

            // Ensure MathJax is available before initializing CKEditor
            if (window.MathJax) {
                initializeCKEditors();
            } else {
                // Wait for MathJax to load
                window.addEventListener('load', initializeCKEditors);
            }

            function initializeCKEditors() {
                // Check if MathJax plugin is available
                if (!CKEDITOR.plugins.registered.mathjax) {
                    console.warn('MathJax plugin not found in CKEditor. Please ensure it is included.');
                }

                const commonConfig = {
                    extraPlugins: 'mathjax',
                    mathJaxLib: mathJaxSrc,
                    mathJaxClass: 'math-tex',
                    removePlugins: 'cloudservices,easyimage',
                    allowedContent: true,
                    forcePasteAsPlainText: false,
                    entities: false
                };

                const baseConfig = {
                    ...commonConfig,
                    height: 300,
                    toolbar: [
                        { name: 'clipboard', items: ['Undo', 'Redo'] },
                        { name: 'styles', items: ['Format'] },
                        { name: 'basicstyles', items: ['Bold', 'Italic', 'Underline', 'RemoveFormat'] },
                        { name: 'paragraph', items: ['NumberedList', 'BulletedList', 'Outdent', 'Indent', 'Blockquote'] },
                        { name: 'insert', items: ['Mathjax', 'Table', 'HorizontalRule', 'Link'] },
                        { name: 'document', items: ['Source', 'Maximize'] }
                    ]
                };

                // Same config base for options but different height and simplified toolbar
                const optionConfig = {
                    ...commonConfig,
                    height: 220,
                    toolbar: [
                        { name: 'clipboard', items: ['Undo', 'Redo'] },
                        { name: 'basicstyles', items: ['Bold', 'Italic', 'Underline', 'RemoveFormat'] },
                        { name: 'insert', items: ['Mathjax', 'Link'] },
                        { name: 'document', items: ['Source'] }
                    ]
                };

                const ensureId = (textarea, index) => {
                    if (!textarea.id) {
                        textarea.id = `ckeditor-${index}`;
                    }
                    return textarea.id;
                };

                // Initialize question text editors
                document.querySelectorAll('textarea.ckeditor').forEach((textarea, index) => {
                    const elementId = ensureId(textarea, index);
                    if (!CKEDITOR.instances[elementId]) {
                        console.log('Initializing CKEditor for question text:', elementId);
                        try {
                            CKEDITOR.replace(elementId, baseConfig);
                        } catch (error) {
                            console.error('Error initializing question editor:', error);
                        }
                    }
                });

                // Initialize option text editors
                document.querySelectorAll('textarea.ckeditor-option').forEach((textarea, index) => {
                    const elementId = ensureId(textarea, `option-${index}`);
                    if (!CKEDITOR.instances[elementId]) {
                        console.log('Initializing CKEditor for option text:', elementId);
                        try {
                            CKEDITOR.replace(elementId, optionConfig);
                        } catch (error) {
                            console.error('Error initializing option editor:', error);
                        }
                    }
                });
            }
        });
    </script>
    @vite('resources/js/app.js')
    @stack('scripts')
    @yield('scripts')
</body>

</html>
