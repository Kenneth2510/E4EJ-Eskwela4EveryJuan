@extends('layouts.landing_layout')

@section('content')
<section class="relative w-full text-sm scroll-smooth">
    {{-- <nav class="fixed top-0 z-50 w-full border-b-2 bg-mainwhitebg start-0 text-seagreen border-darthmouthgreen">
        <div class="flex flex-wrap items-center justify-between max-w-screen-xl p-4 mx-auto">
            <a href="">
                <h1 class="self-center text-xl font-semibold whitespace-nowrap">Eskwela4EveryJuan</h1>
            </a>
            <ul class="flex flex-row items-center justify-center font-medium divide-seagreen">
                <li><a class="px-3 py-2 hover:font-semibold hover:text-base" href="#home">Home</a></li>
                <li><a class="px-3 py-2 hover:font-semibold hover:text-base" href="#about">About</a></li>
                <li><a class="px-3 py-2 hover:font-semibold hover:text-base" href="#bplo">BPLO</a></li>
                <li><a class="px-3 py-2 hover:font-semibold hover:text-base" href="#services">BPLO</a></li>
                <li><a class="px-3 py-2 hover:font-semibold hover:text-base" href="#contact">Contacts</a></li>
            </ul>
            <div class="flex flex-row items-center divide-x divide-seagreen">
                <h3><a class="px-2 hover:font-medium hover:text-base" href="{{ url('/learner') }}">Learner</a></h3>
                <h3><a class="px-2 hover:font-medium hover:text-base" href="{{ url('/instructor') }}">Instructor</a>
                </h3>
            </div>
        </div>
    </nav> --}}

    <nav class="fixed z-50 text-black border-b-2 border-gray-300 navbar bg-base-100">
        <div class="navbar-start">
            <div class="dropdown">
                <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h8m-8 6h16" />
                    </svg>
                </div>
                <ul tabindex="0"
                    class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                    <li><a href="#home">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#bplo">BPLO</a></li>
                    <li><a href="#contact">Contacts</a></li>
                </ul>
            </div>
            <a class="text-xl btn btn-ghost text-darthmouthgreen" href="#">
                <img style="width:125px;" src="{{ asset('storage/images/e4ej_logo_landscape_2.png')}}" alt="">
            </a>
        </div>
        <div class="hidden navbar-center lg:flex text-primary">
            <ul class="px-1 menu menu-horizontal">
                <li><a href="#home">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#bplo">BPLO</a></li>
                <li><a href="#contact">Contacts</a></li>
            </ul>
        </div>
        <div class="navbar-end">
            {{-- <a class="btn">Button</a> --}}
        </div>
    </nav>


    {{-- hero section --}}
    <section class="min-h-screen hero" style="background-image: url('{{ asset('assets/CityHall.jpg') }}')" id="home">
        <div class="hero-overlay bg-opacity-80"></div>
        <div class="text-center hero-content text-neutral-content">
            <div class="flex flex-col items-center justify-center max-w-md">
                {{-- <h1 class="text-xl font-semibold text-darthmouthgreen">Eskwela4EveryJuan</h1> --}}

                <svg class="hidden h-16 my-4 md:block fill-darthmouthgreen" version="1.0"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 990.000000 382.000000"
                    preserveAspectRatio="xMidYMid meet">

                    <g transform="translate(0.000000,382.000000) scale(0.100000,-0.100000)" stroke="none">
                        <path d="M1920 3635 c-88 -22 -165 -61 -525 -267 -187 -107 -477 -274 -645
                    -370 -379 -217 -349 -198 -358 -233 -10 -37 3 -2224 12 -2247 8 -16 92 -58
                    119 -58 8 0 18 7 21 16 3 9 6 506 6 1105 l0 1089 28 29 c15 16 266 167 557
                    336 292 170 571 332 621 361 151 88 177 98 279 98 83 1 94 -2 145 -30 75 -42
                    120 -108 120 -175 0 -42 -5 -55 -32 -84 -19 -19 -201 -133 -423 -263 -778
                    -457 -859 -506 -872 -532 -11 -20 -13 -233 -11 -1065 3 -1035 3 -1040 24
                    -1086 35 -75 101 -87 224 -40 31 11 191 100 355 197 165 96 421 246 569 332
                    151 88 286 174 307 196 29 28 45 58 62 110 l22 71 0 1055 c0 981 -1 1060 -18
                    1132 -36 155 -151 279 -296 322 -66 19 -213 20 -291 1z m438 -1488 c1 -573 -1
                    -864 -8 -877 -6 -11 -47 -41 -93 -68 -1167 -691 -1075 -639 -1101 -629 -14 6
                    -16 96 -16 868 l0 861 28 25 c15 14 277 173 582 354 384 227 563 328 580 326
                    l25 -2 3 -858z m-376 -1291 c16 -23 8 -67 -17 -90 -39 -36 -159 -96 -192 -96
                    -58 0 -71 50 -24 97 15 16 65 48 110 71 78 40 105 44 123 18z" />
                        <path d="M8432 2811 l-362 -569 0 -156 0 -156 435 0 435 0 0 -190 0 -190 195
                    0 195 0 0 190 0 190 120 0 120 0 0 170 0 170 -120 0 -120 0 0 555 0 555 -268
                    0 -268 0 -362 -569z m505 -538 c-2 -2 -112 -2 -245 -1 l-241 3 242 373 242
                    374 3 -373 c1 -204 1 -374 -1 -376z" />
                        <path d="M1934 3336 c-69 -30 -1201 -699 -1221 -722 l-23 -25 0 -1089 c0 -774
                    3 -1096 11 -1113 12 -27 100 -74 118 -63 8 5 11 309 11 1082 0 881 2 1080 14
                    1107 11 28 64 62 382 249 711 417 799 470 817 485 24 23 22 68 -5 87 -27 19
                    -63 20 -104 2z" />
                        <path d="M2877 3063 c-4 -3 -7 -215 -7 -470 l0 -463 335 0 336 0 -3 88 -3 87
                    -232 3 -233 2 0 105 0 105 230 0 230 0 0 85 0 85 -230 0 -230 0 0 100 0 100
                    235 0 236 0 -3 88 -3 87 -326 3 c-179 1 -328 -1 -332 -5z" />
                        <path d="M4360 2600 l0 -470 90 0 90 0 0 88 c1 86 1 87 39 131 l38 44 89 -131
                    89 -131 114 -1 113 0 -24 33 c-211 280 -250 338 -237 355 8 9 61 71 118 137
                    58 66 111 128 119 138 14 16 9 17 -95 17 l-109 0 -125 -147 -124 -147 -5 275
                    -5 274 -87 3 -88 3 0 -471z" />
                        <path d="M6970 2600 l0 -470 90 0 90 0 -2 468 -3 467 -87 3 -88 3 0 -471z" />
                        <path d="M3868 2819 c-140 -20 -232 -124 -213 -240 16 -94 75 -136 252 -179
                    128 -32 159 -51 144 -93 -9 -26 -65 -57 -101 -57 -45 0 -144 30 -190 58 -25
                    15 -48 27 -52 27 -4 0 -23 -25 -43 -55 l-35 -55 32 -28 c55 -46 131 -70 244
                    -75 133 -6 197 12 258 71 94 90 83 232 -22 302 -23 15 -90 39 -167 58 -97 24
                    -131 37 -142 53 -12 20 -12 25 9 49 43 50 160 43 251 -15 l44 -28 33 61 c32
                    58 32 60 14 75 -36 27 -119 62 -164 67 -25 3 -56 7 -70 9 -14 1 -51 -1 -82 -5z" />
                        <path d="M6355 2796 c-78 -33 -155 -112 -185 -193 -31 -83 -25 -226 12 -298
                    34 -65 100 -128 163 -157 76 -33 227 -38 315 -8 36 12 80 33 97 46 l33 25 -37
                    52 c-20 29 -38 53 -38 55 -1 1 -23 -10 -50 -24 -66 -38 -174 -45 -231 -16 -48
                    24 -69 46 -89 95 l-15 37 250 0 c223 0 251 2 257 16 11 28 -16 164 -43 218
                    -33 66 -77 111 -139 144 -41 21 -66 26 -145 29 -83 3 -102 1 -155 -21z m233
                    -136 c37 -23 72 -75 72 -107 0 -23 -1 -23 -166 -23 l-166 0 6 28 c9 37 36 72
                    76 100 44 29 131 31 178 2z" />
                        <path d="M7467 2799 c-56 -19 -130 -59 -140 -76 -2 -4 10 -34 27 -65 l33 -58
                    33 25 c105 77 264 69 307 -16 7 -13 13 -48 13 -78 0 -51 -1 -53 -18 -38 -29
                    27 -103 55 -163 62 -107 13 -222 -42 -255 -122 -18 -42 -18 -144 -1 -186 18
                    -42 85 -101 132 -117 51 -17 180 -8 225 14 19 10 45 28 58 39 l22 20 0 -36 0
                    -37 85 0 85 0 0 255 c0 282 -3 301 -62 363 -18 17 -56 41 -85 52 -74 28 -215
                    27 -296 -1z m196 -373 c59 -22 77 -43 77 -92 0 -61 -39 -88 -137 -93 -72 -3
                    -73 -3 -108 32 -54 54 -41 116 30 148 47 22 86 23 138 5z" />
                        <path d="M5031 2778 c5 -18 51 -170 102 -338 l93 -305 96 -3 c85 -2 97 -1 102
                    15 46 157 130 420 135 425 4 5 38 -93 76 -217 l68 -225 96 0 96 0 99 328 c54
                    180 101 333 103 340 4 9 -18 12 -89 12 l-93 0 -43 -157 c-24 -87 -53 -189 -64
                    -228 l-20 -70 -75 228 -74 227 -79 0 -80 0 -72 -225 c-40 -124 -75 -219 -79
                    -212 -4 6 -33 108 -65 225 l-58 212 -92 0 -92 0 9 -32z" />
                        <path d="M2870 1285 l0 -445 315 0 316 0 -3 83 -3 82 -217 3 -218 2 0 100 0
                    100 215 0 215 0 0 80 0 80 -215 0 -215 0 0 95 0 95 220 0 220 0 0 85 0 85
                    -315 0 -315 0 0 -445z" />
                        <path d="M6510 1412 c0 -288 -2 -320 -18 -351 -40 -75 -142 -90 -224 -36 -22
                    15 -41 25 -42 23 -2 -2 -20 -33 -40 -71 l-38 -67 24 -20 c65 -54 221 -79 325
                    -51 73 20 134 69 168 135 l30 60 3 348 3 348 -95 0 -96 0 0 -318z" />
                        <path d="M4529 1487 c-103 -29 -172 -88 -218 -187 -21 -45 -25 -70 -25 -142 0
                    -79 3 -92 34 -154 61 -120 159 -174 315 -174 90 0 181 25 228 63 l28 22 -36
                    52 -35 52 -51 -26 c-111 -58 -233 -36 -284 51 -14 24 -25 48 -25 54 0 9 64 12
                    240 12 l240 0 0 28 c0 102 -43 213 -107 274 -74 71 -203 103 -304 75z m167
                    -143 c37 -18 74 -69 74 -103 0 -21 -3 -21 -155 -21 -173 0 -176 1 -135 68 41
                    67 138 93 216 56z" />
                        <path d="M5362 1481 c-29 -10 -70 -32 -92 -50 l-40 -32 0 41 0 40 -85 0 -85 0
                    0 -320 0 -320 85 0 85 0 0 213 c0 191 2 216 18 229 32 29 84 50 139 55 l54 6
                    -3 75 c-2 42 -7 77 -13 78 -5 2 -34 -5 -63 -15z" />
                        <path d="M7838 1490 c-56 -10 -161 -55 -183 -80 -16 -17 -15 -22 11 -67 15
                    -26 29 -49 30 -51 1 -2 26 10 56 27 95 54 194 54 248 0 27 -27 30 -37 30 -92
                    l0 -60 -23 21 c-57 54 -213 70 -294 31 -116 -56 -147 -217 -60 -316 45 -52 98
                    -73 182 -73 71 0 138 22 177 57 17 15 18 14 18 -15 l0 -32 86 0 85 0 -3 248
                    c-3 235 -4 249 -26 290 -30 56 -95 97 -176 111 -69 12 -90 12 -158 1z m162
                    -390 c28 -20 31 -27 28 -68 -4 -65 -36 -87 -129 -87 -67 0 -72 2 -100 33 -16
                    18 -29 43 -29 56 0 28 34 74 64 87 36 15 132 3 166 -21z" />
                        <path d="M8687 1489 c-50 -12 -96 -35 -129 -67 l-28 -26 0 42 0 42 -85 0 -85
                    0 0 -320 0 -320 85 0 85 0 0 216 0 216 31 29 c29 27 83 49 122 49 10 0 33 -7
                    53 -15 57 -24 64 -54 64 -290 l0 -205 86 0 85 0 -3 263 c-2 198 -6 268 -17
                    287 -49 89 -148 126 -264 99z" />
                        <path d="M3560 1472 c0 -7 127 -324 247 -619 4 -9 33 -13 97 -13 l91 0 125
                    312 c69 171 127 315 128 320 2 5 -38 7 -89 6 l-92 -3 -80 -212 c-44 -117 -82
                    -213 -86 -213 -3 0 -42 97 -86 215 l-80 215 -87 0 c-49 0 -88 -4 -88 -8z" />
                        <path d="M5460 1473 c0 -5 57 -151 127 -325 l126 -317 -17 -40 c-21 -46 -56
                    -64 -113 -59 l-38 3 -11 -73 c-11 -72 -11 -72 14 -79 40 -10 149 5 189 26 74
                    38 86 61 249 461 86 212 158 391 161 398 4 10 -15 12 -87 10 l-93 -3 -80 -212
                    c-44 -117 -82 -213 -86 -213 -3 0 -42 97 -86 215 l-80 215 -87 0 c-49 0 -88
                    -3 -88 -7z" />
                        <path d="M6870 1243 c0 -248 6 -300 37 -342 39 -51 70 -65 149 -69 92 -5 153
                    11 210 55 l44 33 0 -40 0 -40 85 0 85 0 0 320 0 320 -85 0 -85 0 0 -213 c0
                    -155 -3 -218 -12 -229 -27 -35 -82 -58 -136 -58 -113 0 -122 22 -122 295 l0
                    205 -85 0 -85 0 0 -237z" />
                    </g>
                </svg>
                <svg class="h-20 my-4 fill-darthmouthgreen md:hidden" version="1.0" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 1080.000000 1223.000000" preserveAspectRatio="xMidYMid meet">
                    <g transform="translate(0.000000,1223.000000) scale(0.100000,-0.100000)" stroke="none">
                        <path d="M6870 10790 c-145 -26 -186 -35 -289 -67 -236 -72 -305 -106 -976
                    -491 -225 -129 -734 -420 -1130 -647 -396 -227 -755 -433 -798 -458 -43 -26
                    -80 -47 -82 -47 -3 0 -64 -35 -137 -78 -73 -43 -176 -102 -228 -131 -52 -30
                    -158 -90 -235 -134 -452 -259 -441 -251 -477 -322 l-21 -40 7 -1590 c4 -874
                    11 -2239 14 -3032 7 -1426 7 -1442 27 -1470 13 -18 65 -50 140 -88 96 -48 128
                    -59 168 -60 43 0 52 4 70 28 l21 28 3 2957 c4 3306 -3 3008 77 3079 24 21 106
                    74 182 117 77 44 301 175 499 291 198 116 448 263 555 325 107 62 258 150 335
                    195 77 45 309 180 515 300 206 120 535 311 730 425 712 415 720 419 898 467
                    212 56 419 39 607 -52 149 -72 252 -173 319 -315 28 -59 31 -74 31 -165 0 -89
                    -3 -106 -27 -151 -15 -28 -39 -66 -54 -83 -56 -67 -2 -34 -1499 -916 -390
                    -230 -903 -533 -1140 -673 -236 -140 -495 -292 -575 -339 -243 -143 -282 -171
                    -310 -228 l-25 -50 -3 -535 c-1 -294 2 -1565 7 -2825 l8 -2290 23 -75 c105
                    -349 397 -344 1020 18 311 181 457 266 515 302 33 20 83 49 110 65 85 47 512
                    298 665 390 80 49 165 99 190 113 25 14 173 100 330 190 645 374 999 585 1065
                    634 85 65 149 142 199 243 43 87 58 135 89 290 l22 110 0 2805 c0 2680 -1
                    2810 -18 2910 -59 333 -157 539 -352 736 -163 165 -326 254 -590 319 -78 20
                    -395 30 -475 15z m962 -1767 l23 -25 0 -2316 c0 -2141 -1 -2319 -17 -2347 -28
                    -52 -66 -79 -323 -230 -137 -81 -304 -180 -370 -220 -66 -40 -226 -134 -355
                    -210 -129 -76 -354 -209 -500 -295 -146 -86 -353 -209 -460 -272 -107 -63
                    -399 -235 -648 -382 -488 -288 -520 -305 -569 -306 -28 0 -36 6 -53 40 -20 39
                    -20 51 -20 2328 0 2582 -8 2352 79 2420 26 20 179 115 341 211 162 96 448 265
                    635 376 396 235 1057 625 1265 747 80 47 258 152 395 233 480 284 484 286 530
                    277 13 -2 34 -15 47 -29z m-1046 -5782 c95 -43 99 -183 8 -275 -39 -39 -89
                    -72 -224 -148 -221 -125 -277 -146 -355 -128 -126 28 -123 198 5 299 71 56
                    380 230 447 251 72 23 70 23 119 1z" />
                        <path d="M6723 9946 c-35 -13 -150 -74 -255 -136 -106 -63 -323 -190 -483
                    -283 -159 -93 -382 -223 -495 -289 -113 -67 -439 -258 -725 -426 -286 -167
                    -578 -339 -650 -382 -71 -42 -240 -141 -375 -220 -288 -168 -364 -220 -388
                    -263 -16 -30 -17 -193 -17 -3007 l0 -2975 25 -50 c24 -48 31 -53 140 -107 119
                    -60 167 -70 191 -41 12 13 15 484 19 2952 5 2823 6 2938 23 2984 32 81 -13 52
                    1112 712 176 103 383 225 460 270 77 45 163 95 190 110 28 16 73 42 100 60 28
                    18 154 93 280 167 127 74 354 208 505 298 151 90 331 194 399 232 164 92 216
                    131 247 185 22 35 26 53 21 89 -13 121 -168 178 -324 120z" />
                    </g>
                </svg>
                <h1
                    class="mb-5 font-bold text-transparent text-7xl from-gray-900 to-emerald-600 bg-gradient-to-r bg-clip-text">
                    Next-Level Learning, Made Easy.</h1>
                <p class="mb-5">Ready to dive into a world of knowledge at your own pace? Explore our personalized
                    Learning Management System, along with a friendly chatbot, created for your needs and preferences.
                </p>
                <div class="space-y-4">
                    <a href="{{  url('/learner') }}" class="btn lg:btn-lg btn-primary btn-wide">Learner</a>
                    <a href="{{  url('/instructor') }}" class="btn btn-warning lg:btn-lg btn-wide">Instructor</a>

                </div>

            </div>
        </div>
    </section>

    <section class="relative w-full h-[1000px] text-black lg:py-4 lg:h-[500px] lg:px-2 lg:pt-16" id="about">
        <div class="flex-wrap justify-between h-full max-w-screen-xl mx-auto lg:flex">
            <div id="left" class="absolute w-full h-full lg:relative lg:w-1/2">
                <div class="flex items-center justify-center w-full h-full p-4">
                    {{-- <div class="w-full h-full lg:w-3/5 opacity-30 lg:opacity-100 bg-seagreen lg:h-4/5"></div> --}}
                    <img class="object-cover rounded-full lg:w-1/2 opacity-20 lg:opacity-100"
                        src="{{URL::asset('/assets/CityOfSanPedro.jpg')}}" alt="" srcset="">
                </div>
            </div>
            <div id="right" class="flex flex-col justify-center p-3 lg:w-1/2">
                <div class="space-y-4">
                    <div class="flex flex-row w-4/5">
                        <span class="mx-2 text-4xl">&#8212;</span>
                        <h1 class="text-3xl font-bold">About our Learning Management System</h1>
                    </div>

                    <p class="text-sm text-justify">Eskwela4EveryJuan is a personalized Learning Management System that
                        enables SMEs to acquire the ideal outcomes for their businesses. Enhancing a business's
                        potential through 21st-century technology and disseminating appropriate information to
                        accomplish socioeconomic business growth is one of the main objectives of this project. Through
                        the utilization of natural language processing technology in personalized learning management
                        systems for the community of San Pedro Laguna, it is now possible. One of the features of this
                        Learning Management System is the chatbot that may assist the student to navigate
                        Eskwela4EveryJuan completely. Eskwela4EveryJuan offers a creative system that focuses mainly on
                        a specific field of business, which includes courses related to entrepreneurship, business
                        management, basic accounting principles, service management, income taxation, consumer behavior,
                        and product management. The Learning Management System is made convenient by the on-demand
                        learning options, which solely depend on their time preferences.</p>

                    <p class="text-sm text-justify">Ang Eskwela4EveryJuan ay isang espesyal na Learning Management
                        System na tumutulong sa maliliit na negosyo na maging mas mahusay sa pamamagitan ng paggamit ng
                        modernong teknolohiya upang magbahagi ng kapaki-pakinabang na impormasyon. Mayroon itong feature
                        na chatbot para mas madaling gamitin ng mga estudyante. Nakatuon ang Learning Management System
                        na ito sa pagtuturo ng mahahalagang paksa sa negosyo tulad ng entrepreneurship, accounting, gawi
                        ng customer, pamamahala ng serbisyo, buwis sa kita, at pamamahala ng produkto. Maaaring matuto
                        ang mga tao kahit kailan nila gusto sa sistemang ito.</p>

                    <!--       <div>
                            <span><a class="font-medium text-darthmouthgreen hover:text-seagreen hover:underline" href="">Read more <i class="mx-1 fa-solid fa-arrow-right"></i></a></span>
                        </div>-->
                </div>
            </div>
        </div>
    </section>

    {{-- <section class="relative w-full px-2 py-4 text-black bg-opacity-50 h-72 bg-seagreen">
        <div class="flex flex-wrap items-center justify-between h-full max-w-screen-xl mx-auto">
            <div class="flex items-center">
                <div class="mx-2">
                    <i class="fa-solid fa-user fa-4x"></i>
                </div>
                <div class="flex flex-col items-center">
                    <span class="text-3xl font-bold">36</span>
                    <p>Students Enrolled</p>
                </div>
            </div>

            <div class="flex items-center">
                <div class="mx-2">
                    <i class="fa-solid fa-user-tie fa-4x"></i>
                </div>
                <div class="flex flex-col items-center">
                    <span class="text-3xl font-bold">36</span>
                    <p>Instructor Teachings</p>
                </div>
            </div>

            <div class="flex items-center">
                <div class="mx-2">
                    <i class="fa-solid fa-book fa-4x"></i>
                </div>
                <div class="flex flex-col items-center">
                    <span class="text-3xl font-bold">36</span>
                    <p>Courses Available</p>
                </div>
            </div>

            <div class="flex items-center">
                <div class="mx-2">
                    <i class="fa-solid fa-award fa-4x"></i>
                </div>
                <div class="flex flex-col items-center">
                    <span class="text-3xl font-bold">36</span>
                    <p>Certificates</p>
                </div>
            </div>
        </div>
    </section> --}}
    <!--        <section class="relative w-full px-4">
            <div class="w-full mx-auto shadow stats stats-vertical lg:stats-horizontal">
    
                <div class="stat">
                    <div class="stat-figure text-primary">
                        <i class="fa-solid fa-user fa-2xl"></i>
                    </div>
                    <div class="stat-title">Students Enrolled</div>
                    <div class="stat-value text-primary">25.6K</div>
                    <div class="stat-desc">21% more than last month</div>
                </div>
                
                <div class="stat">
                    <div class="stat-figure text-primary">
                        <i class="fa-solid fa-user-tie fa-2xl"></i>
                    </div>
                    <div class="stat-title">Instructor Teaching</div>
                    <div class="stat-value text-primary">2.6M</div>
                    <div class="stat-desc">21% more than last month</div>
                </div>

                <div class="stat">
                    <div class="stat-figure text-secondary">
                        <i class="fa-solid fa-book fa-2xl"></i>
                    </div>
                    <div class="stat-title">Courses Available</div>
                    <div class="stat-value text-secondary">2.6M</div>
                    <div class="stat-desc">21% more than last month</div>
                </div>
                
                <div class="stat">
                    <div class="stat-figure text-secondary">
                        <i class="fa-solid fa-award fa-2xl"></i>
                    </div>
                    <div class="stat-value">86%</div>
                    <div class="stat-title">Tasks done</div>
                    <div class="stat-desc text-secondary">31 tasks remaining</div>
                </div>
                
            </div>            
        </section>-->


    <section class="relative w-full px-2 py-4 text-black lg:h-screen lg:pt-16" id="bplo">
        <div class="h-full max-w-screen-xl mx-auto space-y-4">

            <div class="flex flex-col items-center w-full lg:flex-row">
                <div id="left" class="mx-5 leading-loose lg:w-1/2">
                    <div class="flex flex-row w-4/5 my-2">
                        <span class="text-4xl ">&#8212;</span>
                        <h1 class="text-3xl font-bold">Business Permits and Licensing Office</h1>
                    </div>
                    <p>The Business Permit and Licensing Office (BPLO) in San Pedro City, Laguna, oversees and regulates
                        Small and Medium Enterprises (SMEs). They are recognized for maintaining a vital part of the
                        Local Government Unit (LGU) by providing educational services to SME owners to promote the
                        community's economic development. The Business Permit and Licensing Office intends to assist
                        SMEs in managing the complexity of their businesses while also simplifying business permit
                        processes through technological skills.</p>

                    <p class="mt-5"><i>Ang Business Permit and Licensing Office (BPLO) sa San Pedro City, Laguna, ang
                            nangangasiwa at nagkokontrol sa mga Small and Medium Enterprises (SMEs). Kinikilala sila sa
                            pagpapanatili ng isang mahalagang bahagi ng Local Government Unit (LGU) sa pamamagitan ng
                            pagbibigay ng mga serbisyong pang-edukasyon sa mga may-ari ng SME upang itaguyod ang
                            pag-unlad ng ekonomiya ng komunidad. Nilalayon ng Business Permit and Licensing Office na
                            tulungan ang mga SME sa pamamahala mula sa pagiging kumplikado ng kanilang mga Negosyo,
                            habang pinapasimple rin ang mga proseso ng business permit sa pamamagitan ng mga
                            teknolohikal na kasanayan.</i></p>
                </div>

                <div id="right" class="lg:w-1/2">
                    <div class="flex flex-col items-center justify-center space-y-1">
                        <div class="flex items-center justify-center space-x-1">
                            <img class="object-cover w-1/2 rounded-lg"
                                src="{{URL::asset('/assets/CityOfSanPedro1.jpg')}}" alt="">
                            <img class="object-cover w-1/2 rounded-lg"
                                src="{{URL::asset('/assets/CityOfSanPedro2.jpg')}}" alt="">
                        </div>
                        <div class="w-full">
                            <img class="object-cover w-full rounded-lg h-52"
                                src="{{URL::asset('/assets/CityOfSanPedro3.jpg')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <section class="relative w-full px-2 py-4 text-black bg-opacity-50 h-72" id="contact">
        <div
            class="flex flex-col items-center justify-center h-full max-w-screen-xl py-8 mx-auto space-y-2 text-center">
            <h1 class="text-3xl font-bold text-seagreen ">Email to know more about us.</h1>
            <p>Your interest in learning more about us means a lot! Kindly send us your email, and we will pave the way
                for you!</p>
            <p><i> Ang iyong interes sa pag-aaral ng higit pa tungkol sa amin ay mahalaga! Mangyaring ipadala sa amin
                    ang iyong email, at kami ay gagawa ng paraan para sa iyo!</i></p>
            <form action="">
                <div class="px-2 join">
                    <input class="input input-bordered join-item" placeholder="Email" />
                    <button class="rounded-r-full btn join-item btn-primary">Send</button>
                </div>
            </form>
        </div>
    </section>


    <footer class="p-10 footer footer-center bg-primary text-primary-content">
        <aside>
            {{-- <svg width="50" height="50" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd"
                clip-rule="evenodd" class="inline-block fill-current">
                <path
                    d="M22.672 15.226l-2.432.811.841 2.515c.33 1.019-.209 2.127-1.23 2.456-1.15.325-2.148-.321-2.463-1.226l-.84-2.518-5.013 1.677.84 2.517c.391 1.203-.434 2.542-1.831 2.542-.88 0-1.601-.564-1.86-1.314l-.842-2.516-2.431.809c-1.135.328-2.145-.317-2.463-1.229-.329-1.018.211-2.127 1.231-2.456l2.432-.809-1.621-4.823-2.432.808c-1.355.384-2.558-.59-2.558-1.839 0-.817.509-1.582 1.327-1.846l2.433-.809-.842-2.515c-.33-1.02.211-2.129 1.232-2.458 1.02-.329 2.13.209 2.461 1.229l.842 2.515 5.011-1.677-.839-2.517c-.403-1.238.484-2.553 1.843-2.553.819 0 1.585.509 1.85 1.326l.841 2.517 2.431-.81c1.02-.33 2.131.211 2.461 1.229.332 1.018-.21 2.126-1.23 2.456l-2.433.809 1.622 4.823 2.433-.809c1.242-.401 2.557.484 2.557 1.838 0 .819-.51 1.583-1.328 1.847m-8.992-6.428l-5.01 1.675 1.619 4.828 5.011-1.674-1.62-4.829z">
                </path>
            </svg> --}}
            {{-- <p class="font-bold">
                Eskwela4EveryJuan <br>Providing reliable tech since 2023
            </p> --}}
            <p>Copyright © 2024 - All right reserved</p>
        </aside>

        <!--</nav>-->
    </footer>

</section>

<script>
    $(document).ready(function() {
        $(window).scroll(function() {
            if ($(this).scrollTop() > 600) { // Change 50 to the desired scroll position
                $('nav').removeClass('bg-opacity-40');
            } else {
                $('nav').addClass('bg-opacity-40');
            }
        });

        $("nav").find("a").click(function(e) {
            e.preventDefault();
            var section = $(this).attr("href");
            $("html, body").animate({
                scrollTop: $(section).offset().top
            });
        });
    });


</script>

@endsection