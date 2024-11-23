<!DOCTYPE html>
<html class="h-full bg-white">

<head>
    <meta charset="UTF-8">
    <link href="/css/tailwind.css" rel="stylesheet">
    <script src="/js/script.js"></script>
    <title>Login</title>
</head>

<body>
<div class="min-h-screen bg-gradient-to-b from-teal-50 via-blue-50 to-yellow-50 text-gray-900">
  <!-- Enhanced Navbar -->
  <header class="bg-white/70 backdrop-blur-md fixed top-0 w-full z-50 shadow-md">
    <div class="container mx-auto flex justify-between items-center py-4 px-6">
      <div class="text-4xl font-extrabold text-blue-600 tracking-wide">MyLibrary</div>
      <nav class="flex space-x-6">
        <a href="#" class="text-blue-700 hover:text-teal-600 transition duration-300">Home</a>
        <a href="#" class="text-blue-700 hover:text-teal-600 transition duration-300">Catalog</a>
        <a href="#" class="text-blue-700 hover:text-teal-600 transition duration-300">Events</a>
        <a href="/register" class="px-5 py-2 bg-gradient-to-r from-teal-600 to-blue-600 text-white rounded-full shadow-lg hover:shadow-xl transform hover:scale-105 transition-transform">
          Sign Up
        </a>
      </nav>
    </div>
  </header>

  <!-- Hero Section -->
  <section class="flex flex-col md:flex-row items-center justify-between container mx-auto py-24 px-8 mt-20">
    <div class="flex-1 md:pr-10">
      <h1 class="text-6xl font-extrabold text-blue-800 mb-6 animate-slide-in">Explore Your Library's Wonders</h1>
      <p class="text-lg text-gray-700 mb-8">A place to discover stories, knowledge, and community experiences that last a lifetime.</p>
      <button class="px-6 py-3 bg-teal-600 text-white rounded-full shadow-md hover:shadow-lg transition-transform transform hover:translate-y-1">
        Start Your Journey
      </button>
    </div>
    <div class="flex-1 mt-10 md:mt-0">
      <img src="https://via.placeholder.com/500x400" alt="Library Scene" class="w-full max-w-lg rounded-lg shadow-lg hover:scale-105 transition-transform">
    </div>
  </section>

  <!-- Library Features -->
  <section class="grid grid-cols-1 md:grid-cols-3 gap-10 container mx-auto p-10">
    <div class="bg-white p-8 rounded-2xl shadow-xl transform hover:scale-105 transition-transform duration-500">
      <h2 class="text-2xl font-bold text-teal-700 mb-4">Extensive Book Collection</h2>
      <p class="text-gray-600">Find books across all genres, curated to match your reading preferences.</p>
    </div>
    <div class="bg-white p-8 rounded-2xl shadow-xl transform hover:scale-105 transition-transform duration-500">
      <h2 class="text-2xl font-bold text-teal-700 mb-4">Reading Spaces</h2>
      <p class="text-gray-600">Comfortable and quiet areas to immerse yourself in your favorite books.</p>
    </div>
    <div class="bg-white p-8 rounded-2xl shadow-xl transform hover:scale-105 transition-transform duration-500">
      <h2 class="text-2xl font-bold text-teal-700 mb-4">Community Events</h2>
      <p class="text-gray-600">Join our workshops, book clubs, and author meet-and-greets.</p>
    </div>
  </section>

  <!-- Gallery Section -->
  <section class="container mx-auto p-10">
    <h2 class="text-4xl font-bold text-blue-800 mb-6 text-center">Gallery</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
      <img src="https://via.placeholder.com/500x400" alt="Library Interior" class="rounded-lg shadow-md hover:shadow-xl transform hover:scale-105 transition-transform">
      <img src="https://via.placeholder.com/500x400" alt="Bookshelves" class="rounded-lg shadow-md hover:shadow-xl transform hover:scale-105 transition-transform">
      <img src="https://via.placeholder.com/500x400" alt="Reading Area" class="rounded-lg shadow-md hover:shadow-xl transform hover:scale-105 transition-transform">
    </div>
  </section>

  <!-- Testimonials Section -->
  <section class="bg-blue-50 py-16">
    <h2 class="text-4xl font-bold text-teal-800 text-center mb-10">What Our Visitors Say</h2>
    <div class="container mx-auto grid grid-cols-1 md:grid-cols-2 gap-10">
      <div class="bg-white p-6 rounded-xl shadow-lg">
        <p class="text-gray-700 mb-4">"This library is my favorite place to unwind and get lost in new stories. The atmosphere is perfect!"</p>
        <span class="block text-teal-600 font-bold">- Sarah L.</span>
      </div>
      <div class="bg-white p-6 rounded-xl shadow-lg">
        <p class="text-gray-700 mb-4">"The events hosted here are great for connecting with other book lovers and discovering new authors."</p>
        <span class="block text-teal-600 font-bold">- James W.</span>
      </div>
    </div>
  </section>

  <!-- Contact Form -->
  <section class="container mx-auto py-16">
    <h2 class="text-4xl font-bold text-blue-800 text-center mb-8">Get in Touch</h2>
    <form class="bg-white p-10 rounded-xl shadow-xl space-y-6">
      <input type="text" placeholder="Your Name" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-teal-600">
      <input type="email" placeholder="Your Email" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-teal-600">
      <textarea placeholder="Your Message" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-teal-600"></textarea>
      <button type="submit" class="px-5 py-2 bg-teal-600 text-white rounded-full shadow-lg hover:shadow-xl transform hover:scale-105 transition-transform">
        Send Message
      </button>
    </form>
  </section>

  <!-- Footer -->
  <footer class="bg-gradient-to-r from-teal-500 to-blue-500 py-6 text-white text-center">
    <p>© 2024 MyLibrary. Connecting you with knowledge and stories.</p>
  </footer>
</div>
</body>