<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Message;


class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Message::updateOrCreate([
            'email' => 'carlos.gamboa@mundoweb.pe',
        ], [
            'full_name' => 'Carlos Gamboa',
            'phone' => '555-555-1234',
            'service_product' => 'Consultoría en ecommerce',
            'source' => 'Formulario web',
            'message' => 'Estoy interesado en desarrollar una tienda en línea para mi negocio de ropa. Necesito más información sobre sus servicios.',
            'status' => 1,
            'is_read' => 1,
            'comunication' => 'Email',
        ]);

        Message::updateOrCreate([
            'email' => 'laura.sanchez@mundoweb.pe',
        ], [
            'full_name' => 'Laura Sánchez',
            'phone' => '555-555-5678',
            'service_product' => 'Desarrollo de plataformas elearning',
            'source' => 'Recomendación',
            'message' => 'Me han recomendado sus servicios para crear una plataforma educativa. Quisiera saber cómo empezar.',
            'status' => 1,
            'is_read' => 0,
            'comunication' => 'Teléfono',
        ]);

        Message::updateOrCreate([
            'email' => 'miguel.lopez@mundoweb.pe',
        ], [
            'full_name' => 'Miguel López',
            'phone' => '555-555-9876',
            'service_product' => 'Landing page',
            'source' => 'Búsqueda en Google',
            'message' => 'Necesito una landing page atractiva para un producto que estoy lanzando. ¿Pueden ayudarme?',
            'status' => 1,
            'is_read' => 1,
            'comunication' => 'Email',
        ]);

        Message::updateOrCreate([
            'email' => 'andrea.morales@mundoweb.pe',
        ], [
            'full_name' => 'Andrea Morales',
            'phone' => '555-555-2345',
            'service_product' => 'Sistema de gestión',
            'source' => 'Redes sociales',
            'message' => 'He visto su anuncio en redes sociales. Estoy interesada en un sistema de gestión para mi empresa.',
            'status' => 1,
            'is_read' => 1,
            'comunication' => 'WhatsApp',
        ]);

        Message::updateOrCreate([
            'email' => 'juan.perez@mundoweb.pe',
        ], [
            'full_name' => 'Juan Pérez',
            'phone' => '555-555-4321',
            'service_product' => 'Aplicación móvil',
            'source' => 'Conferencia',
            'message' => 'Asistí a una conferencia donde mencionaron sus servicios. Estoy buscando desarrollar una aplicación móvil para mi negocio.',
            'status' => 1,
            'is_read' => 0,
            'comunication' => 'Teléfono',
        ]);

        Message::updateOrCreate([
            'email' => 'ana.rodriguez@mundoweb.pe',
        ], [
            'full_name' => 'Ana Rodríguez',
            'phone' => '555-555-8765',
            'service_product' => 'Rediseño de sitio web',
            'source' => 'Amigo',
            'message' => 'Un amigo me recomendó sus servicios para el rediseño de mi sitio web. Me gustaría saber más.',
            'status' => 1,
            'is_read' => 1,
            'comunication' => 'Email',
        ]);

        Message::updateOrCreate([
            'email' => 'oscar.martinez@mundoweb.pe',
        ], [
            'full_name' => 'Oscar Martínez',
            'phone' => '555-555-3456',
            'service_product' => 'Consultoría en IT',
            'source' => 'LinkedIn',
            'message' => 'He visto su perfil en LinkedIn. Estoy interesado en una consultoría en IT para optimizar los sistemas de mi empresa.',
            'status' => 1,
            'is_read' => 1,
            'comunication' => 'WhatsApp',
        ]);

        Message::updateOrCreate([
            'email' => 'maria.gonzalez@mundoweb.pe',
        ], [
            'full_name' => 'María González',
            'phone' => '555-555-6543',
            'service_product' => 'Desarrollo de ecommerce',
            'source' => 'Evento empresarial',
            'message' => 'Los conocí en un evento empresarial. Necesito un ecommerce para mi tienda de productos naturales.',
            'status' => 1,
            'is_read' => 0,
            'comunication' => 'Email',
        ]);

    }
}