<template>
    <div>
      <!-- Sidebar del administrador -->
      <AdminSidebar />
  
      <!-- Contenedor para las vistas del administrador -->
      <div class="bg-gray-100 min-h-screen ml-64">
        <router-view /> <!-- Carga el componente correspondiente a la ruta activa -->
      </div>
    </div>
  </template>
  
  <script>
  import AdminSidebar from "../components/admin/AdminSidebar.vue"; // Sidebar específico para el admin
  import { startSessionTimeout, stopSessionTimeout } from "../services/sessionTimeout";
  import { useRouter } from "vue-router";
  
  export default {
    name: "AdminLayout",
    components: {
      AdminSidebar, // Sidebar específico para administradores
    },
    setup() {
      const router = useRouter();
  
      const logout = () => {
        localStorage.removeItem("authToken"); // Eliminar token de autenticación
        stopSessionTimeout(); // Detener el timeout de sesión
        router.push("/login"); // Redirigir al login
      };
  
      // Iniciar el timeout de sesión al cargar
      startSessionTimeout(logout, 900000); // 15 minutos (900,000ms)
  
      return {};
    },
    beforeUnmount() {
      stopSessionTimeout(); // Detener el timeout al desmontar el componente
    },
  };
  </script>
  
  <style scoped>
  /* Ajustes específicos para el layout de administrador */
  .ml-64 {
    margin-left: 16rem; /* Asegura que el contenido no se sobreponga al Sidebar */
  }
  
  .bg-gray-100 {
    background-color: #f7fafc; /* Fondo gris claro para diferenciar */
  }
  </style>
  