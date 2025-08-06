@extends('layouts.app')

@section('title', 'Platform Crowdfunding Terpercaya')

@section('content')
<style>
    :root {
        --emerald-50: #ecfdf5;
        --emerald-100: #d1fae5;
        --emerald-200: #a7f3d0;
        --emerald-300: #6ee7b7;
        --emerald-400: #34d399;
        --emerald-500: #10b981;
        --emerald-600: #059669;
        --emerald-700: #047857;
        --emerald-800: #065f46;
        --emerald-900: #064e3b;
        --teal-400: #2dd4bf;
        --teal-500: #14b8a6;
        --teal-600: #0d9488;
        --teal-700: #0f766e;
        --green-400: #4ade80;
        --green-500: #22c55e;
        --green-600: #16a34a;
        --slate-50: #f8fafc;
        --slate-100: #f1f5f9;
        --slate-200: #e2e8f0;
        --slate-300: #cbd5e1;
        --slate-400: #94a3b8;
        --slate-500: #64748b;
        --slate-600: #475569;
        --slate-700: #334155;
        --slate-800: #1e293b;
        --slate-900: #0f172a;
        --red-500: #ef4444;
        --red-600: #dc2626;
        --orange-500: #f97316;
        --orange-600: #ea580c;
        --white: #ffffff;
        --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        --shadow-2xl: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        --gradient-emerald: linear-gradient(135deg, var(--emerald-600), var(--teal-600));
        --gradient-emerald-light: linear-gradient(135deg, var(--emerald-500), var(--teal-500));
        --gradient-completed: linear-gradient(135deg, var(--slate-400), var(--slate-500));
        --gradient-animated: linear-gradient(45deg, var(--emerald-400), var(--teal-400), var(--emerald-500), var(--teal-500));
        --blur-backdrop: blur(16px);
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        background: linear-gradient(135deg, var(--slate-50) 0%, var(--emerald-50) 100%);
        font-family: 'Inter', system-ui, -apple-system, sans-serif;
        line-height: 1.6;
        color: var(--slate-700);
        overflow-x: hidden;
    }

    /* Floating Particles Background */
    .floating-particles {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
        z-index: 1;
        overflow: hidden;
    }

    .particle {
        position: absolute;
        background: var(--gradient-emerald);
        border-radius: 50%;
        opacity: 0.1;
        animation: float 20s infinite linear;
    }

    .particle:nth-child(1) { width: 4px; height: 4px; left: 10%; animation-delay: 0s; }
    .particle:nth-child(2) { width: 6px; height: 6px; left: 20%; animation-delay: 2s; }
    .particle:nth-child(3) { width: 3px; height: 3px; left: 30%; animation-delay: 4s; }
    .particle:nth-child(4) { width: 5px; height: 5px; left: 40%; animation-delay: 6s; }
    .particle:nth-child(5) { width: 4px; height: 4px; left: 50%; animation-delay: 8s; }
    .particle:nth-child(6) { width: 7px; height: 7px; left: 60%; animation-delay: 10s; }
    .particle:nth-child(7) { width: 3px; height: 3px; left: 70%; animation-delay: 12s; }
    .particle:nth-child(8) { width: 5px; height: 5px; left: 80%; animation-delay: 14s; }
    .particle:nth-child(9) { width: 4px; height: 4px; left: 90%; animation-delay: 16s; }

    /* Container */
    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 1.5rem;
        position: relative;
        z-index: 2;
    }

    /* Typography - Judul Diperkecil */
    .page-title {
        font-size: clamp(2rem, 4vw, 3rem); /* Diperkecil dari 2.5rem-4rem */
        font-weight: 800;
        text-align: center;
        margin-bottom: 1rem; /* Diperkecil dari 1.5rem */
        background: var(--gradient-animated);
        background-size: 300% 300%;
        animation: gradientShift 6s ease infinite;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        line-height: 1.1;
        position: relative;
    }

    .page-title::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 3px;
        background: var(--gradient-emerald);
        border-radius: 2px;
        animation: pulse 2s ease-in-out infinite;
    }

    .page-subtitle {
        font-size: clamp(1rem, 2vw, 1.2rem); /* Diperkecil dari 1.1rem-1.3rem */
        text-align: center;
        color: var(--slate-600);
        margin-bottom: 2.5rem; /* Diperkecil dari 3rem */
        max-width: 550px; /* Diperkecil dari 600px */
        margin-left: auto;
        margin-right: auto;
        line-height: 1.6;
        position: relative;
    }

    .section-title {
        font-size: clamp(1.8rem, 3.5vw, 2.2rem); /* Diperkecil dari 2rem-2.5rem */
        font-weight: 700;
        text-align: center;
        margin-bottom: 1.8rem; /* Diperkecil dari 2rem */
        color: var(--slate-800);
        position: relative;
    }

    .section-title::after {
        content: '';
        position: absolute;
        bottom: -0.5rem;
        left: 50%;
        transform: translateX(-50%);
        width: 50px; /* Diperkecil dari 60px */
        height: 3px; /* Diperkecil dari 4px */
        background: var(--gradient-emerald);
        border-radius: 2px;
        animation: expandContract 3s ease-in-out infinite;
    }

    /* Hero Section dengan Elemen Menarik */
    .hero-section {
        padding: clamp(2.5rem, 6vw, 4rem) 0; /* Diperkecil dari 3rem-5rem */
        background: linear-gradient(135deg, var(--emerald-50) 0%, var(--teal-50) 50%, var(--slate-50) 100%);
        position: relative;
        overflow: hidden;
    }

    .hero-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: radial-gradient(circle at 30% 20%, rgba(16, 185, 129, 0.08) 0%, transparent 50%),
                    radial-gradient(circle at 70% 80%, rgba(20, 184, 166, 0.08) 0%, transparent 50%);
        pointer-events: none;
        animation: backgroundShift 15s ease-in-out infinite;
    }

    /* Decorative Elements */
    .hero-decoration {
        position: absolute;
        width: 200px;
        height: 200px;
        border-radius: 50%;
        background: var(--gradient-emerald-light);
        opacity: 0.05;
        animation: rotate 20s linear infinite;
    }

    .hero-decoration:nth-child(1) {
        top: 10%;
        left: -5%;
        animation-delay: 0s;
    }

    .hero-decoration:nth-child(2) {
        bottom: 10%;
        right: -5%;
        animation-delay: 10s;
        animation-direction: reverse;
    }
    
    /* Slider Container - Enhanced */
    .slider-container {
        position: relative;
        margin: 0 auto;
        max-width: 1200px;
        overflow: hidden;
        border-radius: 1.5rem;
        box-shadow: var(--shadow-xl);
        background: var(--gradient-emerald);
        border: 2px solid rgba(255, 255, 255, 0.2);
        backdrop-filter: var(--blur-backdrop);
        transform: perspective(1000px) rotateX(2deg);
        transition: transform 0.3s ease;
    }

    .slider-container:hover {
        transform: perspective(1000px) rotateX(0deg) scale(1.02);
    }

    .slider-wrapper {
        position: relative;
        height: clamp(300px, 45vw, 420px); /* Diperkecil dari 350px-480px */
        overflow: hidden;
    }

    .slide {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        color: var(--white);
        padding: clamp(1.5rem, 4vw, 2.5rem); /* Diperkecil */
        text-align: center;
        opacity: 0;
        visibility: hidden;
        transform: translateX(100%) scale(0.95);
        transition: all 0.7s cubic-bezier(0.4, 0, 0.2, 1);
        display: flex;
        align-items: center;
        justify-content: center;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        z-index: 1;
    }

    .slide::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, rgba(16, 185, 129, 0.9), rgba(20, 184, 166, 0.85));
        z-index: 2;
    }

    .slide.active {
        opacity: 1;
        visibility: visible;
        transform: translateX(0) scale(1);
        z-index: 5;
    }

    .slide.prev {
        opacity: 0;
        visibility: hidden;
        transform: translateX(-100%) scale(0.95);
        z-index: 2;
    }

    .slide.next {
        opacity: 0;
        visibility: hidden;
        transform: translateX(100%) scale(0.95);
        z-index: 2;
    }

    .slide-content {
        max-width: 650px; /* Diperkecil dari 700px */
        margin: 0 auto;
        position: relative;
        z-index: 10;
    }

    .slide h3 {
        font-size: clamp(1.6rem, 3.5vw, 2.5rem); /* Diperkecil dari 1.8rem-3rem */
        font-weight: 800;
        margin-bottom: 1.2rem; /* Diperkecil dari 1.5rem */
        text-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        line-height: 1.1;
        background: linear-gradient(135deg, #ffffff, #f0fdfa);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .slide p {
        font-size: clamp(0.95rem, 2.2vw, 1.2rem); /* Diperkecil dari 1rem-1.3rem */
        margin-bottom: 1.8rem; /* Diperkecil dari 2rem */
        opacity: 0.95;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        line-height: 1.6;
        font-weight: 400;
    }

    .slide-btn {
        display: inline-flex;
        align-items: center;
        gap: 0.75rem;
        background: rgba(255, 255, 255, 0.95);
        color: var(--emerald-700);
        padding: clamp(0.9rem, 2.2vw, 1.1rem) clamp(1.3rem, 3.5vw, 2.2rem); /* Diperkecil */
        border-radius: 1.5rem;
        text-decoration: none;
        font-weight: 600;
        font-size: clamp(0.85rem, 1.8vw, 0.95rem); /* Diperkecil */
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: var(--shadow-lg);
        backdrop-filter: blur(12px);
        border: 2px solid rgba(255, 255, 255, 0.3);
        position: relative;
        overflow: hidden;
    }

    .slide-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
        transition: left 0.5s ease;
    }

    .slide-btn:hover::before {
        left: 100%;
    }

    .slide-btn:hover {
        transform: translateY(-3px) scale(1.05);
        box-shadow: var(--shadow-xl);
        background: var(--white);
        color: var(--emerald-800);
    }

    /* Slider Navigation - Enhanced */
    .slider-nav {
        position: absolute;
        bottom: 1.8rem; /* Diperkecil dari 2rem */
        left: 50%;
        transform: translateX(-50%);
        display: flex;
        gap: 0.75rem;
        z-index: 15;
    }

    .nav-dot {
        width: 10px; /* Diperkecil dari 12px */
        height: 10px;
        border-radius: 50%;
        background-color: rgba(255, 255, 255, 0.4);
        cursor: pointer;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border: 2px solid rgba(255, 255, 255, 0.6);
        position: relative;
    }

    .nav-dot::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 0;
        height: 0;
        background: var(--white);
        border-radius: 50%;
        transition: all 0.3s ease;
    }

    .nav-dot.active::before {
        width: 6px;
        height: 6px;
    }

    .nav-dot.active {
        background-color: var(--white);
        transform: scale(1.2);
        box-shadow: 0 0 15px rgba(255, 255, 255, 0.6);
    }

    /* Slider Arrows - Enhanced */
    .slider-arrow {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background: rgba(255, 255, 255, 0.2);
        color: var(--white);
        border: 2px solid rgba(255, 255, 255, 0.4);
        width: clamp(45px, 7vw, 55px); /* Diperkecil */
        height: clamp(45px, 7vw, 55px);
        border-radius: 50%;
        cursor: pointer;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: clamp(1rem, 1.8vw, 1.2rem); /* Diperkecil */
        z-index: 15;
        font-weight: bold;
        backdrop-filter: blur(8px);
    }

    .slider-arrow:hover {
        background: rgba(255, 255, 255, 0.3);
        transform: translateY(-50%) scale(1.1);
        border-color: rgba(255, 255, 255, 0.6);
        box-shadow: 0 0 20px rgba(255, 255, 255, 0.3);
    }

    .slider-arrow.prev {
        left: clamp(0.8rem, 2.5vw, 1.2rem); /* Diperkecil */
    }

    .slider-arrow.next {
        right: clamp(0.8rem, 2.5vw, 1.2rem);
    }
    
    /* Section Styles - Enhanced */
    .section {
        padding: clamp(1.8rem, 4vw, 2.5rem) 0; /* Diperkecil */
        position: relative;
    }
    
    .section-kampanye {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: var(--blur-backdrop);
        border-radius: 1.5rem;
        box-shadow: var(--shadow-lg);
        border: 1px solid rgba(255, 255, 255, 0.2);
        margin: 1.8rem 0; /* Diperkecil dari 2rem */
        padding: clamp(1.8rem, 3.5vw, 2.2rem); /* Diperkecil */
        position: relative;
        overflow: hidden;
    }

    .section-kampanye::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: conic-gradient(from 0deg, transparent, rgba(16, 185, 129, 0.03), transparent);
        animation: rotate 30s linear infinite;
        pointer-events: none;
    }
    
    .section-tentang {
        background: linear-gradient(135deg, var(--emerald-50), var(--teal-50));
        border-radius: 1.5rem;
        position: relative;
        overflow: hidden;
        padding: clamp(1.8rem, 4vw, 2.5rem); /* Diperkecil */
        margin: 1.8rem 0; /* Diperkecil */
    }

    .section-tentang::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: radial-gradient(circle at 20% 80%, rgba(16, 185, 129, 0.08) 0%, transparent 50%);
        pointer-events: none;
    }
    
    /* Search and Filter - Enhanced */
    .search-filter-section {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: var(--blur-backdrop);
        border-radius: 1.25rem;
        padding: clamp(1.3rem, 2.8vw, 1.8rem); /* Diperkecil */
        margin-bottom: 1.8rem; /* Diperkecil */
        box-shadow: var(--shadow-lg);
        border: 1px solid rgba(255, 255, 255, 0.2);
        position: relative;
        overflow: hidden;
    }

    .search-filter-section::after {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(16, 185, 129, 0.05), transparent);
        animation: shimmer 3s infinite;
    }
    
    .search-filter-container {
        display: flex;
        gap: 1.3rem; /* Diperkecil */
        align-items: center;
        flex-wrap: wrap;
        position: relative;
        z-index: 2;
    }
    
    .search-box {
        flex: 1;
        min-width: 260px; /* Diperkecil */
        position: relative;
    }
    
    .search-input {
        width: 100%;
        padding: 0.9rem 0.9rem 0.9rem 2.8rem; /* Diperkecil */
        border: 2px solid var(--emerald-200);
        border-radius: 1.3rem; /* Diperkecil */
        font-size: 0.95rem; /* Diperkecil */
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        background: rgba(248, 250, 252, 0.8);
        backdrop-filter: blur(8px);
        font-weight: 500;
    }
    
    .search-input:focus {
        outline: none;
        border-color: var(--emerald-500);
        background: var(--white);
        box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.15);
        transform: translateY(-1px);
    }

    .search-input::placeholder {
        color: var(--slate-400);
        font-weight: 400;
    }
    
    .search-icon {
        position: absolute;
        left: 0.9rem; /* Diperkecil */
        top: 50%;
        transform: translateY(-50%);
        color: var(--emerald-500);
        z-index: 2;
        transition: all 0.3s ease;
    }

    .search-input:focus + .search-icon {
        color: var(--emerald-600);
        transform: translateY(-50%) scale(1.1);
    }
    
    .filter-container {
        display: flex;
        gap: 0.7rem; /* Diperkecil */
        align-items: center;
        flex-wrap: wrap;
    }
    
    .filter-label {
        font-weight: 600;
        color: var(--slate-700);
        margin-right: 0.4rem; /* Diperkecil */
        font-size: 0.9rem; /* Diperkecil */
        white-space: nowrap;
    }
    
    .filter-select {
        padding: 0.9rem 1.1rem; /* Diperkecil */
        border: 2px solid var(--emerald-200);
        border-radius: 1.1rem; /* Diperkecil */
        background: rgba(248, 250, 252, 0.8);
        color: var(--slate-700);
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        min-width: 120px; /* Diperkecil */
        backdrop-filter: blur(8px);
    }
    
    .filter-select:focus {
        outline: none;
        border-color: var(--emerald-500);
        background: var(--white);
        box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.15);
        transform: translateY(-1px);
    }
    
    .filter-select:hover {
        border-color: var(--emerald-400);
        background: var(--white);
        transform: translateY(-1px);
    }
    
    /* Features Grid - Enhanced */
    .features-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); /* Diperkecil */
        gap: clamp(1.3rem, 2.8vw, 1.8rem); /* Diperkecil */
        margin: 2.2rem 0; /* Diperkecil */
    }
    
    .feature-card {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: var(--blur-backdrop);
        padding: clamp(1.3rem, 2.8vw, 1.8rem); /* Diperkecil */
        border-radius: 1.2rem; /* Diperkecil */
        box-shadow: var(--shadow-lg);
        text-align: center;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border: 1px solid rgba(255, 255, 255, 0.2);
        position: relative;
        overflow: hidden;
    }

    .feature-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: var(--gradient-emerald-light);
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .feature-card:hover::before {
        opacity: 0.05;
    }
    
    .feature-card:hover {
        transform: translateY(-5px) scale(1.02);
        box-shadow: var(--shadow-xl);
    }
    
    .feature-icon {
        width: 60px; /* Diperkecil dari 70px */
        height: 60px;
        background: var(--gradient-emerald);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.3rem auto; /* Diperkecil */
        color: var(--white);
        box-shadow: var(--shadow-lg);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        z-index: 2;
    }

    .feature-card:hover .feature-icon {
        transform: scale(1.1) rotate(5deg);
        box-shadow: var(--shadow-xl);
    }
    
    .feature-title {
        font-size: 1.2rem; /* Diperkecil dari 1.3rem */
        font-weight: 700;
        margin-bottom: 0.9rem; /* Diperkecil */
        color: var(--slate-800);
        position: relative;
        z-index: 2;
    }
    
    .feature-description {
        color: var(--slate-600);
        line-height: 1.6;
        font-size: 0.95rem; /* Diperkecil */
        position: relative;
        z-index: 2;
    }

    /* Campaign Grid - Enhanced */
    .campaign-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); /* Diperkecil */
        gap: clamp(1.1rem, 2.2vw, 1.3rem); /* Diperkecil */
        margin: 1.8rem 0; /* Diperkecil */
    }

    /* Campaign Item - Enhanced with Micro-interactions */
    .campaign-item {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: var(--blur-backdrop);
        border-radius: 1.2rem; /* Diperkecil */
        overflow: hidden;
        box-shadow: var(--shadow-lg);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border: 1px solid rgba(255, 255, 255, 0.2);
        position: relative;
        opacity: 0;
        transform: translateY(20px);
    }

    .campaign-item.visible {
        opacity: 1;
        transform: translateY(0);
    }

    .campaign-item.hidden {
        display: none;
    }

    /* Campaign Completed State */
    .campaign-item.completed {
        background: rgba(248, 250, 252, 0.95);
        border: 1px solid var(--slate-200);
    }

    .campaign-item.completed::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: var(--gradient-completed);
        opacity: 0.05;
        z-index: 1;
    }

    .campaign-item::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: var(--gradient-emerald-light);
        opacity: 0;
        transition: opacity 0.3s ease;
        z-index: 1;
    }

    .campaign-item:not(.completed):hover::before {
        opacity: 0.05;
    }

    .campaign-item:not(.completed):hover {
        transform: translateY(-5px) scale(1.02);
        box-shadow: var(--shadow-xl);
    }

    /* Disabled link for completed campaigns */
    .campaign-item.completed a {
        pointer-events: none;
        cursor: default;
    }

    .campaign-item a {
        text-decoration: none;
        color: inherit;
        display: block;
        position: relative;
        z-index: 2;
    }

    .campaign-item img {
        width: 100%;
        height: 180px; /* Diperkecil dari 200px */
        object-fit: cover;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .campaign-item:not(.completed):hover img {
        transform: scale(1.05);
        filter: brightness(1.1) saturate(1.1);
    }

    .campaign-item.completed img {
        filter: grayscale(0.3) brightness(0.9);
    }

    /* Campaign Status Badge - Enhanced */
    .campaign-status-badge {
        position: absolute;
        top: 0.9rem; /* Diperkecil */
        right: 0.9rem;
        background: var(--emerald-500);
        color: var(--white);
        padding: 0.4rem 0.9rem; /* Diperkecil */
        border-radius: 0.9rem; /* Diperkecil */
        font-size: 0.75rem; /* Diperkecil */
        font-weight: 600;
        z-index: 10;
        box-shadow: var(--shadow-lg);
        backdrop-filter: blur(8px);
        animation: badgePulse 2s ease-in-out infinite;
    }

    .campaign-status-badge.completed {
        background: var(--slate-500);
        animation: none;
    }

    .campaign-status-badge.almost-complete {
        background: var(--orange-500);
    }

    .campaign-content {
        padding: clamp(1.1rem, 2.2vw, 1.3rem); /* Diperkecil */
        position: relative;
        z-index: 2;
    }

    .campaign-title {
        font-size: clamp(1rem, 1.8vw, 1.1rem); /* Diperkecil */
        font-weight: 700;
        margin-bottom: 0.9rem; /* Diperkecil */
        color: var(--slate-800);
        line-height: 1.4;
        transition: color 0.3s ease;
    }

    .campaign-item:not(.completed):hover .campaign-title {
        color: var(--emerald-700);
    }

    .campaign-item.completed .campaign-title {
        color: var(--slate-600);
    }

    /* Progress Bar - Enhanced with Glow Effect */
    .progress-bar-container {
        width: 100%;
        height: 7px; /* Diperkecil dari 8px */
        background-color: var(--emerald-100);
        border-radius: 4px;
        overflow: hidden;
        margin: 0.9rem 0; /* Diperkecil */
        position: relative;
        box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
    }

    .progress-bar {
        height: 100%;
        background: var(--gradient-emerald);
        border-radius: 4px;
        transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        box-shadow: 0 1px 5px rgba(16, 185, 129, 0.3);
    }

    .progress-bar.completed {
        background: var(--gradient-completed);
        box-shadow: 0 1px 5px rgba(100, 116, 139, 0.3);
    }

    .progress-bar::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
        animation: shimmer 2s infinite;
    }

    .progress-percentage-text {
        position: absolute;
        top: -20px; /* Diperkecil */
        right: 0;
        font-size: 0.75rem; /* Diperkecil */
        font-weight: 700;
        color: var(--slate-700);
        background: rgba(255, 255, 255, 0.9);
        padding: 0.15rem 0.5rem; /* Diperkecil */
        border-radius: 0.7rem; /* Diperkecil */
        backdrop-filter: blur(4px);
        box-shadow: var(--shadow);
    }

    .progress-percentage-text.completed {
        background: var(--emerald-500);
        color: var(--white);
    }

    .campaign-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 0.9rem; /* Diperkecil */
        font-size: 0.85rem; /* Diperkecil */
        position: relative;
        z-index: 2;
    }

    .campaign-footer strong {
        color: var(--emerald-600);
        font-weight: 700;
    }

    .campaign-item.completed .campaign-footer strong {
        color: var(--slate-600);
    }

    .donator-count { 
        display: flex; 
        align-items: center; 
        gap: 5px; /* Diperkecil */
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        color: var(--slate-600);
    }

    .campaign-item.completed .donator-count {
        color: var(--slate-500);
    }

    /* Contact Section - Enhanced */
    .contact-section {
        background: var(--gradient-emerald);
        color: var(--white);
        border-radius: 1.5rem;
        padding: clamp(1.8rem, 4vw, 2.5rem); /* Diperkecil */
        margin: 1.8rem 0; /* Diperkecil */
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .contact-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: radial-gradient(circle at 30% 70%, rgba(255, 255, 255, 0.1) 0%, transparent 50%);
        pointer-events: none;
    }

    .contact-content {
        position: relative;
        z-index: 2;
    }

    .contact-section .section-title {
        color: var(--white);
        margin-bottom: 0.9rem; /* Diperkecil */
    }

    .contact-section .section-title::after {
        background: var(--white);
    }

    .contact-section .page-subtitle {
        color: rgba(255, 255, 255, 0.9);
        margin-bottom: 1.8rem; /* Diperkecil */
    }

    .btn-contact {
        display: inline-flex;
        align-items: center;
        gap: 0.7rem; /* Diperkecil */
        background: var(--white);
        color: var(--emerald-700);
        padding: 1.1rem 2.2rem; /* Diperkecil */
        border-radius: 1.3rem; /* Diperkecil */
        text-decoration: none;
        font-weight: 600;
        font-size: 0.95rem; /* Diperkecil */
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: var(--shadow-lg);
        position: relative;
        overflow: hidden;
    }

    .btn-contact::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(16, 185, 129, 0.1), transparent);
        transition: left 0.5s ease;
    }

    .btn-contact:hover::before {
        left: 100%;
    }

    .btn-contact:hover {
        transform: translateY(-3px) scale(1.05);
        box-shadow: var(--shadow-xl);
        background: var(--emerald-50);
    }

    /* Load More Button - CENTERED & Enhanced */
    .load-more-container {
        text-align: center;
        margin-top: 2.5rem; /* Diperkecil */
        position: relative;
    }

    .btn-load-more {
        background: var(--gradient-animated);
        background-size: 300% 300%;
        animation: gradientShift 6s ease infinite;
        color: var(--white);
        border: none;
        padding: 1.1rem 2.5rem; /* Diperkecil */
        border-radius: 1.5rem;
        font-weight: 600;
        font-size: 0.95rem; /* Diperkecil */
        cursor: pointer;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: var(--shadow-lg);
        position: relative;
        overflow: hidden;
        backdrop-filter: blur(8px);
        border: 2px solid rgba(255, 255, 255, 0.2);
        
        /* CENTERED - Explicitly centered */
        display: block;
        margin: 0 auto;
    }

    .btn-load-more::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
        transition: left 0.5s ease;
    }

    .btn-load-more:hover::before {
        left: 100%;
    }

    .btn-load-more:hover {
        transform: translateY(-3px) scale(1.05);
        box-shadow: var(--shadow-xl);
        border-color: rgba(255, 255, 255, 0.4);
    }

    .btn-load-more:active {
        transform: translateY(-1px) scale(1.02);
    }

    /* Responsive Design - Enhanced */
    @media (max-width: 768px) {
        .container {
            padding: 0 1rem;
        }

        .search-filter-container {
            flex-direction: column;
            align-items: stretch;
            gap: 1rem;
        }

        .search-box {
            min-width: auto;
        }

        .filter-container {
            justify-content: center;
            flex-wrap: wrap;
        }

        .campaign-grid {
            grid-template-columns: 1fr;
            gap: 1rem;
        }

        .features-grid {
            grid-template-columns: 1fr;
            gap: 1.3rem;
        }

        .section-kampanye,
        .section-tentang,
        .contact-section {
            margin: 1.3rem 0;
        }

        .hero-decoration {
            display: none;
        }
    }

    @media (max-width: 480px) {
        .container {
            padding: 0 0.75rem;
        }

        .slide {
            padding: 1.3rem 1rem;
        }

        .section {
            padding: 1.3rem 0;
        }

        .section-kampanye,
        .section-tentang {
            padding: 1.3rem;
            margin: 1rem 0;
        }

        .contact-section {
            padding: 1.8rem 1.3rem;
            margin: 1rem 0;
        }

        .search-filter-section {
            padding: 1.1rem;
        }

        .feature-card {
            padding: 1.1rem;
        }

        .campaign-content {
            padding: 1rem;
        }

        .campaign-grid {
            gap: 0.75rem;
        }

        .btn-load-more {
            padding: 1rem 2rem;
            font-size: 0.9rem;
        }
    }

    /* Animation Keyframes - Enhanced */
    @keyframes slideContentIn {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes shimmer {
        0% {
            transform: translateX(-100%);
        }
        100% {
            transform: translateX(100%);
        }
    }

    @keyframes pulse {
        0%, 100% {
            opacity: 1;
            transform: scale(1);
        }
        50% {
            opacity: 0.7;
            transform: scale(1.05);
        }
    }

    @keyframes float {
        0% {
            transform: translateY(100vh) rotate(0deg);
            opacity: 0;
        }
        10% {
            opacity: 0.1;
        }
        90% {
            opacity: 0.1;
        }
        100% {
            transform: translateY(-100px) rotate(360deg);
            opacity: 0;
        }
    }

    @keyframes rotate {
        from {
            transform: rotate(0deg);
        }
        to {
            transform: rotate(360deg);
        }
    }

    @keyframes gradientShift {
        0% {
            background-position: 0% 50%;
        }
        50% {
            background-position: 100% 50%;
        }
        100% {
            background-position: 0% 50%;
        }
    }

    @keyframes expandContract {
        0%, 100% {
            width: 50px;
        }
        50% {
            width: 80px;
        }
    }

    @keyframes backgroundShift {
        0%, 100% {
            opacity: 1;
        }
        50% {
            opacity: 0.8;
        }
    }

    @keyframes badgePulse {
        0%, 100% {
            transform: scale(1);
            box-shadow: var(--shadow-lg);
        }
        50% {
            transform: scale(1.05);
            box-shadow: var(--shadow-xl);
        }
    }

    /* Utility Classes */
    .text-center {
        text-align: center;
    }

    .mb-4 {
        margin-bottom: 1rem;
    }

    .mb-6 {
        margin-bottom: 1.5rem;
    }

    .mt-4 {
        margin-top: 1rem;
    }

    .mt-6 {
        margin-top: 1.5rem;
    }

    .hidden {
        display: none;
    }

    .visible {
        display: block;
    }

    /* Accessibility Improvements */
    @media (prefers-reduced-motion: reduce) {
        * {
            animation-duration: 0.01ms !important;
            animation-iteration-count: 1 !important;
            transition-duration: 0.01ms !important;
        }
    }

    /* Focus States for Better Accessibility */
    .slide-btn:focus,
    .btn-contact:focus,
    .btn-load-more:focus {
        outline: 3px solid rgba(16, 185, 129, 0.5);
        outline-offset: 2px;
    }

    .search-input:focus,
    .filter-select:focus {
        outline: 3px solid rgba(16, 185, 129, 0.3);
        outline-offset: 1px;
    }
</style>

<!-- Floating Particles Background -->
<div class="floating-particles">
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
</div>

<section class="hero-section">
    <!-- Decorative Elements -->
    <div class="hero-decoration"></div>
    <div class="hero-decoration"></div>
    
    <div class="container">
        <h1 class="page-title">Platform Crowdfunding Terpercaya</h1>
        <p class="page-subtitle">Wujudkan impian Anda bersama komunitas yang peduli. Mulai kampanye atau dukung proyek yang menginspirasi.</p>
        
        <div class="slider-container">
            <div class="slider-wrapper">
                @php
                $pondokPesantren = [
                    [
                        'nama' => 'Pondok Pesantren Hidayatul Muhsinin',
                        'deskripsi' => 'Wujudkan impian pendidikan islami berahlak mulia untuk putra putri anda dipondok pesantren Hidayatul Muhsinin.',
                        'link' => 'https://hidayatulmuhsinin.amallan.id/',
                        'gambar' => 'assets/images/slider/gambar-baru-1.jpg'
                    ],
                    [
                        'nama' => 'Pondok Pesantren Serumpun Cahaya',
                        'deskripsi' => 'Mewujudkan generasi yang cerdas, jenius, trampil, disiplin dan berakhqul karimah dalam kehidupan sosial, saling menghormati dan menghargai.',
                        'link' => 'https://serumpuncahaya.amallan.id/',
                        'gambar' => 'assets/images/slider/gambar-baru-2.jpg'
                    ],
                    [
                        'nama' => 'Pondok Pesantren Fastabiqul Khoirat',
                        'deskripsi' => 'Jadilah penerus islam yang sejati di pondok pesantren fastabiqul khoirat, cukuplah yatim orang tuanya namun tidak yatim ilmu & akhlak. .',
                        'link' => 'https://fastabiqulkhairat.amallan.id/',
                        'gambar' => 'assets/images/slider/gambar-baru-3.jpg'
                    ],
                    [
                        'nama' => 'Pondok Pesantren Darul Falah',
                        'deskripsi' => 'Darul Falah Tempat Ananda Tumbuh dalam Iman dan Ilmu.',
                        'link' => 'https://darulfalah.amallan.id/',
                        'gambar' => 'assets/images/slider/gambar-baru-4.jpeg'
                    ],
                    [
                        'nama' => 'Pondok Pesantren Nurul Amin',
                        'deskripsi' => 'Selamat datang di Pesantren Nurul Amin Dengan rahmat Allah SWT, kami hadir sebagai lembaga pendidikan Islam yang berkomitmen mencetak generasi berakidah lurus, berakhlak mulia, dan unggul dalam ilmu serta amal',
                        'link' => 'https://nurulamin.amallan.id/',
                        'gambar' => 'assets/images/slider/gambar-baru-5.jpg'
                    ]
                ];
                @endphp
                
                @foreach($pondokPesantren as $index => $pondok)
                <div class="slide {{ $index === 0 ? 'active' : '' }}" style="background-image: url('{{ asset($pondok['gambar']) }}')">
                    <div class="slide-content">
                        <h3>{{ $pondok['nama'] }}</h3>
                        <p>{{ $pondok['deskripsi'] }}</p>
                        <a href="{{ $pondok['link'] }}" class="slide-btn">
                            Lihat Detail Pondok
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="m9 18 6-6-6-6"/>
                            </svg>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
            
            <div class="slider-nav">
                @foreach($pondokPesantren as $index => $pondok)
                <div class="nav-dot {{ $index === 0 ? 'active' : '' }}" data-slide="{{ $index }}"></div>
                @endforeach
            </div>
            
            <div class="slider-arrow prev" aria-label="Previous slide">‹</div>
            <div class="slider-arrow next" aria-label="Next slide">›</div>
        </div>
    </div>
</section>

<section class="section section-kampanye" id="kampanye">
    <div class="container">
        <h2 class="section-title">Kampanye Terbaru</h2>
        
        <div class="search-filter-section">
            <div class="search-filter-container">
                <div class="search-box">
                    <input type="text" id="searchInput" class="search-input" placeholder="Cari kampanye..." aria-label="Cari kampanye">
                    <svg class="search-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="11" cy="11" r="8"/>
                        <path d="m21 21-4.35-4.35"/>
                    </svg>
                </div>
                
                <div class="filter-container">
                    <span class="filter-label">Urutkan:</span>
                    <select id="sortFilter" class="filter-select" aria-label="Urutkan kampanye">
                        <option value="newest">Terbaru</option>
                        <option value="oldest">Terlama</option>
                        <option value="target_asc">Target Terendah</option>
                        <option value="target_desc">Target Tertinggi</option>
                        <option value="progress_desc">Progress Tertinggi</option>
                    </select>
                </div>
            </div>
        </div>
        
        <div class="campaign-grid" id="campaignGrid">
            @foreach($campaigns as $campaign)
            @php
                $progressPercentage = min(($campaign->collected_amount / $campaign->target_amount) * 100, 100);
                $isCompleted = $progressPercentage >= 100;
                $isAlmostComplete = $progressPercentage >= 90 && $progressPercentage < 100;
            @endphp
            <div class="campaign-item visible {{ $isCompleted ? 'completed' : '' }}" 
                 data-title="{{ strtolower($campaign->title) }}" 
                 data-created="{{ $campaign->created_at->timestamp }}" 
                 data-target="{{ $campaign->target_amount }}" 
                 data-progress="{{ $progressPercentage }}">
                
                <!-- Status Badge -->
                @if($isCompleted)
                    <div class="campaign-status-badge completed">TARGET TERCAPAI</div>
                @elseif($isAlmostComplete)
                    <div class="campaign-status-badge almost-complete">HAMPIR SELESAI</div>
                @else
                    <div class="campaign-status-badge">AKTIF</div>
                @endif
                
                <!-- Conditional Link - Disabled if completed -->
                @if($isCompleted)
                    <div>
                @else
                    <a href="{{ route('campaigns.show', $campaign) }}">
                @endif
                    @if($campaign->image)
                        <img src="{{ asset('storage/' . $campaign->image) }}" alt="{{ $campaign->title }}">
                    @else
                        <img src="https://via.placeholder.com/400x180/10b981/ffffff?text=Kampanye" alt="{{ $campaign->title }}">
                    @endif
                    
                    <div class="campaign-content">
                        <h3 class="campaign-title">{{ $campaign->title }}</h3>
                        
                        <div class="progress-bar-container">
                            <div class="progress-bar {{ $isCompleted ? 'completed' : '' }}" style="width: {{ $progressPercentage }}%"></div>
                            <div class="progress-percentage-text {{ $isCompleted ? 'completed' : '' }}">
                                {{ number_format($progressPercentage, 1) }}%
                            </div>
                        </div>
                        
                        <div class="campaign-footer">
                            <div>
                                <strong>Rp {{ number_format($campaign->collected_amount, 0, ',', '.') }}</strong>
                                <br>
                                <small>dari Rp {{ number_format($campaign->target_amount, 0, ',', '.') }}</small>
                            </div>
                            <div class="donator-count">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
                                    <circle cx="9" cy="7" r="4"/>
                                    <path d="M22 21v-2a4 4 0 0 0-3-3.87"/>
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                                </svg>
                                {{ $campaign->donations->where('status', 'verified')->count() }} donatur
                            </div>
                        </div>
                    </div>
                @if($isCompleted)
                    </div>
                @else
                    </a>
                @endif
            </div>
            @endforeach
        </div>
        
        <!-- TOMBOL MUAT LEBIH BANYAK - CENTERED -->
        <div class="load-more-container">
            <button class="btn-load-more" id="loadMoreBtn" style="display: none;">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-right: 0.5rem;">
                    <path d="M12 5v14"/>
                    <path d="m19 12-7 7-7-7"/>
                </svg>
                Muat Lebih Banyak
            </button>
        </div>
    </div>
</section>

<section class="section section-tentang" id="tentang">
    <div class="container">
        <h2 class="section-title">Mengapa Memilih Platform Kami?</h2>
        
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                    </svg>
                </div>
                <h3 class="feature-title">Keamanan Terjamin</h3>
                <p class="feature-description">Sistem keamanan berlapis dan enkripsi data untuk melindungi setiap transaksi dan informasi pribadi Anda.</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                        <circle cx="9" cy="7" r="4"/>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                    </svg>
                </div>
                <h3 class="feature-title">Komunitas Solid</h3>
                <p class="feature-description">Bergabung dengan ribuan orang yang peduli dan siap mendukung proyek-proyek bermakna.</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M3 3v18h18"/>
                        <path d="M18.7 8l-5.1 5.2-2.8-2.7L7 14.3"/>
                    </svg>
                </div>
                <h3 class="feature-title">Transparansi Penuh</h3>
                <p class="feature-description">Pantau perkembangan kampanye secara real-time dengan laporan yang jelas dan transparan.</p>
            </div>
        </div>
    </div>
</section>

<section class="contact-section" id="kontak">
    <div class="container">
        <div class="contact-content">
            <h2 class="section-title">Butuh Bantuan?</h2>
            <p class="page-subtitle">Tim support kami siap membantu Anda 24/7. Hubungi kami untuk konsultasi gratis.</p>
            <a href="mailto:support@crowdfunding.com" class="btn-contact">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                    <polyline points="22,6 12,13 2,6"/>
                </svg>
                Hubungi Kami
            </a>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Slider functionality
    const slides = document.querySelectorAll('.slide');
    const navDots = document.querySelectorAll('.nav-dot');
    const prevBtn = document.querySelector('.slider-arrow.prev');
    const nextBtn = document.querySelector('.slider-arrow.next');
    let currentSlide = 0;
    const totalSlides = slides.length;

    function showSlide(index) {
        slides.forEach((slide, i) => {
            slide.classList.remove("active", "prev", "next");
            if (i === index) {
                slide.classList.add("active");
            } else if (i < index) {
                slide.classList.add("prev");
            } else {
                slide.classList.add("next");
            }
        });

        navDots.forEach((dot, i) => {
            dot.classList.toggle("active", i === index);
        });
    }

    function nextSlide() {
        currentSlide = (currentSlide + 1) % totalSlides;
        showSlide(currentSlide);
    }

    function prevSlide() {
        currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
        showSlide(currentSlide);
    }

    // Event listeners
    nextBtn?.addEventListener("click", nextSlide);
    prevBtn?.addEventListener("click", prevSlide);

    navDots.forEach((dot, index) => {
        dot.addEventListener("click", () => {
            currentSlide = index;
            showSlide(currentSlide);
        });
    });

    // Auto-play slider with pause on hover
    let autoPlayInterval = setInterval(nextSlide, 5000);
    
    const sliderContainer = document.querySelector('.slider-container');
    if (sliderContainer) {
        sliderContainer.addEventListener('mouseenter', () => {
            clearInterval(autoPlayInterval);
        });
        
        sliderContainer.addEventListener('mouseleave', () => {
            autoPlayInterval = setInterval(nextSlide, 5000);
        });
    }

    // Search and filter functionality with enhanced campaign status logic
    const searchInput = document.getElementById('searchInput');
    const sortFilter = document.getElementById('sortFilter');
    const campaignGrid = document.getElementById('campaignGrid');
    const campaignItems = Array.from(document.querySelectorAll('.campaign-item'));
    const loadMoreBtn = document.getElementById('loadMoreBtn');
    
    let visibleCount = 6;
    const itemsPerLoad = 6;

    // Enhanced function to handle campaign status and filtering
    function updateCampaignStatus() {
        campaignItems.forEach(item => {
            const progress = parseFloat(item.dataset.progress);
            const isCompleted = progress >= 100;
            
            // Update campaign item classes
            if (isCompleted) {
                item.classList.add('completed');
                // Disable the link
                const link = item.querySelector('a');
                if (link) {
                    link.style.pointerEvents = 'none';
                    link.style.cursor = 'default';
                }
            } else {
                item.classList.remove('completed');
                // Enable the link
                const link = item.querySelector('a');
                if (link) {
                    link.style.pointerEvents = 'auto';
                    link.style.cursor = 'pointer';
                }
            }
        });
    }

    function filterAndSortCampaigns() {
        const searchTerm = searchInput?.value.toLowerCase() || '';
        const sortValue = sortFilter?.value || 'newest';

        // Filter campaigns
        let filteredItems = campaignItems.filter(item => {
            const title = item.dataset.title || '';
            return title.includes(searchTerm);
        });

        // Sort campaigns
        filteredItems.sort((a, b) => {
            switch (sortValue) {
                case 'oldest':
                    return parseInt(a.dataset.created) - parseInt(b.dataset.created);
                case 'target_asc':
                    return parseInt(a.dataset.target) - parseInt(b.dataset.target);
                case 'target_desc':
                    return parseInt(b.dataset.target) - parseInt(a.dataset.target);
                case 'progress_desc':
                    return parseFloat(b.dataset.progress) - parseFloat(a.dataset.progress);
                default: // newest
                    return parseInt(b.dataset.created) - parseInt(a.dataset.created);
            }
        });

        // Hide all items first
        campaignItems.forEach(item => {
            item.classList.add('hidden');
            item.classList.remove('visible');
        });

        // Show filtered and sorted items with staggered animation
        filteredItems.forEach((item, index) => {
            if (index < visibleCount) {
                item.classList.remove('hidden');
                item.classList.add('visible');
                // Add staggered animation
                setTimeout(() => {
                    item.style.opacity = '1';
                    item.style.transform = 'translateY(0)';
                }, index * 100);
            }
        });

        // Show/hide load more button
        if (loadMoreBtn) {
            loadMoreBtn.style.display = filteredItems.length > visibleCount ? 'block' : 'none';
        }

        // Reorder items in DOM
        filteredItems.forEach(item => {
            campaignGrid?.appendChild(item);
        });
    }

    function loadMoreCampaigns() {
        visibleCount += itemsPerLoad;
        filterAndSortCampaigns();
        
        // Add loading animation to button
        const btn = loadMoreBtn;
        if (btn) {
            const originalText = btn.innerHTML;
            btn.innerHTML = '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-right: 0.5rem; animation: rotate 1s linear infinite;"><circle cx="12" cy="12" r="10"/><path d="m16 12-4-4-4 4"/><path d="m16 12-4 4-4-4"/></svg>Memuat...';
            btn.disabled = true;
            
            setTimeout(() => {
                btn.innerHTML = originalText;
                btn.disabled = false;
            }, 800);
        }
    }

    // Event listeners for search and filter
    searchInput?.addEventListener('input', filterAndSortCampaigns);
    sortFilter?.addEventListener('change', filterAndSortCampaigns);
    loadMoreBtn?.addEventListener('click', loadMoreCampaigns);

    // Initial setup
    updateCampaignStatus();
    filterAndSortCampaigns();

    // Animate campaign items on scroll with Intersection Observer
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);

    campaignItems.forEach(item => {
        observer.observe(item);
    });

    // Keyboard navigation for accessibility
    document.addEventListener('keydown', function(e) {
        if (e.key === 'ArrowLeft' && prevBtn) {
            prevSlide();
        } else if (e.key === 'ArrowRight' && nextBtn) {
            nextSlide();
        }
    });

    // Touch/swipe support for mobile
    let touchStartX = 0;
    let touchEndX = 0;

    const sliderWrapper = document.querySelector('.slider-wrapper');
    if (sliderWrapper) {
        sliderWrapper.addEventListener('touchstart', function(e) {
            touchStartX = e.changedTouches[0].screenX;
        });

        sliderWrapper.addEventListener('touchend', function(e) {
            touchEndX = e.changedTouches[0].screenX;
            handleSwipe();
        });

        function handleSwipe() {
            const swipeThreshold = 50;
            const diff = touchStartX - touchEndX;
            
            if (Math.abs(diff) > swipeThreshold) {
                if (diff > 0) {
                    nextSlide(); // Swipe left - next slide
                } else {
                    prevSlide(); // Swipe right - previous slide
                }
            }
        }
    }

    // Performance optimization: Debounce search input
    function debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }

    // Apply debounce to search
    if (searchInput) {
        searchInput.removeEventListener('input', filterAndSortCampaigns);
        searchInput.addEventListener('input', debounce(filterAndSortCampaigns, 300));
    }

    // Enhanced micro-interactions
    const cards = document.querySelectorAll('.campaign-item, .feature-card');
    cards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-5px) scale(1.02)';
        });
        
        card.addEventListener('mouseleave', function() {
            if (!this.classList.contains('completed')) {
                this.style.transform = 'translateY(0) scale(1)';
            }
        });
    });

    // Parallax effect for floating particles
    window.addEventListener('scroll', function() {
        const scrolled = window.pageYOffset;
        const particles = document.querySelectorAll('.particle');
        
        particles.forEach((particle, index) => {
            const speed = 0.5 + (index * 0.1);
            particle.style.transform = `translateY(${scrolled * speed}px)`;
        });
    });
});
</script>

@endsection

