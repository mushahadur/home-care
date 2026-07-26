@extends('backend.layouts.app')

@section('title', 'My Profile - NurseNextDoor')

@section('content')
<!-- Main content area -->
<main class="flex-1 overflow-y-auto p-5 md:p-8 bg-gray-50 dark:bg-gray-950 transition-colors">

    <!-- Breadcrumb -->
    <h3 class="text-sm font-bold pb-3">
        <a href="/dashboard" class="hover:underline text-blue-600">Dashboard</a>
        <span class="mx-2"> / </span>
        <span class="text-gray-700 dark:text-gray-300">Profile</span>
    </h3>

    <div class="space-y-6">

        <!-- ============================================================ -->
        <!-- PROFILE HEADER CARD -->
        <!-- ============================================================ -->
        <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl shadow-sm dark:shadow-none overflow-hidden">
            <div class="relative">
                <!-- Cover Image / Banner -->
                <div class="h-32 md:h-48 w-full bg-gradient-to-r from-emerald-500 to-blue-500 dark:from-emerald-600 dark:to-blue-600 relative">
                    <button class="absolute bottom-3 right-3 bg-white/20 hover:bg-white/30 text-white text-xs font-medium px-3 py-1.5 rounded-lg backdrop-blur-sm border border-white/30 transition">
                        <i class="fas fa-camera mr-1"></i> Change Cover
                    </button>
                </div>

                <!-- Profile Avatar & Info -->
                <div class="px-6 pb-6 relative">
                    <div class="flex flex-col sm:flex-row items-start sm:items-end -mt-12 gap-4">
                        <!-- Avatar -->
                        <div class="relative group">
                            <div class="w-24 h-24 md:w-28 md:h-28 rounded-full border-4 border-white dark:border-gray-800 bg-gray-200 dark:bg-gray-700 overflow-hidden shadow-lg">
                                <img src="https://ui-avatars.com/api/?name=Admin+User&background=8b5cf6&color=fff&size=128" 
                                     alt="Profile Avatar"
                                     class="w-full h-full object-cover">
                            </div>
                            <button class="absolute bottom-0 right-0 bg-emerald-600 hover:bg-emerald-700 text-white rounded-full w-7 h-7 flex items-center justify-center text-xs shadow-md transition border-2 border-white dark:border-gray-800">
                                <i class="fas fa-camera"></i>
                            </button>
                        </div>

                        <!-- Name & Role -->
                        <div class="flex-1">
                            <h1 class="text-2xl md:text-3xl font-bold text-gray-900 dark:text-gray-100">
                                {{ Auth::user()->name ?? 'Admin User' }}
                            </h1>
                            <div class="flex flex-wrap items-center gap-2 mt-1">
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-emerald-100 dark:bg-emerald-900/40 text-emerald-700 dark:text-emerald-300">
                                    <i class="fas fa-circle text-[6px] text-emerald-500"></i>
                                    {{ Auth::user()->role ?? 'Administrator' }}
                                </span>
                                <span class="text-sm text-gray-500 dark:text-gray-400">
                                    <i class="far fa-envelope mr-1"></i> {{ Auth::user()->email ?? 'admin@example.com' }}
                                </span>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex gap-2 self-start sm:self-end mt-2 sm:mt-0 w-full sm:w-auto">
                            <button class="flex-1 sm:flex-none px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-medium rounded-lg transition shadow-sm">
                                <i class="fas fa-user-edit mr-1.5"></i> Edit Profile
                            </button>
                            <button class="flex-1 sm:flex-none px-4 py-2 bg-gray-100 dark:bg-gray-800 hover:bg-gray-200 dark:hover:bg-gray-700 text-gray-700 dark:text-gray-300 text-sm font-medium rounded-lg transition border border-gray-300 dark:border-gray-600">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ============================================================ -->
        <!-- STATS CARDS ROW -->
        <!-- ============================================================ -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl p-4 shadow-sm">
                <div class="flex items-center gap-3">
                    <div class="p-2.5 bg-emerald-100 dark:bg-emerald-900/30 rounded-lg">
                        <i class="fas fa-tasks text-emerald-600 dark:text-emerald-400"></i>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 dark:text-gray-400">Total Services</p>
                        <p class="text-xl font-bold text-gray-900 dark:text-gray-100">48</p>
                    </div>
                </div>
            </div>
            <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl p-4 shadow-sm">
                <div class="flex items-center gap-3">
                    <div class="p-2.5 bg-blue-100 dark:bg-blue-900/30 rounded-lg">
                        <i class="fas fa-users text-blue-600 dark:text-blue-400"></i>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 dark:text-gray-400">Patients</p>
                        <p class="text-xl font-bold text-gray-900 dark:text-gray-100">1,284</p>
                    </div>
                </div>
            </div>
            <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl p-4 shadow-sm">
                <div class="flex items-center gap-3">
                    <div class="p-2.5 bg-amber-100 dark:bg-amber-900/30 rounded-lg">
                        <i class="fas fa-calendar-check text-amber-600 dark:text-amber-400"></i>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 dark:text-gray-400">Appointments</p>
                        <p class="text-xl font-bold text-gray-900 dark:text-gray-100">327</p>
                    </div>
                </div>
            </div>
            <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl p-4 shadow-sm">
                <div class="flex items-center gap-3">
                    <div class="p-2.5 bg-rose-100 dark:bg-rose-900/30 rounded-lg">
                        <i class="fas fa-star text-rose-600 dark:text-rose-400"></i>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 dark:text-gray-400">Rating</p>
                        <p class="text-xl font-bold text-gray-900 dark:text-gray-100">4.9</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- ============================================================ -->
        <!-- TWO COLUMN LAYOUT: Profile Info + Activity -->
        <!-- ============================================================ -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            <!-- ===================== LEFT COLUMN ===================== -->
            <div class="lg:col-span-2 space-y-6">

                <!-- About Me Card -->
                <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl p-6 shadow-sm">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4 flex items-center gap-2">
                        <i class="fas fa-user-circle text-emerald-500"></i>
                        About Me
                    </h3>
                    <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
                        Dedicated healthcare professional with over 8 years of experience in home nursing and patient care. 
                        Passionate about delivering compassionate, high-quality care to patients in the comfort of their homes. 
                        Specialized in geriatric care, post-operative support, and chronic disease management.
                    </p>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-5 pt-5 border-t border-gray-200 dark:border-gray-700">
                        <div>
                            <p class="text-xs text-gray-500 dark:text-gray-400">Full Name</p>
                            <p class="font-medium text-gray-800 dark:text-gray-200">{{ Auth::user()->name ?? 'Admin User' }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500 dark:text-gray-400">Email Address</p>
                            <p class="font-medium text-gray-800 dark:text-gray-200">{{ Auth::user()->email ?? 'admin@example.com' }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500 dark:text-gray-400">Phone Number</p>
                            <p class="font-medium text-gray-800 dark:text-gray-200">+880 1XXX-XXXXXX</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500 dark:text-gray-400">Member Since</p>
                            <p class="font-medium text-gray-800 dark:text-gray-200">January 2024</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500 dark:text-gray-400">Specialization</p>
                            <p class="font-medium text-gray-800 dark:text-gray-200">Home Nursing, Geriatric Care</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500 dark:text-gray-400">Location</p>
                            <p class="font-medium text-gray-800 dark:text-gray-200">Brahmanbaria, Bangladesh</p>
                        </div>
                    </div>
                </div>

                <!-- Recent Activity Card -->
                <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl p-6 shadow-sm">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 flex items-center gap-2">
                            <i class="fas fa-clock text-emerald-500"></i>
                            Recent Activity
                        </h3>
                        <a href="#" class="text-sm text-emerald-600 dark:text-emerald-400 hover:underline">View All</a>
                    </div>

                    <div class="space-y-4">
                        <!-- Activity Item 1 -->
                        <div class="flex items-start gap-3 p-3 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800/50 transition">
                            <div class="w-9 h-9 rounded-full bg-emerald-100 dark:bg-emerald-900/30 flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-hand-holding-heart text-emerald-600 dark:text-emerald-400 text-sm"></i>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-800 dark:text-gray-200">Completed home visit</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">Patient: Mrs. Fatema Begum · Brahmanbaria</p>
                            </div>
                            <span class="text-xs text-gray-400 dark:text-gray-500 flex-shrink-0">2 hours ago</span>
                        </div>

                        <!-- Activity Item 2 -->
                        <div class="flex items-start gap-3 p-3 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800/50 transition">
                            <div class="w-9 h-9 rounded-full bg-blue-100 dark:bg-blue-900/30 flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-notes-medical text-blue-600 dark:text-blue-400 text-sm"></i>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-800 dark:text-gray-200">Updated patient records</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">Updated 3 patient profiles</p>
                            </div>
                            <span class="text-xs text-gray-400 dark:text-gray-500 flex-shrink-0">5 hours ago</span>
                        </div>

                        <!-- Activity Item 3 -->
                        <div class="flex items-start gap-3 p-3 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800/50 transition">
                            <div class="w-9 h-9 rounded-full bg-amber-100 dark:bg-amber-900/30 flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-calendar-plus text-amber-600 dark:text-amber-400 text-sm"></i>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-800 dark:text-gray-200">Scheduled new appointment</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">IV Injection · Tomorrow 10:00 AM</p>
                            </div>
                            <span class="text-xs text-gray-400 dark:text-gray-500 flex-shrink-0">1 day ago</span>
                        </div>

                        <!-- Activity Item 4 -->
                        <div class="flex items-start gap-3 p-3 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800/50 transition">
                            <div class="w-9 h-9 rounded-full bg-rose-100 dark:bg-rose-900/30 flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-star text-rose-600 dark:text-rose-400 text-sm"></i>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-800 dark:text-gray-200">Received 5-star rating</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">From Mr. Kamal Hossain</p>
                            </div>
                            <span class="text-xs text-gray-400 dark:text-gray-500 flex-shrink-0">2 days ago</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ===================== RIGHT COLUMN ===================== -->
            <div class="space-y-6">

                <!-- Quick Actions Card -->
                <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl p-6 shadow-sm">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4 flex items-center gap-2">
                        <i class="fas fa-bolt text-emerald-500"></i>
                        Quick Actions
                    </h3>
                    <div class="space-y-2">
                        <a href="#" class="flex items-center gap-3 px-4 py-2.5 rounded-lg bg-gray-50 dark:bg-gray-800 hover:bg-emerald-50 dark:hover:bg-emerald-900/20 transition group">
                            <i class="fas fa-user-edit text-gray-400 group-hover:text-emerald-500 transition"></i>
                            <span class="text-sm text-gray-700 dark:text-gray-300 group-hover:text-emerald-600 dark:group-hover:text-emerald-400 transition">Edit Profile</span>
                            <i class="fas fa-chevron-right text-xs text-gray-400 ml-auto"></i>
                        </a>
                        <a href="#" class="flex items-center gap-3 px-4 py-2.5 rounded-lg bg-gray-50 dark:bg-gray-800 hover:bg-emerald-50 dark:hover:bg-emerald-900/20 transition group">
                            <i class="fas fa-key text-gray-400 group-hover:text-emerald-500 transition"></i>
                            <span class="text-sm text-gray-700 dark:text-gray-300 group-hover:text-emerald-600 dark:group-hover:text-emerald-400 transition">Change Password</span>
                            <i class="fas fa-chevron-right text-xs text-gray-400 ml-auto"></i>
                        </a>
                        <a href="#" class="flex items-center gap-3 px-4 py-2.5 rounded-lg bg-gray-50 dark:bg-gray-800 hover:bg-emerald-50 dark:hover:bg-emerald-900/20 transition group">
                            <i class="fas fa-bell text-gray-400 group-hover:text-emerald-500 transition"></i>
                            <span class="text-sm text-gray-700 dark:text-gray-300 group-hover:text-emerald-600 dark:group-hover:text-emerald-400 transition">Notification Settings</span>
                            <i class="fas fa-chevron-right text-xs text-gray-400 ml-auto"></i>
                        </a>
                        <a href="#" class="flex items-center gap-3 px-4 py-2.5 rounded-lg bg-gray-50 dark:bg-gray-800 hover:bg-emerald-50 dark:hover:bg-emerald-900/20 transition group">
                            <i class="fas fa-sign-out-alt text-gray-400 group-hover:text-red-500 transition"></i>
                            <span class="text-sm text-gray-700 dark:text-gray-300 group-hover:text-red-600 dark:group-hover:text-red-400 transition">Logout</span>
                            <i class="fas fa-chevron-right text-xs text-gray-400 ml-auto"></i>
                        </a>
                    </div>
                </div>

                <!-- Skills / Certifications Card -->
                <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl p-6 shadow-sm">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4 flex items-center gap-2">
                        <i class="fas fa-certificate text-emerald-500"></i>
                        Certifications
                    </h3>
                    <div class="space-y-3">
                        <div class="flex items-center gap-3">
                            <div class="w-2 h-2 rounded-full bg-emerald-500"></div>
                            <span class="text-sm text-gray-700 dark:text-gray-300">Basic Life Support (BLS)</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-2 h-2 rounded-full bg-emerald-500"></div>
                            <span class="text-sm text-gray-700 dark:text-gray-300">Advanced Cardiac Life Support (ACLS)</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-2 h-2 rounded-full bg-emerald-500"></div>
                            <span class="text-sm text-gray-700 dark:text-gray-300">Geriatric Nursing Certification</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-2 h-2 rounded-full bg-gray-300 dark:bg-gray-600"></div>
                            <span class="text-sm text-gray-400 dark:text-gray-500">Wound Care Specialist <span class="text-xs">(Pending)</span></span>
                        </div>
                    </div>
                    <button class="mt-4 w-full px-4 py-2 text-sm font-medium text-emerald-600 dark:text-emerald-400 border border-emerald-200 dark:border-emerald-800 rounded-lg hover:bg-emerald-50 dark:hover:bg-emerald-900/20 transition">
                        <i class="fas fa-plus mr-1.5"></i> Add Certification
                    </button>
                </div>

                <!-- Availability Status Card -->
                <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl p-6 shadow-sm">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4 flex items-center gap-2">
                        <i class="fas fa-calendar-alt text-emerald-500"></i>
                        Availability
                    </h3>
                    <div class="flex items-center justify-between p-3 bg-gray-50 dark:bg-gray-800 rounded-lg">
                        <div class="flex items-center gap-2">
                            <div class="w-2.5 h-2.5 rounded-full bg-emerald-500 animate-pulse"></div>
                            <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Available for new patients</span>
                        </div>
                        <span class="text-xs text-gray-500 dark:text-gray-400">Accepting</span>
                    </div>
                    <div class="flex flex-wrap gap-2 mt-3">
                        <span class="px-2.5 py-1 text-xs font-medium bg-gray-100 dark:bg-gray-800 text-gray-600 dark:text-gray-400 rounded-lg">Mon 9–5</span>
                        <span class="px-2.5 py-1 text-xs font-medium bg-gray-100 dark:bg-gray-800 text-gray-600 dark:text-gray-400 rounded-lg">Tue 9–5</span>
                        <span class="px-2.5 py-1 text-xs font-medium bg-gray-100 dark:bg-gray-800 text-gray-600 dark:text-gray-400 rounded-lg">Wed 9–5</span>
                        <span class="px-2.5 py-1 text-xs font-medium bg-gray-100 dark:bg-gray-800 text-gray-600 dark:text-gray-400 rounded-lg">Thu 9–5</span>
                        <span class="px-2.5 py-1 text-xs font-medium bg-gray-100 dark:bg-gray-800 text-gray-600 dark:text-gray-400 rounded-lg">Fri 9–1</span>
                    </div>
                </div>
            </div>

        </div><!-- /grid -->
    </div><!-- /space-y-6 -->

</main>
@endsection