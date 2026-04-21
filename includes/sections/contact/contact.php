<!-- Contact Section -->
<section id="contact" class="contact-section bg-white relative overflow-hidden section-animate">

    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-8 sm:mb-12 text-animate">
            <h2 class="contact-title text-xl sm:text-2xl md:text-3xl lg:text-4xl xl:text-5xl font-bold text-gray-900 mb-3 sm:mb-4 px-4 sm:px-0">Contact us</h2>
            <p class="contact-subtitle text-base sm:text-lg md:text-xl text-gray-600 max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
                We're ready to discuss your needs and how we can help improve your telecommunications services.
            </p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 sm:gap-8 px-4 sm:px-0 stagger-container">
            <!-- Contact Information -->
            <div class="order-2 md:order-1 card-animate">
                <div class="contact-info bg-gray-50 rounded-lg p-4 sm:p-6 md:p-8 hover-lift hover-glow card-animate">
                    <h3 class="contact-info-title text-lg sm:text-xl font-semibold text-gray-900 mb-4 sm:mb-6 text-animate">Contact Information</h3>
                    <div class="space-y-4 sm:space-y-6 stagger-container">
                        <div class="contact-item flex items-start hover-scale card-animate">
                            <i class="fas fa-envelope text-primary mr-3 sm:mr-4 text-lg sm:text-xl mt-1 flex-shrink-0 icon-animate"></i>
                            <div>
                                <div class="font-semibold text-gray-900 text-sm sm:text-base">Email</div>
                                <a href="mailto:info@dezimal.rs" class="text-primary hover:underline text-sm sm:text-base break-all hover-glow">info@dezimal.rs</a>
                            </div>
                        </div>
                        <div class="contact-item flex items-start hover-scale card-animate">
                            <i class="fas fa-phone text-primary mr-3 sm:mr-4 text-lg sm:text-xl mt-1 flex-shrink-0 icon-animate"></i>
                            <div>
                                <div class="font-semibold text-gray-900 text-sm sm:text-base">Phone</div>
                                <a href="tel:+381666776733" class="text-primary hover:underline text-sm sm:text-base hover-glow">+381 66 677 6733</a>
                            </div>
                        </div>
                        <div class="contact-item flex items-start hover-scale card-animate">
                            <i class="fas fa-clock text-primary mr-3 sm:mr-4 text-lg sm:text-xl mt-1 flex-shrink-0 icon-animate"></i>
                            <div>
                                <div class="font-semibold text-gray-900 text-sm sm:text-base">Working hours</div>
                                <div class="text-gray-600 text-sm sm:text-base">Monday - Friday: 9:00 - 17:00</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Contact Form -->
            <div class="order-1 md:order-2 card-animate">
                <form class="contact-form bg-gray-50 rounded-lg p-4 sm:p-6 md:p-8 hover-lift hover-glow card-animate" id="contactForm">
                    <h3 class="contact-form-title text-lg sm:text-xl font-semibold text-gray-900 mb-4 sm:mb-6 text-animate">Send a message</h3>
                    <div class="space-y-4 stagger-container">
                        <div class="form-group card-animate">
                            <label class="block text-xs sm:text-sm font-medium text-gray-700 mb-1 sm:mb-2">Full name</label>
                            <input type="text" name="name" class="w-full px-3 sm:px-4 py-2 sm:py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent text-sm sm:text-base transition-all duration-300 hover:border-primary focus:shadow-lg hover-lift" required>
                        </div>
                        <div class="form-group card-animate">
                            <label class="block text-xs sm:text-sm font-medium text-gray-700 mb-1 sm:mb-2">Email address</label>
                            <input type="email" name="email" class="w-full px-3 sm:px-4 py-2 sm:py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent text-sm sm:text-base transition-all duration-300 hover:border-primary focus:shadow-lg hover-lift" required>
                        </div>
                        <div class="form-group card-animate">
                            <label class="block text-xs sm:text-sm font-medium text-gray-700 mb-1 sm:mb-2">Company</label>
                            <input type="text" name="company" class="w-full px-3 sm:px-4 py-2 sm:py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent text-sm sm:text-base transition-all duration-300 hover:border-primary focus:shadow-lg hover-lift">
                        </div>
                        <div class="form-group card-animate">
                            <label class="block text-xs sm:text-sm font-medium text-gray-700 mb-1 sm:mb-2">Message</label>
                            <textarea name="message" rows="4" class="w-full px-3 sm:px-4 py-2 sm:py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent text-sm sm:text-base resize-none transition-all duration-300 hover:border-primary focus:shadow-lg hover-lift" placeholder="Describe your project or needs..." required></textarea>
                        </div>
                        <div class="form-group checkbox-group card-animate">
                            <div class="custom-checkbox">
                                <input type="checkbox" id="privacy" name="privacy" required>
                                <label for="privacy" class="checkbox-label">
                                    <span class="checkbox-text text-xs sm:text-sm text-gray-600">
                                        I agree to the <a href="/legal.php#terms" class="text-primary hover:underline">Terms & Conditions</a> and <a href="/legal.php#privacy" class="text-primary hover:underline">Privacy Policy</a>
                                    </span>
                                </label>
                            </div>
                        </div>
                        <button type="submit" class="contact-submit w-full bg-primary text-white py-2 sm:py-3 px-4 sm:px-6 rounded-lg font-semibold hover:bg-blue-700 transition-all duration-300 hover-lift hover-glow text-sm sm:text-base group btn-animate">
                            <i class="fas fa-paper-plane mr-2 group-hover:translate-x-1 transition-transform duration-300"></i>
                            Send message
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
