<?php

namespace Database\Seeders;

use App\Models\Family;
use App\Models\Marriage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $family = Family::find(1);

        $family->people()->create([
            'gender' => 'male',
            'name' => 'Antonio Delfino Duarte',
            'bio' => 'Nascido por volta de 1860~1880, era vivo em 1928, quando do casamento de seu filho José Antonio Delfino com Conceição Batista Ferreira',
        ]);
        $family->people()->create([
            'gender' => 'female',
            'name' => 'Benedita Camargo Dutra',
            'bio' => 'Nascida por volta de 1860~1885, era viva em 1928, quando do casamento de seu filho José Antonio Delfino com Conceição Batista Ferreira',
        ]);
        $marriage = Marriage::insert([
            'person_one_id' => 1,
            'person_two_id' => 2,
        ]);
        $person = $family->people()->create([
            'gender' => 'male',
            'name' => 'José Antônio Delfino',
            'birth_day' => '1901-10-20',
            'bio' => 'Se casou com Conceição Batista Ferreira',
        ]);
        \App\Models\ChildrenParent::insert([
            'parent_id' => 1,
            'children_id' => $person->id,
        ]);
        \App\Models\ChildrenParent::insert([
            'parent_id' => 2,
            'children_id' => $person->id,
        ]);
        $family->people()->create([
            'gender' => 'male',
            'name' => 'Domingos Bastista Ferreira',
            'bio' => 'Nascido por volta de 1865~1890, era falecido em 1928, quando do casamento de sua filha Conceição Batista Ferreira com José Antonio Delfino',
        ]);
        $family->people()->create([
            'gender' => 'female',
            'name' => 'Dorcelina Adelia Ferreira',
            'bio' => 'Nascida por volta de 1875~1895, era viva em 1928, quando do casamento de sua filha Conceição Batista Ferreira com José Antonio Delfino',
        ]);
        $marriage = Marriage::insert([
            'person_one_id' => 4,
            'person_two_id' => 5,
        ]);
        $person = $family->people()->create([
            'gender' => 'female',
            'name' => 'Conceição Batista Ferreira',
            'birth_day' => '1910-08-10',
            'bio' => 'Se casou com José Antônio Delfino',
        ]);
        $marriage = Marriage::insert([
            'person_one_id' => 3,
            'person_two_id' => 6,
        ]);
        \App\Models\ChildrenParent::insert([
            'parent_id' => 4,
            'children_id' => $person->id,
        ]);
        \App\Models\ChildrenParent::insert([
            'parent_id' => 5,
            'children_id' => $person->id,
        ]);
        $person = $family->people()->create([
            'gender' => 'male',
            'name' => 'Pedro',
            'birth_day' => '1929-06-29',
        ]);
        \App\Models\ChildrenParent::insert([
            'parent_id' => 3,
            'children_id' => $person->id,
        ]);
        \App\Models\ChildrenParent::insert([
            'parent_id' => 6,
            'children_id' => $person->id,
        ]);
        $person = $family->people()->create([
            'gender' => 'male',
            'name' => 'Antonio',
        ]);
        \App\Models\ChildrenParent::insert([
            'parent_id' => 3,
            'children_id' => $person->id,
        ]);
        \App\Models\ChildrenParent::insert([
            'parent_id' => 6,
            'children_id' => $person->id,
        ]);
        $person = $family->people()->create([
            'gender' => 'female',
            'name' => 'Dorcelina',
            'nick_name' => 'Fiinha',
            'birth_day' => '1933-09-05',
        ]);
        \App\Models\ChildrenParent::insert([
            'parent_id' => 3,
            'children_id' => $person->id,
        ]);
        \App\Models\ChildrenParent::insert([
            'parent_id' => 6,
            'children_id' => $person->id,
        ]);
        $person = $family->people()->create([
            'gender' => 'male',
            'name' => 'Marçal',
            'birth_day' => '1935-06-30',
        ]);
        \App\Models\ChildrenParent::insert([
            'parent_id' => 3,
            'children_id' => $person->id,
        ]);
        \App\Models\ChildrenParent::insert([
            'parent_id' => 6,
            'children_id' => $person->id,
        ]);
        $person = $family->people()->create([
            'gender' => 'male',
            'name' => 'Benedito',
            'nick_name' => 'Nem',
        ]);
        \App\Models\ChildrenParent::insert([
            'parent_id' => 3,
            'children_id' => $person->id,
        ]);
        \App\Models\ChildrenParent::insert([
            'parent_id' => 6,
            'children_id' => $person->id,
        ]);
        $pai = $person = $family->people()->create([
            'gender' => 'male',
            'name' => 'Marcílio Delfino Duarte',
            'nick_name' => 'Marcílio',
            'birth_day' => '1940-07-01',
            'birth_place' => 'Pirenópolis',
        ]);
        \App\Models\ChildrenParent::insert([
            'parent_id' => 3,
            'children_id' => $pai->id,
        ]);
        \App\Models\ChildrenParent::insert([
            'parent_id' => 6,
            'children_id' => $pai->id,
        ]);
        $mae = $person = $family->people()->create([
            'gender' => 'female',
            'name' => 'Benedita Luz Almeida Delfino',
            'nick_name' => 'Lúzia',
            'birth_day' => '1944-08-12',
            'birth_place' => 'Mossâmedes',
        ]);
        $marriage = Marriage::insert([
            'person_one_id' => $pai->id,
            'person_two_id' => $mae->id,
        ]);
        $person = $family->people()->create([
            'gender' => 'male',
            'name' => 'Vicente',
        ]);
        \App\Models\ChildrenParent::insert([
            'parent_id' => 3,
            'children_id' => $person->id,
        ]);
        \App\Models\ChildrenParent::insert([
            'parent_id' => 6,
            'children_id' => $person->id,
        ]);
        $person = $family->people()->create([
            'gender' => 'female',
            'name' => 'Aparecida',
        ]);
        \App\Models\ChildrenParent::insert([
            'parent_id' => 3,
            'children_id' => $person->id,
        ]);
        \App\Models\ChildrenParent::insert([
            'parent_id' => 6,
            'children_id' => $person->id,
        ]);
        $person = $family->people()->create([
            'gender' => 'female',
            'name' => 'Conceição',
            'nick_name' => 'Dorora',
        ]);
        \App\Models\ChildrenParent::insert([
            'parent_id' => 3,
            'children_id' => $person->id,
        ]);
        \App\Models\ChildrenParent::insert([
            'parent_id' => 6,
            'children_id' => $person->id,
        ]);
        $person = $family->people()->create([
            'gender' => 'male',
            'name' => 'José Delfino Duarte',
        ]);
        \App\Models\ChildrenParent::insert([
            'parent_id' => 3,
            'children_id' => $person->id,
        ]);
        \App\Models\ChildrenParent::insert([
            'parent_id' => 6,
            'children_id' => $person->id,
        ]);
        $person = $family->people()->create([
            'gender' => 'male',
            'name' => 'Marcílio Delfino Duarte Júnior',
            'nick_name' => 'Marcílio Jr',
            'birth_day' => '1964-12-17',
            'birth_place' => 'Novo Hamburgo',
        ]);
        \App\Models\ChildrenParent::insert([
            'parent_id' => $pai->id,
            'children_id' => $person->id,
        ]);
        \App\Models\ChildrenParent::insert([
            'parent_id' => $mae->id,
            'children_id' => $person->id,
        ]);
        $person2 = $family->people()->create([
            'gender' => 'female',
            'name' => 'Ana Helena da Silva Delfino Duarte',
            'nick_name' => 'Aninha',
            'birth_day' => '1961-07-17',
            'birth_place' => 'São Francisco de Sales',
        ]);
        $marriage = Marriage::insert([
            'person_one_id' => $person->id,
            'person_two_id' => $person2->id,
        ]);
        $filho = $family->people()->create([
            'gender' => 'female',
            'name' => 'Mariana Borges da Silva Delfino Duarte',
            'nick_name' => 'Mari',
            'birth_day' => '1986-05-12',
            'birth_place' => 'Curitiba',
        ]);
        \App\Models\ChildrenParent::insert([
            'parent_id' => $person->id,
            'children_id' => $filho->id,
        ]);
        \App\Models\ChildrenParent::insert([
            'parent_id' => $person2->id,
            'children_id' => $filho->id,
        ]);
        $person = $family->people()->create([
            'gender' => 'male',
            'name' => 'Péricles Almeida Delfino Duarte',
            'nick_name' => 'Péricles',
            'birth_day' => '1969-02-04',
            'birth_place' => 'Goianésia',
        ]);
        \App\Models\ChildrenParent::insert([
            'parent_id' => $pai->id,
            'children_id' => $person->id,
        ]);
        \App\Models\ChildrenParent::insert([
            'parent_id' => $mae->id,
            'children_id' => $person->id,
        ]);
        $person2 = $family->people()->create([
            'gender' => 'female',
            'name' => 'Silvana Triló Duarte',
            'nick_name' => 'Silvana',
            'birth_place' => 'Cascavel',
        ]);
        $marriage = Marriage::insert([
            'person_one_id' => $person->id,
            'person_two_id' => $person2->id,
        ]);
        $filho = $family->people()->create([
            'gender' => 'female',
            'name' => 'Ana Clara Triló Duarte',
            'nick_name' => 'Ana Clara',
            'birth_place' => 'Cascavel',
        ]);
        \App\Models\ChildrenParent::insert([
            'parent_id' => $person->id,
            'children_id' => $filho->id,
        ]);
        \App\Models\ChildrenParent::insert([
            'parent_id' => $person2->id,
            'children_id' => $filho->id,
        ]);
        $filho = $family->people()->create([
            'gender' => 'male',
            'name' => 'Arthur Triló Duarte',
            'nick_name' => 'Arthur',
            'birth_place' => 'Cascavel',
        ]);
        \App\Models\ChildrenParent::insert([
            'parent_id' => $person->id,
            'children_id' => $filho->id,
        ]);
        \App\Models\ChildrenParent::insert([
            'parent_id' => $person2->id,
            'children_id' => $filho->id,
        ]);
        $person = $family->people()->create([
            'gender' => 'male',
            'name' => 'Sócrates Luiz Delfino Duarte',
            'nick_name' => 'Sócrates',
            'birth_day' => '1972-02-08',
            'birth_place' => 'Goianésia',
        ]);
        \App\Models\ChildrenParent::insert([
            'parent_id' => $pai->id,
            'children_id' => $person->id,
        ]);
        \App\Models\ChildrenParent::insert([
            'parent_id' => $mae->id,
            'children_id' => $person->id,
        ]);
        $person2 = $family->people()->create([
            'gender' => 'female',
            'name' => 'Ana Paula Fernandes',
            'nick_name' => 'Ana Paula',
            'birth_day' => '1975-05-14',
            'birth_place' => 'Uberlândia',
        ]);
        $marriage = Marriage::insert([
            'person_one_id' => $person->id,
            'person_two_id' => $person2->id,
        ]);
        $person = $family->people()->create([
            'gender' => 'female',
            'name' => 'Mariluz Almeida Delfino Duarte',
            'nick_name' => 'Mariluz',
            'birth_day' => '1976-07-03',
            'birth_place' => 'Goianésia',
        ]);
        \App\Models\ChildrenParent::insert([
            'parent_id' => $pai->id,
            'children_id' => $person->id,
        ]);
        \App\Models\ChildrenParent::insert([
            'parent_id' => $mae->id,
            'children_id' => $person->id,
        ]);
        $person2 = $family->people()->create([
            'gender' => 'male',
            'name' => 'Blascko Alarcon',
            'nick_name' => 'Blascko',
            'birth_place' => 'Cachoeira Paulista',
        ]);
        $marriage = Marriage::insert([
            'person_one_id' => $person2->id,
            'person_two_id' => $person->id
        ]);
        $filho = $family->people()->create([
            'gender' => 'male',
            'name' => 'Victor Duarte Alarcon',
            'nick_name' => 'Victor',
            'birth_place' => 'Goianésia',
        ]);
        \App\Models\ChildrenParent::insert([
            'parent_id' => $person2->id,
            'children_id' => $filho->id,
        ]);
        \App\Models\ChildrenParent::insert([
            'parent_id' => $person->id,
            'children_id' => $filho->id,
        ]);
        $filho = $family->people()->create([
            'gender' => 'male',
            'name' => 'Miguel Duarte Alarcon',
            'nick_name' => 'Miguel',
            'birth_place' => 'Goianésia',
        ]);
        \App\Models\ChildrenParent::insert([
            'parent_id' => $person2->id,
            'children_id' => $filho->id,
        ]);
        \App\Models\ChildrenParent::insert([
            'parent_id' => $person->id,
            'children_id' => $filho->id,
        ]);
        $filho = $family->people()->create([
            'gender' => 'male',
            'name' => 'Vinícius Duarte Alarcon',
            'nick_name' => 'Vinícius',
            'birth_place' => 'Goianésia',
        ]);
        \App\Models\ChildrenParent::insert([
            'parent_id' => $person2->id,
            'children_id' => $filho->id,
        ]);
        \App\Models\ChildrenParent::insert([
            'parent_id' => $person->id,
            'children_id' => $filho->id,
        ]);
    }
}
