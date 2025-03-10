<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Razorpay\Api\Api;
use App\Models\Course;
use App\Models\CoursePayments;
use App\Models\Enrollment;
use Illuminate\Support\Facades\Auth;

class EnrollmentController extends Controller
{
    // Enroll User (Free or Paid)
    public function enroll(Request $request, $course_id)
    {
        $user = Auth::user();
        $course = Course::findOrFail($course_id);

        // If the course is free, enroll directly
        if ($course->price == 0) {
            Enrollment::updateOrCreate(
                ['user_id' => $user->id, 'course_id' => $course->id],
                ['status' => 'enrolled']
            );

            return redirect()->route('course.learn', $course->slug)
                ->with('success', 'You have successfully enrolled in this free course.');
        }

        // For paid courses, redirect to the payment page
        return view('site.courses.payment', compact('course'));
    }

    // Process Payment
    public function processPayment(Request $request)
    {
        $user = Auth::user();
        $course = Course::findOrFail($request->course_id);

        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

        // Create an order on Razorpay
        $order = $api->order->create([
            'receipt' => 'order_' . uniqid(),
            'amount' => $course->price * 100, // Amount in paise
            'currency' => 'INR',
            'payment_capture' => 1 // Auto-capture payment
        ]);

        return response()->json([
            'order_id' => $order->id,
            'razorpay_key' => env('RAZORPAY_KEY'),
            'amount' => $course->price * 100,
            'course_id' => $course->id
        ]);
    }

    // Verify Payment
    public function verifyPayment(Request $request)
    {
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

        try {
            $attributes = [
                'razorpay_order_id' => $request->razorpay_order_id,
                'razorpay_payment_id' => $request->razorpay_payment_id,
                'razorpay_signature' => $request->razorpay_signature
            ];

            $api->utility->verifyPaymentSignature($attributes);

            // Payment successful, save in database
            $user = Auth::user();
            $course = Course::findOrFail($request->course_id);

            CoursePayments::create([
                'user_id' => $user->id,
                'course_id' => $course->id,
                'amount' => $course->price,
                'status' => 'paid'
            ]);

            Enrollment::updateOrCreate(
                ['user_id' => $user->id, 'course_id' => $course->id],
                ['status' => 'enrolled']
            );

            return redirect()->route('course.learn', $course->slug)
                ->with('success', 'Payment successful! You are now enrolled.');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Payment verification failed! Please try again.');
        }
    }
}
