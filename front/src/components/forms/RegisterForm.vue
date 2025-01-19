<template>
  <div class="flex items-center justify-center min-h-screen register-bg">
    <!-- Contenedor principal con neumorfismo -->
    <div class="neumorphic-container">
      <!-- Fondo superior atractivo -->
      <div class="rounded-xl bg-gradient-to-r relative overflow-hidden mb-6 neumorphic-header">
        <div class="absolute inset-0 animated-gradient"></div>
        <div class="relative z-10 flex flex-col items-center justify-center h-full text-center px-4">
          <h2 class="text-3xl font-extrabold text-gray-800">¡Regístrate ahora!</h2>
          <p class="mt-2 text-gray-600 text-sm font-medium">
            Crea tu cuenta para acceder a increíbles recursos educativos.
          </p>
        </div>
      </div>

      <!-- Formulario -->
      <form @submit.prevent="handleSubmit" class="space-y-4">
        <!-- Campo: Nombre -->
        <div>
          <label for="nombre" class="sr-only">Nombre</label>
          <input
            type="text"
            id="nombre"
            v-model="formData.nombre"
            class="input-field"
            placeholder="Nombre"
            required
          />
        </div>

        <!-- Campo: Apellido -->
        <div>
          <label for="apellido" class="sr-only">Apellido</label>
          <input
            type="text"
            id="apellido"
            v-model="formData.apellido"
            class="input-field"
            placeholder="Apellido"
            required
          />
        </div>

        <!-- Campo: Teléfono -->
        <div>
          <label for="telefono" class="sr-only">Teléfono</label>
          <input
            type="text"
            id="telefono"
            v-model="formData.telefono"
            class="input-field"
            placeholder="Teléfono"
            required
          />
        </div>

        <!-- Campo: Email -->
        <div>
          <label for="email" class="sr-only">Email</label>
          <input
            type="email"
            id="email"
            v-model="formData.email"
            class="input-field"
            placeholder="Correo Electrónico"
            required
          />
        </div>

        <!-- Campo: Contraseña -->
        <div>
          <label for="password" class="sr-only">Contraseña</label>
          <input
            type="password"
            id="password"
            v-model="formData.password"
            class="input-field"
            placeholder="Contraseña"
            required
          />
        </div>

        <!-- Campo: Confirmar Contraseña -->
        <div>
          <label for="password_confirmation" class="sr-only">Confirmar Contraseña</label>
          <input
            type="password"
            id="password_confirmation"
            v-model="formData.password_confirmation"
            class="input-field"
            placeholder="Confirmar Contraseña"
            required
          />
        </div>

        <!-- Botón: Registrar -->
        <button
          type="submit"
          :disabled="loading"
          class="btn-primary"
        >
          {{ loading ? "Registrando..." : "Registrar" }}
        </button>

        <!-- Mensajes de error o éxito -->
        <div v-if="error" class="text-red-500 text-sm mt-2 text-center">
          {{ error }}
        </div>
        <div v-if="success" class="text-green-500 text-sm mt-2 text-center">
          {{ success }}
        </div>
      </form>

      <!-- Enlace al Login -->
      <div class="text-center mt-6">
        <p class="text-sm text-gray-600">
          ¿Ya tienes una cuenta?
          <router-link to="/login" class="text-blue-600 font-medium hover:underline">
            Inicia sesión aquí
          </router-link>
        </p>
      </div>
    </div>
  </div>
</template>

<script lang="ts">
import { defineComponent, ref } from "vue";

export default defineComponent({
  name: "RegisterForm",
  setup() {
    const formData = ref({
      nombre: "",
      apellido: "",
      telefono: "",
      email: "",
      password: "",
      password_confirmation: "",
    });

    const error = ref<string | null>(null);
    const success = ref<string | null>(null);
    const loading = ref(false);

    const handleSubmit = async () => {
      error.value = null;
      success.value = null;
      loading.value = true;

      if (formData.value.password !== formData.value.password_confirmation) {
        error.value = "Las contraseñas no coinciden";
        loading.value = false;
        return;
      }

      try {
        const response = await fetch("http://localhost:8000/api/register", {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify(formData.value),
        });

        if (!response.ok) {
          const errorData = await response.json();
          throw new Error(errorData.message || "Error en el registro");
        }

        success.value = "Usuario registrado con éxito. Redirigiendo...";
        formData.value = {
          nombre: "",
          apellido: "",
          telefono: "",
          email: "",
          password: "",
          password_confirmation: "",
        };

        setTimeout(() => {
          window.location.href = "/login"; // Redirige al login tras el registro
        }, 2000);
      } catch (err: any) {
        error.value = err.message || "Error al conectar con el servidor";
      } finally {
        loading.value = false;
      }
    };

    return {
      formData,
      error,
      success,
      loading,
      handleSubmit,
    };
  },
});
</script>

<style src="../../assets/css/RegisterForm.css"></style>
