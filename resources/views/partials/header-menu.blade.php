<header class="mb-4">
    <div class="border-b md:border-none">
        <div class="ocontainer-2 pt-4 flex justify-between md:pt-5">
            <div class="hamburger block md:hidden">
                <span></span>
                <span></span>
                <span></span>
            </div>

            <div class="hidden space-x-3 md:flex">
                <a href="https://www.facebook.com/okbankindonesia" class="hover:underline">
                    <img class="w-10" src={{ asset('images/socials/fb.png') }} alt="">
                </a>
                <a href="https://www.instagram.com/okbankindonesia/" class="hover:underline">
                    <img class="w-10" src={{ asset('images/socials/ig.png') }} alt="">
                </a>
                <a href="https://www.youtube.com/channel/UCxOQwVG0XOvQ18bC8YIDKNg" class="hover:underline">
                    <img class="w-10" src={{ asset('images/socials/yt.png') }} alt="">
                </a>
            </div>
            <div class="flex space-x-1 md:space-x-3">
                <a href="#" class="okbtn text-xs orange">Kirim Tulisan</a>
                <a href="#" class="okbtn text-xs">Berlangganan</a>
            </div>
        </div>
        <div class="flex justify-center">
            <a href="/" class="icon mb-4 mt-2 md:mt-1">
                <img src={{ asset('images/okbank.jpg') }} alt="" class="w-full">
            </a>
        </div>
    </div>

    <div class="ocontainer-1 float">
        <div class="menu py-4 justify-evenly border hidden md:flex">
            <ul>
                <li>
                    <a href="#" class="text-sm md:text-lg hover:underline">Finansial</a>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="#" class="text-sm md:text-lg hover:underline">Karir & Sukses</a>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="#" class="text-sm md:text-lg hover:underline">Gaya Hidup</a>
                </li>
            </ul>

            <div class="relative search cursor-pointer hidden md:block">
                <input type="text" class="absolute -top-2 border right-10 hidden px-3 py-2 text-sm md:text-base"
                    placeholder="search">
                <img class="open w-5" src={{ asset('images/search.png') }} alt="">
                <img class="close w-5 h-5" src={{ asset('images/close.png') }} alt="">
            </div>
        </div>
    </div>

    <div class="search flex justify-end pt-4 pr-5 cursor-pointer block md:hidden">
        <input type="text" class="border-b mr-5 hidden px-2 py-1 text-sm md:text-base" placeholder="search">
        <img class="open w-5 h-5" src={{ asset('images/search.png') }} alt="">
        <img class="close w-5 h-5" src={{ asset('images/close.png') }} alt="">
    </div>
</header>
