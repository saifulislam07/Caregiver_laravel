<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Faq;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        // Clear existing FAQs first to avoid duplicates
        Faq::truncate();

        $faqs = [
            [
                'question' => 'How do I book a caregiver for my elderly parents?',
                'answer' => 'You can book a caregiver by navigating to our "Caregivers" section, selecting a profile that matches your needs, and clicking "Book Now". Alternatively, you can call our 24/7 hotline for assistance.',
                'order_index' => 1,
            ],
            [
                'question' => 'Are your caregivers medically trained?',
                'answer' => 'Yes, all our caregivers undergo clinical training and background verification. We have different levels of care, from basic companion care to advanced nursing care provided by registered nurses.',
                'order_index' => 2,
            ],
            [
                'question' => 'How can I consult with a specialist doctor online?',
                'answer' => 'Visit the "Doctors" page, select your required specialty (e.g., Cardiology, Pediatrics), and choose a doctor. You can then book a video consultation at your preferred time slot.',
                'order_index' => 3,
            ],
            [
                'question' => 'Do you provide emergency medicine delivery?',
                'answer' => 'Yes, our Health Shop offers express delivery for essential medicines. If a product is out of stock, you can place a "Pre-Order" request, and we will source it for you within 24-48 hours.',
                'order_index' => 4,
            ],
            [
                'question' => 'What is included in the Home Health Package?',
                'answer' => 'Our Home Health Packages typically include routine nurse visits, vitals monitoring, physiotherapy sessions, and monthly doctor consultations, depending on the level of the package (Silver, Gold, or Platinum).',
                'order_index' => 5,
            ],
            [
                'question' => 'Can I request a change of caregiver if I am not satisfied?',
                'answer' => 'Absolutely. We prioritize your comfort. If you feel the assigned caregiver is not a good match, you can request a replacement through your dashboard or by contacting our support team.',
                'order_index' => 6,
            ],
            [
                'question' => 'Is your support available 24/7?',
                'answer' => 'Yes, our customer support and emergency care coordination team are available 24 hours a day, 7 days a week, to assist with any urgent requirements.',
                'order_index' => 7,
            ],
            [
                'question' => 'What payment methods do you accept?',
                'answer' => 'We accept all major credit/debit cards, mobile banking (bKash, Nagad), and bank transfers. For some services, cash on delivery (COD) is also available.',
                'order_index' => 8,
            ],
            [
                'question' => 'Are your services covered by health insurance?',
                'answer' => 'Many of our nursing and doctor consultation services are reimbursable by major insurance providers. Please check with your insurance company for specific coverage details.',
                'order_index' => 9,
            ],
            [
                'question' => 'What is the minimum duration for booking a caregiver?',
                'answer' => 'The minimum booking duration is 8 hours for a single shift. For long-term care, we offer weekly and monthly packages with significant discounts.',
                'order_index' => 10,
            ],
            [
                'question' => 'How do you ensure the professionalism of your staff?',
                'answer' => 'Every staff member undergoes a rigorous 4-step verification process, including background checks, medical certification verification, personality assessments, and practical skill tests.',
                'order_index' => 11,
            ],
            [
                'question' => 'Is my medical data kept secure and private?',
                'answer' => 'Yes, we take patient privacy very seriously. All medical records and personal data are encrypted and stored securely, compliant with international health data protection standards.',
                'order_index' => 12,
            ],
            [
                'question' => 'Do you provide specialized care for dementia and Alzheimer\'s patients?',
                'answer' => 'Yes, we have a specialized team of caregivers trained in geriatric care and specifically in managing the unique needs of patients with dementia and Alzheimer’s.',
                'order_index' => 13,
            ],
            [
                'question' => 'Can I get post-surgery nursing care at home?',
                'answer' => 'Absolutely. We provide comprehensive post-operative care, including wound dressing, medication management, pain control, and monitoring of vital signs by experienced nurses.',
                'order_index' => 14,
            ],
            [
                'question' => 'Do you offer physiotherapy services at home?',
                'answer' => 'Yes, we have qualified physiotherapists who can visit your home for rehabilitation, pain management, and mobility exercises adapted to the patient’s condition.',
                'order_index' => 15,
            ],
            [
                'question' => 'Can I have lab test samples collected from my home?',
                'answer' => 'Yes, we provide home sample collection services for a wide range of lab tests. Our certified phlebotomists will collect the samples and deliver the reports digitally.',
                'order_index' => 16,
            ],
            [
                'question' => 'Do you provide oxygen cylinders or medical equipment for rent?',
                'answer' => 'Yes, we offer rental and purchase options for oxygen cylinders, concentrators, hospital beds, wheelchairs, and other essential medical equipment.',
                'order_index' => 17,
            ],
            [
                'question' => 'Are vaccination services available at home?',
                'answer' => 'Yes, we provide home vaccination services for children and adults, including flu shots, hepatitis vaccines, and other routine immunizations.',
                'order_index' => 18,
            ],
            [
                'question' => 'Do you offer specialized care for newborns and new mothers?',
                'answer' => 'Yes, we have experienced maternity nurses and baby care specialists who provide support for newborn care, breastfeeding guidance, and postnatal recovery for mothers.',
                'order_index' => 19,
            ],
            [
                'question' => 'What is your cancellation and refund policy?',
                'answer' => 'Cancellations made 24 hours before the service start time are eligible for a full refund. For cancellations with shorter notice, a small service fee may apply.',
                'order_index' => 20,
            ],
            [
                'question' => 'Which cities do you currently operate in?',
                'answer' => 'Currently, we provide full-scale services in Dhaka and Chittagong. We are rapidly expanding to other major cities across the country.',
                'order_index' => 21,
            ],
            [
                'question' => 'How can I apply to work as a caregiver with TakeFamilyCare?',
                'answer' => 'If you are a certified nurse or trained caregiver, you can apply through our "Join as Caregiver" portal on the website by uploading your credentials and ID.',
                'order_index' => 22,
            ],
            [
                'question' => 'Are there any discounts for long-term care packages?',
                'answer' => 'Yes, we offer up to 20% discount on monthly care packages and special rates for seniors who require permanent live-in assistance.',
                'order_index' => 23,
            ],
            [
                'question' => 'How do your caregivers handle medical emergencies?',
                'answer' => 'Our caregivers are trained in basic life support (BLS) and first aid. In case of an emergency, they follow a strict protocol including immediate family notification and ambulance coordination.',
                'order_index' => 24,
            ],
            [
                'question' => 'Where can I submit feedback or a grievance?',
                'answer' => 'You can submit feedback through your user dashboard, via our "Contact Us" page, or by emailing our quality assurance team at quality@takefamilycare.com.',
                'order_index' => 25,
            ],
        ];

        foreach ($faqs as $faq) {
            Faq::create($faq);
        }
    }
}
