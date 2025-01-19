<template>
  <nav class="bg-gray-900 text-white px-8 py-4">
    <div class="max-w-7xl mx-auto flex justify-between items-center">
      <!-- Logo -->
      <div class="flex items-center">
        <router-link to="/" class="flex items-center space-x-2 hover:opacity-80 transition">
          <span class="text-2xl font-bold tracking-tight">Artis</span>
        </router-link>
      </div>

      <!-- Hamburger Menu (Mobile) -->
      <button
        @click="toggleMobileMenu"
        class="block md:hidden focus:outline-none"
      >
        <svg
          xmlns="http://www.w3.org/2000/svg"
          class="h-6 w-6"
          fill="none"
          viewBox="0 0 24 24"
          stroke="currentColor"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M4 6h16M4 12h16m-7 6h7"
          />
        </svg>
      </button>

      <!-- Menú -->
      <ul
        :class="{
          'hidden': !mobileMenuOpen,
          'block': mobileMenuOpen,
        }"
        class="md:flex md:space-x-8 text-sm font-medium md:static absolute top-14 left-0 w-full bg-gray-900 md:bg-transparent md:w-auto"
      >
        <li>
          <router-link
            to="/dashboard"
            class="block px-4 py-2 md:p-0 hover:text-blue-400 transition"
            @click="closeMobileMenu"
          >
            Dashboard
          </router-link>
        </li>
        <li>
          <router-link
            to="/inventario"
            class="block px-4 py-2 md:p-0 hover:text-blue-400 transition"
            @click="closeMobileMenu"
          >
            Inventario
          </router-link>
        </li>
        <li>
          <router-link
            to="/ordenes"
            class="block px-4 py-2 md:p-0 hover:text-blue-400 transition"
            @click="closeMobileMenu"
          >
            Órdenes de Compra
          </router-link>
        </li>
        <li>
          <router-link
            to="/facturacion"
            class="block px-4 py-2 md:p-0 hover:text-blue-400 transition"
            @click="closeMobileMenu"
          >
            Facturación
          </router-link>
        </li>
        <li>
          <router-link
            to="/reportes"
            class="block px-4 py-2 md:p-0 hover:text-blue-400 transition"
            @click="closeMobileMenu"
          >
            Reportes
          </router-link>
        </li>
      </ul>

      <!-- User Options (Desktop) -->
      <div class="relative hidden md:block">
        <button
          @click="toggleMenu"
          class="flex items-center justify-center w-10 h-10 bg-blue-500 rounded-full focus:outline-none"
        >
          <svg
            xmlns="http://www.w3.org/2000/svg"
            class="h-6 w-6 text-white"
            viewBox="0 0 24 24"
            fill="currentColor"
          >
            <path
              fill-rule="evenodd"
              d="M12 12a5 5 0 100-10 5 5 0 000 10zm-7 8a7 7 0 1114 0H5z"
              clip-rule="evenodd"
            />
          </svg>
        </button>

        <!-- Dropdown Menu -->
        <div
          v-if="menuOpen"
          class="absolute right-0 mt-2 bg-white text-gray-800 shadow-lg rounded-md w-40 py-2 z-10"
        >
          <router-link
            to="/perfil"
            class="block px-4 py-2 hover:bg-gray-100 transition"
            @click="closeMenu"
          >
            Perfil
          </router-link>
          <router-link
            to="/configuracion"
            class="block px-4 py-2 hover:bg-gray-100 transition"
            @click="closeMenu"
          >
            Configuración
          </router-link>
          <button
            @click="logout"
            class="block w-full text-left px-4 py-2 hover:bg-gray-100 transition"
          >
            Cerrar Sesión
          </button>
        </div>
      </div>
    </div>
  </nav>
</template>

<script>
import { defineComponent } from "vue";

export default defineComponent({
  name: "Navbar",
  data() {
    return {
      menuOpen: false, // Estado del menú desplegable
      mobileMenuOpen: false, // Estado del menú móvil
    };
  },
  methods: {
    toggleMenu() {
      this.menuOpen = !this.menuOpen; // Alternar menú usuario
    },
    closeMenu() {
      this.menuOpen = false; // Cerrar menú usuario
    },
    toggleMobileMenu() {
      this.mobileMenuOpen = !this.mobileMenuOpen; // Alternar menú móvil
    },
    closeMobileMenu() {
      this.mobileMenuOpen = false; // Cerrar menú móvil
    },
    logout() {
      localStorage.removeItem("authToken"); // Eliminar token
      this.closeMenu(); // Cerrar menú usuario
      this.closeMobileMenu(); // Cerrar menú móvil
      this.$router.push("/login"); // Redirigir a login
    },
  },
});
</script>

<style scoped>
/* Ajustes para el navbar */
nav {
  border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

/* Ajuste de enlaces del menú */
ul {
  list-style: none;
}

a {
  color: inherit;
  text-decoration: none;
}

a:hover {
  text-decoration: underline;
}
</style>
