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
                    <h3><a class="px-2 hover:font-medium hover:text-base" href="{{ url('/instructor') }}">Instructor</a></h3>
                </div>                
            </div>
        </nav> --}}

        <nav class="fixed z-50 text-black border-b-2 border-gray-300 navbar bg-base-100">
            <div class="navbar-start">
                <div class="dropdown">
                <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" /></svg>
                </div>
                <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                    <li><a href="#home">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#bplo">BPLO</a></li>
                    <li><a href="#contact">Contacts</a></li>
                </ul>
                </div>
                <a class="text-xl btn btn-ghost text-darthmouthgreen" href="#">
                <img style="width:125px;" class="mx-5" src="{{ asset('storage/images/e4ej_logo_landscape_2.png')}}" alt="">
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
                        
                    <img class="mx-5" style="scale:85%;" src="{{ asset('storage/images/e4ej_logo-landscape.png')}}" alt="">
                    <h1 class="mb-5 font-bold text-transparent text-7xl from-gray-900 to-emerald-600 bg-gradient-to-r bg-clip-text">Next-Level Learning, Made Easy.</h1>
                    <p class="mb-5">Ready to dive into a world of knowledge at your own pace? Explore our personalized Learning Management System, along with a friendly chatbot, created for your needs and preferences.</p>
                    <div class="space-y-4">
                        <a href="{{  url('/learner') }}" class="btn lg:btn-lg btn-primary btn-wide">Student</a>
                        <a href="{{  url('/instructor') }}" class="btn lg:btn-lg btn-wide">Instructor</a>
                                    
                    </div>

                </div>
            </div>
        </section>

        <section class="relative w-full h-[1000px] text-black lg:py-4 lg:h-[500px] lg:px-2 lg:pt-16" id="about">
            <div class="flex-wrap justify-between h-full max-w-screen-xl mx-auto lg:flex">
                <div id="left" class="absolute w-full h-full lg:relative lg:w-1/2">
                    <div class="flex items-center justify-center w-full h-full p-4">
                        {{-- <div class="w-full h-full lg:w-3/5 opacity-30 lg:opacity-100 bg-seagreen lg:h-4/5"></div> --}}
                        <img class="object-cover rounded-full lg:w-1/2 opacity-20 lg:opacity-100" src="{{URL::asset('/assets/CityOfSanPedro.jpg')}}" alt="" srcset="">
                    </div>
                </div>                      
                <div id="right" class="flex flex-col justify-center p-3 lg:w-1/2">
                    <div class="space-y-4">
                        <div class="flex flex-row w-4/5">
                            <span class="mx-2 text-4xl">&#8212;</span>
                            <h1 class="text-3xl font-bold">About our Learning Management System</h1>
                        </div>
                        
                        <p class="text-sm text-justify">Eskwela4EveryJuan is a personalized Learning Management System that enables SMEs to acquire the ideal outcomes for their businesses. Enhancing a business's potential through 21st-century technology and disseminating appropriate information to accomplish socioeconomic business growth is one of the main objectives of this project. Through the utilization of natural language processing technology in personalized learning management systems for the community of San Pedro Laguna, it is now possible. One of the features of this Learning Management System is the chatbot that may assist the student to navigate Eskwela4EveryJuan completely. Eskwela4EveryJuan offers a creative system that focuses mainly on a specific field of business, which includes courses related to entrepreneurship, business management, basic accounting principles, service management, income taxation, consumer behavior, and product management. The Learning Management System is made convenient by the on-demand learning options, which solely depend on their time preferences.</p>

                        <p class="text-sm text-justify">Ang Eskwela4EveryJuan ay isang espesyal na Learning Management System na tumutulong sa maliliit na negosyo na maging mas mahusay sa pamamagitan ng paggamit ng modernong teknolohiya upang magbahagi ng kapaki-pakinabang na impormasyon. Mayroon itong feature na chatbot para mas madaling gamitin ng mga estudyante. Nakatuon ang Learning Management System na ito sa pagtuturo ng mahahalagang paksa sa negosyo tulad ng entrepreneurship, accounting, gawi ng customer, pamamahala ng serbisyo, buwis sa kita, at pamamahala ng produkto. Maaaring matuto ang mga tao kahit kailan nila gusto sa sistemang ito.</p>
                    
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
                        <p>The Business Permit and Licensing Office (BPLO) in San Pedro City, Laguna, oversees and regulates Small and Medium Enterprises (SMEs). They are recognized for maintaining a vital part of the Local Government Unit (LGU) by providing educational services to SME owners to promote the community's economic development. The Business Permit and Licensing Office intends to assist SMEs in managing the complexity of their businesses while also simplifying business permit processes through technological skills.</p>
                        
                        <p class="mt-5"><i>Ang Business Permit and Licensing Office (BPLO) sa San Pedro City, Laguna, ang nangangasiwa at nagkokontrol sa mga Small and Medium Enterprises (SMEs). Kinikilala sila sa pagpapanatili ng isang mahalagang bahagi ng Local Government Unit (LGU) sa pamamagitan ng pagbibigay ng mga serbisyong pang-edukasyon sa mga may-ari ng SME upang itaguyod ang pag-unlad ng ekonomiya ng komunidad. Nilalayon ng Business Permit and Licensing Office na tulungan ang mga SME sa pamamahala mula sa pagiging kumplikado ng kanilang mga Negosyo, habang pinapasimple rin ang mga proseso ng business permit sa pamamagitan ng mga teknolohikal na kasanayan.</i></p>
                    </div>
                    
                    <div id="right" class="lg:w-1/2">
                        <div class="flex flex-col items-center justify-center space-y-1">
                            <div class="flex items-center justify-center space-x-1">
                                <img class="object-cover w-1/2 rounded-lg" src="{{URL::asset('/assets/CityOfSanPedro1.jpg')}}" alt="">
                                <img class="object-cover w-1/2 rounded-lg" src="{{URL::asset('/assets/CityOfSanPedro2.jpg')}}" alt="">
                            </div>
                            <div class="w-full">
                                <img class="object-cover w-full rounded-lg h-52" src="{{URL::asset('/assets/CityOfSanPedro3.jpg')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <section class="relative w-full px-2 py-4 text-black bg-opacity-50 h-72" id="contact">
            <div class="flex flex-col items-center justify-center h-full max-w-screen-xl py-8 mx-auto space-y-2 text-center">
                <h1 class="text-3xl font-bold text-seagreen ">Email to know more about us.</h1>
                <p>Your interest in learning more about us means a lot! Kindly send us your email, and we will pave the way for you!</p>
                <p><i> Ang iyong interes sa pag-aaral ng higit pa tungkol sa amin ay mahalaga! Mangyaring ipadala sa amin ang iyong email, at kami ay gagawa ng paraan para sa iyo!</i></p>
                <form action="">
                    <div class="px-2 join">
                        <input class="input input-bordered join-item" placeholder="Email"/>
                        <button class="rounded-r-full btn join-item btn-primary">Send</button>
                    </div>
                </form>
            </div>
        </section>


        <footer class="p-10 footer footer-center bg-primary text-primary-content">
            <aside>
                {{-- <svg width="50" height="50" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd" class="inline-block fill-current"><path d="M22.672 15.226l-2.432.811.841 2.515c.33 1.019-.209 2.127-1.23 2.456-1.15.325-2.148-.321-2.463-1.226l-.84-2.518-5.013 1.677.84 2.517c.391 1.203-.434 2.542-1.831 2.542-.88 0-1.601-.564-1.86-1.314l-.842-2.516-2.431.809c-1.135.328-2.145-.317-2.463-1.229-.329-1.018.211-2.127 1.231-2.456l2.432-.809-1.621-4.823-2.432.808c-1.355.384-2.558-.59-2.558-1.839 0-.817.509-1.582 1.327-1.846l2.433-.809-.842-2.515c-.33-1.02.211-2.129 1.232-2.458 1.02-.329 2.13.209 2.461 1.229l.842 2.515 5.011-1.677-.839-2.517c-.403-1.238.484-2.553 1.843-2.553.819 0 1.585.509 1.85 1.326l.841 2.517 2.431-.81c1.02-.33 2.131.211 2.461 1.229.332 1.018-.21 2.126-1.23 2.456l-2.433.809 1.622 4.823 2.433-.809c1.242-.401 2.557.484 2.557 1.838 0 .819-.51 1.583-1.328 1.847m-8.992-6.428l-5.01 1.675 1.619 4.828 5.011-1.674-1.62-4.829z"></path></svg> --}}
                {{-- <p class="font-bold">
                Eskwela4EveryJuan <br>Providing reliable tech since 2023
                </p>  --}}
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