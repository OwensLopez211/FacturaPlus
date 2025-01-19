<template>
    <div class="bg-gray-50 min-h-screen">
      <!-- Cabecera -->
      <div class="bg-gradient-to-r from-blue-500 to-purple-500 h-48 flex flex-col justify-center items-center">
        <h1 class="text-white text-4xl font-extrabold">Perfil de Usuario</h1>
        <p class="text-white text-lg mt-2">Consulta tus datos personales</p>
      </div>
  
      <!-- Contenedor principal del perfil -->
      <div class="max-w-4xl mx-auto">
        <div class="bg-white shadow-lg rounded-2xl p-8 -mt-20">
          <!-- Encabezado del perfil -->
          <div class="flex flex-col items-center text-center mb-8">
            <!-- Foto de perfil -->
            <div class="relative">
              <img
                :src="user.profilePicture || 'https://via.placeholder.com/150'"
                alt="Foto de perfil"
                class="h-32 w-32 rounded-full border-4 border-white shadow-md"
              />
            </div>
            <!-- Nombre y correo -->
            <h2 class="text-2xl font-bold text-gray-800 mt-4">
              {{ user.nombre }} {{ user.apellido }}
            </h2>
            <p class="text-gray-600 text-sm">{{ user.email }}</p>
          </div>
  
          <!-- Información del perfil -->
          <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Teléfono -->
            <div class="info-card">
              <h3 class="text-lg font-bold text-gray-800">Teléfono</h3>
              <p class="text-gray-600 mt-2">
                {{ user.telefono || "Sin número de teléfono registrado" }}
              </p>
            </div>
  
            <!-- Experiencia -->
            <div class="info-card">
              <h3 class="text-lg font-bold text-gray-800">Experiencia</h3>
              <p class="text-gray-600 mt-2">
                {{ user.experiencia || "No se ha registrado experiencia profesional." }}
              </p>
            </div>
  
            <!-- Acerca de mí -->
            <div class="info-card md:col-span-2">
              <h3 class="text-lg font-bold text-gray-800">Acerca de mí</h3>
              <p class="text-gray-600 mt-2">
                {{ user.acerca_de_mi || "No se ha proporcionado información adicional." }}
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    name: "Profile",
    data() {
      return {
        user: {
          nombre: "",
          apellido: "",
          telefono: "",
          email: "",
          experiencia: "",
          acerca_de_mi: "",
          profilePicture: "",
        },
      };
    },
    methods: {
      async fetchUserProfile() {
        try {
          const token = localStorage.getItem("authToken");
          if (!token) {
            throw new Error("No se encontró un token de autenticación.");
          }
  
          const response = await fetch("http://localhost:8000/api/profile", {
            headers: {
              Authorization: `Bearer ${token}`,
            },
          });
  
          if (!response.ok) {
            throw new Error("Error al obtener los datos del perfil.");
          }
  
          const data = await response.json();
  
          this.user = {
            nombre: data.nombre || "",
            apellido: data.apellido || "",
            telefono: data.telefono || "",
            email: data.email || "",
            experiencia: data.experiencia || "",
            acerca_de_mi: data.acerca_de_mi || "",
            profilePicture: data.profile_picture || "",
          };
        } catch (error) {
          console.error(error.message);
        }
      },
    },
    mounted() {
      this.fetchUserProfile();
    },
  };
  </script>
  
  <style src="../../assets/css/Profile.css" scoped></style>
  