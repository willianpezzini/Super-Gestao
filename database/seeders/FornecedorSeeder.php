<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Fornecedor;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //instanciando o objeto
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'Fornecedor 01';
        $fornecedor->site = 'fornecedor01.com.br';
        $fornecedor->uf = 'SC';
        $fornecedor->email = 'contato@fornecedor01.com.br';
        $fornecedor->save();

        //usando o método create
        // Fornecedor::create([
        //     'nome' => 'Fornecedor 02',
        //     'site' => 'fornecedor02.com.br',
        //     'uf' => 'PR',
        //     'email' => 'contato@fornecedor02.com.br'
        // ]);

        // //Usando o insert
        // DB::table('fornecedores')->insert([
        //     'nome' => 'Fornecedor 03',
        //     'site' => 'fornecedor03.com.br',
        //     'uf' => 'RS',
        //     'email' => 'contato@fornecedor03.com.br'
        // ]);
    }
}
