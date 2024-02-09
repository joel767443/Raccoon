import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import IndexView from '../views/items/IndexView.vue'
import CreateView from '../views/items/CreateView.vue'
import EditView from '../views/items/EditView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/items',
      name: 'items',
      component: IndexView
    },
    {
      path: '/add-item',
      name: 'add-item',
      component: CreateView
    },
    {
      path: '/edit-item',
      name: 'add-item',
      component: EditView
    },
  ]
})

export default router
