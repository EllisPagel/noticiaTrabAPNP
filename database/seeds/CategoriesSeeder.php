<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        DB::table('categories')->insert([
            ['name' => 'Esporte', 'description' => 'Jogos, resultados e tudo sobre esporte', 'active' => 1],
            ['name' => 'Tecnologia', 'description' => 'Tudo sobre a incível tecnologia', 'active' => 1],
            ['name' => 'Saúde', 'description' => 'Saúde é o que interessa o resto não tem pressa', 'active' => 1],
            ['name' => 'Política', 'description' => 'Políticos, roubos e muito mais', 'active' => 0],
            ['name' => 'Economia', 'description' => 'Economia do seu país', 'active' => 1],
            ['name' => 'Educação', 'description' => 'A educação nas escolas', 'active' => 0],
            ['name' => 'Outros', 'description' => 'Outras categorias', 'active' => 1]
        ]);
    }
}
