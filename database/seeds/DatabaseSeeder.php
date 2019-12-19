<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->call(ConfiguresTableSeeder::class);
        $this->call(ConfiguresRecepTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(TipoServiciosTableSeeder::class);
        $this->call(ServiciosTableSeeder::class);
        $this->call(ItemsTableSeeder::class);
        $this->call(ProveedoresTableSeeder::class);
        $this->call(CostosTableSeeder::class);
        $this->call(TipoLocalesTableSeeder::class);
        $this->call(LocalesTableSeeder::class);
        $this->call(TipoEventosTableSeeder::class);
        $this->call(TipoComitesTableSeeder::class);
        $this->call(ComitesTableSeeder::class);
        $this->call(ClientesTableSeeder::class);
        $this->call(CotizacionesTableSeeder::class);
        $this->call(CotizacionCostosTableSeeder::class);
        $this->call(EventosTableSeeder::class);
        $this->call(PagosTableSeeder::class);
        $this->call(TipoTareasTableSeeder::class);
        $this->call(TareasTableSeeder::class);




        Model::reguard();
    }
}
