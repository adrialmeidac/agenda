<?php
namespace Tests\Feature;
use Tests\TestCase;
use App\Models\Cita;
use App\Http\Controllers\ContactoController;
use Illuminate\Foundation\Testing\RefreshDatabase;



class ModeloCitaTest extends TestCase
{
    public function test_existe_el_modelo_de_citas()
    {
        $this->assertTrue(class_exists(Cita::class));
        $cita = new Cita();
        $this->assertInstanceOf(Cita::class, $cita);
    }
}

class ControladorContactoTest extends TestCase
{
    public function test_existe_el_controlador_de_contactos()
    {
        $this->assertTrue(class_exists(ContactoController::class));
        $controller = new ContactoController();
        $this->assertInstanceOf(ContactoController::class, $controller);
    }
}


class OrdenCitasTest extends TestCase
{
    use RefreshDatabase;

    public function test_devuelve_las_citas_en_orden_descendente_por_fecha_de_creacion()
    {
        $cita1 = Cita::factory()->create(['created_at' => now()->subDays(3)]);
        $cita2 = Cita::factory()->create(['created_at' => now()->subDays(2)]);
        $cita3 = Cita::factory()->create(['created_at' => now()->subDay()]);

        $response = $this->get('/citas');

        $response->assertStatus(200);

        $json = $response->json();

        $this->assertEquals($cita3->id, $json[0]['id']);
        $this->assertEquals($cita2->id, $json[1]['id']);
        $this->assertEquals($cita1->id, $json[2]['id']);
    }
}
