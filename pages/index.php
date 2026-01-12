<?php 
// Start session if not started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include '../includes/header.php'; 
?>

<main class="flex-grow">
    <section class="bg-gradient-to-r from-blue-700 to-indigo-800 text-white py-20 px-6 animate-fade-in">
        <div class="container mx-auto flex flex-col md:flex-row items-center justify-between">
            <div class="md:w-1/2 mb-10 md:mb-0 text-center md:text-left">
                <h1 class="text-5xl font-extrabold leading-tight mb-6">Empower Your Future <br>with Kuppiya.</h1>
                <p class="text-blue-100 text-xl mb-8 max-w-lg mx-auto md:mx-0">Unlock your potential with expert-led courses, engaging content, and a supportive learning community.</p>
                <div class="flex justify-center md:justify-start space-x-4">
                    <a href="courses.php" class="bg-orange-500 hover:bg-orange-600 px-8 py-4 rounded-full font-bold transition duration-300 shadow-lg transform hover:scale-105 btn-hover-bounce">Explore Courses</a>
                    <a href="about.php" class="bg-white text-blue-700 hover:bg-gray-100 px-8 py-4 rounded-full font-bold transition duration-300 shadow-lg transform hover:scale-105 btn-hover-bounce">Learn More</a>
                </div>
            </div>
            <div class="md:w-1/2">
                <img src="https://illustrations.popsy.co/white/studying.svg" alt="Students studying online" class="w-full max-w-md mx-auto transform hover:scale-105 transition duration-500 ease-in-out">
            </div>
        </div>
    </section>

    <section class="py-16 container mx-auto px-6">
        <h2 class="text-4xl font-bold text-center text-gray-800 mb-12 fade-in">Why Choose Kuppiya?</h2>
        <div class="grid md:grid-cols-3 gap-10">
            <div class="bg-white p-8 rounded-2xl shadow-md border-t-4 border-blue-600 hover:border-orange-500 transition duration-300 card-hover-scale fade-in">
                <div class="w-16 h-16 bg-blue-100 text-blue-700 rounded-full flex items-center justify-center mx-auto mb-6 text-3xl shadow-inner">
                    <i class="fas fa-book-reader"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-3 text-center">Comprehensive Curriculum</h3>
                <p class="text-gray-600 text-center leading-relaxed">Dive deep into subjects with our meticulously crafted lesson plans, designed for clarity and depth from beginner to advanced levels.</p>
            </div>
            <div class="bg-white p-8 rounded-2xl shadow-md border-t-4 border-blue-600 hover:border-orange-500 transition duration-300 card-hover-scale fade-in" style="animation-delay: 0.2s;">
                <div class="w-16 h-16 bg-blue-100 text-blue-700 rounded-full flex items-center justify-center mx-auto mb-6 text-3xl shadow-inner">
                    <i class="fas fa-chalkboard-teacher"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-3 text-center">Expert Instructors</h3>
                <p class="text-gray-600 text-center leading-relaxed">Learn from industry experts and passionate educators who bring real-world experience and enthusiasm to every lesson.</p>
            </div>
            <div class="bg-white p-8 rounded-2xl shadow-md border-t-4 border-blue-600 hover:border-orange-500 transition duration-300 card-hover-scale fade-in" style="animation-delay: 0.4s;">
                <div class="w-16 h-16 bg-blue-100 text-blue-700 rounded-full flex items-center justify-center mx-auto mb-6 text-3xl shadow-inner">
                    <i class="fas fa-users-class"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-3 text-center">Interactive Learning</h3>
                <p class="text-gray-600 text-center leading-relaxed">Engage with quizzes, assignments, and live Q&A sessions designed to make learning dynamic and effective.</p>
            </div>
        </div>
    </section>

    <section class="bg-blue-600 text-white py-16 px-6 mt-12">
        <div class="container mx-auto text-center">
            <h2 class="text-4xl font-bold mb-6 fade-in">Ready to Start Your Learning Journey?</h2>
            <p class="text-blue-100 text-xl mb-8 max-w-3xl mx-auto fade-in" style="animation-delay: 0.2s;">Join thousands of students who are achieving their academic and professional goals with Kuppiya.</p>
            <a href="courses.php" class="bg-orange-500 hover:bg-orange-600 px-10 py-4 rounded-full font-bold text-lg transition duration-300 shadow-xl transform hover:scale-105 btn-hover-bounce fade-in" style="animation-delay: 0.4s;">View All Courses</a>
        </div>
    </section>
</main>

<?php include '../includes/footer.php'; ?>