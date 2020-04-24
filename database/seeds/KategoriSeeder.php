<?php

use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategori')->insert([
                                        ['nama_kategori' => 'Action','slug_kategori' => 'action'],
                                        ['nama_kategori' => 'Adventure','slug_kategori' => 'adventure'],
                                        ['nama_kategori' => 'Comedy','slug_kategori' => 'comedy'],
                                        ['nama_kategori' => 'Cooking','slug_kategori' => 'cooking'],
                                        ['nama_kategori' => 'Crime','slug_kategori' => 'crime'],
                                        ['nama_kategori' => 'cultivation','slug_kategori' => 'cultivation'],
                                        ['nama_kategori' => 'Demons','slug_kategori' => 'demons'],
                                        ['nama_kategori' => 'Drama','slug_kategori' => 'drama'],
                                        ['nama_kategori' => 'Ecchi','slug_kategori' => 'ecchi'],
                                        ['nama_kategori' => 'Fantasy','slug_kategori' => 'fantasy'],
                                        ['nama_kategori' => 'Fechippuru ~ bokura no junsuina koi','slug_kategori' => 'fechippuru-bokura-no-junsuina-koi'],
                                        ['nama_kategori' => 'Game','slug_kategori' => 'game'],
                                        ['nama_kategori' => 'Gender Bender','slug_kategori' => 'gender-bender'],
                                        ['nama_kategori' => 'Goblin Slayer Gaiden: Year One','slug_kategori' => 'goblin-slayer-gaiden-year-one'],
                                        ['nama_kategori' => 'gore','slug_kategori' => 'gore'],
                                        ['nama_kategori' => 'Harem','slug_kategori' => 'harem'],
                                        ['nama_kategori' => 'Historical','slug_kategori' => 'historical'],
                                        ['nama_kategori' => 'Horror','slug_kategori' => 'horror'],
                                        ['nama_kategori' => 'Isekai','slug_kategori' => 'isekai'],
                                        ['nama_kategori' => 'Josei','slug_kategori' => 'josei'],
                                        ['nama_kategori' => 'Lamia Orphe Is Dead','slug_kategori' => 'lamia-orphe-is-dead'],
                                        ['nama_kategori' => 'Magic','slug_kategori' => 'magic'],
                                        ['nama_kategori' => 'Manhua','slug_kategori' => 'manhua'],
                                        ['nama_kategori' => 'Manhwa','slug_kategori' => 'manhwa'],
                                        ['nama_kategori' => 'Martial Art','slug_kategori' => 'martial-art'],
                                        ['nama_kategori' => 'Martial Arts','slug_kategori' => 'martial-arts'],
                                        ['nama_kategori' => 'Mature','slug_kategori' => 'mature'],
                                        ['nama_kategori' => 'Mecha','slug_kategori' => 'mecha'],
                                        ['nama_kategori' => 'Medical','slug_kategori' => 'medical'],
                                        ['nama_kategori' => 'Military','slug_kategori' => 'military'],
                                        ['nama_kategori' => 'Mistery','slug_kategori' => 'mistery'],
                                        ['nama_kategori' => 'Music','slug_kategori' => 'music'],
                                        ['nama_kategori' => 'Mystery','slug_kategori' => 'mystery'],
                                        ['nama_kategori' => 'One Shot','slug_kategori' => 'one-shot'],
                                        ['nama_kategori' => 'Parodi','slug_kategori' => 'parodi'],
                                        ['nama_kategori' => 'Police','slug_kategori' => 'police'],
                                        ['nama_kategori' => 'Psychological','slug_kategori' => 'psychological'],
                                        ['nama_kategori' => 'Reincarnation','slug_kategori' => 'reincarnation'],
                                        ['nama_kategori' => 'Romance','slug_kategori' => 'romance'],
                                        ['nama_kategori' => 'School','slug_kategori' => 'school'],
                                        ['nama_kategori' => 'School life','slug_kategori' => 'school-life'],
                                        ['nama_kategori' => 'school of life','slug_kategori' => 'school-of-life'],
                                        ['nama_kategori' => 'Sci-fi','slug_kategori' => 'sci-fi'],
                                        ['nama_kategori' => 'Seinen','slug_kategori' => 'seinen'],
                                        ['nama_kategori' => 'Shotacon','slug_kategori' => 'shotacon'],
                                        ['nama_kategori' => 'Shoujo','slug_kategori' => 'shoujo'],
                                        ['nama_kategori' => 'Shoujo Ai','slug_kategori' => 'shoujo-ai'],
                                        ['nama_kategori' => 'Shounen','slug_kategori' => 'shounen'],
                                        ['nama_kategori' => 'Slice of Life','slug_kategori' => 'slice-of-life'],
                                        ['nama_kategori' => 'Sport','slug_kategori' => 'sport'],
                                        ['nama_kategori' => 'Sports','slug_kategori' => 'sports'],
                                        ['nama_kategori' => 'Super Power','slug_kategori' => 'super-power'],
                                        ['nama_kategori' => 'Supernatural','slug_kategori' => 'supernatural'],
                                        ['nama_kategori' => 'Tensei Ouji wa Daraketai','slug_kategori' => 'tensei-ouji-wa-daraketai'],
                                        ['nama_kategori' => 'Thriller','slug_kategori' => 'thriller'],
                                        ['nama_kategori' => 'Tragedy','slug_kategori' => 'tragedy'],
                                        ['nama_kategori' => 'Urban','slug_kategori' => 'urban'],
                                        ['nama_kategori' => 'Vampire','slug_kategori' => 'vampire'],
                                        ['nama_kategori' => 'Webtoon','slug_kategori' => 'webtoon'],
                                        ['nama_kategori' => 'Webtoons','slug_kategori' => 'webtoons'],
                                        ['nama_kategori' => 'Yuri','slug_kategori' => 'yuri'],
                                    ]);
    }
}
