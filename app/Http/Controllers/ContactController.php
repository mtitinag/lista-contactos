<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // Método para listar todos los contactos
    public function index()
    {
        $contacts = Contact::paginate(10); // Obtener 10 contactos por página
        return view('contacts.index', compact('contacts'));
    }


    // Método para mostrar el formulario de creación de un nuevo contacto
    public function create()
    {
        return view('contacts.create');
    }

    // Método para guardar un nuevo contacto en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        Contact::create($request->all());

        return redirect()->route('contacts.index')->with('success', '¡Contacto creado correctamente!');
    }

    // Método para mostrar el formulario de edición de un contacto específico
    public function edit(Contact $contact)
    {
        return view('contacts.edit', compact('contact'));
    }

    // Método para actualizar un contacto existente en la base de datos
    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        $contact->update($request->all());

        return redirect()->route('contacts.index')->with('success', '¡Contacto actualizado correctamente!');
    }

    // Método para eliminar un contacto existente
    // Método para eliminar un contacto
    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);

        // Eliminar el contacto
        $contact->delete();

        // Redirigir con mensaje de éxito de eliminación
        return redirect()->route('contacts.index')->with('deleted', '¡Contacto eliminado correctamente!');
    }

}