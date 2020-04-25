@extends('layouts.layout')
@section('konten')
 
        <section style="margin-bottom:0px;border-bottom:1px solid #ddd">
            <h1>
					Baca Manga
				</h1>
            <p class="top1">
                Manga (漫画 manga) adalah komik atau novel grafis yang dibuat di Jepang atau oleh orang yang menggunakan bahasa Jepang dan sesuai dengan gaya yang dikembangkan di Jepang pada akhir abad ke-19. Mereka memiliki pra-sejarah yang panjang dan kompleks dalam seni Jepang sebelumnya.
            </p>
            <div id="Populer-1" class="sec" style="display: block;">

                <!-- LOOPING PAGE 1 -->
                @foreach($manga as $key => $mangaList)
                    @if($key >= 1 && $key <= 5)
                        <div class="at">
                            <a href="https://komiku.co.id/manga/one-piece/" title="Manga One Piece">
                                <img src="{{url('/storage/komik/sampul_detail/'.$mangaList->slug_manga.'.jpg')}}" alt="{{$mangaList->jenis_manga}} {{$mangaList->nama_manga}}">
                                <div class="prk sd">
                                    ★ {{$loop->iteration}} </div>
                                <h3>
                                {{$mangaList->nama_manga}}
                                </h3> {{$mangaList->views}} x • 1 hari lalu
                            </a>
                        </div>
                    @endif
                @endforeach
                <!-- END LOOPING PAGE 1 -->

            </div>

            <div id="Populer-2" class="sec" style="display: none;">

                <!-- LOOPING PAGE 2 -->
                @foreach($manga as $key => $mangaList)
                    @if($key >= 6 && $key <= 10)
                        <div class="at">
                            <a href="https://komiku.co.id/manga/one-piece/" title="Manga One Piece">
                                <img src="{{url('/storage/komik/sampul_detail/'.$mangaList->slug_manga.'.jpg')}}" alt="{{$mangaList->jenis_manga}} {{$mangaList->nama_manga}}">
                                <div class="prk sd">
                                    ★ {{$loop->iteration}} </div>
                                <h3>
                                {{$mangaList->nama_manga}}
                                </h3> {{$mangaList->views}} x • 1 hari lalu
                            </a>
                        </div>
                    @endif
                @endforeach
                <!-- END LOOPING PAGE 2 -->

            </div>

            <div id="Populer-3" class="sec" style="display: none;">
                <!-- LOOPING PAGE 3 -->
                @foreach($manga as $key => $mangaList)
                    @if($key >= 11 && $key <= 15)
                        <div class="at">
                            <a href="https://komiku.co.id/manga/one-piece/" title="Manga One Piece">
                                <img src="{{url('/storage/komik/sampul_detail/'.$mangaList->slug_manga.'.jpg')}}" alt="{{$mangaList->jenis_manga}} {{$mangaList->nama_manga}}">
                                <div class="prk sd">
                                    ★ {{$loop->iteration}} </div>
                                <h3>
                                {{$mangaList->nama_manga}}
                                </h3> {{$mangaList->views}} x • 1 hari lalu
                            </a>
                        </div>
                    @endif
                @endforeach
                <!-- END LOOPING PAGE 3 -->

            </div>
        </section>
        <div class="mnu">
            <button class="tab def curr" onclick="openLink(event, 'Populer-1')">1-6</button>
            <button class="tab" onclick="openLink(event, 'Populer-2')">7-11</button>
            <button class="tab" onclick="openLink(event, 'Populer-3')">12-16</button>
        </div>
        <section>
            <div class="h2">
                <h2>
					Komik Jepang Terpopuler 2019
					</h2>
            </div>
            <div class="clr">
                <div class="bge">
                    <div class="bgei">
                        <img src="https://i0.wp.com/komiku.co.id/wp-content/uploads/Manga-One-Piece.jpg?resize=300,150&amp;quality=60" data-src="https://i0.wp.com/komiku.co.id/wp-content/uploads/Manga-One-Piece.jpg?resize=300,150&amp;quality=60" class="lazy sd rd" alt="Baca Manga One Piece">
                        <div class="tpe1_inf">
                            <b>Aksi</b> </div>
                    </div>
                    <div class="kan">
                        <h3>
								One Piece							</h3>
                        <span>27.3 jt x • 1 hari lalu</span>
                        <p>
                            Raja Bajak Laut mengkonfirmasi keberadaan harta terbesar yang disebut One~ </p>
                        <div class="mree"><a href="https://komiku.co.id/manga/one-piece/" class="mla rd sd" title="Baca Manga One Piece">Mulai Baca</a> <span><a href="/other/berwarna" title="Baca Manga Berwarna">Lainnya » </a></span></div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="h2">
                <h2>
					Baca Manga Update Hari Ini!
				</h2>
            </div>
            <div class="tpe1">
                <div class="tpe1_1">
                    <a href="https://komiku.co.id/manga/kingdom/">
                        <div class="gmb2">
                            <div class="vw Hot"></div>
                            <img src="https://i0.wp.com/komiku.co.id/wp-content/uploads/Manga-Kingdom.jpg?resize=216,132&amp;quality=60" data-src="https://i0.wp.com/komiku.co.id/wp-content/uploads/Manga-Kingdom.jpg?resize=216,132&amp;quality=60" class="rd sd lazy" alt="Manga Online Kingdom">
                            <div class="tpe1_inf">
                                <b>Aksi</b> </div>
                        </div>

                        <div class="htipe1">
                            <h3>
									Kingdom								</h3>
                            <div>
                                2.8 jt x • 1 jam lalu </div>
                        </div>

                    </a>
                    <a href="https://komiku.co.id/kingdom-chapter-640-bahasa-indonesia/" title="Kingdom Chapter 640 Bahasa Indonesia"><span><b>Chapter 640</b></span></a>
                </div>
                <div class="tpe1_1">
                    <a href="https://komiku.co.id/manga/jichou-shinai-motoyuusha-no-tsuyokute-tanoshii-new-game/">
                        <div class="gmb2">
                            <div class="vw Rekomendasi"></div>
                            <img src="https://i0.wp.com/komiku.co.id/wp-content/uploads/2020/04/Komik-Jichou-shinai-Motoyuusha-no-Tsuyokute-Tanoshii-New-Game.jpg?resize=216,132&amp;quality=60" data-src="https://i0.wp.com/komiku.co.id/wp-content/uploads/2020/04/Komik-Jichou-shinai-Motoyuusha-no-Tsuyokute-Tanoshii-New-Game.jpg?resize=216,132&amp;quality=60" class="rd sd lazy" alt="Manga Online Jichou shinai Motoyuusha no Tsuyokute Tanoshii New Game">
                            <div class="tpe1_inf">
                                <b>Isekai</b> </div>
                        </div>

                        <div class="htipe1">
                            <h3>
									Jichou shinai Motoyuusha no Tsuyokute Tanoshii New Game								</h3>
                            <div>
                                86 rb x • 1 jam lalu </div>
                        </div>

                    </a>
                    <a href="https://komiku.co.id/jichou-shinai-motoyuusha-no-tsuyokute-tanoshii-new-game-chapter-19-bahasa-indonesia/" title="Jichou shinai Motoyuusha no Tsuyokute Tanoshii New Game Chapter 19 Bahasa Indonesia"><span><b>Chapter 19</b></span></a>
                </div>
                <div class="tpe1_1">
                    <a href="https://komiku.co.id/manga/fantasy-bishoujo-juniku-ojisan/">
                        <div class="gmb2">
                            <div class="vw "></div>
                            <img src="https://i0.wp.com/komiku.co.id/wp-content/uploads/Manga-Fantasy-Bishoujo-Juniku-Ojisan.jpg?resize=216,132&amp;quality=60" data-src="https://i0.wp.com/komiku.co.id/wp-content/uploads/Manga-Fantasy-Bishoujo-Juniku-Ojisan.jpg?resize=216,132&amp;quality=60" class="rd sd lazy" alt="Manga Online Fantasy Bishoujo Juniku Ojisan">
                            <div class="tpe1_inf">
                                <b>Isekai</b> </div>
                        </div>

                        <div class="htipe1">
                            <h3>
									Fantasy Bishoujo Juniku Ojisan								</h3>
                            <div>
                                41 rb x • 2 jam lalu </div>
                        </div>

                    </a>
                    <a href="https://komiku.co.id/fantasy-bishoujo-juniku-ojisan-to-chapter-19-bahasa-indonesia/" title="Fantasy Bishoujo Juniku Ojisan Chapter 19 Bahasa Indonesia"><span><b>Chapter 19</b></span></a>
                </div>
            </div>
            <a href="/manga/" class="more">Lihat semua update Manga di halaman <b>Manga Terbaru</b> (klik)</a>
        </section>
        <section>
            <div class="h2 h2t2">
                <h2>
					Genre Manga
					</h2>
                <div class="gre">
                    <button class="tab2 tabtipe2 def2 curr" onclick="openLink2(event, 'Isekai')">Isekai</button>
                    <button class="tab2 tabtipe2" onclick="openLink2(event, 'Romance')">Romance</button>
                </div>
            </div>
            <div id="Isekai" class="sec2 sectipe2" style="display: block;">
                <a href="/genre/isekai/" class="selengkapnya" title="Manga Isekai">More »</a>
                <div class="scrll">
                    <div class="grd2">
                        <a href="https://komiku.co.id/manga/jichou-shinai-motoyuusha-no-tsuyokute-tanoshii-new-game/">
                            <div class="imr">
                                <div class="vw Rekomendasi"></div>
                                <img src="https://i0.wp.com/komiku.co.id/wp-content/uploads/2020/04/Manga-Jichou-shinai-Motoyuusha-no-Tsuyokute-Tanoshii-New-Game.jpg?resize=155,200&amp;quality=60" data-src="https://i0.wp.com/komiku.co.id/wp-content/uploads/2020/04/Manga-Jichou-shinai-Motoyuusha-no-Tsuyokute-Tanoshii-New-Game.jpg?resize=155,200&amp;quality=60" class="lazy rd sd" alt="Manga Jichou shinai Motoyuusha no Tsuyokute Tanoshii New Game Bahasa Indonesia">
                                <div class="tpe1_inf">
                                    <b>Isekai</b> </div>
                            </div>
                            <h3>
								Jichou shinai Motoyuusha no Tsuyokute Tanoshii New Game							</h3>
                        </a>
                        <span>86 rb x • 1 jam lalu</span>
                    </div>
                    <div class="grd2">
                        <a href="https://komiku.co.id/manga/fantasy-bishoujo-juniku-ojisan/">
                            <div class="imr">
                                <div class="vw "></div>
                                <img src="https://i0.wp.com/komiku.co.id/wp-content/uploads/Komik-Fantasy-Bishoujo-Juniku-Ojisan.jpg?resize=155,200&amp;quality=60" data-src="https://i0.wp.com/komiku.co.id/wp-content/uploads/Komik-Fantasy-Bishoujo-Juniku-Ojisan.jpg?resize=155,200&amp;quality=60" class="lazy rd sd" alt="Manga Fantasy Bishoujo Juniku Ojisan Bahasa Indonesia">
                                <div class="tpe1_inf">
                                    <b>Isekai</b> </div>
                            </div>
                            <h3>
								Fantasy Bishoujo Juniku Ojisan							</h3>
                        </a>
                        <span>41 rb x • 2 jam lalu</span>
                    </div>
                    <div class="grd2">
                        <a href="https://komiku.co.id/manga/seijo-no-maryoku-wa-bannou-desu/">
                            <div class="imr">
                                <div class="vw Rekomendasi"></div>
                                <img src="https://i0.wp.com/komiku.co.id/wp-content/uploads/Komik-Seijo-no-Maryoku-wa-Bannou-desu.jpg?resize=155,200&amp;quality=60" data-src="https://i0.wp.com/komiku.co.id/wp-content/uploads/Komik-Seijo-no-Maryoku-wa-Bannou-desu.jpg?resize=155,200&amp;quality=60" class="lazy rd sd" alt="Manga Seijo no Maryoku wa Bannou desu Bahasa Indonesia">
                                <div class="tpe1_inf">
                                    <b>Isekai</b> </div>
                            </div>
                            <h3>
								Seijo no Maryoku wa Bannou desu							</h3>
                        </a>
                        <span>56 rb x • 3 jam lalu</span>
                    </div>
                    <div class="grd2">
                        <a href="https://komiku.co.id/manga/tensei-shitara-slime-datta-ken/">
                            <div class="imr">
                                <div class="vw Hot"></div>
                                <img src="https://i0.wp.com/komiku.co.id/wp-content/uploads/Komik-Tensei-Shitara-Slime-Datta-Ken.jpg?resize=155,200&amp;quality=60" data-src="https://i0.wp.com/komiku.co.id/wp-content/uploads/Komik-Tensei-Shitara-Slime-Datta-Ken.jpg?resize=155,200&amp;quality=60" class="lazy rd sd" alt="Manga Tensei Shitara Slime Datta Ken Bahasa Indonesia">
                                <div class="tpe1_inf">
                                    <b>Isekai</b> </div>
                            </div>
                            <h3>
								Tensei Shitara Slime Datta Ken							</h3>
                        </a>
                        <span>2.3 jt x • 4 jam lalu</span>
                    </div>
                    <div class="grd2">
                        <a href="https://komiku.co.id/manga/jitsu-wa-ore-saikyou-deshita/">
                            <div class="imr">
                                <div class="vw Rekomendasi"></div>
                                <img src="https://i0.wp.com/komiku.co.id/wp-content/uploads/Komik-Jitsu-wa-Ore-Saikyou-deshita.jpg?resize=155,200&amp;quality=60" data-src="https://i0.wp.com/komiku.co.id/wp-content/uploads/Komik-Jitsu-wa-Ore-Saikyou-deshita.jpg?resize=155,200&amp;quality=60" class="lazy rd sd" alt="Manga Jitsu wa Ore, Saikyou deshita? Bahasa Indonesia">
                                <div class="tpe1_inf">
                                    <b>Isekai</b> </div>
                            </div>
                            <h3>
								Jitsu wa Ore, Saikyou deshita?							</h3>
                        </a>
                        <span>81 rb x • 7 jam lalu</span>
                    </div>
                    <div class="grd2">
                        <a href="https://komiku.co.id/manga/maou-sama-retry/">
                            <div class="imr">
                                <div class="vw "></div>
                                <img src="https://i0.wp.com/komiku.co.id/wp-content/uploads/2020/02/load.gif?resize=155,200&amp;quality=60" data-src="https://i0.wp.com/komiku.co.id/wp-content/uploads/Komik-Maou-sama-Retry.jpeg?resize=155,200&amp;quality=60" class="lazy rd sd" alt="Manga Maou-sama, Retry! Bahasa Indonesia">
                                <div class="tpe1_inf">
                                    <b>Isekai</b> </div>
                            </div>
                            <h3>
								Maou-sama, Retry!							</h3>
                        </a>
                        <span>25 rb x • 11 jam lalu</span>
                    </div>
                    <div class="grd2">
                        <a href="https://komiku.co.id/manga/slime-taoshite-300-nen-shiranai-uchi-ni-level-max-ni-nattemashita/">
                            <div class="imr">
                                <div class="vw Rekomendasi"></div>
                                <img src="https://i0.wp.com/komiku.co.id/wp-content/uploads/2020/02/load.gif?resize=155,200&amp;quality=60" data-src="https://i0.wp.com/komiku.co.id/wp-content/uploads/Komik-Slime-Taoshite-300-nen-Shiranai-Uchi-ni-Level-Max-ni-Nattemashita-.jpg?resize=155,200&amp;quality=60" class="lazy rd sd" alt="Manga Slime Taoshite 300-nen Shiranai Uchi ni Level Max ni Nattemashita  Bahasa Indonesia">
                                <div class="tpe1_inf">
                                    <b>Isekai</b> </div>
                            </div>
                            <h3>
								Slime Taoshite 300-nen Shiranai Uchi ni Level Max ni Nattemashita 							</h3>
                        </a>
                        <span>81 rb x • 12 jam lalu</span>
                    </div>
                    <div class="grd2">
                        <a href="https://komiku.co.id/manga/isekai-monster-breeder/">
                            <div class="imr">
                                <div class="vw "></div>
                                <img src="https://i0.wp.com/komiku.co.id/wp-content/uploads/2020/02/load.gif?resize=155,200&amp;quality=60" data-src="https://i0.wp.com/komiku.co.id/wp-content/uploads/2020/04/Manga-Isekai-Monster-Breeder.jpg?resize=155,200&amp;quality=60" class="lazy rd sd" alt="Manga Isekai Monster Breeder Bahasa Indonesia">
                                <div class="tpe1_inf">
                                    <b>Isekai</b> </div>
                            </div>
                            <h3>
								Isekai Monster Breeder							</h3>
                        </a>
                        <span>13 rb x • 1 hari lalu</span>
                    </div>

                </div>
            </div>
            <div id="Romance" class="sec2 sectipe2" style="display: none;">
                <a href="/genre/romance/" class="selengkapnya" title="Manga Romantis">More »</a>
                <div class="scrll">
                    <div class="grd2">
                        <a href="https://komiku.co.id/manga/fantasy-bishoujo-juniku-ojisan/">
                            <div class="imr">
                                <div class="vw "></div>
                                <img src="https://i0.wp.com/komiku.co.id/wp-content/uploads/2020/02/load.gif?resize=155,200&amp;quality=60" data-src="https://i0.wp.com/komiku.co.id/wp-content/uploads/Komik-Fantasy-Bishoujo-Juniku-Ojisan.jpg?resize=155,200&amp;quality=60" class="lazy rd sd" alt="Manga Fantasy Bishoujo Juniku Ojisan Bahasa Indonesia">
                                <div class="tpe1_inf">
                                    <b>Isekai</b> </div>
                            </div>
                            <h3>
								Fantasy Bishoujo Juniku Ojisan							</h3>
                        </a>
                        <span>41 rb x • 2 jam lalu</span>
                    </div>
                    <div class="grd2">
                        <a href="https://komiku.co.id/manga/kaguya-sama-wa-kokurasetai-tensai-tachi-no-renai-zunousen/">
                            <div class="imr">
                                <div class="vw Hot"></div>
                                <img src="https://i0.wp.com/komiku.co.id/wp-content/uploads/2020/02/load.gif?resize=155,200&amp;quality=60" data-src="https://i0.wp.com/komiku.co.id/wp-content/uploads/Komik-Kaguya-sama-wa-Kokurasetai--Tensai-tachi-no-Renai-Zunousen.jpeg?resize=155,200&amp;quality=60" class="lazy rd sd" alt="Manga Kaguya-sama wa Kokurasetai – Tensai-tachi no Renai Zunousen Bahasa Indonesia">
                                <div class="tpe1_inf">
                                    <b>Romantis</b> </div>
                            </div>
                            <h3>
								Kaguya-sama wa Kokurasetai – Tensai-tachi no Renai Zunousen							</h3>
                        </a>
                        <span>418 rb x • 3 jam lalu</span>
                    </div>
                    <div class="grd2">
                        <a href="https://komiku.co.id/manga/seijo-no-maryoku-wa-bannou-desu/">
                            <div class="imr">
                                <div class="vw Rekomendasi"></div>
                                <img src="https://i0.wp.com/komiku.co.id/wp-content/uploads/2020/02/load.gif?resize=155,200&amp;quality=60" data-src="https://i0.wp.com/komiku.co.id/wp-content/uploads/Komik-Seijo-no-Maryoku-wa-Bannou-desu.jpg?resize=155,200&amp;quality=60" class="lazy rd sd" alt="Manga Seijo no Maryoku wa Bannou desu Bahasa Indonesia">
                                <div class="tpe1_inf">
                                    <b>Isekai</b> </div>
                            </div>
                            <h3>
								Seijo no Maryoku wa Bannou desu							</h3>
                        </a>
                        <span>56 rb x • 3 jam lalu</span>
                    </div>
                    <div class="grd2">
                        <a href="https://komiku.co.id/manga/the-cuckoos-fiancee/">
                            <div class="imr">
                                <div class="vw "></div>
                                <img src="https://i0.wp.com/komiku.co.id/wp-content/uploads/2020/02/load.gif?resize=155,200&amp;quality=60" data-src="https://i0.wp.com/komiku.co.id/wp-content/uploads/2020/02/Komik-The-Cuckoo’s-Fiancee.jpg?resize=155,200&amp;quality=60" class="lazy rd sd" alt="Manga The Cuckoo’s Fiancee Bahasa Indonesia">
                                <div class="tpe1_inf">
                                    <b>Romantis</b> </div>
                            </div>
                            <h3>
								The Cuckoo’s Fiancee							</h3>
                        </a>
                        <span>44 rb x • 4 jam lalu</span>
                    </div>
                    <div class="grd2">
                        <a href="https://komiku.co.id/manga/dioti-manual-kamisamatachi-no-renai-daikou/">
                            <div class="imr">
                                <div class="vw "></div>
                                <img src="https://i0.wp.com/komiku.co.id/wp-content/uploads/2020/02/load.gif?resize=155,200&amp;quality=60" data-src="https://i0.wp.com/komiku.co.id/wp-content/uploads/Komik-Dioti-Manual-Kamisamatachi-no-Renai-Daikou.jpg?resize=155,200&amp;quality=60" class="lazy rd sd" alt="Manga Dioti Manual ~Kamisamatachi no Ren'ai Daikou~ Bahasa Indonesia">
                                <div class="tpe1_inf">
                                    <b>Romantis</b> </div>
                            </div>
                            <h3>
								Dioti Manual ~Kamisamatachi no Ren'ai Daikou~							</h3>
                        </a>
                        <span>28 rb x • 4 jam lalu</span>
                    </div>
                    <div class="grd2">
                        <a href="https://komiku.co.id/manga/jitsu-wa-ore-saikyou-deshita/">
                            <div class="imr">
                                <div class="vw Rekomendasi"></div>
                                <img src="https://i0.wp.com/komiku.co.id/wp-content/uploads/2020/02/load.gif?resize=155,200&amp;quality=60" data-src="https://i0.wp.com/komiku.co.id/wp-content/uploads/Komik-Jitsu-wa-Ore-Saikyou-deshita.jpg?resize=155,200&amp;quality=60" class="lazy rd sd" alt="Manga Jitsu wa Ore, Saikyou deshita? Bahasa Indonesia">
                                <div class="tpe1_inf">
                                    <b>Isekai</b> </div>
                            </div>
                            <h3>
								Jitsu wa Ore, Saikyou deshita?							</h3>
                        </a>
                        <span>81 rb x • 7 jam lalu</span>
                    </div>
                    <div class="grd2">
                        <a href="https://komiku.co.id/manga/danshi-koukousei-wo-yashinaitai-onee-san-no-hanashi/">
                            <div class="imr">
                                <div class="vw Rekomendasi"></div>
                                <img src="https://i0.wp.com/komiku.co.id/wp-content/uploads/2020/02/load.gif?resize=155,200&amp;quality=60" data-src="https://i0.wp.com/komiku.co.id/wp-content/uploads/2018/08/Manga-Danshi-Koukousei-wo-Yashinaitai-Onee-san-no-Hanashi..jpg?resize=155,200&amp;quality=60" class="lazy rd sd" alt="Manga Danshi Koukousei wo Yashinaitai Onee-san no Hanashi Bahasa Indonesia">
                                <div class="tpe1_inf">
                                    <b>Romantis</b> </div>
                            </div>
                            <h3>
								Danshi Koukousei wo Yashinaitai Onee-san no Hanashi							</h3>
                        </a>
                        <span>303 rb x • 1 hari lalu</span>
                    </div>
                    <div class="grd2">
                        <a href="https://komiku.co.id/manga/yakumo-san-wa-ezuke-ga-shitai/">
                            <div class="imr">
                                <div class="vw Rekomendasi"></div>
                                <img src="https://i0.wp.com/komiku.co.id/wp-content/uploads/2020/02/load.gif?resize=155,200&amp;quality=60" data-src="https://i0.wp.com/komiku.co.id/wp-content/uploads/Komik-Yakumo-san-wa-Ezuke-ga-Shitai.jpg?resize=155,200&amp;quality=60" class="lazy rd sd" alt="Manga Yakumo-san wa Ezuke ga Shitai. Bahasa Indonesia">
                                <div class="tpe1_inf">
                                    <b>Romantis</b> </div>
                            </div>
                            <h3>
								Yakumo-san wa Ezuke ga Shitai.							</h3>
                        </a>
                        <span>107 rb x • 1 hari lalu</span>
                    </div>

                </div>
            </div>
        </section>
        <section>
            <div class="h2 h2t2">
                <h2>
					Status Manga
					</h2>
                <div class="gre">
                    <button class="tab2 tabtipe3 def3 curr" onclick="openLink3(event, 'Manga_Tamat')">Manga Tamat</button>
                    <button class="tab2 tabtipe3" onclick="openLink3(event, 'Manga_Baru')">Manga Baru</button>
                </div>
            </div>
            <div id="Manga_Tamat" class="sec2 sectipe3" style="display: block;">
                <a href="/status/end/" class="selengkapnya" title="Manga Tamat">More »</a>
                <div class="scrll">
                    <div class="grd2">
                        <a href="https://komiku.co.id/manga/glamorous/">
                            <div class="imr">
                                <div class="vw "></div>
                                <img src="https://i0.wp.com/komiku.co.id/wp-content/uploads/Komik-Glamorous.jpg?resize=155,200&amp;quality=60" data-src="https://i0.wp.com/komiku.co.id/wp-content/uploads/Komik-Glamorous.jpg?resize=155,200&amp;quality=60" class="lazy rd sd" alt="Glamorous Indo">
                                <div class="tpe1_inf">
                                    <b>Romantis</b> </div>
                            </div>
                            <h3>
								Glamorous							</h3>
                        </a>
                        <span>16 rb x • 2 bulan lalu</span>
                    </div>
                    <div class="grd2">
                        <a href="https://komiku.co.id/manga/aimane-akuma-na-kanojo-o-produce/">
                            <div class="imr">
                                <div class="vw "></div>
                                <img src="https://i0.wp.com/komiku.co.id/wp-content/uploads/Komik-Aimane---Akuma-na-Kanojo-o-Produce.jpg?resize=155,200&amp;quality=60" data-src="https://i0.wp.com/komiku.co.id/wp-content/uploads/Komik-Aimane---Akuma-na-Kanojo-o-Produce.jpg?resize=155,200&amp;quality=60" class="lazy rd sd" alt="Aimane - Akuma na Kanojo o Produce Indo">
                                <div class="tpe1_inf">
                                    <b>Romantis</b> </div>
                            </div>
                            <h3>
								Aimane - Akuma na Kanojo o Produce							</h3>
                        </a>
                        <span>17 rb x • 2 bulan lalu</span>
                    </div>
                    <div class="grd2">
                        <a href="https://komiku.co.id/manga/ookami-shounen-wa-kyou-mo-uso-wo-kasaneru/">
                            <div class="imr">
                                <div class="vw "></div>
                                <img src="https://i0.wp.com/komiku.co.id/wp-content/uploads/Komik-Ookami-Shounen-wa-Kyou-mo-Uso-wo-Kasaneru.jpg?resize=155,200&amp;quality=60" data-src="https://i0.wp.com/komiku.co.id/wp-content/uploads/Komik-Ookami-Shounen-wa-Kyou-mo-Uso-wo-Kasaneru.jpg?resize=155,200&amp;quality=60" class="lazy rd sd" alt="Ookami Shounen wa Kyou mo Uso wo Kasaneru Indo">
                                <div class="tpe1_inf">
                                    <b>Drama</b> </div>
                            </div>
                            <h3>
								Ookami Shounen wa Kyou mo Uso wo Kasaneru							</h3>
                        </a>
                        <span>11 rb x • 2 bulan lalu</span>
                    </div>
                    <div class="grd2">
                        <a href="https://komiku.co.id/manga/gal-kazoku/">
                            <div class="imr">
                                <div class="vw "></div>
                                <img src="https://i0.wp.com/komiku.co.id/wp-content/uploads/Komik-Gal-Kazoku.jpeg?resize=155,200&amp;quality=60" data-src="https://i0.wp.com/komiku.co.id/wp-content/uploads/Komik-Gal-Kazoku.jpeg?resize=155,200&amp;quality=60" class="lazy rd sd" alt="Gal Kazoku Indo">
                                <div class="tpe1_inf">
                                    <b>Romantis</b> </div>
                            </div>
                            <h3>
								Gal Kazoku							</h3>
                        </a>
                        <span>10 rb x • 2 bulan lalu</span>
                    </div>
                    <div class="grd2">
                        <a href="https://komiku.co.id/manga/tora-kiss/">
                            <div class="imr">
                                <div class="vw "></div>
                                <img src="https://i0.wp.com/komiku.co.id/wp-content/uploads/Komik-Tora-Kiss.jpg?resize=155,200&amp;quality=60" data-src="https://i0.wp.com/komiku.co.id/wp-content/uploads/Komik-Tora-Kiss.jpg?resize=155,200&amp;quality=60" class="lazy rd sd" alt="Tora Kiss Indo">
                                <div class="tpe1_inf">
                                    <b>Aksi</b> </div>
                            </div>
                            <h3>
								Tora Kiss							</h3>
                        </a>
                        <span>24 rb x • 2 bulan lalu</span>
                    </div>
                    <div class="grd2">
                        <a href="https://komiku.co.id/manga/dr-stone-spinoff/">
                            <div class="imr">
                                <div class="vw "></div>
                                <img src="https://i0.wp.com/komiku.co.id/wp-content/uploads/2020/02/load.gif?resize=155,200&amp;quality=60" data-src="https://i0.wp.com/komiku.co.id/wp-content/uploads/Komik-Dr-Stone-SpinOff.jpg?resize=155,200&amp;quality=60" class="lazy rd sd" alt="Dr Stone SpinOff Indo">
                                <div class="tpe1_inf">
                                    <b>Fiksi Sains</b> </div>
                            </div>
                            <h3>
								Dr Stone SpinOff							</h3>
                        </a>
                        <span>32 rb x • 2 bulan lalu</span>
                    </div>
                    <div class="grd2">
                        <a href="https://komiku.co.id/manga/shokugeki-no-souma-bahasa-indonesia/">
                            <div class="imr">
                                <div class="vw Hot"></div>
                                <img src="https://i0.wp.com/komiku.co.id/wp-content/uploads/2020/02/load.gif?resize=155,200&amp;quality=60" data-src="https://i0.wp.com/komiku.co.id/wp-content/uploads/Komik-Shokugeki-no-Souma.jpg?resize=155,200&amp;quality=60" class="lazy rd sd" alt="Shokugeki no Souma Indo">
                                <div class="tpe1_inf">
                                    <b>Drama</b> </div>
                            </div>
                            <h3>
								Shokugeki no Souma							</h3>
                        </a>
                        <span>2.6 jt x • 2 bulan lalu</span>
                    </div>
                    <div class="grd2">
                        <a href="https://komiku.co.id/manga/golem-hearts/">
                            <div class="imr">
                                <div class="vw "></div>
                                <img src="https://i0.wp.com/komiku.co.id/wp-content/uploads/2020/02/load.gif?resize=155,200&amp;quality=60" data-src="https://i0.wp.com/komiku.co.id/wp-content/uploads/Komik-Golem-Hearts.jpeg?resize=155,200&amp;quality=60" class="lazy rd sd" alt="Golem Hearts Indo">
                                <div class="tpe1_inf">
                                    <b>Fantasi</b> </div>
                            </div>
                            <h3>
								Golem Hearts							</h3>
                        </a>
                        <span>3 rb x • 2 bulan lalu</span>
                    </div>

                </div>
            </div>
            <div id="Manga_Baru" class="sec2 sectipe3" style="display: none;">
                <div class="scrll">
                    <div class="grd2">
                        <a href="https://komiku.co.id/manga/isekai-monster-breeder/">
                            <div class="imr">
                                <div class="vw "></div>
                                <img src="https://i0.wp.com/komiku.co.id/wp-content/uploads/2020/02/load.gif?resize=155,200&amp;quality=60" data-src="https://i0.wp.com/komiku.co.id/wp-content/uploads/2020/04/Manga-Isekai-Monster-Breeder.jpg?resize=155,200&amp;quality=60" class="lazy rd sd" alt="Isekai Monster Breeder Indo">
                                <div class="tpe1_inf">
                                    <b>Isekai</b> </div>
                            </div>
                            <h3>
								Isekai Monster Breeder							</h3>
                        </a>
                        <span>13 rb x • 1 hari lalu</span>
                    </div>
                    <div class="grd2">
                        <a href="https://komiku.co.id/manga/shin-no-nakama-janai-to-yuusha-no-party-wo-oidasareta-node-henkyou-de-slow-life-suru-koto-ni-shimashita/">
                            <div class="imr">
                                <div class="vw "></div>
                                <img src="https://i0.wp.com/komiku.co.id/wp-content/uploads/2020/02/load.gif?resize=155,200&amp;quality=60" data-src="https://i0.wp.com/komiku.co.id/wp-content/uploads/2020/04/Manga-Shin-no-Nakama-janai-to-Yuusha-no-Party-wo-Oidasareta-node-Henkyou-de-Slow-Life-suru-Koto-ni-shimashita.jpg?resize=155,200&amp;quality=60" class="lazy rd sd" alt="Shin no Nakama janai to Yuusha no Party wo Oidasareta node Henkyou de Slow Life suru Koto ni shimashita Indo">
                                <div class="tpe1_inf">
                                    <b>Fantasi</b> </div>
                            </div>
                            <h3>
								Shin no Nakama janai to Yuusha no Party wo Oidasareta node Henkyou de Slow Life suru Koto ni shimashita							</h3>
                        </a>
                        <span>32 rb x • 1 minggu lalu</span>
                    </div>
                    <div class="grd2">
                        <a href="https://komiku.co.id/manga/jichou-shinai-motoyuusha-no-tsuyokute-tanoshii-new-game/">
                            <div class="imr">
                                <div class="vw Rekomendasi"></div>
                                <img src="https://i0.wp.com/komiku.co.id/wp-content/uploads/2020/02/load.gif?resize=155,200&amp;quality=60" data-src="https://i0.wp.com/komiku.co.id/wp-content/uploads/2020/04/Manga-Jichou-shinai-Motoyuusha-no-Tsuyokute-Tanoshii-New-Game.jpg?resize=155,200&amp;quality=60" class="lazy rd sd" alt="Jichou shinai Motoyuusha no Tsuyokute Tanoshii New Game Indo">
                                <div class="tpe1_inf">
                                    <b>Isekai</b> </div>
                            </div>
                            <h3>
								Jichou shinai Motoyuusha no Tsuyokute Tanoshii New Game							</h3>
                        </a>
                        <span>86 rb x • 1 jam lalu</span>
                    </div>
                    <div class="grd2">
                        <a href="https://komiku.co.id/manga/yasei-no-last-boss-ga-arawareta/">
                            <div class="imr">
                                <div class="vw "></div>
                                <img src="https://i0.wp.com/komiku.co.id/wp-content/uploads/2020/02/load.gif?resize=155,200&amp;quality=60" data-src="https://i0.wp.com/komiku.co.id/wp-content/uploads/2020/04/Manga-Yasei-no-Last-Boss-ga-Arawareta.jpg?resize=155,200&amp;quality=60" class="lazy rd sd" alt="Yasei no Last Boss ga Arawareta Indo">
                                <div class="tpe1_inf">
                                    <b>Isekai</b> </div>
                            </div>
                            <h3>
								Yasei no Last Boss ga Arawareta							</h3>
                        </a>
                        <span>49 rb x • 3 minggu lalu</span>
                    </div>
                    <div class="grd2">
                        <a href="https://komiku.co.id/manga/gokushufudou-the-way-of-the-house-husband/">
                            <div class="imr">
                                <div class="vw Rekomendasi"></div>
                                <img src="https://i0.wp.com/komiku.co.id/wp-content/uploads/2020/02/load.gif?resize=155,200&amp;quality=60" data-src="https://i0.wp.com/komiku.co.id/wp-content/uploads/2020/03/Manga-Gokushufudou-The-Way-of-the-House-Husband.jpg?resize=155,200&amp;quality=60" class="lazy rd sd" alt="Gokushufudou: The Way of the House Husband Indo">
                                <div class="tpe1_inf">
                                    <b>Komedi</b> </div>
                            </div>
                            <h3>
								Gokushufudou: The Way of the House Husband							</h3>
                        </a>
                        <span>75 rb x • 1 minggu lalu</span>
                    </div>
                    <div class="grd2">
                        <a href="https://komiku.co.id/manga/shishidou-san-ni-shikararetai/">
                            <div class="imr">
                                <div class="vw "></div>
                                <img src="https://i0.wp.com/komiku.co.id/wp-content/uploads/2020/02/load.gif?resize=155,200&amp;quality=60" data-src="https://i0.wp.com/komiku.co.id/wp-content/uploads/2020/03/Manga-Shishidou-san-ni-Shikararetai.jpg?resize=155,200&amp;quality=60" class="lazy rd sd" alt="Shishidou-san ni Shikararetai Indo">
                                <div class="tpe1_inf">
                                    <b>Romantis</b> </div>
                            </div>
                            <h3>
								Shishidou-san ni Shikararetai							</h3>
                        </a>
                        <span>35 rb x • 4 minggu lalu</span>
                    </div>
                    <div class="grd2">
                        <a href="https://komiku.co.id/manga/pashiri-na-boku-to-koisuru-banchou-san/">
                            <div class="imr">
                                <div class="vw Rekomendasi"></div>
                                <img src="https://i0.wp.com/komiku.co.id/wp-content/uploads/2020/02/load.gif?resize=155,200&amp;quality=60" data-src="https://i0.wp.com/komiku.co.id/wp-content/uploads/2020/03/Manga-Pashiri-na-Boku-to-Koisuru-Banchou-san.jpg?resize=155,200&amp;quality=60" class="lazy rd sd" alt="Pashiri na Boku to Koisuru Banchou-san Indo">
                                <div class="tpe1_inf">
                                    <b>Romantis</b> </div>
                            </div>
                            <h3>
								Pashiri na Boku to Koisuru Banchou-san							</h3>
                        </a>
                        <span>63 rb x • 3 minggu lalu</span>
                    </div>
                    <div class="grd2">
                        <a href="https://komiku.co.id/manga/kaiko-sareta-ankoku-heishi-30-dai-no-slow-na-second-life/">
                            <div class="imr">
                                <div class="vw "></div>
                                <img src="https://i0.wp.com/komiku.co.id/wp-content/uploads/2020/02/load.gif?resize=155,200&amp;quality=60" data-src="https://i0.wp.com/komiku.co.id/wp-content/uploads/2020/03/Manga-Kaiko-sareta-Ankoku-Heishi-30-dai-no-Slow-na-Second-Life.jpeg?resize=155,200&amp;quality=60" class="lazy rd sd" alt="Kaiko sareta Ankoku Heishi (30-dai) no Slow na Second Life Indo">
                                <div class="tpe1_inf">
                                    <b>Fantasi</b> </div>
                            </div>
                            <h3>
								Kaiko sareta Ankoku Heishi (30-dai) no Slow na Second Life							</h3>
                        </a>
                        <span>30 rb x • 2 minggu lalu</span>
                    </div>

                </div>
            </div>
        </section>
        <aside>
            <h2>Rekomendasi Manga</h2>
            <div class="grd">
                <a href="https://komiku.co.id/manga/naze-boku-no-sekai-wo-daremo-oboeteinai-no-ka/">
                    <div class="gmbr1">
                        <div class="vw Rekomendasi"></div>
                        <img src="https://i0.wp.com/komiku.co.id/wp-content/uploads/Manga-Naze-Boku-no-Sekai-wo-Daremo-Oboeteinai-no-ka.jpg?resize=300,180&amp;quality=60" data-src="https://i0.wp.com/komiku.co.id/wp-content/uploads/Manga-Naze-Boku-no-Sekai-wo-Daremo-Oboeteinai-no-ka.jpg?resize=300,180&amp;quality=60" class="lazy" alt="Baca Naze Boku no Sekai wo Daremo Oboeteinai no ka?">
                        <div class="tpe1_inf">
                            <b>Manga</b> Fantasi </div>
                    </div>
                    <h4>
								Naze Boku no Sekai wo Daremo Oboeteinai no ka?							</h4>
                    <span>68 rb x • 4 jam lalu</span>
                </a>
                <p>
                    Perang besar antara lima ras di dunia berakhir ketika Hero Sid memimpin~ </p>
            </div>
            <div class="grd">
                <a href="https://komiku.co.id/manga/hataraku-maou-sama/">
                    <div class="gmbr1">
                        <div class="vw Rekomendasi"></div>
                        <img src="https://i0.wp.com/komiku.co.id/wp-content/uploads/Manga-Hataraku-Maou-sama.jpg?resize=300,180&amp;quality=60" data-src="https://i0.wp.com/komiku.co.id/wp-content/uploads/Manga-Hataraku-Maou-sama.jpg?resize=300,180&amp;quality=60" class="lazy" alt="Baca Hataraku Maou-sama!">
                        <div class="tpe1_inf">
                            <b>Manga</b> Isekai </div>
                    </div>
                    <h4>
								Hataraku Maou-sama!							</h4>
                    <span>184 rb x • 2 minggu lalu</span>
                </a>
                <p>
                    Raja Iblis hampir berhasil menaklukkan dunia magis. </p>
            </div>
            <div class="grd">
                <a href="https://komiku.co.id/manga/iris-zero/">
                    <div class="gmbr1">
                        <div class="vw Rekomendasi"></div>
                        <img src="https://i0.wp.com/komiku.co.id/wp-content/uploads/Manga-Iris-Zero.jpg?resize=300,180&amp;quality=60" data-src="https://i0.wp.com/komiku.co.id/wp-content/uploads/Manga-Iris-Zero.jpg?resize=300,180&amp;quality=60" class="lazy" alt="Baca Iris Zero">
                        <div class="tpe1_inf">
                            <b>Manga</b> Romantis </div>
                    </div>
                    <h4>
								Iris Zero							</h4>
                    <span>16 rb x • 2 bulan lalu</span>
                </a>
                <p>
                    Di dunia di mana setiap anak laki-laki dan perempuan memiliki kekuatan~ </p>
            </div>
            <div class="grd">
                <a href="https://komiku.co.id/manga/plunderer/">
                    <div class="gmbr1">
                        <div class="vw Hot"></div>
                        <img src="https://i0.wp.com/komiku.co.id/wp-content/uploads/Manga-Plunderer.jpg?resize=300,180&amp;quality=60" data-src="https://i0.wp.com/komiku.co.id/wp-content/uploads/Manga-Plunderer.jpg?resize=300,180&amp;quality=60" class="lazy" alt="Baca Plunderer">
                        <div class="tpe1_inf">
                            <b>Manga</b> Fantasi </div>
                    </div>
                    <h4>
								Plunderer							</h4>
                    <span>1.6 jt x • 2 minggu lalu</span>
                </a>
                <p>
                    Ini tahun 305 Kalender Alcian, dan dunia saat ini dikendalikan oleh~ </p>
            </div>
            <div class="grd">
                <a href="https://komiku.co.id/manga/saikyou-no-shuzoku-ga-ningen-datta-ken/">
                    <div class="gmbr1">
                        <div class="vw Rekomendasi"></div>
                        <img src="https://i0.wp.com/komiku.co.id/wp-content/uploads/Manga-Saikyou-no-Shuzoku-ga-Ningen-Datta-Ken.jpg?resize=300,180&amp;quality=60" data-src="https://i0.wp.com/komiku.co.id/wp-content/uploads/Manga-Saikyou-no-Shuzoku-ga-Ningen-Datta-Ken.jpg?resize=300,180&amp;quality=60" class="lazy" alt="Baca Saikyou no Shuzoku ga Ningen Datta Ken">
                        <div class="tpe1_inf">
                            <b>Manga</b> Isekai </div>
                    </div>
                    <h4>
								Saikyou no Shuzoku ga Ningen Datta Ken							</h4>
                    <span>204 rb x • 4 minggu lalu</span>
                </a>
                <p>
                    Amezaki Youji adalah karyawan kantor yang tidak terpenuhi dipanggil ke~ </p>
            </div>
            <div class="grd">
                <a href="https://komiku.co.id/manga/slime-taoshite-300-nen-shiranai-uchi-ni-level-max-ni-nattemashita/">
                    <div class="gmbr1">
                        <div class="vw Rekomendasi"></div>
                        <img src="https://i0.wp.com/komiku.co.id/wp-content/uploads/Manga-Slime-Taoshite-300-nen-Shiranai-Uchi-ni-Level-Max-ni-Nattemashita-.jpg?resize=300,180&amp;quality=60" data-src="https://i0.wp.com/komiku.co.id/wp-content/uploads/Manga-Slime-Taoshite-300-nen-Shiranai-Uchi-ni-Level-Max-ni-Nattemashita-.jpg?resize=300,180&amp;quality=60" class="lazy" alt="Baca Slime Taoshite 300-nen Shiranai Uchi ni Level Max ni Nattemashita ">
                        <div class="tpe1_inf">
                            <b>Manga</b> Isekai </div>
                    </div>
                    <h4>
								Slime Taoshite 300-nen Shiranai Uchi ni Level Max ni Nattemashita 							</h4>
                    <span>81 rb x • 12 jam lalu</span>
                </a>
                <p>
                    Budak korporat Azusa meninggal karena terlalu banyak pekerjaan dan~ </p>
            </div>
            <div class="grd">
                <a href="https://komiku.co.id/manga/world-trigger/">
                    <div class="gmbr1">
                        <div class="vw Rekomendasi"></div>
                        <img src="https://i0.wp.com/komiku.co.id/wp-content/uploads/Manga-World-Trigger.jpg?resize=300,180&amp;quality=60" data-src="https://i0.wp.com/komiku.co.id/wp-content/uploads/Manga-World-Trigger.jpg?resize=300,180&amp;quality=60" class="lazy" alt="Baca World Trigger">
                        <div class="tpe1_inf">
                            <b>Manga</b> Aksi </div>
                    </div>
                    <h4>
								World Trigger							</h4>
                    <span>121 rb x • 3 minggu lalu</span>
                </a>
                <p>
                    Mikumo Osamu adalah trainee agen Border yang melawan alien yang disebut~ </p>
            </div>
            <div class="grd">
                <a href="https://komiku.co.id/manga/bungou-stray-dogs/">
                    <div class="gmbr1">
                        <div class="vw Rekomendasi"></div>
                        <img src="https://i0.wp.com/komiku.co.id/wp-content/uploads/2019/05/Komik-bungou-stray-dogs.jpg?resize=300,180&amp;quality=60" data-src="https://i0.wp.com/komiku.co.id/wp-content/uploads/2019/05/Komik-bungou-stray-dogs.jpg?resize=300,180&amp;quality=60" class="lazy" alt="Baca Bungou Stray Dogs">
                        <div class="tpe1_inf">
                            <b>Manga</b> Aksi </div>
                    </div>
                    <h4>
								Bungou Stray Dogs							</h4>
                    <span>34 rb x • 1 bulan lalu</span>
                </a>
                <p>
                    Nakajima Atsushi diusir dari panti asuhannya, dan sekarang dia tidak punya~ </p>
            </div>
            <div class="grd">
                <a href="https://komiku.co.id/manga/haikyuu/">
                    <div class="gmbr1">
                        <div class="vw Hot"></div>
                        <img src="https://i0.wp.com/komiku.co.id/wp-content/uploads/Manga-Haikyuu.jpg?resize=300,180&amp;quality=60" data-src="https://i0.wp.com/komiku.co.id/wp-content/uploads/Manga-Haikyuu.jpg?resize=300,180&amp;quality=60" class="lazy" alt="Baca Haikyuu!!">
                        <div class="tpe1_inf">
                            <b>Manga</b> Olahraga </div>
                    </div>
                    <h4>
								Haikyuu!!							</h4>
                    <span>4.5 jt x • 7 jam lalu</span>
                </a>
                <p>
                    Meski pendek, Hinata tidak pernah menyerah bermain voli. </p>
            </div>
        </aside>
@endsection