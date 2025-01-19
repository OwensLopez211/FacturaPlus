<template>
    <div class="admin-dashboard">
      <!-- Título del panel de administración -->
      <header class="header bg-gray-800 text-white py-4 px-6 flex justify-between items-center">
        <h1 class="text-2xl font-bold">Panel de Administración</h1>
        <button 
          class="bg-red-600 hover:bg-red-700 text-white py-2 px-4 rounded"
          @click="logout"
        >
          Cerrar Sesión
        </button>
      </header>
  
      <!-- Contenido principal -->
      <div class="content p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
          <!-- Tarjetas de ejemplo -->
          <div class="card bg-white shadow-md rounded-lg p-4">
            <h2 class="text-lg font-bold">Empresas Registradas</h2>
            <p class="text-2xl font-semibold text-blue-600">{{ empresasCount }}</p>
          </div>
          <div class="card bg-white shadow-md rounded-lg p-4">
            <h2 class="text-lg font-bold">Solicitudes Pendientes</h2>
            <p class="text-2xl font-semibold text-yellow-600">{{ solicitudesPendientes }}</p>
          </div>
          <div class="card bg-white shadow-md rounded-lg p-4">
            <h2 class="text-lg font-bold">Usuarios Registrados</h2>
            <p class="text-2xl font-semibold text-green-600">{{ usuariosCount }}</p>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script lang="ts">
  import { defineComponent, onMounted, ref } from "vue";
  import { useRouter } from "vue-router";
  
  export default defineComponent({
    name: "AdminDashboard",
    setup() {
      const router = useRouter();
      const empresasCount = ref(0);
      const solicitudesPendientes = ref(0);
      const usuariosCount = ref(0);
  
      const fetchData = async () => {
        try {
          const token = localStorage.getItem("authToken");
  
          // Obtener datos de ejemplo
          const empresasResponse = await fetch("http://localhost:8000/api/admin/empresas", {
            headers: { Authorization: `Bearer ${token}` },
          });
          const solicitudesResponse = await fetch("http://localhost:8000/api/admin/solicitudes", {
            headers: { Authorization: `Bearer ${token}` },
          });
          const usuariosResponse = await fetch("http://localhost:8000/api/admin/usuarios", {
            headers: { Authorization: `Bearer ${token}` },
          });
  
          empresasCount.value = (await empresasResponse.json()).count || 0;
          solicitudesPendientes.value = (await solicitudesResponse.json()).count || 0;
          usuariosCount.value = (await usuariosResponse.json()).count || 0;
        } catch (error) {
          console.error("Error al obtener los datos del administrador:", error);
        }
      };
  
      const logout = () => {
        localStorage.removeItem("authToken");
        router.push("/login");
      };
  
      onMounted(() => {
        fetchData();
      });
  
      return {
        empresasCount,
        solicitudesPendientes,
        usuariosCount,
        logout,
      };
    },
  });
  </script>
  
  <style scoped>
  .header {
    background-color: #1a202c; /* Color gris oscuro */
  }
  .card {
    transition: transform 0.2s;
  }
  .card:hover {
    transform: translateY(-4px);
  }
  </style>
  