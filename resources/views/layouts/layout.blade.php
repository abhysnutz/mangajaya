<!doctype html>
<html lang="id" {{Route::currentRouteName() == 'detailManga' || Route::currentRouteName() == 'detailChapter' ? '' :  (Route::currentRouteName() == 'detailGenre' ? 'class=index terbaru' : 'class=index terbaru daftar')}}>
    <head>
        <meta charset="UTF-8">
        <meta name="referrer" content="no-referrer-when-downgrade">
        <meta name="viewport" content="width=device-width">
        <meta name="robots" content="all">
        <title>Daftar Komik - Komiku</title>
        <meta name="description" content="Daftar Komik terlengkap yang tersedia di Komiku, semua berbahasa Indonesia dengan kualitas gambar HD.">
        <!-- <meta name="google-site-verification" content="-7mnNLp_bkQmElA8T0yP4o1Akoixf7OpiK52_B4sCpk"> -->
        <!-- <meta name="propeller" content="e5a0c8cbdd07c2c0e0056db72d0cddf5"> -->

        @if(Route::currentRouteName() == 'detailManga')
            <style rel="stylesheet" type="text/css" media="screen">
                @media only screen and (min-width:800px) {
                    .cv {
                        background-image: linear-gradient(transparent, rgba(0, 0, 0, 0.7)), url({{url('/storage/komik/background_detail/'.$detailManga->slug_manga.'.jpg')}});
                    }
                }
                
                @media only screen and (max-width:799px) {
                    .cv {
                        background-image: linear-gradient(transparent, rgba(0, 0, 0, 0.7)), url({{url('/storage/komik/background_detail/'.$detailManga->slug_manga.'.jpg')}});
                    }
                }
            </style>
        @endif
        <link rel="icon" href="https://komiku.co.id/wp-content/uploads/2020/02/Baca-Komik.png">
        <link rel="dns-prefetch" href="https://i0.wp.com/">
        <link rel="dns-prefetch" href="https://iklan.komiku.co.id/">
        <meta name="theme-color" content="#fff">
        <style rel="stylesheet" type="text/css" media="screen">
            a.mobileads {
                display: none
            }
            
            .Hot:before {
                content: "🔥"
            }
            
            .Rekomendasi:before {
                content: "";
                color: #4163b2
            }
            
            .logo {
                width: 100%;
                position: fixed;
                top: 0;
                left: 0;
                text-align: center;
                right: 0;
                padding-top: 300px;
                bottom: 0;
                background: #4164b2
            }
            
            .logo svg {
                height: 100px;
                color: #fff
            }
            
            .logo a {
                text-decoration: none
            }
            
            .logo a span {
                overflow: hidden;
                width: 100%;
                float: left;
                color: #4163b2;
                font-size: 40px;
                text-shadow: -1px 0 #fff, 0 2px #fff, 2px 0 #fff, 0 -1px #fff;
                font-weight: 700;
                font-family: segoe ui
            }
            
            .at a:visited h3,
            .grd a:visited h4,
            .grd2 a:visited h3,
            .tpe1 a:visited h3,
            tr a:visited,
            .grd2 a:visited span,
            .daftar .bge a:visited,
            li.ranking1 a:visited h4 {
                color: #4163b2
            }
            
            .rd {
                border-radius: 5px !important;
            }
            
            .bc .prv img.mcimg {
                width: 175px !important;
                min-width: unset;
            }
            
            #AdWidgetContainer > div {
                padding: 0 !Important
            }
            
            #AdWidgetContainer.toaster div img {
                margin: 10px !important
            }
            
            #AdWidgetContainer.toaster .mctitle a {
                float: left;
                text-align: center;
                width: 100%;
                padding-bottom: 15px;
            }
            
            .mgheader img {
                display: none !important
            }
            
            nav ul {
                display: flex
            }
            
            @media only screen and (max-width: 700px) {
                a.pcads {
                    display: none
                }
                a.mobileads {
                    display: block
                }
                nav ul {
                    width: 820px !important;
                }
                .bvr-list__item.bvr-list__item--left {
                    width: 100% !important;
                }
            }
            
            .kn li {
                float: left;
                margin-right: 25px;
            }
        </style>
    </head>

    <body {{Route::currentRouteName() == 'detailManga' ? 'class=series' : ''}} {{Route::currentRouteName() == 'detailChapter' ? 'onclick=myFunction()' : ''}} >
        <header id="header">
            <div class="hd2">
                <div class="perapih">
                    <div class="logo">
                        <a href="/">
                            <svg class="svg-inline--fa fa-korvue fa-w-14" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="korvue" role="img" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 446 512" data-fa-i2svg="">
                                <path fill="currentColor" d="M386.5 34h-327C26.8 34 0 60.8 0 93.5v327.1C0 453.2 26.8 480 59.5 480h327.1c33 0 59.5-26.8 59.5-59.5v-327C446 60.8 419.2 34 386.5 34zM87.1 120.8h96v116l61.8-116h110.9l-81.2 132H87.1v-132zm161.8 272.1l-65.7-113.6v113.6h-96V262.1h191.5l88.6 130.8H248.9z"></path>
                                </svg><span>Komiku</span></a>
                    </div>
                    <form class="search_box active" id="search_box" action="/">
                        <select name="post_type" id="searchform_cat" class="postform" style="display:none">
                            <option class="level-1" value="manga">Manga</option>
                        </select>
                        <input name="s" id="s" placeholder="Komiku.co" type="text">
                        <input class="search_icon" value="Cari" type="submit"> </form>
                    <ul class="second_nav">
                        <li>
                            <a href="{{url('/other/hot')}}" title="Komik Hot">
                                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="fire-alt" role="img" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="" style="color: #df0000;">
                                    <path fill="currentColor" d="M323.56 51.2c-20.8 19.3-39.58 39.59-56.22 59.97C240.08 73.62 206.28 35.53 168 0 69.74 91.17 0 209.96 0 281.6 0 408.85 100.29 512 224 512s224-103.15 224-230.4c0-53.27-51.98-163.14-124.44-230.4zm-19.47 340.65C282.43 407.01 255.72 416 226.86 416 154.71 416 96 368.26 96 290.75c0-38.61 24.31-72.63 72.79-130.75 6.93 7.98 98.83 125.34 98.83 125.34l58.63-66.88c4.14 6.85 7.91 13.55 11.27 19.97 27.35 52.19 15.81 118.97-33.43 153.42z"></path>
                                </svg> <span>Hot</span></a>
                        </li>
                        <li>
                            <a href="{{url('/other/rekomendasi')}}" title="Komik Rekomendasi">
                                <svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="thumbs-up" role="img" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="" style="color: #4163b2;">
                                    <path fill="currentColor" d="M466.27 286.69C475.04 271.84 480 256 480 236.85c0-44.015-37.218-85.58-85.82-85.58H357.7c4.92-12.81 8.85-28.13 8.85-46.54C366.55 31.936 328.86 0 271.28 0c-61.607 0-58.093 94.933-71.76 108.6-22.747 22.747-49.615 66.447-68.76 83.4H32c-17.673 0-32 14.327-32 32v240c0 17.673 14.327 32 32 32h64c14.893 0 27.408-10.174 30.978-23.95 44.509 1.001 75.06 39.94 177.802 39.94 7.22 0 15.22.01 22.22.01 77.117 0 111.986-39.423 112.94-95.33 13.319-18.425 20.299-43.122 17.34-66.99 9.854-18.452 13.664-40.343 8.99-62.99zm-61.75 53.83c12.56 21.13 1.26 49.41-13.94 57.57 7.7 48.78-17.608 65.9-53.12 65.9h-37.82c-71.639 0-118.029-37.82-171.64-37.82V240h10.92c28.36 0 67.98-70.89 94.54-97.46 28.36-28.36 18.91-75.63 37.82-94.54 47.27 0 47.27 32.98 47.27 56.73 0 39.17-28.36 56.72-28.36 94.54h103.99c21.11 0 37.73 18.91 37.82 37.82.09 18.9-12.82 37.81-22.27 37.81 13.489 14.555 16.371 45.236-5.21 65.62zM88 432c0 13.255-10.745 24-24 24s-24-10.745-24-24 10.745-24 24-24 24 10.745 24 24z"></path>
                                </svg> <span>Rekomendasi</span></a>
                        </li>
                        <li>
                            <a href="{{url('/other/berwarna')}}" title="Komik Berwarna/Full Color">
                                <svg style="color: #df6300;" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="palette" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                    <path fill="currentColor" d="M204.3 5C104.9 24.4 24.8 104.3 5.2 203.4c-37 187 131.7 326.4 258.8 306.7 41.2-6.4 61.4-54.6 42.5-91.7-23.1-45.4 9.9-98.4 60.9-98.4h79.7c35.8 0 64.8-29.6 64.9-65.3C511.5 97.1 368.1-26.9 204.3 5zM96 320c-17.7 0-32-14.3-32-32s14.3-32 32-32 32 14.3 32 32-14.3 32-32 32zm32-128c-17.7 0-32-14.3-32-32s14.3-32 32-32 32 14.3 32 32-14.3 32-32 32zm128-64c-17.7 0-32-14.3-32-32s14.3-32 32-32 32 14.3 32 32-14.3 32-32 32zm128 64c-17.7 0-32-14.3-32-32s14.3-32 32-32 32 14.3 32 32-14.3 32-32 32z"></path>
                                </svg> <span>Berwarna</span></a>
                        </li>
                    </ul>
                </div>
            </div>
            <nav itemscope="" itemtype="http://www.schema.org/SiteNavigationElement">
                <ul>
                    <li itemprop="name"><a itemprop="url" href="{{url('/manga')}}" title="Update Komik Terbaru">Terbaru</a></li>
                    <li itemprop="name"><a itemprop="url" href="/ikuti/" rel="nofollow">Subscribe <i>(new)</i></a></li>
                    <li itemprop="name"><a itemprop="url" href="{{url('/daftar-komik')}}" title="Daftar Komik">Daftar Komik</a></li>
                    <li itemprop="name"><a itemprop="url" href="{{url('/daftar-genre')}}" title="Daftar Genre">Genre</a></li>
                    <li itemprop="name"><a itemprop="url" href="/manga/one-piece-bahasa-indonesia/" title="Komik One Piece">One Piece</a></li>
                    <li itemprop="name"><a itemprop="url" href="/manga/kimetsu-no-yaiba-indo/" title="Komik Kimetsu no Yaiba">Kimetsu no Yaiba</a></li>
                    <li itemprop="name"><a itemprop="url" href="/manga/solo-leveling-bahasa-indonesia/" title="Komik Solo Leveling">Solo Leveling</a></li>
                    <li itemprop="name"><a itemprop="url" href="/manga/boruto/" title="Komik Boruto">Boruto</a></li>
                </ul>
            </nav>
        </header>
        <script type="text/javascript">
            document.addEventListener("DOMContentLoaded", function() {
                var lazyImages = [].slice.call(document.querySelectorAll(".lazy"));
                if ("IntersectionObserver" in window) {
                    let lazyImageObserver = new IntersectionObserver(function(entries, observer) {
                        entries.forEach(function(entry) {
                            if (entry.isIntersecting) {
                                let lazyImage = entry.target;
                                lazyImage.src = lazyImage.dataset.src;
                                lazyImage.classList.remove("img.lazy");
                                lazyImageObserver.unobserve(lazyImage);
                            }
                        });
                    });
                    lazyImages.forEach(function(lazyImage) {
                        lazyImageObserver.observe(lazyImage);
                    });
                }
            });
        </script>
        <script>
        function linkFilter(id)
            {
                document.getElementById("abc").href = id;
            }
        </script>
        <link rel="stylesheet" href="https://komiku.co.id/wp-content/themes/komik/style.css">
        
        @if(Route::currentRouteName() == 'categoryManga')
            <a href="{{url('manga/'.$manga[0]->slug_manga)}}" title="Baca {{$manga[0]->jenis_manga}} {{$manga[0]->nama_manga}}">
                <div class="cv">
                    <div class="at1">
                        <div class="perapih">
                            <div class="prk1">✪ 1</div>
                            <h3>{{$manga[0]->nama_manga}}</h3>
                        </div>
                    </div>
                </div>
            </a>
            <style>
                .cv {
                    background-image: linear-gradient(transparent, rgba(0, 0, 0, 0.7)), url('{{url('/storage/komik/background_detail/'.$manga[0]->slug_manga.'.jpg')}}');
                }
            </style>
        @endif


        @if(Route::currentRouteName() == 'detailManga')
            <div class="cv"></div>
        @endif

        <!-- KONTEN -->
        <main {{Route::currentRouteName() == 'detailChapter' ? '' : 'class=perapih'}}>
            @yield('konten')
        </main>
        <!-- END KONTEN -->
        
        <!-- STYLE MANGA READER-->
        @if(Route::currentRouteName() == 'detailChapter')

            <style type="text/css">
                .nva,
                .nvb {
                    display: block !important
                }
                
                .part2,
                .part1 {
                    display: grid
                }
            </style>
        @endif


        <!-- SCRIPT PAGE -->
        @if(Route::currentRouteName() == 'categoryManga')
            <script>
                function openLink(evt, animName) {
                    var i, x, tablinks;
                    x = document.getElementsByClassName("sec");
                    for (i = 0; i < x.length; i++) {
                        x[i].style.display = "none";
                    }
                    tablinks = document.getElementsByClassName("tab");
                    for (i = 0; i < x.length; i++) {
                        tablinks[i].className = tablinks[i].className.replace(" curr", "");
                    }
                    document.getElementById(animName).style.display = "block";
                    evt.currentTarget.className += " curr";
                }
                var mybtn = document.getElementsByClassName("def")[0];
                mybtn.click(); 
            </script> 

            <script>
                function openLink2(evt, animName) {
                    var i, x, tablinks;
                    x = document.getElementsByClassName("sectipe2");
                    for (i = 0; i < x.length; i++) {
                        x[i].style.display = "none";
                    }
                    tablinks = document.getElementsByClassName("tabtipe2");
                    for (i = 0; i < x.length; i++) {
                        tablinks[i].className = tablinks[i].className.replace(" curr", "");
                    }
                    document.getElementById(animName).style.display = "block";
                    evt.currentTarget.className += " curr";
                }
                var mybtn2 = document.getElementsByClassName("def2")[0];
                mybtn2.click();

                function openLink3(evt, animName) {
                    var i, x, tablinks;
                    x = document.getElementsByClassName("sectipe3");
                    for (i = 0; i < x.length; i++) {
                        x[i].style.display = "none";
                    }
                    tablinks = document.getElementsByClassName("tabtipe3");
                    for (i = 0; i < x.length; i++) {
                        tablinks[i].className = tablinks[i].className.replace(" curr", "");
                    }
                    document.getElementById(animName).style.display = "block";
                    evt.currentTarget.className += " curr";
                }
                var mybtn3 = document.getElementsByClassName("def3")[0];
                mybtn3.click(); 
            </script>
        @endif
        <!-- END SCRIPT PAGE -->

        <footer>
            @if(Route::currentRouteName() == 'detailManga')
                <script>
                    function openLink(evt, animName) {
                        var i, x, tablinks;
                        x = document.getElementsByClassName("sec");
                        for (i = 0; i < x.length; i++) {
                            x[i].style.display = "none";
                        }
                        tablinks = document.getElementsByClassName("tab");
                        for (i = 0; i < x.length; i++) {
                            tablinks[i].className = tablinks[i].className.replace(" curr", "");
                        }
                        document.getElementById(animName).style.display = "block";
                        evt.currentTarget.className += " curr";
                    }
                    var mybtn = document.getElementsByClassName("def")[0];
                    mybtn.click();
                </script>
            @endif
            <div class="footer perapih">
                <div class="kn">
                    <p> Komiku.co.id website baca komik gratis dengan lebih dari 1000 judul komik mulai dari Manga, Manhwa, dan Manhua. </p>
                    <ul>
                        <li><a href="https://komiku.co.id/contact/">Contact Us</a></li>
                        <li><a href="https://komiku.co.id/legal-disclaimer/">Legal Disclaimer</a></li>
                        <li><a href="https://komiku.co.id/dmca/">DMCA</a></li>
                        <li><a href="https://komiku.co.id/dmca/">Privacy Policy</a></li>
                    </ul>
                </div>
                <div class="kr"> <span>@2019-2020 Komiku.co</span> <span>All right reserved.</span> </div>
            </div>
            <!-- <div class="notifikasi" id="Notifikasi" style="background:#f4f4f4;padding-bottom:30px;display:none">
                <h2>Pusat Notifikasi Komiku</h2>
                <button onclick="document.getElementById('Notifikasi').style.display = 'none';" style="position: absolute;bottom: 10px;right: 10px;background: #000;color:#fff;border: 0;font-size: 15px;font-weight: 700;padding: 3px 10px;box-shadow: rgba(0, 53, 126, 0.2) 0 0px 2px 0;">X Tutup</button>
                <p>Informasi:</p>
                <p>Shounen Jump minggu ini libur, rilis minggu depan!</p>
                <br>
                <br>
                <p>Catatan: klik tombol tutup dibawah iklan akan muncul 1x perhalaman. Maaf mengganggu dan mohon dimaklumi.</p>
                <br>
            </div> -->
            <script type="text/javascript" src="https://iklan.komiku.co.id/jquery2.js"></script>

            @if(Route::currentRouteName() != 'detailChapter')
                <div class="navindex">
                    <ul>
                        <li>
                            <a href="{{url('/')}}" title="Baca Komik">
                                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="home" role="img" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
                                    <path fill="currentColor" d="M280.37 148.26L96 300.11V464a16 16 0 0 0 16 16l112.06-.29a16 16 0 0 0 15.92-16V368a16 16 0 0 1 16-16h64a16 16 0 0 1 16 16v95.64a16 16 0 0 0 16 16.05L464 480a16 16 0 0 0 16-16V300L295.67 148.26a12.19 12.19 0 0 0-15.3 0zM571.6 251.47L488 182.56V44.05a12 12 0 0 0-12-12h-56a12 12 0 0 0-12 12v72.61L318.47 43a48 48 0 0 0-61 0L4.34 251.47a12 12 0 0 0-1.6 16.9l25.5 31A12 12 0 0 0 45.15 301l235.22-193.74a12.19 12.19 0 0 1 15.3 0L530.9 301a12 12 0 0 0 16.9-1.6l25.5-31a12 12 0 0 0-1.7-16.93z"></path>
                                </svg><span>Beranda</span></a>
                        </li>
                        <li>
                            <a href="/trending/" style="color: #df0000;" title="Komik Trending">
                                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="fire-alt" role="img" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                    <path fill="currentColor" d="M323.56 51.2c-20.8 19.3-39.58 39.59-56.22 59.97C240.08 73.62 206.28 35.53 168 0 69.74 91.17 0 209.96 0 281.6 0 408.85 100.29 512 224 512s224-103.15 224-230.4c0-53.27-51.98-163.14-124.44-230.4zm-19.47 340.65C282.43 407.01 255.72 416 226.86 416 154.71 416 96 368.26 96 290.75c0-38.61 24.31-72.63 72.79-130.75 6.93 7.98 98.83 125.34 98.83 125.34l58.63-66.88c4.14 6.85 7.91 13.55 11.27 19.97 27.35 52.19 15.81 118.97-33.43 153.42z"></path>
                                </svg><span>Trending</span></a>
                        </li>
                        <li>
                            <a href="{{url('category/manga/')}}" title="Baca Manga">
                                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="book-reader" role="img" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                    <path fill="currentColor" d="M352 96c0-53.02-42.98-96-96-96s-96 42.98-96 96 42.98 96 96 96 96-42.98 96-96zM233.59 241.1c-59.33-36.32-155.43-46.3-203.79-49.05C13.55 191.13 0 203.51 0 219.14v222.8c0 14.33 11.59 26.28 26.49 27.05 43.66 2.29 131.99 10.68 193.04 41.43 9.37 4.72 20.48-1.71 20.48-11.87V252.56c-.01-4.67-2.32-8.95-6.42-11.46zm248.61-49.05c-48.35 2.74-144.46 12.73-203.78 49.05-4.1 2.51-6.41 6.96-6.41 11.63v245.79c0 10.19 11.14 16.63 20.54 11.9 61.04-30.72 149.32-39.11 192.97-41.4 14.9-.78 26.49-12.73 26.49-27.06V219.14c-.01-15.63-13.56-28.01-29.81-27.09z"></path>
                                </svg><span>Manga</span></a>
                        </li>
                        <li>
                            <a href="{{url('category/manhua/')}}" title="Baca Manhua">
                                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="book-reader" role="img" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                    <path fill="currentColor" d="M352 96c0-53.02-42.98-96-96-96s-96 42.98-96 96 42.98 96 96 96 96-42.98 96-96zM233.59 241.1c-59.33-36.32-155.43-46.3-203.79-49.05C13.55 191.13 0 203.51 0 219.14v222.8c0 14.33 11.59 26.28 26.49 27.05 43.66 2.29 131.99 10.68 193.04 41.43 9.37 4.72 20.48-1.71 20.48-11.87V252.56c-.01-4.67-2.32-8.95-6.42-11.46zm248.61-49.05c-48.35 2.74-144.46 12.73-203.78 49.05-4.1 2.51-6.41 6.96-6.41 11.63v245.79c0 10.19 11.14 16.63 20.54 11.9 61.04-30.72 149.32-39.11 192.97-41.4 14.9-.78 26.49-12.73 26.49-27.06V219.14c-.01-15.63-13.56-28.01-29.81-27.09z"></path>
                                </svg><span>Manhua</span></a>
                        </li>
                        <li>
                            <a href="{{url('category/manhwa/')}}" title="Baca Manhwa">
                                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="book-reader" role="img" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                    <path fill="currentColor" d="M352 96c0-53.02-42.98-96-96-96s-96 42.98-96 96 42.98 96 96 96 96-42.98 96-96zM233.59 241.1c-59.33-36.32-155.43-46.3-203.79-49.05C13.55 191.13 0 203.51 0 219.14v222.8c0 14.33 11.59 26.28 26.49 27.05 43.66 2.29 131.99 10.68 193.04 41.43 9.37 4.72 20.48-1.71 20.48-11.87V252.56c-.01-4.67-2.32-8.95-6.42-11.46zm248.61-49.05c-48.35 2.74-144.46 12.73-203.78 49.05-4.1 2.51-6.41 6.96-6.41 11.63v245.79c0 10.19 11.14 16.63 20.54 11.9 61.04-30.72 149.32-39.11 192.97-41.4 14.9-.78 26.49-12.73 26.49-27.06V219.14c-.01-15.63-13.56-28.01-29.81-27.09z"></path>
                                </svg><span>Manhwa</span></a>
                        </li>
                    </ul>
                </div>
            @endif
            <script type="text/javascript">
                $(function changeThemeColor() {
                    var e = $(document).scrollTop();
                    var t = $("#myBtn").outerHeight();
                    $(window).scroll(function() {
                        var n = $(document).scrollTop();
                        if ($(document).scrollTop() >= 500) {
                            var metaThemeColor = document.querySelector("meta[name=theme-color]");
                            metaThemeColor.setAttribute("content", "#fff");
                        } else {
                            var metaThemeColor = document.querySelector("meta[name=theme-color]");
                            metaThemeColor.setAttribute("content", "#4267b2");
                        }
                        e = $(document).scrollTop()
                    })
                })
            </script>
            <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-92285226-8"></script>
            <script>
                window.dataLayer = window.dataLayer || [];

                function gtag() {
                    dataLayer.push(arguments);
                }
                gtag('js', new Date());
                gtag('config', 'UA-92285226-8');
            </script>
            <script type="text/javascript" charset="utf-8">
                // Place this code snippet near the footer of your page before the close of the /body tag// LEGAL NOTICE: The content of this website and all associated program code are protected under the Digital Millennium Copyright Act. Intentionally circumventing this code may constitute a violation of the DMCA. eval(function(p,a,c,k,e,d){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--){d[e(c)]=k[c]||e(c)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}(';q N=\'\',28=\'23\';1O(q i=0;i<12;i++)N+=28.U(E.J(E.K()*28.G));q 2B=8,2m=4q,2t=4p,2C=25,3a=D(t){q i=!1,o=D(){B(k.1h){k.2Z(\'2T\',e);F.2Z(\'1S\',e)}R{k.2X(\'2S\',e);F.2X(\'24\',e)}},e=D(){B(!i&&(k.1h||4o.2d===\'1S\'||k.2W===\'2N\')){i=!0;o();t()}};B(k.2W===\'2N\'){t()}R B(k.1h){k.1h(\'2T\',e);F.1h(\'1S\',e)}R{k.36(\'2S\',e);F.36(\'24\',e);q n=!1;2R{n=F.4m==4l&&k.1Y}2O(a){};B(n&&n.2Q){(D r(){B(i)H;2R{n.2Q(\'17\')}2O(e){H 4k(r,50)};i=!0;o();t()})()}}};F[\'\'+N+\'\']=(D(){q t={t$:\'23+/=\',4j:D(e){q r=\'\',d,n,i,c,s,l,o,a=0;e=t.e$(e);1e(a<e.G){d=e.16(a++);n=e.16(a++);i=e.16(a++);c=d>>2;s=(d&3)<<4|n>>4;l=(n&15)<<2|i>>6;o=i&63;B(2V(n)){l=o=64}R B(2V(i)){o=64};r=r+T.t$.U(c)+T.t$.U(s)+T.t$.U(l)+T.t$.U(o)};H r},11:D(e){q n=\'\',d,l,c,s,a,o,r,i=0;e=e.1p(/[^A-4i-4h-9\\+\\/\\=]/g,\'\');1e(i<e.G){s=T.t$.1H(e.U(i++));a=T.t$.1H(e.U(i++));o=T.t$.1H(e.U(i++));r=T.t$.1H(e.U(i++));d=s<<2|a>>4;l=(a&15)<<4|o>>2;c=(o&3)<<6|r;n=n+O.S(d);B(o!=64){n=n+O.S(l)};B(r!=64){n=n+O.S(c)}};n=t.n$(n);H n},e$:D(t){t=t.1p(/;/g,\';\');q n=\'\';1O(q i=0;i<t.G;i++){q e=t.16(i);B(e<1y){n+=O.S(e)}R B(e>4g&&e<4f){n+=O.S(e>>6|4e);n+=O.S(e&63|1y)}R{n+=O.S(e>>12|2M);n+=O.S(e>>6&63|1y);n+=O.S(e&63|1y)}};H n},n$:D(t){q i=\'\',e=0,n=4d=1t=0;1e(e<t.G){n=t.16(e);B(n<1y){i+=O.S(n);e++}R B(n>4b&&n<2M){1t=t.16(e+1);i+=O.S((n&31)<<6|1t&63);e+=2}R{1t=t.16(e+1);2r=t.16(e+2);i+=O.S((n&15)<<12|(1t&63)<<6|2r&63);e+=3}};H i}};q r=[\'3W==\',\'4a\',\'49=\',\'48\',\'47\',\'46=\',\'45=\',\'44=\',\'43\',\'42\',\'41=\',\'40=\',\'3Z\',\'3Y\',\'3X=\',\'4r\',\'4c=\',\'4s=\',\'4K=\',\'4M=\',\'4N=\',\'4O=\',\'4P==\',\'4Q==\',\'4R==\',\'4L==\',\'4S=\',\'4U\',\'4V\',\'4W\',\'4X\',\'4Y\',\'4Z\',\'4T==\',\'4J=\',\'3U=\',\'4I=\',\'4H==\',\'4G=\',\'4F\',\'4E=\',\'4D=\',\'4C==\',\'4B=\',\'4A==\',\'4z==\',\'4y=\',\'4x=\',\'4w\',\'4v==\',\'4t==\',\'3V\',\'3G==\',\'3u=\'],p=E.J(E.K()*r.G),Y=t.11(r[p]),w=Y,C=1,v=\'#3s\',a=\'#3r\',g=\'#3p\',W=\'#3m\',Z=\'\',f=\'3k 3j!\',y=\'3i 3g 2E 2F? 2H 1X 3f 3x 2E 2u 2g.\',b=\'3S 1X 3R 2o 3Q 2q 3P 3O 3N 3M%. 2H 1X 3y 2u 3F 2f-2f 2g.\',s=\'3J 3A 3D 3E, 3H 3v 2o 3n 3l 2q!\',i=0,u=0,n=\'3q.3L\',l=0,Q=e()+\'.2p\';D h(t){B(t)t=t.1M(t.G-15);q i=k.2w(\'2G\');1O(q n=i.G;n--;){q e=O(i[n].1Q);B(e)e=e.1M(e.G-15);B(e===t)H!0};H!1};D m(t){B(t)t=t.1M(t.G-15);q e=k.3o;x=0;1e(x<e.G){1n=e[x].1F;B(1n)1n=1n.1M(1n.G-15);B(1n===t)H!0;x++};H!1};D e(t){q n=\'\',i=\'23\';t=t||30;1O(q e=0;e<t;e++)n+=i.U(E.J(E.K()*i.G));H n};D o(i){q o=[\'3z\',\'3B==\',\'3C\',\'3I\',\'33\',\'3K==\',\'3w=\',\'3e==\',\'3t=\',\'51==\',\'4u==\',\'53==\',\'5c\',\'6k\',\'6j\',\'33\'],a=[\'3c=\',\'6i==\',\'6h==\',\'6g==\',\'6f=\',\'6e\',\'6d=\',\'6c=\',\'3c=\',\'69\',\'68==\',\'52\',\'66==\',\'62==\',\'61==\',\'5Z=\'];x=0;1P=[];1e(x<i){c=o[E.J(E.K()*o.G)];d=a[E.J(E.K()*a.G)];c=t.11(c);d=t.11(d);q r=E.J(E.K()*2)+1;B(r==1){n=\'//\'+c+\'/\'+d}R{n=\'//\'+c+\'/\'+e(E.J(E.K()*20)+4)+\'.2p\'};1P[x]=1T 1V();1P[x].26=D(){q t=1;1e(t<7){t++}};1P[x].1Q=n;x++}};D L(t){};H{3d:D(t,a){B(5X k.M==\'5W\'){H};q i=\'0.1\',a=w,e=k.1b(\'1v\');e.1l=a;e.j.1k=\'1I\';e.j.17=\'-1j\';e.j.V=\'-1j\';e.j.1q=\'2c\';e.j.X=\'5V\';q d=k.M.2j,r=E.J(d.G/2);B(r>15){q n=k.1b(\'29\');n.j.1k=\'1I\';n.j.1q=\'1s\';n.j.X=\'1s\';n.j.V=\'-1j\';n.j.17=\'-1j\';k.M.6m(n,k.M.2j[r]);n.19(e);q o=k.1b(\'1v\');o.1l=\'2i\';o.j.1k=\'1I\';o.j.17=\'-1j\';o.j.V=\'-1j\';k.M.19(o)}R{e.1l=\'2i\';k.M.19(e)};l=6n(D(){B(e){t((e.1W==0),i);t((e.1Z==0),i);t((e.1D==\'2J\'),i);t((e.1L==\'2K\'),i);t((e.1R==0),i)}R{t(!0,i)}},27)},1K:D(e,c){B((e)&&(i==0)){i=1;F[\'\'+N+\'\'].1z();F[\'\'+N+\'\'].1K=D(){H}}R{q b=t.11(\'6u\'),u=k.6z(b);B((u)&&(i==0)){B((2m%3)==0){q l=\'6B=\';l=t.11(l);B(h(l)){B(u.1N.1p(/\\s/g,\'\').G==0){i=1;F[\'\'+N+\'\'].1z()}}}};q p=!1;B(i==0){B((2t%3)==0){B(!F[\'\'+N+\'\'].2v){q d=[\'6A==\',\'6y==\',\'6x=\',\'6o=\',\'6v=\'],m=d.G,a=d[E.J(E.K()*m)],r=a;1e(a==r){r=d[E.J(E.K()*m)]};a=t.11(a);r=t.11(r);o(E.J(E.K()*2)+1);q n=1T 1V(),s=1T 1V();n.26=D(){o(E.J(E.K()*2)+1);s.1Q=r;o(E.J(E.K()*2)+1)};s.26=D(){i=1;o(E.J(E.K()*3)+1);F[\'\'+N+\'\'].1z()};n.1Q=a;B((2C%3)==0){n.24=D(){B((n.X<8)&&(n.X>0)){F[\'\'+N+\'\'].1z()}}};o(E.J(E.K()*3)+1);F[\'\'+N+\'\'].2v=!0};F[\'\'+N+\'\'].1K=D(){H}}}}},1z:D(){B(u==1){q z=2z.6p(\'2y\');B(z>0){H!0}R{2z.5T(\'2y\',(E.K()+1)*27)}};q h=\'5R==\';h=t.11(h);B(!m(h)){q c=k.1b(\'5p\');c.21(\'5o\',\'5n\');c.21(\'2d\',\'1g/5m\');c.21(\'1F\',h);k.2w(\'5k\')[0].19(c)};5j(l);k.M.1N=\'\';k.M.j.13+=\'P:1s !14\';k.M.j.13+=\'1r:1s !14\';q Q=k.1Y.1Z||F.38||k.M.1Z,p=F.5i||k.M.1W||k.1Y.1W,r=k.1b(\'1v\'),C=e();r.1l=C;r.j.1k=\'2h\';r.j.17=\'0\';r.j.V=\'0\';r.j.X=Q+\'1B\';r.j.1q=p+\'1B\';r.j.2L=v;r.j.1U=\'5f\';k.M.19(r);q d=\'<a 1F="54://5e.5d" j="I-1c:10.5b;I-1f:1m-1i;1a:5a;">59 58 57-2F 2G</a>\';d=d.1p(\'56\',e());d=d.1p(\'55\',e());q o=k.1b(\'1v\');o.1N=d;o.j.1k=\'1I\';o.j.1x=\'1G\';o.j.17=\'1G\';o.j.X=\'5g\';o.j.1q=\'5s\';o.j.1U=\'2n\';o.j.1R=\'.6\';o.j.2k=\'2l\';o.1h(\'5Q\',D(){n=n.5P(\'\').5O().5N(\'\');F.2x.1F=\'//\'+n});k.1J(C).19(o);q i=k.1b(\'1v\'),L=e();i.1l=L;i.j.1k=\'2h\';i.j.V=p/7+\'1B\';i.j.5H=Q-5u+\'1B\';i.j.5E=p/3.5+\'1B\';i.j.2L=\'#5D\';i.j.1U=\'2n\';i.j.13+=\'I-1f: "5C 5B", 1u, 1o, 1m-1i !14\';i.j.13+=\'5A-1q: 5y !14\';i.j.13+=\'I-1c: 5x !14\';i.j.13+=\'1g-1A: 1w !14\';i.j.13+=\'1r: 5w !14\';i.j.1D+=\'32\';i.j.35=\'1G\';i.j.5S=\'1G\';i.j.5q=\'2I\';k.M.19(i);i.j.5F=\'1s 5J 5K -5L 5G(0,0,0,0.3)\';i.j.1L=\'3b\';q w=30,Y=22,Z=18,x=18;B((F.38<37)||(5h.X<37)){i.j.2P=\'50%\';i.j.13+=\'I-1c: 5l !14\';i.j.35=\'6q;\';o.j.2P=\'65%\';q w=22,Y=18,Z=12,x=12};i.1N=\'<2U j="1a:#6w;I-1c:\'+w+\'1C;1a:\'+a+\';I-1f:1u, 1o, 1m-1i;I-1E:6a;P-V:1d;P-1x:1d;1g-1A:1w;">\'+f+\'</2U><2Y j="I-1c:\'+Y+\'1C;I-1E:5Y;I-1f:1u, 1o, 1m-1i;1a:\'+a+\';P-V:1d;P-1x:1d;1g-1A:1w;">\'+y+\'</2Y><5U j=" 1D: 32;P-V: 0.34;P-1x: 0.34;P-17: 2a;P-2A: 2a; 2s:6b 67 #3T; X: 25%;1g-1A:1w;"><p j="I-1f:1u, 1o, 1m-1i;I-1E:2e;I-1c:\'+Z+\'1C;1a:\'+a+\';1g-1A:1w;">\'+b+\'</p><p j="P-V:5I;"><29 5v="T.j.1R=.9;" 5z="T.j.1R=1;" 1l="\'+e()+\'" j="2k:2l;I-1c:\'+x+\'1C;I-1f:1u, 1o, 1m-1i; I-1E:2e;2s-5M:2I;1r:1d;5r-1a:\'+g+\';1a:\'+W+\';1r-17:2c;1r-2A:2c;X:60%;P:2a;P-V:1d;P-1x:1d;" 5t="F.2x.6l();">\'+s+\'</29></p>\'}}})();F.39=D(t,e){q n=6r.6s,i=F.6t,r=n(),o,a=D(){n()-r<e?o||i(a):t()};i(a);H{3h:D(){o=1}}};q 2D;B(k.M){k.M.j.1L=\'3b\'};3a(D(){B(k.1J(\'2b\')){k.1J(\'2b\').j.1L=\'2J\';k.1J(\'2b\').j.1D=\'2K\'};2D=F.39(D(){F[\'\'+N+\'\'].3d(F[\'\'+N+\'\'].1K,F[\'\'+N+\'\'].4n)},2B*27)});',62,410,'|||||||||||||||||||style|document||||||var|||||||||||if||function|Math|window|length|return|font|floor|random||body|hZiYCzWUbwis|String|margin||else|fromCharCode|this|charAt|top||width||||decode||cssText|important||charCodeAt|left||appendChild|color|createElement|size|10px|while|family|text|addEventListener|serif|5000px|position|id|sans|thisurl|geneva|replace|height|padding|0px|c2|Helvetica|DIV|center|bottom|128|ypzGmOBjZq|align|px|pt|display|weight|href|30px|indexOf|absolute|getElementById|nFQeDGGPhW|visibility|substr|innerHTML|for|spimg|src|opacity|load|new|zIndex|Image|clientHeight|kami|documentElement|clientWidth||setAttribute||ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789|onload||onerror|1000|fOnTeqYDlB|div|auto|babasbmsgx|60px|type|300|aneh|kok|fixed|banner_ad|childNodes|cursor|pointer|ZCwKtWeRJv|10000|untuk|jpg|website|c3|border|HRUGrVLyjU|iklan|ranAlready|getElementsByTagName|location|babn|sessionStorage|right|mVGGSLWqgw|AdinieRnqI|bwvDljlQDS|menggunakan|adblock|script|Website|15px|hidden|none|backgroundColor|224|complete|catch|zoom|doScroll|try|onreadystatechange|DOMContentLoaded|h3|isNaN|readyState|detachEvent|h1|removeEventListener|||block|cGFydG5lcmFkcy55c20ueWFob28uY29t|5em|marginLeft|attachEvent|640|innerWidth|JDqLqQCcJt|cTKzjPIdcb|visible|ZmF2aWNvbi5pY28|hxqoGvZRzE|YWR2ZXJ0aXNpbmcuYW9sLmNvbQ|hanya|agan|clear|Keliatannya|gan|Hello|halaman|FFFFFF|refresh|styleSheets|adb8ff|moc|777777|EEEEEE|Y2FzLmNsaWNrYWJpbGl0eS5jb20|c3BvbnNvcmVkX2xpbms|disini|YWdvZGEubmV0L2Jhbm5lcnM|sedikit|tanpa|YWRuLmViYXkuY29t|sudah|YWQubWFpbC5ydQ|anVpY3lhZHMuY29t|saya|dimatikan|yang|b3V0YnJhaW4tcGFpZA|klik|YWQuZm94bmV0d29ya3MuY29t|Adblock|YS5saXZlc3BvcnRtZWRpYS5ldQ|kcolbdakcolb|100|gratis|tetap|biar|operasional|pasang|Iklan|CCC|QWRCb3gxNjA|Z29vZ2xlX2Fk|YWQtbGVmdA|QWQ3Mjh4OTA|QWQzMDB4MjUw|QWQzMDB4MTQ1|YWQtY29udGFpbmVyLTI|YWQtY29udGFpbmVyLTE|YWQtY29udGFpbmVy|YWQtZm9vdGVy|YWQtbGI|YWQtbGFiZWw|YWQtaW5uZXI|YWQtaW1n|YWQtaGVhZGVy|YWQtZnJhbWU|YWRCYW5uZXJXcmFw|191|QWRGcmFtZTE|c1|192|2048|127|z0|Za|encode|setTimeout|null|frameElement|tldtSOgzxq|event|175|139|QWRBcmVh|QWRGcmFtZTI|YWRzZW5zZQ|YWRzLnlhaG9vLmNvbQ|cG9wdXBhZA|YWRzbG90|YmFubmVyaWQ|YWRzZXJ2ZXI|YWRfY2hhbm5lbA|IGFkX2JveA|YmFubmVyYWQ|YWRBZA|YWRiYW5uZXI|YWRCYW5uZXI|YmFubmVyX2Fk|YWRUZWFzZXI|Z2xpbmtzd3JhcHBlcg|QWRDb250YWluZXI|QWREaXY|QWRGcmFtZTM|QWRzX2dvb2dsZV8wNA|QWRGcmFtZTQ|QWRMYXllcjE|QWRMYXllcjI|QWRzX2dvb2dsZV8wMQ|QWRzX2dvb2dsZV8wMg|QWRzX2dvb2dsZV8wMw|RGl2QWQ|QWRJbWFnZQ|RGl2QWQx|RGl2QWQy|RGl2QWQz|RGl2QWRB|RGl2QWRC|RGl2QWRD||cHJvbW90ZS5wYWlyLmNvbQ|ZmF2aWNvbjEuaWNv|YWRzLnp5bmdhLmNvbQ|http|FILLVECTID2|FILLVECTID1|anti|an|Make|black|5pt|YWRzYXR0LmFiY25ld3Muc3RhcndhdmUuY29t|com|blockadblock|9999|160px|screen|innerHeight|clearInterval|head|18pt|css|stylesheet|rel|link|borderRadius|background|40px|onclick|120|onmouseover|12px|16pt|normal|onmouseout|line|Black|Arial|fff|minHeight|boxShadow|rgba|minWidth|35px|14px|24px|8px|radius|join|reverse|split|click|Ly95dWkueWFob29hcGlzLmNvbS8zLjE4LjEvYnVpbGQvY3NzcmVzZXQvY3NzcmVzZXQtbWluLmNzcw|marginRight|setItem|hr|468px|undefined|typeof|500|YWR2ZXJ0aXNlbWVudC0zNDMyMy5qcGc||d2lkZV9za3lzY3JhcGVyLmpwZw|bGFyZ2VfYmFubmVyLmdpZg||||YmFubmVyX2FkLmdpZg|solid|c3F1YXJlLWFkLnBuZw|YWQtbGFyZ2UucG5n|200|1px|Q0ROLTMzNC0xMDktMTM3eC1hZC1iYW5uZXI|YWRjbGllbnQtMDAyMTQ3LWhvc3QxLWJhbm5lci1hZC5qcGc|MTM2N19hZC1jbGllbnRJRDI0NjQuanBn|c2t5c2NyYXBlci5qcGc|NzIweDkwLmpwZw|NDY4eDYwLmpwZw|YmFubmVyLmpwZw|YXMuaW5ib3guY29t|YWRzYXR0LmVzcG4uc3RhcndhdmUuY29t|reload|insertBefore|setInterval|Ly9hZHMudHdpdHRlci5jb20vZmF2aWNvbi5pY28|getItem|45px|Date|now|requestAnimationFrame|aW5zLmFkc2J5Z29vZ2xl|Ly93d3cuZG91YmxlY2xpY2tieWdvb2dsZS5jb20vZmF2aWNvbi5pY28|999|Ly9hZHZlcnRpc2luZy55YWhvby5jb20vZmF2aWNvbi5pY28|Ly93d3cuZ3N0YXRpYy5jb20vYWR4L2RvdWJsZWNsaWNrLmljbw|querySelector|Ly93d3cuZ29vZ2xlLmNvbS9hZHNlbnNlL3N0YXJ0L2ltYWdlcy9mYXZpY29uLmljbw|Ly9wYWdlYWQyLmdvb2dsZXN5bmRpY2F0aW9uLmNvbS9wYWdlYWQvanMvYWRzYnlnb29nbGUuanM'.split('|'),0,{}));
            </script>
        </footer>
        @if(Route::currentRouteName() == 'detailChapter')
            <script type="text/javascript">
                $(window).scroll(function() {
                    var o = $(window).scrollTop(),
                        r = $("#Baca_Komik").outerHeight(!0);
                    $(window).width();
                    o >= $("#Baca_Komik").offset().top ? o <= $("#Baca_Komik").offset().top + r ? $(".bar-long").css("width", (o - $(".bc").offset().top) / r * 100 + "%") : $(".bar-long").css("width", "100%") : $(".bar-long").css("width", "0px")
                });
            </script>
            <script type="text/javascript">
                function myFunction() {
                    var element = document.getElementById("body");
                    element.classList.toggle("click");
                }
            </script>
            <script src="/js/2218646/" async=""></script>
            <script type="text/javascript">
                (function() {
                    window['__CF$cv$params'] = {
                        r: '58a144f23d6c32b5',
                        m: '87bb17629fb40639b8f8cf4a28389a209833e376-1587914232-1800-AWTKJaVNyZfLUQG6fConuQX9QS3TnbfgRmYC1t9RownvSwbDlOmeWDA5KbxN2qibRlWcOoT68OV8gvp2L9wsp7U65xBwgicBHDxwdWwK1j3FYEwSYQKgWvf0IGdA8mJhG8nCzfGTiS11W2QppO9rEIA=',
                        s: [0xef8fa34e4e, 0x20654a24da],
                        fb: 0,
                    }
                })();
            </script>
            <div style="width:100%;height:100%;position:fixed;top:0;left:0;z-index:9999999;display:none;"></div>
        @endif

    </body>
</html>