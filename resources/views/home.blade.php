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
    }

    /* Container */
    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 2rem;
    }

    /* Hero Section */
    .hero-section {
        padding: 4rem 0 5rem 0;
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
    }
    
    /* Slider Container */
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
    }

    .slider-wrapper {
        position: relative;
        height: 480px;
        overflow: hidden;
    }

    .slide {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        color: var(--white);
        padding: 3rem 2rem;
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
        max-width: 700px;
        margin: 0 auto;
        position: relative;
        z-index: 10;
    }

    .slide h3 {
        font-size: 3rem;
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
        font-size: 1.3rem;
        margin-bottom: 2rem;
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
        padding: 1.25rem 2.5rem;
        border-radius: 1.5rem;
        text-decoration: none;
        font-weight: 600;
        font-size: 1rem;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: var(--shadow-lg);
        backdrop-filter: blur(12px);
        border: 2px solid rgba(255, 255, 255, 0.3);
        position: relative;
        overflow: hidden;
    }

    .slide-btn:hover {
        transform: translateY(-3px) scale(1.05);
        box-shadow: var(--shadow-xl);
        background: var(--white);
        color: var(--emerald-800);
    }

    /* Slider Navigation */
    .slider-nav {
        position: absolute;
        bottom: 2rem;
        left: 50%;
        transform: translateX(-50%);
        display: flex;
        gap: 0.75rem;
        z-index: 15;
    }

    .nav-dot {
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background-color: rgba(255, 255, 255, 0.4);
        cursor: pointer;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border: 2px solid rgba(255, 255, 255, 0.6);
    }

    .nav-dot.active {
        background-color: var(--white);
        transform: scale(1.3);
        box-shadow: 0 0 20px rgba(255, 255, 255, 0.6);
    }

    /* Slider Arrows */
    .slider-arrow {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background: rgba(255, 255, 255, 0.2);
        color: var(--white);
        border: 2px solid rgba(255, 255, 255, 0.4);
        width: 60px;
        height: 60px;
        border-radius: 50%;
        cursor: pointer;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.3rem;
        z-index: 15;
        font-weight: bold;
        backdrop-filter: blur(8px);
    }

    .slider-arrow:hover {
        background: rgba(255, 255, 255, 0.3);
        transform: translateY(-50%) scale(1.1);
        border-color: rgba(255, 255, 255, 0.6);
    }

    .slider-arrow.prev {
        left: 1.5rem;
    }

    .slider-arrow.next {
        right: 1.5rem;
    }
    
    /* Section Styles */
    .section {
        padding: 3rem 0;
        position: relative;
    }
    
    .section-kampanye {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: var(--blur-backdrop);
        border-radius: 1.5rem;
        box-shadow: var(--shadow-lg);
        border: 1px solid rgba(255, 255, 255, 0.2);
        margin: 2rem 1rem;
        padding: 2.5rem;
    }
    
    .section-tentang {
        background: linear-gradient(135deg, var(--emerald-50), var(--teal-50));
        border-radius: 1.5rem;
        position: relative;
        overflow: hidden;
        padding: 3rem 2.5rem;
        margin: 2rem 1rem;
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
    
    /* Search and Filter */
    .search-filter-section {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: var(--blur-backdrop);
        border-radius: 1.25rem;
        padding: 2rem;
        margin-bottom: 2rem;
        box-shadow: var(--shadow-lg);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }
    
    .search-filter-container {
        display: flex;
        gap: 1.5rem;
        align-items: center;
        flex-wrap: wrap;
    }
    
    .search-box {
        flex: 1;
        min-width: 300px;
        position: relative;
    }
    
    .search-input {
        width: 100%;
        padding: 1rem 1rem 1rem 3rem;
        border: 2px solid var(--emerald-200);
        border-radius: 1.5rem;
        font-size: 1rem;
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
        left: 1rem;
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
        padding: 1rem 1.25rem;
        border: 2px solid var(--emerald-200);
        border-radius: 1.25rem;
        background: rgba(248, 250, 252, 0.8);
        color: var(--slate-700);
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        min-width: 130px;
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
    
    /* Features Grid */
    .features-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 2rem;
        margin: 2.5rem 0;
    }
    
    .feature-card {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: var(--blur-backdrop);
        padding: 2rem;
        border-radius: 1.25rem;
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
        width: 70px;
        height: 70px;
        background: var(--gradient-emerald);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem auto;
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
        font-size: 1.3rem;
        font-weight: 700;
        margin-bottom: 1rem;
        color: var(--slate-800);
        position: relative;
        z-index: 2;
    }
    
    .feature-description {
        color: var(--slate-600);
        line-height: 1.6;
        font-size: 1rem;
        position: relative;
        z-index: 2;
    }

    /* Campaign Grid */
    .campaign-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
        gap: 1.5rem;
        margin: 2rem 0;
    }

    .campaign-item {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: var(--blur-backdrop);
        border-radius: 1.25rem;
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
        transform: translateY(-5px) scale(1.02);
        box-shadow: var(--shadow-xl);
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
        height: 200px;
        object-fit: cover;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .campaign-item:hover img {
        transform: scale(1.05);
        filter: brightness(1.1) saturate(1.1);
    }

    .campaign-content {
        padding: 1.5rem;
        position: relative;
        z-index: 2;
    }

    .campaign-title {
        font-size: 1.2rem;
        font-weight: 700;
        margin-bottom: 1rem;
        color: var(--slate-800);
        line-height: 1.4;
        transition: color 0.3s ease;
    }

    .campaign-item:hover .campaign-title {
        color: var(--emerald-700);
    }

    /* Progress Bar */
    .progress-bar-container {
        width: 100%;
        height: 6px;
        background-color: var(--emerald-100);
        border-radius: 3px;
        overflow: hidden;
        margin: 1rem 0;
        position: relative;
        box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
    }

    .progress-bar {
        height: 100%;
        background: var(--gradient-emerald);
        border-radius: 3px;
        transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        box-shadow: 0 1px 5px rgba(16, 185, 129, 0.3);
    }

    .progress-percentage-text {
        position: absolute;
        top: -20px;
        right: 0;
        font-size: 0.8rem;
        font-weight: 700;
        color: var(--slate-700);
        background: rgba(255, 255, 255, 0.9);
        padding: 0.2rem 0.6rem;
        border-radius: 0.8rem;
        backdrop-filter: blur(4px);
    }

    .campaign-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 1rem;
        font-size: 0.9rem;
        position: relative;
        z-index: 2;
    }

    .campaign-footer strong {
        color: var(--emerald-600);
        font-weight: 700;
    }

    .donator-count { 
        display: flex; 
        align-items: center; 
        gap: 6px;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    /* Typography */
    .page-title {
        font-size: 3rem;
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
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        width: 100px;
        height: 3px;
        background: var(--gradient-emerald);
        border-radius: 2px;
    }

    .page-subtitle {
        font-size: 1.2rem;
        text-align: center;
        color: var(--slate-600);
        margin-bottom: 2.5rem;
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
        line-height: 1.5;
        font-weight: 400;
    }

    .section-title {
        text-align: center;
        font-size: 2.5rem;
        font-weight: 800;
        color: var(--slate-800);
        margin-bottom: 2.5rem;
        position: relative;
    }

    .section-title::after {
        content: '';
        position: absolute;
        bottom: -8px;
        left: 50%;
        transform: translateX(-50%);
        width: 70px;
        height: 3px;
        background: var(--gradient-emerald);
        border-radius: 2px;
    }

    /* Contact Section */
    .contact-section {
        background: linear-gradient(135deg, var(--emerald-600) 0%, var(--teal-600) 50%, var(--emerald-700) 100%);
        border-radius: 1.5rem;
        position: relative;
        overflow: hidden;
        padding: 3rem 2.5rem;
        margin: 2.5rem 1rem;
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
        max-width: 500px;
        margin: 0 auto;
        position: relative;
        z-index: 2;
    }

    .contact-section .section-title {
        color: var(--white);
        font-size: 2.2rem;
        margin-bottom: 1rem;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }

    .contact-section .section-title::after {
        background: rgba(255, 255, 255, 0.8);
        width: 70px;
    }

    .contact-section .page-subtitle {
        color: rgba(255, 255, 255, 0.95);
        font-size: 1rem;
        margin-bottom: 1.5rem;
        text-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
        line-height: 1.6;
    }

    /* Button */
    .btn {
        display: inline-flex;
        align-items: center;
        gap: 0.75rem;
        padding: 1rem 2rem;
        border-radius: 1.5rem;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
        font-size: 1rem;
        border: none;
        cursor: pointer;
    }

    .btn-contact {
        background: rgba(255, 255, 255, 0.2);
        color: var(--white);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        backdrop-filter: blur(12px);
        border: 2px solid rgba(255, 255, 255, 0.3);
    }

    .btn-contact:hover {
        transform: translateY(-3px) scale(1.05);
        box-shadow: 0 6px 25px rgba(0, 0, 0, 0.3);
        background: rgba(255, 255, 255, 0.25);
        border-color: rgba(255, 255, 255, 0.4);
    }

    /* Load More Button */
    .load-more-container {
        text-align: center;
        margin: 2.5rem 0;
        position: relative;
    }

    .btn-load-more {
        background: var(--gradient-emerald);
        color: var(--white);
        padding: 1rem 2.5rem;
        border-radius: 1.5rem;
        border: none;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: var(--shadow-lg);
        position: relative;
        overflow: hidden;
        backdrop-filter: blur(8px);
    }

    .btn-load-more:hover {
        transform: translateY(-3px) scale(1.05);
        box-shadow: var(--shadow-xl);
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .container {
            padding: 0 1.5rem;
        }

        .hero-section {
            padding: 3rem 0 4rem 0;
        }

        .slider-wrapper {
            height: 400px;
        }

        .slide h3 {
            font-size: 2.2rem;
        }

        .slide p {
            font-size: 1.1rem;
        }

        .page-title {
            font-size: 2.2rem;
        }

        .section-title {
            font-size: 2rem;
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

        .campaign-grid {
            grid-template-columns: 1fr;
        }

        .stats-grid {
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
        }

        .features-grid {
            grid-template-columns: 1fr;
        }

        .slider-arrow {
            width: 50px;
            height: 50px;
            font-size: 1.1rem;
        }

        .slider-arrow.prev {
            left: 1rem;
        }

        .slider-arrow.next {
            right: 1rem;
        }

        .section-kampanye,
        .section-tentang,
        .contact-section {
            margin: 2rem 0.5rem;
        }
    }

    @media (max-width: 480px) {
        .container {
            padding: 0 1rem;
        }

        .slide {
            padding: 2rem 1rem;
        }

        .slide h3 {
            font-size: 1.8rem;
        }

        .slide p {
            font-size: 1rem;
        }

        .page-title {
            font-size: 1.8rem;
        }

        .section-title {
            font-size: 1.6rem;
        }

        .section {
            padding: 2rem 0;
        }

        .section-kampanye,
        .section-tentang {
            padding: 1.5rem;
            margin: 1.5rem 0.25rem;
        }

        .contact-section {
            padding: 2rem 1.5rem;
            margin: 1.5rem 0.25rem;
        }

        .search-filter-section {
            padding: 1.5rem;
        }

        .stat-card,
        .feature-card {
            padding: 1.5rem;
        }

        .campaign-content {
            padding: 1.25rem;
        }
    }

    /* Animation Keyframes */
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
</style>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <h1 class="page-title">Platform Crowdfunding Terpercaya</h1>
        <p class="page-subtitle">Wujudkan impian Anda bersama komunitas yang peduli. Mulai kampanye atau dukung proyek yang menginspirasi.</p>
        
        <!-- Slider -->
        <div class="slider-container">
            <div class="slider-wrapper">
                @php
                $pondokPesantren = [
                    [
                        'nama' => 'Pondok Pesantren Al-Hikmah',
                        'deskripsi' => 'Pondok pesantren modern yang menggabungkan pendidikan agama dan umum dengan fasilitas lengkap untuk santri putra dan putri.',
                        'link' => '/pondok/al-hikmah'
                    ],
                    [
                        'nama' => 'Pondok Pesantren Darul Ulum',
                        'deskripsi' => 'Lembaga pendidikan Islam terpadu yang fokus pada pembentukan karakter dan keilmuan dengan tradisi salaf yang kuat.',
                        'link' => '/pondok/darul-ulum'
                    ],
                    [
                        'nama' => 'Pondok Pesantren Nurul Huda',
                        'deskripsi' => 'Pesantren yang mengutamakan pendidikan Al-Quran dan Hadits dengan metode pembelajaran yang inovatif dan berkarakter.',
                        'link' => '/pondok/nurul-huda'
                    ],
                    [
                        'nama' => 'Pondok Pesantren Baitul Hikmah',
                        'deskripsi' => 'Institusi pendidikan Islam yang menyelenggarakan program tahfidz Al-Quran dan pendidikan formal terintegrasi.',
                        'link' => '/pondok/baitul-hikmah'
                    ],
                    [
                        'nama' => 'Pondok Pesantren Raudhatul Jannah',
                        'deskripsi' => 'Pesantren putri yang mengkhususkan diri dalam pendidikan agama, bahasa Arab, dan keterampilan hidup untuk muslimah.',
                        'link' => '/pondok/raudhatul-jannah'
                    ]
                ];
                @endphp
                
                @foreach($pondokPesantren as $index => $pondok)
                <div class="slide {{ $index === 0 ? 'active' : '' }}">
                    <div class="slide-content">
                        <h3>{{ $pondok['nama'] }}</h3>
                        <p>{{ $pondok['deskripsi'] }}</p>
                        <a href="{{ $pondok['link'] }}" class="slide-btn">
                            Lihat Detail Pondok
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="m9 18 6-6-6-6"/>
                            </svg>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
            
            <!-- Navigation Dots -->
            <div class="slider-nav">
                @foreach($pondokPesantren as $index => $pondok)
                <div class="nav-dot {{ $index === 0 ? 'active' : '' }}" data-slide="{{ $index }}"></div>
                @endforeach
            </div>
            
            <!-- Navigation Arrows -->
            <div class="slider-arrow prev">‹</div>
            <div class="slider-arrow next">›</div>
        </div>
    </div>
</section>

<!-- Kampanye Section -->
<section class="section section-kampanye">
    <div class="container">
        <h2 class="section-title">Kampanye Terbaru</h2>
        
        <!-- Search and Filter -->
        <div class="search-filter-section">
            <div class="search-filter-container">
                <div class="search-box">
                    <input type="text" id="searchInput" class="search-input" placeholder="Cari kampanye...">
                    <svg class="search-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="11" cy="11" r="8"/>
                        <path d="m21 21-4.35-4.35"/>
                    </svg>
                </div>
                
                <div class="filter-container">
                    <span class="filter-label">Urutkan:</span>
                    <select id="sortFilter" class="filter-select">
                        <option value="newest">Terbaru</option>
                        <option value="oldest">Terlama</option>
                        <option value="target_asc">Target Terendah</option>
                        <option value="target_desc">Target Tertinggi</option>
                        <option value="progress_desc">Progress Tertinggi</option>
                    </select>
                </div>
            </div>
        </div>
        
        <!-- Campaign Grid -->
        <div class="campaign-grid" id="campaignGrid">
            @foreach($campaigns as $campaign)
            <div class="campaign-item visible" data-title="{{ strtolower($campaign->title) }}" data-created="{{ $campaign->created_at->timestamp }}" data-target="{{ $campaign->target_amount }}" data-progress="{{ $campaign->current_amount / $campaign->target_amount * 100 }}">
                <a href="{{ route('campaigns.show', $campaign) }}">
                    @if($campaign->image)
                        <img src="{{ asset('storage/' . $campaign->image) }}" alt="{{ $campaign->title }}">
                    @else
                        <img src="https://via.placeholder.com/400x200/10b981/ffffff?text=Kampanye" alt="{{ $campaign->title }}">
                    @endif
                    
                    <div class="campaign-content">
                        <h3 class="campaign-title">{{ $campaign->title }}</h3>
                        
                        <div class="progress-bar-container">
                            <div class="progress-bar" style="width: {{ min(($campaign->current_amount / $campaign->target_amount) * 100, 100) }}%"></div>
                            <div class="progress-percentage-text">{{ number_format(min(($campaign->current_amount / $campaign->target_amount) * 100, 100), 1) }}%</div>
                        </div>
                        
                        <div class="campaign-footer">
                            <div>
                                <strong>Rp {{ number_format($campaign->current_amount, 0, ',', '.') }}</strong>
                                <br>
                                <small>dari Rp {{ number_format($campaign->target_amount, 0, ',', '.') }}</small>
                            </div>
                            <div class="donator-count">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
                                    <circle cx="9" cy="7" r="4"/>
                                    <path d="M22 21v-2a4 4 0 0 0-3-3.87"/>
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                                </svg>
                                {{ $campaign->donations_count ?? 0 }} donatur
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        
        <!-- Load More Button -->
        <div class="load-more-container">
            <button class="btn-load-more" id="loadMoreBtn" style="display: none;">
                Muat Lebih Banyak
            </button>
        </div>
    </div>
</section>

<!-- Tentang Section -->
<section class="section section-tentang">
    <div class="container">
        <h2 class="section-title">Mengapa Memilih Platform Kami?</h2>
        
        <!-- Features Grid -->
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                    </svg>
                </div>
                <h3 class="feature-title">Keamanan Terjamin</h3>
                <p class="feature-description">Sistem keamanan berlapis dan enkripsi data untuk melindungi setiap transaksi dan informasi pribadi Anda.</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
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
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
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

<!-- Contact Section -->
<section class="contact-section">
    <div class="container">
        <div class="contact-content">
            <h2 class="section-title">Butuh Bantuan?</h2>
            <p class="page-subtitle">Tim support kami siap membantu Anda 24/7. Hubungi kami untuk konsultasi gratis.</p>
            <a href="mailto:support@crowdfunding.com" class="btn btn-contact">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
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

    // Auto-play slider
    setInterval(nextSlide, 5000);

    // Search and filter functionality
    const searchInput = document.getElementById('searchInput');
    const sortFilter = document.getElementById('sortFilter');
    const campaignGrid = document.getElementById('campaignGrid');
    const campaignItems = Array.from(document.querySelectorAll('.campaign-item'));
    const loadMoreBtn = document.getElementById('loadMoreBtn');
    
    let visibleCount = 6;
    const itemsPerLoad = 6;

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

        // Show filtered and sorted items
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
    }

    // Event listeners for search and filter
    searchInput?.addEventListener('input', filterAndSortCampaigns);
    sortFilter?.addEventListener('change', filterAndSortCampaigns);
    loadMoreBtn?.addEventListener('click', loadMoreCampaigns);

    // Initial setup
    filterAndSortCampaigns();

    // Animate campaign items on scroll
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
});
</script>

@endsection

