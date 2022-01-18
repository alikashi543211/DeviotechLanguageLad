<?php

use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';

// Front Routes
Route::namespace("Front")->group(function(){
    Route::get('/', 'HomeController@home')->name("home");
    Route::get('about', 'HomeController@about')->name("about");
    Route::get('contact', 'HomeController@contact')->name("contact");
    Route::post('contact', 'HomeController@contactMail')->name("contact.mail");
    Route::get('faqs', 'HomeController@faqs')->name("faqs");
    Route::get('terms', 'HomeController@terms')->name("terms");
    Route::get('teachers', 'HomeController@tutors')->name("tutors");
    Route::get('/detail/{username?}', 'HomeController@detail')->name("detail");
    Route::post('book/tutor', 'HomeController@book_tutor')->name("book.tutor");
    Route::get('tutor/register', 'HomeController@tutorRegister')->name("tutor.register");
    Route::get('verify-your-email', 'HomeController@verify_email')->name("verify_email");
    Route::get('user/login', function(){
        abort(404);
    });
    Route::post('user/login', 'LoginController@login')->name("front.login");

    Route::get('change/currency', function(){
        return true;
    })->name("change_currency")->middleware('change.currency');

    Route::get('day-slots', 'HomeController@daySlots')->name('day.slots');
    Route::get('check-bookings', 'HomeController@checkBookings')->name('check.bookings');
    Route::get('booking-details/{id?}', 'HomeController@bookingDetails')->name('booking.details');

    // Tutor Application Authenticated Routes
    Route::prefix('tutor/application')->name('tutor.application.')->middleware(['auth', 'verify_email', 'tutor'])->group(function() {
        Route::get('general', 'TutorApplicationController@general')->name('general');
        Route::get('lesson', 'TutorApplicationController@lesson')->name('lesson');
        Route::post('save-general', 'TutorApplicationController@saveGeneral')->name('general.save');
        Route::post('lesson', 'TutorApplicationController@saveLesson')->name('lesson.save');
        Route::post('certificate', 'TutorApplicationController@saveCertificate')->name('certificate.save');
        Route::get('certificate', 'TutorApplicationController@certificate')->name('certificate');
        Route::get('finish', 'TutorApplicationController@finish')->name('finish');
        // Resume and certificates
        Route::post('education-save', 'TutorApplicationController@saveEducation')->name('education.save');
        Route::post('experience-save', 'TutorApplicationController@saveExperience')->name('experience.save');
        Route::get('delete-experiance/{id?}', 'TutorApplicationController@delete_experience')->name('delete.experience');
        Route::get('delete-education/{id?}', 'TutorApplicationController@delete_education')->name('delete.education');
        // Ajax Routes For Certificate
        Route::get('load-experience-edit', 'TutorApplicationController@load_experience_edit')->name('load.experience.edit');
        Route::get('load-education-edit', 'TutorApplicationController@load_education_edit')->name('load.education.edit');
    });

    // Front Ajax Routes
    Route::get('tutor/about-me', 'HomeController@load_about_me')->name("load.tutor.about_me");
    Route::get('tutor/lessons', 'HomeController@load_lessons')->name("load.tutor.lessons");
    Route::get('tutor/calendar', 'HomeController@load_calendar')->name("load.tutor.calendar");
    Route::get('tutor/intervals', 'HomeController@load_intervals')->name("load.tutor.intervals");
    Route::get('tutor/reviews', 'HomeController@load_reviews')->name("load.tutor.reviews");
    Route::get('tutor/lesson/detail', 'HomeController@load_lesson_detail')->name("load.tutor.lesson.detail");
});



// Google Calendar Routes
Route::get('/google-calendar/connect', 'GoogleCalendarController@connect')->name('calendar.connect');
Route::get('/google-calendar/oauth', 'GoogleCalendarController@store')->name('calendar.store');
Route::get('/google-calendar/success', 'GoogleCalendarController@success')->name('calendar.success');

// Stripe Connect Routes
Route::get('connect-account/{id}', 'StripeConnectController@connectAccount')->name('connect');
Route::get('stripe-account', 'StripeConnectController@goToStripe')->name('stripe.account');
Route::get('boarded/{enc}', 'StripeConnectController@boarded')->name('boarded');
Route::get('transfer/{id?}', 'StripeConnectController@transfer')->name('transfer');


// Tutor Auth Routes


// Tutor Routes
Route::namespace("Tutor")->prefix("tutor")->name("tutor.")->middleware(['auth', 'verify_email', 'tutor', 'application_filled'])->group(function(){

    Route::get('dashboard', 'DashboardController@dashboard')->name("dashboard");

    Route::prefix('profile')->name('profile.')->group(function() {
        Route::get('', 'ProfileController@profile')->name('profile');
        Route::get('general', 'ProfileController@general')->name('general');
        Route::post('general-save', 'ProfileController@generalSave')->name('general.save');
        Route::get('certificate', 'ProfileController@certificate')->name('certificate');
        Route::post('certificate-save', 'ProfileController@saveCertificate')->name('certificate.save');
        Route::post('education-save', 'ProfileController@saveEducation')->name('education.save');
        Route::post('experience-save', 'ProfileController@saveExperience')->name('experience.save');
        Route::get('delete-experiance/{id?}', 'ProfileController@delete_experience')->name('delete.experience');
        Route::get('delete-education/{id?}', 'ProfileController@delete_education')->name('delete.education');
        Route::get('availability', 'DashboardController@availability')->name('availability');
        Route::post('update', 'DashboardController@updateProfile')->name('update');
        Route::post('update-password', 'ProfileController@update_password')->name('password.update');
    });

    Route::prefix('lesson')->name('lesson.')->group(function() {
        Route::get('list', 'LessonController@list')->name('list');
        Route::get('add', 'LessonController@add')->name('add');
        Route::get('edit/{id?}', 'LessonController@edit')->name('edit');
        Route::post('save', 'LessonController@save')->name('save');
        Route::get('delete/{id?}', 'LessonController@delete')->name('delete');
        Route::get('change-status/{id?}', 'LessonController@change_status')->name('change_status');
        Route::get('detail/{id?}', 'LessonController@detail')->name('detail');
    });

    Route::prefix('booking-request')->name('booking_request.')->group(function() {
        Route::get('list', 'BookingRequestController@list')->name('list');
        Route::get('active', 'BookingRequestController@active')->name('active');
        Route::get('completed', 'BookingRequestController@completed')->name('completed');
        Route::get('cancelled', 'BookingRequestController@cancelled')->name('cancelled');
        Route::get('cancel/{id?}', 'BookingRequestController@cancel')->name('cancel');
        Route::get('cancel-request/{id?}', 'BookingRequestController@cancel_request')->name('cancel.request');
        Route::get('accept/{id?}', 'BookingRequestController@accept')->name('accept');
        Route::get('reschedule/{id?}', 'BookingRequestController@reschedule')->name('reschedule');
        Route::get('time-request/{id?}', 'BookingRequestController@time_request')->name('time.request');
    });

    Route::prefix('setting')->name('setting.')->group(function() {
        Route::get('', 'SettingController@index')->name('index');
        Route::post('save-timetable', 'SettingController@saveTimeTable')->name('timetable.save');
        Route::get('tutor-free-trial', 'SettingController@isFreeTrial')->name("free.trial");
        Route::get('delete-profile', 'SettingController@delete_profile')->name('profile.delete');
    });

    Route::prefix('transaction')->name('transaction.')->group(function() {
        Route::get('list', 'TransactionController@list')->name('list');
        Route::get('confirmed', 'TransactionController@confirmed')->name('confirmed');
    });

    Route::prefix('reviews')->name('reviews.')->group(function() {
        Route::get('list', 'ReviewController@list')->name('list');
        Route::get('delete/{id?}', 'ReviewController@delete')->name('delete');
    });

    Route::prefix('students')->name('students.')->group(function() {
        Route::get('list', 'StudentController@list')->name('list');
        Route::get('lessons/{id?}', 'StudentController@lessons')->name('lessons');
        Route::get('detail/{id?}', 'StudentController@detail')->name('detail');
    });

    Route::prefix('trial')->name('trial.')->group(function() {
        Route::get('list', 'TrialController@list')->name('list');
        Route::get('accept/{id?}', 'TrialController@accept')->name('accept');
        Route::get('cancel/{id?}', 'TrialController@cancel')->name('cancel');
        Route::get('cancel-request/{id?}', 'TrialController@cancel_request')->name('cancel.request');
        Route::get('reschedule/{id?}', 'TrialController@reschedule')->name('reschedule');
        Route::get('time-request/{id?}', 'TrialController@time_request')->name('time.request');
    });

    // Ajax Routes

    Route::prefix('booking-request')->name('booking_request.')->group(function() {
        Route::get('load-list', 'BookingRequestController@load_list')->name('load.list');
        Route::get('load-active', 'BookingRequestController@load_active')->name('load.active');
        Route::get('load-completed', 'BookingRequestController@load_completed')->name('load.completed');
        Route::get('load-cancelled', 'BookingRequestController@load_cancelled')->name('load.cancelled');
    });

    Route::prefix('trial')->name('trial.')->group(function() {
        Route::get('load-list', 'TrialController@load_list')->name('load.list');
        Route::get('load-active', 'TrialController@load_active')->name('load.active');
        Route::get('load-completed', 'TrialController@load_complete')->name('load.completed');
        Route::get('load-cancelled', 'TrialController@load_cancel')->name('load.cancelled');
    });

    Route::prefix('profile')->name('profile.')->group(function() {
        Route::get('load-general-info', 'ProfileController@load_general_info')->name('load.general_info');
        Route::get('load-experience-edit', 'ProfileController@load_experience_edit')->name('load.experience.edit');
        Route::get('load-education-edit', 'ProfileController@load_education_edit')->name('load.education.edit');
        Route::get('load-certificate', 'ProfileController@load_certificate')->name('load.certificate');
        Route::get('load-password', 'ProfileController@load_password')->name('load.password');
    });

    Route::prefix('setting')->name('setting.')->group(function() {
        Route::get('check-from-to', 'SettingController@check_from_to')->name('check.from.to');
        Route::get('load-availability', 'SettingController@load_availability')->name('load.availability');
        Route::get('load-bank-info', 'SettingController@load_bank_info')->name('load.bank_info');
        Route::get('load-delete-profile', 'SettingController@load_delete_profile')->name('load.delete_profile');
        Route::get('load-calendar', 'SettingController@load_calendar')->name('load.calendar');
        Route::get('load-edit-time-table', 'SettingController@load_edit_time_table')->name('load.edit.time.table');
    });
});




// Student Auth Routes
Route::namespace("Student")->prefix("student")->name("student.")->middleware(['auth', 'verify_email', 'student'])->group(function(){
    Route::get('dashboard', 'DashboardController@dashboard')->name("dashboard");
    Route::get('day-slots', 'DashboardController@daySlots')->name('day.slots');
    Route::post('book/trial', 'DashboardController@book_trial')->name("book.trial");

    Route::prefix('profile')->name('profile.')->group(function() {
        Route::get('edit', 'DashboardController@editProfile')->name('edit');
        Route::get('change-password', 'DashboardController@changePassword')->name('password.edit');
        Route::post('save', 'ProfileController@profileSave')->name('save');
        Route::post('update-password', 'ProfileController@update_password')->name('password.update');
    });

    

    Route::prefix('payment')->name('payment.')->group(function () {
        Route::prefix('paypal')->name('paypal.')->group(function (){
            Route::get('', 'PaymentController@paypalForm')->name('form');
            Route::get('make/checkout', 'PaypalController@paypalCheckout')->name('make.checkout');
            Route::get('payment/success', 'PaypalController@paymentPaypalSuccess')->name('success');
            Route::get('payment/cancel', 'PaypalController@paymentPaypalCancel')->name('cancel');
        });

        Route::get('wallet', 'PaymentController@wallet')->name('wallet');
        Route::get('methods', 'PaymentController@paymentMethod')->name('method');
        Route::get('', 'PaymentController@paymentForm')->name('form');
        Route::post('payment-save', 'PaymentController@paymentSave')->name('save');
        Route::post('paypal','PaymentController@paywithpaypal')->name('paypal');
        Route::get('payment-success','PaymentController@success')->name('success');
        Route::get('payment-cancel','PaymentController@cancel')->name('cancel');
    });

    Route::prefix('booking-request')->name('booking_request.')->group(function() {
        Route::post('booking-request', 'BookingRequestController@booking_request')->name('book.teacher');
        Route::get('list', 'BookingRequestController@list')->name('list');
        Route::get('cancel/{id?}', 'BookingRequestController@cancel')->name('cancel');
        Route::get('refund-request/{id?}', 'BookingRequestController@refund_request')->name('refund.request');
        Route::get('time-request/{id?}', 'BookingRequestController@time_request')->name('time.request');
        Route::get('complete/{id?}', 'BookingRequestController@complete')->name('complete');
        Route::get('review/{id?}', 'BookingRequestController@review')->name('review');
        Route::post('review-save', 'BookingRequestController@reviewSave')->name('review.save');
        Route::get('reschedule/{id?}', 'BookingRequestController@reschedule')->name('reschedule');
    });

    Route::prefix('package')->name('package.')->group(function() {
        Route::get('list', 'PackageController@list')->name('list');
        Route::get('lessons/{id?}', 'PackageController@lessons')->name('lessons');
        Route::get('detail/{id?}', 'PackageController@detail')->name('detail');
        Route::get('schedule/{id?}', 'PackageController@schedule')->name('schedule');
    });

    Route::prefix('transaction')->name('transaction.')->group(function() {
        Route::get('list', 'TransactionController@list')->name('list');
    });

    Route::prefix('trial')->name('trial.')->group(function() {
        Route::get('list', 'TrialController@list')->name('list');
        Route::get('cancel/{id?}', 'TrialController@cancel')->name('cancel');
        Route::get('refund-request/{id?}', 'TrialController@refund_request')->name('refund.request');
        Route::get('time-request/{id?}', 'TrialController@time_request')->name('time.request');
        Route::get('complete/{id?}', 'TrialController@complete')->name('complete');
        Route::get('reschedule/{id?}', 'TrialController@reschedule')->name('reschedule');
    });

    // Ajax Routes
    Route::prefix('booking-request')->name('booking_request.')->group(function() {
        Route::get('load-list', 'BookingRequestController@load_list')->name('load.list');
        Route::get('load-active', 'BookingRequestController@load_active')->name('load.active');
        Route::get('load-completed', 'BookingRequestController@load_completed')->name('load.completed');
        Route::get('load-cancelled', 'BookingRequestController@load_cancelled')->name('load.cancelled');
    });

    Route::prefix('trial')->name('trial.')->group(function() {
        Route::get('load-list', 'TrialController@load_list')->name('load.list');
        Route::get('load-active', 'TrialController@load_active')->name('load.active');
        Route::get('load-complete', 'TrialController@load_complete')->name('load.complete');
        Route::get('load-cancel', 'TrialController@load_cancel')->name('load.cancel');
    });

    Route::prefix('profile')->name('profile.')->group(function() {
        Route::get('load-general-info', 'ProfileController@load_general_info')->name('load.general_info');
        Route::get('load-password', 'ProfileController@load_password')->name('load.password');
    });
});

// Admin Auth Routes
Route::prefix('admin')->name('admin.')->namespace('Admin')->middleware('auth','admin')->group(function() {
    Route::get('dashboard', 'DashboardController@dashboard')->name('dashboard');
    Route::get('profile/{tab?}','ProfileController@index')->name('profile');
    Route::post('general-update','ProfileController@generalUpdate')->name('profile.general.update');
    Route::post('password-update','ProfileController@passwordUpdate')->name('profile.password.update');
    Route::post('setting-save', 'SettingController@save')->name('setting.save');

    Route::prefix('tutors')->name('tutors.')->group(function() {
        Route::get('list', 'TutorController@list')->name('list');
        Route::get('change-status/{id?}', 'TutorController@changeStatus')->name('change.status');
        Route::get('detail/{id?}', 'TutorController@detail')->name('detail');
        Route::get('earning/{id?}', 'TutorController@earning')->name('earning');
        Route::get('delete/{id?}', 'TutorController@delete')->name('delete');
    });

    Route::prefix('students')->name('students.')->group(function() {
        Route::get('list', 'StudentController@list')->name('list');
        Route::get('detail/{id?}', 'StudentController@detail')->name('detail');
        Route::get('delete/{id?}', 'StudentController@delete')->name('delete');
    });

    Route::prefix('bookings')->name('bookings.')->group(function() {
        Route::get('list', 'BookingController@list')->name('list');
        Route::get('detail/{id?}', 'BookingController@detail')->name('detail');
        Route::get('refund-payment/{id?}', 'BookingController@refund_payment')->name('refund.payment');
        Route::get('delete/{id?}', 'BookingController@delete')->name('delete');
    });

    Route::prefix('trials')->name('trials.')->group(function() {
        Route::get('list', 'TrialController@list')->name('list');
        Route::get('detail/{id?}', 'TrialController@detail')->name('detail');
        Route::get('refund-payment/{id?}', 'TrialController@refund_payment')->name('refund.payment');
        Route::get('delete/{id?}', 'TrialController@delete')->name('delete');
    });

    Route::prefix('cms')->name('cms.')->group(function() {
        Route::get('general', 'SettingController@general')->name('general');
        Route::get('terms-page', 'SettingController@terms_page')->name('terms.page');
        Route::get('privacy-page', 'SettingController@privacy_page')->name('privacy.page');
    });

    Route::prefix('testimonial')->name('testimonial.')->group(function() {
        Route::get('list', 'TestimonialController@list')->name('list');
        Route::get('add', 'TestimonialController@add')->name('add');
        Route::post('save', 'TestimonialController@save')->name('save');
        Route::get('edit/{id?}', 'TestimonialController@edit')->name('edit');
        Route::get('delete/{id?}', 'TestimonialController@delete')->name('delete');
    });

    Route::prefix('faq')->name('faq.')->group(function() {
        Route::get('list', 'FaqController@list')->name('list');
        Route::get('add', 'FaqController@add')->name('add');
        Route::post('save', 'FaqController@save')->name('save');
        Route::get('edit/{id?}', 'FaqController@edit')->name('edit');
        Route::get('delete/{id?}', 'FaqController@delete')->name('delete');
    });

    Route::prefix('tag')->name('tag.')->group(function() {
        Route::get('list', 'TagController@list')->name('list');
        Route::get('add', 'TagController@add')->name('add');
        Route::post('save', 'TagController@save')->name('save');
        Route::get('edit/{id?}', 'TagController@edit')->name('edit');
        Route::get('delete/{id?}', 'TagController@delete')->name('delete');
    });

    Route::prefix('language')->name('language.')->group(function() {
        Route::get('list', 'LanguageController@list')->name('list');
        Route::get('add', 'LanguageController@add')->name('add');
        Route::post('save', 'LanguageController@save')->name('save');
        Route::get('edit/{id?}', 'LanguageController@edit')->name('edit');
        Route::get('delete/{id?}', 'LanguageController@delete')->name('delete');
    });

    Route::prefix('transaction')->name('transaction.')->group(function() {
        Route::get('list', 'TransactionController@index')->name('list');
    });

    Route::prefix('payout')->name('payout.')->group(function() {
        Route::get('list', 'PayoutController@list')->name('list');
    });

});

