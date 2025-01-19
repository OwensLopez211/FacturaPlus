<template>
  <div>
    <!-- Sidebar visible siempre -->
    <Sidebar />

    <!-- Contenedor para las vistas -->
    <div class="bg-gray-50 min-h-screen ml-64">
      <!-- Añadir margen izquierdo para acomodar el ancho del Sidebar -->
      <router-view /> <!-- Carga el componente correspondiente a la ruta activa -->
    </div>
  </div>
</template>

<script>
import Sidebar from "../components/common/Sidebar.vue"; // Cambiado para que coincida con el uso en el template
import { startSessionTimeout, stopSessionTimeout } from "../services/sessionTimeout";
import { useRouter } from "vue-router";

export default {
  name: "PrivateLayout",
  components: {
    Sidebar, // Asegúrate de que el nombre coincida
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
/* Ajustes específicos */
.pt-16 {
  padding-top: 4rem; /* Altura suficiente para el Navbar */
}

.ml-64 {
  margin-left: 16rem; /* Asegura que el contenido no se sobreponga al Sidebar */
}
</style>
