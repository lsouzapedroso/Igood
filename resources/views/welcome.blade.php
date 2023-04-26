<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CCBEU</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <style>
            /* ! tailwindcss v3.2.4 | MIT License | https://tailwindcss.com */*,::after,::before{box-sizing:border-box;border-width:0;border-style:solid;border-color:#e5e7eb}::after,::before{--tw-content:''}html{line-height:1.5;-webkit-text-size-adjust:100%;-moz-tab-size:4;tab-size:4;font-family:Figtree, sans-serif;font-feature-settings:normal}body{margin:0;line-height:inherit}hr{height:0;color:inherit;border-top-width:1px}abbr:where([title]){-webkit-text-decoration:underline dotted;text-decoration:underline dotted}h1,h2,h3,h4,h5,h6{font-size:inherit;font-weight:inherit}a{color:inherit;text-decoration:inherit}b,strong{font-weight:bolder}code,kbd,pre,samp{font-family:ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;font-size:1em}small{font-size:80%}sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline}sub{bottom:-.25em}sup{top:-.5em}table{text-indent:0;border-color:inherit;border-collapse:collapse}button,input,optgroup,select,textarea{font-family:inherit;font-size:100%;font-weight:inherit;line-height:inherit;color:inherit;margin:0;padding:0}button,select{text-transform:none}[type=button],[type=reset],[type=submit],button{-webkit-appearance:button;background-color:transparent;background-image:none}:-moz-focusring{outline:auto}:-moz-ui-invalid{box-shadow:none}progress{vertical-align:baseline}::-webkit-inner-spin-button,::-webkit-outer-spin-button{height:auto}[type=search]{-webkit-appearance:textfield;outline-offset:-2px}::-webkit-search-decoration{-webkit-appearance:none}::-webkit-file-upload-button{-webkit-appearance:button;font:inherit}summary{display:list-item}blockquote,dd,dl,figure,h1,h2,h3,h4,h5,h6,hr,p,pre{margin:0}fieldset{margin:0;padding:0}legend{padding:0}menu,ol,ul{list-style:none;margin:0;padding:0}textarea{resize:vertical}input::placeholder,textarea::placeholder{opacity:1;color:#9ca3af}[role=button],button{cursor:pointer}:disabled{cursor:default}audio,canvas,embed,iframe,img,object,svg,video{display:block;vertical-align:middle}img,video{max-width:100%;height:auto}[hidden]{display:none}*, ::before, ::after{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: }::-webkit-backdrop{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: }::backdrop{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: }.relative{position:relative}.mx-auto{margin-left:auto;margin-right:auto}.mx-6{margin-left:1.5rem;margin-right:1.5rem}.ml-4{margin-left:1rem}.mt-16{margin-top:4rem}.mt-6{margin-top:1.5rem}.mt-4{margin-top:1rem}.-mt-px{margin-top:-1px}.mr-1{margin-right:0.25rem}.flex{display:flex}.inline-flex{display:inline-flex}.grid{display:grid}.h-16{height:4rem}.h-7{height:1.75rem}.h-6{height:1.5rem}.h-5{height:1.25rem}.min-h-screen{min-height:100vh}.w-auto{width:auto}.w-16{width:4rem}.w-15{width:3.5rem}.w-9{width:2.5rem}.w-8{width:2rem}.w-7{width:1.75rem}.w-6{width:1.5rem}.w-5{width:1.25rem}.max-w-7xl{max-width:80rem}.shrink-0{flex-shrink:0}.scale-100{--tw-scale-x:1;--tw-scale-y:1;transform:translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))}.grid-cols-1{grid-template-columns:repeat(1, minmax(0, 1fr))}.items-center{align-items:center}.justify-center{justify-content:center}.gap-6{gap:1.5rem}.gap-4{gap:1rem}.self-center{align-self:center}.rounded-lg{border-radius:0.5rem}.rounded-full{border-radius:9999px}.bg-gray-100{--tw-bg-opacity:1;background-color:rgb(243 244 246 / var(--tw-bg-opacity))}.bg-white{--tw-bg-opacity:1;background-color:rgb(255 255 255 / var(--tw-bg-opacity))}.bg-red-50{--tw-bg-opacity:1;background-color:rgb(254 242 242 / var(--tw-bg-opacity))}.bg-dots-darker{background-image:url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E")}.from-gray-700\/50{--tw-gradient-from:rgb(55 65 81 / 0.5);--tw-gradient-to:rgb(55 65 81 / 0);--tw-gradient-stops:var(--tw-gradient-from), var(--tw-gradient-to)}.via-transparent{--tw-gradient-to:rgb(0 0 0 / 0);--tw-gradient-stops:var(--tw-gradient-from), transparent, var(--tw-gradient-to)}.bg-center{background-position:center}.stroke-red-500{stroke:#ef4444}.stroke-gray-400{stroke:#9ca3af}.p-6{padding:1.5rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.text-center{text-align:center}.text-right{text-align:right}.text-xl{font-size:1.25rem;line-height:1.75rem}.text-sm{font-size:0.875rem;line-height:1.25rem}.font-semibold{font-weight:600}.leading-relaxed{line-height:1.625}.text-gray-600{--tw-text-opacity:1;color:rgb(75 85 99 / var(--tw-text-opacity))}.text-gray-900{--tw-text-opacity:1;color:rgb(17 24 39 / var(--tw-text-opacity))}.text-gray-500{--tw-text-opacity:1;color:rgb(107 114 128 / var(--tw-text-opacity))}.underline{-webkit-text-decoration-line:underline;text-decoration-line:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.shadow-2xl{--tw-shadow:0 25px 50px -12px rgb(0 0 0 / 0.25);--tw-shadow-colored:0 25px 50px -12px var(--tw-shadow-color);box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)}.shadow-gray-500\/20{--tw-shadow-color:rgb(107 114 128 / 0.2);--tw-shadow:var(--tw-shadow-colored)}.transition-all{transition-property:all;transition-timing-function:cubic-bezier(0.4, 0, 0.2, 1);transition-duration:150ms}.selection\:bg-red-500 *::selection{--tw-bg-opacity:1;background-color:rgb(239 68 68 / var(--tw-bg-opacity))}.selection\:text-white *::selection{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.selection\:bg-red-500::selection{--tw-bg-opacity:1;background-color:rgb(239 68 68 / var(--tw-bg-opacity))}.selection\:text-white::selection{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.hover\:text-gray-900:hover{--tw-text-opacity:1;color:rgb(17 24 39 / var(--tw-text-opacity))}.hover\:text-gray-700:hover{--tw-text-opacity:1;color:rgb(55 65 81 / var(--tw-text-opacity))}.focus\:rounded-sm:focus{border-radius:0.125rem}.focus\:outline:focus{outline-style:solid}.focus\:outline-2:focus{outline-width:2px}.focus\:outline-red-500:focus{outline-color:#ef4444}.group:hover .group-hover\:stroke-gray-600{stroke:#4b5563}@media (prefers-reduced-motion: no-preference){.motion-safe\:hover\:scale-\[1\.01\]:hover{--tw-scale-x:1.01;--tw-scale-y:1.01;transform:translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))}}@media (prefers-color-scheme: dark){.dark\:bg-gray-900{--tw-bg-opacity:1;background-color:rgb(17 24 39 / var(--tw-bg-opacity))}.dark\:bg-gray-800\/50{background-color:rgb(31 41 55 / 0.5)}.dark\:bg-red-800\/20{background-color:rgb(153 27 27 / 0.2)}.dark\:bg-dots-lighter{background-image:url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E")}.dark\:bg-gradient-to-bl{background-image:linear-gradient(to bottom left, var(--tw-gradient-stops))}.dark\:stroke-gray-600{stroke:#4b5563}.dark\:text-gray-400{--tw-text-opacity:1;color:rgb(156 163 175 / var(--tw-text-opacity))}.dark\:text-white{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.dark\:shadow-none{--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)}.dark\:ring-1{--tw-ring-offset-shadow:var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);--tw-ring-shadow:var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);box-shadow:var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000)}.dark\:ring-inset{--tw-ring-inset:inset}.dark\:ring-white\/5{--tw-ring-color:rgb(255 255 255 / 0.05)}.dark\:hover\:text-white:hover{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.group:hover .dark\:group-hover\:stroke-gray-400{stroke:#9ca3af}}@media (min-width: 640px){.sm\:fixed{position:fixed}.sm\:top-0{top:0px}.sm\:right-0{right:0px}.sm\:ml-0{margin-left:0px}.sm\:flex{display:flex}.sm\:items-center{align-items:center}.sm\:justify-center{justify-content:center}.sm\:justify-between{justify-content:space-between}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width: 768px){.md\:grid-cols-2{grid-template-columns:repeat(2, minmax(0, 1fr))}}@media (min-width: 1024px){.lg\:gap-8{gap:2rem}.lg\:p-8{padding:2rem}}
        </style>
    </head>
    <body class="antialiased">
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
{{--            @if (Route::has('login'))--}}
{{--                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">--}}
{{--                    @auth--}}
{{--                        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>--}}
{{--                    @else--}}
{{--                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>--}}

{{--                        @if (Route::has('register'))--}}
{{--                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>--}}
{{--                        @endif--}}
{{--                    @endauth--}}
{{--                </div>--}}
{{--            @endif--}}

            <div class="max-w-7xl mx-auto p-6 lg:p-8">
                <div class="flex justify-center">
                    <svg viewBox="0 0 62 65" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-16 w-auto bg-gray-100 dark:bg-gray-900">
                        <img src="https://www.ccbeuguarapuava.com.br/wp-content/uploads/2021/05/2.png" fill="#FF2D20"/>
                    </svg>
                </div>

                <div class="mt-16">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
                        <a href="https://www.ccbeuguarapuava.com.br/" class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl  from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                            <div>
                                <div class="h-16 w-16 bg-red-50 dark:bg-gray-900 flex items-center justify-center rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-7 h-7 stroke-red-500">
                                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTjRPRPojb0v8wjz3qRlmnGB5YTDMw2SorgecmPc7vBAgrJU3OiUqW8kY1ef0WcBOkLMjs&usqp=CAU" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                                    </svg>
                                </div>

                                <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">CCBEU Guarapuava</h2>

                                <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                                    Site principal da escola, onde é feito o acesso do Star Program App
                                </p>
                            </div>

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="self-center shrink-0 stroke-red-500 w-6 h-6 mx-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                            </svg>
                        </a>

                        <a href="https://www.sponteweb.com.br/" class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                            <div>
                                <div class="h-16 w-16 bg-red-50 dark:bg-gray-800/50 flex items-center justify-center rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-7 h-7 stroke-red-500">
                                        <img src="data:image/png;base64,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" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                                    </svg>
                                </div>

                                <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Sponte</h2>

                                <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                                    n8n é uma ferramenta de automação de fluxo de trabalho de código aberto que permite conectar diferentes aplicativos, fontes de dados e APIs para automatizar tarefas repetitivas e criar fluxos de trabalho poderosos
                                </p>
                            </div>

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="self-center shrink-0 stroke-red-500 w-6 h-6 mx-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                            </svg>
                        </a>

                        <a href="https://chatwoot.ccbeuguarapuava.com/" class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                            <div>
                                <div class="h-16 w-16 bg-red-50 dark:bg-dots-lighter flex items-center justify-center rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-7 h-7 stroke-red-500">
                                        <img src="https://chatwoot.ccbeuguarapuava.com/brand-assets/logo.svg" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                                    </svg>
                                </div>

                                <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Chatwoot </h2>

                                <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                                    Chatwoot é uma plataforma de atendimento ao cliente de código aberto baseada na web que permite que as empresas se comuniquem com seus clientes por meio de diversos canais, como chat ao vivo, e-mail, mídias sociais e mensagens de texto                                </p>
                            </div>

                            <a href="https://www.kommo.com/br/whatsapp/" class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                                <div>
                                    <div class="h-16 w-16 bg-red-50 dark:bg-dots-lighter flex items-center justify-center rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-7 h-7 stroke-red-500">
                                            <img src="data:image/jpeg;base64,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" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                                        </svg>
                                    </div>

                                    <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Kommo </h2>

                                    <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                                        Kommo é uma ferramenta de CRM (Customer Relationship Management) baseada na web que ajuda as empresas a gerenciar seus relacionamentos com os clientes e melhorar a eficiência das vendas.
                                </div>

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="self-center shrink-0 stroke-red-500 w-6 h-6 mx-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                            </svg>
                        </a>

                        <a href="https://n8n.ccbeuguarapuava.com/" class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                            <div>
                                <div class="h-16 w-16 bg-red-50 dark:bg-dots-lighter flex items-center justify-center rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-7 h-7 stroke-red-500">
                                        <img src="https://n8n.ccbeuguarapuava.com/n8n-logo-expanded.svg" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                                    </svg>
                                </div>

                                <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">n8n</h2>

                                <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                                    n8n é uma ferramenta de automação de fluxo de trabalho de código aberto que permite conectar diferentes aplicativos, fontes de dados e APIs para automatizar tarefas repetitivas e criar fluxos de trabalho poderosos
                                </p>
                            </div>

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="self-center shrink-0 stroke-red-500 w-6 h-6 mx-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                            </svg>
                        </a>

                        <a href="https://passbolt.ccbeuguarapuava.com/" class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                            <div>
                                <div class="h-16 w-16 bg-red-50 dark:bg-dots-lighter flex items-center justify-center rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-7 h-7 stroke-red-500">
                                        <img src="https://avatars.githubusercontent.com/u/4386228?s=200&v=4" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                                    </svg>
                                </div>

                                <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Site </h2>

                                <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                                    Passbolt é uma solução de gerenciamento de senhas de código aberto que permite compartilhar e gerenciar senhas com segurança entre membros de uma equipe ou organização.                                </p>
                            </div>

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="self-center shrink-0 stroke-red-500 w-6 h-6 mx-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                            </svg>
                        </a>

                        <a href="https://pve.ccbeuguarapuava.com/" class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                            <div>
                                <div class="h-16 w-16 bg-red-50 dark:bg-dots-lighter flex items-center justify-center rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-8 h-7 stroke-red-500">
                                        <img src="https://avatars.githubusercontent.com/u/2678585?s=200&v=4" alt="profile_image" class="w-16 border-radius-lg shadow-sm">
                                    </svg>
                                </div>

                                <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Proxmox</h2>

                                <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                                    Proxmox é uma plataforma de virtualização de código aberto baseada em Linux, que permite a criação e gerenciamento de máquinas virtuais (VMs) e contêineres em um único ambiente.
                                </p>
                            </div>

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="self-center shrink-0 stroke-red-500 w-6 h-6 mx-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                            </svg>
                        </a>

                        <a href="https://unifi.acttecnologia.com.br/" class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                            <div>
                                <div class="h-16 w-16 bg-red-50 dark:bg-dots-lighter flex items-center justify-center rounded-full">
                                        <img src="https://companieslogo.com/img/orig/UI-38398c48.png?t=1597162282" alt="profile_image" class="w-8 border-radius-lg shadow-sm">
                                    </svg>
                                </div>

                                <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Unifi Controller</h2>

                                <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                                    Unifi Controller é uma plataforma de gerenciamento de rede desenvolvida pela Ubiquiti Networks. É uma aplicação centralizada que permite gerenciar e monitorar todos os dispositivos da rede Unifi, incluindo pontos de acesso Wi-Fi, switches, roteadores, câmeras e outros dispositivos Ubiquiti compatíveis.                                </p>
                            </div>

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="self-center shrink-0 stroke-red-500 w-6 h-6 mx-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                            </svg>
                        </a>
                    </div>
                </div>

                <div class="flex justify-center mt-16 px-0 sm:items-center sm:justify-between">
                    <div class="text-center text-sm text-gray-500 dark:text-gray-400 sm:text-left">
                        <div class="flex items-center gap-4">
                            <a href="https://www.ccbeuguarapuava.com.br/" class="group inline-flex items-center hover:text-gray-700 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="-mt-px mr-1 w-5 h-5 stroke-gray-400 dark:stroke-gray-600 group-hover:stroke-gray-600 dark:group-hover:stroke-gray-400">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                </svg>
                                CCBEU
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </body>
</html>
