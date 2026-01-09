<?php
require_once 'config/database.php';
include 'includes/header.php';
?>

<!-- Hero Section -->
<div class="bg-gradient-to-r from-indigo-500 to-purple-600 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl font-bold mb-4">Welcome to Kuppiya</h1>
        <p class="text-xl mb-8">Your Campus Assignments Marketplace</p>
        <a href="#assignments" class="bg-white text-indigo-600 px-6 py-3 rounded-lg font-semibold hover:bg-gray-100 transition duration-300">
            Browse Assignments
        </a>
    </div>
</div>

<!-- Features Section -->
<div class="py-12 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center">
                <div class="bg-indigo-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-graduation-cap text-indigo-600 text-2xl"></i>
                </div>
                <h3 class="text-lg font-semibold mb-2">Student-to-Student</h3>
                <p class="text-gray-600">Buy and sell assignments directly with fellow students</p>
            </div>
            
            <div class="text-center">
                <div class="bg-indigo-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-shield-alt text-indigo-600 text-2xl"></i>
                </div>
                <h3 class="text-lg font-semibold mb-2">Quality Guaranteed</h3>
                <p class="text-gray-600">All assignments are reviewed for quality assurance</p>
            </div>
            
            <div class="text-center">
                <div class="bg-indigo-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-bolt text-indigo-600 text-2xl"></i>
                </div>
                <h3 class="text-lg font-semibold mb-2">Fast Delivery</h3>
                <p class="text-gray-600">Get your assignments delivered within deadlines</p>
            </div>
        </div>
    </div>
</div>

<!-- Assignments Section -->
<div id="assignments" class="py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-gray-900 mb-8">Featured Assignments</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Assignment cards will go here -->
            <!-- You can populate these from database -->
        </div>
    </div>
</div>

<?php
// Display messages
if (isset($_SESSION['error'])) {
    echo '<script>alert("' . $_SESSION['error'] . '");</script>';
    unset($_SESSION['error']);
}
if (isset($_SESSION['success'])) {
    echo '<script>alert("' . $_SESSION['success'] . '");</script>';
    unset($_SESSION['success']);
}
?>

<?php include 'includes/footer.php'; ?>