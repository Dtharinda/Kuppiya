<?php 
// Start session if not started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include '../includes/header.php'; 
?>

<main class="flex-grow">
    <section class="bg-gradient-to-r from-blue-600 to-indigo-700 text-white py-20 px-6 text-center animate-fade-in">
        <h1 class="text-5xl font-extrabold mb-4">Get in Touch</h1>
        <p class="text-blue-100 text-xl max-w-2xl mx-auto">We're here to help! Reach out to us for any inquiries, support, or feedback.</p>
    </section>

    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-6 max-w-5xl">
            <div class="bg-white rounded-3xl shadow-2xl overflow-hidden flex flex-col md:flex-row fade-in">
                <div class="md:w-1/3 bg-blue-700 p-10 text-white">
                    <h3 class="text-3xl font-bold mb-6">Contact Information</h3>
                    <p class="mb-8 text-blue-100 text-sm leading-relaxed">
                        Have questions about our courses, need technical support, or just want to say hello? Our team is ready to assist you.
                    </p>
                    <div class="space-y-6 text-base">
                        <p><i class="fas fa-map-marker-alt mr-4 text-xl"></i> 123 Learning Lane, Colombo 00700, Sri Lanka</p>
                        <p><i class="fas fa-phone-alt mr-4 text-xl"></i> +94 71 234 5678</p>
                        <p><i class="fas fa-envelope mr-4 text-xl"></i> info@kuppiya.lk</p>
                        <p><i class="fas fa-clock mr-4 text-xl"></i> Mon - Fri: 9:00 AM - 5:00 PM (LKT)</p>
                    </div>
                </div>
                <div class="md:w-2/3 p-10">
                    <h3 class="text-3xl font-bold text-gray-800 mb-6">Send Us a Message</h3>
                    <form action="#" method="POST" class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <input type="text" name="name" placeholder="Your Name" class="border border-gray-300 p-3 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none transition duration-300">
                            <input type="email" name="email" placeholder="Your Email Address" class="border border-gray-300 p-3 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none transition duration-300">
                        </div>
                        <input type="text" name="subject" placeholder="Subject" class="w-full border border-gray-300 p-3 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none transition duration-300">
                        <textarea name="message" placeholder="Your Message" rows="6" class="w-full border border-gray-300 p-3 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none transition duration-300"></textarea>
                        <button type="submit" class="bg-blue-700 text-white w-full py-3 rounded-lg font-bold text-lg hover:bg-blue-800 transition duration-300 shadow-lg btn-hover-bounce">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 px-6">
        <div class="container mx-auto fade-in">
            <h2 class="text-4xl font-bold text-center text-gray-800 mb-12">Find Us on the Map</h2>
            <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.798485202864!2d79.8612437147728!3d6.91460399500055!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae25920d5f80b85%3A0x6d90d8a573b9d0e1!2sColombo!5e0!3m2!1sen!2slk!4v1678912345678!5m2!1sen!2slk"
                    width="100%"
                    height="450"
                    style="border:0;"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    class="rounded-b-3xl"
                ></iframe>
            </div>
        </div>
    </section>
</main>

<?php include '../includes/footer.php'; ?>