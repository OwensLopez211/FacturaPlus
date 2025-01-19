<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->id(); // ID único para cada empresa
            $table->string('nombre')->unique(); // Nombre de la empresa
            $table->string('razon_social')->nullable(); // Razón social
            $table->string('rut')->unique(); // RUT de la empresa (Formato: 12345678-9)
            $table->string('direccion')->nullable(); // Dirección principal
            $table->string('ciudad')->nullable(); // Ciudad de la empresa
            $table->string('region')->nullable(); // Región de la empresa
            $table->string('codigo_postal')->nullable(); // Código postal
            $table->string('telefono')->nullable(); // Teléfono de contacto
            $table->string('email_contacto')->nullable(); // Email de contacto principal
            $table->string('logo')->nullable(); // URL o ruta del logo de la empresa
            $table->string('website')->nullable(); // Sitio web de la empresa
            $table->string('giro')->nullable(); // Giro comercial de la empresa
            $table->boolean('activa')->default(true); // Estado de la empresa (activa/inactiva)
            $table->date('fecha_inicio')->nullable(); // Fecha de inicio de operaciones
            $table->json('configuracion')->nullable(); // Configuración personalizada (JSON)
        
            // Información relacionada con facturación electrónica (SII - Servicio de Impuestos Internos)
            $table->string('certificado_digital')->nullable(); // Ruta o identificador del certificado digital
            $table->string('clave_certificado')->nullable(); // Clave del certificado digital
            $table->boolean('facturacion_electronica')->default(false); // ¿Habilitada para facturación electrónica?
        
            // Control de timestamps
            $table->timestamps(); // created_at y updated_at
            $table->softDeletes(); // deleted_at para soporte de eliminaciones suaves
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empresas');
    }
};
