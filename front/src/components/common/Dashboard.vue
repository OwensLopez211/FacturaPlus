<template>
    <div class="min-h-screen bg-gray-100">
      <!-- Contenido Principal -->
      <div class="max-w-7xl mx-auto py-8 px-6">
        <!-- Título y bienvenida -->
        <header class="mb-8 text-center">
          <h1 class="text-3xl font-bold text-gray-800 mb-2">Panel de Control</h1>
          <p class="text-gray-600">
            Consulta tu progreso y aprovecha al máximo tus herramientas de aprendizaje.
          </p>
        </header>
  
        <!-- Gráficos y estadísticas -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
          <!-- Gráfico de Horas de Estudio -->
          <div class="bg-white shadow-lg rounded-lg p-6 flex flex-col items-center">
            <h2 class="text-lg font-semibold text-gray-700 mb-4">Horas de Estudio</h2>
            <div class="w-64 h-64">
              <canvas id="studyHoursChart"></canvas>
            </div>
          </div>
  
          <!-- Progreso Semanal -->
          <div class="bg-white shadow-lg rounded-lg p-6 flex flex-col items-center">
            <h2 class="text-lg font-semibold text-gray-700 mb-4">Progreso Semanal</h2>
            <div class="w-64 h-64">
              <canvas id="weeklyProgressChart"></canvas>
            </div>
          </div>
  
          <!-- Cursos Completados -->
          <div class="bg-white shadow-lg rounded-lg p-6 flex flex-col items-center">
            <h2 class="text-lg font-semibold text-gray-700 mb-4">Cursos Completados</h2>
            <div class="w-64 h-64">
              <canvas id="completedCoursesChart"></canvas>
            </div>
          </div>
        </div>
  
        <!-- Resumen Semanal -->
        <section class="mt-12">
          <WeeklySummary
            :hoursStudied="12"
            :coursesCompleted="3"
            :tasksCompleted="9"
            :certificationsEarned="1"
          />
        </section>
      </div>
    </div>
  </template>
  
  <script>
  import { defineComponent, onMounted } from "vue";
  import WeeklySummary from "./WeeklySummary.vue";
  import { renderCharts } from '../../assets/js/Dashboard.js';
  
  export default defineComponent({
    name: "Dashboard",
    components: {
      WeeklySummary,
    },
    setup() {
      onMounted(() => {
        renderCharts();
      });
    },
  });
  </script>
  
  <style src="../../assets/css/Dashboard.css" scoped></style>
  