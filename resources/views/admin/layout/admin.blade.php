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
    <!-- Load MathJax v2 for better CKEditor compatibility -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.9/MathJax.js?config=TeX-AMS_HTML"></script>
    <script>
        // Configure MathJax v2
        window.MathJax = {
            skipStartupTypeset: true,
            tex2jax: {
                inlineMath: [['$', '$'], ['\\(', '\\)']],
                displayMath: [['$$', '$$'], ['\\[', '\\]']],
                processEscapes: true
            },
            "HTML-CSS": {
                availableFonts: ["TeX"]
            }
        };
    </script>
    <link rel="icon" type="image/x-icon" href="{{ asset('img/logo/logo.png') }}">

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
        // Configure CKEditor global settings untuk load minimal tools langsung dengan MathJax
        CKEDITOR.config.customConfig = '';
        CKEDITOR.config.skin = 'moono-lisa';
        CKEDITOR.config.resize_enabled = false;
        CKEDITOR.config.removeDialogTabs = 'image:advanced;link:advanced';

        document.addEventListener('DOMContentLoaded', function () {
            initializeCKEditors();

            function initializeCKEditors() {
                console.log('Initializing CKEditor with minimal tools + MathJax...');

                // Destroy any existing instances first
                Object.keys(CKEDITOR.instances).forEach(function(instanceName) {
                    CKEDITOR.instances[instanceName].destroy(true);
                });

                const commonConfig = {
                    // Load minimal plugins langsung dengan MathJax
                    plugins: 'basicstyles,toolbar,wysiwygarea,elementspath,mathjax,sourcearea,clipboard,undo,format,list,indent,blockquote,table,horizontalrule,link',
                    extraPlugins: 'mathjax',
                    mathJaxLib: 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.9/MathJax.js?config=TeX-AMS_HTML',
                    mathJaxClass: 'math-tex',
                    removePlugins: 'elementspath,save,newpage,preview,print,templates,about,maximize,showblocks,magicline,pagebreak,iframe,flash,smiley,pagebreakutils,indent,indentlist,indentblock',
                    allowedContent: true,
                    forcePasteAsPlainText: false,
                    entities: false,
                    startupFocus: false,
                    // Disable automatic toolbar loading
                    toolbarStartupExpanded: true,
                    toolbarCanCollapse: false
                };

                const baseConfig = {
                    ...commonConfig,
                    height: 300,
                    // Simplified toolbar dengan MathJax di depan
                    toolbar: [
                        { name: 'math', items: ['Mathjax'] },
                        { name: 'basicstyles', items: ['Bold', 'Italic', 'Underline'] },
                        { name: 'paragraph', items: ['NumberedList', 'BulletedList'] },
                        { name: 'insert', items: ['Table', 'Link'] },
                        { name: 'tools', items: ['Source'] }
                    ]
                };

                const optionConfig = {
                    ...commonConfig,
                    height: 220,
                    // Toolbar lebih minimal untuk option dengan MathJax di depan
                    toolbar: [
                        { name: 'math', items: ['Mathjax'] },
                        { name: 'basicstyles', items: ['Bold', 'Italic'] },
                        { name: 'tools', items: ['Source'] }
                    ]
                };

                const ensureId = (textarea, index) => {
                    if (!textarea.id) {
                        textarea.id = `ckeditor-${index}`;
                    }
                    return textarea.id;
                };

                // Initialize question text editors (for soal)
                document.querySelectorAll('textarea.ckeditor').forEach((textarea, index) => {
                    const elementId = ensureId(textarea, index);
                    console.log('Initializing minimal CKEditor for question:', elementId);
                    try {
                        CKEDITOR.replace(elementId, baseConfig);
                    } catch (error) {
                        console.error('Error initializing question editor:', error);
                    }
                });

                // Initialize option text editors
                document.querySelectorAll('textarea.ckeditor-option').forEach((textarea, index) => {
                    const elementId = ensureId(textarea, `option-${index}`);
                    console.log('Initializing minimal CKEditor for option:', elementId);
                    try {
                        CKEDITOR.replace(elementId, optionConfig);
                    } catch (error) {
                        console.error('Error initializing option editor:', error);
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