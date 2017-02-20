<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'supervisor',
            'display_name' => 'Superviseur',
            'description' => 'Agent chargé de la supervision générale'
        ]);

        DB::table('roles')->insert([
            'name' => 'desk-manager',
            'display_name' => 'Responsable accueil',
            'description' => 'Agent chargé de l\'accueil client et la location'
        ]);

        DB::table('roles')->insert([
            'name' => 'fleet-manager',
            'display_name' => 'Responsable du parc auto',
            'description' => 'Agent chargé du parc auto'
        ]);

        DB::table('roles')->insert([
            'name' => 'cashier',
            'display_name' => 'Caissière',
            'description' => 'Agent chargé de la caisse'
        ]);


    }
}
