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
        --white: #ffffff;
        --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        --shadow-2xl: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        --gradient-emerald: linear-gradient(135deg, var(--emerald-600), var(--teal-600));
        --gradient-emerald-light: linear-gradient(135deg, var(--emerald-500), var(--teal-500));
        --blur-backdrop: blur(16px);
    }

    body {
        background: linear-gradient(135deg, var(--slate-50) 0%, var(--emerald-50) 100%);
        font-family: 'Inter', system-ui, -apple-system, sans-serif;
        line-height: 1.6;
    }

    .donator-count { 
        display: flex; 
        align-items: center; 
        gap: 8px;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    /* Enhanced Hero Section */
    .hero-section {
        padding: 5rem 0 6rem 0;
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
        background: radial-gradient(circle at 30% 20%, rgba(16, 185, 129, 0.1) 0%, transparent 50%),
                    radial-gradient(circle at 70% 80%, rgba(20, 184, 166, 0.1) 0%, transparent 50%);
        pointer-events: none;
    }
    
    /* FIXED Enhanced Slider Container */
    .slider-container {
        position: relative;
        margin: 0 auto;
        max-width: 1200px;
        overflow: hidden;
        border-radius: 2rem;
        box-shadow: var(--shadow-2xl);
        background: var(--gradient-emerald);
        border: 3px solid rgba(255, 255, 255, 0.2);
        backdrop-filter: var(--blur-backdrop);
        -webkit-backdrop-filter: var(--blur-backdrop);
    }

    .slider-wrapper {
        position: relative;
        height: 520px;
        overflow: hidden;
    }

    /* FIXED - Perbaikan utama pada slide CSS */
    .slide {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        color: var(--white);
        padding: 4rem 3rem;
        text-align: center;
        opacity: 0;
        visibility: hidden;
        transform: translateX(100%) scale(0.95);
        transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
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

    .slide::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: radial-gradient(circle at center, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
        z-index: 3;
    }

    /* FIXED - Slide active state */
    .slide.active {
        opacity: 1;
        visibility: visible;
        transform: translateX(0) scale(1);
        z-index: 5;
    }

    /* FIXED - Slide transition states */
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
        max-width: 800px;
        margin: 0 auto;
        position: relative;
        z-index: 10;
        animation: slideContentIn 1s ease-out;
    }

    .slide h3 {
        font-size: 3.5rem;
        font-weight: 800;
        margin-bottom: 1.5rem;
        text-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        line-height: 1.1;
        background: linear-gradient(135deg, #ffffff, #f0fdfa);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .slide p {
        font-size: 1.4rem;
        margin-bottom: 2.5rem;
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
        padding: 1.5rem 3rem;
        border-radius: 2rem;
        text-decoration: none;
        font-weight: 600;
        font-size: 1.1rem;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: var(--shadow-xl);
        backdrop-filter: blur(12px);
        border: 2px solid rgba(255, 255, 255, 0.3);
        position: relative;
        overflow: hidden;
    }

    .slide-btn::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        background: radial-gradient(circle, rgba(16, 185, 129, 0.2) 0%, transparent 70%);
        transition: all 0.4s ease;
        border-radius: 50%;
        transform: translate(-50%, -50%);
    }

    .slide-btn:hover::before {
        width: 400px;
        height: 400px;
    }

    .slide-btn:hover {
        transform: translateY(-4px) scale(1.05);
        box-shadow: var(--shadow-2xl);
        background: var(--white);
        color: var(--emerald-800);
        border-color: rgba(255, 255, 255, 0.5);
    }

    .slide-btn svg {
        transition: transform 0.3s ease;
    }

    .slide-btn:hover svg {
        transform: translateX(4px);
    }

    /* Enhanced Slider Navigation */
    .slider-nav {
        position: absolute;
        bottom: 2.5rem;
        left: 50%;
        transform: translateX(-50%);
        display: flex;
        gap: 1rem;
        z-index: 15;
    }

    .nav-dot {
        width: 16px;
        height: 16px;
        border-radius: 50%;
        background-color: rgba(255, 255, 255, 0.4);
        cursor: pointer;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        border: 3px solid rgba(255, 255, 255, 0.6);
        position: relative;
        backdrop-filter: blur(4px);
    }

    .nav-dot::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        background: var(--white);
        border-radius: 50%;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        transform: translate(-50%, -50%);
        box-shadow: 0 0 20px rgba(255, 255, 255, 0.5);
    }

    .nav-dot.active::before {
        width: 100%;
        height: 100%;
    }

    .nav-dot.active {
        background-color: var(--white);
        transform: scale(1.4);
        box-shadow: 0 0 30px rgba(255, 255, 255, 0.6);
        border-color: rgba(255, 255, 255, 0.8);
    }

    /* Enhanced Slider Arrows */
    .slider-arrow {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background: rgba(255, 255, 255, 0.2);
        color: var(--white);
        border: 3px solid rgba(255, 255, 255, 0.4);
        width: 70px;
        height: 70px;
        border-radius: 50%;
        cursor: pointer;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        z-index: 15;
        font-weight: bold;
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
    }

    .slider-arrow:hover {
        background: rgba(255, 255, 255, 0.3);
        transform: translateY(-50%) scale(1.1);
        border-color: rgba(255, 255, 255, 0.6);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
    }

    .slider-arrow.prev {
        left: 2rem;
    }

    .slider-arrow.next {
        right: 2rem;
    }
    
    /* Enhanced Section Styles */
    .section {
        padding: 4rem 0;
        position: relative;
    }
    
    .section-kampanye {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: var(--blur-backdrop);
        -webkit-backdrop-filter: var(--blur-backdrop);
        border-radius: 2rem;
        box-shadow: var(--shadow-xl);
        border: 1px solid rgba(255, 255, 255, 0.2);
        margin: 2rem 0;
    }
    
    .section-tentang {
        background: linear-gradient(135deg, var(--emerald-50), var(--teal-50));
        border-radius: 2rem;
        position: relative;
        overflow: hidden;
    }

    .section-tentang::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: radial-gradient(circle at 20% 80%, rgba(16, 185, 129, 0.1) 0%, transparent 50%);
        pointer-events: none;
    }
    
    /* Enhanced Search and Filter - REMOVED CATEGORY FILTER */
    .search-filter-section {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: var(--blur-backdrop);
        -webkit-backdrop-filter: var(--blur-backdrop);
        border-radius: 1.5rem;
        padding: 2.5rem;
        margin-bottom: 2rem;
        box-shadow: var(--shadow-lg);
        border: 1px solid rgba(255, 255, 255, 0.2);
        position: relative;
        overflow: hidden;
    }

    .search-filter-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(45deg, transparent, rgba(16, 185, 129, 0.02), transparent);
        pointer-events: none;
    }
    
    .search-filter-container {
        display: flex;
        gap: 1.5rem;
        align-items: center;
        flex-wrap: wrap;
        position: relative;
        z-index: 2;
    }
    
    .search-box {
        flex: 1;
        min-width: 320px;
        position: relative;
    }
    
    .search-input {
        width: 100%;
        padding: 1.25rem 1.25rem 1.25rem 3.5rem;
        border: 2px solid var(--emerald-200);
        border-radius: 2rem;
        font-size: 1rem;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        background: rgba(248, 250, 252, 0.8);
        backdrop-filter: blur(8px);
        font-weight: 500;
    }
    
    .search-input:focus {
        outline: none;
        border-color: var(--emerald-500);
        background: var(--white);
        box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.15);
        transform: translateY(-2px);
    }

    .search-input::placeholder {
        color: var(--slate-400);
        font-weight: 400;
    }
    
    .search-icon {
        position: absolute;
        left: 1.25rem;
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
        gap: 0.75rem;
        align-items: center;
    }
    
    .filter-label {
        font-weight: 600;
        color: var(--slate-700);
        margin-right: 0.5rem;
        font-size: 0.95rem;
    }
    
    .filter-select {
        padding: 1rem 1.5rem;
        border: 2px solid var(--emerald-200);
        border-radius: 1.5rem;
        background: rgba(248, 250, 252, 0.8);
        color: var(--slate-700);
        font-weight: 500;
        cursor: pointer;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        min-width: 140px;
        backdrop-filter: blur(8px);
    }
    
    .filter-select:focus {
        outline: none;
        border-color: var(--emerald-500);
        background: var(--white);
        box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.15);
        transform: translateY(-2px);
    }
    
    .filter-select:hover {
        border-color: var(--emerald-400);
        background: var(--white);
        transform: translateY(-1px);
    }
    
    /* Enhanced Stats Grid */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        gap: 2rem;
        margin: 3rem 0;
    }
    
    .stat-card {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: var(--blur-backdrop);
        -webkit-backdrop-filter: var(--blur-backdrop);
        padding: 2.5rem 2rem;
        border-radius: 1.5rem;
        text-align: center;
        box-shadow: var(--shadow-lg);
        border: 1px solid rgba(255, 255, 255, 0.2);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
    }

    .stat-card::before {
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

    .stat-card:hover::before {
        opacity: 0.05;
    }
    
    .stat-card:hover {
        transform: translateY(-8px) scale(1.02);
        box-shadow: var(--shadow-2xl);
    }
    
    .stat-number {
        font-size: 3rem;
        font-weight: 800;
        color: var(--emerald-600);
        display: block;
        margin-bottom: 0.75rem;
        position: relative;
        z-index: 2;
        background: var(--gradient-emerald);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
    
    .stat-label {
        color: var(--slate-600);
        font-weight: 500;
        font-size: 1.1rem;
        position: relative;
        z-index: 2;
    }
    
    /* Enhanced Features Grid */
    .features-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2.5rem;
        margin: 3rem 0;
    }
    
    .feature-card {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: var(--blur-backdrop);
        -webkit-backdrop-filter: var(--blur-backdrop);
        padding: 2.5rem;
        border-radius: 1.5rem;
        box-shadow: var(--shadow-lg);
        text-align: center;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
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
        transform: translateY(-8px) scale(1.02);
        box-shadow: var(--shadow-2xl);
    }
    
    .feature-icon {
        width: 80px;
        height: 80px;
        background: var(--gradient-emerald);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 2rem auto;
        color: var(--white);
        box-shadow: var(--shadow-lg);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        z-index: 2;
    }

    .feature-card:hover .feature-icon {
        transform: scale(1.1) rotate(5deg);
        box-shadow: var(--shadow-xl);
    }
    
    .feature-title {
        font-size: 1.4rem;
        font-weight: 700;
        margin-bottom: 1.25rem;
        color: var(--slate-800);
        position: relative;
        z-index: 2;
    }
    
    .feature-description {
        color: var(--slate-600);
        line-height: 1.6;
        font-size: 1.05rem;
        position: relative;
        z-index: 2;
    }

    /* Enhanced Campaign Grid */
    .campaign-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(340px, 1fr));
        gap: 2rem;
        margin: 2rem 0;
    }

    .campaign-item {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: var(--blur-backdrop);
        -webkit-backdrop-filter: var(--blur-backdrop);
        border-radius: 1.5rem;
        overflow: hidden;
        box-shadow: var(--shadow-lg);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        border: 1px solid rgba(255, 255, 255, 0.2);
        position: relative;
        opacity: 0;
        transform: translateY(30px);
    }

    .campaign-item.visible {
        opacity: 1;
        transform: translateY(0);
    }

    .campaign-item.hidden {
        display: none;
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

    .campaign-item:hover::before {
        opacity: 0.05;
    }

    .campaign-item:hover {
        transform: translateY(-8px) scale(1.02);
        box-shadow: var(--shadow-2xl);
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
        height: 220px;
        object-fit: cover;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .campaign-item:hover img {
        transform: scale(1.05);
        filter: brightness(1.1) saturate(1.1);
    }

    .campaign-content {
        padding: 2rem;
        position: relative;
        z-index: 2;
    }

    .campaign-title {
        font-size: 1.3rem;
        font-weight: 700;
        margin-bottom: 1rem;
        color: var(--slate-800);
        line-height: 1.4;
        transition: color 0.3s ease;
    }

    .campaign-item:hover .campaign-title {
        color: var(--emerald-700);
    }

    /* Enhanced Progress Bar */
    .progress-bar-container {
        width: 100%;
        height: 8px;
        background-color: var(--emerald-100);
        border-radius: 4px;
        overflow: hidden;
        margin: 1.25rem 0;
        position: relative;
        box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .progress-bar {
        height: 100%;
        background: var(--gradient-emerald);
        border-radius: 4px;
        transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        box-shadow: 0 2px 8px rgba(16, 185, 129, 0.3);
    }

    .progress-bar::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
        animation: shimmer 2s infinite;
    }

    .progress-bar::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 100%;
        height: 2px;
        background: rgba(255, 255, 255, 0.6);
        transform: translate(-50%, -50%);
        border-radius: 1px;
    }

    .progress-percentage-text {
        position: absolute;
        top: -25px;
        right: 0;
        font-size: 0.85rem;
        font-weight: 700;
        color: var(--slate-700);
        background: rgba(255, 255, 255, 0.9);
        padding: 0.25rem 0.75rem;
        border-radius: 1rem;
        backdrop-filter: blur(4px);
    }

    .campaign-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 1.25rem;
        font-size: 0.95rem;
        position: relative;
        z-index: 2;
    }

    .campaign-footer strong {
        color: var(--emerald-600);
        font-weight: 700;
    }

    /* Enhanced Typography */
    .page-title {
        font-size: 3.5rem;
        font-weight: 800;
        text-align: center;
        margin-bottom: 1rem;
        color: var(--emerald-700);
        line-height: 1.2;
        background: var(--gradient-emerald);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        position: relative;
    }

    .page-title::after {
        content: '';
        position: absolute;
        bottom: -15px;
        left: 50%;
        transform: translateX(-50%);
        width: 120px;
        height: 4px;
        background: var(--gradient-emerald);
        border-radius: 2px;
    }

    .page-subtitle {
        font-size: 1.3rem;
        text-align: center;
        color: var(--slate-600);
        margin-bottom: 3rem;
        max-width: 700px;
        margin-left: auto;
        margin-right: auto;
        line-height: 1.5;
        font-weight: 400;
    }

    .section-title {
        text-align: center;
        font-size: 2.75rem;
        font-weight: 800;
        color: var(--slate-800);
        margin-bottom: 3rem;
        position: relative;
    }

    .section-title::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 3px;
        background: var(--gradient-emerald);
        border-radius: 2px;
    }

    /* SIMPLIFIED CONTACT SECTION - EMAIL ONLY */
    .contact-section {
        background: linear-gradient(135deg, var(--emerald-600) 0%, var(--teal-600) 50%, var(--emerald-700) 100%);
        border-radius: 2rem;
        position: relative;
        overflow: hidden;
        padding: 3rem 2rem;
        margin: 3rem 0;
        text-align: center;
    }

    .contact-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: radial-gradient(circle at 30% 20%, rgba(255, 255, 255, 0.15) 0%, transparent 50%),
                    radial-gradient(circle at 70% 80%, rgba(255, 255, 255, 0.1) 0%, transparent 50%);
        pointer-events: none;
    }

    .contact-content {
        max-width: 600px;
        margin: 0 auto;
        position: relative;
        z-index: 2;
    }

    .contact-section .section-title {
        color: var(--white);
        font-size: 2.5rem;
        margin-bottom: 1rem;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }

    .contact-section .section-title::after {
        background: rgba(255, 255, 255, 0.8);
        width: 80px;
    }

    .contact-section .page-subtitle {
        color: rgba(255, 255, 255, 0.95);
        font-size: 1.1rem;
        margin-bottom: 2rem;
        text-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
        line-height: 1.6;
    }

    /* Enhanced Button */
    .btn {
        display: inline-flex;
        align-items: center;
        gap: 0.75rem;
        padding: 1.25rem 2.5rem;
        border-radius: 2rem;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
        font-size: 1.05rem;
        border: none;
        cursor: pointer;
    }

    .btn::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        background: radial-gradient(circle, rgba(255, 255, 255, 0.3) 0%, transparent 70%);
        transition: all 0.4s ease;
        border-radius: 50%;
        transform: translate(-50%, -50%);
    }

    .btn:hover::before {
        width: 400px;
        height: 400px;
    }

    .btn-contact {
        background: rgba(255, 255, 255, 0.2);
        color: var(--white);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        backdrop-filter: blur(12px);
        border: 2px solid rgba(255, 255, 255, 0.3);
    }

    .btn-contact:hover {
        transform: translateY(-4px) scale(1.05);
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.3);
        background: rgba(255, 255, 255, 0.25);
        border-color: rgba(255, 255, 255, 0.4);
    }

    .btn-contact svg {
        transition: transform 0.3s ease;
    }

    .btn-contact:hover svg {
        transform: translateX(3px);
    }

    /* Load More Button */
    .load-more-container {
        text-align: center;
        margin: 3rem 0;
        position: relative;
    }

    .btn-load-more {
        background: var(--gradient-emerald);
        color: var(--white);
        padding: 1.25rem 3rem;
        border-radius: 2rem;
        border: none;
        font-size: 1.1rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: var(--shadow-lg);
        position: relative;
        overflow: hidden;
        backdrop-filter: blur(8px);
    }

    .btn-load-more::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        background: radial-gradient(circle, rgba(255, 255, 255, 0.3) 0%, transparent 70%);
        transition: all 0.4s ease;
        border-radius: 50%;
        transform: translate(-50%, -50%);
    }

    .btn-load-more:hover::before {
        width: 400px;
        height: 400px;
    }

    .btn-load-more:hover {
        transform: translateY(-4px) scale(1.05);
        box-shadow: var(--shadow-2xl);
    }

    .btn-load-more:disabled {
        opacity: 0.6;
        cursor: not-allowed;
        transform: none;
    }

    .btn-load-more:disabled:hover {
        transform: none;
        box-shadow: var(--shadow-lg);
    }

    .btn-load-more svg {
        transition: transform 0.3s ease;
    }

    .btn-load-more:hover svg {
        transform: translateY(2px);
    }

    .content-wrapper {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 1rem;
        position: relative;
    }

    /* Animations */
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
        0% { transform: translateX(-100%); }
        100% { transform: translateX(100%); }
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Scroll Animations */
    .fade-in-up {
        opacity: 0;
        transform: translateY(30px);
        transition: all 0.6s ease-out;
    }

    .fade-in-up.visible {
        opacity: 1;
        transform: translateY(0);
    }

    /* Enhanced Responsive Design */
    @media (max-width: 768px) {
        .hero-section {
            padding: 3rem 0 4rem 0;
        }
        
        .page-title {
            font-size: 2.5rem;
        }

        .page-subtitle {
            font-size: 1.1rem;
            margin-bottom: 2rem;
        }

        .section-title {
            font-size: 2.25rem;
        }

        .slide h3 {
            font-size: 2.5rem;
        }

        .slide p {
            font-size: 1.2rem;
        }

        .slider-wrapper {
            height: 450px;
        }
        
        .slider-container {
            max-width: 100%;
            margin: 0 1rem;
        }

        .stats-grid {
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
            margin: 2rem 0;
        }

        .features-grid {
            grid-template-columns: 1fr;
            gap: 2rem;
        }

        .campaign-grid {
            grid-template-columns: 1fr;
        }

        .slider-arrow {
            width: 60px;
            height: 60px;
            font-size: 1.3rem;
        }

        .slider-arrow.prev {
            left: 1rem;
        }

        .slider-arrow.next {
            right: 1rem;
        }
        
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

        .btn {
            padding: 1rem 2rem;
            font-size: 1rem;
        }

        .btn-load-more {
            padding: 1rem 2rem;
            font-size: 1rem;
        }

        /* Mobile Contact Section */
        .contact-section {
            padding: 2.5rem 1.5rem;
            margin: 2rem 0;
        }

        .contact-section .section-title {
            font-size: 2rem;
        }

        .btn-contact {
            padding: 1rem 2rem;
            font-size: 1rem;
        }
    }
</style>

{{-- Enhanced Hero Section with 5 Customizable Slides --}}
<div class="hero-section">
    <div class="content-wrapper">
        <div class="slider-container">
            <div class="slider-wrapper">
                {{-- Slide 1: Pesantren Al-Hidayah --}}
                <div class="slide active" style="background-image: url('{{ asset('images/slider/slide-1.jpg') }}');">
                    <div class="slide-content">
                        <h3>Pesantren Al-Hidayah</h3>
                        <p>Mendidik generasi Qur'ani dengan fasilitas modern dan pembelajaran yang komprehensif. Bergabunglah dalam misi mulia membangun masa depan yang lebih baik.</p>
                        <a href="#" class="slide-btn">
                            <svg width="20" height="20" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                            Kunjungi Website
                        </a>
                    </div>
                </div>
                
                {{-- Slide 2: Pesantren Darul Ulum --}}
                <div class="slide" style="background-image: url('{{ asset('images/slider/slide-2.jpg') }}');">
                    <div class="slide-content">
                        <h3>Pesantren Darul Ulum</h3>
                        <p>Pusat pendidikan Islam terpadu yang mengombinasikan ilmu agama dan sains modern. Mari bersama membangun generasi yang berakhlak mulia dan berprestasi.</p>
                        <a href="#" class="slide-btn">
                            <svg width="20" height="20" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                            Kunjungi Website
                        </a>
                    </div>
                </div>

                {{-- Slide 3: Pesantren Nurul Huda --}}
                <div class="slide" style="background-image: url('{{ asset('images/slider/slide-3.jpg') }}');">
                    <div class="slide-content">
                        <h3>Pesantren Nurul Huda</h3>
                        <p>Lembaga pendidikan Islam yang fokus pada pembentukan karakter dan pengembangan potensi santri. Wujudkan cita-cita mulia bersama kami.</p>
                        <a href="#" class="slide-btn">
                            <svg width="20" height="20" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                            Kunjungi Website
                        </a>
                    </div>
                </div>

                {{-- Slide 4: Pesantren Baitul Hikmah --}}
                <div class="slide" style="background-image: url('{{ asset('images/slider/slide-4.jpg') }}');">
                    <div class="slide-content">
                        <h3>Pesantren Baitul Hikmah</h3>
                        <p>Rumah kebijaksanaan yang menghadirkan pendidikan holistik untuk membentuk insan kamil. Bergabunglah dalam perjalanan menuju keunggulan.</p>
                        <a href="#" class="slide-btn">
                            <svg width="20" height="20" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                            Kunjungi Website
                        </a>
                    </div>
                </div>

                {{-- Slide 5: Pesantren Ar-Rahman --}}
                <div class="slide" style="background-image: url('{{ asset('images/slider/slide-5.jpg') }}');">
                    <div class="slide-content">
                        <h3>Pesantren Ar-Rahman</h3>
                        <p>Pusat pembelajaran yang mengedepankan nilai-nilai kasih sayang dan keunggulan akademik. Mari bersama membangun peradaban yang gemilang.</p>
                        <a href="#" class="slide-btn">
                            <svg width="20" height="20" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                            Kunjungi Website
                        </a>
                    </div>
                </div>
            </div>
            <div class="slider-nav">
                <span class="nav-dot active" data-slide="0"></span>
                <span class="nav-dot" data-slide="1"></span>
                <span class="nav-dot" data-slide="2"></span>
                <span class="nav-dot" data-slide="3"></span>
                <span class="nav-dot" data-slide="4"></span>
            </div>
            <div class="slider-arrow prev">&lt;</div>
            <div class="slider-arrow next">&gt;</div>
        </div>
    </div>
</div>

{{-- Enhanced Search and Filter Section - REMOVED CATEGORY FILTER --}}
<div class="section content-wrapper">
    <div class="search-filter-section">
        <div class="search-filter-container">
            <div class="search-box">
                <input type="text" placeholder="Cari kampanye..." class="search-input" id="campaignSearch">
                <svg class="search-icon" width="22" height="22" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"/>
                </svg>
            </div>
            <div class="filter-container">
                <span class="filter-label">Urutkan:</span>
                <select class="filter-select" id="sortFilter">
                    <option value="newest">Terbaru</option>
                    <option value="popular">Terpopuler</option>
                    <option value="target">Target Terbesar</option>
                </select>
            </div>
        </div>
    </div>
</div>

{{-- Enhanced Main Content Section --}}
<div class="section content-wrapper">
    <h2 class="section-title">Kampanye Terbaru</h2>
    <div class="campaign-grid" id="campaignGrid">
        @foreach($campaigns as $index => $campaign)
        <div class="campaign-item fade-in-up @if($index >= 6) hidden @endif" data-index="{{ $index }}">
            <a href="{{ route('campaigns.show', $campaign->id) }}">
                <img src="{{ asset('storage/' . $campaign->image) }}" alt="{{ $campaign->title }}">
                <div class="campaign-content">
                    <h3 class="campaign-title">{{ $campaign->title }}</h3>
                    <p class="text-muted">{{ Str::limit($campaign->description, 100) }}</p>
                    
                    @php
                        $percentage = $campaign->target_amount > 0 ? round(($campaign->collected_amount / $campaign->target_amount) * 100) : 0;
                    @endphp
                    <div class="progress-bar-container">
                        <div class="progress-percentage-text">{{ $percentage }}%</div>
                        <div class="progress-bar" style="width: {{ $percentage }}%;"></div>
                    </div>

                    <div class="campaign-footer">
                        <div>Terkumpul: <strong>Rp {{ number_format($campaign->collected_amount, 0, ',', '.') }}</strong></div>
                        <div>Target: <span>Rp {{ number_format($campaign->target_amount, 0, ',', '.') }}</span></div>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>

    {{-- Load More Button --}}
    @if(count($campaigns) > 6)
    <div class="load-more-container">
        <button class="btn-load-more" id="loadMoreBtn">
            <svg width="20" height="20" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
            </svg>
            Lihat Lebih Banyak
        </button>
    </div>
    @endif
</div>

{{-- Enhanced About Us Section --}}
<div class="section content-wrapper">
    <div class="section-tentang p-8 text-center">
        <h2 class="section-title">Tentang Kami</h2>
        <p class="page-subtitle">Platform crowdfunding terpercaya untuk membantu mewujudkan impian dan memberikan dampak positif bagi masyarakat. Bergabunglah bersama kami!</p>
        <div class="stats-grid">
            <div class="stat-card fade-in-up">
                <span class="stat-number">100+</span>
                <span class="stat-label">Kampanye Berhasil</span>
            </div>
            <div class="stat-card fade-in-up">
                <span class="stat-number">5000+</span>
                <span class="stat-label">Donatur Setia</span>
            </div>
            <div class="stat-card fade-in-up">
                <span class="stat-number">Rp 10M+</span>
                <span class="stat-label">Dana Terkumpul</span>
            </div>
            <div class="stat-card fade-in-up">
                <span class="stat-number">99%</span>
                <span class="stat-label">Kepuasan Pengguna</span>
            </div>
        </div>
    </div>
</div>

{{-- Enhanced Features Section --}}
<div class="section content-wrapper">
    <h2 class="section-title">Mengapa Memilih Kami?</h2>
    <div class="features-grid">
        <div class="feature-card fade-in-up">
            <div class="feature-icon">
                <svg width="36" height="36" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
            </div>
            <h3 class="feature-title">Terpercaya & Aman</h3>
            <p class="feature-description">Sistem keamanan terdepan untuk melindungi data dan transaksi Anda dengan enkripsi tingkat bank.</p>
        </div>
        <div class="feature-card fade-in-up">
            <div class="feature-icon">
                <svg width="36" height="36" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M11 3a1 1 0 100 2h2.586l-6.293 6.293a1 1 0 101.414 1.414L15 6.414V9a1 1 0 102 0V4a1 1 0 00-1-1h-5z"/>
                    <path d="M5 5a2 2 0 00-2 2v8a2 2 0 002 2h8a2 2 0 002-2v-3a1 1 0 10-2 0v3H5V7h3a1 1 0 000-2H5z"/>
                </svg>
            </div>
            <h3 class="feature-title">Mudah Digunakan</h3>
            <p class="feature-description">Antarmuka intuitif dan responsif untuk pengalaman berdonasi yang lancar di semua perangkat.</p>
        </div>
        <div class="feature-card fade-in-up">
            <div class="feature-icon">
                <svg width="36" height="36" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l3 3a1 1 0 001.414-1.414L11 9.586V6z" clip-rule="evenodd"/>
                </svg>
            </div>
            <h3 class="feature-title">Dampak Nyata</h3>
            <p class="feature-description">Setiap donasi Anda memberikan perubahan positif yang signifikan dan terukur bagi masyarakat.</p>
        </div>
    </div>
</div>

{{-- SIMPLIFIED CONTACT SECTION - EMAIL ONLY --}}
<div class="section content-wrapper">
    <div class="contact-section">
        <div class="contact-content">
            <h2 class="section-title">Hubungi Kami</h2>
            <p class="page-subtitle">Punya pertanyaan atau ingin berkolaborasi? Kami siap membantu Anda dengan senang hati!</p>
            
            <a href="mailto:info@platformpesantren.id" class="btn btn-contact">
                <svg width="22" height="22" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                </svg>
                Kirim Email Sekarang
            </a>
        </div>
    </div>
</div>

<script>
    // FIXED - Enhanced slider functionality for 5 slides
    const slides = document.querySelectorAll('.slide');
    const navDots = document.querySelectorAll('.nav-dot');
    const prevArrow = document.querySelector('.slider-arrow.prev');
    const nextArrow = document.querySelector('.slider-arrow.next');
    let currentSlide = 0;
    let isTransitioning = false;

    // FIXED - Improved showSlide function
    function showSlide(index) {
        if (isTransitioning) return;
        isTransitioning = true;

        // Remove all classes from all slides first
        slides.forEach((slide, i) => {
            slide.classList.remove('active', 'prev', 'next');
        });

        // Set the correct classes for each slide
        slides.forEach((slide, i) => {
            if (i === index) {
                slide.classList.add('active');
            } else if (i < index) {
                slide.classList.add('prev');
            } else {
                slide.classList.add('next');
            }
        });

        // Update navigation dots
        navDots.forEach((dot, i) => {
            dot.classList.toggle('active', i === index);
        });

        currentSlide = index;
        
        // Allow next transition after animation completes
        setTimeout(() => {
            isTransitioning = false;
        }, 800);
    }

    function nextSlide() {
        if (isTransitioning) return;
        const nextIndex = (currentSlide + 1) % slides.length;
        showSlide(nextIndex);
    }

    function prevSlide() {
        if (isTransitioning) return;
        const prevIndex = (currentSlide - 1 + slides.length) % slides.length;
        showSlide(prevIndex);
    }

    // FIXED - Event listeners for navigation dots
    navDots.forEach((dot, index) => {
        dot.addEventListener('click', (e) => {
            e.preventDefault();
            if (!isTransitioning) {
                showSlide(index);
            }
        });
    });

    // Event listeners for arrows
    prevArrow.addEventListener('click', (e) => {
        e.preventDefault();
        prevSlide();
    });

    nextArrow.addEventListener('click', (e) => {
        e.preventDefault();
        nextSlide();
    });

    // Auto-slide every 6 seconds with pause on hover
    let autoSlideInterval = setInterval(nextSlide, 6000);

    const sliderContainer = document.querySelector('.slider-container');
    sliderContainer.addEventListener('mouseenter', () => {
        clearInterval(autoSlideInterval);
    });

    sliderContainer.addEventListener('mouseleave', () => {
        autoSlideInterval = setInterval(nextSlide, 6000);
    });

    // Campaign pagination functionality
    const campaignItems = document.querySelectorAll('.campaign-item');
    const loadMoreBtn = document.getElementById('loadMoreBtn');
    let currentlyShown = 6;
    const itemsPerLoad = 6;

    // Initialize campaign display
    function initializeCampaigns() {
        campaignItems.forEach((item, index) => {
            if (index < currentlyShown) {
                item.classList.remove('hidden');
                item.classList.add('visible');
                item.style.transitionDelay = `${(index % 6) * 0.1}s`;
            } else {
                item.classList.add('hidden');
                item.classList.remove('visible');
            }
        });

        // Update load more button
        if (currentlyShown >= campaignItems.length) {
            if (loadMoreBtn) {
                loadMoreBtn.style.display = 'none';
            }
        }
    }

    // Load more functionality
    if (loadMoreBtn) {
        loadMoreBtn.addEventListener('click', () => {
            const nextBatch = Math.min(currentlyShown + itemsPerLoad, campaignItems.length);
            
            // Show next batch with staggered animation
            for (let i = currentlyShown; i < nextBatch; i++) {
                setTimeout(() => {
                    campaignItems[i].classList.remove('hidden');
                    campaignItems[i].classList.add('visible');
                }, (i - currentlyShown) * 100);
            }
            
            currentlyShown = nextBatch;
            
            // Hide button if all items are shown
            if (currentlyShown >= campaignItems.length) {
                setTimeout(() => {
                    loadMoreBtn.style.display = 'none';
                }, 500);
            }
            
            // Scroll to new content
            setTimeout(() => {
                campaignItems[currentlyShown - itemsPerLoad].scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });
            }, 600);
        });
    }

    // Enhanced search functionality - REMOVED CATEGORY FILTER
    const searchInput = document.getElementById('campaignSearch');
    const sortFilter = document.getElementById('sortFilter');

    function filterCampaigns() {
        const searchTerm = searchInput.value.toLowerCase();
        const sortValue = sortFilter.value;
        
        let visibleCount = 0;
        
        campaignItems.forEach((item, index) => {
            const title = item.querySelector('.campaign-title').textContent.toLowerCase();
            const description = item.querySelector('.text-muted').textContent.toLowerCase();
            
            let shouldShow = true;
            
            // Search filter
            if (searchTerm && !title.includes(searchTerm) && !description.includes(searchTerm)) {
                shouldShow = false;
            }
            
            if (shouldShow && visibleCount < currentlyShown) {
                item.classList.remove('hidden');
                item.classList.add('visible');
                item.style.transitionDelay = `${(visibleCount % 6) * 0.1}s`;
                visibleCount++;
            } else {
                item.classList.add('hidden');
                item.classList.remove('visible');
            }
        });
        
        // Update load more button visibility
        if (loadMoreBtn) {
            loadMoreBtn.style.display = visibleCount >= currentlyShown && currentlyShown < campaignItems.length ? 'block' : 'none';
        }
    }

    // Add event listeners for search and filter
    if (searchInput) {
        searchInput.addEventListener('input', filterCampaigns);
    }
    
    if (sortFilter) {
        sortFilter.addEventListener('change', filterCampaigns);
    }

    // Scroll animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
            }
        });
    }, observerOptions);

    // Initialize everything when DOM is loaded
    document.addEventListener('DOMContentLoaded', () => {
        // Initialize campaigns
        initializeCampaigns();
        
        // Initialize scroll animations
        const animatedElements = document.querySelectorAll('.fade-in-up:not(.campaign-item)');
        animatedElements.forEach((el, index) => {
            observer.observe(el);
            el.style.transitionDelay = `${index * 0.1}s`;
        });

        // FIXED - Initialize first slide properly
        showSlide(0);
    });
</script>
@endsection

