<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { ref } from 'vue';

// Sample blog posts data - in a real app, this would come from your backend
const posts = ref([
    {
        id: 1,
        title: 'Getting Started with Laravel',
        excerpt: 'Learn the basics of Laravel and how to build your first application.',
        author: 'John Doe',
        date: 'March 28, 2024',
        category: 'Laravel',
        readTime: '5 min read'
    },
    {
        id: 2,
        title: 'Vue.js Best Practices',
        excerpt: 'Discover the best practices for building Vue.js applications.',
        author: 'Jane Smith',
        date: 'March 27, 2024',
        category: 'Vue.js',
        readTime: '7 min read'
    },
    {
        id: 3,
        title: 'Building Modern APIs',
        excerpt: 'A comprehensive guide to building RESTful APIs with Laravel.',
        author: 'Mike Johnson',
        date: 'March 26, 2024',
        category: 'API Development',
        readTime: '10 min read'
    }
]);
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <div class="flex justify-between items-center">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Welcome, {{ $page.props.auth.user.name }}
                </h2>
                <button v-if="$page.props.auth.user.role === 'admin'" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 transition duration-150">
                    Create New Post
                </button>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <!-- Stats Overview -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <div class="bg-white overflow-hidden shadow-sm rounded-lg">
                        <div class="p-6">
                            <div class="flex items-center">
                                <div class="p-3 rounded-full bg-indigo-100">
                                    <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <p class="text-sm font-medium text-gray-500">Total Posts</p>
                                    <p class="text-2xl font-semibold text-gray-900">24</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white overflow-hidden shadow-sm rounded-lg">
                        <div class="p-6">
                            <div class="flex items-center">
                                <div class="p-3 rounded-full bg-green-100">
                                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <p class="text-sm font-medium text-gray-500">Total Users</p>
                                    <p class="text-2xl font-semibold text-gray-900">128</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white overflow-hidden shadow-sm rounded-lg">
                        <div class="p-6">
                            <div class="flex items-center">
                                <div class="p-3 rounded-full bg-yellow-100">
                                    <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <p class="text-sm font-medium text-gray-500">Total Views</p>
                                    <p class="text-2xl font-semibold text-gray-900">1,234</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Blog Posts -->
                <div class="bg-white overflow-hidden shadow-sm rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-6">Latest Blog Posts</h3>
                        <div class="space-y-6">
                            <div v-for="post in posts" :key="post.id" class="border-b border-gray-200 pb-6 last:border-0">
                                <div class="flex items-center justify-between mb-2">
                                    <span class="text-sm text-indigo-600 font-medium">{{ post.category }}</span>
                                    <span class="text-sm text-gray-500">{{ post.readTime }}</span>
                                </div>
                                <h4 class="text-xl font-semibold text-gray-900 mb-2">{{ post.title }}</h4>
                                <p class="text-gray-600 mb-4">{{ post.excerpt }}</p>
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0">
                                            <span class="inline-flex items-center justify-center h-8 w-8 rounded-full bg-gray-500">
                                                <span class="text-sm font-medium leading-none text-white">{{ post.author.charAt(0) }}</span>
                                            </span>
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-sm font-medium text-gray-900">{{ post.author }}</p>
                                            <p class="text-sm text-gray-500">{{ post.date }}</p>
                                        </div>
                                    </div>
                                    <button class="text-indigo-600 hover:text-indigo-900 font-medium">Read more →</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
