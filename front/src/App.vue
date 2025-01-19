<template>
    <div id="app">
  
      <!-- Contenido dinámico con transición -->
      <transition name="fade" mode="out-in">
        <router-view />
      </transition>
    </div>
  </template>
  
  <script>
  import HeaderBar from "./components/common/HeaderBar.vue"; // Importa tu HeaderBar
  
  export default {
    name: "App",
    components: {
      HeaderBar,
    },
  };
  </script>
  
  <style>
  /* Transición de desvanecimiento */
  .fade-enter-active,
  .fade-leave-active {
    transition: opacity 0.5s ease; /* Duración y suavidad */
  }
  
  .fade-enter-from,
  .fade-leave-to {
    opacity: 0; /* Inicio y fin de la transición */
  }
  </style>
  