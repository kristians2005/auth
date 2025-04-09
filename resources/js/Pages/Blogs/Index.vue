<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { usePage } from '@inertiajs/vue3';

defineProps({
    blogs: Array,
});

// const page = usePage();
// console.log(page.props.blogs);



</script>

<template>
    <AppLayout title="Blog Posts">
        <template #header>
            <div class="flex justify-between items-center">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Blog Posts
                </h2>
                <button class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 transition duration-150">
                    Create New Post
                </button>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-6">Latest Blog Posts</h3>
                        <div class="space-y-6">
                            <div v-for="blog in blogs" :key="blog.id" class="border-b border-gray-200 pb-6 last:border-0">
                                <h4 class="text-xl font-semibold text-gray-900 mb-2">{{ blog.title }}</h4>
                                <p class="text-gray-600 mb-4">{{ blog.content }}</p>
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0">
                                            <span class="inline-flex items-center justify-center h-8 w-8 rounded-full bg-gray-500">
                                                <span class="text-sm font-medium leading-none text-white">{{ blog.author.charAt(0) }}</span>
                                            </span>
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-sm font-medium text-gray-900">{{ blog.author }}</p>
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


