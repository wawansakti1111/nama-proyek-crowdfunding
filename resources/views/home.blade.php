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

    /* Typography - Judul Diperkecil & GARIS DIHILANGKAN */
    .page-title {
        font-size: clamp(2rem, 4vw, 3rem);
        font-weight: 800;
        text-align: center;
        margin-bottom: 1rem;
        background: var(--gradient-animated);
        background-size: 300% 300%;
        animation: gradientShift 6s ease infinite;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        line-height: 1.1;
        position: relative;
        /* GARIS DIHILANGKAN - ::after removed */
    }

    .page-subtitle {
        font-size: clamp(1rem, 2vw, 1.2rem);
        text-align: center;
        color: var(--slate-600);
        margin-bottom: 2.5rem;
        max-width: 550px;
        margin-left: auto;
        margin-right: auto;
        line-height: 1.6;
        position: relative;
    }

    .section-title {
        font-size: clamp(1.8rem, 3.5vw, 2.2rem);
        font-weight: 700;
        text-align: center;
        margin-bottom: 1.8rem;
        color: var(--slate-800);
        position: relative;
        /* GARIS DIHILANGKAN - ::after removed */
    }

    /* Hero Section dengan Elemen Menarik */
    .hero-section {
        padding: clamp(2.5rem, 6vw, 4rem) 0;
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
        height: clamp(300px, 45vw, 420px);
        overflow: hidden;
    }

    .slide {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        color: var(--white);
        padding: clamp(1.5rem, 4vw, 2.5rem);
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
        max-width: 650px;
        margin: 0 auto;
        position: relative;
        z-index: 10;
    }

    .slide h3 {
        font-size: clamp(1.6rem, 3.5vw, 2.5rem);
        font-weight: 800;
        margin-bottom: 1.2rem;
        text-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        line-height: 1.1;
        background: linear-gradient(135deg, #ffffff, #f0fdfa);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .slide p {
        font-size: clamp(0.95rem, 2.2vw, 1.2rem);
        margin-bottom: 1.8rem;
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
        padding: clamp(0.9rem, 2.2vw, 1.1rem) clamp(1.3rem, 3.5vw, 2.2rem);
        border-radius: 1.5rem;
        text-decoration: none;
        font-weight: 600;
        font-size: clamp(0.85rem, 1.8vw, 0.95rem);
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
        bottom: 1.8rem;
        left: 50%;
        transform: translateX(-50%);
        display: flex;
        gap: 0.75rem;
        z-index: 15;
    }

    .nav-dot {
        width: 10px;
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
        width: clamp(45px, 7vw, 55px);
        height: clamp(45px, 7vw, 55px);
        border-radius: 50%;
        cursor: pointer;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: clamp(1rem, 1.8vw, 1.2rem);
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
        left: clamp(0.8rem, 2.5vw, 1.2rem);
    }

    .slider-arrow.next {
        right: clamp(0.8rem, 2.5vw, 1.2rem);
    }
    
    /* Section Styles - Enhanced */
    .section {
        padding: clamp(1.8rem, 4vw, 2.5rem) 0;
        position: relative;
    }
    
    .section-kampanye {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: var(--blur-backdrop);
        border-radius: 1.5rem;
        box-shadow: var(--shadow-lg);
        border: 1px solid rgba(255, 255, 255, 0.2);
        margin: 1.8rem 0;
        padding: clamp(1.8rem, 3.5vw, 2.2rem);
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
        padding: clamp(1.8rem, 4vw, 2.5rem);
        margin: 1.8rem 0;
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
        padding: clamp(1.3rem, 2.8vw, 1.8rem);
        margin-bottom: 1.8rem;
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
        gap: 1.3rem;
        align-items: center;
        flex-wrap: wrap;
        position: relative;
        z-index: 2;
    }
    
    .search-box {
        flex: 1;
        min-width: 260px;
        position: relative;
    }
    
    .search-input {
        width: 100%;
        padding: 0.9rem 0.9rem 0.9rem 2.8rem;
        border: 2px solid var(--emerald-200);
        border-radius: 1.3rem;
        font-size: 0.95rem;
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
        left: 0.9rem;
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
        gap: 0.7rem;
        align-items: center;
        flex-wrap: wrap;
    }
    
    .filter-label {
        font-weight: 600;
        color: var(--slate-700);
        margin-right: 0.4rem;
        font-size: 0.9rem;
        white-space: nowrap;
    }
    
    .filter-select {
        padding: 0.9rem 1.1rem;
        border: 2px solid var(--emerald-200);
        border-radius: 1.1rem;
        background: rgba(248, 250, 252, 0.8);
        color: var(--slate-700);
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        min-width: 120px;
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
        grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
        gap: clamp(1.3rem, 2.8vw, 1.8rem);
        margin: 2.2rem 0;
    }
    
    .feature-card {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: var(--blur-backdrop);
        padding: clamp(1.3rem, 2.8vw, 1.8rem);
        border-radius: 1.2rem;
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
        width: 60px;
        height: 60px;
        background: var(--gradient-emerald);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.3rem auto;
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
        font-size: 1.2rem;
        font-weight: 700;
        margin-bottom: 0.9rem;
        color: var(--slate-800);
        position: relative;
        z-index: 2;
    }
    
    .feature-description {
        color: var(--slate-600);
        line-height: 1.6;
        font-size: 0.95rem;
        position: relative;
        z-index: 2;
    }

    /* Campaign Grid - Enhanced */
    .campaign-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: clamp(1.1rem, 2.2vw, 1.3rem);
        margin: 1.8rem 0;
    }

    /* Campaign Item - Enhanced with Micro-interactions */
    .campaign-item {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: var(--blur-backdrop);
        border-radius: 1.2rem;
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
        height: 180px;
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
        top: 0.9rem;
        right: 0.9rem;
        background: var(--emerald-500);
        color: var(--white);
        padding: 0.4rem 0.9rem;
        border-radius: 0.9rem;
        font-size: 0.75rem;
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
        padding: clamp(1.1rem, 2.2vw, 1.3rem);
        position: relative;
        z-index: 2;
    }

    .campaign-title {
        font-size: 1.1rem;
        font-weight: 700;
        margin-bottom: 0.9rem;
        color: var(--slate-800);
        line-height: 1.3;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .campaign-item.completed .campaign-title {
        color: var(--slate-600);
    }

    /* Progress Bar - Enhanced */
    .progress-bar-container {
        position: relative;
        background: var(--slate-200);
        border-radius: 1rem;
        height: 8px;
        margin: 1rem 0;
        overflow: hidden;
        box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .progress-bar {
        height: 100%;
        background: var(--gradient-emerald);
        border-radius: 1rem;
        transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
        box-shadow: 0 0 10px rgba(16, 185, 129, 0.3);
    }

    .progress-bar::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
        animation: progressShimmer 2s infinite;
    }

    .progress-bar.completed {
        background: var(--gradient-completed);
        box-shadow: 0 0 10px rgba(100, 116, 139, 0.3);
    }

    .progress-percentage-text {
        position: absolute;
        top: 50%;
        right: 0.5rem;
        transform: translateY(-50%);
        font-size: 0.7rem;
        font-weight: 600;
        color: var(--emerald-700);
        background: rgba(255, 255, 255, 0.9);
        padding: 0.2rem 0.5rem;
        border-radius: 0.5rem;
        backdrop-filter: blur(4px);
    }

    .progress-percentage-text.completed {
        color: var(--slate-600);
    }

    .campaign-footer {
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
        margin-top: 1rem;
        font-size: 0.9rem;
    }

    .campaign-footer strong {
        color: var(--emerald-700);
        font-size: 1rem;
    }

    .campaign-item.completed .campaign-footer strong {
        color: var(--slate-600);
    }

    .campaign-footer small {
        color: var(--slate-500);
        font-size: 0.8rem;
    }

    .donator-count {
        display: flex;
        align-items: center;
        gap: 0.4rem;
        color: var(--slate-600);
        font-size: 0.85rem;
        font-weight: 500;
    }

    .campaign-item.completed .donator-count {
        color: var(--slate-500);
    }

    /* EMPTY STATE STYLES - PESAN KAMPANYE KOSONG TANPA ROUTE */
    .empty-campaigns-container {
        text-align: center;
        padding: clamp(3rem, 6vw, 4rem) clamp(1.5rem, 3vw, 2rem);
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: var(--blur-backdrop);
        border-radius: 1.5rem;
        box-shadow: var(--shadow-lg);
        border: 1px solid rgba(255, 255, 255, 0.2);
        margin: 2rem 0;
        position: relative;
        overflow: hidden;
    }

    .empty-campaigns-container::before {
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

    .empty-icon {
        width: 100px;
        height: 100px;
        background: var(--gradient-emerald-light);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 2rem auto;
        color: var(--white);
        box-shadow: var(--shadow-xl);
        position: relative;
        z-index: 2;
        animation: emptyIconFloat 3s ease-in-out infinite;
    }

    .empty-icon::before {
        content: '';
        position: absolute;
        top: -8px;
        left: -8px;
        right: -8px;
        bottom: -8px;
        background: var(--gradient-emerald);
        border-radius: 50%;
        z-index: -1;
        opacity: 0.3;
        animation: pulse 2s ease-in-out infinite;
    }

    .empty-title {
        font-size: clamp(1.5rem, 3vw, 2rem);
        font-weight: 800;
        color: var(--slate-800);
        margin-bottom: 1rem;
        position: relative;
        z-index: 2;
        background: var(--gradient-animated);
        background-size: 300% 300%;
        animation: gradientShift 6s ease infinite;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .empty-description {
        font-size: clamp(1rem, 2vw, 1.1rem);
        color: var(--slate-600);
        margin-bottom: 2rem;
        max-width: 500px;
        margin-left: auto;
        margin-right: auto;
        line-height: 1.6;
        position: relative;
        z-index: 2;
    }

    .empty-info {
        background: rgba(16, 185, 129, 0.1);
        border: 2px solid var(--emerald-200);
        border-radius: 1rem;
        padding: 1.5rem;
        margin-top: 1.5rem;
        position: relative;
        z-index: 2;
    }

    .empty-info-title {
        font-size: 1rem;
        font-weight: 600;
        color: var(--emerald-800);
        margin-bottom: 0.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
    }

    .empty-info-text {
        font-size: 0.9rem;
        color: var(--emerald-700);
        line-height: 1.5;
    }

    /* Load More Button - CENTERED */
    .load-more-container {
        display: flex;
        justify-content: center;
        align-items: center;
        margin: clamp(2rem, 4vw, 2.5rem) 0;
        position: relative;
        z-index: 2;
    }

    .btn-load-more {
        display: inline-flex;
        align-items: center;
        gap: 0.75rem;
        background: var(--gradient-emerald-light);
        background-size: 300% 300%;
        animation: gradientShift 8s ease infinite;
        color: var(--white);
        border: none;
        padding: clamp(1rem, 2.2vw, 1.2rem) clamp(1.8rem, 3.5vw, 2.5rem);
        border-radius: 1.5rem;
        font-weight: 700;
        font-size: clamp(0.9rem, 1.8vw, 1rem);
        cursor: pointer;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: var(--shadow-lg);
        position: relative;
        overflow: hidden;
        border: 2px solid rgba(255, 255, 255, 0.3);
        text-transform: uppercase;
        letter-spacing: 0.3px;
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
    }

    .btn-load-more:disabled {
        opacity: 0.6;
        cursor: not-allowed;
        transform: none;
    }

    /* Contact Button */
    .btn-contact {
        display: inline-flex;
        align-items: center;
        gap: 0.75rem;
        background: var(--gradient-emerald);
        color: var(--white);
        padding: clamp(0.9rem, 2vw, 1.1rem) clamp(1.5rem, 3vw, 2rem);
        border-radius: 1.5rem;
        text-decoration: none;
        font-weight: 600;
        font-size: clamp(0.9rem, 1.8vw, 1rem);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: var(--shadow-lg);
        border: 2px solid rgba(255, 255, 255, 0.3);
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
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
        transition: left 0.5s ease;
    }

    .btn-contact:hover::before {
        left: 100%;
    }

    .btn-contact:hover {
        transform: translateY(-3px) scale(1.05);
        box-shadow: var(--shadow-xl);
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .search-filter-container {
            flex-direction: column;
            align-items: stretch;
        }

        .search-box {
            min-width: auto;
        }

        .filter-container {
            justify-content: center;
        }

        .campaign-grid {
            grid-template-columns: 1fr;
        }

        .features-grid {
            grid-template-columns: 1fr;
        }

        .empty-icon {
            width: 80px;
            height: 80px;
        }
    }

    @media (max-width: 480px) {
        .slider-arrow {
            display: none;
        }

        .campaign-footer {
            flex-direction: column;
            align-items: flex-start;
            gap: 0.5rem;
        }

        .empty-icon {
            width: 70px;
            height: 70px;
        }
    }

    /* Animations */
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

    @keyframes shimmer {
        0% {
            left: -100%;
        }
        100% {
            left: 100%;
        }
    }

    @keyframes progressShimmer {
        0% {
            left: -100%;
        }
        100% {
            left: 100%;
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

    @keyframes emptyIconFloat {
        0%, 100% {
            transform: translateY(0) scale(1);
        }
        50% {
            transform: translateY(-8px) scale(1.02);
        }
    }

    @keyframes pulse {
        0%, 100% {
            transform: scale(1);
            opacity: 0.3;
        }
        50% {
            transform: scale(1.05);
            opacity: 0.5;
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
        
        <!-- LOGIKA PESAN KAMPANYE KOSONG - TANPA MENGUBAH ROUTE -->
        @if($campaigns->isEmpty())
            <div class="empty-campaigns-container">
                <div class="empty-icon">
                    <svg width="50" height="50" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 2L2 7l10 5 10-5-10-5z"/>
                        <path d="M2 17l10 5 10-5"/>
                        <path d="M2 12l10 5 10-5"/>
                    </svg>
                </div>
                
                <h3 class="empty-title">Belum Ada Kampanye</h3>
                <p class="empty-description">
                    Saat ini belum ada kampanye yang tersedia. Platform ini siap menerima kampanye-kampanye baru yang menginspirasi dan bermakna.
                </p>
                
                <div class="empty-info">
                    <div class="empty-info-title">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"/>
                            <path d="M12 16v-4"/>
                            <path d="M12 8h.01"/>
                        </svg>
                        Informasi
                    </div>
                    <p class="empty-info-text">
                        Kampanye akan muncul di sini setelah dibuat dan disetujui. Silakan kembali lagi nanti untuk melihat kampanye-kampanye terbaru yang tersedia.
                    </p>
                </div>
            </div>
        @else
            <!-- KAMPANYE ADA - TAMPILKAN GRID -->
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
        @endif
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
                <p class="feature-description">Laporan real-time dan transparansi penuh dalam setiap donasi yang masuk dan penggunaan dana.</p>
            </div>
        </div>
        
        <div class="text-center mt-6">
            <a href="#" class="btn-contact">
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
    // Auto-play slider functionality - FIXED
    let currentSlide = 0;
    const slides = document.querySelectorAll('.slide');
    const dots = document.querySelectorAll('.nav-dot');
    const totalSlides = slides.length;
    let autoPlayInterval;

    function showSlide(index) {
        // Remove active classes
        slides.forEach(slide => {
            slide.classList.remove('active', 'prev', 'next');
        });
        dots.forEach(dot => dot.classList.remove('active'));

        // Set current slide
        slides[index].classList.add('active');
        dots[index].classList.add('active');

        // Set previous and next slides for smooth transitions
        const prevIndex = (index - 1 + totalSlides) % totalSlides;
        const nextIndex = (index + 1) % totalSlides;
        
        slides[prevIndex].classList.add('prev');
        slides[nextIndex].classList.add('next');
    }

    function nextSlide() {
        currentSlide = (currentSlide + 1) % totalSlides;
        showSlide(currentSlide);
    }

    function prevSlide() {
        currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
        showSlide(currentSlide);
    }

    function startAutoPlay() {
        autoPlayInterval = setInterval(nextSlide, 4000); // 4 seconds
    }

    function stopAutoPlay() {
        if (autoPlayInterval) {
            clearInterval(autoPlayInterval);
        }
    }

    // Initialize slider
    showSlide(0);
    startAutoPlay(); // Start auto-play immediately

    // Navigation arrows
    document.querySelector('.slider-arrow.prev').addEventListener('click', () => {
        stopAutoPlay();
        prevSlide();
        startAutoPlay(); // Restart auto-play after manual navigation
    });

    document.querySelector('.slider-arrow.next').addEventListener('click', () => {
        stopAutoPlay();
        nextSlide();
        startAutoPlay(); // Restart auto-play after manual navigation
    });

    // Navigation dots
    dots.forEach((dot, index) => {
        dot.addEventListener('click', () => {
            stopAutoPlay();
            currentSlide = index;
            showSlide(currentSlide);
            startAutoPlay(); // Restart auto-play after manual navigation
        });
    });

    // Pause auto-play on hover
    const sliderContainer = document.querySelector('.slider-container');
    sliderContainer.addEventListener('mouseenter', stopAutoPlay);
    sliderContainer.addEventListener('mouseleave', startAutoPlay);

    // Search and filter functionality
    const searchInput = document.getElementById('searchInput');
    const sortFilter = document.getElementById('sortFilter');
    const campaignItems = document.querySelectorAll('.campaign-item');
    const loadMoreBtn = document.getElementById('loadMoreBtn');

    let visibleCount = 6; // Show 6 campaigns initially
    let filteredItems = Array.from(campaignItems);

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

    function filterAndSort() {
        const searchTerm = searchInput.value.toLowerCase();
        const sortValue = sortFilter.value;

        // Filter campaigns
        filteredItems = Array.from(campaignItems).filter(item => {
            const title = item.dataset.title;
            return title.includes(searchTerm);
        });

        // Sort campaigns
        filteredItems.sort((a, b) => {
            switch (sortValue) {
                case 'newest':
                    return parseInt(b.dataset.created) - parseInt(a.dataset.created);
                case 'oldest':
                    return parseInt(a.dataset.created) - parseInt(b.dataset.created);
                case 'target_asc':
                    return parseInt(a.dataset.target) - parseInt(b.dataset.target);
                case 'target_desc':
                    return parseInt(b.dataset.target) - parseInt(a.dataset.target);
                case 'progress_desc':
                    return parseFloat(b.dataset.progress) - parseFloat(a.dataset.progress);
                default:
                    return 0;
            }
        });

        // Hide all items first
        campaignItems.forEach(item => {
            item.classList.add('hidden');
            item.classList.remove('visible');
        });

        // Show filtered and sorted items
        visibleCount = Math.min(6, filteredItems.length);
        for (let i = 0; i < visibleCount; i++) {
            filteredItems[i].classList.remove('hidden');
            filteredItems[i].classList.add('visible');
        }

        // Show/hide load more button
        if (filteredItems.length > visibleCount) {
            loadMoreBtn.style.display = 'inline-flex';
        } else {
            loadMoreBtn.style.display = 'none';
        }

        // Animate visible items
        setTimeout(() => {
            const visibleItems = document.querySelectorAll('.campaign-item.visible');
            visibleItems.forEach((item, index) => {
                setTimeout(() => {
                    item.style.opacity = '1';
                    item.style.transform = 'translateY(0)';
                }, index * 100);
            });
        }, 50);
    }

    // Load more functionality
    if (loadMoreBtn) {
        loadMoreBtn.addEventListener('click', () => {
            const currentVisible = visibleCount;
            const newVisible = Math.min(currentVisible + 6, filteredItems.length);

            for (let i = currentVisible; i < newVisible; i++) {
                filteredItems[i].classList.remove('hidden');
                filteredItems[i].classList.add('visible');
            }

            visibleCount = newVisible;

            if (visibleCount >= filteredItems.length) {
                loadMoreBtn.style.display = 'none';
            }

            // Animate new items
            setTimeout(() => {
                for (let i = currentVisible; i < newVisible; i++) {
                    setTimeout(() => {
                        filteredItems[i].style.opacity = '1';
                        filteredItems[i].style.transform = 'translateY(0)';
                    }, (i - currentVisible) * 100);
                }
            }, 50);
        });
    }

    // Event listeners with debouncing
    if (searchInput) {
        searchInput.addEventListener('input', debounce(filterAndSort, 300));
    }
    if (sortFilter) {
        sortFilter.addEventListener('change', filterAndSort);
    }

    // Initialize only if campaigns exist
    if (campaignItems.length > 0) {
        filterAndSort();
    }

    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Intersection Observer for animations
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

    // Observe campaign items
    campaignItems.forEach(item => {
        observer.observe(item);
    });

    // Keyboard navigation for accessibility
    document.addEventListener('keydown', (e) => {
        if (e.key === 'ArrowLeft') {
            stopAutoPlay();
            prevSlide();
            startAutoPlay();
        } else if (e.key === 'ArrowRight') {
            stopAutoPlay();
            nextSlide();
            startAutoPlay();
        }
    });

    // Touch/swipe support for mobile
    let touchStartX = 0;
    let touchEndX = 0;

    sliderContainer.addEventListener('touchstart', (e) => {
        touchStartX = e.changedTouches[0].screenX;
    });

    sliderContainer.addEventListener('touchend', (e) => {
        touchEndX = e.changedTouches[0].screenX;
        handleSwipe();
    });

    function handleSwipe() {
        const swipeThreshold = 50;
        const diff = touchStartX - touchEndX;

        if (Math.abs(diff) > swipeThreshold) {
            stopAutoPlay();
            if (diff > 0) {
                nextSlide(); // Swipe left - next slide
            } else {
                prevSlide(); // Swipe right - previous slide
            }
            startAutoPlay();
        }
    }
</script>
@endsection

