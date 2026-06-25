@extends('common.main')
@section('title','Monsters University')
@section('content')

<!-- Hero-->
<section class="hero">
    <div class="hero-overlay"></div>
    <img src="images/landing.png" alt="Monsters University" class="hero-bg">
    <div class="hero-content">
        <span class="hero-eyebrow">A.Y. 2026 – 2027 Enrollment</span>
        <h1 class="hero-heading">Shape Your Future<br>at Monsters University.</h1>
        <p class="hero-sub">Register online, choose your subjects, and manage your schedule — all in one place.</p>
        <div class="hero-actions">
            @auth
                <a href="/home" class="btn-white">Go to Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="btn-white">Log In</a>
                <a href="{{ route('register') }}" class="btn-ghost-white">Register Now</a>
            @endauth
        </div>
    </div>
</section>

<!-- Notice-->
<div class="notice-bar">
    <i class="bi bi-info-circle"></i>
    Enrollment deadline: <strong>June 30, 2026</strong> &nbsp;·&nbsp; Questions? Email <strong>registrar@school.edu</strong>
</div>

<!-- Steps -->
 <section class="steps-section">
    <div class="wrap">
        <div class="section-label">How it works</div>
        <h2 class="section-title">Enrolling online is easy.</h2>
        <div class="steps-grid">
            <div class="step-card">
                <div class="step-circle">01</div>
                <h3>Create your account</h3>
                <p>Register using your school-issued email. Only pre-approved students may sign up.</p>
            </div>
            <div class="step-divider">→</div>
            <div class="step-card">
                <div class="step-circle">02</div>
                <h3>Submit your enrollment</h3>
                <p>Choose your subjects and preferred section for the semester.</p>
            </div>
            <div class="step-divider">→</div>
            <div class="step-card">
                <div class="step-circle">03</div>
                <h3>Get approved</h3>
                <p>The Registrar reviews your enrollment and your final schedule becomes available.</p>
            </div>
        </div>
    </div>
</section>

<!-- Programs -->
 <section class="programs-section">
    <div class="wrap">
        <div class="section-label light">Programs</div>
        <h2 class="section-title light">Find your program.</h2>
        <div class="programs-grid">
            <div class="program-card">
                <h3>Multimedia</h3>
                <p>Digital media, design, animation, and creative production.</p>
            </div>
            <div class="program-card">
                <h3>Computer Science</h3>
                <p>Algorithms, software engineering, and systems development.</p>
            </div>
            <div class="program-card">
                <h3>Information Technology</h3>
                <p>Networks, infrastructure, and technology management.</p>
            </div>
            <div class="program-card">
                <h3>Finance</h3>
                <p>Accounting, financial analysis, and business management.</p>
            </div>
            <div class="program-card">
                <h3>English</h3>
                <p>Language, literature, communication, and applied linguistics.</p>
            </div>
        </div>
    </div>
</section>

<!-- About -->
 <section class="about-section" id="about">
    <div class="wrap about-grid">
        <div class="about-text">
            <div class="section-label">About</div>
            <h2 class="section-title">Built for MU students.</h2>
            <p>The MU Online Enrollment System is the official platform for student enrollment at Monsters University. Designed to remove the hassle of in-person enrollment, it lets students register, pick their subjects, and track their approval status.</p>
            <p>Managed by the Office of the Registrar for A.Y. 2026–2027.</p>
        </div>
    </div>
</section>

<!-- Contact Us-->
<section class="contact-section" id="contact">
    <div class="wrap">
        <div class="section-label">Contact Us</div>
        <h2 class="section-title">We're here to help.</h2>
        <div class="contact-grid">
            <div class="contact-card">
                <i class="bi bi-envelope"></i>
                <h3>Email</h3>
                <p>registrar@school.edu</p>
                <span>Response within 1–2 business days</span>
            </div>
            <div class="contact-card">
                <i class="bi bi-telephone"></i>
                <h3>Phone</h3>
                <p>(02) 8123-4567</p>
                <span>Monday – Friday, 8AM – 5PM</span>
            </div>
            <div class="contact-card">
                <i class="bi bi-geo-alt"></i>
                <h3>Office</h3>
                <p>Admin Building, Room 101</p>
                <span>Ground Floor, Main Campus</span>
            </div>
        </div>
    </div>
</section>

{{-- HELP --}}
<section class="help-section" id="help">
    <div class="wrap">
        <div class="section-label">Help</div>
        <h2 class="section-title">Frequently asked questions.</h2>
        <div class="faq-list">
            <div class="faq-item">
                <button class="faq-q" onclick="toggleFaq(this)">
                    Who can register on this portal?
                <i class="bi bi-chevron-down"></i>                
                </button>
                <div class="faq-a">Only students with a pre-approved school email on file with the Registrar's Office may register. If your email is not recognized, contact the registrar directly.</div>
            </div>
            <div class="faq-item">
                <button class="faq-q" onclick="toggleFaq(this)">
                    When will my enrollment be approved?
                    <i class="bi bi-chevron-down"></i>
                </button>
                <div class="faq-a">Submissions are reviewed within 3–5 business days. Your approved schedule will appear on your dashboard once processed.</div>
            </div>
            <div class="faq-item">
                <button class="faq-q" onclick="toggleFaq(this)">
                    Can I change my subjects after submitting?
                    <i class="bi bi-chevron-down"></i>
                </button>
                <div class="faq-a">Changes must be requested in person at the Registrar's Office before the enrollment deadline. Bring your enrollment form and a valid school ID.</div>
            </div>
            <div class="faq-item">
                <button class="faq-q" onclick="toggleFaq(this)">
                    What programs are available?
                    <i class="bi bi-chevron-down"></i>
                </button>
                <div class="faq-a">Multimedia, Finance, Information Technology, Computer Science, General Education, and English.</div>
            </div>
        </div>
    </div>
</section>

<style>
    * { box-sizing: border-box; margin: 0; padding: 0; }

    body {
        font-family: 'Trebuchet MS', Arial, sans-serif;
        background: #f4f8fc;
        color: #1a3a4a;
    }

    .wrap {
        max-width: 1100px;
        margin: 0 auto;
        padding: 0 2rem;
    }

    /* HERO */
    .hero {
        position: relative;
        min-height: 88vh;
        display: flex;
        align-items: center;
        overflow: hidden;
    }

    .hero-bg {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center top;
    }

    .hero-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, rgba(0,35,65,0.85) 0%, rgba(0,80,140,0.60) 100%);
        z-index: 1;
    }

    .hero-content {
        position: relative;
        z-index: 2;
        max-width: 1100px;
        margin: 0 auto;
        padding: 6rem 2rem;
        width: 100%;
    }

    .hero-eyebrow {
        display: inline-block;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        color: #7dd3f8;
        margin-bottom: 1.25rem;
    }

    .hero-heading {
        font-size: 56px;
        font-weight: 800;
        line-height: 1.1;
        color: #ffffff;
        margin-bottom: 1.25rem;
        max-width: 640px;
    }

    .hero-sub {
        font-size: 18px;
        color: rgba(255,255,255,0.75);
        line-height: 1.65;
        margin-bottom: 2.5rem;
        max-width: 480px;
    }

    .hero-actions {
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
    }

    .btn-white {
        display: inline-flex;
        align-items: center;
        padding: 0.8rem 2rem;
        background: #ffffff;
        color: #005f9e;
        border-radius: 30px;
        font-size: 15px;
        font-weight: 700;
        text-decoration: none;
        border: 2px solid #ffffff;
        transition: all 0.2s ease;
    }

    .btn-white:hover {
        background: #e8f4fc;
        color: #003d6b;
    }

    .btn-ghost-white {
        display: inline-flex;
        align-items: center;
        padding: 0.8rem 2rem;
        background: transparent;
        color: #ffffff;
        border-radius: 30px;
        font-size: 15px;
        font-weight: 600;
        text-decoration: none;
        border: 2px solid rgba(255,255,255,0.55);
        transition: all 0.2s ease;
    }

    .btn-ghost-white:hover {
        background: rgba(255,255,255,0.12);
        border-color: #ffffff;
        color: #ffffff;
    }

    /* NOTICE BAR */
    .notice-bar {
        background: #005f9e;
        color: #cce8f8;
        font-size: 13px;
        padding: 0.7rem 2rem;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }

    .notice-bar strong { color: #ffffff; }

    /* SHARED */
    .section-label {
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        color: #007dc4;
        margin-bottom: 0.5rem;
    }

    .section-label.light { color: #7dd3f8; }

    .section-title {
        font-size: 30px;
        font-weight: 700;
        color: #0d2d3f;
        margin-bottom: 2.5rem;
        line-height: 1.2;
    }

    .section-title.light { color: #ffffff; }

    /* STEPS */
    .steps-section {
        background: #ffffff;
        padding: 5rem 0;
    }

    .steps-grid {
        display: flex;
        align-items: flex-start;
    }

    .step-card {
        flex: 1;
        padding: 1.5rem 2rem;
        text-align: center;
    }

    .step-circle {
        width: 52px;
        height: 52px;
        border-radius: 50%;
        background: #eef6fb;
        color: #007dc4;
        font-size: 14px;
        font-weight: 800;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.25rem;
        border: 2px solid #c8e2f2;
    }

    .step-card h3 {
        font-size: 16px;
        font-weight: 700;
        color: #0d2d3f;
        margin-bottom: 0.6rem;
    }

    .step-card p {
        font-size: 14px;
        color: #5a7a8a;
        line-height: 1.65;
    }

    .step-divider {
        font-size: 22px;
        color: #c8e2f2;
        padding-top: 2.5rem;
        flex-shrink: 0;
    }

    /* PROGRAMS */
    .programs-section {
        background: #003d6b;
        padding: 5rem 0;
    }

    .programs-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1.25rem;
    }

    .program-card {
        background: rgba(255,255,255,0.07);
        border: 1px solid rgba(255,255,255,0.11);
        border-radius: 14px;
        padding: 1.75rem;
        transition: background 0.2s ease;
    }

    .program-card:hover {
        background: rgba(255,255,255,0.13);
    }

    .program-code {
        font-size: 11px;
        font-weight: 800;
        letter-spacing: 0.12em;
        color: #7dd3f8;
        margin-bottom: 0.75rem;
    }

    .program-card h3 {
        font-size: 16px;
        font-weight: 700;
        color: #ffffff;
        margin-bottom: 0.5rem;
    }

    .program-card p {
        font-size: 13px;
        color: rgba(255,255,255,0.55);
        line-height: 1.6;
    }

    /* ABOUT */
    .about-section {
        background: #ffffff;
        padding: 5rem 0;
        border-top: 1px solid #e8f0f7;
    }

    .about-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 5rem;
        align-items: center;
    }

    .about-text p {
        font-size: 15px;
        color: #5a7a8a;
        line-height: 1.8;
        margin-bottom: 1rem;
    }

    /* CONTACT */
    .contact-section {
        background: #f4f8fc;
        padding: 5rem 0;
        border-top: 1px solid #e8f0f7;
    }

    .contact-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1.25rem;
    }

    .contact-card {
        background: #ffffff;
        border: 1px solid #e8f0f7;
        border-radius: 14px;
        padding: 2rem 1.5rem;
    }

    .contact-card h3 {
        font-size: 15px;
        font-weight: 700;
        color: #0d2d3f;
        margin-bottom: 4px;
    }

    .contact-card p {
        font-size: 14px;
        color: #007dc4;
        font-weight: 600;
        margin-bottom: 4px;
    }

    .contact-card span {
        font-size: 12px;
        color: #a0b8cc;
    }

    /* HELP */
    .help-section {
        background: #ffffff;
        padding: 5rem 0;
        border-top: 1px solid #e8f0f7;
    }

    .faq-list {
        border: 1px solid #e8f0f7;
        border-radius: 14px;
        overflow: hidden;
    }

    .faq-item { border-bottom: 1px solid #e8f0f7; }
    .faq-item:last-child { border-bottom: none; }

    .faq-q {
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 1rem;
        padding: 1.2rem 1.5rem;
        background: #ffffff;
        border: none;
        outline: none;
        font-size: 15px;
        font-weight: 600;
        font-family: 'Trebuchet MS', Arial, sans-serif;
        color: #0d2d3f;
        cursor: pointer;
        text-align: left;
        transition: background 0.15s;
    }

    .faq-q:hover { background: #f7fbfe; }

    .faq-chev {
        flex-shrink: 0;
        color: #007dc4;
        transition: transform 0.2s ease;
    }

    .faq-q.open .faq-chev { transform: rotate(180deg); }

    .faq-a {
        display: none;
        padding: 0 1.5rem 1.25rem;
        font-size: 14px;
        color: #5a7a8a;
        line-height: 1.75;
    }

    .faq-a.open { display: block; }

    /* RESPONSIVE */
    @media (max-width: 768px) {
        .hero-heading { font-size: 34px; }
        .steps-grid { flex-direction: column; }
        .step-divider { display: none; }
        .programs-grid { grid-template-columns: 1fr 1fr; }
        .about-grid { grid-template-columns: 1fr; gap: 2rem; }
        .contact-grid { grid-template-columns: 1fr; }
        .footer-inner { flex-direction: column; gap: 6px; text-align: center; }
    }

    @media (max-width: 480px) {
        .programs-grid { grid-template-columns: 1fr; }
        .hero-heading { font-size: 28px; }
    }
</style>

<script>
    function toggleFaq(btn) {
        const answer = btn.nextElementSibling;
        const isOpen = answer.classList.contains('open');
        document.querySelectorAll('.faq-a').forEach(a => a.classList.remove('open'));
        document.querySelectorAll('.faq-q').forEach(b => b.classList.remove('open'));
        if (!isOpen) {
            answer.classList.add('open');
            btn.classList.add('open');
        }
    }
</script>

@endsection