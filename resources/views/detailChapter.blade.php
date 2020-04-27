@extends('layouts.layout')
@section('konten')
    <ul itemscope="" itemtype="http://schema.org/BreadcrumbList" class="perapih brd">
        <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
            <a itemtype="http://schema.org/Thing" itemprop="item" href="{{url('/')}}"> 
            <span itemprop="name">{{$web_title}}</span> </a>
            <meta itemprop="position" content="1"> 
        </li> <span class="pl5 pr5">»</span>
        <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
            <a itemtype="http://schema.org/Thing" itemprop="item" href="https://komiku.co.id/manga/martial-peak/"> 
            <span itemprop="name">{{$detail_manga->nama_manga}}</span> </a>
            <meta itemprop="position" content="2"> 
        </li> <span class="pl5 pr5">»</span>
        <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
            <a itemtype="http://schema.org/Thing" itemprop="item" href="https://komiku.co.id/martial-peak-chapter-347/"> 
            <span itemprop="name"> {{$detail_manga->judul_chapter}}</span> </a>
            <meta itemprop="position" content="3"> 
        </li>
    </ul>
    <article id="article" itemtype="https://schema.org/Article" itemscope="">
        <meta name="keywords" itemprop="keywords" content="Martial Peak Chapter 347, Baca Martial Peak Chapter 347, Komik Martial Peak Chapter 347 Indo, Manhua Martial Peak Chapter 347, Martial Peak 347 Bahasa Indonesia">
        <meta content="2218646" itemprop="postId">
        <div itemprop="mainContentOfPage" role="main">
            <div class="bg1">
                <div class="perapih">
                    <div class="dsk2 sd" id="Deskripsi">
                        <h1 itemprop="name">Komik {{$detail_manga->nama_manga}} Chapter {{str_replace('.0', '', $detail_manga->episode_chapter)}}</h1>
                        <p style="margin-top: 0;border-top: 1px solid #ddd;padding-top: 8px;text-align: justify;margin-bottom: 8px;margin-left: 2px;"><b>Martial Peak Chapter 347</b> bercerita tentang Hanya dengan begitu Anda dapat menerobos dan melanjutkan perjalanan Anda untuk menjadi yang terkuat. </p>
                        <table class="tbl">
                            <tbody data-test="informasi">
                                <tr>
                                    <td>Judul</td>
                                    <td>{{$detail_manga->nama_manga}} {{str_replace('.0', '', $detail_manga->episode_chapter)}}</td>
                                </tr>
                                <tr>
                                    <td>Tipe</td>
                                    <td>Komik {{$negara}} ({{$detail_manga->jenis_manga}})</td>
                                </tr>
                                <tr>
                                    <td>Chapter</td>
                                    <td class="chp">{{str_replace('.0', '', $detail_manga->episode_chapter)}}</td>
                                </tr>
                                <tr>
                                    <td>Komikus</td>
                                    <td><span itemprop="author">{{$detail_manga->komikus}}</span></td>
                                </tr>
                            </tbody>
                        </table>
                        
                        <?php 
                            $next = str_replace('.0', '', ($detail_manga->episode_chapter+1));
                            $prev = str_replace('.0', '', ($detail_manga->episode_chapter-1)); 
                        ?>
                  
                        <div class="new new2" style="margin-bottom:0">
                            @if($detail_manga->episode_chapter > $minChapterManga)
                                <div class="new1 new2 sd" style="background: #4c4c4c; float:left;"> 
                                    <a href="{{url('manga/'.$detail_manga->slug_manga.'/'.$prev)}}">
                                        <span>Sebelumnya </span>
                                        <span>Chapter {{$prev}}</span>
                                    </a>
                                </div>
                            @endif
                            @if($detail_manga->episode_chapter < $maxChapterManga)
                                <div class="new1 new2 sd" style="background: #4c4c4c; float:right;">
                                    <a href="{{url('manga/'.$detail_manga->slug_manga.'/'.$next)}}">
                                        <span>Selanjutnya </span>
                                        <span>Chapter {{$next}}</span>
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="bc" id="Baca_Komik">
                <p> 
                    Cara baca 
                    <b>Komik {{$detail_manga->nama_manga}} Chapter {{str_replace('.0', '', $detail_manga->episode_chapter)}} Bahasa Indonesia</b> 
                    adalah dari kiri ke kanan. 
                </p>

                <!-- LOOPING IMAGE -->
                @foreach($gambar as $gambarList)
                    <img src="{{$gambarList->link_gambar}}" alt="{{$detail_manga->nama_manga}} Chapter {{str_replace('.0', '', $detail_manga->episode_chapter)}} {{$detail_manga->nama_gambar}}" onerror="this.onerror=null;">   
                @endforeach
                <!-- END LOOPING IMAGE -->
                
                <noscript>
                    <p style="font-size:21px"> Aktifkan Javascript untuk melihat gambar! </p>
                    <style>
                        .bc img {
                            display: none;
                        }
                    </style>
                </noscript>
                <p> <b>{{$detail_manga->jenis_manga}} {{$detail_manga->nama_manga}} Chapter {{str_replace('.0', '', $detail_manga->episode_chapter)}}</b> Indo rilis hari
                    <time class="post-date" datetime="2020-04-26T6:53:53+07:00">Minggu, 26 April 2020</time>. </p>
                <script type="text/javascript" src="https://iklan.komiku.co.id/iklan.php"></script>
            </div>
            <footer class="perapih chf" style="margin-bottom:15px">
                <div class="rlt">
                    <h4> Rekomendasi Komik <span class="biru">{{$detail_manga->konsep_cerita}}</span> Lain </h4>
                    
                    <!-- LOOPING REKOMENDASI -->
                    @foreach($detail_kategori as $detail_kategoriList)
                        <div class="rlt1">
                            <a href="{{url('manga/'.$detail_kategoriList->slug_manga)}}"> 
                                <img src="{{url('/storage/komik/background_detail/'.$detail_kategoriList->slug_manga.'.jpg')}}">
                                <h5 class="jdl"> {{$detail_kategoriList->nama_manga}} </h5> 
                            </a>
                            <div class="tpe"> 
                                <span>{{$detail_kategoriList->jenis_manga}}</span> 
                                <span>Update: {{ str_replace('hours ago', 'jam yang lalu', \Carbon\Carbon::parse($detail_kategoriList->updated_at)->diffForHumans()) }}</span> 
                            </div>
                        </div>
                    @endforeach
                    <!-- END LOOPING REKOMENDASI -->
                </div>

                <!-- NAVBAR ATAS -->
                <div class="nva" style="background: #000;">
                    <ul class="perapih">
                        <li>
                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="book-reader" role="img" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                <path fill="currentColor" d="M352 96c0-53.02-42.98-96-96-96s-96 42.98-96 96 42.98 96 96 96 96-42.98 96-96zM233.59 241.1c-59.33-36.32-155.43-46.3-203.79-49.05C13.55 191.13 0 203.51 0 219.14v222.8c0 14.33 11.59 26.28 26.49 27.05 43.66 2.29 131.99 10.68 193.04 41.43 9.37 4.72 20.48-1.71 20.48-11.87V252.56c-.01-4.67-2.32-8.95-6.42-11.46zm248.61-49.05c-48.35 2.74-144.46 12.73-203.78 49.05-4.1 2.51-6.41 6.96-6.41 11.63v245.79c0 10.19 11.14 16.63 20.54 11.9 61.04-30.72 149.32-39.11 192.97-41.4 14.9-.78 26.49-12.73 26.49-27.06V219.14c-.01-15.63-13.56-28.01-29.81-27.09z"></path>
                            </svg> Chapter {{str_replace('.0', '', $detail_manga->episode_chapter)}} dari {{str_replace('.0', '', $maxChapterManga)}}</li>
                        <li class="ls1"><a href="{{url('manga/'.$detail_manga->slug_manga)}}" title="Komik {{$detail_manga->nama_manga}}">Daftar Chapter »</a></li>
                    </ul>
                </div>

                <!-- NAVBAR BAWAH -->
                <div class="nvb">
                    <div class="bar">
                        <div class="bar-long"></div>
                    </div>
                    <ul class="perapih">
                        <li>
                            <a href="https://komiku.co.id/one-piece-chapter-967/?komentar">
                                <svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="comments" role="img" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
                                    <path fill="currentColor" d="M532 386.2c27.5-27.1 44-61.1 44-98.2 0-80-76.5-146.1-176.2-157.9C368.3 72.5 294.3 32 208 32 93.1 32 0 103.6 0 192c0 37 16.5 71 44 98.2-15.3 30.7-37.3 54.5-37.7 54.9-6.3 6.7-8.1 16.5-4.4 25 3.6 8.5 12 14 21.2 14 53.5 0 96.7-20.2 125.2-38.8 9.2 2.1 18.7 3.7 28.4 4.9C208.1 407.6 281.8 448 368 448c20.8 0 40.8-2.4 59.8-6.8C456.3 459.7 499.4 480 553 480c9.2 0 17.5-5.5 21.2-14 3.6-8.5 1.9-18.3-4.4-25-.4-.3-22.5-24.1-37.8-54.8zm-392.8-92.3L122.1 305c-14.1 9.1-28.5 16.3-43.1 21.4 2.7-4.7 5.4-9.7 8-14.8l15.5-31.1L77.7 256C64.2 242.6 48 220.7 48 192c0-60.7 73.3-112 160-112s160 51.3 160 112-73.3 112-160 112c-16.5 0-33-1.9-49-5.6l-19.8-4.5zM498.3 352l-24.7 24.4 15.5 31.1c2.6 5.1 5.3 10.1 8 14.8-14.6-5.1-29-12.3-43.1-21.4l-17.1-11.1-19.9 4.6c-16 3.7-32.5 5.6-49 5.6-54 0-102.2-20.1-131.3-49.7C338 339.5 416 272.9 416 192c0-3.4-.4-6.7-.7-10C479.7 196.5 528 238.8 528 288c0 28.7-16.2 50.6-29.7 64z"></path>
                                </svg> 3 <span>Komentar</span> <b>+ADD</b>
                            </a>
                        </li>
                        @if($detail_manga->episode_chapter < $maxChapterManga)
                            <li class="rl">
                                <a href="https://komiku.co.id/one-piece-chapter-968/" class="rl">
                                    <span> Ch. {{$next}} </span>
                                </a>
                            </li>
                        @endif

                        @if($detail_manga->episode_chapter > $minChapterManga)
                        <li class="rl">
                            <a href="https://komiku.co.id/one-piece-chapter-966-indo/" class="rl"> 
                                <span> Ch. {{$prev}} </span>
                            </a>
                        </li>
                        @endif

                    </ul>
                </div>

                <div class="subscribe">
                    <a href="https://komiku.co.id/manga/martial-peak/?ikuti" target="_blank" rel="nofollow noopenner">Subscribe</a>
                    <a href="#article">Ke atas</a>
                </div>
            </footer>
            <div class="brk sd">
                <div class="brk1" id="Chapter_Berikutnya">
                    <div class="nxt"> Chapter Berikutnya </div>
                    <p> Chapter berikutnya belum tersedia, baca komik rekomendasi sejenis dibawah halaman ini. </p> <a href="https://komiku.co.id/manga/martial-peak/" class="la" title="Komik Martial Peak">Semua Chapter </a> <a href="https://pdf.komiku.co.id/martial-peak-chapter-347/" target="_blank" rel="nofollow" class="la">Download PDF |</a> </div>
                <div class="brk1 brk2" id="Komentar">
                    <div class="nxt"> 26 Komentar <a href="https://komiku.co.id/martial-peak-chapter-347/?komentar" class="mre sd rd" rel="nofollow noopenner">Buat / Lihat Komentar</a> </div>
                    <div class="km">
                        <div class="nm"> Yudha </div>
                        <p class="is"> Ayo lanjutkan min... </p>
                    </div>
                    <div class="km">
                        <div class="nm"> B4nk4i </div>
                        <p class="is"> Mantul min... Ttes semangat biarpun tnpa penyemangat 😅✌️ </p>
                    </div>
                    <div class="km">
                        <div class="nm"> Fikri </div>
                        <p class="is"> Up min plis yo </p>
                    </div>
                    <div class="km">
                        <div class="nm"> Ken shi </div>
                        <p class="is"> Terima kasih update terbaru nya tetap semangat 💪💪 up up lagiii dan lagi 🙏😘 </p>
                    </div>
                    <div class="km">
                        <div class="nm"> Andi </div>
                        <p class="is"> Mantap kali semangat terus ya mun.. </p>
                    </div>
                    <div class="km">
                        <div class="nm"> Devista </div>
                        <p class="is"> Lanjut min </p>
                    </div>
                    <div class="km">
                        <div class="nm"> Mr. Zaw </div>
                        <p class="is"> Semangat up lg min...!!! </p>
                    </div>
                    <div class="km">
                        <div class="nm"> SiKomo </div>
                        <p class="is"> Lanjoot min </p>
                    </div>
                    <div class="km">
                        <div class="nm"> Anjay </div>
                        <p class="is"> Up lagi min </p>
                    </div>
                    <div class="km">
                        <div class="nm"> Adhy </div>
                        <p class="is"> Akhirx up juga </p>
                    </div>
                </div>
            </div>
        </div>
        

        <aside class="ch rd sd" id="Terkait">
            <div class="df"> <img src="{{url('/storage/komik/background_detail/'.$detail_manga->slug_manga.'.jpg')}}" alt="Baca Komik Martial Peak" class="asm sd" style="height:130px; width:230px;">
                <h3> Komik {{$detail_manga->nama_manga}} </h3>
                <p> {{ explode('</li>', explode('<ul class="rs"> <li>', $detail_manga->sinopsis)[1])[0] }} </p>
                <table class="chapter" id="Chapter_Lainnya">
                    <tbody class="_3Rsjq" data-test="chapter-table">
                        <tr>
                            <th class="judulseries">Chapter Lain</th>
                            <th class="tanggalseries">Tanggal Rilis</th>
                        </tr>
                        <tr class="curr">
                            <td class="judulseries"><a href="https://komiku.co.id/martial-peak-chapter-347/" title="Komik Martial Peak Chapter 347 Indonesia"><span>Martial Peak</span> Chapter 347</a></td>
                            <td class="tanggalseries">
                                <time class="post-date" datetime="2020-04-26T3:03:00+00:00">3 jam lalu</time>
                            </td>
                        </tr>
                        <tr>
                            <td class="judulseries"><a href="https://komiku.co.id/martial-peak-chapter-346/" title="Komik Martial Peak Chapter 346 Indonesia"><span>Martial Peak</span> Chapter 346</a></td>
                            <td class="tanggalseries">
                                <time class="post-date" datetime="2020-04-26T3:03:00+00:00">6 jam lalu</time>
                            </td>
                        </tr>
                        <tr>
                            <td class="judulseries"><a href="https://komiku.co.id/martial-peak-chapter-345/" title="Komik Martial Peak Chapter 345 Indonesia"><span>Martial Peak</span> Chapter 345</a></td>
                            <td class="tanggalseries">
                                <time class="post-date" datetime="2020-04-26T3:03:00+00:00">10 jam lalu</time>
                            </td>
                        </tr>
                        <tr>
                            <td class="judulseries"><a href="https://komiku.co.id/manga/martial-peak/" title="Komik Martial Peak">Martial Peak</a></td>
                            <td class="tanggalseries">Semua chapter</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </aside>
    </article>
@endsection