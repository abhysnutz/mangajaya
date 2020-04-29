@extends('layouts.layout')
@section('konten')
    <section style="margin-bottom:0px;border-top:0;width:calc(100% - 30px);border-radius:0">
        <h1>
            Baca Komik Terbaru
        </h1>
        <!-- FILTER JENIS MANGA -->
        <div class="filter" style="margin:0;margin-bottom: 30px">
            <p> Filter berdasarkan manga, manhwa, atau manhua? Bisa kalian pilih di bawah ini: </p>
            <form class="filer2" action="#">
                <select id="filter" class="formfiler" onchange="linkFilter(this.value)">
                    <option <?php echo (Request::segment(3) == null ? 'selected' : ''); ?> class="level-1" value="{{url('manga')}}">Default (Manga, Manhua, Manhwa)</option>
                    <option <?php echo (Request::segment(3) == 'manga' ? 'selected' : ''); ?> class="level-1" value="{{url('manga/kategori/manga')}}">Manga</option>
                    <option <?php echo (Request::segment(3) == 'manhua' ? 'selected' : ''); ?> class="level-1" value="{{url('manga/kategori/manhua')}}">Manhua (China)</option>
                    <option <?php echo (Request::segment(3) == 'manhwa' ? 'selected' : ''); ?> class="level-1" value="{{url('manga/kategori/manhwa')}}">Manhwa (Korea)</option>
                </select>
            </form>
            <a href="#" id="abc">
                <input type="submit" class="filter3" value="Filter"> 
            </a>
        </div>
        <!-- END FILTER JENIS MANGA -->

        <div class="daftar">
            
            <!-- LOOPING NEW MANGA -->
            @foreach($manga as $mangaList)
                <div class="bge">
                    <div class="bgei">
                        <a href="{{url('manga/'.$mangaList->slug_manga)}}" class="popunder">
                            @if($mangaList->hot == 1 || $mangaList->rekomendasi == 1)
                                <div class="vw @if($mangaList->berwarna == 1) Berwarna @endif @if($mangaList->hot == 1) Hot @endif @if($mangaList->rekomendasi == 1) Rekomendasi @endif"> 
                                    @if($mangaList->hot == 1) Hot @endif 
                                    @if($mangaList->rekomendasi == 1) Rekomendasi @endif
                                </div>
                            @endif
                            <img src="{{url('/storage/komik/background_detail/'.$mangaList->slug_manga.'.jpg')}}" class="sd rd">
                            <div class="tpe1_inf">
                                <b>{{$mangaList->jenis_manga}}</b> {{$mangaList->konsep_cerita}} 
                            </div>
                        </a>
                    </div>
                    <div class="kan">
                        <a href="{{url('manga/'.$mangaList->slug_manga)}}" class="popunder">
                            <h3> {{$mangaList->nama_manga}} </h3>
                        </a>
                        <span>
                            {{$mangaList->views}} x • 
                            {{ \Carbon\Carbon::parse($mangaList->created_at)->diffForHumans() }}
                            @if($mangaList->berwarna == 1) Berwarna @endif
                        </span>

                        <!-- SINOPSIS SINGKAT -->
                        <p>
                            {{ explode('</li>', explode('<ul class="rs"> <li>', str_replace('<ul class="rs"><li>', '<ul class="rs"> <li>', $mangaList->sinopsis))[1])[0] }}
                        </p>
                           
                        <div class="mree">
                            <a href="{{url('manga/'.$mangaList->slug_manga.'/'.str_replace('.0', '', $mangaList->episode_chapter))}}" class="mla rd popunder">
                                {{$mangaList->judul_chapter}}
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
            <!-- END LOOPING NEW MANGA -->

            <!-- PAGINATION -->
            <div class="loop-nav pag-nav">
                <div class="loop-nav-inner">
                    <span class="prev">« Halaman sebelumnya</span>
                    <a rel="nofollow" class="next popunder" href="https://komiku.co.id/manga/page/2/">Halaman selanjutnya »</a>
                </div>
            </div>
            <!-- END PAGINATION -->
        </div>
    </section>
@endsection