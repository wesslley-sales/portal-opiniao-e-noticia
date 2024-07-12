<div class="sidebar-widget social-widget box">
    <h2 class="widget-title">FIQUE CONECTADO</h2>
    <div class="social-profile-wrap">
        <div class="social-profile-item">
            <a href="{{ $settings['site.link_facebook'] ?? '' }}" target="_blank" title="Facebook - {{ config('app.name') }}">
                <span class="fb-icon"><i class="lab la-facebook-f"></i></span>
                <h6 class="social-counter">Facebook</h6>
            </a>
        </div>

        <div class="social-profile-item">
            <a href="{{ $settings['site.link_twitter'] ?? '' }}" target="_blank" title="X (Twitter) - {{ config('app.name') }}">
                <span class="tt-icon"><i class="lab la-twitter"></i></span>
                <h6 class="social-counter">X (Twitter)</h6>
            </a>
        </div>

        <div class="social-profile-item">
            <a href="{{ $settings['site.link_instagram'] ?? '' }}" target="_blank" title="Instagram - {{ config('app.name') }}">
                <span class="ins-icon"><i class="lab la-instagram"></i></span>
                <h6 class="social-counter">Instagram</h6>
            </a>
        </div>

        <div class="social-profile-item">
            <a href="{{ $settings['site.link_youtube'] ?? '' }}" target="_blank" title="YouTube - {{ config('app.name') }}">
                <span class="yt-icon"><i class="lab la-youtube"></i></span>
                <h6 class="social-counter">YouTube</h6>
            </a>
        </div>
    </div>
</div>
