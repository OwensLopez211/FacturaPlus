import { createRouter, createWebHistory } from "vue-router";
import HomePage from "../pages/HomePage.vue";
import RegisterForm from "../components/forms/RegisterForm.vue";
import LoginForm from "../components/forms/LoginForm.vue";
import PrivateLayout from "../layouts/PrivateLayout.vue"; // Layout para usuarios regulares
import AdminLayout from "../layouts/AdminLayout.vue"; // Layout para administradores
import Dashboard from "../components/common/Dashboard.vue";
import Profile from "../components/common/Profile.vue";
import AdminDashboard from "../components/admin/AdminDashboard.vue"; // Componente del panel de administración

const routes = [
  {
    path: "/",
    name: "Home",
    component: HomePage,
  },
  {
    path: "/register",
    name: "Register",
    component: RegisterForm,
  },
  {
    path: "/login",
    name: "Login",
    component: LoginForm,
  },
  {
    path: "/",
    component: PrivateLayout, // Layout base para usuarios regulares
    meta: { requiresAuth: true }, // Requiere autenticación
    children: [
      {
        path: "dashboard",
        name: "Dashboard",
        component: Dashboard,
        meta: { role: "user" }, // Visible solo para usuarios regulares
      },
      {
        path: "perfil",
        name: "Profile",
        component: Profile,
        meta: { role: "user" }, // Visible solo para usuarios regulares
      },
    ],
  },
  {
    path: "/admin",
    component: AdminLayout, // Layout base para administradores
    meta: { requiresAuth: true, role: "admin" }, // Requiere autenticación y rol de administrador
    children: [
      {
        path: "dashboard",
        name: "AdminDashboard",
        component: AdminDashboard,
        meta: { role: "admin" }, // Visible solo para administradores
      },
      // Agregar más rutas para administradores aquí
    ],
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

// Protección de rutas (Auth Guard)
router.beforeEach((to, from, next) => {
  const token = localStorage.getItem("authToken");
  const userRole = localStorage.getItem("userRole"); // Asegúrate de guardar el rol en localStorage al iniciar sesión

  if (to.name === "Login" && token) {
    // Redirigir según el rol si ya está autenticado
    if (userRole === "admin") {
      next({ name: "AdminDashboard" });
    } else {
      next({ name: "Dashboard" });
    }
  } else if (to.meta.requiresAuth && !token) {
    // Redirigir al login si no está autenticado
    next({ name: "Login" });
  } else if (to.meta.role && to.meta.role !== userRole) {
    // Si el usuario no tiene el rol requerido
    if (userRole === "admin") {
      next({ name: "AdminDashboard" });
    } else {
      next({ name: "Dashboard" });
    }
  } else {
    next(); // Continuar si no hay problemas
  }
});

export default router;
