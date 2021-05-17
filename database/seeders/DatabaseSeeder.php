<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
        	[
        		'role'=>'admin'
        		,'name'=> 'demo admin'
        		,'email'=>'admin@admin.com'
        		,'password'=>bcrypt('12345678')
        	]
        );

        $id_contributor =  DB::table('users')->insertGetId(
        	[
        		'role'=>'contributor'
        		,'name'=> 'demo contributor'
        		,'email'=>'contributor@contributor.com'
        		,'password'=>bcrypt('12345678')
        	]
        );

         DB::table('bansos_contributors')->insert(
        	[
        		'user_id'=>$id_contributor
        		,'name_contributor'=>'Demo Contributor'
        		,'phone_contributor'=>'085608014111'
        		,'address_contributor'=>'Pohgading Putih Pasrepan Pasuruan Jawa Timur Kode Pos 67175'
        	]
        );

         DB::table('bansos_receivers')->insert(
        	[
        		'code_receiver'=>'Belum ada penerima'
        		,'name_receiver'=>'Belum ada penerima'
        		,'phone_receiver'=>'Belum ada penerima'
        		,'address_receiver'=>'Belum ada penerima'
        	]
        );
    }
}
