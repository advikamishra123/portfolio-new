<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\Log;

use App\Models\Project;
use App\Models\Contact;

class PortfolioController extends Controller
{
    public function index()
    {
        $staticProjects = [
            [
                'title' => 'Cloud School',
                'description' => 'A comprehensive school management system build with PHP and Laravel.',
                'link' => 'https://cloudschool.kiashinfotech.co.in/',
                'image' => 'https://images.unsplash.com/photo-1546410531-bb4caa6b424d?q=80&w=1000&auto=format&fit=crop'
            ],
            [
                'title' => 'KTC Wala',
                'description' => 'Educational platform and resource center for students.',
                'link' => 'https://ktcwala.com/',
                'image' => 'https://images.unsplash.com/photo-1523240795612-9a054b0db644?q=80&w=1000&auto=format&fit=crop'
            ],
            [
                'title' => 'Nexvo Mart',
                'description' => 'A modern e-commerce marketplace for various products.',
                'link' => 'https://nexvomart.com/',
                'image' => 'https://images.unsplash.com/photo-1557821552-17105176677c?q=80&w=1000&auto=format&fit=crop'
            ],
            [
                'title' => 'Zeniva Naturals',
                'description' => 'Premium natural products and wellness e-commerce store.',
                'link' => 'https://www.zenivanaturals.com/',
                'image' => 'https://images.unsplash.com/photo-1556228720-195a672e8a03?q=80&w=1000&auto=format&fit=crop'
            ],
        ];

        // Fetch dynamic projects from database
        $dynamicProjects = Project::where('is_active', true)
            ->orderBy('sort_order', 'asc') // Respect sort order
            ->latest()
            ->get()
            ->map(function ($project) {
                return [
                    'title' => $project->title,
                    'description' => $project->description,
                    'link' => $project->link,
                    'image' => asset('storage/' . $project->image) // Ensure correct path for uploaded images
                ];
            })
            ->toArray();

        // Merge: Static first, then Dynamic
        $projects = array_merge($staticProjects, $dynamicProjects);

        $skills = [
            'Frontend' => [
                'icon' => 'fas fa-globe',
                'items' => 'HTML5, CSS3, JS, React, Bootstrap, Tailwind'
            ],
            'Backend' => [
                'icon' => 'fas fa-server',
                'items' => 'PHP, Laravel'
            ],
            'Database' => [
                'icon' => 'fas fa-database',
                'items' => 'MySQL'
            ],
            'Version Control' => [
                'icon' => 'fas fa-code-branch',
                'items' => 'Git, GitHub'
            ],
            'APIs' => [
                'icon' => 'fas fa-network-wired',
                'items' => 'RESTful APIs, Postman'
            ],
            'Tools' => [
                'icon' => 'fas fa-tools',
                'items' => 'VS Code, XAMPP'
            ],
            'Soft Skills' => [
                'icon' => 'fas fa-users',
                'items' => 'Problem Solving, Teamwork'
            ],
            'Languages' => [
                'icon' => 'fas fa-language',
                'items' => 'English, Hindi'
            ],
        ];

        $education = [
            [
                'degree' => 'Bachelor of Computer Applications',
                'institution' => 'Mangalayatan University, Aligarh',
                'duration' => '2025 – Present'
            ],
            [
                'degree' => 'Diploma in Computer Science & Engineering',
                'institution' => 'Prasad Polytechnic College, Jaunpur',
                'duration' => '2022 – 2025'
            ],
            [
                'degree' => 'Intermediate',
                'institution' => 'Shanti Smarak Inter College, Azamgarh',
                'duration' => '2021 – 2022'
            ],
            [
                'degree' => 'High School',
                'institution' => 'Shanti Smarak Inter College, Azamgarh',
                'duration' => '2020 – 2021'
            ],
        ];

        $experience = [
            [
                'company' => 'Kiash Infotech Private Limited',
                'role' => 'PHP Laravel Developer',
                'description' => 'Worked on various PHP Laravel based web applications.'
            ],
            [
                'company' => 'Digicoders Technology Pvt Ltd',
                'role' => 'Intern',
                'description' => 'Practical training on web development technologies.'
            ],
            [
                'company' => 'Techpile Technology Pvt Ltd',
                'role' => 'Summer Training',
                'description' => 'Learned core concepts of software development.'
            ],
        ];

        return view('portfolio', compact('projects', 'skills', 'education', 'experience'));
    }

    public function store(ContactRequest $request)
    {
        // Save contact to database
        Contact::create($request->validated());

        return back()->with('success', 'Thank you for your message, Sagun will get back to you soon!');
    }
}
