@extends('layouts.layout')
@section('konten')
    
    <section style="margin-bottom:0px;border-top:0;width:calc(100% - 30px)">
        <h1> Daftar Komik </h1>
        <div class="nav_apb"> <a href="#%23">#</a> <a href="#A">A</a> <a href="#B">B</a> <a href="#C">C</a> <a href="#D">D</a> <a href="#E">E</a> <a href="#F">F</a> <a href="#G">G</a> <a href="#H">H</a> <a href="#I">I</a> <a href="#J">J</a> <a href="#K">K</a> <a href="#L">L</a> <a href="#M">M</a> <a href="#N">N</a> <a href="#O">O</a> <a href="#P">P</a> <a href="#Q">Q</a> <a href="#R">R</a> <a href="#S">S</a> <a href="#T">T</a> <a href="#U">U</a> <a href="#V">V</a> <a href="#W">W</a> <a href="#X">X</a> <a href="#Y">Y</a> <a href="#Z">Z</a>
            <div class="clear"></div>
        </div>

        <!-- FILTER JENIS MANGA -->
        <div class="filter" style="margin:0;margin-bottom: 30px">
            <p> Filter berdasarkan manga, manhwa, atau manhua? Bisa kalian pilih di bawah ini: </p>
            <form class="filer2" action="#">
                <select id="filter" class="formfiler" onchange="linkFilter(this.value)">
                    <option <?php echo (Request::segment(3) == null ? 'selected' : ''); ?> class="level-1" value="{{url('daftar-komik')}}">Default (Manga, Manhua, Manhwa)</option>
                    <option <?php echo (Request::segment(3) == 'manga' ? 'selected' : ''); ?> class="level-1" value="{{url('daftar-komik/kategori/manga')}}">Manga</option>
                    <option <?php echo (Request::segment(3) == 'manhua' ? 'selected' : ''); ?> class="level-1" value="{{url('daftar-komik/kategori/manhua')}}">Manhua (China)</option>
                    <option <?php echo (Request::segment(3) == 'manhwa' ? 'selected' : ''); ?> class="level-1" value="{{url('daftar-komik/kategori/manhwa')}}">Manhwa (Korea)</option>
                </select>
            </form>
            <a href="#" id="abc">
                <input type="submit" class="filter3" value="Filter" style="position: relative; top: -9px;"> 
            </a>
        </div>
        <!-- END FILTER JENIS MANGA -->


        <div id="animelist">
            <div id="a-z">
                
                <!-- LOOPING CHAR-->
                @foreach($char as $key => $charList)
                <ol>
                    <div class="letter-cell"><a name="{{$charList}}">{{$charList}}</a></div>
                    <div class="row-cells"> </div>

                    <!-- LOOPING MANGA -->
                    @foreach($manga[$key] as $mangaList)
                    <div class="row-cells">
                        <li class="ranking1">
                            <a href="{{url('manga/'.$mangaList->slug_manga)}}" title="Komik {{$mangaList->nama_manga}}"> 
                            <img src="{{url('/storage/komik/sampul_detail/'.$mangaList->slug_manga.'.jpg')}}" alt="Komik {{$mangaList->nama_manga}}">
                                <h4> {{$mangaList->nama_manga}} </h4>
                                <div class="kategori">{{$mangaList->jenis_manga}} {{$mangaList->konsep_cerita}} </div>
                            </a>
                        </li>
                    </div>
                    @endforeach
                    <!-- END LOOPING MANGA -->

                </ol>
                @endforeach
                <!-- END LOOPING CHAR -->
                
            </div>
        </div>
    </section>
    <div style="clear:both;"></div>

@endsection