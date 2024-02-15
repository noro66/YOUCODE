@extends('base')
@section('title', 'Home')
@section('content')
    <x-nav-bar />
    <section id="hero ">
        <div class="container mt-5 mx-auto px-6 space-x-6 flex flex-col-reverse md:flex-row">
            <div class="md:w-1/2 flex flex-col justify-center space-y-5 py-8 text-center md:text-left text-slate-900">
                <h1 class="font-bold text-3xl md:text-4xl">
                    Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet.
                </h1>
                <p>
                    lorem ipsum dolor sit, amet consectetur adipisicing elit. At
                    corporis eum impedit unde iure eius? Qui
                </p>
                <a href="#"
                   class="bg-orange-700 hover:bg-slate-900 self-center md:self-start px-6 py-2 rounded-full">Regester
                    Now</a>
            </div>

            <div class="md:w-1/2">
                <img src="./storage/images/undraw_order_ride_re_372k.svg" alt="Hero image" />
            </div>
        </div>
    </section>

    <section id="drivers">
        <div class="container px-5 mx-auto my-32 text-center">
            <h1 class="font-bold text-4xl">
                "Our Drivers is always is Here For You"
            </h1>
            <div class="mt-10 flex flex-col items-center md:flex-row md:space-x-5 space-y-5 md:space-y-0">
                <div class="md:w-1/3 bg-slate-200 flex flex-col p-5 space-y-2 rounded-lg border border-slate-300">
                    <img class="self-center" src="./storage/images/undraw_pic_profile_re_7g2h.svg" width="100px" alt="" />
                    <h5 class="font-bold text-xl">Amad Smith</h5>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Laboriosam non odio cupiditate, a aspernatur sed corporis
                        assumenda mo items-centerdi officiis recusandae.
                    </p>
                </div>
                <div class="md:w-1/3 bg-slate-200 flex flex-col p-5 space-y-2 rounded-lg border border-slate-300">
                    <img class="self-center" src="./storage/images/undraw_pic_profile_re_7g2h.svg" width="100px" alt="" />
                    <h5 class="font-bold text-xl">Amad Smith</h5>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Laboriosam non odio cupiditate, a aspernatur sed corporis
                        assumenda mo items-centerdi officiis recusandae.
                    </p>
                </div>
                <div class="md:w-1/3 bg-slate-200 flex flex-col p-5 space-y-2 rounded-lg border border-slate-300">
                    <img class="self-center" src="./storage/images/undraw_pic_profile_re_7g2h.svg" width="100px" alt="" />
                    <h5 class="font-bold text-xl">Amad Smith</h5>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Laboriosam non odio cupiditate, a aspernatur sed corporis
                        assumenda modi officiis recusandae.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <x-footer />
@endsection
