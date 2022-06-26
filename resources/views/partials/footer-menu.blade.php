<footer class="ocontainer-3 py-5 bg-brown border-white text-white">
    <div class="hidden lg:block">
        <div class="grid grid-cols-3 border-b pb-5">
            <div class="flex justify-evenly items-center">
                <p>Customer Care</p>
                <p class="text-3xl">150 112</p>
            </div>
            <div class="flex justify-evenly border-l border-r items-center">
                <p>KTA Call Center</p>
                <p class="text-3xl">150 119</p>
            </div>
            <div class="flex justify-center items-center space-x-3">
                {{-- <p>icon</p> --}}
                <p>Senin - Jumat | 08.00 - 16.00 WIB</p>
            </div>
        </div>

        <div class="flex justify-between items-start text-xs leading-7 pt-10">
            <div class="w-60">
                <div class="flex pb-2 justify-center">
                    @include('partials.okbank-white-icon')
                </div>
                <div class="flex py-4 justify-between">
                    @include('partials.ojk-icon')
                    @include('partials.lps-icon')
                </div>
                <p>PT. Bank Oke Indonesia Tbk terdaftar dan diawasi oleh Otoritas Jasa Keuangan dan perserta penjamin
                    LPS</p>
            </div>

            <div class="flex flex-col">
                <a href="" class="hover:underline text-base pb-2">Produk Kami</a>
                <a href="" class="hover:underline">Tabungan</a>
                <a href="" class="hover:underline">Pinjaman</a>
                <a href="" class="hover:underline">M-Banking</a>
            </div>

            <div class="flex flex-col">
                <a href="" class="hover:underline text-base pb-2">Tentang OK Bank</a>
                <a href="" class="hover:underline">Profil Perusahaan</a>
                <a href="" class="hover:underline">Hubungi Investor</a>
                <a href="" class="hover:underline">Tata Kelola</a>
                <a href="" class="hover:underline">Tanggung Jawab Sosial</a>
                <a href="" class="hover:underline">Informasi</a>
            </div>

            <div class="flex flex-col">
                <a href="" class="hover:underline text-base pb-2">Karir</a>
            </div>

            <div class="flex flex-col">
                <p class="text-base pb-2">Alamat</p>
                <p>Kantor Pusat</p>
                <p>Jl. Ir. H. Juanda No.12</p>
                <p>RT.14/RW.4, Kb. Kpl., Kecamatan</p>
                <p>Gambir, Kota Jakarta Pusat</p>
                <p>Daerah Khusus Ibukota Jakarta</p>
                <p>10120</p>
                <a href="" class="hover:underline">Cabang Lainnya</a>
            </div>

            <div class="flex flex-col">
                <p class="text-base pb-2">Hubungi Kami</p>
                <p>customercare@okbank.co.id</p>
                <div class="flex">
                    <div class="flex space-x-2">
                        <a href="https://www.facebook.com/okbankindonesia" class="hover:underline">
                            <img class="w-8" src={{ asset('images/socials/fb-gray.png') }} alt="">
                        </a>
                        <a href="https://www.instagram.com/okbankindonesia/" class="hover:underline">
                            <img class="w-8" src={{ asset('images/socials/ig-gray.png') }} alt="">
                        </a>
                        <a href="https://www.youtube.com/channel/UCxOQwVG0XOvQ18bC8YIDKNg" class="hover:underline">
                            <img class="w-8" src={{ asset('images/socials/yt-gray.png') }} alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex text-sm justify-between pb-3 pt-8">
            <p class="text-xs font-bold md:text-sm">&copy; 20212 All Right Reserved.</p>
            <div class="flex text-xs pb-4 font-bold md:pb-0 md:text-sm">
                <a href="" class="hover:underline border-r pr-4">Term & Condition</a>
                <a href="" class="hover:underline border-r px-3">Privacy Police</a>
                <a href="" class="hover:underline border-r px-3">Sitemap</a>
                <div class="hover:underline pl-3">@include('partials.ok-finacial')</div>
            </div>
        </div>
    </div>

    <div class="block lg:hidden">
        <h5 class="text-2xl py-2">Tentang Kami</h5>
        <div class="flex space-x-2">
            <a href="" class="hover:underline">
                <img class="w-8" src={{ asset('images/socials/fb-gray.png') }} alt="">
            </a>
            <a href="" class="hover:underline">
                <img class="w-8" src={{ asset('images/socials/ig-gray.png') }} alt="">
            </a>
            <a href="" class="hover:underline">
                <img class="w-8" src={{ asset('images/socials/yt-gray.png') }} alt="">
            </a>
        </div>
        <h5 class="text-2xl pt-4 pb-2">Office</h5>
        <p class="text-sm">Jl. Ir. H. Juanda No.12 RT.14/RW.4, Kb. Kpl., Kecamatan Gambir, Kota Jakarta Pusat
            Daerah Khusus Ibukota Jakarta 10120</p>
        <h5 class="text-2xl pt-4 py-2">Bahasa</h5>
        <div class="flex">
            <a href="" class="text-sm border-r pr-3 mr-3">Indonesia</a>
            <a href="" class="text-sm">English</a>
        </div>

        <div class="py-3 flex justify-center">
            @include('partials.lps-icon')
        </div>
        <p class="text-center text-sm">PT. Bank Oke Indonesia Tbk terdaftar dan diawasi oleh Otoritas Jasa Keuangan dan
            perserta penjamin LPS</p>
    </div>
</footer>
