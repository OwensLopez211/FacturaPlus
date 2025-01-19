<template>
  <header class="bg-white p-4 flex justify-between items-center rounded-md shadow-sm">
    <!-- Logo y Nombre -->
    <div class="flex items-center gap-2">
      <span class="text-xl font-medium text-gray-700">Factura+</span>
    </div>

    <!-- Menú central -->
    <nav class="flex flex-grow justify-center gap-6 text-gray-600">
      <router-link to="/about" class="menu-link">Acerca de</router-link>
      <router-link to="/features" class="menu-link">Características</router-link>
      <router-link to="/pricing" class="menu-link">Planes</router-link>
      <router-link to="/faq" class="menu-link">FAQ</router-link>
      <router-link to="/contact" class="menu-link">Contacto</router-link>
    </nav>

    <!-- Botón -->
    <router-link to="/login" class="btn-12">
      <span>Iniciar Sesión</span>
    </router-link>
  </header>
</template>

<script lang="ts">
import { defineComponent } from "vue";
import "../../assets/css/Button12.css"; /* Importa el archivo CSS externo */

export default defineComponent({
  name: "HeaderBar",
});
</script>

<style scoped>
/* Estilo adicional para el header */
header {
  border: 1px solid #e5e7eb; /* Línea tenue */
}

/* Estilo del menú */
nav {
  flex-grow: 1; /* Permite al menú ocupar el espacio necesario */
  display: flex;
  justify-content: center; /* Centra los elementos horizontalmente */
}

.menu-link {
  text-decoration: none;
  font-size: 1rem;
  font-weight: 500;
  padding: 0.5rem 1rem;
  border-radius: 6px;
  transition: color 0.3s, background-color 0.3s;
  color: #374151; /* Gris oscuro */
}

.menu-link:hover {
  background-color: #f3f4f6;
  color: #1f2937; /* Gris más oscuro */
}
</style>
