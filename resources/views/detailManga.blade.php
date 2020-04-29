@extends('layouts.layout')
@section('konten')

    <!-- BREADCRUMB -->
    <ul itemscope="" itemtype="http://schema.org/BreadcrumbList" class="perapih brd">
        <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
            <h4 class="dip"> 
                <a itemtype="http://schema.org/Thing" itemprop="item" href="{{url('/')}}"> 
                    <span itemprop="name">Komiku</span> 
                </a> 
                <meta itemprop="position" content="1"> 
            </h4> 
        </li> 
        <span class="pl5 pr5"></span>
        <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
            <h4 class="dip"> 
                <a itemtype="http://schema.org/Thing" itemprop="item" href="{{url('daftar-komik/kategori/'.$detailManga->jenis_manga)}}"> 
                    <span itemprop="name">{{$detailManga->jenis_manga}}</span>
                 </a> 
                <meta itemprop="position" content="2"> 
            </h4> 
        </li>
    </ul>
    <!-- END BREADCRUMB -->

    <!-- DETAIL MANGA -->
    <article>
        <header class="jds">
            <h1> Komik {{$detailManga->nama_manga}} </h1>
            <p> 
                Baca Komik {{$detailManga->nama_manga}} bahasa Indonesia terlengkap dan terbaru di {{$web_title}}. 
                <b>{{$detailManga->jenis_manga}} {{$detailManga->nama_manga}}</b> 
                bercerita tentang raja Bajak Laut mengkonfirmasi keberadaan harta terbesar yang disebut One Piece. 
            </p>
        </header>
        <section style="border-radius:0;margin-bottom:0">
            <div class="ims"><img src="{{url('/storage/komik/sampul_detail/'.$detailManga->slug_manga.'.jpg')}}" alt="Baca Komik One Piece"></div>
            <table class="inftable">
                <tbody>
                    <tr>
                        <td width="35%">Judul</td>
                        <td width="65%"><b style="font-size:16px">{{$detailManga->nama_manga}}</b></td>
                    </tr>
                    <tr>
                        <td>Judul Indonesia</td>
                        <td><b>{{$detailManga->judul_indo}}</b></td>
                    </tr>
                    <tr>
                        <td>Jenis Komik</td>
                        <td><a href="/category/Manga/" title="Baca Manga"><b>{{$detailManga->jenis_manga}}</b></a></td>
                    </tr>
                    <tr>
                        <td>Konsep Cerita</td>
                        <td>{{$detailManga->konsep_cerita}}</td>
                    </tr>
                    <tr>
                        <td>Komikus</td>
                        <td>{{$detailManga->komikus}}</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>{{$detailManga->status_manga}}</td>
                    </tr>
                    <tr>
                        <td>Umur Pembaca</td>
                        <td>{{$detailManga->rate_umur}} Tahun (minimal)</td>
                    </tr>
                    <tr>
                        <td>Jumlah Pembaca</td>
                        <td>{{$detailManga->views}}</td>
                    </tr>
                </tbody>
            </table>
            <ul class="genre">
                @foreach($detailKategoriManga as $detailKategoriMangaList)
                    <li class="genre" itemprop="genre">
                        <a href="{{url('genre/'.$detailKategoriMangaList->slug_kategori)}}" rel="tag">
                            {{$detailKategoriMangaList->nama_kategori}}
                        </a>
                    </li>
                @endforeach
            </ul>
        </section>
        <div class="mnu">
            <button class="tab def" onclick="openLink(event, 'Chapter')">Chapter</button>
            <button class="tab" onclick="openLink(event, 'Sinopsis')">Sinopsis</button>
            <button class="tab curr" onclick="openLink(event, 'Spoiler')">Spoiler</button>
        </div>

        <!-- SINOPSIS -->
        <section class="sec" id="Sinopsis" style="display:none">
            <?php echo htmlspecialchars_decode($detailManga->sinopsis); ?>
        </section>
        <!-- END SINOPSIS -->

        <!-- SPOILER -->
        <section class="sec" id="Spoiler" style="display: block;">
            <h2> Spoiler {{$detailManga->nama_manga}} Terbaru </h2>
            <div class="lsf">
                <div class="ls1"> 
                    @foreach($spoilerImageManga as $spoilerImageMangaList)
                        <img src="{{$spoilerImageMangaList->link_spoiler_image}}" alt="{{$detailManga->jenis_manga}} {{$detailManga->nama_manga}} gambar {{$loop->iteration}}">
                    @endforeach
                </div>
            </div>
            <p> Informasi tambahan <b>Komik {{$detailManga->nama_manga}} Indo</b> dibuat oleh Komikus {{$detailManga->komikus}} dan sampai saat ini memiliki status {{$detailManga->status_manga}}. Untuk membaca komik ini, pastikan umur kalian sudah lebih dari {{$detailManga->rate_umur}} tahun dikarenakan Komik Online {{$detailManga->nama_manga}} Sub Indo memiliki genre {{$detailManga->konsep_cerita}}. </p>
        </section>
        <!-- END SPOILER -->

        <!-- CHAPTER -->
        <section class="sec" id="Chapter" style="display: none;">
            <h2> Baca {{$detailManga->jenis_manga}} {{$detailManga->nama_manga}} </h2>
            <div class="new">
                <div class="new1 sd rd"> 
                    <a href="{{url('manga/'.$detailManga->slug_manga.'/'.str_replace('.0', '', $minChapterManga))}}" title="{{$detailManga->nama_manga}} Chapter {{str_replace('.0', '', $minChapterManga)}}" target="_blank">
                        <span>Chapter Awal </span>
                        <span>Chapter {{str_replace('.0', '', $minChapterManga)}}</span>
                    </a> 
                </div>
                <div class="new1 sd rd"> 
                    <a href="{{url('manga/'.$detailManga->slug_manga.'/'.str_replace('.0', '', $maxChapterManga))}}" title="{{$detailManga->nama_manga}} Chapter {{str_replace('.0', '', $maxChapterManga)}}" target="_blank">
                        <span>Chapter Baru </span>
                        <span>Chapter {{str_replace('.0', '', $maxChapterManga)}}</span>
                    </a> 
                </div> 
                <b>
                    <!-- <a style="float:left;margin-top:15px" href="https://komiku.co.id/one-piece-chapter-978/" title="One Piece Chapter 978">Cek juga jadwal rilis: One Piece Chapter 978</a> -->
                </b> 
            </div>
            <p> Cara baca {{$detailManga->jenis_manga}} online {{$detailManga->nama_manga}} Indo adalah dari @if( $detailManga->jenis_manga == 'Manga') kanan ke kiri @else kiri ke kanan @endif. </p>

            <!-- SHARE -->
            <p style="float: left; width: 100%;text-align: center;color: #4163b2;font-weight: 600;">Share komik ini = bantu cepat update!</p>
            <a class="resp-sharing-button__link" href="https://twitter.com/intent/tweet/?text=Baca One Piece di Komiku!&amp;url=https://komiku.co.id/manga/one-piece/" target="_blank" rel="noopener nofollow" aria-label="Share on Twitter">
                <div class="resp-sharing-button resp-sharing-button--twitter resp-sharing-button--large">
                    <div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--normal">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M23.4 4.83c-.8.37-1.5.38-2.22.02.94-.56.98-.96 1.32-2.02-.88.52-1.85.9-2.9 1.1-.8-.88-2-1.43-3.3-1.43-2.5 0-4.55 2.04-4.55 4.54 0 .36.04.7.12 1.04-3.78-.2-7.12-2-9.37-4.75-.4.67-.6 1.45-.6 2.3 0 1.56.8 2.95 2 3.77-.73-.03-1.43-.23-2.05-.57v.06c0 2.2 1.57 4.03 3.65 4.44-.67.18-1.37.2-2.05.08.57 1.8 2.25 3.12 4.24 3.16-1.95 1.52-4.36 2.16-6.74 1.88 2 1.3 4.4 2.04 6.97 2.04 8.36 0 12.93-6.92 12.93-12.93l-.02-.6c.9-.63 1.96-1.22 2.57-2.14z"></path>
                        </svg>
                    </div>Share Twitter</div>
                </div>
            </a>
            <a class="resp-sharing-button__link" href="whatsapp://send?text=Baca One Piece di Komiku! https://komiku.co.id/manga/one-piece/" target="_blank" rel="noopener" aria-label="Share on WhatsApp">
                <div class="resp-sharing-button resp-sharing-button--whatsapp resp-sharing-button--large">
                    <div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--normal">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path stroke-width="1px" d="M20.1 3.9C17.9 1.7 15 .5 12 .5 5.8.5.7 5.6.7 11.9c0 2 .5 3.9 1.5 5.6L.6 23.4l6-1.6c1.6.9 3.5 1.3 5.4 1.3 6.3 0 11.4-5.1 11.4-11.4-.1-2.8-1.2-5.7-3.3-7.8zM12 21.4c-1.7 0-3.3-.5-4.8-1.3l-.4-.2-3.5 1 1-3.4L4 17c-1-1.5-1.4-3.2-1.4-5.1 0-5.2 4.2-9.4 9.4-9.4 2.5 0 4.9 1 6.7 2.8 1.8 1.8 2.8 4.2 2.8 6.7-.1 5.2-4.3 9.4-9.5 9.4zm5.1-7.1c-.3-.1-1.7-.9-1.9-1-.3-.1-.5-.1-.7.1-.2.3-.8 1-.9 1.1-.2.2-.3.2-.6.1s-1.2-.5-2.3-1.4c-.9-.8-1.4-1.7-1.6-2-.2-.3 0-.5.1-.6s.3-.3.4-.5c.2-.1.3-.3.4-.5.1-.2 0-.4 0-.5C10 9 9.3 7.6 9 7c-.1-.4-.4-.3-.5-.3h-.6s-.4.1-.7.3c-.3.3-1 1-1 2.4s1 2.8 1.1 3c.1.2 2 3.1 4.9 4.3.7.3 1.2.5 1.6.6.7.2 1.3.2 1.8.1.6-.1 1.7-.7 1.9-1.3.2-.7.2-1.2.2-1.3-.1-.3-.3-.4-.6-.5z"></path>
                        </svg>
                    </div>Share WhatsApp</div>
                </div>
            </a>
            <table class="chapter">
                <tbody class="_3Rsjq" data-test="chapter-table">
                    <tr>
                        <th class="judulseries">Chapter</th>
                        <th class="tanggalseries"> Tanggal Rilis</th>
                        <th class="tanggalseries">PDF</th>
                    </tr>

                    <!-- LOOPING CHAPTER -->
                    @foreach($chapterManga as $chapterMangaList)
                        <tr>
                            <td class="judulseries">
                                <a href="{{url('manga/'.$chapterMangaList->slug_manga.'/'.str_replace('.0', '', $chapterMangaList->episode_chapter))}}" title="{{$chapterMangaList->nama_manga}}{{ $chapterMangaList->judul_chapter}}" class="popunder"> 
                                    <span>{{$chapterMangaList->nama_manga}}</span> {{$chapterMangaList->judul_chapter}} 
                                </a>
                            </td>
                            <td class="tanggalseries">
                                <time class="post-date" datetime="2020-04-24T4:09:00+07:00">  
                                    {{ \Carbon\Carbon::parse($chapterMangaList->updated_at)->diffForHumans() }}  
                                </time>
                            </td>
                            <td class="tanggalseries dl"> 
                                <a href="#" rel="nofollow" >DL</a> 
                            </td>
                        </tr>
                    @endforeach
                    <!-- END LOOPING CHAPTER -->
                    
                </tbody>
            </table>
        </section>
        <!-- END CHAPTER -->

        <!-- KOMENTAR -->
        <section id="Komentar">
            <div class="brk1 brk2">
                <div class="nxt"> 115 Komentar <a href="https://komiku.co.id/manga/one-piece/?komentar" class="mre sd rd">Buat Komentar</a> </div>
                <div class="km">
                    <div class="nm"> Revin Rega </div>
                    <p class="is"> 978 manaaa woe... 😅 </p>
                </div>
                <div class="km">
                    <div class="nm"> yudha </div>
                    <p class="is"> sudah tgl 23 kok msh blom rilis juga </p>
                </div>
                <div class="km">
                    <div class="nm"> Hari subekti </div>
                    <p class="is"> tdk sabar liat pertarungannya hh~ </p>
                </div> <a href="https://komiku.co.id/manga/one-piece/?komentar" class="ak biru">Semua komentar »</a> </div>
        </section>
        <!-- END KOMENTAR -->

        <!-- SIDEBAR -->
        <aside>
            <h2> Mirip Komik {{$detailManga->nama_manga}} </h2>

            @foreach($similarManga as $similarMangaList)
                <div class="grd">
                    <a href="{{url('manga/'.$similarMangaList->slug_manga)}}" title="Komik {{$similarMangaList->nama_manga}}" class="popunder">
                        <div class="gmbr1">
                            <div class="vw hot"> 🔥 417 rb x </div> 
                            <img src="{{url('/storage/komik/background_detail/'.$similarMangaList->slug_manga.'.jpg')}}">
                            <div class="tpe1_inf"> <b>{{$similarMangaList->jenis_manga}}</b> {{$similarMangaList->konsep_cerita}} </div>
                        </div>
                        <h4> {{$similarMangaList->nama_manga}} </h4> </a>
                    <p>                            
                    {{ explode('</li>', explode('<ul class="rs"> <li>', str_replace('<ul class="rs"><li>', '<ul class="rs"> <li>', $similarMangaList->sinopsis))[1])[0] }}
                    </p>
                </div>
            @endforeach
        </aside>
        <!-- END SIDEBAR -->

    </article>
    <!-- END DETAIL MANGA -->

    <div class="subscribe"><a href="https://komiku.co.id/manga/one-piece/?ikuti" target="_blank" rel="nofollow noopenner">Subscribe</a></div>
@endsection