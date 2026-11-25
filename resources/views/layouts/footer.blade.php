<footer class="bg-[#142D4E] text-white pt-12 sm:pt-16 pb-8 border-t border-[#F28C28]/30 mt-auto">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 mb-10 sm:mb-12">

        <!-- Brand Info -->
        <div class="space-y-4">
            <span class="text-2xl font-extrabold tracking-wider text-white inline-block">
                APEX<span class="text-[#F28C28]">ROOFING</span>
            </span>
            <p class="text-white/80 text-sm leading-relaxed font-normal">
                Licensed & Insured USA Roofing Contractors providing premium residential and commercial roofing solutions across America.
            </p>
        </div>

        <!-- Quick Links -->
        <div>
            <h4 class="font-extrabold text-white text-base sm:text-lg mb-4 flex items-center gap-2">
                <span class="w-1.5 h-4 bg-[#F28C28] rounded-full inline-block"></span>
                Quick Links
            </h4>
            <ul class="space-y-2.5 text-sm text-white/80 font-medium">
                <li><a href="{{ route('home') }}" class="hover:text-[#F28C28] transition-colors">Home</a></li>
                <li><a href="{{ route('about') }}" class="hover:text-[#F28C28] transition-colors">About Company</a></li>
                <li><a href="{{ route('services') }}" class="hover:text-[#F28C28] transition-colors">Roofing Services</a></li>
                <li><a href="{{ route('projects') }}" class="hover:text-[#F28C28] transition-colors">Before & After Gallery</a></li>
                <li><a href="{{ route('quote') }}" class="hover:text-[#F28C28] transition-colors">Get Free Estimate</a></li>
            </ul>
        </div>

        <!-- Services -->
        <div>
            <h4 class="font-extrabold text-white text-base sm:text-lg mb-4 flex items-center gap-2">
                <span class="w-1.5 h-4 bg-[#F28C28] rounded-full inline-block"></span>
                Services
            </h4>
            <ul class="space-y-2.5 text-sm text-white/80 font-medium">
                <li><a href="{{ route('services') }}" class="hover:text-[#F28C28] transition-colors">Roof Replacement</a></li>
                <li><a href="{{ route('services') }}" class="hover:text-[#F28C28] transition-colors">Emergency Repair</a></li>
                <li><a href="{{ route('services') }}" class="hover:text-[#F28C28] transition-colors">Commercial TPO</a></li>
                <li><a href="{{ route('services') }}" class="hover:text-[#F28C28] transition-colors">Gutter Protection</a></li>
            </ul>
        </div>

        <!-- Emergency Contact -->
        <div>
            <h4 class="font-extrabold text-white text-base sm:text-lg mb-4 flex items-center gap-2">
                <span class="w-1.5 h-4 bg-[#F28C28] rounded-full inline-block"></span>
                Emergency Contact
            </h4>
            <p class="text-[#F28C28] text-xs sm:text-sm font-semibold uppercase tracking-wider">24/7 Rapid Response Unit</p>
            <div class="mt-3 inline-block bg-[#F28C28] hover:bg-[#d97a1c] px-4 py-2 rounded-xl shadow-lg transition-all">
                <a href="tel:18005557663" class="text-lg font-black text-[#142D4E] hover:underline flex items-center gap-2">
                    <span>📞</span> 1-800-555-ROOF
                </a>
            </div>
            <p class="text-white/80 text-xs sm:text-sm mt-3 font-medium">
                ✉️ <a href="mailto:support@apexroofingpro.com" class="hover:text-[#F28C28] transition-colors break-all">support@apexroofingpro.com</a>
            </p>
        </div>

    </div>

    <!-- Bottom Copyright -->
    <div class="border-t border-white/15 text-center text-xs text-white/70 pt-6 px-4 font-medium">
        &copy; {{ date('Y') }} Apex Roofing Pro. All Rights Reserved. Licensed, Bonded & Insured.
    </div>
</footer>