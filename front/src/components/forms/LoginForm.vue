<template>
    <div class="flex items-center justify-center min-h-screen login-bg">
      <!-- Contenedor principal con neumorfismo -->
      <div class="neumorphic-container">
        <!-- Fondo superior atractivo -->
        <div class="rounded-xl bg-gradient-to-r relative overflow-hidden mb-6 neumorphic-header">
          <div class="absolute inset-0 animated-gradient"></div>
          <div class="relative z-10 flex flex-col items-center justify-center h-full text-center px-4">
            <h2 class="text-3xl font-extrabold text-gray-800">¡Bienvenido de nuevo!</h2>
            <p class="mt-2 text-gray-600 text-sm font-medium">
              Accede a tus recursos educativos y sigue aprendiendo con nosotros.
            </p>
          </div>
        </div>
  
        <!-- Formulario -->
        <form @submit.prevent="handleLogin" class="space-y-6">
          <!-- Campo: Correo Electrónico -->
          <div class="relative">
            <label for="email" class="sr-only">Correo Electrónico</label>
            <input
              v-model="email"
              type="email"
              id="email"
              placeholder="Correo Electrónico"
              class="input-field"
              required
            />
          </div>
  
          <!-- Campo: Contraseña -->
          <div class="relative">
            <label for="password" class="sr-only">Contraseña</label>
            <input
              v-model="password"
              type="password"
              id="password"
              placeholder="Contraseña"
              class="input-field"
              required
            />
          </div>
  
          <!-- Botón de Inicio -->
          <button type="submit" class="btn-primary">
            Iniciar Sesión
          </button>
  
          <!-- Mensajes de error o éxito -->
          <div v-if="error" class="text-red-500 text-sm mt-2 text-center">
            {{ error }}
          </div>
          <div v-if="success" class="text-green-500 text-sm mt-2 text-center">
            {{ success }}
          </div>
        </form>
  
        <!-- Opciones adicionales -->
        <div class="text-center mt-6">
          <p class="text-sm text-gray-600">
            ¿No tienes una cuenta?
            <router-link to="/register" class="text-blue-600 font-medium hover:underline">
              Regístrate aquí
            </router-link>
          </p>
          <p class="text-sm text-gray-600 mt-2">
            <router-link to="/forgot-password" class="text-blue-600 font-medium hover:underline">
              Olvidé mi contraseña
            </router-link>
          </p>
        </div>
      </div>
    </div>
  </template>
  
  <script lang="ts">
  import { defineComponent, ref } from "vue";
  import { useRouter } from "vue-router";
  
  export default defineComponent({
    name: "LoginForm",
    setup() {
      const router = useRouter();
      const email = ref("");
      const password = ref("");
      const error = ref<string | null>(null);
      const success = ref<string | null>(null);
  
      const handleLogin = async () => {
        error.value = null;
        success.value = null;

        try {
          const response = await fetch("http://localhost:8000/api/login", {
            method: "POST",
            headers: {
              "Content-Type": "application/json",
            },
            body: JSON.stringify({ email: email.value, password: password.value }),
          });

          if (!response.ok) {
            const data = await response.json();
            throw new Error(data.message || "Error en el inicio de sesión");
          }

          const data = await response.json();

          // Guardar el token y otros datos en el almacenamiento local
          localStorage.setItem("authToken", data.token);
          localStorage.setItem("userId", data.user.id);
          localStorage.setItem("userRole", data.user.roles[0]?.nombre || "user");

          success.value = "Inicio de sesión exitoso. Redirigiendo...";

          // Redirigir basado en el rol del usuario
          const userRole = data.user.roles[0]?.nombre || "user"; // Asume que `roles` es un array
          if (userRole === "admin") {
            router.push("/admin/dashboard");
          } else {
            router.push("/dashboard");
          }
        } catch (err: any) {
          error.value = err.message || "Error al conectar con el servidor";
        }
      };

  
      return {
        email,
        password,
        error,
        success,
        handleLogin,
      };
    },
  });
  </script>
  
  <style src="../../assets/css/LoginForm.css" scoped></style>
  