<template>
    <aside class="fixed top-0 left-0 w-64 h-full bg-gray-800 text-white shadow-lg">
      <!-- Logo y encabezado -->
      <div class="flex items-center justify-center h-20 bg-gray-900">
        <h1 class="text-xl font-bold">Admin Panel</h1>
      </div>
  
      <!-- Menú de navegación -->
      <nav class="mt-4">
        <ul>
          <!-- Enlace al Dashboard -->
          <li>
            <router-link
              to="/admin/dashboard"
              class="flex items-center p-4 hover:bg-gray-700"
              active-class="bg-gray-700"
            >
              <svg
                class="w-5 h-5 mr-2"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="2"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M3 10h11M9 21V3m12 13h-9m9 8h-9m9-16h-9"
                />
              </svg>
              Dashboard
            </router-link>
          </li>
  
          <!-- Enlace a Solicitudes -->
          <li>
            <router-link
              to="/admin/solicitudes"
              class="flex items-center p-4 hover:bg-gray-700"
              active-class="bg-gray-700"
            >
              <svg
                class="w-5 h-5 mr-2"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="2"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M20 13V7a2 2 0 00-2-2h-4M7 16h10M9 21V3m9 13H9m9 5H9m0 0H3"
                />
              </svg>
              Solicitudes
            </router-link>
          </li>
  
          <!-- Enlace a Empresas -->
          <li>
            <router-link
              to="/admin/empresas"
              class="flex items-center p-4 hover:bg-gray-700"
              active-class="bg-gray-700"
            >
              <svg
                class="w-5 h-5 mr-2"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="2"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M3 16h6m-6 4h6m-6-8h6m4 4h6m-6 4h6m-6-8h6m0 12V8m0-5h5a2 2 0 012 2v14a2 2 0 01-2 2h-5V3z"
                />
              </svg>
              Empresas
            </router-link>
          </li>
  
          <!-- Enlace a Configuración -->
          <li>
            <router-link
              to="/admin/configuracion"
              class="flex items-center p-4 hover:bg-gray-700"
              active-class="bg-gray-700"
            >
              <svg
                class="w-5 h-5 mr-2"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="2"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M4 6h16M4 12h8m-8 6h16"
                />
              </svg>
              Configuración
            </router-link>
          </li>
        </ul>
      </nav>
  
      <!-- Cerrar sesión -->
      <div class="absolute bottom-0 w-full">
        <button
          @click="logout"
          class="flex items-center w-full p-4 text-left hover:bg-red-600"
        >
          <svg
            class="w-5 h-5 mr-2"
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
            stroke-width="2"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M17 16l4-4m0 0l-4-4m4 4H7m6-4v8"
            />
          </svg>
          Cerrar sesión
        </button>
      </div>
    </aside>
  </template>
  
  <script>
  import { defineComponent } from "vue";
  import { useRouter } from "vue-router";
  
  export default defineComponent({
    name: "AdminSidebar",
    setup() {
      const router = useRouter();
  
      const logout = () => {
        localStorage.removeItem("authToken"); // Remover token de autenticación
        localStorage.removeItem("userRole"); // Remover el rol de usuario
        router.push("/login"); // Redirigir al login
      };
  
      return {
        logout,
      };
    },
  });
  </script>
  
  <style scoped>
  aside {
    width: 16rem; /* 64 */
  }
  
  button {
    transition: background-color 0.2s ease;
  }
  </style>
  