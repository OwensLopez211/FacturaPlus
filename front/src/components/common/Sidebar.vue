<template>
    <fwb-sidebar>
      <fwb-sidebar-logo name="Artis" logo="https://flowbite.com/docs/images/logo.svg" tag="router-link" />
      
      <!-- Dashboard -->
      <fwb-sidebar-item>
        <template #icon>
          <svg class="w-5 h-5 text-gray-500 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" 
               aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
            <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
            <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
          </svg>
        </template>
        <template #default>Dashboard</template>
      </fwb-sidebar-item>
      
      <!-- Inventario -->
      <fwb-sidebar-item>
        <template #icon>
          <svg class="flex-shrink-0 w-5 h-5 text-gray-500 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" 
               aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
            <path d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Z" />
          </svg>
        </template>
        <template #default>Inventario</template>
      </fwb-sidebar-item>
      
      <!-- Órdenes de Compra -->
      <fwb-sidebar-item>
        <template #icon>
          <svg class="flex-shrink-0 w-5 h-5 text-gray-500 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" 
               aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M17 5H3L1 11h18l-2-6ZM9 15H4a1 1 0 0 1 0-2h5v2ZM15 15h-3v-2h3a1 1 0 1 1 0 2Z" />
          </svg>
        </template>
        <template #default>Órdenes de Compra</template>
      </fwb-sidebar-item>
      
      <!-- Facturación -->
      <fwb-sidebar-item>
        <template #icon>
          <svg class="flex-shrink-0 w-5 h-5 text-gray-500 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" 
               aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M3 4v12h14V4H3Zm4 9H5V7h2v6Zm4 0H9V7h2v6Zm4 0h-2V7h2v6Z" />
          </svg>
        </template>
        <template #default>Facturación</template>
      </fwb-sidebar-item>
      
      <!-- Reportes -->
      <fwb-sidebar-item>
        <template #icon>
          <svg class="flex-shrink-0 w-5 h-5 text-gray-500 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" 
               aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M3 18h14V5H3v13Zm3-11h2v9H6V7Zm4 9h2V9h-2v7Zm4-7h2v5h-2V9Z" />
          </svg>
        </template>
        <template #default>Reportes</template>
      </fwb-sidebar-item>
      
      <!-- Perfil -->
      <fwb-sidebar-item>
        <template #icon>
          <svg class="flex-shrink-0 w-5 h-5 text-gray-500 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" 
               aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 10a5 5 0 1 0-5-5 5 5 0 0 0 5 5Zm0 2c-4 0-7 1.79-7 4v1h14v-1c0-2.21-3-4-7-4Z" />
          </svg>
        </template>
        <template #default>Perfil</template>
      </fwb-sidebar-item>
      
      <!-- Configuración -->
      <fwb-sidebar-item>
        <template #icon>
          <svg class="flex-shrink-0 w-5 h-5 text-gray-500 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" 
               aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 4a1 1 0 0 1 1 1v10a1 1 0 0 1-2 0V5a1 1 0 0 1 1-1Zm0 14a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3Zm0-16a1 1 0 0 1 1-1h4a1 1 0 1 1 0 2h-4a1 1 0 0 1-1-1Z" />
          </svg>
        </template>
        <template #default>Configuración</template>
      </fwb-sidebar-item>
      
      <!-- Cerrar Sesión -->
      <fwb-sidebar-item>
        <template #icon>
          <svg class="flex-shrink-0 w-5 h-5 text-gray-500 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" 
               aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M13 8V6h6v4h-6V8ZM3 18V2h8v2H5v12h6v2H3Zm12-4v-2h4v4h-4Z" />
          </svg>
        </template>
        <template #default>Cerrar Sesión</template>
      </fwb-sidebar-item>
    </fwb-sidebar>
  </template>
  
  <script setup>
  import { FwbSidebar, FwbSidebarItem, FwbSidebarLogo } from 'flowbite-vue'
  </script>
  