@extends('layouts.layout')
@section('konten')
    <section style="margin-bottom:0px;border-top:0;width:calc(100% - 30px)">
        <h1> Komik Genre {{$detailKategoriManga[0]->nama_kategori}} </h1>
        <p class="top1"> Baca komik dengan Genre Cooking terlengkap bahasa Indonesia. Di Komiku kalian bisa membaca Manga Genre Cooking terbaru. </p>
        <!-- <div class="filter">
            <p> Tampilkan berdasarkan jenis komik: </p>
            <form class="filer2" action="">
                <select name="orderby" id="filter" class="formfiler">
                    <option class="level-1" value="0">Baru ditambahkan</option>
                    <option class="level-1" value="meta_value_num"> Terpopuler</option>
                    <option class="level-1" value="modified"> Update Terbaru</option>
                </select>
                <select name="category_name" id="filter" class="formfiler">
                    <option class="level-1" value="0">Komik (Semua)</option>
                    <option class="level-1" value="manga"> Manga (Jepang)</option>
                    <option class="level-1" value="manhua"> Manhua (China)</option>
                    <option class="level-1" value="manhwa"> Manhwa (Korea)</option>
                </select>
                <input class="filter3" value="Filter" type="submit"> </form>
        </div> -->
        
        <div class="daftar">

            <!-- LOOPING DETAIL GENRE -->
            @foreach($detailKategoriManga as $detailKategoriMangaList)
            <div class="bge">
                <a href="{{url('manga/'.$detailKategoriMangaList->slug_manga)}}" class="popunder">
                    <div class="bgei">
                        <div class="vw Rekomendasi"> Rekomendasi</div> 
                        <img src="{{url('/storage/komik/background_detail/'.$detailKategoriMangaList->slug_manga.'.jpg')}}" class="sd rd">
                        <div class="tpe1_inf"> <b>{{$detailKategoriMangaList->jenis_manga}}</b> {{$detailKategoriMangaList->konsep_cerita}} </div>
                    </div>
                    <div class="kan">
                        <h3> {{$detailKategoriMangaList->nama_manga}} </h3> <span>{{$detailKategoriMangaList->views}} x • 4 minggu lalu</span>
                        <p> Mukouda dulunya adalah seorang pegawai gaji sampai ia dipanggil secara tidak sengaja ke dunia fantasi. </p>
                    </div>
                </a>
            </div>
            @endforeach
            <!-- END LOOPING -->

        </div>
    </section>
@endsection