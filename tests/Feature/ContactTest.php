<?php

namespace Tests\Feature;

use App\Models\Contact; // Importa el modelo Contact para interactuar con la base de datos
use Illuminate\Foundation\Testing\RefreshDatabase; // Permite limpiar la base de datos después de cada prueba
use Tests\TestCase;

class ContactTest extends TestCase
{
    use RefreshDatabase;

    // Prueba para verificar si se puede crear un contacto
    public function test_can_create_contact()
    {
        // Envía una solicitud POST a la ruta /contacts con datos de un nuevo contacto
        $response = $this->post('/contacts', [
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'phone' => '123456789',
        ]);

        // Verifica que después de crear el contacto, se redirige a la ruta /contacts
        $response->assertRedirect('/contacts');

        // Comprueba que el contacto con los datos proporcionados existe en la base de datos
        $this->assertDatabaseHas('contacts', ['name' => 'John Doe']);
    }

    // Prueba para verificar si se puede actualizar un contacto existente
    public function test_can_update_contact()
    {
        // Crea un contacto directamente en la base de datos
        $contact = Contact::create([
            'name' => 'Jane Doe',
            'email' => 'janedoe@example.com',
            'phone' => '987654321',
        ]);

        // Envía una solicitud PUT para actualizar el contacto con nuevos datos
        $response = $this->put("/contacts/{$contact->id}", [
            'name' => 'Jane Smith', // Cambia el nombre del contacto
            'email' => 'janesmith@example.com', // Cambia el correo electrónico
            'phone' => '987654321', // Conserva el mismo número de teléfono
        ]);

        // Verifica que después de actualizar el contacto, se redirige a la ruta /contacts
        $response->assertRedirect('/contacts');

        // Comprueba que los datos actualizados del contacto están presentes en la base de datos
        $this->assertDatabaseHas('contacts', ['name' => 'Jane Smith']);
    }

    // Prueba para verificar si se puede eliminar un contacto existente
    public function test_can_delete_contact()
    {
        // Crea un contacto directamente en la base de datos
        $contact = Contact::create([
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'phone' => '123456789',
        ]);

        // Envía una solicitud DELETE para eliminar el contacto
        $response = $this->delete("/contacts/{$contact->id}");

        // Verifica que después de eliminar el contacto, se redirige a la ruta /contacts
        $response->assertRedirect('/contacts');

        // Comprueba que el contacto eliminado ya no está presente en la base de datos
        $this->assertDatabaseMissing('contacts', ['name' => 'John Doe']);
    }
}

