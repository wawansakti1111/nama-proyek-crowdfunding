@extends('layouts.app')

@section('title', $campaign->title)

@section('content')
<style>
    /* ... (Semua style CSS Anda yang sudah bagus tetap sama, tidak ada perubahan) ... */
    :root {
        --primary-green: #10b981;
        --light-green: #d1fae5;
        --soft-green: #ecfdf5;
        --accent-green: #059669;
        --dark-green: #047857;
        --text-primary: #1f2937;
        --text-secondary: #6b7280;
        --text-muted: #9ca3af;
        --background: #f8fafc;
        --white: #ffffff;
        --border-light: #e5e7eb;
        --shadow-soft: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        --shadow-medium: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        --shadow-large: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }
    /* ... sisa CSS Anda ... */
    body {
        background: linear-gradient(135deg, var(--soft-green) 0%, var(--background) 100%);
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    }
    .campaign-container { max-width: 900px; margin: 0 auto; padding: 2rem 1rem; }
    .campaign-hero { background: var(--white); border-radius: 20px; overflow: hidden; box-shadow: var(--shadow-large); margin-bottom: 2rem; transition: transform 0.3s ease, box-shadow 0.3s ease; }
    .campaign-hero:hover { transform: translateY(-2px); box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.15); }
    .campaign-image { width: 100%; height: 450px; object-fit: cover; }
    .campaign-content { padding: 2.5rem; }
    .campaign-title { font-size: 2.5rem; font-weight: 800; margin-bottom: 1.5rem; color: var(--text-primary); line-height: 1.2; background: linear-gradient(135deg, var(--text-primary) 0%, var(--dark-green) 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; }
    .progress-section { background: linear-gradient(135deg, var(--light-green) 0%, var(--soft-green) 100%); border-radius: 16px; padding: 2rem; margin: 2rem 0; position: relative; overflow: hidden; }
    .fund-details { display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; position: relative; z-index: 1; }
    .fund-item { text-align: center; padding: 1rem; background: var(--white); border-radius: 12px; box-shadow: var(--shadow-soft); transition: transform 0.2s ease; }
    .fund-item:hover { transform: translateY(-2px); }
    .fund-label { font-size: 0.9rem; color: var(--text-secondary); font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 0.5rem; }
    .fund-amount { font-size: 1.8rem; font-weight: 800; color: var(--primary-green); margin-bottom: 0.5rem; }
    .fund-target { color: var(--text-secondary); font-size: 1.8rem; font-weight: 800; }
    .progress-bar-container { margin: 2rem 0; position: relative; z-index: 1; }
    .progress-bar { width: 100%; height: 12px; background: var(--white); border-radius: 6px; overflow: hidden; box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.1); }
    .progress-fill { height: 100%; background: linear-gradient(90deg, var(--primary-green) 0%, var(--accent-green) 100%); border-radius: 6px; transition: width 0.8s ease; position: relative; }
    .campaign-description { margin-top: 2rem; color: var(--text-secondary); line-height: 1.8; white-space: pre-wrap; font-size: 1.1rem; background: var(--soft-green); padding: 2rem; border-radius: 16px; border-left: 4px solid var(--primary-green); }
    .donate-button-container { margin-top: 3rem; text-align: center; }
    .btn-donate { display: inline-flex; align-items: center; gap: 0.75rem; padding: 1.25rem 3rem; background: linear-gradient(135deg, var(--primary-green) 0%, var(--accent-green) 100%); color: var(--white); font-size: 1.2rem; font-weight: 700; border-radius: 50px; text-decoration: none; transition: all 0.3s ease; box-shadow: var(--shadow-medium); position: relative; overflow: hidden; }
    .btn-donate:hover { transform: translateY(-3px); box-shadow: 0 20px 40px -12px rgba(16, 185, 129, 0.4); }
    .details-section { background: var(--white); border-radius: 20px; padding: 2.5rem; margin-bottom: 2rem; box-shadow: var(--shadow-medium); transition: transform 0.3s ease; }
    .details-section:hover { transform: translateY(-2px); }
    .section-title { font-size: 1.75rem; font-weight: 700; margin-bottom: 2rem; color: var(--text-primary); position: relative; padding-bottom: 1rem; }
    .section-title::after { content: ''; position: absolute; bottom: 0; left: 0; width: 60px; height: 4px; background: linear-gradient(90deg, var(--primary-green), var(--accent-green)); border-radius: 2px; }
    .donor-list { display: grid; gap: 1rem; }
    .donor-item { display: flex; align-items: center; padding: 1.25rem; background: var(--soft-green); border-radius: 12px; transition: all 0.2s ease; border: 1px solid transparent; }
    .donor-item:hover { background: var(--light-green); border-color: var(--primary-green); transform: translateX(5px); }
    .donor-avatar { width: 50px; height: 50px; border-radius: 50%; background: linear-gradient(135deg, var(--primary-green), var(--accent-green)); color: var(--white); display: flex; align-items: center; justify-content: center; font-weight: 700; margin-right: 1rem; text-transform: uppercase; font-size: 1.1rem; box-shadow: var(--shadow-soft); }
    .donor-name { font-weight: 600; color: var(--text-primary); font-size: 1.1rem; }
    .comment-form { background: var(--soft-green); padding: 2rem; border-radius: 16px; margin-bottom: 2rem; border: 2px dashed var(--primary-green); }
    .comment-form input, .comment-form textarea { width: 100%; padding: 1rem 1.25rem; border: 2px solid var(--border-light); border-radius: 12px; font-size: 1rem; margin-bottom: 1rem; transition: all 0.3s ease; background: var(--white); font-family: inherit; }
    .comment-form input:focus, .comment-form textarea:focus { outline: none; border-color: var(--primary-green); box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1); }
    .btn-submit { background: linear-gradient(135deg, var(--primary-green), var(--accent-green)); color: var(--white); padding: 1rem 2rem; border: none; border-radius: 12px; font-size: 1rem; font-weight: 600; cursor: pointer; transition: all 0.3s ease; box-shadow: var(--shadow-soft); }
    .btn-submit:hover { transform: translateY(-2px); box-shadow: var(--shadow-medium); }
    .comment-list { display: grid; gap: 1.5rem; }
    .comment-item { display: flex; align-items: flex-start; padding: 1.5rem; background: var(--soft-green); border-radius: 16px; transition: all 0.2s ease; border-left: 4px solid transparent; }
    .comment-item:hover { background: var(--light-green); border-left-color: var(--primary-green); }
    .comment-avatar { width: 50px; height: 50px; border-radius: 50%; background: linear-gradient(135deg, var(--accent-green), var(--dark-green)); color: var(--white); display: flex; align-items: center; justify-content: center; font-weight: 700; margin-right: 1rem; text-transform: uppercase; font-size: 1.1rem; box-shadow: var(--shadow-soft); flex-shrink: 0; }
    .comment-content-wrapper { flex: 1; }
    .comment-header { display: flex; align-items: center; margin-bottom: 0.5rem; gap: 0.75rem; }
    .comment-author { font-weight: 700; color: var(--text-primary); font-size: 1.1rem; }
    .comment-date { font-size: 0.9rem; color: var(--text-muted); background: var(--white); padding: 0.25rem 0.75rem; border-radius: 20px; }
    .comment-body { color: var(--text-secondary); line-height: 1.7; font-size: 1rem; }
    .alert-container { position: fixed; top: 20px; right: 20px; z-index: 1050; }
    .alert-ajax { padding: 1rem 1.5rem; border-radius: 8px; color: white; font-weight: 600; box-shadow: var(--shadow-medium); opacity: 0; transform: translateX(100%); transition: all 0.5s ease; }
    .alert-ajax.show { opacity: 1; transform: translateX(0); }
    .alert-ajax-success { background: var(--dark-green); }
    .alert-ajax-error { background: #dc2626; }
    .campaign-ended { background: linear-gradient(135deg, #fef3c7, #fde68a); color: #92400e; padding: 1.5rem 2rem; border-radius: 12px; text-align: center; font-weight: 600; font-size: 1.1rem; border: 2px solid #f59e0b; }
    @media (max-width: 768px) { .campaign-container { padding: 1rem; } .campaign-content { padding: 2rem 1.5rem; } .campaign-title { font-size: 2rem; } .fund-details { grid-template-columns: 1fr; gap: 1rem; } .fund-amount, .fund-target { font-size: 1.5rem; } .details-section { padding: 2rem 1.5rem; } .section-title { font-size: 1.5rem; } .btn-donate { padding: 1rem 2rem; font-size: 1.1rem; } }
    @media (max-width: 480px) { .campaign-title { font-size: 1.75rem; } .campaign-image { height: 300px; } .fund-amount, .fund-target { font-size: 1.3rem; } }
    @keyframes fadeInUp { from { opacity: 0; transform: translateY(30px); } to { opacity: 1; transform: translateY(0); } }
    .campaign-hero, .details-section { animation: fadeInUp 0.6s ease forwards; }
    .details-section:nth-child(2) { animation-delay: 0.1s; }
    .details-section:nth-child(3) { animation-delay: 0.2s; }
</style>

<div id="alert-container" class="alert-container"></div>

<div class="campaign-container">
    <div class="campaign-hero">
        <img src="{{ asset('storage/' . $campaign->image) }}" alt="{{ $campaign->title }}" class="campaign-image">
        <div class="campaign-content">
            <h1 class="campaign-title">{{ $campaign->title }}</h1>
            
            <div class="progress-section">
                <div class="fund-details">
                    <div class="fund-item">
                        <div class="fund-label">Terkumpul</div>
                        <div class="fund-amount">Rp {{ number_format($campaign->collected_amount, 0, ',', '.') }}</div>
                    </div>
                    <div class="fund-item">
                        <div class="fund-label">Target</div>
                        <div class="fund-target">Rp {{ number_format($campaign->target_amount, 0, ',', '.') }}</div>
                    </div>
                </div>
                
                <div class="progress-bar-container">
                    <div class="progress-bar">
                        <div class="progress-fill" style="width: {{ $campaign->target_amount > 0 ? min(($campaign->collected_amount / $campaign->target_amount) * 100, 100) : 0 }}%"></div>
                    </div>
                </div>
            </div>

            <div class="campaign-description">{!! nl2br(e($campaign->description)) !!}</div>

            <div class="donate-button-container">
                @if($campaign->status == 'approved')
                    <a href="{{ route('donations.create', $campaign->id) }}" class="btn-donate">
                        <svg width="20" height="20" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"/>
                        </svg>
                        Donasi Sekarang
                    </a>
                @else
                    <div class="campaign-ended">
                        Kampanye ini sedang tidak aktif.
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="details-section">
        <h3 class="section-title">Para Donatur Baik (<span id="donors-count">{{ $donors->count() }}</span>)</h3>
        <div class="donor-list">
            @forelse($donors as $donor)
                <div class="donor-item">
                    <div class="donor-avatar">{{ strtoupper(substr($donor->donor_name, 0, 1)) }}</div>
                    <div class="donor-name">{{ $donor->donor_name }}</div>
                </div>
            @empty
                <p style="text-align: center; color: var(--text-muted); font-style: italic; padding: 2rem;">
                    Jadilah orang pertama yang berdonasi di kampanye ini! 🌟
                </p>
            @endforelse
        </div>
    </div>

    <div class="details-section">
        <h3 class="section-title">Dukungan & Doa (<span id="comments-count">{{ $comments->count() }}</span>)</h3>
        
        <div class="comment-form">
            <form id="comment-form" action="{{ route('comments.store', $campaign->id) }}" method="POST">
                @csrf
                @guest
                    <input type="text" id="guest_name" name="guest_name" placeholder="Nama Anda" required>
                @endguest
                <textarea id="comment_body" name="body" rows="4" placeholder="Tulis komentar atau doa terbaikmu di sini..." required></textarea>
                <button type="submit" class="btn-submit">Kirim Komentar</button>
            </form>
        </div>
        
        <div class="comment-list" id="comment-list">
            @forelse($comments as $comment)
                <div class="comment-item">
                    <div class="comment-avatar">
                        {{ strtoupper(substr($comment->user ? $comment->user->name : $comment->guest_name, 0, 1)) }}
                    </div>
                    <div class="comment-content-wrapper">
                        <div class="comment-header">
                            <span class="comment-author">{{ $comment->user ? $comment->user->name : $comment->guest_name }}</span>
                            <span class="comment-date">{{ $comment->created_at->diffForHumans() }}</span>
                        </div>
                        <div class="comment-body">{{ $comment->body }}</div>
                    </div>
                </div>
            @empty
                <p id="no-comments-placeholder" style="text-align: center; color: var(--text-muted); font-style: italic; padding: 2rem;">
                    Belum ada komentar. Jadilah yang pertama memberikan dukungan! 💬
                </p>
            @endforelse
        </div>
    </div>
</div>

@endsection

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Script animasi progress bar
    const progressFill = document.querySelector('.progress-fill');
    if (progressFill) {
        const targetWidth = progressFill.style.width;
        progressFill.style.width = '0%';
        setTimeout(() => {
            progressFill.style.width = targetWidth;
        }, 500);
    }

    // Script AJAX untuk Form Komentar
    const commentForm = document.getElementById('comment-form');
    if (commentForm) {
        commentForm.addEventListener('submit', function(e) {
            e.preventDefault();

            const submitButton = this.querySelector('.btn-submit');
            const originalButtonText = submitButton.innerHTML;
            submitButton.innerHTML = 'Mengirim...';
            submitButton.disabled = true;

            const formData = new FormData(this);
            const actionUrl = this.getAttribute('action');

            fetch(actionUrl, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                    'Accept': 'application/json',
                }
            })
            .then(response => {
                if (!response.ok) {
                    return response.json().then(err => { throw err; });
                }
                return response.json();
            })
            .then(data => {
                showAlert(data.message || 'Komentar berhasil dikirim!', 'success');
                
                const comment = data.comment;
                const newCommentHTML = `
                    <div class="comment-item" style="opacity:0; transform: translateY(20px); transition: all 0.5s ease;">
                        <div class="comment-avatar">${comment.author_initial}</div>
                        <div class="comment-content-wrapper">
                            <div class="comment-header">
                                <span class="comment-author">${comment.author_name}</span>
                                <span class="comment-date">${comment.created_at}</span>
                            </div>
                            <div class="comment-body">${comment.body}</div>
                        </div>
                    </div>
                `;

                const commentList = document.getElementById('comment-list');
                const noCommentsPlaceholder = document.getElementById('no-comments-placeholder');
                if (noCommentsPlaceholder) {
                    noCommentsPlaceholder.style.display = 'none';
                }

                commentList.insertAdjacentHTML('afterbegin', newCommentHTML);

                const commentsCount = document.getElementById('comments-count');
                commentsCount.innerText = parseInt(commentsCount.innerText) + 1;
                
                commentForm.reset();

                setTimeout(() => {
                    const newCommentElement = commentList.firstElementChild;
                    if (newCommentElement) {
                        newCommentElement.style.opacity = 1;
                        newCommentElement.style.transform = 'translateY(0)';
                    }
                }, 100);
            })
            .catch(error => {
                console.error("Error:", error);
                let errorMessage = "Terjadi kesalahan saat mengirim komentar.";
                if (error.errors) {
                    errorMessage = Object.values(error.errors).flat().join("\n");
                }
                showAlert(errorMessage, "error");
            })
            .finally(() => {
                submitButton.innerHTML = originalButtonText;
                submitButton.disabled = false;
            });
        });
    }

    function showAlert(message, type) {
        const alertContainer = document.getElementById("alert-container");
        const alertDiv = document.createElement("div");
        alertDiv.className = `alert-ajax alert-ajax-${type}`;
        alertDiv.textContent = message;
        alertContainer.appendChild(alertDiv);

        setTimeout(() => {
            alertDiv.classList.add("show");
        }, 10);

        setTimeout(() => {
            alertDiv.classList.remove("show");
            alertDiv.addEventListener("transitionend", () => alertDiv.remove());
        }, 5000);
    }
});
</script>

